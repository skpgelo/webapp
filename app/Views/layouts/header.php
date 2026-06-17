
<!doctype html>
<html lang="en">
<!--

Page    : index / MobApp
Version : 1.0
Author  : Colorlib
URI     : https://colorlib.com

 -->

<head>
    <title>bbppks bandung</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Mobland - Mobile App Landing Page Template">
    <meta name="keywords" content="HTML5, bootstrap, mobile, app, landing, ios, android, responsive">

    <!-- Font -->
    <link rel="dns-prefetch" href="//fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css?family=Rubik:300,400,500" rel="stylesheet">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="<?= base_url(); ?>/mobapp/css/bootstrap.min.css">
    <!-- Themify Icons -->
    <link rel="stylesheet" href="<?= base_url(); ?>/mobapp/css/themify-icons.css">
    <!-- Owl carousel -->
    <link rel="stylesheet" href="<?= base_url(); ?>/mobapp/css/owl.carousel.min.css">
    <!-- Main css -->
    <link href="<?= base_url(); ?>/mobapp/css/style.css" rel="stylesheet">
</head>

<body data-spy="scroll" data-target="#navbar" data-offset="30">

    <!-- Nav Menu -->

    <div class="nav-menu fixed-top ">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <nav class="navbar navbar-dark navbar-expand-lg">
                        <a class="navbar-brand" style="color: red;" href="index.html"><b>BBPPKS</b> <i style="color: white;">BANDUNG</i>
                            <!-- <img src="<= base_url(); ?>/mobapp/images/logo.png" class="img-fluid" alt="logo"> -->
                            </a> <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar" aria-controls="navbar" aria-expanded="false" aria-label="Toggle navigation"> <span class="navbar-toggler-icon"></span> </button>
                        <div class="collapse navbar-collapse" id="navbar">
                            <ul class="navbar-nav ml-auto">
                                <li class="nav-item"> <a class="nav-link active" href="#home">HOME <span class="sr-only">(current)</span></a> </li>
                                <li class="nav-item"> <a class="nav-link" href="#features">FEATURES</a> </li>
                                <li class="nav-item"> <a class="nav-link" href="#sdm">SDM</a> </li>
                                <li class="nav-item"> <a class="nav-link" href="#gallery">GALLERY</a> </li>
                                <li class="nav-item"> <a class="nav-link" href="#pricing">PRICING</a> </li>
                                <li class="nav-item"> <a class="nav-link" href="#faq">F.A.Q.</a> </li>
                                <li class="nav-item"> <a class="nav-link" href="#contact">CONTACT</a> </li>
                                <li class="nav-item"> <a href="#" class="btn btn-outline-light my-3 my-sm-0 ml-lg-3">Sign In/Sign Out</a></li>
                            </ul>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </div>

<header class="slider-container" id="home">
    <div class="hero">
        <div class="slide">
            <img src="<?= base_url(); ?>/img/home/bike (4).jpg" class="img-fluid" alt="Banner Landing Page 1">
            <div class="slide-text">
                <h1>Selamat Datang di Website Kami</h1>
                <!-- <p>Solusi terbaik untuk bisnis Anda</p> -->
            </div>
        </div>
        <div class="slide">
            <img src="<?= base_url(); ?>/img/home/bike (3).jpg" class="img-fluid" alt="Banner Landing Page 2">
            <div class="slide-text">
                <h1>Inovasi Tanpa Batas</h1>
                <!-- <p>Tingkatkan efisiensi kerja Anda sekarang</p> -->
            </div>
        </div>
        <div class="slide">
            <img src="<?= base_url(); ?>/img/home/wowo.jpg" class="img-fluid" alt="Banner Landing Page 2">
            <!-- <div class="slide-text"> -->
                <!-- <h1>Inovasi Tanpa Batas</h1> -->
                <!-- <p>Tingkatkan efisiensi kerja Anda sekarang</p> -->
            <!-- </div> -->
        </div>
        <div class="slide">
            <img src="<?= base_url(); ?>/img/home/wowo.png" class="img-fluid" alt="Banner Landing Page 2">
            <!-- <div class="slide-text">
                <h1>Inovasi Tanpa Batas</h1>
                <!-- <p>Tingkatkan efisiensi kerja Anda sekarang</p>
            </div> -->
        </div>
        <div class="slide">
            <img src="<?= base_url(); ?>/img/home/bike (1).jpg" class="img-fluid" alt="Banner Landing Page 3">
            <div class="slide-text">
                <h1>Bergabunglah Bersama Kami</h1>
                <!-- <p>Dapatkan penawaran menarik setiap harinya</p> -->
            </div>
        </div>
        <div class="slide">
            <img src="<?= base_url(); ?>/img/home/bike (2).jpg" class="img-fluid" alt="Banner Landing Page 3">
            <div class="slide-text2">
                <h1>BALAI BESAR PENDIDIKAN DAN PELATIHAN KESEJAHTERAAN SOSIAL</h1>
                <h7><b>BBPPKS</b> <b>BANDUNG</b></h7>
                <br></br>
                <ps>Bergerak, Bekerja, Berdampak</ps>
            </div>
        </div>
    </div>
</header>

<?= $this->renderSection('page-sdm'); ?>

<?= $this->renderSection('page-sdm'); ?>

<?= $this->renderSection('page-sdm'); ?>

    <!-- // end .section -->
    <footer class="light-bg pt-4 py-4 text-center">
        <!-- Copyright removal is not prohibited! -->
        <p class="mb-2"><small style="color: red;"><?= Date('Y') ?>BBPPKS</small> <small><i>BANDUNG</i> || ©<span id="dateHere"><a href="https://colorlib.com"></a></small></p>
        <small>
            <a href="#" class="m-2">PRESS</a>
            <a href="#" class="m-2">TERMS</a>
            <a href="#" class="m-2">PRIVACY</a>
        </small>
    </footer>

    <!-- jQuery and Bootstrap -->
    <script src="<?= base_url(); ?>/mobapp/js/jquery-3.2.1.min.js"></script>
    <script src="<?= base_url(); ?>/mobapp/js/bootstrap.bundle.min.js"></script>
    <!-- Plugins JS -->
    <script src="<?= base_url(); ?>/mobapp/js/owl.carousel.min.js"></script>
    <!-- Custom JS -->
    <script src="<?= base_url(); ?>/mobapp/js/script.js"></script>
    <!-- Date JS -->
    <script src="<?= base_url(); ?>/js/date.js"></script>

</body>

</html>
