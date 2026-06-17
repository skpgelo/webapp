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
        $data['sdm'] = $model->getOrgData();
        
        return view('organisasi/v_orgchart', $data);
    }
        public function googleOrgChart()
    {
        $model = new SdmModels();
        $data['sdm'] = $model->getOrgData();
        
        return view('organisasi/v_google_orgchart', $data);
    }

}
