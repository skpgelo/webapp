<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\PesertaModels;

class PesertaControllers extends BaseController
{
    protected $pesertaModel;

    public function __construct()
    {
        $this->pesertaModel = new PesertaModels();
    }
    
    public function index()
    {
        $data['peserta'] = $this->pesertaModel->findAll();
        return view('peserta/index', $data);
    }

    // 2. CREATE: Form Tambah Data
    public function create()
    {
        return view('peserta/create');
    }

    // 2. CREATE: Proses Simpan ke Database
    public function store()
    {
        $this->pesertaModel->save([
            'nama'           => $this->request->getPost('nama'),
            'nik'            => $this->request->getPost('nik'),
            'email'          => $this->request->getPost('email'),
            'nomor_telepon'  => $this->request->getPost('nomor_telepon'),
            'desa'           => $this->request->getPost('desa'),
            'kecamatan'      => $this->request->getPost('kecamatan'),
            'kabupaten_kota' => $this->request->getPost('kabupaten_kota'),
            'provinsi'       => $this->request->getPost('provinsi'),
            'latitude'       => $this->request->getPost('latitude'),
            'longitude'      => $this->request->getPost('longitude'),
            'gender'         => $this->request->getPost('gender'),
            'nikah'          => $this->request->getPost('nikah'),
        ]);

        return redirect()->to('/peserta')->with('success', 'Data berhasil ditambahkan.');
    }

    // 3. UPDATE: Form Edit Data
    public function edit($id)
    {
        $data['peserta'] = $this->pesertaModel->find($id);
        if (!$data['peserta']) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }
        return view('peserta/edit', $data);
    }

    // 3. UPDATE: Proses Simpan Perubahan
    public function updateData($id)
    {
        $this->pesertaModel->update($id, [
            'nama'           => $this->request->getPost('nama'),
            'nik'            => $this->request->getPost('nik'),
            'email'          => $this->request->getPost('email'),
            'nomor_telepon'  => $this->request->getPost('nomor_telepon'),
            'desa'           => $this->request->getPost('desa'),
            'kecamatan'      => $this->request->getPost('kecamatan'),
            'kabupaten_kota' => $this->request->getPost('kabupaten_kota'),
            'provinsi'       => $this->request->getPost('provinsi'),
            'latitude'       => $this->request->getPost('latitude'),
            'longitude'      => $this->request->getPost('longitude'),
            'gender'         => $this->request->getPost('gender'),
            'nikah'          => $this->request->getPost('nikah'),
        ]);

        return redirect()->to('/peserta')->with('success', 'Data berhasil diperbarui.');
    }

    // 4. DELETE: Hapus Data
    public function delete($id)
    {
        $this->pesertaModel->delete($id);
        return redirect()->to('/peserta')->with('success', 'Data berhasil dihapus.');
    
    }

    // 4. DELETE: Hapus Data
    public function statistik_peserta()
    {

        // Contoh Query: SELECT pendidikan, COUNT(*) as total FROM data_penduduk GROUP BY pendidikan
        $dataGroup = $this->pesertaModel->select('gender, COUNT(*) as total')
                           ->groupBy('gender')
                           ->findAll();

        // Pisahkan label (pendidikan) dan nilai (total) untuk Chart.js
        $data['label'] = [];
        $data['total'] = [];

        foreach ($dataGroup as $row) {
            $data['label'][] = $row['gender'];
            $data['total'][] = (int)$row['total'];
        }

        // $data['getPesertaCountData'] = $this->pesertaModel->getPesertaCountData();
        $data['getPesertaChartData'] = $this->pesertaModel->getPesertaChartData();
        $data['totalUsers'] = $this->pesertaModel->countAll();
        $data['totalPeserta'] = $this->pesertaModel->where('provinsi', 'Jawa Timur')->countAllResults();
        $data['maleCount'] = $this->pesertaModel->where('gender', 1)->countAllResults();
        $data['femaleCount'] = $this->pesertaModel->where('gender', 2)->countAllResults();
        $data['nbCount'] = $this->pesertaModel->where('gender', 3)->countAllResults();
        $data['statistik_Kabkot'] = $this->pesertaModel->hitungKabkot();
        $data['statistik_Prov'] = $this->pesertaModel->hitungProv();
        //kondisi
        $activeUsers = $this->pesertaModel->where('provinsi', 'Jawa Barat')->countAllResults();
        $data['activeUsers'] = $activeUsers;

        return view('peserta/statistik_peserta', $data);
    }

    public function count_peserta()
    {
        $data['peserta'] = $this->pesertaModel->findAll();

        return view('peserta/statistik_peserta', $data);
    }

    // $db      = \Config\Database::connect();
    // $query   = $db->query('SELECT * FROM nama_tabel');
    // $results = $query->getResultArray();

    // $jumlahData = count($results); 

    // Mengambil semua data sebagai objek
// $dataObjek = $query->getResult();

// Mengambil semua data sebagai array
// $dataArray = $query->getResultArray();
    }   
