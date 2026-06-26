<?= $this->extend('layouts/v_stisla') ?>

<?= $this->section('title') ?> Tambah Peserta <?= $this->endSection() ?>
<?= $this->section('page_header') ?> Tambah Data Peserta <?= $this->endSection() ?>

<?= $this->section('content') ?>


    <form action="/peserta/store" method="post" class="row g-3 mt-2">
        <?= csrf_field(); ?>
        <div class="col-md-6"><label>Nama</label><input type="text" name="nama" class="form-control" required></div>
        <div class="col-md-6"><label>NIK</label><input type="text" name="nik" class="form-control" maxlength="16" required></div>
        <div class="col-md-6"><label>Email</label><input type="email" name="email" class="form-control" required></div>
        <div class="col-md-6"><label>No. Telepon</label><input type="text" name="nomor_telepon" class="form-control" required></div>
        <div class="col-md-3"><label>Desa</label><input type="text" name="desa" class="form-control"></div>
        <div class="col-md-3"><label>Kecamatan</label><input type="text" name="kecamatan" class="form-control"></div>
        <div class="col-md-3"><label>Kabupaten/Kota</label><input type="text" name="kabupaten_kota" class="form-control"></div>
        <div class="col-md-3"><label>Provinsi</label><input type="text" name="provinsi" class="form-control"></div>
        <div class="col-md-6"><label>Latitude</label><input type="text" name="latitude" class="form-control"></div>
        <div class="col-md-6"><label>Longitude</label><input type="text" name="longitude" class="form-control"></div>
        
        <div class="col-md-6">
            <label>Gender</label>
            <select name="gender" class="form-control" class="form-select">
                <option value="1">Pria</option>
                <option value="2">Wanita</option>
                <option value="3">Non-Biner</option>
            </select>
        </div>
        <div class="col-md-6">
            <label>Status Nikah</label>
            <select name="nikah" class="form-control" class="form-select">
                <option value="1">Belum Kawin</option>
                <option value="2">Kawin</option>
                <option value="3">Cerai Hidup</option>
                <option value="4">Cerai Mati</option>
            </select>
        </div>
        
        <div class="col-12 mt-4">
            <button type="submit" class="btn btn-success">Simpan Data</button>
            <a href="/peserta" class="btn btn-secondary">Kembali</a>
        </div>
    </form>
<?= $this->endSection() ?>