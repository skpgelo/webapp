<?php 
namespace App\Controllers;  
use CodeIgniter\Controller;
use App\Models\AdminModel;
  
class Signin extends Controller
{
    public function index()
    {
        helper(['form']);
        $data['title'] = 'SIGN IN';
        return view('admin/v_login', $data);
    } 
  
    public function loginAuth()
    {
        $session = session();
        $userModel = new AdminModel();
        $email = $this->request->getVar('email');
        $password = $this->request->getVar('password');
        
        $data = $userModel->where('email', $email)->first();
        
        if($data){
            $pass = $data['password'];
            $authenticatePassword = password_verify($password, $pass);
            if($authenticatePassword){
                $ses_data = [
                    'id' => $data['id'],
                    'name' => $data['name'],
                    'email' => $data['email'],
                    'isLoggedIn' => TRUE
                ];
                $session->set($ses_data);
                return redirect()->to('profile');
            
            }else{
                $session->setFlashdata('msg', 'Password salah.');
                return redirect()->to('signin');
            }
        }else{
            $session->setFlashdata('msg', 'Email harus diisi.');
            return redirect()->to('signin');
        }
    }
}