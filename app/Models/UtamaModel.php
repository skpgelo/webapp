<?php

namespace App\Models;

use CodeIgniter\Model;

class UtamaModel extends Model
{
    protected $table            = 'utama';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'nama','jabatan','nip','latitude','longitude','alamat','desa','kecamatan','kabupaten','provinsi',
        'foreigngender_id','foreignnikah_id','foreignkategori_id','pdf','lokasi_pdf','image',
        'judul_images','tgl_images','lokasi_images'

    ];

}
class MultiImagesModel extends Model {
    protected $table = 'tabel_multiimages';
    protected $allowedFields = ['foreigutama_id','foreignkategori_id','judul_images','tgl_images','lokasi_images','multi_images'];
}

class GenderModel extends Model { protected $table='tabel_gender'; }
class NikahModel extends Model { protected $table='tabel_nikah'; }
class KategoriModel extends Model { protected $table='tabel_kategori'; }

