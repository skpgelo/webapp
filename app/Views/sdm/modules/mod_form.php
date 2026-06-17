<!-- Mengakomodasi modul CREATE (Tambah) dan UPDATE (Edit) -->
<div class="modal fade" id="formModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <form id="karyawanForm" onsubmit="saveData(event)" class="needs-validation" novalidate enctype="multipart/form-data">
                <div class="modal-header bg-primary text-white">
                    <h5 class="modal-title" id="modalTitle">Form Karyawan</h5>
                    <button class="close text-white" type="button" data-dismiss="modal"><span>×</span></button>
                </div>
                <div class="modal-body p-4">
                    <input type="hidden" name="id" id="form-id">
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label class="font-weight-bold">Nama Lengkap <span class="text-danger">*</span></label>
                            <input type="text" name="nama" id="form-nama" class="form-control" required>
                            <div class="invalid-feedback">Silakan isi nama lengkap karyawan.</div>
                        </div>
                        <div class="form-group col-md-6">
                            <label class="font-weight-bold">Nomor ID Card <span class="text-danger">*</span></label>
                            <input type="text" name="id_card" id="form-id_card" class="form-control" required>
                            <div class="invalid-feedback">Nomor ID Card wajib diisi.</div>
                        </div>
                        <div class="form-group col-md-6">
                            <label class="font-weight-bold">Jabatan <span class="text-danger">*</span></label>
                            <input type="text" name="jabatan" id="form-jabatan" class="form-control" required>
                            <div class="invalid-feedback">Jabatan wajib ditentukan.</div>
                        </div>
                        <div class="form-group col-md-6">
                            <label class="font-weight-bold">Atasan (Silsilah Organisasi)</label>
                            <select name="parent_id" id="form-parent_id" class="form-control"></select>
                        </div>
                        <div class="form-group col-md-6">
                            <label class="font-weight-bold">Tempat Lahir</label>
                            <input type="text" name="tmp_lahir" id="form-tmp_lahir" class="form-control">
                        </div>
                        <div class="form-group col-md-6">
                            <label class="font-weight-bold">Tanggal Lahir</label>
                            <input type="date" name="tgl_lahir" id="form-tgl_lahir" class="form-control">
                        </div>
                        <div class="form-group col-md-6">
                            <label class="font-weight-bold">Email</label>
                            <input type="email" name="emai" id="form-emai" class="form-control">
                            <div class="invalid-feedback">Masukkan format email yang valid.</div>
                        </div>
                        <div class="form-group col-md-6">
                            <label class="font-weight-bold">Jenis Kelamin <span class="text-danger">*</span></label>
                            <select name="gender" id="form-gender" class="form-control" required>
                                <option value="L">Laki-laki</option>
                                <option value="P">Perempuan</option>
                            </select>
                        </div>
                        <div class="form-group col-12">
                            <label class="font-weight-bold">Alamat Rumah</label>
                            <textarea name="alamat" id="form-alamat" class="form-control" rows="2"></textarea>
                        </div>
                        <div class="form-group col-12">
                            <label class="font-weight-bold">Upload Foto Profil</label>
                            <input type="file" name="foto" class="form-control-file">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
                    <button class="btn btn-primary" type="submit">Simpan Data</button>
                </div>
            </form>
        </div>
    </div>
</div>
