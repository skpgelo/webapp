<?php

namespace App\Models;

use CodeIgniter\Model;

class DokumenModel extends Model
{
    protected $table = 'tabel_dokumen';
    
    // ==========================================
    // LOGIKA RAW SQL UNTUK TABEL FOTO
    // ==========================================
    public function getAllFotoRaw()
    {
        $sql = "SELECT tf.*, GROUP_CONCAT(df.nama_foto SEPARATOR ',') as banyak_foto, GROUP_CONCAT(df.id SEPARATOR ',') as banyak_id_foto
                FROM tabel_foto tf
                LEFT JOIN detail_foto df ON tf.id = df.tabel_foto_id
                GROUP BY tf.id
                ORDER BY tf.waktu_upload DESC";
        return $this->db->query($sql)->getResult();
    }

    // Insert data induk dan kembalikan ID terakhir yang diinput
    public function insertFotoIndukRaw($judul, $tema, $deskripsi)
    {
        $sql = "INSERT INTO tabel_foto (judul_image, tema_image, deskripsi_foto) VALUES (?, ?, ?)";
        $this->db->query($sql, [$judul, $tema, $deskripsi]);
        
        // Mengambil ID barusan untuk kebutuhan Foreign Key
        return $this->db->insertID();
    }

    // Insert banyak file ke tabel anak (detail_foto)
    public function insertDetailFotoRaw($tabelFotoId, $namaFoto)
    {
        $sql = "INSERT INTO detail_foto (tabel_foto_id, nama_foto) VALUES (?, ?)";
        return $this->db->query($sql, [$tabelFotoId, $namaFoto]);
    }

    // Ambil satu data induk foto untuk proses hapus
    public function getFotoByIdRaw($id)
    {
        return $this->db->query("SELECT * FROM tabel_foto WHERE id = ?", [$id])->getRow();
    }

    // Ambil semua file foto dari tabel anak berdasarkan ID induk
    public function getDetailFotoByIndukRaw($tabelFotoId)
    {
        return $this->db->query("SELECT nama_foto FROM detail_foto WHERE tabel_foto_id = ?", [$tabelFotoId])->getResult();
    }

    // Hapus data induk (Otomatis menghapus detail di DB karena CASCADE)
    public function deleteFotoRaw($id)
    {
        return $this->db->query("DELETE FROM tabel_foto WHERE id = ?", [$id]);
    }


    // ==========================================
    // LOGIKA RAW SQL UNTUK TABEL PDF
    // ==========================================
    public function getAllPdfRaw()
    {
        return $this->db->query("SELECT * FROM tabel_pdf ORDER BY waktu_upload DESC")->getResult();
    }

    public function insertPdfRaw($judul, $tema, $deskripsi, $namaPdf) {
        $sql = "INSERT INTO tabel_pdf (judul_pdf, tema_pdf, deskripsi_pdf, nama_pdf) VALUES (?, ?, ?, ?)";
        return $this->db->query($sql, [$judul, $tema, $deskripsi, $newNamePdf]);
    }

    public function getPdfByIdRaw($id)
    {
        return $this->db->query("SELECT * FROM tabel_pdf WHERE id = ?", [$id])->getRow();
    }

    public function deletePdfRaw($id)
    {
        return $this->db->query("DELETE FROM tabel_pdf WHERE id = ?", [$id]);
    }
}