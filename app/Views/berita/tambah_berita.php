<?= $this->extend('base/skeleton'); ?>

<?= $this->section('styles') ?>
    <style>
        .form-group { margin-bottom: 15px; }
        label { display: block; font-weight: bold; margin-bottom: 5px; }
        input[type="text"], textarea { width: 100%; padding: 8px; }
        .btn { padding: 10px 15px; background: blue; color: white; border: none; cursor: pointer; }
    </style>
<?= $this->endSection() ?>

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
                <!-- <a href="/berita/tambah" class="btn btn-primary">Tambah Berita</a> -->
              </div>


    <!-- <h2>Buat Berita Baru</h2> -->

    <?php if (session()->getFlashdata('error')) : ?>
        <p style="color: red;"><?= session()->getFlashdata('error') ?></p>
    <?php endif; ?>
<div class="col-12 col-md-6 col-lg-6">
    <form action="/berita/simpan" method="post" enctype="multipart/form-data">
        <?= csrf_field() ?>

                    <div class="form-group">
                      <label>Judul Berita</label>
                      <input type="text" class="form-control" name="judul" value="<?= old('judul') ?>" required>
                    </div>

                    <div class="form-group">
                      <label>Isi Berita</label>
                      <textarea class="form-control" name="isi_berita" id="editor"  required><?= old('isi_berita') ?></textarea>
                    </div>

                    <div class="form-group">
                      <label>Cover Gambar (Satu Gambar Utama)</label>
                      <input type="file" class="form-control" name="cover_image" accept="image/*" required>
                    </div>

                    <div class="form-group">
                      <label>Cover Gambar (Satu Gambar Utama)</label>
                      <input type="file" class="form-control" name="galeri_images[]" accept="image/*" multiple required>
                    </div>

        <button type="submit" class="btn btn-primary">Terbitkan Berita</button>
    </form>
</div>

<!-- akhir div card -->
                </div>
              </div>
            </div>
        </div>
    </div>
  </div>
</div>
<?= $this->endSection() ?>

<?= $this->section('script') ?>
    <script>
        // Inisialisasi CKEditor pada element ID "editor"
        ClassicEditor
            .create(document.querySelector('#editor'))
            .catch(error => {
                console.error(error);
            });
    </script>
<?= $this->endSection() ?>