<?= $this->extend('base/skeleton'); ?>

<?= $this->section('content') ?>
<div class="main-content">

          <?=$this->include('base/4row')?>
          <?=$this->include('base/4sub_section_header')?>

    <div class="section-body">

    <div class="row justify-content-center">
    <div class="col-md-12">
        <div class="card shadow-lg">
            <!-- <div class="card-header bg-whitesmoke text-dark">
                <h4><i class="fas fa-edit mr-2 text-warning"></i>Ubah Informasi Dokumen</h4>
            </div> -->
              <div class="col-12 col-sm-12 col-lg-12">

<div class="card">
    <div class="card-header d-flex justify-content-between">
        <h4>Data Berita</h4>
        <a href="<?= site_url('berita/create')?>" class="btn btn-primary">+ Tambah Berita</a>
    </div>
    <div class="card-body">
        <?php if(session()->getFlashdata('success')):?>
            <div class="alert alert-success"><?= session()->getFlashdata('success')?></div>
        <?php endif;?>

        <div class="table-responsive">
            <table class="table table-bordered table-striped" id="tabelBerita">
                <thead>
                    <tr>
                        <th width="5%">No</th>
                        <th width="10%">Foto</th>
                        <th>Judul Berita</th>
                        <th>Kategori</th>
                        <th>Kontributor</th>
                        <th>Tanggal</th>
                        <th width="15%">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no=1; foreach($berita as $b):?>
                    <tr>
                        <td><?= $no++?></td>
                        <td>
                            <img src="<?= base_url($b['foto'])?>" width="80" class="img-thumbnail" alt="<?= $b['nama_foto']?>">
                        </td>
                        <td>
                            <strong><?= esc($b['judul_berita'])?></strong><br>
                            <small class="text-muted"><?= $b['slug']?></small>
                        </td>
                        <td><?= $b['nama_kategori']?></td>
                        <td><?= esc($b['kontributor'])?></td>
                        <td><?= date('d-m-Y H:i', strtotime($b['created_at']))?></td>
                        <td>
                            <a href="<?= site_url('berita/edit/'.$b['id'])?>" class="btn btn-sm btn-warning">Edit</a>
                            <a href="<?= site_url('berita/delete/'.$b['id'])?>" class="btn btn-sm btn-danger" onclick="return confirm('Yakin hapus data ini?')">Hapus</a>
                        </td>
                    </tr>
                    <?php endforeach;?>
                </tbody>
            </table>
        </div>
    </div>
</div>
        </div>
    </div>
</div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>

<?= $this->section('script') ?>
<!-- Tambah DataTables biar bisa search & pagination -->
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">
<script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>
<script>
$(document).ready(function() {
    $('#tabelBerita').DataTable({
        "order": [[ 5, "desc" ]] // urut berdasarkan kolom Tanggal desc
    });
});
</script>

<script>
        // Inisialisasi CKEditor pada element ID "editor"
        ClassicEditor
            .create(document.querySelector('#editor'))
            .catch(error => {
                console.error(error);
            });
    </script>
<?= $this->endSection() ?>
