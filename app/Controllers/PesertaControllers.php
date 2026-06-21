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
}
