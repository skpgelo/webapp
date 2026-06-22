<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreatePenggunaTable extends Migration
{
    public function up()
    {
            $this->forge->addField([
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
            'nik' => [
                'type'       => 'VARCHAR',
                'constraint' => '16',
                'unique'     => true, // NIK tidak boleh kembar
            ],
            'email' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
                'unique'     => true, // Email tidak boleh kembar
            ],
            'nomor_telepon' => [
                'type'       => 'VARCHAR',
                'constraint' => '20',
            ],
            'desa' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
            'kecamatan' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
            'kabupaten_kota' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
            'provinsi' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
            'latitude' => [
                'type'       => 'DECIMAL',
                'constraint' => '10,8', // Cocok untuk akurasi koordinat GPS
            ],
            'longitude' => [
                'type'       => 'DECIMAL',
                'constraint' => '11,8', // Cocok untuk akurasi koordinat GPS
            ],
            'gender' => [
                'type'       => 'ENUM',
                'constraint' => ['1', '2', '3'], // Pilihan terbatas sesuai kebutuhan Anda
            ],
            'nikah' => [
                'type'       => 'ENUM',
                'constraint' => ['1', '2', '3'], // Pilihan terbatas sesuai kebutuhan Anda
            ],
            'created_at' => [
                'type'       => 'DATETIME',
                'null'       => true,
            ],
            'updated_at' => [
                'type'       => 'DATETIME',
                'null'       => true,
            ],
        ]);

        // Menentukan Primary Key
        $this->forge->addKey('id', true);

        // Membuat tabel bernama 'pengguna'
        $this->forge->createTable('pengguna');
    }

    public function down()
    {
        // Menghapus tabel jika migrasi dibatalkan (rollback)
        $this->forge->dropTable('pengguna');
    }

}
    $this->db->table('pengguna')->insertBatch($dataBulk);

