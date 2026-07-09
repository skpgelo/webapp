<?php

namespace App\Models;

use CodeIgniter\Model;

class SdmPostModels extends Model
{
    protected $table            = 'sdm';
    protected $primaryKey       = 'id';
    // protected $allowedFields    = ['nama', 'jabatan'];

   // Tambahkan kolom foto dan dokumen
    protected $allowedFields    = ['name', 'ttl', 'gender', 'status_peg', 'tahun_status', 'gol', 'tmt_gol', 'tmt_cpns', 'agama', 'pendidikan_dari', 'tingkat_penjengjangan', 'tahun_penjenjangan', 'jabatan', 'tmt_jabatan', 'tmt_dibalai', 'grade', 'ket', 'no', 'no_parent'];


    // protected $table = 'posts';

    public function getPost($id = false)
    {
        if ($id === false) {
            return $this->table('posts')
                ->select('*')
                ->join('categories', 'posts.category_id = categories.category_id')
                ->get()
                ->getResultArray();
        } else {
            return $this->table('posts')
                ->select('*')
                ->join('categories', 'posts.category_id = categories.category_id')
                ->where('posts.post_id', $id)
                ->get()
                ->getRowArray();
        }
    }

    public function insert_data($data)
    {
        return $this->db->table($this->table)->insert($data);
    }

    public function update_data($data, $id)
    {
        return $this->db->table($this->table)->update($data, ['post_id' => $id]);
    }

    public function delete_data($id)
    {
        $delete = $this->getPost($id);
        unlink('uploads/' . $delete['image']);
        return $this->db->table($this->table)->delete(['post_id' => $id]);
    }
    public function count_data()
    {
        return $this->table($this->table)->countAll();
    }

    public function getPostLimit($limit)
    {
        return $this->table($this->table)
            ->select('*')
            ->join('categories', 'posts.category_id = categories.category_id')
            ->limit($limit)
            ->orderby('posts.title', 'DESC')
            ->get()
            ->getResultArray();
    }

    public function getPostSearch($search)
    {
        return $this->table($this->table)
            ->select('*')
            ->join('categories', 'posts.category_id = categories.category_id')
            ->like('posts.title', $search)
            ->get()
            ->getResultArray();
    }

    public function getRiwayat($limit)
    {
        return $this->table($this->table)
            ->select('*')
            ->join('categories', 'posts.category_id = categories.category_id')
            ->limit($limit)
            ->orderby('posts.title', 'DESC')
            ->get()
            ->getResultArray();
    }
    
    public function getKategori($id)
    {
        return $this->table($this->table)
            ->join('categories', 'posts.category_id = categories.category_id')
            ->select('*')
            ->where('categories.category_id',$id)
            ->get()
            ->getResultArray();
    }

    public function getSdmByJabatan()
    {
        return $this->db->table('sdm')
            ->select('jabatan, COUNT(id) as total')
            ->groupBy('jabatan')
            ->get()
            ->getResultArray();
    }

    public function getSdmByGender()
    {
        return $this->db->table('sdm')
            ->select('gender, COUNT(id) as total')
            ->groupBy('gender')
            ->get()
            ->getResultArray();
    }
 
    public function getStatistikPendidikan()
    {
        return $this->db->table('sdm')
            ->select('pendidikan, COUNT(id) as total')
            ->groupBy('pendidikan')
            ->get()
            ->getResultArray();
    }
        // Menulis query SQL murni dengan klausa GROUP BY
    //     $sql = "SELECT 
    //                 pendidikan, 
    //                 COUNT(id) as total_pegawai,
    //                 MIN(gaji) as gaji_minimum,
    //                 MAX(gaji) as gaji_maksimum
    //             FROM pegawai 
    //             GROUP BY pendidikan 
    //             ORDER BY total_pegawai DESC";

    //     // Mengeksekusi query murni melalui properti koneksi $this->db
    //     $query = $this->db->query($sql);

    //     // Mengembalikan hasil berupa array
    //     return $query->getResultArray();
    // }

        public function getSdmByStatuspeg()
    {
        return $this->db->table('sdm')
            ->select('status_peg, COUNT(id) as total')
            ->groupBy('status_peg')
            ->get()
            ->getResultArray();
    }


        public function getSdmByGol()
    {
        return $this->db->table('sdm')
            ->select('gol, COUNT(id) as total')
            ->groupBy('gol')
            ->get()
            ->getResultArray();
    }

        public function getSdmByGrade()
    {
        return $this->db->table('sdm')
            ->select('grade, COUNT(id) as total')
            ->groupBy('grade')
            ->get()
            ->getResultArray();
    }

        public function getChartPendidikan()
    {
        return $this->select('pendidikan, COUNT(id) as total')
                    ->groupBy('pendidikan')
                    ->findAll();
    }

        public function getChartStatus()
    {
        return $this->select('status_peg, COUNT(id) as total')
                    ->groupBy('status_peg')
                    ->findAll();
    }

    // Method untuk mengambil total pegawai per jabatan
    public function getChartGol()
    {
        return $this->select('gol, COUNT(id) as total')
                    ->groupBy('gol')
                    ->findAll();
    }

        public function getChartGender()
    {
        return $this->select('gender, COUNT(id) as total')
                    ->groupBy('gender')
                    ->findAll();
    }

        public function getChartJabatan()
    {
        return $this->select('jabatan, COUNT(id) as total')
                    ->groupBy('jabatan')
                    ->findAll();
    }

       public function getChartData()
    {
        return $this->select('gol, COUNT(id) as total')
                    ->groupBy('gol')
                    ->findAll();
    }

    public function getSdmLimit($limit)
    {
        return $this->table($this->table)
            ->select('*')
            ->join('categories', 'posts.category_id = categories.category_id')
            ->limit($limit)
            ->orderby('posts.title', 'DESC')
            ->get()
            ->getResultArray();
    }

       public function getSdmCountData()
    {
        return $this->select('id, COUNT(id) as total_id')
                    // ->groupBy('gol')
                    ->findAll();
    }


}
