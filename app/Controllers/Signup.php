<?php 
namespace App\Controllers;  
use CodeIgniter\Controller;
use App\Models\AdminModel;
  
class Signup extends Controller
{
    public function index()
    {
        helper(['form']);
        $data['title'] = 'SIGN UP';
        return view('admin/v_register', $data);
    }
  
    public function store()
    {
        helper(['form']);
        $rules = [
            'username'          => 'required|min_length[2]|max_length[50]',
            'email'             => 'required|min_length[4]|max_length[100]|valid_email|is_unique[admin.email]',
            'password'          => 'required|min_length[4]|max_length[50]',
            'confirmpassword'   => 'matches[password]'
        ];
          
        if($this->validate($rules)){
            $userModel = new AdminModel();
            $data = [
                'username' => $this->request->getVar('username'),
                'email'    => $this->request->getVar('email'),
                'password' => password_hash($this->request->getVar('password'), PASSWORD_DEFAULT)
            ];
            $userModel->save($data);
            return redirect()->to('signin');
        }else{
            $data['validation'] = $this->validator;
            $data['title'] = 'SIGN UP';
            // echo view('signup', $data);
            return view('admin/v_register', $data);
        }
          
    }
  
}