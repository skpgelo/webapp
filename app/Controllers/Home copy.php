<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index(): string
    {
        // return view('vw_home');
        return view('home/index');
    }

    public function berkala(): string
    {
        $data['title'] = '';
        $data['juduldb'] = 'Informasi yang Wajib Disediakan dan Diumumkan Secara Berkala';
        return view('home/berkala',$data);
    }

    public function serta_merta(): string
    {
        $data['title'] = '';
        $data['juduldb'] = 'Informasi yang Wajib Diumumkan Secara Serta Merta';
        return view('home/serta_merta',$data);
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
    	return view('dashboard/home', $data);
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
