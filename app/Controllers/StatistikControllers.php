<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\RegulasiModels;

class StatistikControllers extends BaseController
{
    protected $dokumenModel;

    public function __construct()
    {
        $this->dokumenModel = new RegulasiModels();
    }

    public function index()
    {
        $data['title']        = 'Statistik Dokumen';
        $data['page_heading'] = 'Ringkasan Dinamis & Grafik';

        // Tangkap parameter filter tahun dari form GET
        $tahunMulai   = $this->request->getGet('tahun_mulai');
        $tahunSelesai = $this->request->getGet('tahun_selesai');

        // Simpan nilai input lama agar tetap terisi di form view
        $data['filter_mulai']   = $tahunMulai;
        $data['filter_selesai'] = $tahunSelesai;

        // --- 1. AMBIL DATA UNTUK TABEL & GRAFIK KELOMPOK (PIE & BAR) ---
        $queryKelompok = $this->dokumenModel
                              ->select('id_hirarki, COUNT(id) as total_dokumen')
                              ->groupBy('id_hirarki');

        // Terapkan filter jika user memilih rentang tahun
        if (!empty($tahunMulai)) {
            $queryKelompok->where('tahun >=', $tahunMulai);
        }
        if (!empty($tahunSelesai)) {
            $queryKelompok->where('tahun <=', $tahunSelesai);
        }

        $data['statistik_hirarki'] = $queryKelompok->findAll();

        // --- 2. HITUNG GRAND TOTAL ---
        $queryTotal = $this->dokumenModel;
        if (!empty($tahunMulai)) { $queryTotal->where('tahun >=', $tahunMulai); }
        if (!empty($tahunSelesai)) { $queryTotal->where('tahun <=', $tahunSelesai); }
        $data['grand_total'] = $queryTotal->countAllResults();

        // --- 3. AMBIL DATA UNTUK GRAFIK LINE (TREN PER TAHUN) ---
        $queryTren = $this->dokumenModel
                          ->select('tahun, COUNT(id) as total_tahunan')
                          ->groupBy('tahun')
                          ->orderBy('tahun', 'ASC');

        if (!empty($tahunMulai)) { $queryTren->where('tahun >=', $tahunMulai); }
        if (!empty($tahunSelesai)) { $queryTren->where('tahun <=', $tahunSelesai); }
        
        $data['statistik_tren'] = $queryTren->findAll();

        // --- 4. DATA DAFTAR PILIHAN TAHUN UNTUK FORM FILTER ---
        $data['opsi_tahun'] = $this->dokumenModel
                                   ->select('tahun')
                                   ->groupBy('tahun')
                                   ->orderBy('tahun', 'DESC')
                                   ->findAll();

        return view('regulasi/modules/mod_statistik', $data);
    }
}
