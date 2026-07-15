<?= $this->extend('base/skeleton'); ?>

<?= $this->section('content') ?>
<div class="main-content">

          <?=$this->include('base/4row')?>
          <?=$this->include('base/4sub_section_header')?>

          <div class="section-body">

    <div class="row justify-content-center">
    <div class="col-md-12">
        <div class="card shadow-lg">
            <!-- <div class="card-header bg-whitesmoke text-dark">
                <h4><i class="fas fa-edit mr-2 text-warning"></i>Ubah Informasi Dokumen</h4>
            </div> -->
              <div class="col-12 col-sm-12 col-lg-12">
                <!-- <div class="card">
                  <div class="card-header">
                    <h4><?= $card_header;?></h4>
                  </div> -->
                  <div class="card-body">
                    <ul class="nav nav-tabs" id="myTab2" role="tablist">
                      <li class="nav-item">
                        <a class="nav-link active" id="hometc-tab2" data-toggle="tab" href="#hometc24" role="tab" aria-controls="hometc" aria-selected="true">TERM & CONDITIONS</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" id="privacy-tab25" data-toggle="tab" href="#privacy25" role="tab" aria-controls="privacy" aria-selected="false"> PRIVACY POLICY</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" id="press-tab26" data-toggle="tab" href="#press26" role="tab" aria-controls="press" aria-selected="false">PRESS</a>
                      </li>
                    </ul>
                    <!-- ======================== -->
                     
                    <div class="tab-content tab" id="myTab3Content">
                      <div class="tab-pane fade show active" id="hometc24" role="tabpanel" aria-labelledby="hometc-tab24">
                        <div class="col-12 col-sm-12 col-lg-12">
                          <div class="card">
                            <div class="card-header">
                              <h4><?= $card_header_tc;?></h4>
                            </div>
                            <div class="card-body">
                              <div class="row">
                                <div class="col-12 col-sm-12 col-md-3">
                                  <ul class="nav nav-pills flex-column" id="myTab44" role="tablist">
                                    <li class="nav-item">
                                      <a class="nav-link active" id="home-tab44" data-toggle="tab" href="#home44" role="tab" aria-controls="home" aria-selected="true">
                                        Pendahuluan</a>
                                    </li>
                                    <li class="nav-item">
                                      <a class="nav-link" id="dpykk-tab44" data-toggle="tab" href="#dpykk44" role="tab" aria-controls="dpykk" aria-selected="false">
                                        Menyatakan Setuju dan Terikat pada Ketentuan</a>
                                    </li>
                                    <li class="nav-item">
                                      <a class="nav-link" id="pdppk-tab44" data-toggle="tab" href="#pdppk44" role="tab" aria-controls="pdppk" aria-selected="false">
                                        Pengungkapan Data kepada Pihak Ketiga</a>
                                    </li>
                                    <li class="nav-item">
                                      <a class="nav-link" id="kdpd-tab44" data-toggle="tab" href="#kdpd44" role="tab" aria-controls="kdpd" aria-selected="false">
                                        Keamanan dan Penyimpanan Data</a>
                                    </li>
                                    <li class="nav-item">
                                      <a class="nav-link" id="hassd-tab44" data-toggle="tab" href="#hassd44" role="tab" aria-controls="hassd" aria-selected="false">
                                        Hak Anda sebagai Subjek Data</a>
                                    </li>
                                    <li class="nav-item">
                                      <a class="nav-link" id="kmfm-tab45" data-toggle="tab" href="#kmfm45" role="tab" aria-controls="kmfm" aria-selected="false">
                                        Keadaan Memaksa (Force Majeure)</a>
                                    </li>
                                    <li class="nav-item">
                                      <a class="nav-link" id="konkam-tab44" data-toggle="tab" href="#konkam44" role="tab" aria-controls="konkam" aria-selected="false">
                                        Kontak Kami</a>
                                    </li>
                                    <li class="nav-item">
                                      <a class="nav-link" id="ppk-tab44" data-toggle="tab" href="#ppk44" role="tab" aria-controls="ppk" aria-selected="false">
                                        Penutup</a>
                                    </li>
                                  </ul>
                                </div>
                                <div class="col-12 col-sm-12 col-md-9">
                                  <div class="tab-content no-padding" id="myTab24Content">
                                    <div class="tab-pane fade show active" id="home44" role="tabpanel" aria-labelledby="home-tab44">
                                      <p class="mt-2 mb-2">Selamat datang di Official Website BBPPKS Bandung. </p>
                                      <p class="mt-2 mb-2">Fitur Aduan Publik dan Permintaan Informasi disediakan untuk menjamin hak masyarakat dalam mendapatkan informasi publik dan menyampaikan aspirasi sesuai dengan UU No. 14 Tahun 2008 tentang Keterbukaan Informasi Publik (UU 14/2008 KIP).</p>
                                      <p class="mt-2 mb-2">Kami berkomitmen untuk melindungi dan menghormati privasi data pribadi Anda selaku pengguna. </p>
                                      <p class="mt-2 mb-2">Kebijakan Privasi ini disusun berdasarkan Undang-Undang No. 27 Tahun 2022 tentang Perlindungan Data Pribadi di Indonesia (UU 27/2022 PDP).</p>
                                      <p class="mt-2 mb-2">Aplikasi ini diselenggarakan dalam rangka pelaksanaan fungsi pelayanan publik dan pemerintahan digital (E-Government).</p>                                      
                                    </div>
                                    <div class="tab-pane fade" id="dpykk44" role="tabpanel" aria-labelledby="dpyk-tab44">
                                      <p class="mt-2 mb-2">Kami menggunakan data pribadi Anda untuk keperluan berikut:</p>
                                      <p class="mt-2 mb-2">Menyediakan, mengoperasikan, dan menjaga layanan aplikasi.</p>
                                      <p class="mt-2 mb-2">Memproses transaksi atau permintaan yang Anda lakukan.</p>
                                      <p class="mt-2 mb-2">Mengirimkan notifikasi pembaruan sistem atau informasi layanan.</p>
                                      <p class="mt-2 mb-2">Memenuhi kewajiban hukum dan regulasi yang berlaku di Indonesia.</p>
                                    </div>
                                    <div class="tab-pane fade" id="pdppk44" role="tabpanel" aria-labelledby="pdppk-tab44">
                                      <p class="mt-2 mb-2">Kami tidak akan menjual atau menyewakan data pribadi Anda. </p>
                                      <p class="mt-2 mb-2">Kami hanya membagikan data Anda kepada pihak ketiga tepercaya karena diwajibkan oleh hukum, perintah pengadilan, atau otoritas pemerintah yang sah di Indonesia.</p>
                                    </div>
                                    <div class="tab-pane fade" id="kdpd44" role="tabpanel" aria-labelledby="kdpd-tab44"></p>
                                      <p class="mt-2 mb-2">Kami menerapkan standar keamanan teknis dan organisasional untuk melindungi data Anda dari akses tanpa izin. </p>
                                      <p class="mt-2 mb-2">Data Anda akan disimpan selama akun Anda aktif atau sejauh yang diperlukan untuk menyediakan layanan hukum.</p>
                                    </div>
                                    <div class="tab-pane fade" id="hassd44" role="tabpanel" aria-labelledby="hassd-tab44">
                                      <p class="mt-2 mb-2">Anda memiliki hak untuk:</p>
                                      <p class="mt-2 mb-2">Mengakses dan meminta salinan data pribadi Anda.</p>
                                      <p class="mt-2 mb-2">Memperbarui atau memperbaiki data yang dianggap tidak akurat.</p>
                                      <p class="mt-2 mb-2">Meminta penghapusan atau pemusnahan data pribadi Anda dari sistem kami.</p>
                                      <p class="mt-2 mb-2">Menarik kembali persetujuan pemrosesan data.</p>
                                    </div>
                                    <div class="tab-pane fade" id="kmfm44" role="tabpanel" aria-labelledby="kmfm-tab44">
                                      <p class="mt-2 mb-2">Kami tidak bertanggung jawab atas gangguan layanan, kegagalan sistem, atau keterlambatan proses yang disebabkan oleh keadaan di luar kendali wajar (seperti bencana alam, gangguan massal jaringan internet, pemadaman listrik nasional, serangan siber skala masif, atau perubahan kebijakan regulasi negara).</p>
                                    </div>
                                    <div class="tab-pane fade" id="konkam44" role="tabpanel" aria-labelledby="konkam-tab44">
                                      <p class="mt-2 mb-2">Jika Anda memiliki pertanyaan mengenai Kebijakan Privasi ini atau ingin mengajukan permohonan hak data Anda, silakan hubungi kami di:</p>
                                      <p class="mt-2 mb-2">Email: humasbbppksbandung@kemensos.go.id</p>
                                      <p class="mt-2 mb-2">Nomor Telepon/Hotline Media: 021-xxxxxx / WhatsApp Media Center</p> 
                                      <p class="mt-2 mb-2">Jam Operasional Pelayanan Media: Senin - Jumat (08.00 - 16.00 WIB)</p>
                                      <p class="mt-2 mb-2">Alamat: Jalan Panorama 1, Desa Jayagiri, Kecamatan Lembang -  Kabupaten Bandung Barat</p>
                                    </div>
                                    <div class="tab-pane fade" id="ppk44" role="tabpanel" aria-labelledby="ppk-tab44">
                                      <p class="mt-2 mb-2">Perubahan Ketentuan: </p>
                                      <p class="mt-2 mb-2">Kami berhak untuk mengubah, menambah, atau memperbarui Syarat dan Ketentuan, Kebijakan Privacy, Media Massa ini sewaktu-waktu demi menyesuaikan dengan perubahan hukum atau peningkatan sistem pelayanan.</P> 
                                      <p class="mt-2 mb-2">Perubahan akan diumumkan melalui halaman ini.</p>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                    </div>
                      <div class="tab-pane fade" id="privacy25" role="tabpanel" aria-labelledby="privacy-tab25">
                        <div class="col-12 col-sm-12 col-lg-12">
                          <div class="card">
                            <div class="card-header">
                              <h4><?= $card_header_pv;?></h4>
                            </div>
                            <div class="card-body">
                              <div class="row">
                                <div class="col-12 col-sm-12 col-md-3">
                                  <ul class="nav nav-pills flex-column" id="myTab45" role="tablist">
                                    <li class="nav-item">
                                      <a class="nav-link active" id="home-tab45" data-toggle="tab" href="#home45" role="tab" aria-controls="home" aria-selected="true">
                                        Pendahuluan</a>
                                    </li>
                                    <li class="nav-item">
                                      <a class="nav-link" id="dpykk-tab45" data-toggle="tab" href="#dpykk45" role="tab" aria-controls="dpykk" aria-selected="false">
                                        Data Pribadi yang Kami Kumpulkan</a>
                                    </li>
                                    <li class="nav-item">
                                      <a class="nav-link" id="pdppk-tab45" data-toggle="tab" href="#pdppk45" role="tab" aria-controls="pdppk" aria-selected="false">
                                        Pengungkapan Data kepada Pihak Ketiga</a>
                                    </li>
                                    <li class="nav-item">
                                      <a class="nav-link" id="kdpd-tab45" data-toggle="tab" href="#kdpd45" role="tab" aria-controls="kdpd" aria-selected="false">
                                        Keamanan dan Penyimpanan Data</a>
                                    </li>
                                    <li class="nav-item">
                                      <a class="nav-link" id="hassd-tab45" data-toggle="tab" href="#hassd45" role="tab" aria-controls="hassd" aria-selected="false">
                                        Hak Pengguna sebagai Subjek Data</a>
                                    </li>
                                    <li class="nav-item">
                                      <a class="nav-link" id="lpssd-tab45" data-toggle="tab" href="#lpssd45" role="tab" aria-controls="lpssd" aria-selected="false">
                                        Larangan Pengguna sebagai Subjek Data</a>
                                    </li>
                                    <li class="nav-item">
                                      <a class="nav-link" id="konkam-tab45" data-toggle="tab" href="#konkam45" role="tab" aria-controls="konkam" aria-selected="false">
                                        Kontak Kami</a>
                                    </li>
                                    <li class="nav-item">
                                      <a class="nav-link" id="ppk-tab45" data-toggle="tab" href="#ppk45" role="tab" aria-controls="ppk" aria-selected="false">
                                        Penutup</a>
                                    </li>
                                  </ul>
                                </div>
                                <div class="col-12 col-sm-12 col-md-9">
                                  <div class="tab-content no-padding" id="myTab25Content">
                                    <div class="tab-pane fade show active" id="home45" role="tabpanel" aria-labelledby="home-tab45">
                                      <p class="mt-2 mb-2">Selamat datang di Official Website BBPPKS Bandung. </p>
                                      <p class="mt-2 mb-2">Kami berkomitmen untuk melindungi dan menghormati privasi data pribadi Pengguna selaku pengguna. </p>
                                      <p class="mt-2 mb-2">Kebijakan Privasi ini disusun berdasarkan Undang-Undang Nomor 27 Tahun 2022 tentang Perlindungan Data Pribadi (UU 27/2022).</p>
                                      <p class="mt-2 mb-2">Kebijakan Privasi ini adalah perjanjian antara pengguna ('Pengguna') dan BBPPKS Bandung selaku Badan Publik pemilik Official Website BBPPKS Bandung ('Aplikasi Website') selanjutnya disebut "Aplikasi" untuk memberikan pelayanan Informasi Publik sesuai Undang-Undang Nomor 14 Tahun 2008 tentang Keterbukaan Informasi Publik (UU 14/2008 KIP). </p>
                                      <p class="mt-2 mb-2">Kebijakan Privasi ini mengatur akses dan penggunaan konten dan produk aplikasi. </p>
                                      <p class="mt-2 mb-2">Kebijakan Privasi ini merupakan bagian dari Syarat dan Ketentuan Penggunaan. </p>
                                      <p class="mt-2 mb-2">Dengan menggunakan aplikasi, Pengguna dianggap setuju untuk terikat dengan ketentuan Kebijakan Privasi ini.</p> 
                                      <p class="mt-2 mb-2">Apabila Pengguna tidak setuju terhadap salah satu, sebagian, atau seluruh isi yang tertuang dalam Kebijakan Privasi ini, maka Pengguna diperkenankan untuk menghapus data yang terlanjur dikirimkan ke dalam sistem aplikasi dan/atau tidak mengakses aplikasi dan/atau tidak menggunakan aplikasi.</p> 
                                      <p class="mt-2 mb-2">Aplikasi terlepas dari seluruh tanggung jawab dan/atau dari seluruh kerugian yang Pengguna terima sehubungan keputusan untuk tidak menggunakan aplikasi ini.</p>
                                    </div>
                                    <div class="tab-pane fade" id="dpykk45" role="tabpanel" aria-labelledby="dpyk-tab45">
                                      <p class="mt-2 mb-2">Kami menggunakan data pribadi Pengguna untuk keperluan berikut:</p>
                                      <p class="mt-2 mb-2">Melakukan verifikasi validitas identitas Pemohon/Pengadu guna mencegah laporan fiktif atau anonim yang tidak bertanggung jawab.</p>
                                      <p class="mt-2 mb-2">Menyediakan, mengoperasikan, dan menjaga layanan aplikasi.</p>
                                      <p class="mt-2 mb-2">Memenuhi syarat administratif untuk memproses transaksi atau permintaan yang Pengguna lakukan.</p>
                                      <p class="mt-2 mb-2">Menghubungi, mengirimkan notifikasi pembaruan sistem atau perkembangan status informasi layanan.</p>
                                      <p class="mt-2 mb-2">Memenuhi kewajiban hukum dan regulasi yang berlaku di Indonesia.</p>
                                    </div>
                                    <div class="tab-pane fade" id="pdppk45" role="tabpanel" aria-labelledby="pdppk-tab45">
                                      <p class="mt-2 mb-2">Pengguna wajib memberikan data pribadi yang akurat, sah, benar, dan mutakhir sesuai dengan identitas resmi (KTP/Paspor/Kartu Keluarga).</p>
                                      <p class="mt-2 mb-2">Pemalsuan data pribadi, penggunaan identitas orang lain tanpa hak, atau manipulasi informasi merupakan pelanggaran hukum berat yang dapat diproses secara pidana.</p>
                                      <p class="mt-2 mb-2">Dokumen yang diunggah harus merupakan dokumen asli, sah, jelas terbaca, dan tidak direkayasa secara ilegal.</p>
                                      <p class="mt-2 mb-2">Dokumen yang diunggah tidak boleh melanggar hak kekayaan intelektual atau hak privasi pihak ketiga tanpa izin sah.</p>
                                      <p class="mt-2 mb-2">Kami tidak akan menjual atau menyewakan data pribadi Pengguna. </p>
                                      <p class="mt-2 mb-2">Kami hanya membagikan data Pengguna kepada pihak ketiga tepercaya jika diwajibkan oleh hukum, perintah pengadilan, atau otoritas pemerintah yang sah di Indonesia.</p>
                                    </div>
                                    <div class="tab-pane fade" id="kdpd45" role="tabpanel" aria-labelledby="kdpd-tab45">
                                      <p class="mt-2 mb-2">Kami menerapkan standar keamanan teknis dan organisasional untuk melindungi data Pengguna dari akses tanpa izin.</p> 
                                      <p class="mt-2 mb-2">Pengguna bertanggung jawab penuh untuk menjaga kerahasiaan kredensial akun.</p>
                                      <p class="mt-2 mb-2">Setiap aktivitas yang dilakukan melalui akun Pengguna dianggap sebagai tindakan sah dari Pengguna yang bersangkutan.</p>
                                      <p class="mt-2 mb-2">Kami tidak bertanggung jawab atas kerugian akibat kelalaian Pengguna dalam menjaga keamanan akun miliknya.</p>
                                      <p class="mt-2 mb-2">Data Pengguna akan disimpan selama akun Pengguna aktif atau sejauh yang diperlukan untuk menyediakan layanan hukum.</p>
                                    </div>
                                    <div class="tab-pane fade" id="hassd45" role="tabpanel" aria-labelledby="hassd-tab45">
                                      <p class="mt-2 mb-2">Pengguna memiliki hak untuk:</p>
                                      <p class="mt-2 mb-2">Mengakses dan meminta salinan data pribadi Anda.</p>
                                      <p class="mt-2 mb-2">Memperbarui atau memperbaiki data yang dianggap tidak akurat.</p>
                                      <p class="mt-2 mb-2">Meminta penghapusan atau pemusnahan data pribadi Pengguna dari sistem kami.</p>
                                      <p class="mt-2 mb-2">Menarik kembali persetujuan pemrosesan data.</p>
                                    </div>
                                    <div class="tab-pane fade" id="lpssd45" role="tabpanel" aria-labelledby="lpssd-tab45">
                                      <p class="mt-2 mb-2">Melakukan tindakan yang dapat merusak, mengganggu, atau membebani infrastruktur server dan sistem aplikasi.</p>
                                      <p class="mt-2 mb-2">Mengunggah file yang mengandung virus, malware, spyware, atau skrip berbahaya yang dapat mengancam keamanan infrastruktur.</p>
                                      <p class="mt-2 mb-2">Menggunakan data atau informasi yang diperoleh dari aplikasi ini untuk aktivitas komersial, penipuan, dan/atau tindakan melawan hukum lainnya.</p>
                                      <p class="mt-2 mb-2">Menyampaikan aduan yang tidak jelas, merugikan pihak lain, ujaran kebencian, SARA, mencemarkan nama baik, memfitnah, informasi palsu.</p>
                                    </div>
                                    <div class="tab-pane fade" id="konkam45" role="tabpanel" aria-labelledby="konkam-tab45">
                                      <p class="mt-2 mb-2">Jika Pengguna memiliki pertanyaan mengenai Kebijakan Privasi ini atau ingin mengajukan permohonan hak data, silakan hubungi kami di:</p>
                                      <p class="mt-2 mb-2">Email: humasbbppksbandung@kemensos.go.id</p>
                                      <p class="mt-2 mb-2">Nomor Telepon/Hotline Media: 021-xxxxxx / WhatsApp Media Center</p> 
                                      <p class="mt-2 mb-2">Jam Operasional Pelayanan Media: Senin - Jumat (08.00 - 16.00 WIB)</p>
                                      <p class="mt-2 mb-2">Alamat: Jalan Panorama 1, Desa Jayagiri, Kecamatan Lembang -  Kabupaten Bandung Barat</p>
                                    </div>
                                    <div class="tab-pane fade" id="ppk45" role="tabpanel" aria-labelledby="ppk-tab45">
                                      <p class="mt-2 mb-2">Perubahan Ketentuan: </p>
                                      <p class="mt-2 mb-2">Kami berhak untuk mengubah, menambah, atau memperbarui Syarat dan Ketentuan, Kebijakan Privacy, Media Massa ini sewaktu-waktu demi menyesuaikan dengan perubahan hukum atau peningkatan sistem pelayanan. </p>
                                      <p class="mt-2 mb-2">Perubahan akan diumumkan melalui halaman ini.</p>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                      </div>
                    </div>
                      <div class="tab-pane fade" id="press26" role="tabpanel" aria-labelledby="press-tab26">
                        <div class="col-12 col-sm-12 col-lg-12">
                          <div class="card">
                            <div class="card-header">
                              <h4><?= $card_header_pr;?></h4>
                            </div>
                            <div class="card-body">
                              <div class="row">
                                <div class="col-12 col-sm-12 col-md-3">
                                  <ul class="nav nav-pills flex-column" id="myTab46" role="tablist">
                                    <li class="nav-item">
                                      <a class="nav-link active" id="home-tab46" data-toggle="tab" href="#home46" role="tab" aria-controls="home" aria-selected="true">
                                        Pendahuluan</a>
                                    </li>
                                    <li class="nav-item">
                                      <a class="nav-link" id="dpykk-tab46" data-toggle="tab" href="#dpykk46" role="tab" aria-controls="dpykk" aria-selected="false">
                                        Siaran Pers Resmi (Press Release)</a>
                                    </li>
                                    <li class="nav-item">
                                      <a class="nav-link" id="hassd-tab46" data-toggle="tab" href="#hassd46" role="tab" aria-controls="hassd" aria-selected="false">
                                        Kit Media dan Aset Resmi (Media Kit)</a>
                                    </li>
                                    <li class="nav-item">
                                      <a class="nav-link" id="pdppk-tab46" data-toggle="tab" href="#pdppk46" role="tab" aria-controls="pdppk" aria-selected="false">
                                        Kontak Hubungan Masyarakat (Humas/PR)</a>
                                    </li>
                                    <li class="nav-item">
                                      <a class="nav-link" id="kdpd-tab46" data-toggle="tab" href="#kdpd46" role="tab" aria-controls="kdpd" aria-selected="false">
                                        Aturan Pengambilan Berita</a>
                                    </li>
                                    <li class="nav-item">
                                      <a class="nav-link" id="konkam-tab46" data-toggle="tab" href="#konkam46" role="tab" aria-controls="konkam" aria-selected="false">
                                        Kontak Kami</a>
                                    </li>
                                    <li class="nav-item">
                                      <a class="nav-link" id="ppk-tab46" data-toggle="tab" href="#ppk46" role="tab" aria-controls="ppk" aria-selected="false">
                                        Penutup</a>
                                    </li>
                                  </ul>
                                </div>
                                <div class="col-12 col-sm-12 col-md-9">
                                  <div class="tab-content no-padding" id="myTab26Content">
                                    <div class="tab-pane fade show active" id="home46" role="tabpanel" aria-labelledby="home-tab4">
                                      <p class="mt-2 mb-2">Selamat datang di Official Website BBPPKS Bandung. </p>
                                      <p class="mt-2 mb-2">Halaman ini disediakan khusus bagi jurnalis, awak media, dan masyarakat umum untuk mendapatkan informasi, rilis berita resmi, dan aset publikasi resmi dari BBPPKS Bandung.</p>
                                    </div>
                                    <div class="tab-pane fade" id="dpykk46" role="tabpanel" aria-labelledby="dpyk-tab46">
                                      <p class="mt-2 mb-2">Semua informasi yang diterbitkan dalam halaman website ini merupakan pernyataan resmi dari BBPPKS Bandung.  </p>
                                      <p class="mt-2 mb-2">Rekan media diperbolehkan mengutip, menyebarluaskan, atau mempublikasikan ulang isi Siaran Pers ini dengan wajib mencantumkan sumber resmi, contoh "sumber: BBPPKS Bandung :: [Tanggal Release Sumber Informasi]" dalam siaran pers resminya. </p>
                                      <p class="mt-2 mb-2">Dilarang keras mengubah konteks, memotong kalimat secara sepihak yang dapat mengubah makna asli informasi, atau menyalahgunakan siaran pers untuk menyebarkan disinformasi.</p>
                                    </div>
                                    <div class="tab-pane fade" id="pdppk46" role="tabpanel" aria-labelledby="pdppk-tab46">
                                      <p class="mt-2 mb-2">Untuk menjaga integritas visual instansi, kami menyediakan aset resmi yang dapat diunduh oleh media untuk keperluan pemberitaan:Logo Resmi: Unduh logo instansi dalam format resolusi tinggi (.png transparan atau .vector). </p>
                                      <p class="mt-2 mb-2">Penggunaan logo harus sesuai dengan panduan warna (brand guidelines) resmi instansi dan tidak boleh diubah warnanya atau dideformasi. </p>
                                      <p class="mt-2 mb-2">Foto Pejabat Resmi: Foto resmi Kepala BBPPKS Bandung untuk kebutuhan ilustrasi berita. </p>
                                      <p class="mt-2 mb-2">Dokumentasi Kegiatan: Foto dan video rangkaian kegiatan dinas yang bebas royalti untuk kebutuhan jurnalisme.</p>
                                    </div>
                                    <div class="tab-pane fade" id="kdpd46" role="tabpanel" aria-labelledby="kdpd-tab46">
                                      <p class="mt-2 mb-2">Untuk permohonan wawancara khusus, konfirmasi berita, atau undangan peliputan acara dinas, rekan media dapat menghubungi tim Humas resmi kami melalui saluran di bawah ini: </p>
                                      <p class="mt-2 mb-2">Penanggung Jawab: Kelompok Kerja Hubungan Masyarakat BBPPKS Bandung.</p>
                                      <p class="mt-2 mb-2">Email Resmi Humas: humasbbppksbandung@kemensos.go.id  </p>
                                      <p class="mt-2 mb-2">Nomor Telepon/Hotline Media: 021-xxxxxx / WhatsApp </p>
                                      <p class="mt-2 mb-2">Media Center Jam Operasional Pelayanan Media: Senin - Jumat (08.00 - 16.00 WIB).</p>
                                    </div>
                                    <div class="tab-pane fade" id="hassd46" role="tabpanel" aria-labelledby="hassd-tab46">
                                      <p class="mt-2 mb-2">(Disclaimer Media) BBPPKS Bandung tidak bertanggung jawab atas segala bentuk kutipan atau berita yang mencantumkan nama instansi kami, namun sumbernya diambil dari luar halaman resmi ini atau di luar juru bicara BBPPKS Bandung resmi yang ditunjuk. </p>
                                      <p class="mt-2 mb-2">Segala bentuk wawancara pencegatan (doorstop) di luar agenda resmi harus mendapatkan konfirmasi ulang kepada Pokja Humas sebelum dipublikasikan demi akurasi data dan informasi.</p>
                                    </div>
                                    <div class="tab-pane fade" id="konkam46" role="tabpanel" aria-labelledby="konkam-tab46">
                                      <p class="mt-2 mb-2">Jika Anda memiliki pertanyaan mengenai Kebijakan Privasi ini atau ingin mengajukan permohonan hak data Anda, silakan hubungi kami di:</p>
                                      <p class="mt-2 mb-2">Email: humasbbppksbandung@kemensos.go.id</p>
                                      <p class="mt-2 mb-2">Nomor Telepon/Hotline Media: 021-xxxxxx / WhatsApp Media Center </p>
                                      <p class="mt-2 mb-2">Jam Operasional Pelayanan Media: Senin - Jumat (08.00 - 16.00 WIB)</p>
                                      <p class="mt-2 mb-2">Alamat: Jalan Panorama 1, Desa Jayagiri, Kecamatan Lembang -  Kabupaten Bandung Barat</p>
                                    </div>
                                    <div class="tab-pane fade" id="ppk46" role="tabpanel" aria-labelledby="ppk-tab46">
                                      <p class="mt-2 mb-2">Perubahan Ketentuan: </p>
                                      <p class="mt-2 mb-2">Kami berhak untuk mengubah, menambah, atau memperbarui Syarat dan Ketentuan, Kebijakan Privacy, Media Massa ini sewaktu-waktu demi menyesuaikan dengan perubahan hukum atau peningkatan sistem pelayanan. </p>
                                      <p class="mt-2 mb-2">Perubahan akan diumumkan melalui halaman ini.</p>
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
            </div>
        </div>
    </div>
  </div>
</div>
</div>
</div>
<?= $this->endSection() ?>
