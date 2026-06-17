<?= $this->extend('layouts/v_stisla') ?>

<?= $this->section('title') ?> Dashboard Manajemen Karyawan <?= $this->endSection() ?>
<?= $this->section('page_header') ?> Manajemen Struktur Karyawan <?= $this->endSection() ?>

<!-- MENYERTAKAN CSS SEPARATED -->
<?= $this->section('styles') ?>
<script type="text/javascript" src="https://gstatic.com"></script>
<link rel="stylesheet" href="<?= base_url('assets/css/org-chart-custom.css') ?>">
<?= $this->endSection() ?>

<!-- ISI UTAMA CONTAINER DASHBOARD -->
<?= $this->section('content') ?>
<!-- Tombol Pemicu Modul CREATE -->
<div class="row">
    <div class="col-12 text-right mb-4">
        <button class="btn btn-primary btn-lg shadow" onclick="showTambahModal()">
            <i class="fas fa-plus"></i> Tambah Karyawan
        </button>
    </div>
</div>

<!-- MEMANGGIL MASING-MASING MODUL SECARA TERPISAH -->
<?= $this->include('karyawan/modules/mod_statistik') ?>
<?= $this->include('karyawan/modules/mod_chart') ?>
<?= $this->include('karyawan/modules/mod_tabel') ?>
<?= $this->include('karyawan/modules/mod_form') ?>
<?= $this->include('karyawan/modules/mod_detail') ?>

<?= $this->endSection() ?>

<!-- MENYERTAKAN JAVASCRIPT SEPARATED SESUAI OPERASI CRUD NYA -->
<?= $this->section('scripts') ?>
<script>
    const baseUrl = '<?= base_url() ?>';
</script>
<script src="<?= base_url('assets/js/karyawan-read.js') ?>"></script>
<script src="<?= base_url('assets/js/karyawan-create.js') ?>"></script>
<script src="<?= base_url('assets/js/karyawan-update.js') ?>"></script>
<script src="<?= base_url('assets/js/karyawan-delete.js') ?>"></script>
<?= $this->endSection() ?>
