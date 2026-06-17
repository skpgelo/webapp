<!-- MODAL FORM INPUT KHUSUS TABEL TEMATIK -->
<div class="modal fade" id="tematikFormModal" tabindex="-1" role="dialog" aria-hidden="true" style="z-index: 1060;">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form id="tematikForm" onsubmit="submitTematik(event)" class="needs-validation" novalidate>
                <?= csrf_field() ?>
                <div class="modal-header bg-dark text-white">
                    <h5 class="modal-title"><i class="fas fa-calendar-plus mr-2"></i> Tambah Agenda Tematik Baru</h5>
                    <button class="close text-white" type="button" data-dismiss="modal"><span>×</span></button>
                </div>
                <div class="modal-body p-4">
                    <div class="form-group">
                        <label class="font-weight-bold">Judul Agenda Tematik <span class="text-danger">*</span></label>
                        <input type="text" name="judul_tematik" class="form-control" placeholder="Contoh: HUT RI ke-81" required>
                        <div class="invalid-feedback">Isi judul agenda tematik (minimal 3 karakter).</div>
                    </div>
                    
                    <div class="form-group">
                        <label class="font-weight-bold">Tanggal Utama Acara <span class="text-danger">*</span></label>
                        <input type="date" name="tgl_tematik" class="form-control" required>
                        <div class="invalid-feedback">Pilih tanggal valid dilangsungkannya acara.</div>
                    </div>

                    <div class="form-group">
                        <label class="font-weight-bold">Keterangan / Deskripsi Singkat</label>
                        <textarea name="ket" class="form-control" rows="3" placeholder="Tulis catatan opsional di sini..."></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
                    <button class="btn btn-dark" type="submit">Simpan Agenda</button>
                </div>
            </form>
        </div>
    </div>
</div>
