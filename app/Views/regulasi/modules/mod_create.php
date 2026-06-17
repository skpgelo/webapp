<?= $this->extend('layouts/stisla') ?>

<?= $this->section('content') ?>
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card shadow-sm">
            <div class="card-header bg-whitesmoke text-dark">
                <h4><i class="fas fa-file-upload mr-2 text-primary"></i>Upload Dokumen PDF Baru</h4>
            </div>
            <div class="card-body">
                
                <!-- Menangkap Validasi Error Global (Jika Ada) -->
                <?php $validation = \Config\Services::validation(); ?>

                <form action="<?= base_url('pdf/store') ?>" method="POST" enctype="multipart/form-data">
                    <?= csrf_field() ?>

                    <div class="form-group">
                        <label for="kelompok">Kelompok Dokumen</label>
                        <select name="kelompok" id="kelompok" class="form-control <?= ($validation->hasError('kelompok')) ? 'is-invalid' : '' ?>">
                            <option value="">-- Pilih Kelompok --</option>
                            <option value="Akademik" <?= old('kelompok') == 'Akademik' ? 'selected' : '' ?>>Akademik</option>
                            <option value="Keuangan" <?= old('kelompok') == 'Keuangan' ? 'selected' : '' ?>>Keuangan</option>
                            <option value="SDM" <?= old('kelompok') == 'SDM' ? 'selected' : '' ?>>SDM</option>
                        </select>
                        <div class="invalid-feedback"><?= $validation->getError('kelompok') ?></div>
                    </div>

                    <div class="form-group">
                        <label for="tahun">Tahun Dokumen</label>
                        <input type="number" name="tahun" id="tahun" class="form-control <?= ($validation->hasError('tahun')) ? 'is-invalid' : '' ?>" placeholder="Contoh: 2026" value="<?= old('tahun') ?>">
                        <div class="invalid-feedback"><?= $validation->getError('tahun') ?></div>
                    </div>

                    <div class="form-group">
                        <label for="ket">Keterangan / Deskripsi Berkas</label>
                        <textarea name="ket" id="ket" rows="3" class="form-control <?= ($validation->hasError('ket')) ? 'is-invalid' : '' ?>" placeholder="Tulis deskripsi singkat mengenai isi dokumen..."><?= old('ket') ?></textarea>
                        <div class="invalid-feedback"><?= $validation->getError('ket') ?></div>
                    </div>

                    <div class="form-group">
                        <label for="file_pdf">Pilih File PDF</label>
                        <!-- Atribut accept=".pdf" memfilter pilihan file hanya pdf pada file manager user -->
                        <input type="file" name="file_pdf" id="file_pdf" class="form-control-file <?= ($validation->hasError('file_pdf')) ? 'is-invalid' : '' ?>" accept=".pdf">
                        <small class="form-text text-muted">Format wajib .pdf dengan ukuran maksimal 5MB.</small>
                        <div class="invalid-feedback d-block"><?= $validation->getError('file_pdf') ?></div>
                    </div>

                    <div class="form-group mb-0 text-right">
                        <a href="<?= base_url('pdf') ?>" class="btn btn-secondary mr-2">Kembali</a>
                        <button type="submit" class="btn btn-primary"><i class="fas fa-save mr-1"></i> Simpan Dokumen</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>
