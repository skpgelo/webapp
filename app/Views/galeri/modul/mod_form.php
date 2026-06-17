<div class="modal fade" id="galeriFormModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">
            <form id="galeriForm" onsubmit="submitGaleri(event)" class="needs-validation" novalidate enctype="multipart/form-data">
                <?= csrf_field() ?>
                <div class="form-group">
                    <div class="d-flex justify-content-between align-items-center mb-1">
                        <label class="font-weight-bold mb-0">Kategori Agenda Tematik (Opsional)</label>
                        <!-- Tombol Pintasan Membuka Modal Tematik -->
                        <button type="button" class="btn btn-xs btn-outline-dark py-0 px-2" style="font-size: 11px;" onclick="bukaModalTematik()">
                            <i class="fas fa-plus fa-xs"></i> Buat Tematik Baru
                        </button>
                    </div>
                    <select name="id_tematik" id="opt-tematik" class="form-control" onchange="toggleHariInput(this.value)">
                        <option value="">-- Tanpa Tematik (Tampil Selamanya / Gambar Reguler) --</option>
                    </select>
                </div>
                <div class="modal-header bg-primary text-white">
                    <h5 class="modal-title"><i class="fas fa-upload mr-2"></i> Pengunggah Galeri Berbasis Waktu</h5>
                    <button class="close text-white" type="button" data-dismiss="modal"><span>×</span></button>
                </div>
                <div class="modal-body p-4">
                    <div class="form-group">
                        <label class="font-weight-bold">Hubungkan ke Berita <span class="text-danger">*</span></label>
                        <select name="id_berita" id="opt-berita" class="form-control" required></select>
                    </div>
                    
                    <div class="form-group">
                        <label class="font-weight-bold">Kategori Agenda Tematik (Opsional)</label>
                        <select name="id_tematik" id="opt-tematik" class="form-control" onchange="toggleHariInput(this.value)">
                            <option value="">-- Tanpa Tematik (Tampil Selamanya / Gambar Reguler) --</option>
                        </select>
                    </div>

                    <!-- Input Nilai HARI (Hanya aktif jika Kategori Tematik dipilih) -->
                    <div class="form-group" id="wrapper-hari" style="display: none;">
                        <label class="font-weight-bold">Rentang Durasi Tampil (N Hari) <span class="text-danger">*</span></label>
                        <div class="input-group">
                            <input type="number" name="hari" id="form-hari" class="form-control" min="0" value="0">
                            <div class="input-group-append">
                                <span class="input-group-text">Hari sebelum & sesudah</span>
                            </div>
                        </div>
                        <small class="text-muted d-block mt-1">Contoh: Jika diisi 5, gambar eksklusif ini akan tayang selama total 10 hari di sekitar tanggal tematik.</small>
                    </div>

                    <div class="form-group">
                        <label class="font-weight-bold">Pilih Dokumen Foto <span class="text-danger">*</span></label>
                        <input type="file" name="images[]" class="form-control-file" accept=".jpg,.jpeg,.png" multiple required>
                        <div class="invalid-feedback">Pilih minimal satu berkas gambar.</div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
                    <button class="btn btn-primary" type="submit">Mulai Upload</button>
                </div>
            </form>
        </div>
    </div>
</div>

