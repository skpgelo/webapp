<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class DistControllers extends BaseController
{
    public function index(): string
    {
        // return view('vw_home');
        return view('dist/index');
    }

    public function auth_forgot_password(): string
    {
        $data   = array(
            //  'record' => json_decode($konten, true),
            'title' => 'Profil Kami',
            'sub_title' => '',
            'section_header' => '[Informasi Berkala]',
            'sub_section_header' => 'Informasi yang Wajib Disediakan dan Diumumkan Secara Berkala',
            'card_header' => 'Tentang BBPPKS Bandung',
         );

        return view('dist/auth-forgot-password',$data);
    }

    public function auth_login(): string
    {
        $data['title'] = '';
        $data['juduldb'] = 'Informasi yang Wajib Diumumkan Secara Serta Merta';
        return view('dist/auth-login',$data);
    }

    public function setiap_saat(): string
    {
        $data['title'] = '';
        $data['juduldb'] = 'Informasi yang Wajib Tersedia Setiap Saat';
        return view('home/serta_merta',$data);
    }

    public function profile_pejabat(): string
    {
        $data['title'] = 'Profile Pejabat';
        $data['db'] = 'Profile Pejabat';
        $data['judulcard'] = 'Kepala BBPPKS Bandung || Kepala Bagian Tata Usaha BBPPKS Bandung';
        $data['juduldb'] = 'Informasi yang Wajib Disediakan dan Diumumkan Secara Berkala';
        return view('home/profile_pejabat',$data);
    }

    public function ragam(): string
    {
        $data['title'] = '';
        $data['juduldb'] = 'Ragam Isi PPID';
        return view('home/ragam',$data);
    }

    public function indexstisla()
	{
		$data['title'] = 'Sumberdaya Manusia';
		$data['notification'] = '';
    	return view('dashboard/dash', $data);
	}

	public function tes()
	{
		show_404();
	}

	public function dash(){
		$data['title'] = 'ppid bbppks bandung';
		$data['notification'] = '';
    	return view('dashboard/home', $data);
	}
}
