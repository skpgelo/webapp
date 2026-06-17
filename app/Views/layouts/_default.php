<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title><?= $titletab ?></title>

  <!-- General CSS Files -->
  <link rel="stylesheet" href="<?= base_url('stisla/dist/assets/modules/bootstrap/css/bootstrap.min.css') ?>">
  <link rel="stylesheet" href="<?= base_url('stisla/dist/assets/modules/fontawesome/css/all.min.css') ?>">

  <!-- CSS Libraries -->
  <link rel="stylesheet" href="https://jsdelivr.net">
  <link rel="stylesheet" href="https://fontawesome.com">

  <!-- Template CSS -->
  <link rel="stylesheet" href="<?= base_url('stisla/dist/assets/css/style.css') ?>">
  <link rel="stylesheet" href="<?= base_url('stisla/dist/assets/css/components.css') ?>">
  
<!-- Start GA -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-94034622-3"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-94034622-3');
</script>
<!-- /END GA -->


</head>

<body oncontextmenu="return false;">
  <div id="app">
    <div class="main-wrapper main-wrapper-1">
      <div class="navbar-bg">
      </div>

      <!-- 1. ISI NAVBAR -->
      <?= $this->include('layouts/_navbar') ?>

      <!-- 2. ISI SIDEBAR -->
      <?= $this->include('layouts/_sidebar') ?>

      <!-- 3. KONTEN UTAMA (DINAMIS) -->
      <div class="main-content">
        <?= $this->renderSection('content') ?>
      </div>

      <!-- 4. KONTEN FOOTER -->
      <?= $this->include('layouts/_footer') ?>
 
    </div>
  </div>

  <!-- General JS Scripts -->
  <script src="https://jsdelivr.net"></script>
  <script src="https://cloudflare.com"></script>
  
  <script src="<?= base_url('stisla/dist/assets/modules/jquery.min.js') ?>"></script>
  <script src="<?= base_url('stisla/dist/assets/modules/popper.js') ?>"></script>
  <script src="<?= base_url('stisla/dist/assets/modules/tooltip.js') ?>"></script>
  <script src="<?= base_url('stisla/dist/assets/modules/bootstrap/js/bootstrap.min.js') ?>"></script>
  <script src="<?= base_url('stisla/dist/assets/modules/nicescroll/jquery.nicescroll.min.js') ?>"></script>
  <script src="<?= base_url('stisla/dist/assets/modules/moment.min.js') ?>"></script>

  <!-- JS Template Stisla -->
  <script src="<?= base_url('stisla/dist/assets/js/stisla.js') ?>"></script>
  <script src="<?= base_url('stisla/dist/assets/js/scripts.js') ?>"></script>
</body>
</html>