<?= $this->extend('base/skeleton'); ?>

<?= $this->section('content') ?>
<div class="main-content">
        <!-- <section class="section">
          <div class="section-header">
            <h1><?= $section_header;?></h1>
          </div> -->

          <?=$this->include('base/4row')?>
          <?=$this->include('base/4sub_section_header')?>

          <div class="section-body">

            <!-- <div class="row">
              <div class="col-12 col-md-6 col-lg-12">
                <div class="card">
                  <div class="card-header">
                    <h4><?= $card_header;?></h4>
                                        <a href="<?= base_url('pdf/create') ?>" class="btn btn-primary"><i class="fas fa-plus mr-1"></i> Tambah PDF</a>
                  </div>
                  <div class="card-body p-0"> -->
       
    <div class="row justify-content-center">
    <div class="col-md-12">
        <div class="card shadow-lg">
            <!-- <div class="card-header bg-whitesmoke text-dark">
                <h4><i class="fas fa-edit mr-2 text-warning"></i>Ubah Informasi Dokumen</h4>
            </div> -->
                
               <div class="col-12 col-sm-12 col-lg-12">
                <div class="card">
                  <div class="card-header">
                    <h4><?= $card_header;?></h4>
                  </div>
                  <div class="card-body">
                    <div class="row">
                      <div class="col-12 col-sm-12 col-md-3">
                        <ul class="nav nav-pills flex-column" id="myTab4" role="tablist">
                          <li class="nav-item">
                            <a class="nav-link active" id="home-tab4" data-toggle="tab" href="#home4" role="tab" aria-controls="home" aria-selected="true">
                              Pendahuluan</a>
                          </li>
                          <li class="nav-item">
                            <a class="nav-link" id="dpykk-tab4" data-toggle="tab" href="#dpykk4" role="tab" aria-controls="dpykk" aria-selected="false">
                              Data Pribadi yang Kami Kumpulkan</a>
                          </li>
                          <li class="nav-item">
                            <a class="nav-link" id="pdppk-tab4" data-toggle="tab" href="#pdppk4" role="tab" aria-controls="pdppk" aria-selected="false">
                              Pengungkapan Data kepada Pihak Ketiga</a>
                          </li>
                          <li class="nav-item">
                            <a class="nav-link" id="kdpd-tab4" data-toggle="tab" href="#kdpd4" role="tab" aria-controls="kdpd" aria-selected="false">
                              Keamanan dan Penyimpanan Data</a>
                          </li>
                          <li class="nav-item">
                            <a class="nav-link" id="hassd-tab4" data-toggle="tab" href="#hassd4" role="tab" aria-controls="hassd" aria-selected="false">
                              Hak Pengguna sebagai Subjek Data</a>
                          </li>
                          <li class="nav-item">
                            <a class="nav-link" id="lpssd-tab4" data-toggle="tab" href="#lpssd4" role="tab" aria-controls="lpssd" aria-selected="false">
                              Larangan Pengguna sebagai Subjek Data</a>
                          </li>
                          <li class="nav-item">
                            <a class="nav-link" id="kmfm-tab4" data-toggle="tab" href="#kmfm4" role="tab" aria-controls="kmfm" aria-selected="false">
                              Keadaan Memaksa (Force Majeure)</a>
                          </li>
                          <li class="nav-item">
                            <a class="nav-link" id="konkam-tab4" data-toggle="tab" href="#konkam4" role="tab" aria-controls="konkam" aria-selected="false">
                              Kontak Kami</a>
                          </li>
                          <li class="nav-item">
                            <a class="nav-link" id="ppk-tab4" data-toggle="tab" href="#ppk4" role="tab" aria-controls="ppk" aria-selected="false">
                              Penutup</a>
                          </li>
                        </ul>
                      </div>
                      <div class="col-12 col-sm-12 col-md-7">
                        <div class="tab-content no-padding" id="myTab2Content">
                          <div class="tab-pane fade show active" id="home4" role="tabpanel" aria-labelledby="home-tab4">
                            Selamat datang di Official Website BBPPKS Bandung. </p>
                            Kami berkomitmen untuk melindungi dan menghormati privasi data pribadi Pengguna selaku pengguna. </p>
                            Kebijakan Privasi ini disusun berdasarkan Undang-Undang Nomor 27 Tahun 2022 tentang Perlindungan Data Pribadi (UU 27/2022).
                            Kebijakan Privasi ini adalah perjanjian antara pengguna ('Pengguna') dan BBPPKS Bandung selaku Badan Publik pemilik Official Website BBPPKS Bandung ('Aplikasi Website') selanjutnya disebut "Aplikasi" untuk memberikan pelayanan Informasi Publik sesuai Undang-Undang Nomor 14 Tahun 2008 tentang Keterbukaan Informasi Publik UU 14/2008. 
                            Kebijakan Privasi ini mengatur akses dan penggunaan konten dan produk aplikasi. 
                            Kebijakan Privasi ini merupakan bagian dari Syarat dan Ketentuan Penggunaan. 
                            Dengan menggunakan aplikasi, Pengguna dianggap setuju untuk terikat dengan ketentuan Kebijakan Privasi ini. 
                            Apabila Pengguna tidak setuju terhadap salah satu, sebagian, atau seluruh isi yang tertuang dalam Kebijakan Privasi ini, maka Pengguna diperkenankan untuk menghapus data yang terlanjur dikirimkan ke dalam sistem aplikasi dan/atau tidak mengakses aplikasi dan/atau tidak menggunakan aplikasi. 
                            Aplikasi terlepas dari seluruh tanggung jawab dan/atau dari seluruh kerugian yang Pengguna terima sehubungan keputusan untuk tidak menggunakan aplikasi ini.
                            Aplikasi ini diselenggarakan dalam rangka pelaksanaan fungsi pelayanan publik dan pemerintahan digital (E-Government).
                          </div>
                          <div class="tab-pane fade" id="dpykk4" role="tabpanel" aria-labelledby="dpyk-tab4">
                            Kami menggunakan data pribadi Pengguna untuk keperluan berikut:</p>
                            Melakukan verifikasi validitas identitas Pemohon/Pengadu guna mencegah laporan fiktif atau anonim yang tidak bertanggung jawab.
                            Menyediakan, mengoperasikan, dan menjaga layanan aplikasi.
                            Memenuhi syarat administratif untuk memproses transaksi atau permintaan yang Pengguna lakukan.
                            Menghubungi, mengirimkan notifikasi pembaruan sistem atau perkembangan status informasi layanan.
                            Memenuhi kewajiban hukum dan regulasi yang berlaku di Indonesia.
                          </div>
                          <div class="tab-pane fade" id="pdppk4" role="tabpanel" aria-labelledby="pdppk-tab4">
                            Pengguna wajib memberikan data pribadi yang akurat, sah, benar, dan mutakhir sesuai dengan identitas resmi (KTP/Paspor/Kartu Keluarga).
                            Pemalsuan data pribadi, penggunaan identitas orang lain tanpa hak, atau manipulasi informasi merupakan pelanggaran hukum berat yang dapat diproses secara pidana.
                            Dokumen yang diunggah harus merupakan dokumen asli, sah, jelas terbaca, dan tidak direkayasa secara ilegal.
                            Dokumen yang diunggah tidak boleh melanggar hak kekayaan intelektual atau hak privasi pihak ketiga tanpa izin sah.
                            Kami tidak akan menjual atau menyewakan data pribadi Pengguna. 
                            Kami hanya membagikan data Pengguna kepada pihak ketiga tepercaya jika diwajibkan oleh hukum, perintah pengadilan, atau otoritas pemerintah yang sah di Indonesia.
                          </div>
                          <div class="tab-pane fade" id="kdpd4" role="tabpanel" aria-labelledby="kdpd-tab4">
                            Kami menerapkan standar keamanan teknis dan organisasional untuk melindungi data Pengguna dari akses tanpa izin. 
                            Pengguna bertanggung jawab penuh untuk menjaga kerahasiaan kredensial akun.
                            Setiap aktivitas yang dilakukan melalui akun Pengguna dianggap sebagai tindakan sah dari Pengguna yang bersangkutan.
                            Kami tidak bertanggung jawab atas kerugian akibat kelalaian Pengguna dalam menjaga keamanan akun miliknya.
                            Data Pengguna akan disimpan selama akun Pengguna aktif atau sejauh yang diperlukan untuk menyediakan layanan hukum.
                          </div>
                          <div class="tab-pane fade" id="hassd4" role="tabpanel" aria-labelledby="hassd-tab4">
                            Pengguna memiliki hak untuk:
                            Mengakses dan meminta salinan data pribadi Anda.
                            Memperbarui atau memperbaiki data yang dianggap tidak akurat.
                            Meminta penghapusan atau pemusnahan data pribadi Pengguna dari sistem kami.
                            Menarik kembali persetujuan pemrosesan data.
                          </div>
                          <div class="tab-pane fade" id="lpssd4" role="tabpanel" aria-labelledby="lpssd-tab4">
                            Melakukan tindakan yang dapat merusak, mengganggu, atau membebani infrastruktur server dan sistem aplikasi.
                            Mengunggah file yang mengandung virus, malware, spyware, atau skrip berbahaya yang dapat mengancam keamanan infrastruktur.
                            Menggunakan data atau informasi yang diperoleh dari aplikasi ini untuk aktivitas komersial, penipuan, dan/atau tindakan melawan hukum lainnya.
                            Menyampaikan aduan yang tidak jelas, merugikan pihak lain, ujaran kebencian, SARA, mencemarkan nama baik, memfitnah, informasi palsu
                          </div>
                          <div class="tab-pane fade" id="kmfm4" role="tabpanel" aria-labelledby="kmfm-tab4">
                            Kami tidak bertanggung jawab atas gangguan layanan, kegagalan sistem, atau keterlambatan proses yang disebabkan oleh keadaan di luar kendali wajar (seperti bencana alam, gangguan massal jaringan internet, pemadaman listrik nasional, serangan siber skala masif, atau perubahan kebijakan regulasi negara).
                          </div>
                          <div class="tab-pane fade" id="ppk4" role="tabpanel" aria-labelledby="ppk-tab4">
                            Perubahan Ketentuan: </p>
                            Kami berhak untuk mengubah, menambah, atau memperbarui Syarat dan Ketentuan ini sewaktu-waktu demi menyesuaikan dengan perubahan hukum atau peningkatan sistem pelayanan. Perubahan akan diumumkan melalui halaman ini.
                          </div>
                          <div class="tab-pane fade" id="konkam4" role="tabpanel" aria-labelledby="konkam-tab4">
                            Jika Pengguna memiliki pertanyaan mengenai Kebijakan Privasi ini atau ingin mengajukan permohonan hak data Anda, silakan hubungi kami di:</p>
                            Email: humasbbppksbandung@kemensos.go.id
                            Alamat: Jalan Panorama 1, Desa Jayagiri, Kecamatan Lembang -  Kabupaten Bandung Barat
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>
