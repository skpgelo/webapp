<?php

namespace App\Controllers;
// use App\Models\GeofisikaModel;

class Serta_merta extends BaseController
{
    // protected $adminModel;
    // public function __construct(){
    //     $this->geofisikaModel = new GeofisikaModel();
    // }
    public function index(): string
    {
        return view('home/index');
    }

    public function serta_merta(): string
    {
        $data['title'] = '';
        $data['db'] = 'Informasi Serta Merta';
        $data['juduldb'] = 'Informasi yang Wajib Diumumkan Secara Serta Merta';
        return view('serta_merta/serta_merta',$data);
    }

    public function iss()
    {
        $data['title'] = 'Satelit ISS';
        $data['card_header'] = 'Posisi Satelit ISS';
    
    return view('serta_merta/iss', $data);
    }
    
    public function iss_3()
    {
        $data['title'] = 'Satelit ISS_3';
        $data['card_header'] = 'Posisi Satelit ISS_3';
    
    return view('serta_merta/iss_3', $data);
    }

    public function g_shake()
    {
        $data['title'] = 'Data Gempabumi di Indonesia';
        $data['card_header'] = 'Gempabumi Terkini';
    
    return view('serta_merta/g_shake', $data);
    }
    
    public function g_155plus()
    {
        $data['title'] = 'Data Gempabumi Indonesia';
        $data['card_header'] = 'Daftar 15 Gempabumi diatas 5.0+ Magnito';
    
    return view('serta_merta/g_155plus', $data);
    }
    
    public function g_rasakan()
    {
        $data['title'] = 'Data Gempabumi Indonesia';
        $data['card_header'] = 'Daftar 15 Gempabumi Dirasakan';
    
    return view('serta_merta/g_rasakan', $data);
    }
    
    public function g_terkini()
	{
        $data['card_header'] = 'Gempabumi Terbaru Indonesia';
        $data['title'] = 'Data';

        return view('serta_merta/g_terkini', $data);
    }

    public function g_tutor()
	{
        $data['card_headera'] = 'Sebelum Terjadi Gempabumi';
        $data['title'] = 'Antisipasi Gempabumi';

        return view('serta_merta/g_tutor', $data);
    }

    public function jalur_evakuasi()
	{
        $data['card_header'] = 'Saat Terjadi Gempabumi';
        $data['title'] = 'Jalur Evakuasi';

        return view('serta_merta/jalur_evakuasi', $data);
    }

    public function skenario()
	{
        $data['card_header'] = 'Saat Terjadi Gempabumi';
        $data['title'] = 'Skenario Gempa Sesar Lembang';

        return view('serta_merta/skenario', $data);
    }

    function AmbilData($url,$awal,$akhir){
        $url='http://finance.detik.com/read/2014/09/24/104509/2699424/4/mampu-bikin-pesawat-terbang-pekerja-ri-diklaim-lebih-unggul-di-asean?f9911013';
        $data=file_get_contents($url);
        //echo $data;
    
        $awal='<div class="text_detail">';
        $akhir='</div>';
    
        $isi=explode($awal, $data);
        $isi2=explode($akhir, $isi[1]);
    
        $hasil=$isi2[0];
    
        return $hasil;
    }


    function bacaHTML($url){
         // inisialisasi CURL
          $data = curl_init();
      // setting CURL
      curl_setopt($data, CURLOPT_RETURNTRANSFER, 1);
      curl_setopt($data, CURLOPT_URL, $url);
      // menjalankan CURL untuk membaca isi file
      $hasil = curl_exec($data);
              curl_close($data);
              return $hasil;
         }
          
         
         public function isoseismal()
         {
             // $datax['card_header'] = 'Pascagempabumi';    
             // $datax['title'] = 'Peta Isoseismal terkini';
             $sumber = 'https://kodepos-2d475.firebaseio.com/kota_kab/k69.json?print=pretty';
             $konten = file_get_contents($sumber);
             $data   = array(
                 'record' => json_decode($konten, true),
                 'card_header' => 'Pascagempabumi',
                 'title' => 'Peta Isoseismal terkini',
             );
             return view('serta_merta/isoseismal', $data);
         }
     
         public function gempa_bumi()
         {
             $data   = array(
                //  'record' => json_decode($konten, true),
                'title' => 'Informasi Serta Merta',
                'section_header' => 'Pascagempabumi',
                'card_header' => 'Gempabumi Terkini',
             );
             return view('serta_merta/gempa_bumi', $data);
         }
     
         public function ja_ev()
         {
            $data   = array(
                //  'record' => json_decode($konten, true),
                'title' => 'Jalur Evakuasi',
                'section_header' => '[Informasi Serta Merta]',
                'sub_section_header' => 'Informasi yang Wajib Diumumkan Secara Serta Merta',
                'card_header' => 'Jalur Evakuasi',
                        );
     
             return view('serta_merta/ja_ev', $data);
         }
     
         public function skena()
         {
            $data   = array(
                //  'record' => json_decode($konten, true),
                'title' => 'Informasi Serta Merta',
                'section_header' => 'Saat Terjadi Gempabumi',
                'card_header' => 'Skenario Gempa Sesar Lembang',
             );
     
             return view('serta_merta/skena', $data);
         }
     
         public function plus155()
         {
            $data   = array(
                //  'record' => json_decode($konten, true),
                'title' => 'Informasi Serta Merta',
                'section_header' => '[Informasi Serta Merta]',
                'sub_section_header' => 'Informasi yang Wajib Diumumkan Secara Serta Merta',
                'card_header' => 'Daftar 15 Gempabumi diatas 5.0+ Magnito',
             );
         
         return view('serta_merta/plus155', $data);
         }
         
         public function tutor()
         {
            $data   = array(
                //  'record' => json_decode($konten, true),
                'title' => 'Informasi Serta Merta',
                'section_header' => 'Saat Terjadi Gempabumi',
                'card_header' => 'Mitigasi Bencana',
             );
         
         return view('serta_merta/tutor', $data);
         }
         
     
}
