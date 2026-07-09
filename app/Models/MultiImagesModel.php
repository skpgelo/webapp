<?php

namespace App\Models;

use CodeIgniter\Model;

class MultiImagesModel extends Model
{
    protected $table            = 'tabel_multiimages';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'object';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'nip', 'nama', 'jabatan', 'gender', 'nikah', 
        'alamat', 'desa', 'kecamatan', 'image', 'image_thumb', 'lokasi_pdf'
];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

}
