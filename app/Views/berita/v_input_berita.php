<?= $this->extend('layouts/v_stisla') ?>

<?= $this->section('title') ?> Tulis Berita Baru <?= $this->endSection() ?>
<?= $this->section('page_header') ?> Form Input Berita <?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="row">
    <div class="col-12 col-md-10 offset-md-1">
        
        <!-- Jendela Peringatan Validasi Keamanan -->
        <?php if (session()->getFlashdata('errors')): ?>
            <div class="alert alert-danger alert-dismissible show fade">
                <div class="alert-body">
                    <button class="close" data-dismiss="alert"><span>&times;</span></button>
                    <ul>
                    <?php foreach (session()->getFlashdata('errors') as $error): ?>
                        <li><?= esc($error) ?></li>
                    <?php endforeach ?>
                    </ul>
                </div>
            </div>
        <?php endif; ?>

        <?php if (session()->getFlashdata('success')): ?>
            <div class="alert alert-success alert-dismissible show fade">
                <div class="alert-body">
                    <button class="close" data-dismiss="alert"><span>&times;</span></button>
                    <?= session()->getFlashdata('success') ?>
                </div>
            </div>
        <?php endif; ?>

        <div class="card card-primary shadow-sm">
            <div class="card-header"><h4>Kelola Konten Berita Multimedia</h4></div>
            <div class="card-body">
                
                <!-- Mengamankan Form: Proteksi CSRF & Enctype Wajib -->
                <form action="<?= base_url('news/store') ?>" method="POST" enctype="multipart/form-data" class="needs-validation" novalidate>
                    <?= csrf_field() ?>

                    <div class="form-group">
                        <label class="font-weight-bold">Judul Berita</label>
                        <input type="text" name="judul_berita" class="form-control" value="<?= old('judul_berita') ?>" required>
                    </div>

                    <div class="row">
                        <div class="form-group col-md-6">
                            <label class="font-weight-bold">Kategori</label>
                            <select name="id_kategori" class="form-control" required>
                                <option value="">-- Pilih Kategori --</option>
                                <?php foreach ($kategori as $k): ?>
                                    <option value="<?= $k['id'] ?>" <?= old('id_kategori') == $k['id'] ? 'selected' : '' ?>><?= esc($k['kategori']) ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group col-md-6">
                            <label class="font-weight-bold">Penulis (Session Email Aktif)</label>
                            <input type="text" class="form-control" value="<?= session()->get('email') ?? 'Sesi Aktif Tidak Terbaca' ?>" readonly style="background-color:#e9ecef;">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="font-weight-bold">Isi Berita</label>
                        <textarea name="isi_berita" class="form-control" style="height: 180px;" required><?= old('isi_berita') ?></textarea>
                    </div>

                    <div class="row border-top pt-3 mt-3">
                        <div class="form-group col-md-6">
                            <label class="font-weight-bold">Foto Utama (Thumbnail Berita)</label>
                            <input type="file" name="foto_utama" class="form-control-file" accept=".jpg,.jpeg,.png" required>
                            <small class="text-muted d-block mt-1">Hanya file format JPG/PNG dengan kapasitas maksimal 2 MB.</small>
                        </div>
                        <div class="form-group col-md-6">
                            <label class="font-weight-bold">Multi-Images Tambahan (Galeri)</label>
                            <input type="file" name="images[]" class="form-control-file" accept=".jpg,.jpeg,.png" multiple>
                            <small class="text-muted d-block mt-1">Anda bisa memilih lebih dari satu file secara bersamaan.</small>
                        </div>
                    </div>

                    <div class="card-footer text-right px-0 bg-transparent">
                        <button type="reset" class="btn btn-secondary mr-2">Reset</button>
                        <button type="submit" class="btn btn-primary btn-lg shadow">Terbitkan Berita</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>
