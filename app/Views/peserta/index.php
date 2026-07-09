<?= $this->extend('base/skeleton'); ?>

<?= $this->section('content') ?>
<div class="main-content">
  <?=$this->include('base/4row')?>
  <?=$this->include('base/4sub_section_header')?>
  <div class="section-body">
    <div class="row justify-content-center">
      <div class="col-md-12">
        <div class="card shadow-lg">
          <div class="col-12 col-sm-12 col-lg-12">
            <div class="card">
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

<!-- akhir div card -->
                </div>
              </div>
            </div>
        </div>
    </div>
  </div>
</div>
<?= $this->endSection() ?>
