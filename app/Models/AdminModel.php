<?php
namespace App\Models;

use CodeIgniter\Model;

class AdminModel extends Model 
{
protected $table = "admin";
protected $primaryKey = "id";
protected $allowFields = ['username', 'email', 'password'];
// protected $allowFields = ['id','username', 'password', 'email', 'created_at', 'last_login'];

/** ambil data */
public function getData($paramater)
{
    $builder = $this->table($this->table);
    $builder -> where('username',$paramater);
    $builder -> orWhere('email',$paramater);
    $query = $builder->get();
    return $query->getRowArray();
}

//update/simpan data
public function updateData($data)
{
    $builder = $this->table($this->table);
    if($builder->save($data)) {
        return true;
    } else {
        return false;
    }

}


}
