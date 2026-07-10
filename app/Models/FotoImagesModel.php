<?php

namespace App\Models;

use CodeIgniter\Model;

class FotoImagesModel extends Model
{
    protected $table            = 'foto_images';
    protected $primaryKey       = 'id';
    protected $returnType       = 'object';
    protected $allowedFields    = ['id_berita', 'id_tematik', 'tgl_tematik', 'tema', 'tayang_hari', 'nama_foto', 'foto'];

    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

public function getFotoTayang()
{
    return $this->db->table($this->table)
        ->select('foto_images.*, kategori_tematik.tematik, kategori_tematik.skala')
        // Menggunakan LeftJoin agar id_tematik yang NULL tetap terbawa
        ->join('kategori_tematik', 'kategori_tematik.id = foto_images.id_tematik', 'left')
        ->groupStart()
            // Kondisi 1: id_tematik bernilai NULL
            ->where('foto_images.id_tematik', null)
            // Kondisi 2: Aturan tayang
            ->orGroupStart()
                ->where('foto_images.tayang_hari', 5)
                ->where('CURDATE() >= DATE_SUB(foto_images.tgl_tematik, INTERVAL foto_images.tayang_hari DAY)', null, false)
            ->groupEnd()
        ->groupEnd()
        ->get()->getResult();
}
}
