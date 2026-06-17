<?php

namespace App\Controllers;
use App\Models\AdminModel;
use App\Models\GaleriModel;

class Galeri extends BaseController
{
    public function __construct()
    {
        helper('form');
        // helper('tgl_indo');
        $this->galeriModel = new GaleriModel();
    }

    public function index()
    {
        return view('galeri/index');
    }
    
    public function video()
    {
        // $galeriModel = new GaleriModel();
        $data['title'] = '';
        $data['db'] = 'Galeri';
        $data['juduldb'] = 'Cerita apapun disampaikan melalui gambar';
        // $data['galeri'] = $this->galeriModel->viewOwl();
        return view('galeri/video_carousel',$data);
    }

    public function carousel_video()
    {
        // $galeriModel = new GaleriModel();
        $data['title'] = '';
        $data['db'] = 'Galeri';
        $data['juduldb'] = 'Cerita apapun disampaikan melalui gambar';
        // $data['galeri'] = $this->galeriModel->viewOwl();
        return view('video/carousel_video',$data);
    }
    public function galerix()
    {
        // $galeriModel = new GaleriModel();
        $data['title'] = '';
        $data['db'] = 'Galeri';
        $data['juduldb'] = 'Cerita apapun disampaikan melalui gambar';
        $data['galeri'] = $this->galeriModel->viewOwl();
        return view('galeri/galeri',$data);
    }


    public function owl_carousel()
    // if(!$this->validate([]))
    {
        $data['title'] = '';
        $data['db'] = 'Galeri';
        $data['juduldb'] = 'OWL';
        $data['oc'] = $this->galeriModel->viewOwl();
        // $data['berita'] = $this->beritaModel->viewBerita();
        return view('galeri/owl_carousel',$data);
    }

    public function gambar()
    // if(!$this->validate([]))
    {
        $data['title'] = '';
        $data['db'] = 'Galeri';
        $data['juduldb'] = 'OWL';
        $data['gambar'] = $this->galeriModel->viewGambar();
        // $data['berita'] = $this->beritaModel->viewBerita();
        return view('galeri/gambar',$data);
    }

    public function galeri()
    {
        // $galeriModel = new GaleriModel();
        $data['title'] = '';
        $data['db'] = 'Galeri';
        $data['juduldb'] = 'Cerita apapun disampaikan melalui gambar';
        $data['galeri'] = $this->galeriModel->viewGaleri();
        return view('galeri/galeri',$data);
    }

    public function tampil_galeri()
    {
        // $galeriModel = new GaleriModel();
        $data['title'] = '';
        $data['db'] = 'Galeri';
        $data['juduldb'] = 'Cerita apapun disampaikan melalui gambar';
        $data['galeri'] = $this->galeriModel->viewGaleri();
        return view('galeri/tampil_galeri',$data);
    }

    // public function download($filename, $text) {
    //     var pom = document.createElement('a');
    //     pom.setAttribute('href', 'data:text/plain;charset=utf-8,' + encodeURIComponent(text));
    //     pom.setAttribute('download', filename);
    
    //     if (document.createEvent) {
    //         var event = document.createEvent('MouseEvents');
    //         event.initEvent('click', true, true);
    //         pom.dispatchEvent(event);
    //     }
    //     else {
    //         pom.click();
    //     }
    // }
}
