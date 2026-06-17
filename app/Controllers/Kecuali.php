<?php

namespace App\Controllers;

class Kecuali extends BaseController
{
    public function index(): string
    {
        return view('home/index');
    }

    public function dikecualikan(): string
    {
        $data['title'] = '';
        $data['db'] = ' Informasi yang Dikecualikan ';
        $data['juduldb'] = 'Informasi Publik yang Dikecualikan ';
        return view('kecuali/dikecualikan',$data);
    }

    public function grabbing()
    {
        $data['title'] = '';
        $data['db'] = 'Informasi Setiap Saat';
        $data['juduldb'] = 'Informasi yang Wajib Tersedia Setiap Saat';
        return view('setiap_saat/grabbing',$data);
    }

}
