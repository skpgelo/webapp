<?php

namespace App\Controllers;
use App\Models\BeritaModel;
use App\Models\NewsModel;

class Berita extends BaseController
{
    protected $api = 'http://www.telize.com/geoip/%s';
    protected $properties = [];
    // protected $helpers = ['ip'];
    public function __get($key)
    {
        if(isset($this->properties[$key])){
            return $this->properties[$key];
        }
        return null;
        //
    }
// require 'Geo.php';
// $geo = new Geo;
// $geo->request('85.174.200.225');
// echo $geo->city;

    public function __construct()
    {
        helper('form');
        helper('ip');
        // helper('tgl_indo');
        $this->beritaModel = new BeritaModel();
    }

    public function request($ip)
    {
        $url = sprintf($this->api, $ip);
        $data = $this->sendRequest($url);

        $this->properties = json_decode($data, true);
    }

    public function sendRequest($url)
    {
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_URL, $url);
        
        return curl_exec($curl);
    } 
    public function index()
    {
        $model = new NewsModel();
        $data['news'] = $model->getLatestNews();
        foreach ($data['news'] as $key => $row) {
            $dataIsiNews["row"] = $row;
            $data["row".$row->id_berita] = view('berita/row_last_news', $dataIsiNews);
        }            
        $data['title'] = 'Halaman Utama';
        // return view('index', $data);
        return view('berita/index', $data);
    }

    public function berita()
    {
        $data['title'] = '';
        $data['db'] = 'Berita';
        $data['juduldb'] = 'berita dalam berita';
        $data['title'] = 'BERITA';
        $data['db'] = 'Berita';
        $data['juduldb'] = 'Semua Berita';
        $data['berita'] = $this->beritaModel->viewBerita();
        return view('berita/berita',$data);
    }

    public function detail_detail_berita()
    // if(!$this->validate([]))
    {
        $data['title'] = 'BERITA';
        $data['db'] = 'Berita';
        $data['juduldb'] = 'Semua Berita';
        $data['berita'] = $this->beritaModel->viewDetailBerita();
        return view('berita/detail',$data);
    }

    public function tambah_berita()
    // if(!$this->validate([]))        $data['articles'] = $this->artikel->viewArtikel();

    {
        // $data['berita'] = $this->beritaModel->viewBerita();
        $data = [
            'title' => 'UPLOAD BERITA',
            'db'    => 'Berita',
            'juduldb' => 'Tambah Berita',
            'berita' => $this->beritaModel->viewDetailBerita(),
        ];
        if($this->request->getMethod() == 'post'){
            $file = $this->request->getFiles();
            foreach ($file['isi_gambar'] as $img) {
                if($img->isValid() && !$img->hasMoved()) {
                    if($img->move(FCPATH.'public/galeri')) 
                    {
                        echo "<p>".$img->getName()." is move successfully! </p>";
                    }
                    else
                    {
                        echo "<p>".$img->getErrorString()."</p>";
                    }
                }
            }
        }
        return view('berita/tambah_berita',$data);
    }


    public function owl_carousel(): string
    {
        $m_admin = new AdminModel();

        $data['title'] = 'OWL';
        $data['juduladmin'] = 'owl Pengunjung';
        $data['oc'] = $this->m_berita->viewOwl();

        return view('admin/owl_carousel',$data);
    }
    // $tmp_name = $_FILES["myimage"]["tmp_name"];
    // $name = "images/".$_FILES['myimage']['name'];
    // $filename=$_FILES['myimage']['name'];
    
    // if(move_uploaded_file($tmp_name,$name))
    // {
    //     $insert_path="INSERT INTO image_table (path,name) VALUES('images/','$filename')";
    //     $var=mysql_query($insert_path);
    //     if(!$var)
    //     {
    //         die('Could not enter data: ' . mysql_error());
    //     }
    // }
    public function save()
    {
        $files = $this->request->getFiles();
        $file = $this->request->getFile('isi_gambar');
        $name = $file->getRandomName();
        $judul_berita = $this->request->getPost('judul_berita');
        $slug       = url_title($judul_berita, '-', TRUE);
        $isi_berita = $this->request->getPost('isi_berita');
        $autor = $this->request->getPost('autor');
        $lokasi = $this->request->getPost('lokasi');
        $lat = $this->request->getPost('lat');
        $lon = $this->request->getPost('lon');
        $active = 1;

        if($files) {
            $random = rand(000,999);

            $data_berita = [
                'id_berita' => $random,
                'slug'  => $slug,
                'judul_berita' => $judul_berita,
                'lokasi' => $lokasi,
                'lat' => $lat,
                'lon' => $lon,
                'isi_berita' => $isi_berita,
                'autor' => $autor,
                'active'=> $active,
                'isi_gambar'=> $name,
            ];
            $this->beritaModel->insertBerita($data_berita);
            $file->move(ROOTPATH.'public/galeri', $name);
            // $name->move(ROOTPATH.'public/galeri',$name->getRandomName());

            foreach ($files['gambar'] as $key => $img) {
                $data_galeri = [
                    'id_berita' => $random,
                    // 'gambar' => $img->getRandomName(),
                    'gambar' => $img,
                ];
                $this->beritaModel->insertGaleri($data_galeri);
                $img->move(ROOTPATH.'public/galeri',$img->getRandomName());
            }
            session()->setFlashdata('success', 'Data berhasil ditambahkan');
            return redirect()->to(base_url('berita'));
        }
   
    }
        
    public function detail_post()
	{
		$slug = $this->uri->segment(3);		
		$query['rows'] = $this->db->get_where('berita',['slug'=> $slug])->row();
		$this->load->view('detail',$query);
	}

    public function detailberitax($slug)
    {
    
        $data = [
            'title' => 'BOOK DETAIL',
            'detail' => $this->beritaModel->getBook($slug)
        ];
    
        if (empty($data['detail'])) {
            throw new CodeIgniterExceptionsPageNotFoundException('The Book' . $slug . 'is can not find');
        }
        return view('berita/detail', $data);
    }

//detailberita dari detail
    public function detailberita($slug = null)
	{
        $data=$this->beritaModel->viewDetailBerita($slug);
        // $data = $this->beritaModel->viewBerita();
        $data['title'] = 'BERITA';
        $data['db'] = 'Berita';
        $data['juduldb'] = 'Semua Berita';
        //     'db'    => 'Berita',
        //     'juduldb' => 'Detail Berita',
        // ];
        if(empty($data)){
            die("Artikel tidak ditemukan");
        } 

        return view('berita/detail_berita', compact('data'));
    }

    public function detail_berita()
	{
        $data['detail']=$this->beritaModel->viewDetailBerita();
        // $data = $this->beritaModel->viewBerita();
        $data = [
            'title' => 'UPLOAD BERITA',
            'db'    => 'Berita',
            'juduldb' => 'Detail Berita',
            // 'berita' => $this->beritaModel->viewBerita(),
        ];
        if(empty($data)){
            die("Artikel tidak ditemukan");
        } 

        return view('berita/detail_berita', $data);
    }

    public function savex()
    {
        $beritaModel = new BeritaModel();
        $data_berita = array(
            'isi_berita'        => $this->request->getPost('isi_berita'),
            'isi_gambar'        => $this->request->getPost('isi_gambar'),
            'autor'             => $this->request->getPost('autor')
        );
      
        $data_group = array(
            'id_group'    => $this->request->getPost('id_group')
        );    
      
        $this->$beritaModel->saveBerita($data_berita, $data_group);
        return redirect()->to(base_url('berita/berita'));
    }

    public function insert()
{      
    // $this->load->database();
    $beritaModel = new BeritaModel();

    $data_user = array(
        'isi_berita' => $this->request->getPost('isi_berita'),
        'isi_gambar' => $this->request->getPost('isi_gambar'),
        'autor'      => $this->request->getPost('autor')
    );

    $data_address = array(
        'id_berita'             => $this->request->getPost('id_berita'),
        'isi_berita_semua'      => $this->request->getPost('isi_berita_semua')
    );    

    $this->$beritaModel->insert_entry($data_user, $data_address);

    // [...]
}

}
