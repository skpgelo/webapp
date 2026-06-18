<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\SdmPostModels;
use App\Models\KategoriModels;

class SdmPostController extends Controller
{
    public function __construct()
    {
        $this->sdmpost = new SdmPostModels();
        $this->category = new KategoriModels();
    }
    public function index()
    {
        if (!session()->has('login')) {
            return redirect()->to(base_url('auth'));
        }
        $data['post'] = $this->post->getPost();
        return view('admin/post/index', $data);
    }

    public function create()
    {
         if (!session()->has('login')) {
            return redirect()->to(base_url('auth'));
        }
        $data['category'] = $this->category->getKategori();
        return view('admin/post/create', $data);
    }

    public function store()
    {
        $category_id = $this->request->getPost('category_id');
        $title = $this->request->getPost('title');
        $image = $this->request->getFile('image');
        $content = $this->request->getPost('content');
        $date = $this->request->getPost('date');

        $file = $image->getRandomName();
        $image->move(ROOTPATH . 'public/uploads', $file);

        $data = [
            'category_id' => $category_id,
            'title' => $title,
            'image' => $file,
            'content' => $content,
            'date' => $date
        ];

        $query = $this->post->insert_data($data);
        if ($query) {
            session()->setFlashdata('success', 'Data post berhasil disimpan');
            return redirect()->to(base_url('post'));
        }
    }
    public function edit($id)
    {
        if (!session()->has('login')) {
            return redirect()->to(base_url('auth'));
        }
        $data['post'] = $this->post->getPost($id);
        $data['category'] = $this->category->getKategori();
        return view('admin/post/update', $data);
    }
    public function update($id)
    {
        $category_id = $this->request->getPost('category_id');
        $title = $this->request->getPost('title');
        $content = $this->request->getPost('content');
        $date = $this->request->getPost('date');

        if (!empty($_FILES['image']['name'])) {
            //return 'true';
            $image = $this->request->getFile('image');
            $file = $image->getRandomName();
            $image->move(ROOTPATH . 'public/uploads', $file);
            unlink('uploads/' . $this->request->getPost('old_image'));
        } else {
            $file = $this->request->getPost('old_image');
        }

        $data = [
            'category_id' => $category_id,
            'title' => $title,
            'image' => $file,
            'content' => $content,
            'date' => $date
        ];

        $query = $this->post->update_data($data, $id);
        if ($query) {
            session()->setFlashdata('info', 'Data Post berhasil diubah');
            return redirect()->to(base_url('post'));
        }
    }

    public function delete($id)
    {
        $query = $this->post->delete_data($id);
        if ($query) {
            session()->setFlashdata('warning', 'Data post berhasil dihapus');
            return redirect()->to(base_url('post'));
        }
    }
    public function blog($id)
    {
        $data['post'] = $this->post->getPost($id);
        $data['riwayat'] = $this->post->getRiwayat(5);
        $data['kategori'] = $this->category->getKategori();
        return view('detail', $data);
    }
    public function search()
    {
        $search = $this->request->getPost('search');
        $data['search_data'] = [
            'title' => $search
        ];
        $data['post'] = $this->post->getPostSearch($search);
        return view('search', $data);
    }

    public function kategori($id)
    {
        $data['post'] = $this->post->getKategori($id);
        $data['riwayat'] = $this->post->getRiwayat(5);
        $data['kategori'] = $this->category->getKategori();
        return view('category', $data);
    }
}
