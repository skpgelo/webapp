<?= $this->extend('layouts/v_stisla') ?>

<?= $this->section('title') ?> Tambah Peserta <?= $this->endSection() ?>
<?= $this->section('page_header') ?> Tambah Data Peserta <?= $this->endSection() ?>

<?= $this->section('content') ?>

<body class="container mt-5 mb-5">
    <h2>Edit Data Peserta</h2>
    <form action="/peserta/update/<?= $peserta->id; ?>" method="post" class="row g-3 mt-2">
        <?= csrf_field(); ?>
        <div class="col-md-6"><label>Nama</label><input type="text" name="nama" value="<?= $peserta->nama; ?>" class="form-control" required></div>
        <div class="col-md-6"><label>NIK</label><input type="text" name="nik" value="<?= $peserta->nik; ?>" class="form-control" maxlength="16" required></div>
        <div class="col-md-6"><label>Email</label><input type="email" name="email" value="<?= $peserta->email; ?>" class="form-control" required></div>
        <div class="col-md-6"><label>No. Telepon</label><input type="text" name="nomor_telepon" value="<?= $peserta->nomor_telepon; ?>" class="form-control" required></div>
        <div class="col-md-3"><label>Desa</label><input type="text" name="desa" value="<?= $peserta->desa; ?>" class="form-control"></div>
        <div class="col-md-3"><label>Kecamatan</label><input type="text" name="kecamatan" value="<?= $peserta->kecamatan; ?>" class="form-control"></div>
        <div class="col-md-3"><label>Kabupaten/Kota</label><input type="text" name="kabupaten_kota" value="<?= $peserta->kabupaten_kota; ?>" class="form-control"></div>
        <div class="col-md-3"><label>Provinsi</label><input type="text" name="provinsi" value="<?= $peserta->provinsi; ?>" class="form-control"></div>
        <div class="col-md-6"><label>Latitude</label><input type="text" name="latitude" value="<?= $peserta->latitude; ?>" class="form-control"></div>
        <div class="col-md-6"><label>Longitude</label><input type="text" name="longitude" value="<?= $peserta->longitude; ?>" class="form-control"></div>
        
        <div class="col-md-6">
            <label>Gender</label>
            <select name="gender" class="form-select">
                <option value="1" <?= $peserta->gender == '1' ? 'selected' : ''; ?>>Pria</option>
                <option value="2" <?= $peserta->gender == '2' ? 'selected' : ''; ?>>Wanita</option>
                <option value="3" <?= $peserta->gender == '3' ? 'selected' : ''; ?>>Lainnya</option>
            </select>
        </div>
        <div class="col-md-6">
            <label>Status Nikah</label>
            <select name="nikah" class="form-select">
                <option value="1" <?= $peserta->nikah == '1' ? 'selected' : ''; ?>>Belum Kawin</option>
                <option value="2" <?= $peserta->nikah == '2' ? 'selected' : ''; ?>>Kawin</option>
                <option value="3" <?= $peserta->nikah == '3' ? 'selected' : ''; ?>>Cerai Hidup</option>
                <option value="4" <?= $peserta->nikah == '4' ? 'selected' : ''; ?>>Cerai Mati</option>
            </select>
        </div>
        
        <div class="col-12 mt-4">
            <button type="submit" class="btn btn-warning">Perbarui Data</button>
            <a href="/peserta" class="btn btn-secondary">Kembali</a>
        </div>
    </form>
<?= $this->endSection() ?>