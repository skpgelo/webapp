<?php

namespace App\Models;

use CodeIgniter\Model;

class RegulasiModels extends Model
{
    protected $table            = 'regulasi';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
'id_hirarki',
'id_status',
'judul',
'tentang',
'jenis_peradilan',
'tempat_penetapan',
'pemrakarsa',
'nomor',
'sumber',
'tgl_terbit',
'aktif',
'pdf',
'abstrak',
'kata_kunci',
'bahasa',
'created_at',
'updated_at',
'deleted_at',
'file_name',
'file_path',
'file_type'];

     // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

}
