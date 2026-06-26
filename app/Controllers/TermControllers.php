<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\TermModels;

class TermControllers extends BaseController
{
    protected $produkModel;
 
    public function __construct()
    {
        $this->produkModel = new TermModels();
        helper(['form']);
    }
 
    public function index()
    {
        $data['produk'] = $this->produkModel->findAll();
        return view('term/index', $data);
    }
 
    public function create()
    {
        return view('term/create');
    }
 
    public function store()
    {
        $this->produkModel->save([
            'kode_produk' => $this->request->getPost('kode_produk'),
            'nama_produk' => $this->request->getPost('nama_produk'),
            'harga'       => $this->request->getPost('harga'),
            'stok'        => $this->request->getPost('stok'),
        ]);
        return redirect()->to('/term');
    }
 
    public function edit($id)
    {
        $data['produk'] = $this->produkModel->find($id);
        return view('term/edit', $data);
    }
 
    public function update($id)
    {
        $this->produkModel->update($id, [
            'kode_produk' => $this->request->getPost('kode_produk'),
            'nama_produk' => $this->request->getPost('nama_produk'),
            'harga'       => $this->request->getPost('harga'),
            'stok'        => $this->request->getPost('stok'),
        ]);
        return redirect()->to('/term');
    }
 
    public function delete($id)
    {
        $this->produkModel->delete($id);
        return redirect()->to('/term');
    }
}
