<?= $this->extend('dbadmin/index') ?>

<?= $this->section('page-content') ?>


        <!-- start -->
        <link
      rel="stylesheet"
      href="https://unpkg.com/leaflet@1.4.0/dist/leaflet.css"
      integrity="sha512-puBpdR0798OZvTTbP4A8Ix/l+A4dHDD0DGqYW6RQ+9jxkRFclaxxQb/SJAWZfWAkuyeQUytO7+7N4QKrDh+drA=="
      crossorigin=""
    />
    <script
      src="https://unpkg.com/leaflet@1.4.0/dist/leaflet.js"
      integrity="sha512-QVftwZFqvtRNi0ZyCtsznlKSWOStnDORoefr1enyq5mVL4tmKB3S/EnC3rRJcxCPavG10IcrVGSmPh6Qw5lwrg=="
      crossorigin=""
    ></script>
    <style>
      #issMap {
        height: 90vh;
	  		width: 100%
      }
    </style>

<div class="container-fluid">

<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800"><= $title; ?></h1>
<div class="container-fluid px-4">
<br>
<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary"><= $card_header; ?></h6>
    </div>
    <div class="card-body">
    <div class="content">
        <section class="hero">
            <div class="hero-content"></div>
            <!-- <table></table> -->
            <a href="#docs" class="action-btn" id="see-btn" onclick="{}">See Docs</a>
        </section>
    </div>
    <script src="cuaca/script_cuaca.js"></script>
    <?= $this->endSection() ?>