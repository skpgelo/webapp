<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use Google_Client;

class Login extends BaseController
{
    protected $googleClient;

    public function __construct()
    {
        $this->googleClient = new Google_Client();//

        $this->googleClient->setClientId('937743688231-f2sr7s9tmo9quejspu6vrlsoft65tsct.apps.googleusercontent.com');
        $this->googleClient->setClientSecret('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');
        $this->googleClient->setRedirectUri('http://localhost:8080/login/process');
        $this->googleClient->addScope('email');
        $this->googleClient->addScope('profile');
    }

    public function index()
    {
        $data['title'] = 'SIGN IN';
        $data['link'] = $this->googleClient->createAuthUrl();
        return view('login/index', $data);
    }
}
