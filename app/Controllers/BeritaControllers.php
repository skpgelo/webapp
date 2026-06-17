<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class BeritaControllers extends BaseController
{
    protected $db;

    public function __construct()
    {
        $this->db = \Config\Database::connect();
        $this->session = \Config\Services::session();
    }

    // Mengambil halaman dashboard Input Berita
    public function index()
    {
        $data['kategori'] = $this->db->table('kategori')->get()->getResultArray();
        return view('berita/v_input_berita', $data);
    }

     // Menampilkan Berita Berdasarkan Kelompok Kategori
    public function beritaPerKategori()
    {
        // 1. Ambil semua kategori yang setidaknya memiliki 1 berita
        $kategoriList = $this->db->query("
            SELECT DISTINCT k.id, k.kategori, k.ket 
            FROM kategori k
            JOIN berita n ON n.id_kategori = k.id
            ORDER BY k.kategori ASC
        ")->getResultArray();

        // 2. Petakan berita ke dalam masing-masing kelompok kategori
        $beritaTerelompok = [];
        foreach ($kategoriList as $kat) {
            $berita = $this->db->table('berita')
                               ->where('id_kategori', $kat['id'])
                               ->orderBy('created_at', 'DESC')
                               ->get()->getResultArray();
            
            $beritaTerelompok[] = [
                'nama_kategori' => $kat['kategori'],
                'keterangan'    => $kat['ket'],
                'daftar_berita' => $berita
            ];
        }

        $data['kelompok_berita'] = $beritaTerelompok;

        return view('berita/v_berita_by_category', $data);
    }

    // PROSES CREATE: Insert Berita & Multi Images secara Transaksional (Aman)
    public function store()
    {
        // 1. Validasi Input Keamanan & File Gambar
        $rules = [
            'id_kategori'   => 'required|numeric',
            'judul_berita'  => 'required|min_length[5]',
            'isi_berita'    => 'required',
            'foto_utama'    => 'uploaded[foto_utama]|max_size[foto_utama,2048]|ext_in[foto_utama,jpg,jpeg,png]',
            'images.*'      => 'max_size[images,2048]|ext_in[images,jpg,jpeg,png]'
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        // 2. Ambil Identitas Penulis Berita dari Session Email Aktif
        $emailSession = $this->session->get('email') ?? 'anonim@domain.com';

        // 3. Eksekusi Upload Foto Utama (Thumbnail)
        $fotoUtama = $this->request->getFile('foto_utama');
        $randomNameUtama = $fotoUtama->getRandomName();
        $fotoUtama->move(FCPATH . 'uploads/foto', $randomNameUtama);

        // 4. Mulai Database Transaction (Proteksi Kegagalan Berantai)
        $this->db->transStart();

        $slug = url_title($this->request->getPost('judul_berita'), '-', true);
        
        $dataBerita = [
            'id_kategori'    => $this->request->getPost('id_kategori'),
            'judul_berita'   => $this->request->getPost('judul_berita'),
            'slug'           => $slug,
            'isi_berita'     => $this->request->getPost('isi_berita'),
            'kontributor' => $emailSession,
            'nama_foto'      => 'Thumbnail_' . bin2hex(random_bytes(4)),
            'foto'           => $randomNameUtama
        ];

        $this->db->table('berita')->insert($dataBerita);
        $idBeritaBaru = $this->db->insertID(); // Tangkap ID Berita baru untuk foreign key

        // 5. Loop & Eksekusi Multi Upload Images Tambahan
        if ($idBeritaBaru && $files = $this->request->getFiles()) {
            if (isset($files['images'])) {
                foreach ($files['images'] as $img) {
                    if ($img->isValid() && !$img->hasMoved()) {
                        $randomNameMulti = $img->getRandomName();
                        $img->move(FCPATH . 'uploads/foto', $randomNameMulti);

                        $dataImages = [
                            'id_berita' => $idBeritaBaru,
                            'nama_foto' => 'Gallery_' . bin2hex(random_bytes(6)), // Generate teks random teks
                            'foto'      => $randomNameMulti
                        ];
                        $this->db->table('foto_images')->insert($dataImages);
                    }
                }
            }
        }

        $this->db->transComplete();

        if ($this->db->transStatus() === false) {
            return redirect()->back()->withInput()->with('error', 'Terjadi kesalahan sistem, transaksi dibatalkan.');
        }

        return redirect()->to('/berita')->with('success', 'Berita & Multi-Foto sukses diterbitkan!');
    }

    // HALAMAN VIEW: Menampilkan 3 Tipe Distribusi Berita Sekaligus
    public function viewBerita()
    {
        // Tipe 1: Berita 7 Hari Terakhir (Untuk Owl Carousel)
        $data['berita_carousel'] = $this->db->query("
            SELECT n.*, k.kategori FROM berita n 
            JOIN kategori k ON n.id_kategori = k.id 
            WHERE n.created_at >= DATE_SUB(NOW(), INTERVAL 7 DAY) 
            ORDER BY n.created_at DESC
        ")->getResultArray();

        // Tipe 2: Hanya 1 Berita Paling Baru (Terupdate)
        $data['berita_terbaru'] = $this->db->query("
            SELECT n.*, k.kategori FROM berita n 
            JOIN kategori k ON n.id_kategori = k.id 
            ORDER BY n.created_at DESC LIMIT 1
        ")->getRowArray();

        // Tipe 3: Semua Berita Tanpa Kecuali
        $data['semua_berita'] = $this->db->query("
            SELECT n.*, k.kategori FROM berita n 
            JOIN kategori k ON n.id_kategori = k.id 
            ORDER BY n.created_at DESC
        ")->getResultArray();

        return view('berita/v_display_berita', $data);
    }
}

