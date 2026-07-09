<?= $this->extend('layouts/v_stisla') ?>

<?= $this->section('title') ?> Galeri Monitoring Berita <?= $this->endSection() ?>

<?= $this->section('styles') ?>
<!-- Memuat aset CSS Owl Carousel bawaan Stisla Modules -->
<link rel="stylesheet" href="https://cloudflare.com">
<link rel="stylesheet" href="https://cloudflare.com">
<style>
    .carousel-img { height: 220px; object-fit: cover; width: 100%; border-radius: 5px 5px 0 0; }
    .thumbnail-img { height: 160px; object-fit: cover; width: 100%; border-radius: 4px; }
    .big-news-img { max-height: 400px; object-fit: cover; width: 100%; border-radius: 6px; }
</style>
<?= $this->endSection() ?>

<?= $this->section('page_header') ?> Eksplorasi Berita Internal <?= $this->endSection() ?>

<?= $this->section('content') ?>

<!-- ================= TIPE 1: BERITA 7 HARI TERAKHIR (OWL CAROUSEL) ================= -->
<h2 class="section-title">🔥 Tren 7 Hari Terakhir</h2>
<p class="section-lead">Kumpulan tajuk berita utama terpopuler dalam sepekan ke belakang.</p>

<div class="mb-5" >
    <?php if (empty($berita_carousel)): ?>
        <div class="bg-white p-4 text-center border rounded">Belum ada rilis berita selama 7 hari belakangan.</div>
    <?php else: ?>

                    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                      <div class="carousel-inner">
                        <div class="carousel-item">

        <?php foreach ($berita_carousel as $bc): ?>
            <!-- <div class="card shadow-sm mx-1 border"> -->
                <!-- <img src="data:image/jpg;charset=utf8;base64,<?= base64_encode($bc['foto']); ?>"  class="carousel-img" alt="Foto"/> -->
                <!-- <img src="data:image/jpeg;base64,'.base64_encode($bc['foto'])).'" class="carousel-img" alt="Foto"/> -->
                <!-- <img src="http://dummyimage.com/146x100.png/cc0000/ffffff" class="carousel-img" alt="Foto"> -->
                <!-- <img src="<?= base_url('uploads/foto/' . $bc['foto']) ?>" class="carousel-img" alt="Foto"> -->
                <img src="<?= esc($bc['foto']) ?>" class="carousel-img" onerror="this.src='/img/no-image.jpg'">
                <div class="card-body p-3">
                    <span class="badge badge-primary mb-2"><?= esc($bc['kategori']) ?></span>
                    <h5 class="text-truncate font-weight-bold mb-1" title="<?= esc($bc['judul_berita']) ?>"><?= esc($bc['judul_berita']) ?></h5>
                    <small class="text-muted d-block mb-2"><i class="far fa-clock mr-1"></i><?= date('d M Y', strtotime($bc['created_at'])) ?></small>
                <!-- </div> -->
            </div>
        <?php endforeach; ?>
    <?php endif; ?>



                        </div>
                    <!-- <div id="carouselExampleFade" class="carousel slide carousel-fade" data-ride="carousel">
                      <div class="carousel-inner">
                        <div class="carousel-item active">
                          <img class="d-block w-100" src="assets/img/news/img01.jpg" alt="First slide">
                        </div>
                        <div class="carousel-item">
                          <img class="d-block w-100" src="assets/img/news/img07.jpg" alt="Second slide">
                        </div>
                        <div class="carousel-item">
                          <img class="d-block w-100" src="assets/img/news/img08.jpg" alt="Third slide">
                        </div>
                      </div>
                      <a class="carousel-control-prev" href="#carouselExampleFade" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                      </a>
                      <a class="carousel-control-next" href="#carouselExampleFade" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                      </a>
                    </div> -->
                      </div>
                    </div>
</div>
<div id="myCarousel" class="carousel slide" data-bs-ride="carousel">

  <div class="carousel-indicators">
    <?php foreach ($berita_carousel as $i => $row): ?>
      <button type="button" data-bs-target="#myCarousel"
              data-bs-slide-to="<?= $i; ?>"
              class="<?= $i == 0 ? 'active' : '' ?>"></button>
    <?php endforeach; ?>
  </div>

  <div class="carousel-inner">
    <?php foreach ($berita_carousel as $i => $row): ?>
      <div class="carousel-item <?= $i == 0 ? 'active' : '' ?>">
        <!-- <img src="uploads/<= $row['image'] ?>" class="d-block w-100" alt=""> -->
                <img src="<?= esc($bc['foto']) ?>" class="d-block w-100">
        <?php if ($row['kategori']): ?>
        <div class="carousel-caption d-none d-md-block">
          <h5><?= $row['kategori']; ?></h5>
          <p><?= $row['judul_berita']; ?></p>
        </div>
        <?php endif; ?>
      </div>
    <?php endforeach; ?>
  </div>

  <button class="carousel-control-prev" type="button"
    data-bs-target="#myCarousel" data-bs-slide="prev">
    <span class="carousel-control-prev-icon"></span>
  </button>

  <button class="carousel-control-next" type="button"
    data-bs-target="#myCarousel" data-bs-slide="next">
    <span class="carousel-control-next-icon"></span>
  </button>

</div>
<!-- ================= TIPE 2 & TIPE 3: GRID LAYOUT COMBINATION ================= -->
<div class="row mt-4">
    
    <!-- TIPE 2: HANYA SATU BERITA PALING BARU (LEFT COLUMN) -->
    <div class="col-lg-5 col-md-12 mb-4">
        <h2 class="section-title">✨ Rilis Terkini (Terbaru)</h2>
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
                        <span class="text-small text-muted font-weight-600"><?= date('d M Y H:i', strtotime($berita_terbaru['created_at'])) ?></span>
                    </div>
                    <h3 class="font-weight-bold text-dark mb-2"><?= esc($berita_terbaru['judul_berita']) ?></h3>
                    <p class="text-muted"><?= character_limiter(strip_tags($berita_terbaru['isi_berita']), 130) ?></p>
                </div>
                <div class="card-footer bg-light border-top d-flex align-items-center justify-content-between py-2 px-4">
                    <small class="font-weight-bold text-secondary">Oleh: <?= esc($berita_terbaru['kontributor']) ?></small>
                    <a href="#" class="btn btn-sm btn-outline-danger">Baca Selengkapnya</a>
                </div>
            </div>
        <?php endif; ?>
    </div>

    <!-- TIPE 3: SEMUA BERITA TANPA KECUALI (RIGHT COLUMN) -->
    <div class="col-lg-7 col-md-12 mb-4">
        <h2 class="section-title">📚 Arsip Seluruh Berita Perusahaan</h2>
        <div style="max-height: 560px; overflow-y: auto; padding-right: 5px;">
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
                                <img src="<?= esc($berita_terbaru['foto']) ?>" class="thumbnail-img" alt="Foto">
                            </div>
                            <div class="col-8 col-sm-9">
                                <div class="card-body p-3">
                                    <span class="badge badge-light border text-dark mb-1 small"><?= esc($sb['kategori']) ?></span>
                                    <h6 class="font-weight-bold text-dark mb-1 text-truncate"><?= esc($sb['judul_berita']) ?></h6>
                                    <p class="text-small mb-1 text-muted text-truncate"><?= strip_tags($sb['isi_berita']) ?></p>
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
<?= $this->endSection() ?>

<?= $this->section('scripts') ?>
<!-- Memuat Core Javascript Owl Carousel -->
<script src="https://cloudflare.com"></script>
<script>
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
                0:   { items: 1 },
                576: { items: 2 },
                992: { items: 3 }
            }
        });
    });
</script>
<?= $this->endSection() ?>
