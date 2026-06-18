<?= $this->extend('base/skeleton'); ?>

<?= $this->section('content'); ?>


<!-- Main Content -->
<div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1><?= $section_header;?></h1>
          </div>
          <div class="row">
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
              <div class="card card-statistic-1">
                <div class="card-icon bg-primary">
                  <i class="far fa-user"></i>
                </div>
                <div class="card-wrap">
                  <div class="card-header">
                    <h4>Total Admin</h4>
                  </div>
                  <div class="card-body">
                    10
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
              <div class="card card-statistic-1">
                <div class="card-icon bg-danger">
                  <i class="far fa-newspaper"></i>
                </div>
                <div class="card-wrap">
                  <div class="card-header">
                    <h4>News</h4>
                  </div>
                  <div class="card-body">
                    42
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
              <div class="card card-statistic-1">
                <div class="card-icon bg-warning">
                  <i class="far fa-file"></i>
                </div>
                <div class="card-wrap">
                  <div class="card-header">
                    <h4>Reports</h4>
                  </div>
                  <div class="card-body">
                    1,201
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
              <div class="card card-statistic-1">
                <div class="card-icon bg-success">
                  <i class="fas fa-circle"></i>
                </div>
                <div class="card-wrap">
                  <div class="card-header">
                    <h4>Online Users</h4>
                  </div>
                  <div class="card-body">
                    47
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-lg-12 col-md-12 col-12 col-sm-12">
              <div class="card">
                <div class="card-header">
                  <h4><?= $card_header;?></h4>
                  <div class="card-header-action">
                    <div class="btn-group">
                      <!-- <a href="#" class="btn btn-primary">Week</a>
                      <a href="#" class="btn">Month</a> -->
                    </div>
                  </div>
                </div>
                <div class="card-body">
                  <!-- <canvas id="myChart" height="182"></canvas> -->
                  <div class="table-responsive">
                    <table class="text-left">
                    <h6><thead>
                                <!-- <th scope="col"></th> -->
                                <!-- <th scope="col"></th> -->
                            </thead>
                            
                            <tbody >
                                <!-- <td class="w-20 p-3">.</td> -->
                                <td scope="col" >
                                <p>A. Kunci Utama adalah
                                    Mengenali apa yang disebut gempabumi;</p>
                                    Pastikan bahwa struktur dan letak rumah Anda dapat terhindar dari bahaya yang disebabkan oleh gempabumi (longsor, liquefaction dll);
                                    Mengevaluasi dan merenovasi ulang struktur bangunan Anda agar terhindar dari bahaya gempabumi.
                                </td>
                                <td class="text-left" class="w-30 ">
                                <img style="margin-right: 40px ; margin-left: 40px ;" src="img/antisipasi01.webp" width='150' height='auto'>
                                </td>
                                </tr>
                                </tbody>
                                </table>
                                <table>
                                <tbody>
                                <tr>
                                <td scope="row" class="text-center" class="p-3 mb-2 ">
                                
                                </td>
                                <td  class="text-left">
                                
                                </td>
                                </tr>
                                </tbody>
                                </table>
                                <table>
                                <tbody>
                                <tr>
                                <td scope="row" class="text-right" style="margin-right: 40px ; margin-left: 40px ;" >
                                <img style="margin-top: 20px; margin-bottom: 20px; margin-right: 40px; margin-left: 40px ;" src="img/antisipasi02.webp" width='150' height='auto'>
                                </td>
                                <td class="text-left">
                                <p>B. Kenali Lingkungan Tempat Anda Bekerja</p>
                                    Perhatikan letak pintu, lift serta tangga darurat, apabila terjadi gempabumi, sudah mengetahui tempat paling aman untuk berlindung;
                                    Belajar melakukan P3K;
                                    Belajar menggunakan alat pemadam kebakaran;
                                    Catat nomor telepon penting yang dapat dihubungi pada saat terjadi gempabumi.
                                </td>
                                </tr>
                            </tbody>
                        </table>
                        <table>
                            <!-- <thead>
                                <th scope="col"></th>
                                <th scope="col"></th>
                            </thead> -->
                            <tbody>
                                <tr>
                                <td scope="row" class="text-right" style="margin-right: 40px ; margin-left: 40px ;">
                                <p>C. Persiapan Rutin pada tempat Anda bekerja dan tinggal</p>
                                        Perabotan (lemari, cabinet, dll) diatur menempel pada dinding (dipaku, diikat, dll) untuk menghindari jatuh, roboh, bergeser pada saat terjadi gempabumi.
                                        Simpan bahan yang mudah terbakar pada tempat yang tidak mudah pecah agar terhindar dari kebakaran.
                                        Selalu mematikan air, gas dan listrik apabila tidak sedang digunakan.                                </td>
                                <td class="text-left" class="w-30 ">
                                <img style="margin-right: 40px ; margin-left: 40px ;" src="img/antisipasi01.webp" width='150' height='auto'>
                                </td>
                        </tr>
                      </tbody>
                    </table>
                        <div class="d-flex align-items-right justify-content-between small">
                        <div class="text-muted" ><i style="font-size: 0.9rem;">sumber || informasi terbuka BMKG <?= date('Y'); ?></i>
                        </div>
                        </div>
                        </div>
                </div>
              </div>
            </div>
          </div>
        </section>
</div>
    <?= $this->endSection() ?>
