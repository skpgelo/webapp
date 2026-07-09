<?= $this->extend('base/skeleton'); ?>

<?= $this->section('styles') ?>
  <!-- CSS Libraries -->
  <link rel="stylesheet" href="<?= base_url() ?>stisla_/dist/assets/modules/owlcarousel2/dist/assets/owl.carousel.min.css">
  <link rel="stylesheet" href="<?= base_url() ?>stisla_/dist/assets/modules/owlcarousel2/dist/assets/owl.theme.default.min.css">

  <link href="https://jsdelivr.net" rel="stylesheet">
    <style>
        .highlight-img {
            height: 400px;
            object-fit: cover;
            width: 100%;
            transition: transform 0.5s ease;
        }
        .highlight-card:hover .highlight-img {
            transform: scale(1.02);
        }
        /* Membatasi teks cuplikan berita agar rapi maksimal 3 baris */
        .line-clamp {
            display: -webkit-box;
            -webkit-line-clamp: 3;
            -webkit-box-orient: vertical;  
            overflow: hidden;
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
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h3 class="fw-bold mb-0 border-start border-success border-4 ps-2"></h3>
            <span class="badge bg-success-subtle text-success border border-success-subtle px-3 py-2 rounded-pill">
                Update Real-time
            </span>
        </div>


    <div class="container my-5">
        <h2 class="fw-bold mb-4 border-start border-primary border-4 ps-2">Berita List</h2>

        <!-- Cek apakah ada data berita di database -->
        <?php if (!empty($highlight)): ?>
            
            <!-- KOMPONEN HIGHLIGHT HERO -->
            <div class="card border-0 shadow-sm overflow-hidden rounded-4 highlight-card bg-white">
                <div class="row g-0 align-items-center">
                    
                    <!-- SISI KIRI: GAMBAR COVER -->
                    <div class="col-lg-7 overflow-hidden">
                        <?php if (!empty($highlight['cover_image'])): ?>
                            <img src="<?= base_url('uploads/berita/cover/' . $highlight['cover_image']) ?>" class="img-fluid highlight-img" alt="Cover Berita Terbaru">
                        <?php else: ?>
                            <!-- Gambar Placeholder jika berita tidak memiliki cover -->
                            <img src="https://unsplash.com" class="img-fluid highlight-img" alt="Placeholder">
                        <?php endif; ?>
                    </div>

                    <!-- SISI KANAN: JUDUL & CUPLIKAN TEKS -->
                    <div class="col-lg-5">
                        <div class="card-body p-4 p-xl-5">
                            
                            <!-- Label Badge -->
                            <span class="badge bg-danger mb-3 px-3 py-2 text-uppercase tracking-wider">Terbaru</span>
                            
                            <!-- Judul Berita -->
                            <h1 class="card-title h2 fw-xl-bold text-dark lh-sm mb-3">
                                <a href="<?= base_url('berita/detail/' . $highlight['id']) ?>" class="text-decoration-none text-dark link-primary">
                                    <?= esc($highlight['judul']) ?>
                                </a>
                            </h1>
                            
                            <!-- Meta Data info -->
                            <div class="text-muted small mb-4 d-flex align-items-center gap-2">
                                <span>Oleh <strong><?= esc($highlight['pembuat']) ?></strong></span>
                                <span>•</span>
                                <span><?= date('d M Y', strtotime($highlight['created_at'])) ?></span>
                            </div>

                            <!-- Cuplikan Isi Berita (Menghapus tag HTML CKEditor untuk ringkasan teks biasa) -->
                            <p class="card-text text-secondary line-clamp mb-4">
                                <?= strip_tags($highlight['isi_berita']) ?>
                            </p>

                            <!-- Tombol Aksi Selengkapnya -->
                            <a href="<?= base_url('berita/detail/' . $highlight['id']) ?>" class="btn btn-primary px-4 py-2 rounded-pill fw-bold shadow-sm">
                                Baca Selengkapnya
                            </a>

                        </div>
                    </div>

                </div>
            </div>

        <?php else: ?>
            <!-- Tampilan jika database kosong -->
            <div class="alert alert-info text-center py-5 rounded-4 shadow-sm" role="alert">
                <h4 class="alert-heading fw-bold">Belum Ada Berita</h4>
                <p class="mb-0">Silakan isi data berita baru terlebih dahulu pada panel admin Anda.</p>
            </div>
        <?php endif; ?>
    </div>
<?= $this->endSection() ?>

<?= $this->section('script') ?>
    <!-- Load Bootstrap JS -->
    <script src="https://jsdelivr.net"></script>
    <?= $this->endSection() ?>