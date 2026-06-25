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
                               Menyatakan Setuju dan Terikat pada Ketentuan</a>
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
                              Hak Anda sebagai Subjek Data</a>
                          </li>
                          <li class="nav-item">
                            <a class="nav-link" id="konkam-tab4" data-toggle="tab" href="#konkam4" role="tab" aria-controls="konkam" aria-selected="false">
                              Kontak Kami</a>
                          </li>
                        </ul>
                      </div>
                      <div class="col-12 col-sm-12 col-md-7">
                        <div class="tab-content no-padding" id="myTab2Content">
                          <div class="tab-pane fade show active" id="home4" role="tabpanel" aria-labelledby="home-tab4">
                            Selamat datang di Official Website BBPPKS Bandung. </p>
                            Fitur Aduan Publik dan Permintaan Informasi disediakan untuk menjamin hak masyarakat dalam mendapatkan informasi publik dan menyampaikan aspirasi sesuai dengan UU No. 14 Tahun 2008 tentang Keterbukaan Informasi Publik
                            Kami berkomitmen untuk melindungi dan menghormati privasi data pribadi Anda selaku pengguna. </p>
                            Kebijakan Privasi ini disusun berdasarkan Undang-Undang No. 27 Tahun 2022 tentang Perlindungan Data Pribadi di Indonesia (UU 27/2022 PDP).
                            
                          </div>
                          <div class="tab-pane fade" id="dpykk4" role="tabpanel" aria-labelledby="dpyk-tab4">
                            Kami menggunakan data pribadi Anda untuk keperluan berikut:</p>
                            Menyediakan, mengoperasikan, dan menjaga layanan aplikasi.
                            Memproses transaksi atau permintaan yang Anda lakukan.
                            Mengirimkan notifikasi pembaruan sistem atau informasi layanan.
                            Memenuhi kewajiban hukum dan regulasi yang berlaku di Indonesia.
                          </div>
                          <div class="tab-pane fade" id="pdppk4" role="tabpanel" aria-labelledby="pdppk-tab4">
                            Kami tidak akan menjual atau menyewakan data pribadi Anda. 
                            Kami hanya membagikan data Anda kepada pihak ketiga tepercaya karena diwajibkan oleh hukum, perintah pengadilan, atau otoritas pemerintah yang sah di Indonesia.
                          </div>
                          <div class="tab-pane fade" id="kdpd4" role="tabpanel" aria-labelledby="kdpd-tab4">
                            Kami menerapkan standar keamanan teknis dan organisasional untuk melindungi data Anda dari akses tanpa izin. 
                            Data Anda akan disimpan selama akun Anda aktif atau sejauh yang diperlukan untuk menyediakan layanan hukum.
                          </div>
                          <div class="tab-pane fade" id="hassd4" role="tabpanel" aria-labelledby="hassd-tab4">
                            Anda memiliki hak untuk:
                            Mengakses dan meminta salinan data pribadi Anda.
                            Memperbarui atau memperbaiki data yang dianggap tidak akurat.
                            Meminta penghapusan atau pemusnahan data pribadi Anda dari sistem kami.
                            Menarik kembali persetujuan pemrosesan data.
                          </div>
                          <div class="tab-pane fade" id="konkam4" role="tabpanel" aria-labelledby="konkam-tab4">
                            Jika Anda memiliki pertanyaan mengenai Kebijakan Privasi ini atau ingin mengajukan permohonan hak data Anda, silakan hubungi kami di:</p>
                            Email: humasbbppksbandung@kemensos.go.id
                            Nomor Telepon/Hotline Media: 021-xxxxxx / WhatsApp Media Center 
                            Jam Operasional Pelayanan Media: Senin - Jumat (08.00 - 16.00 WIB)
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
</div>
<?= $this->endSection() ?>
