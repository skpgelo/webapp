<?php

namespace App\Controllers;
use App\Models\AdminsModel;
use App\Models\KepegModel;

class Kepeg extends BaseController
{
    public function __construct()
    {
        helper('form');
        // helper('tgl_indo');
        $this->kepegModel = new KepegModel();
    }

    public function index()
    {
       $pegawaiModel = new KepegModel();
        $data['struktur'] = $pegawaiModel->findAll();
        return view('kepeg/index',$data);
    }

    public function org()
    // if(!$this->validate([]))
    {
        $data['title'] = '';
        $data['db'] = 'Organisasi';
        $data['juduldb'] = 'Organisasi';
        // $data['oc'] = $this->kepegModel->viewOwl();
        // $data['berita'] = $this->beritaModel->viewBerita();
        return view('kepeg/org',$data);
    }


    public function organ()
    // if(!$this->validate([]))
    {
        $data['title'] = '';
        $data['db'] = 'Organisasi';
        $data['juduldb'] = 'Organisasi';
        // $data['oc'] = $this->kepegModel->viewOwl();
        // $data['berita'] = $this->beritaModel->viewBerita();
        return view('kepeg/organ',$data);
    }


    public function owltematik()
    // if(!$this->validate([]))
    {
        $data['title'] = '';
        $data['db'] = 'Galeri';
        $data['juduldb'] = 'OWL';
        // $data['oc'] = $this->kepegModel->viewOwl();
        // $data['berita'] = $this->beritaModel->viewBerita();
        return view('kepeg/owltematik',$data);
    }

    public function owlsimple()
    // if(!$this->validate([]))
    {
        $data['title'] = '';
        $data['db'] = 'Galeri';
        $data['juduldb'] = 'OWL';
        // $data['oc'] = $this->kepegModel->viewOwl();
        // $data['berita'] = $this->beritaModel->viewBerita();
        return view('kepeg/owlsimple',$data);
    }

    public function owll()
    // if(!$this->validate([]))
    {
        $data['title'] = '';
        $data['db'] = 'Galeri';
        $data['juduldb'] = 'OWL';
        // $data['oc'] = $this->kepegModel->viewOwl();
        // $data['berita'] = $this->beritaModel->viewBerita();
        return view('kepeg/owll',$data);
    }

    public function owl_carousel()
    // if(!$this->validate([]))
    {
        $data['title'] = '';
        $data['db'] = 'Galeri';
        $data['juduldb'] = 'OWL';
        // $data['oc'] = $this->kepegModel->viewOwl();
        // $data['berita'] = $this->beritaModel->viewBerita();
        return view('kepeg/owl_carousel');
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


}
