<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\AuthModels;

class Auth extends Controller
{
    public function __construct()
    {
        $this->Auth = new AuthModels();
    }
    public function index()
    {
        if (session()->has('login')) {
            return redirect()->to(base_url('dashboard'));
        }
        return view('admin/login');
    }

       public function login()
    {
        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');

        $data = $this->Auth->table('users')->where('username', $username)->first();
        if ($data) {
            if (password_verify($password, $data['password'])) {
                /* return $data['user_id'] . ' ' . $data['name'] . $data['username'] . ' ' . $data['password']; */
                $dataLog = [
                    'id' => $data['user_id'],
                    'nama' => $data['name'],
                    'email' => $data['email'],
                    'no_telp' => $data['no_telp'],
                    'login' => TRUE
                ];

                session()->set($dataLog);

                return redirect()->to(base_url('dashboard'));
            }
            /* return $data['user_id'] . ' ' . $data['name'] . $data['username'] . ' ' . $data['password']; */
            session()->setFlashdata('error', 'Maaf, password anda salah!');
            return redirect()->to(base_url('auth'));
        }
        session()->setFlashdata('error', 'Maaf, username anda salah!');
        return redirect()->to(base_url('auth'));
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to(base_url('auth'));
    }
}
