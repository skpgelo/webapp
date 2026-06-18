<?= $this->extend('base/skeleton'); ?>

<?= $this->section('content'); ?>


<!-- Main Content -->
<div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1><?= $section_header;?></h1>
          </div>
          
          <?=$this->include('base/row')?>

          <div class="row">
            <div class="col-lg-12 col-md-12 col-12 col-sm-12">
              <div class="card">
                <div class="card-header">
                  <h4>Hasil Kajian Sesar Lembang: Deputi Bidang Geofisika - BMKG <p><?= $card_header;?></h4>
                  <div class="card-header-action">
                    <div class="btn-group">
                      <!-- <a href="#" class="btn btn-primary">Week</a>
                      <a href="#" class="btn">Month</a> -->
                    </div>
                  </div>
                </div>
                <div class="card-body">
                    <table class="table table-responsive">
                      <thead>
                        <tr>
                        </tr>
                      </thead>
                      <tbody class="text-left">
                        <tr>
                          <td>
                            <h6>
                                <p>Di wilayah Kota Bandung memang terdapat struktur Sesar Lembang dengan panjang jalur sesar yang mencapai 30 km. Hasil kajian menunjukkan bahwa laju pergeseran Sesar Lembang mencapai 5,0 mm/tahun, sementara itu hasil monitoring BMKG juga menunjukkan adanya beberapa aktivitas seismik dengan kekuatan kecil. </p>
                                <p>Adanya potensi gempabumi di jalur Sesar Lembang dengan magnitudo maksimum M=6,8 merupakan hasil kajian para ahli, sehingga kita patut mengapresiasi hasil penelitian tersebut.</p>
                                <p>Hasil pemodelan peta tingkat guncangan (shakemap) oleh BMKG dengan skenario gempa dengan kekuatan M=6,8 dengan kedalaman hiposenter 10 km di zona Sesar Lembang (garis hitam tebal), menunjukkan bahwa dampak gempa dapat mencapai skala intensitas VII-VIII MMI (setara dengan percepatan tanah maksimum 0,2 - 0,4 g) dengan diskripsi terjadi kerusakan ringan pada bangunan dengan konstruksi yang kuat.</p> 
                                <p>Dinding tembok dapat lepas dari rangka, monument/menara roboh, dan air menjadi keruh. Sementara untuk bangunan sederhana non struktural dapat terjadi kerusakan berat hingga dapat menyebabkan bangunan roboh. Secara umum skala intensitas VII-VIII MMI dapat mengakibatkan terjadinya goncangan sangat kuat dengan kerusakan sedang hingga berat (Gambar di bawah).</p>
                                <p>Dengan adanya hasil kajian sesar aktif oleh beberapa ahli akhir-akhir ini, maka penting kiranya pemerintah memperhatikan peta rawan bencana sebelum merencanakan penataan ruang dan wilayah. Perlu ada upaya serius dari berbagai pihak dalam mendukung dan memperkuat penerapan building code dalam membangun struktur bangunan tahan gempa. Saat ini building code Indonesia mengacu kepada peraturan SNI 1726-2012. Upaya pembaharuan peraturan ini sedang dalam proses melalui Tim Pusat Studi Gempa Nasional (PUSGEN) yang melibatkan lintas bidang dan lintas sektoral dimana BMKG berperan aktif di dalamnya.</p>
                                <p>Adanya hasil kajian potensi bencana, jangan sampai membuat masyarakat yang bermukim di dekat jalur sesar terus dicekam rasa khawatir. Warga masyarakat harus meningkatkan kemampuan dalam memahami cara penyelamatan saat terjadi gempa dan mengikuti arahan pemerintah dalam melakukan evakuasi. Kegiatan sosialisasi di daerah rawan harus digalakkan, karena dapat membuat masyarakat lebih siap dalam menghadapi bencana. Kesiapan dalam menghadapi bencana terbukti dapat memperkecil jumlah korban.</p>
                                <p>Kepada masyarakat dihimbau agar tetap tenang dan tidak mudah terpancing isu yang tidak dapat dipertanggungjawabkan kebenarannya. Pastikan informasi gempabumi berasal dari lembaga resmi pemerintah dalam hal ini BMKG. Untuk mendapatkan informasi tersebut dapat mengunjungi website BMKG (www.bmkg.go.id) dan media sosial resmi BMKG.</p>
                              </h6>
                          <!-- </td>
                          <td> -->
                            <img class="img-responsive" style="margin-right: 20px ; margin-left: 20px ; width:90% ;" src="img/Sesar-Lembang.jpg" width='650' height='auto'>
                          </td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
</div>

    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>

    <?= $this->endSection() ?>
