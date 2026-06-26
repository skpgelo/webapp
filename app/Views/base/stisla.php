<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title><?= $title ?? 'Dashboard'; ?> &mdash; Stisla</title>

    <!-- General CSS Files -->
    <link rel="stylesheet" href="https://jsdelivr.net">
    <link rel="stylesheet" href="https://fontawesome.com">

    <!-- CSS Libraries -->
    <?= $this->renderSection('styles') ?>

    <!-- Template CSS -->
    <link rel="stylesheet" href="https://cloudflare.com"> <!-- Ganti/gunakan file lokal stisla.css jika ada -->
    <link rel="stylesheet" href="https://jsdelivr.net">
</head>

<body>
    <div id="app">
        <div class="main-wrapper">
            <!-- Render Header -->
            <?= $this->include('base/1head') ?>
            <!-- Render CSS -->
            <?= $this->include('base/2css') ?>
            <!-- Render weathericons -->
            <?= $this->include('base/2weathericons') ?>
            <!-- Render navbar -->
            <?= $this->include('base/3navbar') ?>
            <!-- Render Sidebar -->
            <?= $this->include('base/4sidebar') ?>

            <!-- Main Content -->
            <div class="main-content">
                <section class="section">
                    <div class="section-header">
                        <h1><?= $page_heading ?? 'Blank Page'; ?></h1>
                    </div>

                    <div class="section-body">
                        <!-- Tempat Konten Modul Masuk -->
                        <?= $this->renderSection('content') ?>
                    </div>
                </section>
            </div>

            <!-- Render Footer -->
            <?= $this->include('base/6footer') ?>
        </div>
    </div>

    <!-- General JS Scripts -->
    <script src="https://cloudflare.com"></script>
    <script src="https://jsdelivr.net"></script>

    <!-- JS Libraies -->
    <?= $this->renderSection('scripts') ?>

</body>
</html>
