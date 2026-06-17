<?php

namespace App\Controllers;

class Setiap_saat extends BaseController
{
    public function index(): string
    {
        return view('home/index');
    }

    public function setiap_saat(): string
    {
        $data['title'] = '';
        $data['db'] = 'Informasi Setiap Saat';
        $data['juduldb'] = 'Informasi yang Wajib Tersedia Setiap Saat';
        return view('setiap_saat/setiap_saat',$data);
    }

    public function grabbing()
    {
        $data['title'] = '';
        $data['db'] = 'Informasi Setiap Saat';
        $data['juduldb'] = 'Informasi yang Wajib Tersedia Setiap Saat';
        return view('setiap_saat/grabbing',$data);
    }

}
