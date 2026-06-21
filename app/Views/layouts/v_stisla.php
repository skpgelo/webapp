<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title><?= $this->renderSection('title') ?> &mdash;</title>

    <!-- General CSS Files (Gunakan helper base_url) -->
    <link rel="stylesheet" href="<?= base_url('stisla/dist/assets/modules/bootstrap/css/bootstrap.min.css') ?>">
    <link rel="stylesheet" href="<?= base_url('assets/modules/fontawesome/css/all.min.css') ?>">

    <!-- Template CSS -->
    <link rel="stylesheet" href="<?= base_url('stisla/dist/assets/css/style.css') ?>">
    <link rel="stylesheet" href="<?= base_url('stisla/dist/assets/css/components.css') ?>">
    
    <!-- Render css tambahan spesifik halaman jika ada (misal Google Charts) -->
    <?= $this->renderSection('styles') ?>
</head>

<body>
  <div id="app">
    <div class="main-wrapper main-wrapper-1">
      
      <!-- Include Navbar Atas -->
      <!-- <= $this->include('layouts/parts/v_navbar') ?> -->
      <?= $this->include('layouts/v_navbar') ?>

      <!-- Include Sidebar Kiri -->
      <!-- <= $this->include('layouts/parts/v_sidebar') ?> -->
      <?= $this->include('layouts/v_sidebar') ?>

      <!-- Main Content Container -->
      <div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1><?= $this->renderSection('page_header') ?></h1>
          </div>

          <div class="section-body">
              <!-- Di sinilah isi halaman CRUD Pegawai Anda akan muncul -->
              <?= $this->renderSection('content') ?>
          </div>
        </section>
      </div>
      
      <!-- Footer -->
      <footer class="main-footer">
        <div class="footer-left">
          Copyright &copy; 2026 <div class="bullet"></div> Design By <a href="https://nauval.in">Muhamad Nauval Azhar</a>
        </div>
        <div class="footer-right"></div>
      </footer>

    </div>
  </div>

  <!-- General JS Scripts -->
  <script src="<?= base_url('assets/modules/jquery.min.js') ?>"></script>
  <script src="<?= base_url('stisla/dist/assets/modules/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>
  <script src="<?= base_url('stisla/dist/assets/js/stisla.js') ?>"></script>
  <script src="<?= base_url('stisla/dist/assets/js/scripts.js') ?>"></script>

  <!-- Render script tambahan spesifik halaman (Engine CRUD JS Anda) -->
  <?= $this->renderSection('scripts') ?>
</body>
</html>
