<?php

namespace App\Models;

use CodeIgniter\Model;

class PesertaModels extends Model
{
    protected $table            = 'peserta';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'object';
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

}
