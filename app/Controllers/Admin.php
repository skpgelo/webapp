<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\AdminModel;

class Admin extends Controller
{
    function __construct() 
    {
        $this->m_admin = new AdminModel();

        $this->validation = \config\Services::validation();
    }

    public function login()
    {
        // helper(['form']);
        $session = session();
        $m_admin = new AdminModel();
        $email = $this->request->getVar('email');
        $password = $this->request->getVar('password');
        
        $data = $m_admin->where('email', $email)->first();
        
        if($data){
            $pass = $data['password'];
            $authenticatePassword = password_verify($password, $pass);
            if($authenticatePassword){
                $ses_data = [
                    'id' => $data['id'],
                    'username' => $data['username'],
                    'email' => $data['email'],
                    'isLoggedIn' => TRUE
                ];
                $session->set($ses_data);
                return redirect()->to('/profile');
            
            }else{
                $session->setFlashdata('msg', 'Password is incorrect.');
                return redirect()->to('/signin');
            }
        }else{
            $session->setFlashdata('msg', 'Email does not exist.');
            return redirect()->to('/signin');
        }
    }

    public function register(): string
    {
        $data['title'] = 'Registrasi';
        $data['juduladmin'] = 'Registrasi';

        return view('admin/register',$data);
    }

    public function pengunjung(): string
    {
        $data['title'] = 'Penunjung';
        $data['juduladmin'] = 'Pengunjung';

        return view('admin/pengunjung',$data);
    }

    public function password(): string
    {
        $data['title'] = 'Reset Password';
        return view('admin/password',$data);
    }

    // public function users(): string
    // {
    //     $data['title'] = 'Users ';
    //     return view('admin/users',$data);
    // }


}


