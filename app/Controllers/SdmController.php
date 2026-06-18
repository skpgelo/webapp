<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\SliderModel;
use App\Models\SdmModels;


class SdmControllers extends BaseController
{
    public function index()
    {
        $sdmModel = new SdmModels();
        
        // Mengambil semua data slider dari database
        $data['title'] = 'SDM';
        $data['section_header'] = 'SDM';
        $data['card_header'] = 'SDM';
        $data['sdm'] = $sdmModel->findAll(); 
        // $data = [
        //         'title' => "Grafik",
        //         'program_studi' => $this->grafik->prodi(),
        //         'jenis_kelamin' => $this->grafik->jenis_kelamin(),
        //     ];
        return view('sdm/indexsdm', $data);
    }
    
    public function indexslider()
    {
        $sliderModel = new SliderModel();
        
        // Mengambil semua data slider dari database
        $data['sdm'] = $sliderModel->findAll(); 

        return view('sdm/sdm_view', $data);
    }
    
    public function sdmSlider()
    {
        $sliderModel = new SliderModel();
        
        // Mengambil semua data slider dari database
        $data['sdm_sliders'] = $sliderModel->findAll(); 

        return view('sdm/sdm_slider_view', $data);
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

    public function editblog(){
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
	// public function indexsdm()
	// {
		// $session = \Config\Services::session($config);
		// Proteksi
		// if($session->get('username') =="") {
		// 	$session->setFlashdata('sukses', 'Anda belum login');
		// 	return redirect()->to(base_url('login'));
		// }
		// End proteksi
	// 	$model = new Berita_model();
	// 	$berita = $model->listing();
	// 	$data = array(	'title'		=> 'Data Berita',
	// 					'berita'	=> $berita,
	// 					'content'	=> 'admin/berita/index');
	// 	return view('admin/layout/wrapper',$data);
	// }

	// Tambah
	public function tambah()
	{
		helper(['form', 'url']);
		$image = \Config\Services::image();
		$session = \Config\Services::session($config);
		// Proteksi
		if($session->get('username') =="") {
			$session->setFlashdata('sukses', 'Anda belum login');
			return redirect()->to(base_url('login'));
		}
		// End proteksi
		$mk 		= new Kategori_model();
		$kategori 	= $mk->listing();

		// Start validasi
		$validated =  $this->validate([
			'judul_berita' 	=> 'required',
			'isi' 			=> 'required',
			'gambar'	 	=> [
                'uploaded[gambar]',
                'mime_in[gambar,image/jpg,image/jpeg,image/gif,image/png]',
                'max_size[gambar,4096]',
            ],
		]);
		
		if ($validated) {
			// Image upload
			$avatar  	= $this->request->getFile('gambar');
			$namabaru 	= $avatar->getRandomName();
            $avatar->move(WRITEPATH . '../assets/upload/image/',$namabaru);
        	// Masuk database
			$data = array(	'id_user'		=> 1,
							'id_kategori'	=> $this->request->getVar('id_kategori'),
							'slug_berita'	=> strtolower(url_title($this->request->getVar('judul_berita'))),
							'judul_berita'	=> $this->request->getVar('judul_berita'),
							'isi'			=> $this->request->getVar('isi'),
							'status_berita'	=> $this->request->getVar('status_berita'),
							'jenis_berita'	=> $this->request->getVar('jenis_berita'),
							'keywords'		=> $this->request->getVar('keywords'),
							'gambar'		=> $namabaru,
							'tanggal_post'	=> date('Y-m-d H:i:s')
						);
			$model = new Berita_model();
			$model->tambah($data);
			$session->setFlashdata('sukses', 'Data telah ditambah');
			return redirect()->to(base_url('admin/berita'));
			// End masuk database
        }
		$data = array(	'title'		=> 'Tambah Berita',
						'kategori'	=> $kategori,
						'content'	=> 'admin/berita/tambah');
		return view('admin/layout/wrapper',$data);
		
	}

	// Tambah
	public function edit($id_berita)
	{
		helper('form');
		$session = \Config\Services::session($config);
		// Proteksi
		if($session->get('username') =="") {
			$session->setFlashdata('sukses', 'Anda belum login');
			return redirect()->to(base_url('login'));
		}
		// End proteksi
		$mk 		= new Kategori_model();
		$mb 		= new Berita_model();
		$kategori 	= $mk->listing();
		$berita 	= $mb->detail($id_berita);

		// Start validasi
		$validated =  $this->validate([
			'judul_berita' 	=> 'required',
			'isi' 			=> 'required',
			'gambar'	 	=> [
                'uploaded[gambar]',
                'mime_in[gambar,image/jpg,image/jpeg,image/gif,image/png]',
                'max_size[gambar,4096]',
            ],
		]);
		
		if ($validated) {
			// Image upload
			$avatar  	= $this->request->getFile('gambar');
			$namabaru 	= $avatar->getRandomName();
            $avatar->move(WRITEPATH . '../assets/upload/image/',$namabaru);
        	// Masuk database
			$data = array(	'id_berita'		=> $this->request->getVar('id_berita'),
							'id_user'		=> 1,
							'id_kategori'	=> $this->request->getVar('id_kategori'),
							'slug_berita'	=> strtolower(url_title($this->request->getVar('judul_berita'))),
							'judul_berita'	=> $this->request->getVar('judul_berita'),
							'isi'			=> $this->request->getVar('isi'),
							'status_berita'	=> $this->request->getVar('status_berita'),
							'jenis_berita'	=> $this->request->getVar('jenis_berita'),
							'keywords'		=> $this->request->getVar('keywords'),
							'gambar'		=> $namabaru,
						);
			$model = new Berita_model();
			$model->edit($data);
			$session->setFlashdata('sukses', 'Data telah diedit');
			return redirect()->to(base_url('admin/berita'));
			// End masuk database
        }
		$data = array(	'title'		=> 'Edit Berita',
						'kategori'	=> $kategori,
						'berita'	=> $berita,
						'content'	=> 'admin/berita/edit');
		return view('admin/layout/wrapper',$data);
	}

	// Delete
	public function delete($id_berita)
	{
		$session = \Config\Services::session($config);
		// Proteksi
		if($session->get('username') =="") {
			$session->setFlashdata('sukses', 'Anda belum login');
			return redirect()->to(base_url('login'));
		}
		// End proteksi
		$model 	= new Berita_model();
		$berita = $model->hapus($id_berita);
		$session->setFlashdata('sukses', 'Data telah dihapus');
		return redirect()->to(base_url('admin/berita'));
	}

		public function indexx()
	{
        $pegawaiModel = new \App\Models\PegawaiModel();
        $pegawai = $pegawaiModel->findAll();

        return view('pegawai/index', [
            'pegawai' => $pegawai
        ]);
    }
    
    public function create()
    {
        helper('form');

        if($this->request->getMethod() == 'post'){
            $pegawai = [
                'nama' => $this->request->getPost('nama'),
                'nip' => $this->request->getPost('nip'),
                'alamat' => $this->request->getPost('alamat'),
                'telepon' => $this->request->getPost('telepon'),
            ];
            
            $pegawaiModel = new \App\Models\PegawaiModel();
            if($pegawaiModel->insert($pegawai)){
                session()->setFlashdata('success', 'Data berhasil disimpan');
                return redirect()->to('/pegawai/index');
            }

        }

        return view('pegawai/create');
    }

    public function update($id)
    {
        helper('form');

        $pegawaiModel = new \App\Models\PegawaiModel();
        $pegawai = $pegawaiModel->find($id);
        if(empty($pegawai)){
            session()->setFlashdata('error', 'Data tidak ditemukan');
            return redirect()->to('/pegawai/index');
        }

        if($this->request->getMethod() == 'post'){
            $pegawai = [
                'nama' => $this->request->getPost('nama'),
                'nip' => $this->request->getPost('nip'),
                'alamat' => $this->request->getPost('alamat'),
                'telepon' => $this->request->getPost('telepon'),
            ];
            
            if($pegawaiModel->update($id, $pegawai)){
                session()->setFlashdata('success', 'Data berhasil disimpan');
                return redirect()->to('/pegawai/index');
            }

        }

        return view('pegawai/update', [
            'pegawai' => $pegawai
        ]);
    }

    public function deletex($id)
    {
        helper('form');

        $pegawaiModel = new \App\Models\PegawaiModel();
        if($pegawaiModel->delete($id)){
            session()->setFlashdata('success', 'Data berhasil dihapus');
            return redirect()->to('/pegawai/index');
        }

    }


}

