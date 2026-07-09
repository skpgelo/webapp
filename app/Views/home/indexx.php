<!doctype html>
<html lang="en">
<!-- https://colorlib.com -->
<head>
    <title>bbppks bandung</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Mobland - Mobile App Landing Page Template">
    <meta name="keywords" content="HTML5, bootstrap, mobile, app, landing, ios, android, responsive">

<!-- <= $this->section('styles') ?> -->

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
    <link href="<?= base_url(); ?>/css/stylemo.css" rel="stylesheet">

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.2/css/all.css" />
    <!-- Google Fonts Roboto -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap" />
    <!-- MDB -->
    <!-- <link rel="stylesheet" href="css/bootstrap-login-form.min.css" /> -->

    <!-- <= $this->endSection() ?> -->
</head>

<body data-spy="scroll" data-target="#navbar" data-offset="30">

    <!-- navigasi -->
        <?=$this->include('layout_lp/navigasi')?>

    <!-- head -->
        <?=$this->include('layout_lp/head')?>

    <!-- client-logo -->
        <!-- <=$this->include('layout_lp/client-logo')?> -->

    <!-- highlights -->
        <?=$this->include('layout_lp/highlights')?>

    <!-- gallery -->
        <?=$this->include('layout_lp/gallery')?>

    <!-- gallery -->
        <?=$this->include('layout_lp/dip')?>

    <!-- pengumuman -->
        <?=$this->include('layout_lp/pengumuman')?>

    <!-- penawaran -->
        <?=$this->include('layout_lp/penawaran')?>

    <!-- layanan -->
        <?=$this->include('layout_lp/layanan')?>

    <!-- sdm -->
        <?=$this->include('layout_lp/sdm')?>

    <!-- sdm -->
        <?=$this->include('layout_lp/pengaduan')?>

    <!-- faq -->
        <?=$this->include('layout_lp/faq')?>

    <!-- maps -->
        <?=$this->include('layout_lp/maps')?>

    <!-- contact -->
        <?=$this->include('layout_lp/contact')?>

    <!-- footer -->
        <?=$this->include('layout_lp/footer')?>

        <small>
            <!-- <a href="#" class="m-2">PRESS</a>
            <a href="#" class="m-2" data-toggle="modal" data-target="#exampleModal">TERM</a> 
            <a href="#" class="m-2">PRIVACY</a> -->

            <button type="button" class="btn btn-danger btn-detail" data-toggle="modal" data-target="#pressModal" data-id="1">
                PRESS
            </button>
            <button type="button" class="btn btn-danger btn-detail" data-toggle="modal" data-target="#termModal" data-id="2">
                TERM
            </button>
            <button type="button" class="btn btn-danger btn-detail" data-toggle="modal" data-target="#privacyModal" data-id="3">
                PRIVACY
            </button>
        </small>
    </footer>
    
    <!-- button_footer -->
        <!-- <=$this->include('layout_lp/button_footer')?> -->

    <!-- modal -->
        <!-- <=$this->include('layout_lp/modal')?> -->

    <!-- <div class="container">
            <h2>Sistem Pengaduan Layanan</h2>
            <p>Interaksikan kursor Anda pada tombol di bawah.</p>

            <php if (session()->getFlashdata('error')) : ?>
                <div class="alert-danger"><= session()->getFlashdata('error') ?></div>
            <php endif; ?>

            PEMBUNGKUS BARU: Untuk mendeteksi mouseleave secara akurat
            <div class="interactive-area" id="interactiveArea">
                
                TOMBOL UTAMA
                <button type="button" id="mainButton" class="btn-action">Akses Form Pengaduan</button>

                FORM LOGIN
                <div id="loginFormContainer" class="form-container">
                    <h3 style="margin-top:0; text-align:center;">Silakan Login</h3>
                    <form action="<?= base_url('auth/login_process') ?>" method="post">
                        <= csrf_field() ?>
                        <div class="form-group">
                            <label>Username</label>
                            <input type="text" name="username" required placeholder="Contoh: admin">
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" name="password" required placeholder="Contoh: 12345">
                        </div>
                        <button type="submit" class="btn-submit">Klik untuk Login Valid</button>
                    </form>
                </div>

            </div>
        </div> -->


<!-- <= $this->include('dashboard/termmodal') ?> -->


<!-- <= $this->section('scripts') ?> -->
<!-- Library Bootstrap JS -->
    <script src="https://jsdelivr.net"></script>

    <!-- PEMANGGILAN SCRIPT YANG TERPISAH -->
    <!-- Gunakan type="module" agar bisa saling berkirim fungsi/data jika diperlukan -->
    <script type="module" src="<?= base_url('js/modal-terms.js') ?>"></script>
    <script type="module" src="<?= base_url('js/halaman-utama.js') ?>"></script>

    <!-- jQuery and Bootstrap -->
    <script src="<?= base_url(); ?>/mobapp/js/jquery-3.2.1.min.js"></script>
    <script src="<?= base_url(); ?>/mobapp/js/bootstrap.bundle.min.js"></script>
    <!-- Plugins JS -->
    <script src="<?= base_url(); ?>/mobapp/js/owl.carousel.min.js"></script>
    <!-- Custom JS -->
    <script src="<?= base_url(); ?>/mobapp/js/script.js"></script>
    <!-- Date JS -->
    <script src="<?= base_url(); ?>/js/date.js"></script>

    <script src="<?= base_url(); ?>/js/scriptmo.js"></script>
    <!-- <script src="<= base_url(); ?>/js/termmodal.js"></script>
    <script src="<= base_url(); ?>/js/modal-terms.js"></script> -->

<!-- <script>
    // Ambil status login dari session backend CI4
    const isLoggedIn = <= session()->get('isLoggedIn') ? 'true' : 'false' ?>;
    
    const mainButton = document.getElementById('mainButton');
    const interactiveArea = document.getElementById('interactiveArea');
    const loginFormContainer = document.getElementById('loginFormContainer');
    const displayhtml = document.getElementById('loginFormContainer');

    // 1. MOUSEOVER: Saat kursor masuk ke area tombol
    mainButton.addEventListener('mouseover', function() {
        if (isLoggedIn) {
            // Jika sudah login, langsung redirect ke halaman pengaduan
            window.location.href = "<= base_url('auth/pengaduan') ?>";
        } else {
            // Jika belum login, tampilkan form login
            loginFormContainer.style.display = 'block';
        }
    });

    // 2. MOUSECLICK: Saat tombol diklik langsung
    mainButton.addEventListener('click', function() {
        if (isLoggedIn) {
            window.location.href = "<= base_url('auth/pengaduan') ?>";
        } else {
            loginFormContainer.style.display = 'block';
            document.querySelector('input[name="username"]').focus();
        }
    });

    // 3. MOUSELEAVE (LOGIKA BARU): Saat kursor keluar dari seluruh area interaktif (tombol & form)
    interactiveArea.addEventListener('mouseleave', function() {
        // Sembunyikan kembali form login dan pastikan tidak menampilkan form pengaduan
        loginFormContainer.style.display = 'none';
    });

    // 3. MOUSELEAVE (LOGIKA BARU): Saat kursor keluar dari seluruh area interaktif (tombol & form)
    displayhtml.addEventListener('onmouseover', function() {
        // Sembunyikan kembali form login dan pastikan tidak menampilkan form pengaduan
        loginFormContainer.style.display = 'block';
    });
</script> -->

<script>
    $(document).ready(function() {
    $('.btn-detail').on('click', function() {
        const id = $(this).data('id');
        
        $.ajax({
            url: "<?= base_url('/term'); ?>/" + id,
            type: "GET",
            dataType: "JSON",
            success: function(response) {
                // Mengambil field 'nama' dari data (asmad)
                $('#viewNama').text(response.title); 
                
                // Jika ingin mengganti ke field lain, tinggal ubah menjadi:
                $('#viewNama').text(response.term); // Hasilnya: asmad@gmail.com
                // $('#viewNama').text(response.profesi); // Hasilnya: guru
                
                // Tampilkan modal
                $('#termModal').modal('show');
            },
            error: function() {
                alert('Gagal mengambil data dari server.');
            }
        });
    });
});

</script>
<!-- <= $this->endSection() ?> -->

</body>

</html>
