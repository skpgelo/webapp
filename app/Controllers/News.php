<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\NewsModel;

class News extends Controller
{
public function add()
{
    $data['title'] = 'Tambah Berita';
    $data['menu'] = 'news';
    return view('berita/add', $data);
}
 
public function save()
{
    $rules = [
        'isi_berita' => 'required',
        'isi_gambar'     => 'uploaded[image_file]|is_image[image_file]',
        'judul_berita' => 'required'
    ];
 
    if($this->validate($rules)){
        $model = new NewsModel();
        $fileImage_name = "";
        if(isset($_FILES) && @$_FILES['image_file']['error'] != '4') {
            if($fileImage = $this->request->getFile('isi_gambar')) {
                if (! $fileImage->isValid()) {
                    throw new \RuntimeException($fileImage->getErrorString().'('.$fileImage->getError().')');
                } else {            
 
                    $fileImage->move('berita');
                    $fileImage_name = $fileImage->getName();
                }
            }
        }
 
        $slug = $model->checkSlug(url_title($this->request->getVar('judul_berita'), '-', TRUE));
        $data = [
            'isi_berita' => $this->request->getVar('isi_berita'),
            'slug' => $slug,
            'judul_berita' => $this->request->getVar('judul_berita'),
            'isi_gambar' => $fileImage_name
            // 'publish_date'    => $this->request->getVar('publish_date')
        ];
         
        $model->save($data);
 
        return redirect()->to(base_url('/berita/list?page=1'));
 
    } else {
        $data['validation'] = $this->validator;
        $data['title'] = 'Tambah Berita';
        $data['menu'] = 'Berita';
        return view('berita/add', $data);
    }
}
}