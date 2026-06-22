<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use Faker\Factory;

class PenggunaSeeder extends Seeder
{
    public function run()
    {
        // Inisialisasi Faker dengan regional Indonesia
        $faker = Factory::create('id_ID');

        // Menampung array data sebelum diinsert massal (lebih cepat)
        $dataBulk = [];

        // Membuat 100 data contoh
        for ($i = 0; $i < 100; $i++) {
            
            // Logika acak gender (1=Pria, 2=Wanita, 3=Lainnya/Tidak Mengisi)
            $gender = $faker->randomElement([1, 2, 3]);
            
            // Menyesuaikan nama berdasarkan gender agar lebih akurat
            if ($gender == 1) {
                $nama = $faker->name('male');
            } elseif ($gender == 2) {
                $nama = $faker->name('female');
            } else {
                $nama = $faker->name;
            }

            $dataBulk[] = [
                'nama'           => $nama,
                'nik'            => $faker->unique()->nik(),       // NIK buatan standar 16 digit Indonesia
                'email'          => $faker->unique()->freeEmail(), // Email gratis seperti gmail/yahoo
                'nomor_telepon'  => $faker->phoneNumber(),         // Format nomor HP Indonesia (+62 / 08xx)
                'desa'           => $faker->village(),             // Menghasilkan nama desa/kelurahan Indonesia
                'kecamatan'      => $faker->district(),            // Menghasilkan nama kecamatan di Indonesia
                'kabupaten_kota' => $faker->city(),                // Menghasilkan nama Kota atau Kabupaten
                'provinsi'       => $faker->state(),               // Menghasilkan nama Provinsi di Indonesia
                'latitude'       => $faker->latitude(-11, 6),      // Batas koordinat lintang Indonesia
                'longitude'      => $faker->longitude(95, 141),    // Batas koordinat bujur Indonesia
                'gender'         => $gender,                       // Angka acak 1, 2, atau 3
                'nikah'          => $faker->randomElement([1, 2, 3, 4]), // Status nikah acak (1, 2, 3)
            ];
        }

        // Menggunakan insertBatch agar proses eksekusi database jauh lebih cepat
        $this->db->table('nama_tabel_anda')->insertBatch($dataBulk);
    }
}