<?php

namespace App\Models;

use CodeIgniter\Model;

class PesertaModels extends Model
{
    protected $table            = 'peserta';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'nama', 'nik', 'email', 'nomor_telepon', 'desa', 
        'kecamatan', 'kabupaten_kota', 'provinsi', 
        'latitude', 'longitude', 'gender', 'nikah'
    ];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

           public function getPesertaChartData()
    {
        return $this->select('kabupaten_kota, COUNT(id) as total_kabupaten_kota')
                    ->groupBy('kabupaten_kota')
                    ->findAll();
    }
       public function getPesertaCountData()
    {
        return $this->select('id, COUNT(id) as total_id')
                    // ->groupBy('gol')
                    ->findAll();
    }

        public function hitungKabkot()
    {
        return $this->db->table($this->table)
            ->select('kabupaten_kota, COUNT(*) as total')
            ->groupBy('kabupaten_kota')
            ->get()
            ->getResultArray();
    }

            public function hitungProv()
    {
        return $this->db->table($this->table)
            ->select('provinsi, COUNT(*) as total')
            ->groupBy('provinsi')
            ->get()
            ->getResultArray();
    }
}
