<?php 
namespace App\Controllers;

use CodeIgniter\Shield\Controllers\LoginController;
use CodeIgniter\Shield\Controllers\RegisterController;
use CodeIgniter\Shield\Controllers\ActionController;
use CodeIgniter\Shield\Controllers\MagicLinkController;

class Auth extends \CodeIgniter\Shield\Controllers\AuthController
{
    protected $viewPrefix = 'Auth';

    // Login
    public function login()
    {
        return $this->loginAction(); 
    }

    // Register  
    public function register()
    {
        return $this->registerAction(); 
    }

    // Lupa Password
    public function forgot()
    {
        return $this->forgotPasswordAction();
    }

    // Reset Password
    public function reset()
    {
        return $this->resetPasswordAction();
    }

    // Dashboard setelah login
    public function dashboard()
    {
        if (! auth()->loggedIn()) {
            return redirect()->to('/login');
        }
        return view('admin/dashboard', ['user' => auth()->user()]);
    }

    // Logout
    public function logout()
    {
        return $this->logoutAction();
    }
}