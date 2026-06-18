<?= $this->extend('dbadmin/index') ?>

<?= $this->section('page-content') ?>

<div class="container-fluid">

<!-- Page Heading -->
    <div class="container-fluid px-4">
        <h4 class="h3 mt-3 ml-5 text-gray-800">[<?= $db; ?>]</h4>
        <ol class="breadcrumb mb-4">
            <h6><li class="breadcrumb-item active"><?= $juduldb ?></li></h6>
        </ol>
    </div>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary"></h6>
        </div>
        <div class="card-body">
            <?php
        $url="http://m.news.viva.co.id/news/read/577458-istana-tidak-tahu-soal-rapor-merah-calon-kapolri";
$data=@file_get_contents($url);

$data=preg_replace('/\n+/','', $data);

$data2=preg_replace('/<\!DOCTYPE(.+?)<h1 class=\"title-big-detail\">/', '', $data);
$judul=preg_replace('/<\/h1>(.+?)html>/', '', $data2);

echo $judul;
?>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<?= $this->endSection() ?>
