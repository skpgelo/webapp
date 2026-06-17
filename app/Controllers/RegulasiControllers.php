<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\RegulasiModels;

class RegulasiControllers extends BaseController
{
    // Menggunakan Session untuk kebutuhan simpan data statis/sementara dalam contoh ini
    protected $session;
    protected $dokumenModel;
    
    public function __construct()
    {
        $this->session = \Config\Services::session();
        $this->dokumenModel = new RegulasiModels();
    }

     // Menampilkan Halaman Daftar PDF
    public function index()
    {
        // Simulasi data dari database (ganti dengan query Model Anda jika diperlukan)
        $data['title']        = 'Daftar PDF';
        $data['page_heading'] = 'Modul Manajemen File PDF';
        
        $data['pdf_list'] = [
            [
                'id'        => 1,
                'nama_file' => 'panduan_akademik.pdf',
                'kelompok'  => 'Akademik',
                'ket'       => 'Buku panduan kurikulum dan regulasi mahasiswa baru tahun ajaran berjalan.',
                'tahun'     => '2026'
            ],
            [
                'id'        => 2,
                'nama_file' => 'laporan_keuangan_q1.pdf',
                'kelompok'  => 'Keuangan',
                'ket'       => 'Laporan audit internal keuangan perusahaan kuartal pertama.',
                'tahun'     => '2026'
            ]
        ];

        // Memanggil file index di dalam folder pdf
        return view('regulasi/modules/index', $data);
    }

        // Menampilkan Form Halaman Upload
    public function create()
    {
        $data['title']        = 'Upload PDF';
        $data['page_heading'] = 'Tambah Berkas Baru';

        return view('regulasi/modules/mod_create', $data);
    }

    // Memproses Aksi Upload Berkas
    public function store()
    {
        // Aturan validasi input teks dan spesifikasi berkas PDF secara ketat
        $rules = [
            'tentang' => 'required',
            'nomor'    => 'required',
            'tgl_terbit'      => 'required|valid_date[Y-m-d]',
            'file_pdf' => [
                'rules' => 'uploaded[file_pdf]|max_size[file_pdf,5120]|ext_in[file_pdf,pdf]|mime_in[file_pdf,application/pdf]',
                'errors' => [
                    'uploaded' => 'Anda belum memilih file untuk diupload.',
                    'max_size' => 'Ukuran file terlalu besar, maksimal berukuran 5MB.',
                    'ext_in'   => 'Format berkas tidak didukung. File harus berekstensi .pdf',
                    'mime_in'  => 'File yang diupload bukan merupakan dokumen PDF yang valid.'
                ]
            ]
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput();
        }

        // Tangkap file yang lolos kualifikasi validasi
        $filePdf = $this->request->getFile('file_pdf');

        if ($filePdf->isValid() && !$filePdf->hasMoved()) {
            // Generate nama file acak yang aman untuk menghindari duplikasi di server
            // $namaBaru = $filePdf->getRandomName();$_POST['nomor']
            $namaBaru = preg_replace('/[^a-zA-Z0-9_-]/', '', $_POST['nomor']) . '_' . $_POST['tentang'] . '_' . time() . '.pdf';
            // Pindahkan file fisik ke folder public/uploads/pdf/
            $filePdf->move(FCPATH . 'uploads/pdf/', $namaBaru);

            // Simpan metadata baru ke dalam array simulasi session (Ganti dengan insert Model jika pakai DB)
            // $currentData = $this->session->get('pdf_list');
            $newData = [
                'id_status' => $this->request->getPost('id_status'),
                'id_hirarki'=> $this->request->getPost('id_hirarki'),   
                'tentang'   => $this->request->getPost('tentang'),
                'tempat_penetapan' => $this->request->getPost('tempat_penetapan'),
                'pemrakarsa' => $this->request->getPost('pemrakarsa'),
                'nomor' => $this->request->getPost('nomor'),
                'sumber' => $this->request->getPost('sumber'),
                'tgl_terbit' => $this->request->getPost('tgl_terbit'),
                'aktif' => $this->request->getPost('aktif'),
                'pdf' => $this->request->getPost('pdf'),
                'abstrak' => $this->request->getPost('abstrak'),
                'kata_kunci' => $this->request->getPost('kata_kunci'),
                'bahasa' => $this->request->getPost('bahasa'),
                'nomor' => $this->request->getPost('tahun'),
                'sumber' => $this->request->getPost('kelompok'),
                'tgl_terbit' => date('Y-m-d'),
                'status' => $this->request->getPost('status'),
                'file_name' => $namaBaru,
                'file_path' => 'uploads/pdf/' . $namaBaru,
                'file_type' => $filePdf->getClientMimeType(),
                // 'kelompok'  => $this->request->getPost('kelompok'),
                'ket'       => $this->request->getPost('ket'),
                'tempat_penetapan'     => $this->request->getPost('tempat_penetapan'),
             ];
            
            $currentData[] = $newData;
            $this->session->set('pdf_list', $currentData);

            return redirect()->to('reg')->with('success', 'Dokumen berhasil diunggah dan disimpan ke server.');
        }

        return redirect()->back()->withInput()->with('error', 'Terjadi kesalahan sistem saat memproses berkas.');
    }


 
    // 4. FORM EDIT DATA
    public function edit($id)
    {
        $data['title']        = 'Edit PDF';
        $data['page_heading'] = 'Ubah Informasi Berkas';
        $data['reg']          = $this->dokumenModel->find($id);

        if (!$data['reg']) {
            return redirect()->to('pdf')->with('error', 'Data tidak ditemukan.');
        }

        return view('regulasi/modules/mod_edit', $data);
    }

    // 5. PROSES UPDATE DATA (UPDATE)
    public function update($id)
    {
        $pdfLama = $this->dokumenModel->find($id);
        
        // Aturan validasi (file_pdf bersifat opsional saat edit)
        $rules = [
            'tentang' => 'required',
            'nomor'    => 'required',
            'tgl_terbit'      => 'required|valid_date[Y-m-d]',
            'file_pdf' => [
                'rules' => 'uploaded[file_pdf]|max_size[file_pdf,5120]|ext_in[file_pdf,pdf]|mime_in[file_pdf,application/pdf]',
                'errors' => [
                    'uploaded' => 'Anda belum memilih file untuk diupload.',
                    'max_size' => 'Ukuran file terlalu besar, maksimal berukuran 5MB.',
                    'ext_in'   => 'Format berkas tidak didukung. File harus berekstensi .pdf',
                    'mime_in'  => 'File yang diupload bukan merupakan dokumen PDF yang valid.'
                
            
        ]
        ]
        ];


        if (!$this->validate($rules)) {
            return redirect()->back()->withInput();
        }

        $filePdf  = $this->request->getFile('file_pdf');
        $namaFile = $pdfLama['nama_file']; // Default gunakan nama file lama

        // Jika user mengunggah file baru
        if ($filePdf->isValid() && !$filePdf->hasMoved()) {
            $namaFile = $filePdf->getRandomName();
            $filePdf->move(FCPATH . 'uploads/pdf/', $namaFile);

            // Hapus file fisik lama dari server agar tidak memenuhi penyimpanan
            $pathFileLama = FCPATH . 'uploads/pdf/' . $pdfLama['nama_file'];
            if (file_exists($pathFileLama)) {
                unlink($pathFileLama);
            }
        }

        // Update data ke Database
        $this->dokumenModel->update($id, [
                 'id_status' => $this->request->getPost('id_status'),
                'id_hirarki'=> $this->request->getPost('id_hirarki'),   
                'tentang'   => $this->request->getPost('tentang'),
                'tempat_penetapan' => $this->request->getPost('tempat_penetapan'),
                'pemrakarsa' => $this->request->getPost('pemrakarsa'),
                'nomor' => $this->request->getPost('nomor'),
                'sumber' => $this->request->getPost('sumber'),
                'tgl_terbit' => $this->request->getPost('tgl_terbit'),
                'aktif' => $this->request->getPost('aktif'),
                'pdf' => $this->request->getPost('pdf'),
                'abstrak' => $this->request->getPost('abstrak'),
                'kata_kunci' => $this->request->getPost('kata_kunci'),
                'bahasa' => $this->request->getPost('bahasa'),
                'nomor' => $this->request->getPost('tahun'),
                'sumber' => $this->request->getPost('kelompok'),
                'tgl_terbit' => date('Y-m-d'),
                'status' => $this->request->getPost('status'),
                'file_name' => $namaBaru,
                'file_path' => 'uploads/pdf/' . $namaBaru,
                'file_type' => $filePdf->getClientMimeType(),
                // 'kelompok'  => $this->request->getPost('kelompok'),
                'ket'       => $this->request->getPost('ket'),
                'tempat_penetapan'     => $this->request->getPost('tempat_penetapan'),
        ]);

        return redirect()->to('reg')->with('success', 'Data dokumen berhasil diperbarui.');
    }

    // 6. PROSES HAPUS DATA & BERKAS FISIK (DELETE)
    public function delete($id)
    {
        $pdf = $this->dokumenModel->find($id);

        if ($pdf) {
            $pathFile = FCPATH . 'uploads/pdf/' . $pdf['nama_file'];
            
            // 1. Hapus berkas fisik di server jika file tersebut ada
            if (file_exists($pathFile)) {
                unlink($pathFile);
            }

            // 2. Hapus data baris di database
            $this->dokumenModel->delete($id);

            return redirect()->to('reg')->with('success', 'Data berkas dan file fisik berhasil dihapus dari server.');
        }

        return redirect()->to('reg')->with('error', 'Gagal menghapus, data tidak ditemukan.');
    }

    // 7. DOWNLOAD BERKAS
    public function download($id)
    {
        $pdf = $this->dokumenModel->find($id);
        $filePath = FCPATH . 'uploads/pdf/' . ($pdf['nama_file'] ?? '');

        if ($pdf && file_exists($filePath)) {
            return $this->response->download($filePath, NULL);
        } else {
            return redirect()->back()->with('error', 'File fisik tidak ditemukan di server.');
        }
    }

}
