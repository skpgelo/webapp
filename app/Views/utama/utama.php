<?= $this->extend('layout/app')?>
<?= $this->section('content')?>
<section class="section">
  <div class="card">
    <div class="card-header"><h4>Data Pegawai</h4><button class="btn btn-primary" id="btn-tambah">+ Tambah</button></div>
    <div class="card-body">
      <table id="table" class="table table-striped" width="100%">
        <thead><tr><th>No</th><th>Nama/NIP</th><th>Jabatan</th><th>Alamat</th><th>File</th><th>Aksi</th></tr></thead>
      </table>
    </div>
  </div>
</section>

<!-- Modal Form -->
<div class="modal fade" id="modal-form"><div class="modal-dialog modal-xl"><div class="modal-content">
<form id="form-data" enctype="multipart/form-data">
<input type="hidden" name="id" id="id">
  <div class="modal-header"><h5 class="modal-title">Form Pegawai</h5></div>
  <div class="modal-body row">
    <div class="col-md-4 form-group"><label>Nama</label><input name="nama" id="nama" class="form-control" required></div>
    <div class="col-md-4 form-group"><label>Jabatan</label><input name="jabatan" id="jabatan" class="form-control" required></div>
    <div class="col-md-4 form-group"><label>NIP</label><input name="nip" id="nip" class="form-control" required></div>

    <div class="col-md-4 form-group"><label>Gender</label><select name="foreigngender_id" id="gender" class="form-control select2" required></select></div>
    <div class="col-md-4 form-group"><label>Status</label><select name="foreignnikah_id" id="nikah" class="form-control select2" required></select></div>
    <div class="col-md-4 form-group"><label>Kategori Utama</label><select name="foreignkategori_id" id="kategori" class="form-control select2" required></select></div>

    <div class="col-md-6"><label>Lat</label><input name="latitude" id="lat" class="form-control" readonly></div>
    <div class="col-md-6"><label>Lng</label><input name="longitude" id="lng" class="form-control" readonly></div>
    <div class="col-12 mb-2"><button type="button" id="btn-geo" class="btn btn-info btn-sm">Ambil Lokasi GPS</button></div>

    <div class="col-md-3"><input name="provinsi" placeholder="Provinsi" class="form-control" readonly></div>
    <div class="col-md-3"><input name="kabupaten" placeholder="Kabupaten" class="form-control" readonly></div>
    <div class="col-md-3"><input name="kecamatan" placeholder="Kecamatan" class="form-control" readonly></div>
    <div class="col-md-3"><input name="desa" placeholder="Desa" class="form-control" readonly></div>
    <div class="col-12 form-group"><textarea name="alamat" placeholder="Alamat" class="form-control" readonly></textarea></div>

    <div class="col-md-6 form-group"><label>PDF</label><input type="file" name="pdf" class="form-control"><div id="pdf-lama"></div></div>
    <div class="col-md-6 form-group"><label>Image Utama</label><input type="file" name="image" class="form-control"><div id="img-lama"></div></div>

    <hr class="col-12"><div class="col-12">
      <h6>Multi Images <button type="button" id="add-multi" class="btn btn-success btn-sm">+ Tambah</button></h6>
      <div id="multi-box"></div>
      <div id="multi-lama" class="row"></div> <!-- untuk data edit -->
    </div>
  </div>
  <div class="modal-footer"><button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button><button class="btn btn-primary">Simpan</button></div>
</form>
</div></div></div>

<template id="tpl-multi">
  <div class="row multi-item border p-2 mb-2">
    <div class="col-md-3"><input type="file" name="multi_images[]" class="form-control" required></div>
    <div class="col-md-2"><select name="multi_kategori_id[]" class="form-control multi-kat" required></select></div>
    <div class="col-md-3"><input type="text" name="judul_images[]" class="form-control" placeholder="Judul" required></div>
    <div class="col-md-3"><input type="date" name="tgl_images[]" class="form-control" required></div>
    <div class="col-md-1"><button type="button" class="btn btn-danger btn-remove">x</button></div>
  </div>
</template>

<!-- Modal Detail -->
<div class="modal fade" id="modal-detail"><div class="modal-dialog modal-lg"><div class="modal-content"><div class="modal-body" id="detail-body"></div></div></div></div>
<?= $this->endSection()?>

<?= $this->section('script')?>
<script>
$('#table').DataTable({
    processing: true,
    serverSide: true, // 1. WAJIB TRUE
    ajax: {
        url: "<?= site_url('utama/list')?>",
        type: "POST", // 2. WAJIB POST
        data: function (d) {
            d.<?= csrf_token()?> = '<?= csrf_hash()?>'
        }
    },
    columns: [ { data: 0 }, { data: 1 }, { data: 2 }, { data: 3 }, { data: 4 }, { data: 5 } ]
});

  $.get("<?=site_url('utama/options')?>",res=>{
    kategoriOpt = res.kategori.map(v=>`<option value="${v.id}">${v.kategori}</option>`).join('');
    $('#gender').html(res.gender.map(v=>`<option value="${v.id}">${v.gender}</option>`));
    $('#nikah').html(res.nikah.map(v=>`<option value="${v.id}">${v.nikah}</option>`));
    $('#kategori').html(kategoriOpt);
    $('.select2').select2({dropdownParent:$('#modal-form')});
  });

  $('#btn-tambah').click(()=>{ $('#form-data')[0].reset(); $('#id').val(''); $('#multi-box,#multi-lama,#pdf-lama,#img-lama').html(''); $('#modal-form').modal('show'); });
  $('#add-multi').click(()=>{ $('#multi-box').append($('#tpl-multi').html()); $('#multi-box.multi-item:last.multi-kat').html(kategoriOpt); });
  $('#multi-box').on('click','.btn-remove',function(){$(this).closest('.multi-item').remove();});

  $('#btn-geo').click(()=>{ navigator.geolocation.getCurrentPosition(p=>{ $('#lat').val(p.coords.latitude); $('#lng').val(p.coords.longitude);
    fetch(`https://nominatim.openstreetmap.org/reverse?format=json&lat=${p.coords.latitude}&lon=${p.coords.longitude}`).then(r=>r.json()).then(d=>{
      $('[name=alamat]').val(d.display_name); $('[name=desa]').val(d.address.village||''); $('[name=kecamatan]').val(d.address.county||'');
      $('[name=kabupaten]').val(d.address.city||d.address.regency||''); $('[name=provinsi]').val(d.address.state||'');
    });
  }); });

  $('#form-data').submit(function(e){ e.preventDefault();
    let fd = new FormData(this); fd.append('<?=csrf_token()?>','<?=csrf_hash()?>');
    $.ajax({url:"<?=site_url('utama/save')?>",type:"POST",data:fd,processData:false,contentType:false,
      success:()=>{ $('#modal-form').modal('hide'); table.ajax.reload(null,false); Swal.fire('Sukses','Tersimpan','success'); }
    });
  });

  $('#table').on('click','.btn-edit',function(){
    let id=$(this).data('id');
    $.get("<?=site_url('utama/get/')?>"+id,res=>{
      let u=res.utama;
      $('#id').val(u.id); $('#nama').val(u.nama); $('#jabatan').val(u.jabatan); $('#nip').val(u.nip);
      $('#lat').val(u.latitude); $('#lng').val(u.longitude); $('#alamat').val(u.alamat);
      $('[name=desa]').val(u.desa); $('[name=kecamatan]').val(u.kecamatan); $('[name=kabupaten]').val(u.kabupaten); $('[name=provinsi]').val(u.provinsi);
      $('#gender').val(u.foreigngender_id).trigger('change'); $('#nikah').val(u.foreignnikah_id).trigger('change'); $('#kategori').val(u.foreignkategori_id).trigger('change');
      $('#pdf-lama').html(u.lokasi_pdf?`<a href="<?=base_url('uploads/')?>${u.lokasi_pdf}" target="_blank">Lihat PDF Lama</a>`:'');
      $('#img-lama').html(u.image?`<img src="<?=base_url('uploads/')?>${u.image}" width="80">`:'');

      $('#multi-box,#multi-lama').html('');
      res.multi.forEach(m=>{
        $('#multi-lama').append(`<div class="col-md-3 text-center mb-2">
          <img src="<?=base_url('uploads/')?>${m.multi_images}" width="80" class="img-thumbnail">
          <p class="small">${m.judul_images}<br>${m.tgl_images}</p>
          <button type="button" class="btn btn-sm btn-danger btn-del-multi" data-id="${m.id}">Hapus</button>
        </div>`);
      });
      $('#modal-form').modal('show');
    });
  });

  $('#table').on('click','.btn-delete',function(){
    let id=$(this).data('id');
    Swal.fire({title:'Yakin hapus?',showCancelButton:true}).then(r=>{ if(r.isConfirmed){
      $.post("<?=site_url('utama/delete/')?>"+id,{'<?=csrf_token()?>':'<?=csrf_hash()?>'},()=>{table.ajax.reload(null,false);});
    }});
  });

  $('#multi-lama').on('click','.btn-del-multi',function(){
    let id=$(this).data('id');
    $.post("<?=site_url('utama/delete-multi/')?>"+id,{'<?=csrf_token()?>':'<?=csrf_hash()?>'},()=>{$(this).closest('.col-md-3').remove();});
  });

  $('#table').on('click','.btn-detail',function(){
    let id=$(this).data('id');
    $.get("<?=site_url('utama/get/')?>"+id,res=>{
      let u=res.utama; let html=`<h5>${u.nama} - ${u.nip}</h5><p>${u.jabatan} | ${u.alamat}</p><h6>Galeri:</h6><div class="row">`;
      res.multi.forEach(m=>{ html+=`<div class="col-md-3"><img src="<?=base_url('uploads/')?>${m.multi_images}" class="img-fluid"><p>${m.judul_images}</p></div>`; });
      html+='</div>'; $('#detail-body').html(html); $('#modal-detail').modal('show');
    });
  });
});
</script>
<?= $this->endSection()?>