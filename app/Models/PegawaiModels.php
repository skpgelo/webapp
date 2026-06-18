<?php


namespace App\Models;

use CodeIgniter\Model;

class PegawaiModels extends Model
{
    // protected $pegawaiModel;
    protected $table            = 'sdm';
    protected $primaryKey       = 'id';
    // protected $allowedFields    = ['name', 'ttl', 'gender', 'status_peg', 'tahun_status', 'gol', 'tmt_gol', 'tmt_cpns', 'agama', 'pendidikan_dari', 'tingkat_penjengjangan', 'tahun_penjenjangan', 'jabatan', 'tmt_jabatan', 'tmt_dibalai', 'grade', 'ket', 'no', 'no_parent'];

    protected $allowedFields    = ['nama', 'nip', 'ttl', 'tgl_lahir', 'gender', 'status_peg', 'tahun_status','gol', 'tmt_gol', 'tmt_cpns', 'agama', 'pendidikan', 'pendidikan_dari', 'tingkat_penjenjangan', 'tahun_penjenjangan', 'jabatan', 'tmt_jabatan', 'tmt_dibalai', 'grade', 'ket', 'no', 'parent_id', 'aktif', 'usia_pensiun', 'foto', 'dok', 'quotes', 'created_at', 'updated_at', 'deleted_at'];
    protected $useTimestamps = true;
    protected $validationRules = [
        // ... aturan validasi lainnya ...
        'tgl_lahir' => 'valid_date[Y-m-d]',
    ];
        // Aturan Validasi untuk Keamanan Data dan File
    // protected $validationRules = [
    //     // 1. WAJIB TAMBAHKAN BARIS ID INI SEBAGAI ATURAN UNTUK PLACEHOLDER {id}
    //     'id'      => 'permit_empty|max_length[19]|is_natural_no_zero',
        
    //     // Aturan kolom lainnya tetap menggunakan placeholder {id} dengan aman
    //     'nip'     => 'required|alpha_numeric|min_length[8]|is_unique[pegawai.nip,id,{id}]',
    //     'nama'    => 'required|alpha_space|min_length[3]',
    //     'email'   => 'required|valid_email|is_unique[pegawai.email,id,{id}]',
    //     'jabatan' => 'required|string',
    //     'catatan' => 'permit_empty|string',
    //             // Validasi Foto: Maksimal 2MB, harus berupa gambar asli, ekstensi png/jpg/jpeg
    //     'foto'    => 'permit_empty|uploaded[foto]|max_size[foto,2048]|is_image[foto]|mime_in[foto,image/png,image/jpeg,image/jpg]',

    // ];


}