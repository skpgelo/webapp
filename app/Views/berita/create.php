<!-- file html created -->

<?= $this->extend('layout/template')?>

<?= $this->section('content')?>
<div class="card">
    <div class="card-header"><h4>Tambah Berita</h4></div>
    <div class="card-body">
        <form action="<?= site_url('berita/store')?>" method="post" enctype="multipart/form-data">
            <?= csrf_field()?>

            <div class="form-group">
                <label>Kategori</label>
                <select name="id_kategori" class="form-control" required>
                    <option value="">-- Pilih Kategori --</option>
                    <?php foreach($kategori as $k):?>
                    <option value="<?= $k['id']?>"><?= $k['nama_kategori']?></option>
                    <?php endforeach;?>
                </select>
            </div>

            <div class="form-group">
                <label>Tematik</label>
                <select name="id_tematik" class="form-control">
                    <option value="">-- Tidak Ada --</option>
                    <?php foreach($tematik as $t):?>
                    <option value="<?= $t['id']?>"><?= $t['tematik']?></option>
                    <?php endforeach;?>
                </select>
            </div>

            <div class="form-group">
                <label>Judul Berita</label>
                <input type="text" name="judul_berita" id="judul" class="form-control" required onkeyup="buatSlug()">
            </div>

            <div class="form-group">
                <label>Slug</label>
                <input type="text" name="slug" id="slug" class="form-control" readonly>
            </div>

            <div class="form-group">
                <label>Isi Berita</label>
                <textarea name="isi_berita" class="form-control" rows="8" required></textarea>
            </div>

            <div class="form-group">
                <label>Kontributor</label>
                <input type="text" name="kontributor" class="form-control" value="<?= user()->username?? 'Admin'?>">
            </div>

            <div class="form-group">
                <label>Foto</label>
                <input type="file" name="foto" class="form-control-file" accept="image/*" required>
            </div>

            <button type="submit" class="btn btn-primary">Simpan</button>
            <a href="<?= site_url('berita')?>" class="btn btn-secondary">Batal</a>
        </form>
    </div>
</div>

<script>
function buatSlug() {
    let judul = document.getElementById('judul').value;
    let slug = judul.toLowerCase().replace(/[^a-z0-9]+/g, '-').replace(/(^-|-$)/g, '');
    document.getElementById('slug').value = slug;
}
</script>
<?= $this->endSection()?>