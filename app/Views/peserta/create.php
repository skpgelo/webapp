<!DOCTYPE html>
<html lang="id">
<head>
    <title>Tambah Peserta</title>
    <link rel="stylesheet" href="https://jsdelivr.net">
</head>
<body class="container mt-5 mb-5">
    <h2>Tambah Data Peserta</h2>
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
            <select name="gender" class="form-select">
                <option value="1">Pria</option>
                <option value="2">Wanita</option>
                <option value="3">Lainnya</option>
            </select>
        </div>
        <div class="col-md-6">
            <label>Status Nikah</label>
            <select name="nikah" class="form-select">
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
</body>
</html>
