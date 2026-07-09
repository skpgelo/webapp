<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\BeritaModels;
use App\Models\GaleriModels;
use Config\Services; //library kompresi ukuran file, mengubah resolusi (resize), dan membuat gambar thumbnailsecara otomatis

class BeritaControllers extends BaseController
{
    protected $db;
    protected $helpers = ['character_limiter', 'text'];
    
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

    public function indexx()
    {
        
    $beritaModel = new BeritaModels();

    $data['kategori'] = $this->db->table('kategori')->get()->getResultArray();

    // Mengambil 1 berita terbaru berdasarkan ID atau tanggal input terbaru
    $beritaTerbaru = $beritaModel->orderBy('created_at', 'DESC')->first();

    $data = [
        'highlight' => $beritaTerbaru
    ];
        $data['title']        = 'Term & Conditions';
        $data['page_heading'] = 'SYARAT DAN KETENTUAN PENGGUNAAN';
        $data['title'] = 'Produk Hukum';
        $data['section_header'] = '[Informasi Berkala]';
        $data['sub_section_header'] = 'Informasi yang Wajib Disediakan dan Diumumkan Secara Berkala';
        $data['card_header'] = 'Berita Utama';

    return view('berita/home', $data);
    }

    public function highlight()
    {
        $beritaModel = new BeritaModels();

        // Mengambil 1 berita terbaru berdasarkan ID atau tanggal input terbaru
        $beritaTerbaru = $beritaModel->orderBy('created_at', 'DESC')->first();

        $data = [
            'highlight' => $beritaTerbaru
        ];
        $data['title']        = 'Term & Conditions';
        $data['page_heading'] = 'SYARAT DAN KETENTUAN PENGGUNAAN';
        $data['title'] = 'Produk Hukum';
        $data['section_header'] = '[Informasi Berkala]';
        $data['sub_section_header'] = 'Informasi yang Wajib Disediakan dan Diumumkan Secara Berkala';
        $data['card_header'] = 'Berita Utama';

        return view('berita/highlight', $data);
    }

    public function weeksday()
    {
        $beritaModel = new BeritaModels();

        // 1. Hitung tanggal 7 hari yang lalu dari sekarang
        $tujuhHariLalu = date('Y-m-d H:i:s', strtotime('-7 days'));

        // 2. Ambil data dengan filter: waktu pembuatan harus lebih besar/sama dengan 7 hari lalu
        $beritaTerkini = $beritaModel->where('created_at >=', $tujuhHariLalu)
                                    ->orderBy('created_at', 'DESC')
                                    ->findAll();

        // 3. Load text helper bawaan CI4 untuk memotong karakter dengan rapi
        helper('text');

        $data = [
            'daftar_berita' => $beritaTerkini
        ];
        $data['title']        = 'Term & Conditions';
        $data['page_heading'] = 'SYARAT DAN KETENTUAN PENGGUNAAN';
        $data['title'] = 'Produk Hukum';
        $data['section_header'] = '[Informasi Berkala]';
        $data['sub_section_header'] = 'Informasi yang Wajib Disediakan dan Diumumkan Secara Berkala';
        $data['card_header'] = 'Kabar 7 Hari Terakhir';

        return view('berita/berita_terkini', $data);
    }

    public function tambah()
    {
        // Tampilkan halaman form input berita
        $data['title']        = 'Term & Conditions';
        $data['page_heading'] = 'SYARAT DAN KETENTUAN PENGGUNAAN';
        $data['title'] = 'Produk Hukum';
        $data['section_header'] = '[Informasi Berkala]';
        $data['sub_section_header'] = 'Informasi yang Wajib Disediakan dan Diumumkan Secara Berkala';
        $data['card_header'] = 'Buat Berita Baru';

        return view('berita/tambah_berita', $data);
    }

    public function simpan()
    {
        // 1. Cek Session User
        $userEmail = $this->session->get('email');
        if (!$userEmail) {
            return redirect()->to('/login')->with('error', 'Silakan login terlebih dahulu.');
        }

        // 2. ATURAN VALIDASI KEAMANAN FILE (Mencegah File Ilegal)
        $rules = [
            'judul' => 'required|min_length[5]',
            'isi_berita' => 'required',
            // Validasi untuk Cover Image (Single)
            'cover_image' => [
                'rules' => 'uploaded[cover_image]|max_size[cover_image,2048]|is_image[cover_image]|mime_in[cover_image,image/jpg,image/jpeg,image/png,image/webp]|ext_in[cover_image,jpg,jpeg,png,webp]',
                'errors' => [
                    'uploaded' => 'Cover gambar wajib diisi.',
                    'max_size' => 'Ukuran cover gambar maksimal 2MB.',
                    'is_image' => 'File yang diupload harus berupa gambar asli.',
                    'mime_in'  => 'Format MIME tipe gambar tidak valid (Wajib JPG/PNG/WebP).',
                    'ext_in'   => 'Ekstensi file gambar tidak diizinkan.'
                ]
            ],
            // Validasi untuk Galeri Images (Multi)
            'galeri_images' => [
                'rules' => 'uploaded[galeri_images]|max_size[galeri_images,2048]|is_image[galeri_images]|mime_in[galeri_images,image/jpg,image/jpeg,image/png,image/webp]|ext_in[galeri_images,jpg,jpeg,png,webp]',
                'errors' => [
                    'uploaded' => 'Gambar galeri wajib diisi minimal 1.',
                    'max_size' => 'Ukuran tiap gambar galeri maksimal 2MB.',
                    'is_image' => 'File galeri harus berupa gambar asli.',
                    'mime_in'  => 'Format MIME tipe galeri tidak valid.',
                    'ext_in'   => 'Ekstensi file galeri tidak diizinkan.'
                ]
            ]
        ];

        if (!$this->validate($rules)) {
            // Jika validasi gagal, kembali ke form dan bawa pesan error
            return redirect()->back()->withInput()->with('error', $this->validator->listErrors());
        }

        // 3. Ambil data teks dari form jika lolos validasi
        $judul     = $this->request->getPost('judul');
        $isiBerita = $this->request->getPost('isi_berita');

        $db          = \Config\Database::connect();
        $beritaModel = new BeritaModels();
        $galeriModel = new GaleriModels();

        $db->transBegin();

        try {
            // Inisialisasi library Image Manipulation CI4
            $imageLib = Services::image();

            // --- PROSES SINKRONISASI TABEL 1 (COVER IMAGE) ---
            $coverFile = $this->request->getFile('cover_image');
            $coverName = '';

            if ($coverFile && $coverFile->isValid() && !$coverFile->hasMoved()) {
                $coverName = $coverFile->getRandomName();
                
                // 1. Pindahkan file asli terlebih dahulu ke folder tujuan
                $destinationPath = FCPATH . 'uploads/berita/cover/';
                $coverFile->move($destinationPath, $coverName);

                // 2. OTOMATISASI MANIPULASI GAMBAR (RESIZE & COMPRESS)
                // Mengubah ukuran gambar utama menjadi maksimal lebar/tinggi 1200px (menjaga aspek rasio)
                $imageLib->withFile($destinationPath . $coverName)
                         ->resize(1200, 1200, true, 'height') // true = maintain aspect ratio [1]
                         ->save($destinationPath . $coverName, 80); // 80 = Kualitas kompresi 80%
            }

            $dataBerita = [
                'judul'        => $judul,
                'isi_berita'   => $isiBerita,
                'cover_image'  => $coverName,
                'pembuat'      => $userEmail
            ];

            $beritaModel->insert($dataBerita);
            $newBeritaId = $beritaModel->getInsertID();

            // --- PROSES SINKRONISASI TABEL 2 (GALERI MULTI IMAGE & THUMBNAIL) ---
            $galeriFiles = $this->request->getFiles();
            
            if (isset($galeriFiles['galeri_images'])) {
                foreach ($galeriFiles['galeri_images'] as $img) {
                    if ($img->isValid() && !$img->hasMoved()) {
                        $newName = $img->getRandomName();
                        
                        $galeriPath    = FCPATH . 'uploads/berita/galeri/';
                        $thumbnailPath = FCPATH . 'uploads/berita/galeri/thumb/'; // Folder khusus thumbnail

                        // 1. Pindahkan file asli ke folder galeri
                        $img->move($galeriPath, $newName);

                        // 2. MANIPULASI 1: Kompres gambar galeri asli agar hemat penyimpanan server
                        $imageLib->withFile($galeriPath . $newName)
                                 ->resize(1000, 1000, true, 'height')
                                 ->save($galeriPath . $newName, 75); // Kompres kualitas ke 75%

                        // 3. MANIPULASI 2: Buat gambar Thumbnail (Potong kotak simetris 300x300px)
                        // Gunakan method fit() untuk memotong bagian tengah gambar otomatis agar pas kotak [1]
                        $imageLib->withFile($galeriPath . $newName)
                                 ->fit(300, 300, 'center') // Potong kotak dari tengah koordinat [1]
                                 ->save($thumbnailPath . $newName, 80); // Simpan ke folder /thumb/

                        // Simpan informasi nama gambar ke database
                        $dataGaleri = [
                            'berita_id'   => $newBeritaId,
                            'nama_gambar' => $newName,
                            'pengupload'  => $userEmail
                        ];

                        $galeriModel->insert($dataGaleri);
                    }
                }
            }

            // ... (Proses TransCommit dan Redirect sama seperti sebelumnya) ...

        } catch (\Exception $e) {
            $db->transRollback();
            return redirect()->back()->with('error', 'Terjadi kesalahan sistem: ' . $e->getMessage())->withInput();
        }
    }

public function detail($id)
{
    $beritaModel = new \App\Models\Berita_model();
    $galeriModel = new \App\Models\GaleriModels();

    // 1. Ambil data berita berdasarkan ID
    $berita = $beritaModel->find($id);

    if (!$berita) {
        throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound("Berita tidak ditemukan.");
    }

    // 2. Ambil semua gambar galeri yang memiliki foreign key (berita_id) sesuai
    $galeri = $galeriModel->where('id', $id)->findAll();

    // 3. Kirim data ke View
    $data = [
        'berita' => $berita,
        'galeri' => $galeri
    ];

    return view('berita/detail_berita', $data);
}




    public function simpanx()
    {
        // 1. Ambil email pembuat dari session (Pastikan session 'email' sudah diset saat login)
        $userEmail = $this->session->get('email');
        if (!$userEmail) {
            return redirect()->to('/login')->with('error', 'Silakan login terlebih dahulu.');
        }

        // 2. Ambil data teks dari form
        $judul     = $this->request->getPost('judul');
        $isiBerita = $this->request->getPost('isi_berita'); // Output dari CKEditor

        // 3. Inisialisasi Database dan Model
        $db          = \Config\Database::connect();
        $beritaModel = new BeritaModels();
        $galeriModel = new GaleriModels();

        // 4. Mulai Transaksi Database
        $db->transBegin();

        try {
            // --- PROSES TABEL 1: BERITA UTAMA ---
            $coverFile = $this->request->getFile('cover_image');
            $coverName = '';

            if ($coverFile && $coverFile->isValid() && !$coverFile->hasMoved()) {
                $coverName = $coverFile->getRandomName();
                $coverFile->move(FCPATH . 'uploads/berita/cover/', $coverName);
            }

            $dataBerita = [
                'judul'        => $judul,
                'isi_berita'   => $isiBerita,
                'cover_image'  => $coverName,
                'pembuat'      => $userEmail // Diambil dari session email
            ];

            $beritaModel->insert($dataBerita);
            
            // Ambil ID berita yang baru saja didapat (Foreign ID)
            $newBeritaId = $beritaModel->getInsertID();

            // --- PROSES TABEL 2: GALERI MULTI IMAGE ---
            $galeriFiles = $this->request->getFiles();
            
            if (isset($galeriFiles['galeri_images'])) {
                foreach ($galeriFiles['galeri_images'] as $img) {
                    if ($img->isValid() && !$img->hasMoved()) {
                        $newName = $img->getRandomName();
                        $img->move(FCPATH . 'uploads/berita/galeri/', $newName);

                        $dataGaleri = [
                            'berita_id'   => $newBeritaId, // Masukkan Foreign ID
                            'nama_gambar' => $newName,
                            'pengupload'  => $userEmail // Diambil dari session email
                        ];

                        $galeriModel->insert($dataGaleri);
                    }
                }
            }

            // 5. Cek Status Transaksi Database
            if ($db->transStatus() === false) {
                $db->transRollback();
                return redirect()->back()->with('error', 'Gagal memposting berita. Silakan coba lagi.')->withInput();
            } else {
                $db->transCommit();
                return redirect()->to('/berita')->with('success', 'Berita dan Galeri Foto berhasil diterbitkan!');
            }

        } catch (\Exception $e) {
            $db->transRollback();
            return redirect()->back()->with('error', 'Terjadi kesalahan sistem: ' . $e->getMessage())->withInput();
        }
    }

    // =========================== end add==============================

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

