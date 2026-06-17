<div class="modal fade" id="modalTambahPegawai" tabindex="-1" aria-labelledby="modalTambahPegawaiLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            
            <div class="modal-header bg-light">
                <h5 class="modal-title fw-bold text-dark" id="modalTambahPegawaiLabel">Tambah Pegawai Baru</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            
            <form action="/pegawai/store" method="post" enctype="multipart/form-data">
                <?= csrf_field() ?>
                
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label fw-semibold text-secondary">NIP</label>
                        <input type="text" name="nip" class="form-control" placeholder="Masukkan NIP" required>
                    </div>
                    
                    <div class="mb-3">
                        <label class="form-label fw-semibold text-secondary">Nama Lengkap</label>
                        <input type="text" name="nama" class="form-control" placeholder="Nama tanpa gelar" required>
                    </div>
                    
                    <div class="mb-3">
                        <label class="form-label fw-semibold text-secondary">Email Perusahaan</label>
                        <input type="email" name="email" class="form-control" placeholder="contoh@perusahaan.com" required>
                    </div>
                    
                    <div class="mb-3">
                        <label class="form-label fw-semibold text-secondary">Jabatan</label>
                        <input type="text" name="jabatan" class="form-control" placeholder="Contoh: IT Support" required>
                    </div>
                    
                    <div class="mb-2">
                        <label class="form-label fw-semibold text-secondary">Foto Pegawai</label>
                        <input type="file" name="foto" class="form-control" accept="image/*">
                        <div class="form-text">Format JPG/PNG, Maksimal 2MB.</div>
                    </div>
                </div>
                
                <div class="modal-footer bg-light">
                    <button type="button" class="btn btn-secondary px-3 py-2 fw-semibold" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary px-4 py-2 fw-semibold shadow-sm">Simpan Data</button>
                </div>

            </form>
        </div>
    </div>
</div>