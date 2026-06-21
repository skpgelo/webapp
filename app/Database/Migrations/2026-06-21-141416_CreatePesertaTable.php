<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreatePesertaTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            // 1. Auto Increment Primary Key
            'id' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'nama' => [
                'type'       => 'VARCHAR',
                'constraint' => '150',
            ],
            // NIK Indonesia selalu berjumlah tepat 16 karakter
            'nik' => [
                'type'       => 'CHAR',
                'constraint' => '16',
                'unique'     => true, // Diatur unik agar tidak ada NIK ganda
            ],
            // Tipe DECIMAL digunakan untuk koordinat Peta agar nilainya presisi
            'latitude' => [
                'type'       => 'DECIMAL',
                'constraint' => '10,8',
            ],
            'longitude' => [
                'type'       => 'DECIMAL',
                'constraint' => '11,8',
            ],
            'alamat' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ],
            'desa' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
            // Kolom ekstraksi dari NIK diatur menggunakan CHAR/VARCHAR sesuai panjang kodenya
            'kecamatan' => [
                'type'       => 'CHAR',
                'constraint' => '2', // Hasil ekstraksi 2 digit angka ke-5 & 6
            ],
            'Kabupaten_kota' => [
                'type'       => 'CHAR',
                'constraint' => '2', // Hasil ekstraksi 2 digit angka ke-3 & 4
            ],
            'provinsi' => [
                'type'       => 'CHAR',
                'constraint' => '2', // Hasil ekstraksi 2 digit angka ke-1 & 2
            ],
            // Menggunakan ENUM atau TINYINT untuk opsi angka status (1, 2, 3, 4)
            'gender' => [
                'type'       => 'ENUM',
                'constraint' => ['1', '2', '3'],
            ],
            'menikah' => [
                'type'       => 'ENUM',
                'constraint' => ['1', '2', '3', '4'],
            ],
            'foto' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
                'null'       => true,
            ],
            // Menggunakan VARCHAR 10 karena format string dari seeder adalah "dd-mm-yyyy"
            'tanggal_lahir' => [
                'type'       => 'VARCHAR',
                'constraint' => '10',
            ],
            'created_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
            'updated_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
        ]);

        $this->forge->addKey('id', true); // Menjadikan kolom 'id' sebagai Primary Key
        $this->forge->createTable('peserta'); // Membuat tabel bernama 'peserta'
    }

    public function down()
    {
        $this->forge->dropTable('peserta'); // Menghapus tabel jika migrasi di-rollback
    }
    
}
