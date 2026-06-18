<?php
namespace App\Models;

use CodeIgniter\Model;

class GreekModel extends Model 
{
protected $table = "admin";
protected $primaryKey = "id";
protected $allowFields = ['username', 'email', 'password'];
// protected $allowFields = ['id','username', 'password', 'email', 'created_at', 'last_login'];

/** ambil data */

}
