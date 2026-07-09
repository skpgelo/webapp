<?= $this->extend('layouts/v_stisla') ?>

<?= $this->section('title') ?> Galeri Monitoring Berita <?= $this->endSection() ?>

<?= $this->section('styles') ?>
<!-- Memuat aset CSS Owl Carousel bawaan Stisla Modules -->
<link rel="stylesheet" href="https://cloudflare.com">
<link rel="stylesheet" href="https://cloudflare.com">
        <!--=============== CSS Berita===============-->
        <link rel="stylesheet" type="text/css" href="<?= base_url(); ?>owl/css/owl.carousel.min.css">
        <!-- <link rel="stylesheet" type="text/css" href="<?= base_url(); ?>owl/css/styles.css"> -->
        <!--=============== CSS tema===============-->
        <link rel="stylesheet" type="text/css" href="<?= base_url(); ?>oc/css/styletema.css">
        <!--=============== CSS sdm===============-->
        <link rel="stylesheet" type="text/css" href="<?= base_url(); ?>owl/css/styleowl.css">
<style>
    .carousel-img { height: 220px; object-fit: cover; width: 100%; border-radius: 5px 5px 0 0; }
    .thumbnail-img { height: 160px; object-fit: cover; width: 100%; border-radius: 4px; }
    .big-news-img { max-height: 400px; object-fit: cover; width: 100%; border-radius: 6px; }
</style>
<?= $this->endSection() ?>

<?= $this->section('page_header') ?> Eksplorasi Berita Internal <?= $this->endSection() ?>

<?= $this->section('content') ?>

<h2 class="section-title">🔥 Tren 7 Hari Terakhir</h2>
<p class="section-lead">Kumpulan tajuk berita utama terpopuler dalam sepekan ke belakang.</p>
<div class="mb-5" >
    <?php if (empty($berita_carousel)): ?>
        <div class="bg-white p-4 text-center border rounded">Belum ada rilis berita selama 7 hari belakangan.</div>
    <?php else: ?>

	  <div class="slider" class="col-md-9 col-lg-9 mx-auto text-center">
				<div class="owl-carousel"  >
          <?php foreach ($berita_carousel as $bc => $row): ?>
					<div class="slider-card-colomn " >
						<div class="d-flex justify-content-center align-items-center mb-4">
							<img src="<?= esc($row['foto']) ?>" class="carousel-img" onerror="this.src='/img/no-image.jpg'">
						</div>
						  <h6 class="text-truncate font-weight-bold mb-1" title="<?= esc($row['judul_berita']) ?>"><?= esc($row['judul_berita']) ?></h6> 
                    <hr>
                    <p class="card-text" class="text-black-70 mb-1"> Bandung, <?= esc($row['created_at']) ?>
						  <p class="card-text" class="text-black-70 mb-1"><?= substr(esc($row['judul_berita']), 0, 75) ?>... <i><a href= #detailberita>selengkapnya</a></i></p>
					</div>
        <?php endforeach; ?>
    <?php endif; ?>
				</div>
			</div>
<div class="mb-5" >
    <?php if (empty($berita_carousel)): ?>
        <div class="bg-white p-4 text-center border rounded">Belum ada rilis berita selama 7 hari belakangan.</div>
    <?php else: ?>

  	        <div class="slider">
				<div class="owl-carousel">
					<div class="slider-card" >
            <?php foreach ($berita_carousel as $bc => $row): ?>
						<div class="d-flex justify-content-left align-items-left mb-4">
							<img src="<?= esc($row['foto']) ?>" class="carousel-img" onerror="this.src='/img/no-image.jpg'">
							<!-- <h7 class="carousel-captions mb-0 text-center"  style="width: 8rem;"><img src="oc/img/slide-1.jpg" alt="" ></h7> -->
						</div>
						<h7 class="carousel-captions">
              Wordpress Tutorials
						<p>Lorem ipsum dolor sit amet1.</p>
          </h7>
						<!-- <h7 class="mb-0 text-center">HTML CSS3 Tutorials</h7> -->
						<!-- <p class="text-center p-4">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ipsam temporibus quidem magni qui doloribus quasi natus inventore nisi velit minima.</p> -->
        <?php endforeach; ?>
    <?php endif; ?>

					</div>
				</div>
      </div>

<div id="carousel-berita" class="carousel slide" data-ride="carousel">
            <!– Indicators –>
            <ol class="carousel-indicators">
                <?php
                // $berita = $this->carousel_m->beritaGetAll();
                foreach ($berita_carousel as $key => $value) {
                    $active = ($key == 0) ? 'active' : '';
                    echo '<li data-target="#carousel-berita" data-slide-to="' . $key . '" class="' . $active . '"></li>';
                }
                ?>
            </ol>

            <!– Wrapper for slides –>
            <div class="carousel-inner" role="listbox">
                <?php
                foreach ($berita_carousel as $key => $value) {
                    $active = ($key == 0) ? 'active' : '';
                    echo '<div class="item ' . $active . '">
                                            <img src="' . base_url() . $value['foto'] . '" alt="…">
                                            <div class="carousel-caption">
                                                <h3>' . $value['judul_berita'] . '</h3>
                                                <h3>' . $value['isi_berita'] . '</h3>
                                            </div>
                                        </div>';
                }
                ?>
            </div>

            <!– Controls –>
            <a class="left carousel-control" href="#carousel-berita" role="button" data-slide="prev">
                <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="right carousel-control" href="#carousel-berita" role="button" data-slide="next">
                <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
    </div>


<div class='slide-horizontal'>
<div class='col-md-12'> 
<div id='myCarousel' class='carousel slide'>                          
                <div class='carousel-inner'>  
                <!-- <php  $tampil_gambar = mysqli_query($connection, "SELECT * FROM table ORDER BY field_table DESC"); // seuaikan dengan query mysql select tabel untuk menampilkan semua gambar -->
                      <div class='item active'>
                      <div class='row'>
<?php 
$i = 0; // 1. Inisialisasi variabel $i di sini
foreach ($berita_carousel as $bc): 
    $i++; // 2. Tambahkan nilai $i setiap kali loop berjalan
    
    // Gunakan pengecekan kelipatan 4
    if ($i != 1 && ($i % 4 == 0)): 
?>
        </div>
        </div>
        <div class="item">
        <div class="row">
    <?php endif; ?>

    <!-- Isi konten carousel Anda di sini -->
                       <h5 class="text-truncate font-weight-bold mb-1" title="<?= esc($bc['judul_berita']) ?>"><?= esc($bc['judul_berita']) ?></h5>
                    <small class="text-muted d-block mb-2"><i class="far fa-clock mr-1"></i><?= date('d M Y', strtotime($bc['created_at'])) ?></small>

    <?php $i++; // Tambahkan increment di akhir loop ?>
<?php endforeach; ?>
                    </div></div>
 
                 
                </div><!--.penutup carousel-inner-->
                  <a data-slide='prev' href='#Carousel' class='left carousel-control'>â€¹</a>
                  <a data-slide='next' href='#Carousel' class='right carousel-control'>â€º</a>
                </div><!--.penutup myCarousel-->
                 
                </div> <!-- penutup col-md-12 -->
 
                </div> <!-- penutup slide-horizontal -->

<div class="mb-5" >
    <?php if (empty($berita_carousel)): ?>
        <div class="bg-white p-4 text-center border rounded">Belum ada rilis berita selama 7 hari belakangan.</div>
    <?php else: ?>

            <div class="row">
              <div class="col-12 col-md-6 col-lg-6">
                <div class="card">

                  <div class="card-body">
                    <div id="beritaCarousel" class="carousel slide" data-ride="carousel">
        <?php foreach ($berita_carousel as $bc => $row): ?>
                      <div class="carousel-inner">
                        <div class="carousel-item active">
                          <!-- <img class="d-block w-100" src="assets/img/news/img01.jpg" alt="First slide"> -->
                    <img src="<?= esc($row['foto']) ?>" class="carousel-img" onerror="this.src='/img/no-image.jpg'">
                        </div>
                        <div class="carousel-item">
                          <!-- <img class="d-block w-100" src="assets/img/news/img07.jpg" alt="Second slide"> -->
                    <h5 class="text-truncate font-weight-bold mb-1" title="<?= esc($row['judul_berita']) ?>"><?= esc($row['judul_berita']) ?></h5>
                    <small class="text-muted d-block mb-2"><i class="far fa-clock mr-1"></i><?= date('d M Y', strtotime($row['created_at'])) ?></small>
                        </div>
                        <!-- <div class="carousel-item"> -->
                          <!-- <img class="d-block w-100" src="assets/img/news/img08.jpg" alt="XXXX" display="none"> -->
                        <!-- </div> -->
                    </div>
        <?php endforeach; ?>
    <?php endif; ?>
                      </div>

                  </div>
                  
                </div>
              </div>
            </div>
          </div>


<?= $this->endSection() ?>

<?= $this->section('scripts') ?>
<!-- Memuat Core Javascript Owl Carousel -->
<script src="https://cloudflare.com"></script>
        <script src="<?= base_url(); ?>owl/js/owl.carousel.min.js"></script>
        <script src="<?= base_url(); ?>owl/js/script.js"></script>

<script>
$(document).ready(function() {
    $('#myCarousel').carousel({
	    interval: 10000
	})
});

$(document).ready(function(){
        // Inisialisasi Owl Carousel Responsif Bawaan Stisla Style
        $("#beritaCarousel").owlCarousel({
            loop: false,
            margin: 15,
            nav: false,
            dots: true,
            autoplay: true,
            autoplayTimeout: 4000,
            responsive: {
                100:   { items: 1 },
                100: { items: 2 },
                // 992: { items: 3 }
            }
        });
    });
</script>
<?= $this->endSection() ?>
