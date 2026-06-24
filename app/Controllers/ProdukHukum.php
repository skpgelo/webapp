<?php

namespace App\Controllers;
use App\Models\ProdukhukumModel;

class ProdukHukum extends BaseController
{
    public function __construct()
    {
        helper('form');
        helper('download');
        // helper('tgl_indo');
        $produkhukumModel = new ProdukhukumModel();
    }
    public function index(): string
    {
        return view('berkala/index');
    }   

    public function produk_hukum(): string
    {
        $data['title'] = 'Produk Hukum';
        $data['db'] = 'Informasi Berkala';
        $data['juduldb'] = 'Produk Hukum';
        $data['produk_huk'] = $produkhukumModel->viewProdukHuk();
        return view('produkhukum/produk_hukum',$data);
    }

    public function tambah_produk_hukum()
    // if(!$this->validate([]))        $data['articles'] = $this->artikel->viewArtikel();

    {
        // $data['berita'] = $this->beritaModel->viewBerita();
        // $al = getClientIpAddress(); 
  
        $getloc = json_decode(file_get_contents("http://ipinfo.io/"));
      
        $lokasi = $getloc->city; //ambil lokasi
        $coordinates = explode(",", $getloc->loc); // -> '32,-72' becomes'32','-72'
        $lat = $coordinates[0]; // ambil lat
        $lon = $coordinates[1]; // ambil lon
        
              $data = [
            'title' => 'UPLOAD PRODUK hUKUM',
            'db'    => 'Produk Hukum',
            'juduldb' => 'Tambah Produk Hukum',
            'lokasi'=> $lokasi,
            'lat'=>$lat,
            'lon'=>$lon,
            // 'produk_huk' => $this->produkHukumModel->viewDetailProdukHuk(),
        ];
        if($this->request->getMethod() == 'post'){
            $file = $this->request->getFiles();
            foreach ($file['isi_pdf'] as $img) {
                if($img->isValid() && !$img->hasMoved()) {
                    if($img->move(FCPATH.'public/produk_hukum')) 
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
        return view('produkhukum/tambah_produk_hukum',$data);
    }

    function file_download()
    {
        $url_para = $_GET['nama_file'];
        $slug = $_GET['slug'];
        $data = file_get_contents(site_url().'/../images/uploads/'.$slug."/".$url_para[0]);
        // $name = 'myphoto.jpg';

        force_download($data);
}

public function save()
{
    $files = $this->request->getFiles();
    $file = $this->request->getFile('isi_pdf');
    $tentang = $this->request->getPost('tentang');
    $slug       = url_title($tentang, '-', TRUE);
    $nomor = $this->request->getPost('nomor');
    $tahun = $this->request->getPost('tahun');
    $id_hirarki = $this->request->getPost('id_hirarki ');
    $hirarki = $this->request->getPost('hirarki ');
    $keterangan = $this->request->getPost('keterangan');
    $nama_pdf = $file($nomor, '-', $tahun, '-', $tentang, TRUE);
    $autor = $this->request->getPost('autor');
    $lokasi = $this->request->getPost('lokasi');
    $lat = $this->request->getPost('lat');
    $lon = $this->request->getPost('lon');
    $active = 1;

    if($files) {
        $random = rand(000,999);

        $data_prodhuk = [
            'id_prodhuk' => $random,
            'slug'  => $slug,
            'nomor' => $nomor,
            'tahun' => $tahun,
            'id_hirarki' => $id_hirarki,
            'hirarki' => $hirarki,
            'tentang' => $tentang,
            'keterangan' => $keterangan,
            'isi_pdf' => $nama_pdf,
            'autor' => $autor,
            'lokasi' => $lokasi,
            'lat' => $lat,
            'lon' => $lon,
            'active'=> $active,
        ];
        $this->produkhukumModel->insertProdHuk($data_prodhuk);
        $file->move(ROOTPATH.'public/galeri', $nama_pdf);
        // $name->move(ROOTPATH.'public/galeri',$name->getRandomName());

        // foreach ($files['gambar'] as $key => $img) {
            // $data_hirarki = [
            //     'id_hirarki' => $random,
            //     'no_hirarki' => $no_hirarki,
            //     'hirarki' => $hirarki,
            // ];
            // $this->produkhukumModel->insertHirarki($data_hirarki);
            // $img->move(ROOTPATH.'public/galeri',$img->getRandomName());
        // }
        session()->setFlashdata('success', 'Data berhasil ditambahkan');
        return redirect()->to(base_url('berita'));
    }

}

public function produk_hukum_uu(): string
{

    $produkhukumModel = new ProdukhukumModel();

     $data['title'] = 'Produk Hukum';
     $data['section_header'] = '[Informasi Berkala]';
     $data['sub_section_header'] = 'Informasi yang Wajib Disediakan dan Diumumkan Secara Berkala';
     $data['card_header'] = 'Daftar Produk Hukum';
     $data['produk_huk'] = $produkhukumModel->viewProdukHuk();
    return view('produkhukum/produk_hukum_uu',$data);
}
        public function tab()
    {
        $data['title']        = 'Upload PDF';
        $data['page_heading'] = 'Tambah Berkas Baru';

        return view('regulasi/modules/mod_sidebar', $data);
    }


}
