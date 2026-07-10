<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\RESTful\ResourceController;

class EmployeeControllers extends ResourceController
{
    protected $modelName = 'App\Models\EmployeeModels';
    protected $format    = 'json';

    // Menampilkan halaman CRUD utama
    public function index()
    {
        $data['title']        = 'Term & Conditions';
        $data['page_heading'] = 'SYARAT DAN KETENTUAN PENGGUNAAN';
        $data['title'] = 'Produk Hukum';
        $data['section_header'] = '[Informasi Berkala]';
        $data['sub_section_header'] = 'Informasi yang Wajib Disediakan dan Diumumkan Secara Berkala';
        $data['card_header'] = 'Manajemen Sumberdaya Manusia';

        return view('sdm/module/mod_view_stisla', $data);
    }

    // API: Ambil semua data karyawan
    public function getAllData()
    {
        // Menangkap parameter pencarian opsional dari URL query string
        $tgl_lahir = $this->request->getGet('tgl_lahir');
        $unit      = $this->request->getGet('unit');

        $query = $this->model;

        // Logika Filter 1: Berdasarkan tanggal lahir jika diisi
        if (!empty($tgl_lahir)) {
            $query = $query->where('tgl_lahir', $tgl_lahir);
        }

        // Logika Filter 2: Berdasarkan nama unit (pencarian teks fleksibel LIKE) jika diisi
        if (!empty($unit)) {
            $query = $query->like('unit', $unit);
        }

        return $this->respond($query->findAll());
        // return $this->respond($this->model->findAll());
    }

    
    // ==========================================
    // API BARU: Mengambil Data Ringkasan Widget
    // ==========================================
    public function getSummaryWidgets()
    {
        $totalEmployees = $this->model->countAllResults();
        
        // Menghitung jumlah unit unik (distinct)
        $totalUnits = $this->model->distinct()->select('unit')->countAllResults();
        
        // Menghitung karyawan yang lahir di bulan saat ini
        $currentMonth = date('m');
        $birthdayThisMonth = $this->model->where('MONTH(tgl_lahir)', $currentMonth)->countAllResults();

        return $this->respond([
            'total_employees'     => $totalEmployees,
            'total_units'         => $totalUnits,
            'birthday_this_month' => $birthdayThisMonth
        ]);
    }

    // ... (Fungsi show, create, update, delete tetap sama seperti sebelumnya)


    // API: Ambil detail 1 karyawan untuk form edit
    public function show($id = null)
    {
        $data = $this->model->find($id);
        if ($data) return $this->respond($data);
        return $this->failNotFound('Data tidak ditemukan.');
    }

    public function create()
    {
        $img = $this->request->getFile('image');
        $imageName = null;

        if ($img && $img->isValid() && !$img->hasMoved()) {
            $imageName = $img->getRandomName();
            $img->move(FCPATH . 'uploads/', $imageName);
        }

        $data = [
            'foreign_id'  => $this->request->getPost('foreign_id'),
            'name'        => $this->request->getPost('name'),
            'employee_id' => $this->request->getPost('employee_id'),
            'address'     => $this->request->getPost('address'),
            'tgl_lahir'   => $this->request->getPost('tgl_lahir'), // Input baru
            'unit'        => $this->request->getPost('unit'),      // Input baru
            'image'       => $imageName
        ];

        if ($this->model->insert($data)) {
            return $this->respondCreated(['status' => true, 'message' => 'Data berhasil ditambahkan!']);
        }
        return $this->fail('Gagal menambah data.');
    }

    public function update($id = null)
    {
        $employee = $this->model->find($id);
        if (!$employee) return $this->failNotFound('Data tidak ditemukan.');

        $img = $this->request->getFile('image');
        $imageName = $employee['image'];

        if ($img && $img->isValid() && !$img->hasMoved()) {
            if ($employee['image'] && file_exists(FCPATH . 'uploads/' . $employee['image'])) {
                unlink(FCPATH . 'uploads/' . $employee['image']);
            }
            $imageName = $img->getRandomName();
            $img->move(FCPATH . 'uploads/', $imageName);
        }

        $data = [
            'foreign_id'  => $this->request->getPost('foreign_id'),
            'name'        => $this->request->getPost('name'),
            'employee_id' => $this->request->getPost('employee_id'),
            'address'     => $this->request->getPost('address'),
            'tgl_lahir'   => $this->request->getPost('tgl_lahir'), // Input baru
            'unit'        => $this->request->getPost('unit'),      // Input baru
            'image'       => $imageName
        ];

        if ($this->model->update($id, $data)) {
            return $this->respond(['status' => true, 'message' => 'Data berhasil diubah!']);
        }
        return $this->fail('Gagal mengubah data.');
    }

    public function delete($id = null)
    {
        $employee = $this->model->find($id);
        if ($employee) {
            if ($employee['image'] && file_exists(FCPATH . 'uploads/' . $employee['image'])) {
                unlink(FCPATH . 'uploads/' . $employee['image']);
            }
            $this->model->delete($id);
            return $this->respondDeleted(['status' => true, 'message' => 'Data berhasil dihapus!']);
        }
        return $this->fail('Gagal menghapus data.');
    }
    
}


