<?php

namespace App\Controllers;

class Dashboard extends BaseController
{
    public function index(): string
    {
        // return view('vw_home');
        return view('dashboard/index');
    }

    public function dash1(): string
    {
        $data['title'] = '';
        $data['juduldb'] = 'Informasi yang Wajib Disediakan dan Diumumkan Secara Berkala';
        return view('dashboard/dash1',$data);
    }


	public function tes()
	{
		show_404();
	}

	public function dash(){
		// $data['title'] = 'ppid bbppks bandung';
		// $data['notification'] = '';
        $data   = array(
        'title' => 'Dashboard',
        'section_header' => 'Dashboard',
        'sub_section_header' => 'Statistik',
        'card_header' => 'Jalur Evakuasi',
    );
return view('dashboard/dash', $data);
	}

}
