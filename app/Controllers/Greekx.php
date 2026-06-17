<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\GreekModel;

class Greek extends Controller
{
    function __construct() 
    {
        $this->m_greek = new GreekModel();

        $this->validation = \config\Services::validation();
    }

    public function index(): string
    {
        helper(['form']);
        $data['title'] = 'Greek';
        return view('template_dbadmin/greek', $data);
    }
    
}
    // public function password(): string
    // {
    //     $data['title'] = 'Reset Password';
    //     return view('admin/password',$data);
    // }

    // public function users(): string
    // {
    //     $data['title'] = 'Users ';
    //     return view('admin/users',$data);
    // }


// }
