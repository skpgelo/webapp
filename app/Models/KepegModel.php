<?php
namespace App\Models;

use CodeIgniter\Model;

class KepegModel extends Model 
{

    function viewOwl($slug = false) 
    {
        // protected $table = 'berita';
        // return $this->db->table('galeri');
       
            if($slug === false){
            return $this->db->table('kepeg')
                        // ->join('galeri', 'berita.id_berita=galeri.id_berita','left')
                        ->get()
                        ->getResultArray();
        } else {
            return $this->db->table('kepeg')
                        // ->join('galeri', 'berita.id_berita=galeri.id_berita')
                        ->where('slug', $slug)
                        ->get()
                        ->getRowArray();
        }
        }


        public function viewGaleri($slug = false)
        {
            if($slug === false){
                return $this->db->table('galeri')
                            // ->join('galeri', 'berita.id_berita=galeri.id_berita','left')
                            ->get()
                            ->getResultArray();
            } else {
                return $this->db->table('galeri')
                            // ->join('galeri', 'berita.id_berita=galeri.id_berita')
                            // ->where('slug', $slug)
                            ->get()
                            ->getRowArray();
            }
        }

            public function viewGambar($slug = false)
    {
        if($slug === false){
            return $this->db->table('berita')
                        // ->join('galeri', 'berita.id_berita=galeri.id_berita','left')
                        ->get()
                        ->getResultArray();
        } else {
            return $this->db->table('berita')
                        // ->join('galeri', 'berita.id_berita=galeri.id_berita')
                        // ->where('slug', $slug)
                        ->get()
                        ->getRowArray();
        }
        //  return $this->db->table('galeri')
        //  ->join('berita','berita.id_berita=galeri.id_berita')
        //  ->join('jurusan', 'jurusan.IDJurusan=siswa.IDJurusan')
        //  ->get()->getResultArray();  
    }

    public function getGalerixx()
    {
    $builder->select('*')
            ->join('berita','berita.id_berita=galeri.id_berita')
            ->get();
    }
    public function getSiswa()
    {
         return $this->db->table('siswa')
         ->join('kelas','kelas.IDKelas=siswa.IDKelas')
         ->join('jurusan', 'jurusan.IDJurusan=siswa.IDJurusan')
         ->get()->getResultArray();  
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
                    ->join('galeri', 'berita.id_berita=galeri.id_berita')
                    ->get()
                    ->getResultArray();
    } else {
        return $this->db->table('berita')
                    ->join('galeri', 'berita.id_berita=galeri.id_berita')
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