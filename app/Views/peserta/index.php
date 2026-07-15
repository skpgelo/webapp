<?= $this->extend('base/skeleton'); ?>

<?= $this->section('content') ?>
<div class="main-content">

<?=$this->include('base/4row')?>
<!-- <=$this->include('base/4sub_section_header')?> -->

      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <div class="section-body">
            <h2 class="section-title"><?= $sub_section_header; ?></h2>
            <p class="section-lead">
              Examples and usage guidelines for form control styles, layout options, and custom components for creating a wide variety of forms.
            </p>


      <div class="row justify-content-center">
        <div class="col-md-12">
          <div class="card shadow-lg">
            <!-- <div class="card-header bg-whitesmoke text-dark">
                <h4><i class="fas fa-edit mr-2 text-warning"></i>Ubah Informasi Dokumen</h4>
            </div> -->
              <div class="col-12 col-sm-12 col-lg-12">
                <!-- <div class="card">
                  <div class="card-header">
                    <h4><= $card_header;?></h4>
                  </div> -->
                  
                  <div class="card-body">
                    <ul class="nav nav-tabs" id="myTab2" role="tablist">
                      <li class="nav-item">
                        <a class="nav-link active" id="hometc-tab2" data-toggle="tab" href="#hometc24" role="tab" aria-controls="hometc" aria-selected="true">TERM & CONDITIONS</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" id="privacy-tab25" data-toggle="tab" href="#privacy25" role="tab" aria-controls="privacy" aria-selected="false"> PRIVACY POLICY</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" id="press-tab26" data-toggle="tab" href="#press26" role="tab" aria-controls="press" aria-selected="false">PRESS</a>
                      </li>
                    </ul>
<!-- awal div card -->

<div class="card-header d-flex justify-content-between align-items-center mb-3">
                <h4><?= $card_header;?></h4>
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
                            <th>Provinsi</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                        <?php $no = 1; foreach ($peserta as $p) : ?>
                    <tbody>
                        <tr>
                            <td><?= $no++; ?></td>
                            <td><?= $p['nama']; ?></td>
                            <td><?= $p['nik']; ?></td>
                            <td><?= $p['email']; ?></td>
                            <td>Desa <?= $p['desa']; ?>, Kec. <?= $p['kecamatan']; ?>, <?= $p['kabupaten_kota']; ?></td>
                            <td><?= $p['provinsi']; ?></td>
                            <td>
                                <a href="/peserta/edit/<?= $p['id']; ?>" class="btn btn-sm btn-warning">Edit</a>
                                <a href="/peserta/delete/<?= $p['id']; ?>" class="btn btn-sm btn-danger" onclick="return confirm('Hapus data ini?')">Hapus</a>
                            </td>
                        </tr>
                    </tbody>
                        <?php endforeach; ?>
                </table>




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
                <td><?= $p['nama']; ?></td>
                <td><?= $p['nik']; ?></td>
                <td><?= $p['email']; ?></td>
                <td>Desa <?= $p['desa']; ?>, Kec. <?= $p['kecamatan']; ?>, <?= $p['kabupaten_kota']; ?></td>
                <td>
                    <a href="/peserta/edit/<?= $p['id']; ?>" class="btn btn-sm btn-warning">Edit</a>
                    <a href="/peserta/delete/<?= $p['id'];   ?>" class="btn btn-sm btn-danger" onclick="return confirm('Hapus data ini?')">Hapus</a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
<!-- akhir div card -->
                </div>
              </div>
            </div>
        </div>
    </div>
  </div>
</div>

<?= $this->endSection() ?>

