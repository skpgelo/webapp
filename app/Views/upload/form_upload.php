<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Sistem Arsip Terpisah + CKEditor</title>
    <!-- 1. LOAD CDN CKEDITOR 5 -->
    <script src="https://ckeditor.com"></script>
    <style>
        body { font-family: sans-serif; margin: 30px; background-color: #f9f9f9; }
        .row { display: flex; gap: 30px; }
        .col { flex: 1; background: white; padding: 20px; border-radius: 8px; box-shadow: 0 2px 5px rgba(0,0,0,0.05); }
        .form-group { margin-bottom: 12px; }
        label { font-weight: bold; font-size: 14px; }
        input[type="text"], input[type="file"] { width: 100%; padding: 8px; margin-top: 5px; box-sizing: border-box; }
        button { background: #007bff; color: white; border: none; padding: 10px 15px; border-radius: 4px; cursor: pointer; font-weight: bold; margin-top: 10px;}
        table { width: 100%; border-collapse: collapse; margin-top: 15px; font-size: 13px; }
        th, td { border: 1px solid #ddd; padding: 8px; text-align: left; }
        th { background-color: #f4f4f4; }
        img { max-width: 70px; height: auto; border-radius: 4px; }
        /* Styling tambahan agar tampilan CKEditor rapi */
        .ck-editor__editable { min-height: 120px; } 
    </style>
</head>
<body>

    <h1 style="text-align: center; margin-bottom: 30px;">Manajemen Berkas & CKEditor</h1>

    <div class="row">
        <!-- FORM FOTO -->
        <div class="col">
            <h2>📷 Form Upload Foto HP</h2>
            <!-- [Notifikasi Error/Sukses tetap sama seperti kode sebelumnya] -->
            
            <form action="<?= base_url('upload/proses-foto') ?>" method="POST" enctype="multipart/form-data">
                <?= csrf_field() ?>
                <div class="form-group"><label>Judul Gambar:</label><input type="text" name="judul_image" required></div>
                <div class="form-group"><label>Tema Gambar:</label><input type="text" name="tema_image" required></div>
                
                <!-- Input Textarea Baru untuk CKEditor Foto -->
                <div class="form-group">
                    <label>Deskripsi Foto:</label>
                    <textarea name="deskripsi_foto" id="editor_foto"><?= old('deskripsi_foto') ?></textarea>
                </div>
                
                <div class="form-group"><label>Pilih File Foto (Maks 15MB):</label><input type="file" name="foto_hp" accept="image/*" required></div>
                <button type="submit">Simpan Foto</button>
            </form>

            <!-- Tabel Tampil Foto -->
            <table>
                <thead><tr><th>Pratinjau</th><th>Info Detail</th><th>Aksi</th></tr></thead>
                    <?php if(!empty($list_foto)): foreach($list_foto as $f): ?>
                    <tr>
                        <td>
                            <!-- 1. PERBAIKAN: Memecah string foto yang digabungkan oleh GROUP_CONCAT -->
                            <div style="display: grid; grid-template-columns: repeat(3, 1fr); gap: 4px;">
                                <?php 
                                if(!empty($f->banyak_foto)) {
                                    // Mengubah string "foto1.jpg,foto2.jpg" menjadi array
                                    $arr_foto = explode(',', $f->banyak_foto);
                                    foreach($arr_foto as $img) {
                                        echo '<img src="'.base_url('uploads/'.$img).'" style="width:100%; max-width:60px; height:auto; object-fit:cover; border-radius:4px;">';
                                    }
                                } else {
                                    echo '<span style="color:#999; font-size:12px;">Tidak ada foto</span>';
                                }
                                ?>
                            </div>
                        </td>
                        <td>
                            <strong>Judul:</strong> <?= esc($f->judul_image) ?><br>
                            <strong>Tema:</strong> <?= esc($f->tema_image) ?><br>
                            <!-- 2. PERBAIKAN: Menambahkan tag pembuka PHP echo (<=) yang kurang di baris 60 -->
                            <strong>Deskripsi:</strong> <div>deskripsi_foto) ?></div>
                        </td>
                        <td>
                            <!-- Tombol Hapus Hak Akses RBAC -->
                            <!-- <php if (auth()->user()->inGroup('admin', 'superadmin')) : ?>
                                <a href="<= base_url('upload/hapus-foto/'.$f->id) ?>" style="color:red; font-weight:bold; text-decoration:none;" onclick="return confirm('Hapus seluruh album foto ini?')">Hapus</a>
                            <php else : ?>
                                <span style="color: #bbb; font-size: 12px;">Tidak ada akses</span>
                            <php endif; ?> -->
                        </td>
                    </tr>
                    <?php endforeach; else: ?>
                    <tr><td colspan="3" style="text-align:center; color:#999;">Belum ada album foto yang diunggah.</td></tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>

        <!-- FORM PDF -->
        <div class="col">
            <h2>📄 Form Upload Dokumen PDF</h2>
            <!-- [Notifikasi Error/Sukses tetap sama seperti kode sebelumnya] -->

            <form action="<?= base_url('upload/proses-foto') ?>" method="POST" enctype="multipart/form-data">
                <?= csrf_field() ?>
                <div class="form-group"><label>Judul Gambar:</label><input type="text" name="judul_image" required></div>
                <div class="form-group"><label>Tema Gambar:</label><input type="text" name="tema_image" required></div>
                
                <div class="form-group">
                    <label>Deskripsi Foto:</label>
                    <textarea name="deskripsi_foto" id="editor_foto"><?= old('deskripsi_foto') ?></textarea>
                </div>
                
                <!-- TAMBAHKAN ATTRIBUT multiple DAN TANDA [] PADA NAME -->
                <div class="form-group">
                    <label>Pilih Banyak File Foto Sekaligus (Maks 15MB/file):</label>
                    <input type="file" name="foto_hp[]" accept="image/*" multiple required>
                </div>
                <button type="submit">Simpan Foto</button>
            </form>

            <h3>Daftar Album Foto Terunggah</h3>
            <table>
                <thead><tr><th>Kumpulan Foto</th><th>Info Detail</th><th>Aksi</th></tr></thead>
                <tbody>
                    <?php if(!empty($list_foto)): foreach($list_foto as $f): ?>
                    <tr>
                        <td>
                            <!-- Looping untuk memecah string foto yang digabungkan GROUP_CONCAT -->
                            <div style="display: grid; grid-template-columns: repeat(3, 1fr); gap: 4px;">
                                <?php 
                                if(!empty($f->banyak_foto)) {
                                    $arr_foto = explode(',', $f->banyak_foto);
                                    foreach($arr_foto as $img) {
                                        echo '<img src="'.base_url('uploads/'.$img).'" style="width:100%; max-width:60px; height:auto; object-fit:cover;">';
                                    }
                                }
                                ?>
                            </div>
                        </td>
                        <td>
                            <strong>Judul:</strong> <?= esc($f->judul_image) ?><br>
                            <strong>Tema:</strong> <?= esc($f->tema_image) ?><br>
                            <strong>Deskripsi:</strong> <div>deskripsi_foto) ?></div>
                        </td>
                        <td><a href="<?= base_url('upload/hapus-foto/'.$f->id) ?>" style="color:red;" onclick="return confirm('Hapus seluruh album foto ini?')">Hapus</a></td>
                    </tr>
                    <?php endforeach; else: ?><tr><td colspan="3" style="text-align:center;">Kosong</td></tr><?php endif; ?>
                </tbody>
            </table>

            <!-- Tabel Tampil PDF -->
            <table>
                <thead><tr><th>Berkas</th><th>Info Detail</th><th>Aksi</th></tr></thead>
                <tbody>
                    <?php if(!empty($list_pdf)): foreach($list_pdf as $p): ?>
                    <tr>
                        <td style="text-align:center; font-size:24px;">📕</td>
                        <td>
                            <strong>Judul:</strong> <?= esc($p->judul_pdf) ?><br>
                            <strong>Tema:</strong> <?= esc($p->tema_pdf) ?><br>
                            <!-- Render HTML CKEditor -->
                            <strong>Deskripsi:</strong> <div>deskripsi_pdf) ?></div>
                            <a href="<?= base_url('uploads/'.$p->nama_pdf) ?>" target="_blank">Buka Dokumen</a>
                        </td>
                        <td><a href="<?= base_url('upload/hapus-pdf/'.$p->id) ?>" style="color:red;" onclick="return confirm('Hapus?')">Hapus</a></td>
                    </tr>
                    <?php endforeach; else: ?><tr><td colspan="3" style="text-align:center;">Kosong</td></tr><?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>

    <!-- 2. INISIALISASI CKEDITOR VIA JAVASCRIPT DI AKHIR HALAMAN -->
    <script>
        ClassicEditor.create(document.querySelector('#editor_foto')).catch(error => { console.error(error); });
        ClassicEditor.create(document.querySelector('#editor_pdf')).catch(error => { console.error(error); });
    </script>
    <script>
        // Konfigurasi toolbar yang dibatasi (Hanya fitur esensial & aman)
        const customToolbarConfig = {
            toolbar: [ 
                'bold', 
                'italic', 
                '|', 
                'bulletedList', 
                'numberedList', 
                '|', 
                'undo', 
                'redo' 
            ]
        };

        // Terapkan konfigurasi ke Editor Foto
        ClassicEditor
            .create(document.querySelector('#editor_foto'), customToolbarConfig)
            .catch(error => {
                console.error(error);
            });

        // Terapkan konfigurasi ke Editor PDF
        ClassicEditor
            .create(document.querySelector('#editor_pdf'), customToolbarConfig)
            .catch(error => {
                console.error(error);
            });
    </script>
</body>
</html>