<?php namespace App\Controllers;
 
use CodeIgniter\Controller;
use App\Models\BlogModels;
 
class BlogController extends BaseController
{
    public function index()
    {
        $blogmodel = new BlogModels();
        if (!$this->validate([]))
        {
            $data['validation'] = $this->validator;
            $data['artikel'] = $blogmodel->getArtikel();
            return view('view_list',$data);
        }
    }

    public function form(){
        helper('form');
        return view('view_form');
    }

    public function view($id){
        $blogmodel = new BlogModels();
        $data['artikel'] = $blogmodel->PilihBlog($id)->getRow();
        return view('view',$data);
    }

    public function simpan(){
        $blogmodel = new BlogModels();
        if ($this->request->getMethod() !== 'post') {
            return redirect()->to('blog');
        }
        $validation = $this->validate([
            'file_upload' => 'uploaded[file_upload]|mime_in[file_upload,image/jpg,image/jpeg,image/gif,image/png]|max_size[file_upload,4096]'
        ]);
 
        if ($validation == FALSE) {
        $data = array(
            'judul'  => $this->request->getPost('judul'),
            'isi' => $this->request->getPost('isi')
        );
        } else {
            $upload = $this->request->getFile('file_upload');
            $upload->move(WRITEPATH . '../public/assets/images/');
        $data = array(
            'judul'  => $this->request->getPost('judul'),
            'isi' => $this->request->getPost('isi'),
            'gambar' => $upload->getName()
        );
        }
        $blogmodel->SimpanBlog($data);
        return redirect()->to('./blog')->with('berhasil', 'Data Berhasil di Simpan');
    }

    public function form_edit($id){
        $blogmodel = new BlogModels();
        helper('form');
        $data['artikel'] = $blogmodel->PilihBlog($id)->getRow();
        return view('form_edit',$data);
    }

    public function edit(){
        $blogmodel = new BlogModels();
        if ($this->request->getMethod() !== 'post') {
            return redirect()->to('blog');
        }
        $id = $this->request->getPost('id');
        $validation = $this->validate([
            'file_upload' => 'uploaded[file_upload]|mime_in[file_upload,image/jpg,image/jpeg,image/gif,image/png]|max_size[file_upload,4096]'
        ]);
 
        if ($validation == FALSE) {
        $data = array(
            'judul'  => $this->request->getPost('judul'),
            'isi' => $this->request->getPost('isi')
        );
        } else {
        $dt = $blogmodel->PilihBlog($id)->getRow();
        $gambar = $dt->gambar;
        $path = '../public/assets/images/';
        @unlink($path.$gambar);
            $upload = $this->request->getFile('file_upload');
            $upload->move(WRITEPATH . '../public/assets/images/');
        $data = array(
            'judul'  => $this->request->getPost('judul'),
            'isi' => $this->request->getPost('isi'),
            'gambar' => $upload->getName()
        );
        }
        $blogmodel->edit_data($id,$data);
        return redirect()->to('./blog')->with('berhasil', 'Data Berhasil di Ubah');
        
    }

    public function hapus($id){
        $blogmodel = new BlogModels();
        $dt = $blogmodel->PilihBlog($id)->getRow();
        $blogmodel->HapusBlog($id);
        $gambar = $dt->gambar;
        $path = '../public/assets/images/';
        @unlink($path.$gambar);
        return redirect()->to('./blog')->with('berhasil', 'Data Berhasil di Hapus');
    }

}