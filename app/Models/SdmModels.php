<?php

namespace App\Models;

use CodeIgniter\Model;

class SdmModels extends Model
{
    protected $table            = 'sdman';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['nama', 'jabatan', 'parent_id'];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

        public function getOrgData()
    {
        return $this->orderBy('parent_id', 'ASC')->findAll();
    }

}
