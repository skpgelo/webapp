<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\FotoImagesModel;

class FotoController extends BaseController
{
public function index()
    {
     $fotoModel = new FotoImagesModel();
        
     $data['title'] = 'Produk Hukum';
     $data['section_header'] = '[Informasi Berkala]';
     $data['sub_section_header'] = 'Informasi yang Wajib Disediakan dan Diumumkan Secara Berkala';
     $data['card_header'] = 'Daftar Produk Hukum';

     $data = [
            'list_foto' => $fotoModel->getFotoTayang()
        ];

        return view('galeri/index', $data);
    }
}
