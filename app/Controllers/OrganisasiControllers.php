<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\SdmModels;

class OrganisasiControllers extends BaseController
{
    public function balkanOrgChart()
    {
        $model = new SdmModels();
        // $data['karyawan'] = $model->getBalkanOrgData();
        // $data['sdm'] = $model->getOrgData();
        
        // Ambil data dari database. Pastikan query menghasilkan kolom: id, pid, name, title, dll.
        $sdmData = $model->getBalkanOrgData(); 

        $data = [
            'title'    => 'Struktur Organisasi',
            'chartData' => json_encode($sdmData) // Ubah array menjadi string JSON
        ];
        
        return view('organisasi/balkanOrgChart', $data);
    }

        public function googleOrgChart()
    {
        $model = new SdmModels();
        $data['pegawai'] = $model->getGoogleOrgData();
        // $data['sdm'] = $model->getOrgData();
        
        return view('organisasi/googleOrgChart', $data);
    }

    
}
