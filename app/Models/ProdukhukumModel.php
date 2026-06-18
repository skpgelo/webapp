<?php

namespace App\Models;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\Model;

class ProdukhukumModel extends Model
{
    protected $table        = "produkhukum";
    protected $primaryKey   = 'id_produkhukum';

    protected $useAutoIncrement = true;

    protected $returnType     = 'array';
    protected $useSoftDeletes = true;

    // protected $allowedFields = ['name', 'email'];

    public function viewProdukHuk($slug = false)
    {
        if($slug === false){
        return $this->db->table('produkhukum')
                    // ->select('berita.autor','berita.created_at','berita.lokasi','berita.create_at','berita.judul_berita','berita.isi_berita','berita.isi_gambar','galeri.gambar')
                    ->select('*')
                    // ->join('galeri', 'berita.id_berita=galeri.id_berita')
                    ->orderBy('hirarki', 'asc')
                    ->orderBy('tahun', 'asc')
                    ->orderBy('nomor', 'asc')
                    ->get()
                    ->getResultArray();
    } else {
        return $this->db->table('produkhukum')
                    // ->join('galeri', 'berita.id_berita=galeri.id_berita')
                    ->where('slug', $slug)
                    ->orderBy('hirarki', 'asc')
                    ->orderBy('tahun', 'asc')
                    ->orderBy('nomor', 'asc')
                    ->get()
                    ->getRowArray();
    }
    }

    public function viewDetailProdukHuk($slug = false)
    {
        if($slug === false){
        return $this->db->table('produkhukum')
                    // ->select('berita.autor','berita.created_at','berita.lokasi','berita.create_at','berita.judul_berita','berita.isi_berita','berita.isi_gambar','galeri.gambar')
                    ->select('*')
                    // ->join('galeri', 'berita.id_berita=galeri.id_berita')
                    ->orderBy('hirarki', 'asc')
                    ->orderBy('tahun', 'asc')
                    ->orderBy('nomor', 'asc')
                    ->get()
                    ->getResultArray();
    } else {
        return $this->db->table('produkhukum')
                    // ->join('galeri', 'berita.id_berita=galeri.id_berita')
                    ->where('slug', $slug)
                    ->orderBy('hirarki', 'asc')
                    ->orderBy('tahun', 'asc')
                    ->orderBy('nomor', 'asc')
                    ->get()
                    ->getRowArray();
    }
    }

    function insertHirarki($data_hirarki) 
    {
        // protected $table = 'galeri';
        return $this->db->table('hirarkihukum')->insert( $data_hirarki);
    }

    function insertProdHuk($data_prodhuk) 
    {
        // protected $table = 'galeri';
        return $this->db->table('produkhukum')->insert( $data_prodhuk);
    }

    public function tambahProdukHuk()
    {
  $al = getClientIpAddress(); 
  
  $getloc = json_decode(file_get_contents("http://ipinfo.io/"));

  $lokasi = $getloc->city; //ambil lokasi
  $coordinates = explode(",", $getloc->loc); // -> '32,-72' becomes'32','-72'
  $lat = $coordinates[0]; // ambil lat
  $lon = $coordinates[1]; // ambil lon
  
    }

}