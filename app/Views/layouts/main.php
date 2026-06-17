<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $this->renderSection('title') ?> - Aplikasi Kepegawaian</title>
    <!-- Bootstrap 5 CDN -->
    <!-- <link href="https://jsdelivr.net" rel="stylesheet"> -->
    <!-- <link href="https://jsdelivr.net" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="crossorigin"> -->
    <link href="https://jsdelivr.net" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <!-- Tempat menaruh CSS tambahan khusus halaman tertentu jika ada -->
    <?= $this->renderSection('styles') ?>
</head>
<body class="bg-light d-flex flex-column min-vh-100">

    <!-- Navbar Utama -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark shadow-sm mb-4">
        <div class="container">
            <a class="navbar-brand fw-bold" href="/pegawai">SikaPeg (Sistem Kepegawaian)</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link active" href="/pegawai">Data Pegawai</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Konten Utama Dinamis -->
    <main class="container flex-grow-1">
        <?= $this->renderSection('content') ?>
    </main>

    <!-- Footer -->
    <footer class="bg-white text-center py-3 mt-5 border-top shadow-sm">
        <div class="container">
            <span class="text-muted small">&copy; <?= date('Y') ?> Aplikasi Kepegawaian. All Rights Reserved.</span>
        </div>
    </footer>

    <!-- Pustaka Utama Bootstrap JS -->
    <!-- <script src="https://jsdelivr.net"></script> -->
    <!-- <script src="https://jsdelivr.net" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="crossorigin"></script> -->
    <script src="https://jsdelivr.net" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

    <!-- 1. SALIN BARIS CDN CKEDITOR 5 STABIL TERBARU INI -->
    <script src="https://ckeditor.com"></script>

    <!-- Tempat menaruh JavaScript tambahan khusus halaman tertentu -->
    <?= $this->section('scripts') ?>

</body>
</html>