<?php

namespace App\Controllers;

use App\Models\BeritaModel;
use App\Models\KategoriModel;
use App\Models\TematikModel;

class BeritaController extends BaseController
{
    protected $beritaModel;

    public function __construct()
    {
        $this->beritaModel = new BeritaModel();
    }

    public function index()
    {
        $data['title'] = 'Produk Hukum';
        $data['section_header'] = '[Informasi Berkala]';
        $data['sub_section_header'] = 'Informasi yang Wajib Disediakan dan Diumumkan Secara Berkala';
        $data['card_header'] = 'Daftar Produk Hukum';

        $data['berita'] = $this->beritaModel
            ->select('berita.*, kategori_berita.kategori')
            ->join('kategori_berita', 'kategori_berita.id = berita.id_kategori', 'left')
            ->orderBy('berita.created_at', 'DESC') // <-- INI KUNCI DESC
            ->findAll();

        return view('berita/index', $data);
    }
    public function create()
    {
        $data['kategori'] = (new KategoriModel())->findAll();
        $data['tematik'] = (new TematikModel())->findAll();
        return view('berita/create', $data);
    }

    public function store()
    {
    if (!$this->request->isAJAX()) {
        return $this->response->setJSON(['status' => 'error', 'message' => 'Invalid Request']);
    }

    $validationRules = [
        'judul_berita' => 'required|max_length[255]',
        'isi_berita'   => 'required',
        'foto'         => [
            'rules'  => 'uploaded[foto]|is_image[foto]|mime_in[foto,image/jpg,image/jpeg,image/png,image/webp]|max_size[foto,2048]|max_dims[foto,3000,3000]',
            'errors' => [
                'uploaded' => 'Foto wajib diupload',
                'is_image' => 'File bukan gambar',
                'mime_in'  => 'Tipe file tidak diizinkan. Hanya JPG, JPEG, PNG, WEBP',
                'max_size' => 'Ukuran max 2MB',
                'max_dims' => 'Dimensi gambar terlalu besar'
            ]
        ]
    ];

    if (! $this->validate($validationRules)) {
        return $this->response->setJSON(['status' => 'error', 'message' => $this->validator->getErrors()]);
    }

    $foto = $this->request->getFile('foto');
    
    // Cek ganda: pastikan beneran file gambar
    if (!$foto->isValid() || !$foto->guessExtension() || !in_array($foto->guessExtension(), ['jpg','jpeg','png','webp'])){
        return $this->response->setJSON(['status' => 'error', 'message' => 'File tidak valid']);
    }

    // Ganti nama file acak + hapus nama asli
    $namaBaru = $foto->getRandomName(); 
    $foto->move('uploads/berita', $namaBaru);

    // ... simpan ke DB
}

public function edit($id)
{
    $data['berita'] = $this->beritaModel->find($id);
    $data['kategori'] = (new KategoriModel())->findAll();
    $data['tematik'] = (new TematikModel())->findAll();
    return view('berita/edit', $data);
}

public function update($id)
{
    if (!$this->request->isAJAX()) {
        return $this->response->setJSON(['status' => 'error', 'message' => 'Invalid Request']);
    }

    $beritaLama = $this->beritaModel->find($id);
    $foto = $this->request->getFile('foto');
    $data = [
        'id_kategori' => $this->request->getPost('id_kategori'),
        'id_tematik'  => $this->request->getPost('id_tematik')?: null,
        'judul_berita'=> $this->request->getPost('judul_berita'),
        'slug'        => $this->request->getPost('slug'),
        'isi_berita'  => $this->request->getPost('isi_berita'),
        'kontributor' => $this->request->getPost('kontributor'),
    ];

    // CEK APA ADA UPLOAD FOTO BARU
    if ($foto && $foto->isValid() && !$foto->hasMoved())
    {
        // Validasi file baru
        if (!$this->validate(['foto' => 'is_image|mime_in[foto,image/jpg,image/jpeg,image/png,image/webp]|max_size[foto,2048]'])) {
            return $this->response->setJSON(['status' => 'error', 'message' => $this->validator->getErrors()]);
        }

        // 1. HAPUS FOTO LAMA DARI SERVER
        $fotoLama = $this->request->getPost('foto_lama');
        if (file_exists($fotoLama) && !empty($fotoLama)) {
            unlink($fotoLama); // <-- INI PENGHAPUS FILE
        }

        // 2. UPLOAD FOTO BARU
        $namaBaru = $foto->getRandomName();
        $foto->move('uploads/berita', $namaBaru);
        $data['nama_foto'] = $foto->getName();
        $data['foto'] = 'uploads/berita/'. $namaBaru;
    }

    $this->beritaModel->update($id, $data);

    return $this->response->setJSON(['status' => 'success', 'message' => 'Data berhasil diupdate']);
}

public function delete($id)
{
    $berita = $this->beritaModel->find($id);
    
    // Hapus file dari folder
    if (file_exists($berita['foto']) && !empty($berita['foto'])) {
        unlink($berita['foto']);
    }

    $this->beritaModel->delete($id);

    return redirect()->to('/berita')->with('success', 'Data berhasil dihapus');
}

}