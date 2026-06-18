<?php

namespace App\Controllers;

class Berkala extends BaseController
{
    public function index(): string
    {
        return view('berkala/index');
    }

    public function berkala(): string
    {
        $data['title'] = '';
        $data['db'] = 'Informasi Berkala';
        $data['juduldb'] = 'Informasi yang Wajib Disediakan dan Diumumkan Secara Berkala';
        return view('berkala/berkala',$data);
    }

    public function profile_kami(): string
    {
        $data   = array(
            //  'record' => json_decode($konten, true),
            'title' => 'Profil Kami',
            'sub_title' => '',
            'section_header' => '[Informasi Berkala]',
            'sub_section_header' => 'Informasi yang Wajib Disediakan dan Diumumkan Secara Berkala',
            'card_header' => 'Tentang BBPPKS Bandung',
         );
        return view('berkala/profile_kami',$data);
    }

}
