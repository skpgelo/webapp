<?= $this->extend('layouts/v_stisla') ?>

<?= $this->section('title') ?> Berita Per Kategori (Tabs) <?= $this->endSection() ?>
<?= $this->section('page_header') ?> Navigasi Berita Kategori <?= $this->endSection() ?>

<?= $this->section('content') ?>

<body class="container mt-5">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2>Data Peserta</h2>
        <a href="/peserta/create" class="btn btn-primary">Tambah Data</a>
    </div>

    <?php if (session()->getFlashdata('success')) : ?>
        <div class="alert alert-success"><?= session()->getFlashdata('success'); ?></div>
    <?php endif; ?>

    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>NIK</th>
                <th>Email</th>
                <th>Wilayah</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php $no = 1; foreach ($peserta as $p) : ?>
            <tr>
                <td><?= $no++; ?></td>
                <td><?= $p->nama; ?></td>
                <td><?= $p->nik; ?></td>
                <td><?= $p->email; ?></td>
                <td><?= "Desa $p->desa, Kec. $p->kecamatan, $p->kabupaten_kota"; ?></td>
                <td>
                    <a href="/peserta/edit/<?= $p->id; ?>" class="btn btn-sm btn-warning">Edit</a>
                    <a href="/peserta/delete/<?= $p->id; ?>" class="btn btn-sm btn-danger" onclick="return confirm('Hapus data ini?')">Hapus</a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

<?= $this->endSection() ?>