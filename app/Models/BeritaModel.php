<?php
namespace App\Models;

use CodeIgniter\Model;

class BeritaModel extends Model 
{

    function viewOwl() 
    {
        // protected $table = 'berita';
        return $this->db->table('galeri');
    }

    function insertGaleri($data_galeri) 
    {
        // protected $table = 'galeri';
        return $this->db->table('galeri')->insert( $data_galeri);
    }

    function insertBerita($data_berita) 
    {
        // protected $table = 'galeri';
        return $this->db->table('berita')->insert( $data_berita);
    }

    public function getAll($uid = false) {
  
      return $this->where(['hidden' => '0'])
                  ->where(['deleted' => '0'])
                  ->findAll();
  
    }
  
    public function getSekolah($slug = "")
    {
        if ($slug == false) {
            return $this->findAll();
        }
        return $this->where(['slug' => $slug])->first();
    }

    public function viewBeritax($slug = "")
    {
        if ($slug == false) {
            return $this->findAll();
        }
        return $this->where(['slug' => $slug])->first();
    }

    public function getDetailberita($slug = false)
    {
        return $this->where(['slug' => $slug])->first();
    }

    public function viewDetailBerita($slug = false)
    {
        if($slug === false){
        return $this->db->table('berita')
                    // ->select('berita.autor','berita.created_at','berita.lokasi','berita.create_at','berita.judul_berita','berita.isi_berita','berita.isi_gambar','galeri.gambar')
                    ->select('*')
                    // ->join('galeri', 'berita.id_berita=galeri.id_berita')
                    ->orderBy('berita.create_at', 'desc')
                    ->get()
                    ->getResultArray();
    } else {
        return $this->db->table('berita')
                    // ->join('galeri', 'berita.id_berita=galeri.id_berita')
                    ->where('slug', $slug)
                    ->get()
                    ->getRowArray();
    }
    }
    
    public function viewBerita($slug = false)
    {
        if($slug === false){
        return $this->db->table('berita')
                    // ->join('galeri', 'berita.id_berita=galeri.id_berita')
                    ->orderBy('berita.create_at', 'desc')
                    ->get()
                    ->getResultArray();
    } else {
        return $this->db->table('berita')
                    // ->join('galeri', 'berita.id_berita=galeri.id_berita')
                    ->orderBy('berita.create_at', 'desc')
                    ->where('slug', $slug)
                    ->get()
                    ->getRowArray();
    }
    }
    
    public function getMainImage($pid) {
        $db = \Config\Database::connect();
        $builder = $db->table('secondary_table');
        
        return $builder->where(['pid' => $pid])
             ->get()->getResult();
    }

    public function saveBerita($data_user, $data_group) {
        $this->db->table('berita')->insert($data_user);
        $data_group['id_berita'] = $this->db->insertID();

        return $this->db->table('groups_berita')->insert( $data_group);
    }

    function insertBeritax($data_user, $data_address) {
        $this->db->table('berita')->insert($data_user);
        $data_address['id_berita'] = $this->db->insertID();

        return $this->db->table('groups_berita')->insert( $data_address);
        // $this->db->insert('addresses', $data_address);
    }

    public function getBook($slug = false)
    {
        if ($slug == false) {
            return $this->findAll();
        }

        return $this->where(['slug' => $slug])->first();
    }

}