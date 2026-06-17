<?= $this->extend('layouts/stisla') ?>

<?= $this->section('content') ?>
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card shadow-sm">
            <div class="card-header bg-whitesmoke text-dark">
                <h4><i class="fas fa-edit mr-2 text-warning"></i>Ubah Informasi Dokumen</h4>
            </div>
            <div class="card-body">
                
                <?php $validation = \Config\Services::validation(); ?>

                <form action="<?= base_url('pdf/update/' . $pdf['id']) ?>" method="POST" enctype="multipart/form-data">
                    <?= csrf_field() ?>

                    <div class="form-group">
                        <label for="kelompok">Kelompok Dokumen</label>
                        <select name="kelompok" id="kelompok" class="form-control <?= ($validation->hasError('kelompok')) ? 'is-invalid' : '' ?>">
                            <option value="Akademik" <?= (old('kelompok', $pdf['kelompok']) == 'Akademik') ? 'selected' : '' ?>>Akademik</option>
                            <option value="Keuangan" <?= (old('kelompok', $pdf['kelompok']) == 'Keuangan') ? 'selected' : '' ?>>Keuangan</option>
                            <option value="SDM" <?= (old('kelompok', $pdf['kelompok']) == 'SDM') ? 'selected' : '' ?>>SDM</option>
                        </select>
                        <div class="invalid-feedback"><?= $validation->getError('kelompok') ?></div>
                    </div>

                    <div class="form-group">
                        <label for="tahun">Tahun Dokumen</label>
                        <input type="number" name="tahun" id="tahun" class="form-control <?= ($validation->hasError('tahun')) ? 'is-invalid' : '' ?>" value="<?= old('tahun', $pdf['tahun']) ?>">
                        <div class="invalid-feedback"><?= $validation->getError('tahun') ?></div>
                    </div>

                    <div class="form-group">
                        <label for="ket">Keterangan / Deskripsi Berkas</label>
                        <textarea name="ket" id="ket" rows="3" class="form-control <?= ($validation->hasError('ket')) ? 'is-invalid' : '' ?>"><?= old('ket', $pdf['ket']) ?></textarea>
                        <div class="invalid-feedback"><?= $validation->getError('ket') ?></div>
                    </div>

                    <div class="form-group">
                        <label for="file_pdf">Ganti Berkas PDF (Opsional)</label>
                        <input type="file" name="file_pdf" id="file_pdf" class="form-control-file" accept=".pdf">
                        <small class="form-text text-muted text-warning">Biarkan kosong jika tidak ingin mengubah file PDF yang sudah ada di server.</small>
                        <div class="invalid-feedback d-block"><?= $validation->getError('file_pdf') ?></div>
                    </div>

                    <div class="form-group mb-0 text-right">
                        <a href="<?= base_url('pdf') ?>" class="btn btn-secondary mr-2">Batal</a>
                        <button type="submit" class="btn btn-warning"><i class="fas fa-save mr-1"></i> Perbarui Data</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>
