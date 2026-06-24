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

    public function getGoogleOrgData()
    {
        return $this->orderBy('parent_id', 'ASC')->findAll();
    }

    public function getBalkanOrgData()
    {
        return $this->select('id, parent_id as pid, nama as name, jabatan as title, foto as foto')
                     ->orderBy('parent_id', 'ASC')
                     ->orWhere('parent_id', 0)
                     ->orWhere('parent_id', 1)
                     ->orWhere('parent_id', 2)
                     ->orWhere('parent_id', 2)
                     ->orWhere('parent_id', 4)
                     ->findAll();
    }
}
