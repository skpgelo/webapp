<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class GaleriControllers extends BaseController
{
     protected $db;

    public function __construct()
    {
        $this->db = \Config\Database::connect();
    }

    // Tampilan Utama Dashboard Galeri
    public function index()
    {
        return view('galeri/v_dashboard_galeri');
    }

    // API: Mengambil data galeri berdasarkan validitas rentang tanggal hari ini
    public function getAllData()
    {
        /**
         * LOGIKA QUERY TEMATIK:
         * 1. Kondisi Tematik Aktif: Jika tgl_tematik - hari <= HARI_INI <= tgl_tematik + hari
         *    Maka kumpulkan gambar yang memiliki id_tematik terkait.
         * 2. Kondisi Tematik Tidak Aktif (Sebelum/Sesudah):
         *    Maka kumpulkan hanya gambar reguler yang id_tematik-nya NULL atau kosong.
         */
        $galeri = $this->db->query("
            SELECT 
                n.id as id_berita, 
                n.judul_berita,
                SUM(CASE 
                    WHEN (i.id_tematik IS NOT NULL AND CURRENT_DATE() BETWEEN DATE_SUB(i.tgl_tematik, INTERVAL i.hari DAY) AND DATE_ADD(i.tgl_tematik, INTERVAL i.hari DAY)) THEN 1
                    WHEN (i.id_tematik IS NULL) THEN 1
                    ELSE 0 
                END) as total_foto,
                GROUP_CONCAT(CASE 
                    WHEN (i.id_tematik IS NOT NULL AND CURRENT_DATE() BETWEEN DATE_SUB(i.tgl_tematik, INTERVAL i.hari DAY) AND DATE_ADD(i.tgl_tematik, INTERVAL i.hari DAY)) THEN i.foto
                    WHEN (i.id_tematik IS NULL) THEN i.foto
                    ELSE NULL 
                END) as file_foto
            FROM berita n
            JOIN foto_images i ON n.id = i.id_berita
            GROUP BY n.id 
            HAVING file_foto IS NOT NULL
            ORDER BY n.id DESC
        ")->getResultArray();

        $berita   = $this->db->table('berita')->select('id, judul_berita')->get()->getResultArray();
        $tematik  = $this->db->table('tabel_tematik')->get()->getResultArray();

        return $this->respond([
            'galeri'  => $galeri,
            'berita'  => $berita,
            'tematik' => $tematik
        ]);
    }

    // API: Simpan / CREATE Multi Images dengan penambahan field hari
    public function store()
    {
        $rules = [
            'id_berita'  => 'required|numeric',
            'images.*'   => 'uploaded[images]|max_size[images,2048]|ext_in[images,jpg,jpeg,png]'
        ];

        if (!$this->validate($rules)) {
            return $this->respond(['status' => false, 'errors' => $this->validator->getErrors()]);
        }

        $idTematik = $this->request->getPost('id_tematik') ?: null;
        $hariInput = $this->request->getPost('hari') ?: 0;
        $tglTematik = null;

        if ($idTematik) {
            $tematik = $this->db->table('tabel_tematik')->where('id', $idTematik)->get()->getRowArray();
            $tglTematik = $tematik ? $tematik['tgl_tematik'] : null;
        }

        $files = $this->request->getFiles();
        
        $this->db->transStart();

        if (isset($files['images'])) {
            foreach ($files['images'] as $img) {
                if ($img->isValid() && !$img->hasMoved()) {
                    $newName = $img->getRandomName();
                    $img->move(FCPATH . 'uploads/foto', $newName);

                    $this->db->table('foto_images')->insert([
                        'id_berita'   => $this->request->getPost('id_berita'),
                        'id_tematik'  => $idTematik,
                        'tgl_tematik' => $tglTematik,
                        'hari'        => $hariInput,
                        'nama_foto'   => 'Galeri_Batch_' . bin2hex(random_bytes(4)),
                        'foto'        => $newName
                    ]);
                }
            }
        }

        $this->db->transComplete();

        if ($this->db->transStatus() === false) {
            return $this->respond(['status' => false, 'message' => 'Transaksi penyimpanan gagal.']);
        }

        return $this->respond(['status' => true, 'message' => 'Koleksi foto galeri berhasil diperbarui!']);
    }

    // API: Simpan Data Tematik Baru via AJAX
    public function storeTematik()
    {
        $rules = [
            'judul_tematik' => 'required|min_length[3]',
            'tgl_tematik'   => 'required|valid_date[Y-m-d]',
            'ket'           => 'permit_empty'
        ];

        if (!$this->validate($rules)) {
            return $this->respond(['status' => false, 'errors' => $this->validator->getErrors()]);
        }

        $data = [
            'judul_tematik' => $this->request->getPost('judul_tematik'),
            'tgl_tematik'   => $this->request->getPost('tgl_tematik'),
            'ket'           => $this->request->getPost('ket') ?: null
        ];

        $this->db->table('tabel_tematik')->insert($data);

        return $this->respond(['status' => true, 'message' => 'Agenda Tematik baru berhasil ditambahkan!']);
    }

}
