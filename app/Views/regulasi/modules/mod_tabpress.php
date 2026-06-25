<?= $this->extend('base/stisla'); ?>

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
                    <h4><= $card_header;?></h4>
                                        <a href="<= base_url('pdf/create') ?>" class="btn btn-primary"><i class="fas fa-plus mr-1"></i> Tambah PDF</a>
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
                               Siaran Pers Resmi (Press Release)</a>
                          </li>
                          <li class="nav-item">
                            <a class="nav-link" id="hassd-tab4" data-toggle="tab" href="#hassd4" role="tab" aria-controls="hassd" aria-selected="false">
                              Kit Media dan Aset Resmi (Media Kit)</a>
                          </li>
                          <li class="nav-item">
                            <a class="nav-link" id="pdppk-tab4" data-toggle="tab" href="#pdppk4" role="tab" aria-controls="pdppk" aria-selected="false">
                              Kontak Hubungan Masyarakat (Humas/PR)</a>
                          </li>
                          <li class="nav-item">
                            <a class="nav-link" id="kdpd-tab4" data-toggle="tab" href="#kdpd4" role="tab" aria-controls="kdpd" aria-selected="false">
                              Aturan Pengambilan Berita</a>
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
                            <p class="mt-2 mb-2">Selamat datang di Official Website BBPPKS Bandung. </p>
                            <p class="mt-2 mb-2">Halaman ini disediakan khusus bagi jurnalis, awak media, dan masyarakat umum untuk mendapatkan informasi, rilis berita resmi, dan aset publikasi resmi dari BBPPKS Bandung.</p>
                          </div>
                          <div class="tab-pane fade" id="dpykk4" role="tabpanel" aria-labelledby="dpyk-tab4">
                            <p class="mt-2 mb-2">Semua informasi yang diterbitkan dalam halaman website ini merupakan pernyataan resmi dari BBPPKS Bandung.  </p>
                            <p class="mt-2 mb-2">Rekan media diperbolehkan mengutip, menyebarluaskan, atau mempublikasikan ulang isi Siaran Pers ini dengan wajib mencantumkan sumber resmi, contoh "sumber: BBPPKS Bandung :: [Tanggal Release Sumber Informasi]" dalam siaran pers resminya. </p>
                            <p class="mt-2 mb-2">Dilarang keras mengubah konteks, memotong kalimat secara sepihak yang dapat mengubah makna asli informasi, atau menyalahgunakan siaran pers untuk menyebarkan disinformasi.</p>
                          </div>
                          <div class="tab-pane fade" id="pdppk4" role="tabpanel" aria-labelledby="pdppk-tab4">
                            <p class="mt-2 mb-2">Untuk menjaga integritas visual instansi, kami menyediakan aset resmi yang dapat diunduh oleh media untuk keperluan pemberitaan:Logo Resmi: Unduh logo instansi dalam format resolusi tinggi (.png transparan atau .vector). </p>
                            <p class="mt-2 mb-2">Penggunaan logo harus sesuai dengan panduan warna (brand guidelines) resmi instansi dan tidak boleh diubah warnanya atau dideformasi. </p>
                            <p class="mt-2 mb-2">Foto Pejabat Resmi: Foto resmi Kepala BBPPKS Bandung untuk kebutuhan ilustrasi berita. </p>
                            <p class="mt-2 mb-2">Dokumentasi Kegiatan: Foto dan video rangkaian kegiatan dinas yang bebas royalti untuk kebutuhan jurnalisme.</p>
                          </div>
                          <div class="tab-pane fade" id="kdpd4" role="tabpanel" aria-labelledby="kdpd-tab4">
                            <p class="mt-2 mb-2">Untuk permohonan wawancara khusus, konfirmasi berita, atau undangan peliputan acara dinas, rekan media dapat menghubungi tim Humas resmi kami melalui saluran di bawah ini: </p>
                            <p class="mt-2 mb-2">Penanggung Jawab: Kelompok Kerja Hubungan Masyarakat BBPPKS Bandung.</p>
                            <p class="mt-2 mb-2">Email Resmi Humas: humasbbppksbandung@kemensos.go.id  </p>
                            <p class="mt-2 mb-2">Nomor Telepon/Hotline Media: 021-xxxxxx / WhatsApp </p>
                            <p class="mt-2 mb-2">Media Center Jam Operasional Pelayanan Media: Senin - Jumat (08.00 - 16.00 WIB).</p>
                          </div>
                          <div class="tab-pane fade" id="hassd4" role="tabpanel" aria-labelledby="hassd-tab4">
                            <p class="mt-2 mb-2">(Disclaimer Media) BBPPKS Bandung tidak bertanggung jawab atas segala bentuk kutipan atau berita yang mencantumkan nama instansi kami, namun sumbernya diambil dari luar halaman resmi ini atau di luar juru bicara BBPPKS Bandung resmi yang ditunjuk. </p>
                            <p class="mt-2 mb-2">Segala bentuk wawancara pencegatan (doorstop) di luar agenda resmi harus mendapatkan konfirmasi ulang kepada Pokja Humas sebelum dipublikasikan demi akurasi data dan informasi.</p>
                          </div>
                          <div class="tab-pane fade" id="konkam4" role="tabpanel" aria-labelledby="konkam-tab4">
                            <p class="mt-2 mb-2">Jika Anda memiliki pertanyaan mengenai Kebijakan Privasi ini atau ingin mengajukan permohonan hak data Anda, silakan hubungi kami di:</p>
                            <p class="mt-2 mb-2">Email: humasbbppksbandung@kemensos.go.id</p>
                            <p class="mt-2 mb-2">Nomor Telepon/Hotline Media: 021-xxxxxx / WhatsApp Media Center </p>
                            <p class="mt-2 mb-2">Jam Operasional Pelayanan Media: Senin - Jumat (08.00 - 16.00 WIB)</p>
                            <p class="mt-2 mb-2">Alamat: Jalan Panorama 1, Desa Jayagiri, Kecamatan Lembang -  Kabupaten Bandung Barat</p>

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
