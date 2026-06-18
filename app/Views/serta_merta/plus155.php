<?= $this->extend('base/skeleton'); ?>

<?= $this->section('content'); ?>


<!-- Main Content -->
<div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1><?= $section_header;?></h1>
          </div>
          
          <?=$this->include('base/row')?>
          <?=$this->include('base/sub_section_header')?>

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
                <div class="table-responsive">
                    <table class="text-left">
                    <h6><thead>
                                <!-- <th scope="col"></th> -->
                                <!-- <th scope="col"></th> -->
                            </thead>
                            
                            <tbody >
                                <td class="w-20 p-3">.</td>
                                <td scope="col" >
                                <?php
                                    $data = simplexml_load_file("https://data.bmkg.go.id/DataMKG/TEWS/gempaterkini.xml") or die ("Gagal ambil!");
                                    $i = 1;
                                    foreach($data->gempa as $gempaM5) {
                                    echo "No: " . $i . "<br>";
                                    echo "Tanggal: " . $gempaM5->Tanggal . "<br>";
                                    echo "Jam: " .  $gempaM5->Jam . "<br>";
                                    echo "DateTime: " . $gempaM5->DateTime . "<br>";
                                    echo "Magnitudo: " . $gempaM5->Magnitude . "<br>";
                                    echo "Kedalaman: " . $gempaM5->Kedalaman . "<br>";
                                    echo "Koordinat: " . $gempaM5->point->coordinates . "<br>";
                                    echo "Lintang: " . $gempaM5->Lintang . "<br>";
                                    echo "Bujur: " . $gempaM5->Bujur . "<br>";
                                    echo "Lokasi: " . $gempaM5->Wilayah . "<br>";
                                    echo "Potensi: " . $gempaM5->Potensi . "<br><br>";
                                    $i++;
                                    }
                                    ?>
                                </td>
                            </tbody><h6>
                        </table>
                        <div class="d-flex align-items-right justify-content-between small">
                        <div class="text-muted" ><i style="font-size: 0.9rem;">sumber || data terbuka BMKG <?= date('Y'); ?></i>
                        </div>
                        </div>
                    </div>
                    </div>
                </div>
                </div>
                </div>
                </section>
                </div>

    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>

    <?= $this->endSection() ?>