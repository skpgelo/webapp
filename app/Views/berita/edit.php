<?= $this->extend('base/skeleton'); ?>

<?= $this->section('content')?>
<div class="card">
    <div class="card-header"><h4>Edit Berita</h4></div>
    <div class="card-body">
        <div id="notifikasi"></div>

        <form id="formEditBerita" enctype="multipart/form-data">
            <?= csrf_field()?>
            <input type="hidden" name="foto_lama" value="<?= $berita['foto']?>">

            <div class="form-group">
                <label>Kategori</label>
                <select name="id_kategori" class="form-control" required>
                    <?php foreach($kategori as $k):?>
                    <option value="<?= $k['id']?>" <?= $berita['id_kategori']==$k['id']?'selected':''?>><?= $k['nama_kategori']?></option>
                    <?php endforeach;?>
                </select>
            </div>

            <div class="form-group">
                <label>Judul Berita</label>
                <input type="text" name="judul_berita" id="judul" value="<?= $berita['judul_berita']?>" class="form-control" required onkeyup="buatSlug()">
            </div>

            <div class="form-group">
                <label>Slug</label>
                <input type="text" name="slug" id="slug" value="<?= $berita['slug']?>" class="form-control" readonly>
            </div>

            <div class="form-group">
                <label>Isi Berita</label>
                <textarea name="isi_berita" class="form-control" rows="8" required><?= $berita['isi_berita']?></textarea>
            </div>

            <div class="form-group">
                <label>Foto Lama</label><br>
                <img src="<?= base_url($berita['foto'])?>" width="150" class="mb-2">
                <input type="file" name="foto" class="form-control-file" accept="image/*">
                <small class="text-muted">Kosongkan jika tidak ganti foto</small>
            </div>

            <button type="submit" class="btn btn-warning" id="btnUpdate">Update</button>
        </form>
    </div>
</div>

<script>
function buatSlug() { /* sama kayak create */ }

document.getElementById('formEditBerita').addEventListener('submit', async function(e){
    e.preventDefault();
    let btn = document.getElementById('btnUpdate');
    btn.innerHTML = 'Mengupdate...'; btn.disabled = true;

    let formData = new FormData(this);
    let response = await fetch('<?= site_url('berita/update/'.$berita['id'])?>', {method: 'POST', body: formData});
    let result = await response.json();

    document.getElementById('notifikasi').innerHTML = `<div class="alert alert-${result.status=='success'?'success':'danger'}">${result.message}</div>`;
    btn.innerHTML = 'Update'; btn.disabled = false;
});
</script>
<?= $this->endSection()?>