<?= $this->extend('base/skeleton'); ?>

<?= $this->section('styles') ?>
  <!-- CSS Libraries -->
  <link rel="stylesheet" href="<?= base_url() ?>stisla_/dist/assets/modules/owlcarousel2/dist/assets/owl.carousel.min.css">
  <link rel="stylesheet" href="<?= base_url() ?>stisla_/dist/assets/modules/owlcarousel2/dist/assets/owl.theme.default.min.css">

  <link href="https://jsdelivr.net" rel="stylesheet">
    <style>
        .card-news-img {
            height: 180px;
            object-fit: cover;
            width: 100%;
        }
        .card-news {
            transition: transform 0.2s ease, box-shadow 0.2s ease;
        }
        .card-news:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0,0,0,0.1) !important;
        }
    </style>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="main-content">
  <?=$this->include('base/4row')?>
  <?=$this->include('base/4sub_section_header')?>

  <div class="section-body">
    <div class="row justify-content-center">
      <div class="col-md-12">
        <div class="card shadow-lg">
          <div class="col-12 col-sm-12 col-lg-12">
            <div class="card">

<!-- awal div card -->
              <div class="card-header d-flex justify-content-between align-items-center mb-3">
                <h4><?= $card_header;?></h4>
                <a href="/berita/tambah" class="btn btn-primary">Tambah Berita</a>
              </div>


    <div class="container">
        <!-- <div class="d-flex justify-content-between align-items-center mb-4">
            <h3 class="fw-bold mb-0 border-start border-success border-4 ps-2"></h3>
            <span class="badge bg-success-subtle text-success border border-success-subtle px-3 py-2 rounded-pill">
                Update Real-time
            </span>
        </div> -->

      <!-- start owl -->
      <!-- <div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>Owl Carousel</h1>
            <div class="section-header-breadcrumb">
              <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
              <div class="breadcrumb-item"><a href="#">Modules</a></div>
              <div class="breadcrumb-item">Owl Carousel</div>
            </div>
          </div>

          <div class="section-body">
            <h2 class="section-title">Owl Carousel</h2>
            <p class="section-lead">Display multiple images alternately within a few seconds.</p>

            <div class="row">
              <div class="col-12 col-sm-6 col-lg-6">
                <div class="card">
                  <div class="card-header">
                    <h4>Sliders</h4>
                  </div>
                  <div class="card-body">
                    <div class="owl-carousel owl-theme slider" id="slider1">
                      <div><img alt="image" src="assets/img/news/img01.jpg"></div>
                      <div><img alt="image" src="assets/img/news/img08.jpg"></div>
                      <div><img alt="image" src="assets/img/news/img10.jpg"></div>
                      <div><img alt="image" src="assets/img/news/img09.jpg"></div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-12 col-sm-6 col-lg-6">
                <div class="card">
                  <div class="card-header">
                    <h4>Sliders (Caption)</h4>
                  </div>
                  <div class="card-body">
                    <div class="owl-carousel owl-theme slider" id="slider2">
                      <div><img alt="image" src="assets/img/news/img01.jpg">
                        <div class="slider-caption">
                          <div class="slider-title">Image 1</div>
                          <div class="slider-description">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                          tempor incididunt ut labore et dolore magna aliqua.</div>
                        </div>
                      </div>
                      <div><img alt="image" src="assets/img/news/img08.jpg">
                        <div class="slider-caption">
                          <div class="slider-title">Image 2</div>
                          <div class="slider-description">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                          tempor incididunt ut labore et dolore magna aliqua.</div>
                        </div>
                      </div>
                      <div><img alt="image" src="assets/img/news/img10.jpg">
                        <div class="slider-caption">
                          <div class="slider-title">Image 3</div>
                          <div class="slider-description">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                          tempor incididunt ut labore et dolore magna aliqua.</div>
                        </div>
                      </div>
                      <div><img alt="image" src="assets/img/news/img09.jpg">
                        <div class="slider-caption">
                          <div class="slider-title">Image 4</div>
                          <div class="slider-description">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                          tempor incididunt ut labore et dolore magna aliqua.</div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
      </div> -->
      <!-- end owl -->

      <!-- Cek apakah ada berita dalam 7 hari terakhir -->
        <?php if (!empty($daftar_berita)): ?>
            
            <!-- Grid Konfigurasi: 1 kolom di HP, 2 kolom di tablet, 4 kolom di laptop/desktop -->
            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-4 g-4">
                
                <?php foreach ($daftar_berita as $news): ?>
                    <div class="col">
                        <div class="card h-100 border-0 shadow-sm rounded-3 overflow-hidden card-news">
                            
                            <!-- GAMBAR THUMBNAIL BERITA -->
                            <div class="owl-carousel owl-theme slider" id="slider2">
                            <?php if (!empty($news['cover_image'])): ?>
                                <img src="<?= esc($news['cover_image']) ?>" width="120" onerror="this.src='/img/no-image.jpg'">
                                <img src="<?= base_url('uploads/berita/cover/' . $news['cover_image']) ?>" class="card-img-top card-news-img" alt="Cover">
                            <?php else: ?>
                                <img src="https://unsplash.com" class="card-img-top card-news-img" alt="Placeholder">
                            <?php endif; ?>
                             
                            <!-- KONTEN KARTU BERITA -->
                            <div class="card-body d-flex flex-column p-3">
                                <!-- Tanggal Posting -->
                                <small class="text-muted mb-2 d-block">
                                    <?= date('d M Y', strtotime($news['created_at'])) ?>
                                </small>
                                
                                <!-- Judul Berita -->
                                <h5 class="card-title fw-bold text-dark mb-2 text-truncate-2">
                                    <?= esc($news['judul_berita']) ?>
                                </h5>
                                
                                <!-- Ringkasan Isi Teks (Maksimal 100 Karakter) -->
                                <p class="card-text text-secondary small mb-4 flex-grow-1">
                                    <?php 
                                        // 1. Bersihkan teks dari format tag HTML CKEditor
                                        $teksBersih = strip_tags($news['isi_berita']);
                                        
                                        // 2. Potong string tepat 100 karakter menggunakan helper CodeIgniter 4
                                        echo character_limiter($teksBersih, 100, '...'); 
                                    ?>
                                </p>
                                
                                <!-- LINK REDIRECT SELENGKAPNYA -->
                                <div class="mt-auto">
                                    <a href="<?= base_url('berita/detail/' . $news['id']) ?>" class="text-decoration-none text-success fw-bold small d-inline-flex align-items-center gap-1 link-arrow">
                                        SELENGKAPNYA 
                                        <svg xmlns="http://w3.org" width="14" height="14" fill="currentColor" class="bi bi-arrow-right" viewBox="0 0 16 16">
                                            <path fill-rule="evenodd" d="M1 8a.5.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5.0 0 1 .708-.708l4 4a.5.5.0 0 1 0 .708l-4 4a.5.5.0 0 1-.708-.708L13.293 8.5H1.5A.5.5.0 0 1 1 8"/>
                                        </svg>
                                    </a>
                                </div>

                            </div>

                                                        </div>
                        </div>
                    </div>
                <?php endforeach; ?>

            </div>

        <?php else: ?>
            <!-- Jika tidak ada postingan sama sekali dalam rentang 7 hari -->
            <div class="card border-0 shadow-sm rounded-3 p-5 text-center bg-white">
                <p class="text-muted mb-0 fs-5 italic">Tidak ada berita baru yang diterbitkan dalam 7 hari terakhir.</p>
            </div>
        <?php endif; ?>
    </div>

<!-- akhir div card -->
                </div>
              </div>
            </div>
        </div>
    </div>
  </div>
</div>
<?= $this->endSection() ?>

<?= $this->section('script') ?>
    <script src="https://jsdelivr.net"></script>
<?= $this->endSection() ?>
