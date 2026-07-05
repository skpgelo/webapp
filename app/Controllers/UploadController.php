<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\DokumenModel;

class UploadController extends BaseController
{
    protected $dokumenModel;

    public function __construct()
    {
        helper('auth');
        $this->dokumenModel = new DokumenModel();
    }

    public function index()
    {
        // Ambil data dari kedua tabel untuk ditampilkan di halaman view
        $data['list_foto'] = $this->dokumenModel->getAllFotoRaw();
        $data['list_pdf']  = $this->dokumenModel->getAllPdfRaw();

        return view('upload/form_upload', $data);
    }

    // ----------------------------------------------------
    // PROSES UPLOAD FOTO
    // ----------------------------------------------------
    // public function prosesFoto()
    // {
    //     $rules = [
    //         'judul_image' => 'required|min_length[3]|max_length[255]',
    //         'tema_image'  => 'required|min_length[3]|max_length[255]',
    //         'foto_hp'     => 'uploaded[foto_hp]|mime_in[foto_hp,image/jpg,image/jpeg,image/png,image/webp,image/heic,image/heif]|max_size[foto_hp,15360]'
    //     ];

    //     if (!$this->validate($rules)) {
    //         return redirect()->back()->withInput()->with('errors_foto', $this->validator->getErrors());
    //     }

    //     $judul = $this->request->getPost('judul_image');
    //     $tema  = $this->request->getPost('tema_image');
    //     $foto  = $this->request->getFile('foto_hp');

    //     if ($foto->isValid() && !$foto->hasMoved()) {
    //         $newNameFoto = $foto->getRandomName();
    //         $foto->move(FCPATH . 'uploads/', $newNameFoto);

    //         try {
    //             $this->dokumenModel->insertFotoRaw($judul, $tema, $newNameFoto);
    //             return redirect()->to('upload')->with('success_foto', 'Foto HP berhasil diarsipkan!');
    //         } catch (\Exception $e) {
    //             if (file_exists(FCPATH . 'uploads/' . $newNameFoto)) unlink(FCPATH . 'uploads/' . $newNameFoto);
    //             return redirect()->back()->with('error_foto', 'Gagal simpan DB: ' . $e->getMessage());
    //         }
    //     }
    // }

  

    // ----------------------------------------------------
    // METHOD HAPUS (FOTO / PDF)
    // ----------------------------------------------------
    // Method Hapus Foto yang disempurnakan untuk menghapus semua file fisik anak
    public function hapusFoto($id)
    {
        // Ambil semua daftar file foto terkait dari tabel anak sebelum dihapus
        $daftarFoto = $this->dokumenModel->getDetailFotoByIndukRaw($id);
        
        foreach ($daftarFoto as $f) {
            if (file_exists(FCPATH . 'uploads/' . $f->nama_foto)) {
                unlink(FCPATH . 'uploads/' . $f->nama_foto);
            }
        }

        // Hapus data induk (Otomatis menghapus detail_foto di DB karena relasi CASCADE)
        $this->dokumenModel->deleteFotoRaw($id);
        return redirect()->to('upload')->with('success_foto', 'Seluruh rangkaian album foto berhasil dihapus.');
    }
    
    public function hapusPdf($id)
    {
        $data = $this->dokumenModel->getPdfByIdRaw($id);
        if ($data && file_exists(FCPATH . 'uploads/' . $data->nama_pdf)) {
            unlink(FCPATH . 'uploads/' . $data->nama_pdf);
        }
        $this->dokumenModel->deletePdfRaw($id);
        return redirect()->to('upload')->with('success_pdf', 'Data PDF dihapus.');
    }

    // ----------------------------------------------------
    // PROSES UPLOAD FOTO (DENGAN VALIDASI TEKS KETAT)
    // ----------------------------------------------------
    public function prosesFoto()
    {
        $rules = [
            'judul_image'    => 'required|min_length[3]|max_length[255]|alpha_numeric_punct',
            'tema_image'     => 'required|min_length[3]|max_length[255]|alpha_numeric_punct',
            'deskripsi_foto' => 'required',
            'foto_hp'        => 'uploaded[foto_hp]|max_size[foto_hp,15360]'
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors_foto', $this->validator->getErrors());
        }

        // SANITASI EKSTRA
        $judul     = strip_tags($this->request->getPost('judul_image'));
        $tema      = strip_tags($this->request->getPost('tema_image'));
        $deskripsi = htmlentities($this->request->getPost('deskripsi_foto'), ENT_QUOTES, 'UTF-8');

        // 1. LANGSUNG SIMPAN DATA INDUK DAN DAPATKAN ID-NYA
        try {
            $indukId = $this->dokumenModel->insertFotoIndukRaw($judul, $tema, $deskripsi);
        } catch (\Exception $e) {
            return redirect()->back()->with('error_foto', 'Gagal simpan data induk: ' . $e->getMessage());
        }

        // 2. PROSES MULTI-UPLOAD BERKAS FOTO (Menggunakan getFileMultiple)
        $files = $this->request->getFileMultiple('foto_hp');
        $uploadedNames = [];

        if (!empty($files) && is_array($files)) {
            
            foreach ($files as $file) {
                $mimeType = $file->getMimeType();
                $allowedMimes = ['image/jpeg', 'image/jpg', 'image/png', 'image/webp'];

                if ($file->isValid() && !$file->hasMoved() && in_array($mimeType, $allowedMimes)) {
                    $newName = $file->getRandomName();
                    $file->move(FCPATH . 'uploads/', $newName);
                    
                    // Simpan nama file terupload untuk cadangan rollback jika database error
                    $uploadedNames[] = $newName;

                    try {
                        // Simpan ke tabel anak detail_foto
                        $this->dokumenModel->insertDetailFotoRaw($indukId, $newName);
                    } catch (\Exception $e) {
                        // Rollback jika database detail error
                        foreach ($uploadedNames as $name) {
                            if (file_exists(FCPATH . 'uploads/' . $name)) unlink(FCPATH . 'uploads/' . $name);
                        }
                        $this->dokumenModel->deleteFotoRaw($indukId);
                        return redirect()->back()->with('error_foto', 'Gagal menyimpan detail foto ke database.');
                    }
                }
            }
            
        } else {
            // Rollback jika berkas kosong
            $this->dokumenModel->deleteFotoRaw($indukId);
            return redirect()->back()->withInput()->with('error_foto', 'Gagal memproses berkas. Pastikan Anda telah memilih minimal satu foto!');
        }

        // Catat Log Aktivitas setelah seluruh siklus sukses
        // Catat Log Aktivitas setelah seluruh siklus sukses
        $this->catatLog("Berhasil mengunggah album foto baru dengan Judul: '{$judul}'");

        return redirect()->to('upload')->with('success_foto', 'Banyak foto berhasil disimpan sekaligus!');
    } // <--- PERBAIKAN WAJIB: Pastikan ada kurung kurawal penutup untuk menutup fungsi prosesFoto() DI SINI!

    /**
     * Helper Privat untuk mencatat aktivitas secara otomatis ke database (Raw SQL)
     */
    private function catatLog($pesanAktivitas)
    {
        // 1. Muat fungsi helper secara lokal untuk memastikan fungsi auth() terdefinisi
        helper('auth');

        // 2. PERBAIKAN: Gunakan loggedIn() dengan huruf 'l' kecil untuk kata 'loggedIn'
        if (auth()->loggedIn()) {
            $userId   = auth()->id();
            $username = auth()->user()->username;
        } else {
            // Jika aksi dipicu oleh sistem otomatis atau user belum login
            $userId   = null;
            $username = 'Sistem / Anonim';
        }
                
        // 2. Ambil alamat IP asli dari request perangkat browser
        $ipAddress = $this->request->getIPAddress();

        // 3. Eksekusi fungsi insert log di DokumenModel
        $this->dokumenModel->insertLogRaw($userId, $username, $pesanAktivitas, $ipAddress);
    } 

    
    // ----------------------------------------------------
    // PROSES UPLOAD PDF (DENGAN VALIDASI TEKS KETAT)
    // ----------------------------------------------------
    public function prosesPdf()
    {
        $rules = [
            'judul_pdf'   => 'required|min_length[3]|max_length[100]|alpha_numeric_punct',
            'tema_pdf'    => 'required|min_length[3]|max_length[50]|alpha_numeric_punct',
            'deskripsi_pdf' => 'required',
            'dokumen_pdf' => 'uploaded[dokumen_pdf]|mime_in[dokumen_pdf,application/pdf]|max_size[dokumen_pdf,5120]'
        ];

        $messages = [
            'judul_pdf' => [
                'alpha_numeric_punct' => 'Judul PDF hanya boleh berisi huruf, angka, spasi, dan tanda baca standar.'
            ],
            'tema_pdf' => [
                'alpha_numeric_punct' => 'Tema PDF hanya boleh berisi huruf, angka, spasi, dan tanda baca standar.'
            ]
        ];

        if (!$this->validate($rules, $messages)) {
            return redirect()->back()->withInput()->with('errors_pdf', $this->validator->getErrors());
        }

        // SANITASI EKSTRA: Membersihkan input dari potensi injeksi tag
        $judul = strip_tags($this->request->getPost('judul_pdf'));
        $tema  = strip_tags($this->request->getPost('tema_pdf'));
        // AMANKAN CKEDITOR
        $deskripsi = htmlentities($this->request->getPost('deskripsi_pdf'), ENT_QUOTES, 'UTF-8');
        $pdf   = $this->request->getFile('dokumen_pdf');

        if ($pdf->isValid() && !$pdf->hasMoved()) {
            $newNamePdf = $pdf->getRandomName();
            $pdf->move(FCPATH . 'uploads/', $newNamePdf);

            try {
                $this->dokumenModel->insertPdfRaw($judul, $tema, $deskripsi, $newNamePdf);
                return redirect()->to('upload')->with('success_pdf', 'Dokumen PDF berhasil diarsipkan dengan aman!');
            } catch (\Exception $e) {
                if (file_exists(FCPATH . 'uploads/' . $newNamePdf)) unlink(FCPATH . 'uploads/' . $newNamePdf);
                return redirect()->back()->with('error_pdf', 'Gagal simpan DB: ' . $e->getMessage());
            }
        }
    }

}