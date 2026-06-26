<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;

class Karyawan extends ResourceController
{
    protected $db;

    public function __construct()
    {
        $this->db = \Config\Database::connect();
    }

    // Mengambil halaman dashboard Stisla
    public function index()
    {
        return view('sdm/v_karyawan');
    }

    // API: Ambil semua data & statistik untuk JS
    public function getAllData()
    {
        $struktur = $this->db->query("SELECT * FROM sdm")->getResultArray();
        $total = $this->db->table('sdm')->countAllResults();
        $gender = $this->db->query("SELECT gender, COUNT(*) as jumlah FROM sdm GROUP BY gender")->getResultArray();
        $jabatan = $this->db->query("SELECT jabatan, COUNT(*) as jumlah FROM sdm GROUP BY jabatan ORDER BY jumlah DESC")->getResultArray();

        return $this->respond([
            'struktur' => $struktur,
            'total_karyawan' => $total,
            'stat_gender' => $gender,
            'stat_jabatan' => $jabatan
        ]);
    }

    // API: Simpan data baru atau update data lama
    public function simpan()
    {
        $id = $this->request->getPost('id');
        
        $data = [
            'nama'      => $this->request->getPost('nama'),
            'id_card'   => $this->request->getPost('id_card'),
            'jabatan'   => $this->request->getPost('jabatan'),
            'tmp_lahir' => $this->request->getPost('tmp_lahir'),
            'tgl_lahir' => $this->request->getPost('tgl_lahir'),
            'emai'      => $this->request->getPost('emai'),
            'alamat'    => $this->request->getPost('alamat'),
            'gender'    => $this->request->getPost('gender'),
            'parent_id' => $this->request->getPost('parent_id') ?: null,
        ];

        // Handle Upload Foto
        $fileFoto = $this->request->getFile('foto');
        if ($fileFoto && $fileFoto->isValid() && !$fileFoto->hasMoved()) {
            $newName = $fileFoto->getRandomName();
            $fileFoto->move(FCPATH . 'uploads/foto', $newName);
            $data['foto'] = $newName;
        }

        if (empty($id)) {
            // INSERT
            $this->db->table('sdm')->insert($data);
            return $this->respond(['status' => true, 'message' => 'Data berhasil ditambahkan']);
        } else {
            // UPDATE
            $this->db->table('sdm')->where('id', $id)->update($data);
            return $this->respond(['status' => true, 'message' => 'Data berhasil diperbarui']);
        }
    }

    // API: Hapus Data
    public function hapus($id)
    {
        // Set bawahan menjadi root sementara atau hapus relasi jika bosnya dihapus
        $this->db->table('sdm')->where('parent_id', $id)->update(['parent_id' => null]);
        $this->db->table('sdm')->where('id', $id)->delete();
        
        return $this->respond(['status' => true, 'message' => 'Data berhasil dihapus']);
    }
}
