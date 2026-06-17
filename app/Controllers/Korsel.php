<?php

namespace App\Controllers;
use App\Models\KorselModel;

class Korsel extends BaseController
{

    public function __construct()
    {
        helper('form');
        helper('ip');
        // helper('tgl_indo');
        $this->korselModel = new KorselModel();
        // $korselModel = new KorselModel;
    }

    public function tematik_korsel(): string
    {
        $data['title'] = '';
        $data['db'] = 'Korsel';
        $data['juduldb'] = 'berita dalam berita';
        // $data['juduldb'] = $this->korselModel->findAll();

        return view('korsel/tematik_korsel',$data);
    }

}