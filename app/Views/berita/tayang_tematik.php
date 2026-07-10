<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= esc($title); ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container my-5">
    <h2 class="text-center mb-4"><?= esc($title); ?></h2>
    
    <?php if (empty($list_foto)) : ?>
        <div class="alert alert-warning text-center" role="alert">
            Tidak ada foto tematik yang memenuhi syarat penayangan saat ini.
        </div>
    <?php else : ?>
        <div class="row row-cols-1 row-cols-md-3 g-4">
            <?php foreach ($list_foto as $row) : ?>
                <div class="col">
                    <div class="card h-100 shadow-sm">
                        <!-- Asumsi file foto disimpan di folder public/uploads/ -->
                        <img src="<?= base_url('uploads/' . $row->foto); ?>" class="card-img-top" alt="<?= $row->nama_foto; ?>" style="height: 200px; object-fit: cover;">
                        
                        <div class="card-body">
                            <h5 class="card-title"><?= esc($row->nama_foto); ?></h5>
                            <p class="card-text mb-1"><strong>Tema:</strong> <?= esc($row->tema); ?></p>
                            <p class="card-text mb-1"><strong>Kategori:</strong> <?= esc($row->tematik); ?> (<span class="badge bg-info"><?= esc($row->skala); ?></span>)</p>
                            <p class="card-text"><strong>Tanggal Acara:</strong> <?= esc(date('d M Y', strtotime($row->tgl_tematik))); ?></p>
                        </div>
                        <div class="card-footer text-muted text-center text-sm">
                            Sisa Masa Tayang H-<?= esc($row->tayang_hari); ?> s/d H+<?= esc($row->tayang_hari); ?>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>