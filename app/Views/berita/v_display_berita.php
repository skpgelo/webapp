<?= $this->extend('layouts/v_stisla') ?>

<?= $this->section('title') ?> Berita <?= $this->endSection() ?>

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

<?= $this->section('page_header') ?> Berita  <?= $this->endSection() ?>

<?= $this->section('content') ?>

<div class="mb-5 mt-10" >
<h2 class="section-title">🔥 Berita dalam Satu Minggu Terakhir</h2>
<p class="section-lead">Kumpulan tajuk berita utama terpopuler dalam sepekan ke belakang.</p>


    <?php if (empty($berita_carousel)): ?>
        <div class="bg-white p-4 text-center border rounded">Belum ada rilis berita selama 7 hari belakangan.</div>
    <?php else: ?>

            <?php foreach ($berita_carousel as $bc => $row): ?>
            <div class="row">
              <div class="col-12 col-md-6 col-lg-3">
                <div class="card card-warning">
                  <!-- <div class="card-header"> -->
						<!-- <div class="d-flex justify-content-center align-items-center"> -->
							<!-- <img src="<?= esc($row['foto']) ?>" class="carousel-img" onerror="this.src='/img/no-image.jpg'"> -->
						<!-- </div> -->
                  <!-- </div> -->
                  <div class="card-body">
						<div class="d-flex justify-content-center align-items-center">
							<img src="<?= esc($row['foto']) ?>" class="carousel-img" onerror="this.src='/img/no-image.jpg'">
						</div>
                        <h6 class="text-truncate font-weight-bold mb-1 p-3" title="<?= esc($row['judul_berita']) ?>"><?= esc($row['judul_berita']) ?>...  </h6> 
                        <hr>
						  <p class="card-text" class="text-black-70 mb-1 p-3"><?= substr(esc($row['isi_berita']), 0, 190) ?>... <i><a href= #detailberita>selengkapnya</a></i></p>
                          <span class="badge badge-light border text-red mb-1 small mb-4"><?= esc($row['kategori']) ?></span>
                        <div class="d-flex justify-content-between p-3">
                            <span class="text-small text-muted"><i class="fas fa-user-edit mr-1"></i><?= esc($row['kontributor']) ?></span>
                            <span class="text-small text-muted font-weight-600  mt-1"><?= date('d-m-Y', strtotime($row['created_at'])) ?></span>
                        </div>
                  </div>
                </div>
              </div>
	</div>
               <?php endforeach; ?>
                <?php endif; ?>
              

	</div>
</div>
<div class="mb-5" >
    <div class="card-body p-4">
    <?php if (empty($berita_carousel)): ?>
        <div class="bg-white p-4 text-center border rounded">Belum ada rilis berita selama 7 hari belakangan.</div>
    <?php else: ?>

	    <div class="col-12 col-md-12 col-lg-12 mx-auto text-center">
			<div class="owl-carousel p-3"  >
                    <?php foreach ($berita_carousel as $bc => $row): ?>
                <div class="card mb-3">
					<div class="slider-card-colomn" >
						<div class="d-flex justify-content-center align-items-center mb-4">
							<img src="<?= esc($row['foto']) ?>" class="carousel-img" onerror="this.src='/img/no-image.jpg'">
						</div>
                        <div class="d-flex justify-content-between mb-2 p-3">
                            <span class="text-small text-muted"><i class="fas fa-user-edit mr-1"></i><?= esc($row['kontributor']) ?></span>
                            <span class="text-small text-muted font-weight-600  mt-1"><?= date('d-m-Y', strtotime($row['created_at'])) ?></span>
                        </div>
                        <h6 class="text-truncate font-weight-bold mb-1 p-3" title="<?= esc($row['judul_berita']) ?>"><?= esc($row['judul_berita']) ?></h6> 
                        <hr>
						  <p class="card-text" class="text-black-70 mb-1 p-3"><?= substr(esc($row['judul_berita']), 0, 90) ?>... <i><a href= #detailberita>selengkapnya</a></i></p>
                          <span class="badge badge-light border text-red mb-1 small mb-4"><?= esc($row['kategori']) ?></span>
					</div>
                </div>
                <?php endforeach; ?>
                <?php endif; ?>
			</div>
		</div>
	</div>
</div>
<!-- ================= TIPE 2 & TIPE 3: GRID LAYOUT COMBINATION ================= -->
<div class="row mt-4">
    
    <!-- TIPE 2: HANYA SATU BERITA PALING BARU (LEFT COLUMN) -->
    <div class="col-lg-5 col-md-12 mb-4">
        <h2 class="section-title">✨ Berita Terbaru</h2>
        <?php if (empty($berita_terbaru)): ?>
            <div class="card p-4 text-center">Papan data berita kosong.</div>
        <?php else: ?>
            <div class="card card-danger shadow-sm h-100">
                <!-- <img src="<= base_url('uploads/foto/' . $berita_terbaru['foto']) ?>" class="big-news-img" alt="Foto Utama">
                <img src="data:image/jpg;charset=utf8;base64,<?= base64_encode($berita_terbaru['foto']); ?>"  class="carousel-img" alt="Foto"/>
                <img src="data:image/jpeg;base64,'.base64_encode($berita_terbaru['foto'])).'" class="carousel-img" alt="Foto"/> -->
                <!-- <img src="http://dummyimage.com/146x100.png/cc0000/ffffff" class="carousel-img" alt="Foto"> -->
                <img src="<?= esc($berita_terbaru['foto']) ?>" class="carousel-img" alt="Foto" onerror="this.src='/img/no-image.jpg'">
                <div class="card-body p-4">
                    <div class="d-flex justify-content-between mb-2">
                        <span class="badge badge-danger"><?= esc($berita_terbaru['kategori']) ?></span>
                        <span class="text-small text-muted font-weight-600"><?= date('d-m-Y', strtotime($berita_terbaru['created_at'])) ?></span>
                    </div>
                    <h3 class="font-weight-bold text-dark mb-2"><?= substr(esc($berita_terbaru['judul_berita']), 0, 85) ?>... </h3>
                    <p class="text-muted"><?= character_limiter(strip_tags($berita_terbaru['isi_berita']), 175) ?></p>
                </div>
                <div class="card-footer bg-light border-top d-flex align-items-center justify-content-between py-2 px-4">
                    <small class="font-weight-bold text-red"><?= esc($berita_terbaru['kontributor']) ?></small>
                    <a href="#" class="btn btn-sm btn-outline-danger">Baca Selengkapnya</a>
                </div>
            </div>
        <?php endif; ?>
    </div>

    <!-- TIPE 3: SEMUA BERITA TANPA KECUALI (RIGHT COLUMN) -->
    <div class="col-lg-7 col-md-12 mb-4">
        <h2 class="section-title">📚 Semua Berita</h2>
        <div style="max-height: 600px; overflow-y: auto; padding-right: 5px;">
            <?php if (empty($semua_berita)): ?>
                <div class="card p-4 text-center">Belum ada rekaman arsip berita.</div>
            <?php else: ?>
                <?php foreach ($semua_berita as $sb): ?>
                    <div class="card card-sm shadow-sm mb-3 border">
                        <div class="row no-gutters align-items-center">
                            <div class="col-4 col-sm-3 p-2">
                                <!-- <img src="<?= base_url('uploads/foto/' . $sb['foto']) ?>" class="thumbnail-img" alt="Arsip">
                                <img src="data:image/jpg;charset=utf8;base64,<?= base64_encode($sb['foto']); ?>"  class="carousel-img" alt="Foto"/>
                                <img src="data:image/jpeg;base64,'.base64_encode($sb['foto'])).'" class="carousel-img" alt="Foto"/> -->
                                <img src="<?= esc($sb['foto']) ?>" class="thumbnail-img" alt="Foto">
                            </div>
                            <div class="col-8 col-sm-9">
                                <div class="card-body p-3">
                                    <span class="badge badge-light border text-dark mb-1 small"><?= esc($sb['kategori']) ?></span>
                                    <h6 class="font-weight-bold text-dark mb-1 text-truncate"><?= substr(esc($sb['judul_berita']), 0, 85) ?>... </h6>
                                    <p class="text-small mb-1 text-muted text-truncate"><?= substr(esc($sb['isi_berita']), 0, 95) ?>... <i><a href= #detailberita>selengkapnya</a></i></p>
                                    <div class="d-flex justify-content-between align-items-center mt-2">
                                        <span class="text-small text-muted"><i class="fas fa-user-edit mr-1"></i><?= esc($sb['kontributor']) ?></span>
                                        <span class="badge badge-white text-muted py-0 px-1 font-weight-500" style="font-size:10px;"><?= date('d-m-Y', strtotime($sb['created_at'])) ?></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>
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
