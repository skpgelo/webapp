<?= $this->extend('base/skeleton'); ?>

<?= $this->section('content') ?>
<div class="main-content">

          <?=$this->include('base/4row')?>
          <!-- <=$this->include('base/4sub_section_header')?> -->
<div class="row mt-0 mb-50 ml-50">
    <div class="col-lg-12 col-md-12 col-12 col-sm-12">
    <h2 class="section-title mt-10 mb-10"  style="color:  blue; font-size:large"><= $sub_section_header;?></h2>
     <!-- <h2 class="section-title"><= $sub_section_header;?></h2> -->
    <!-- <div class="section-title mt-0"></div> -->
    </div>
</div>
<div class="section-body">

    <div class="row justify-content-center">
    <div class="col-md-12">
        <div class="card shadow-lg">
            <!-- <div class="card-header bg-whitesmoke text-dark">
                <h4><i class="fas fa-edit mr-2 text-warning"></i>Ubah Informasi Dokumen</h4>
            </div> -->
              <div class="col-12 col-sm-12 col-lg-12">
                <!-- <div class="card">
                  <div class="card-header">
                    <h4><= $card_header;?></h4>
                  </div> -->
                  
<div class="card-header d-flex justify-content-between align-items-center mb-3">

    <form action="/peserta/store" method="post" class="row g-3 mt-12">
        <?= csrf_field(); ?>
        <div class="col-md-4"><label>Nama</label><input type="text" name="nama" class="form-control" required></div>
        <div class="col-md-4"><label>NIK</label><input type="text" name="nik" class="form-control" maxlength="16" required></div>
        <div class="col-md-4"><label>Email</label><input type="email" name="email" class="form-control" required></div>
        <div class="col-md-6"><label>No. Telepon</label><input type="text" name="nomor_telepon" class="form-control" required></div>
        <div class="col-md-3"><label>Desa</label><input type="text" name="desa" class="form-control"></div>
        <div class="col-md-3"><label>Kecamatan</label><input type="text" name="kecamatan" class="form-control"></div>
        <div class="col-md-3"><label>Kabupaten/Kota</label><input type="text" name="kabupaten_kota" class="form-control"></div>
        <div class="col-md-3"><label>Provinsi</label><input type="text" name="provinsi" class="form-control"></div>
        <div class="col-md-6"><label>Latitude</label><input type="text" name="latitude" class="form-control"></div>
        <div class="col-md-6"><label>Longitude</label><input type="text" name="longitude" class="form-control"></div>
        
        <div class="col-md-6">
            <label>Gender</label>
            <select name="gender" class="form-control" class="form-select">
                <option value="1">Pria</option>
                <option value="2">Wanita</option>
                <option value="3">Non-Biner</option>
            </select>
        </div>
        <div class="col-md-6">
            <label>Status Nikah</label>
            <select name="nikah" class="form-control" class="form-select">
                <option value="1">Belum Kawin</option>
                <option value="2">Kawin</option>
                <option value="3">Cerai Hidup</option>
                <option value="4">Cerai Mati</option>
            </select>
        </div>
        <label>ASN</label>
        <select id="asn" name="id_asn" class="form-control">
            <option value="">Loading...</option>
        </select>
        <div class="col-12 mt-4">
            <button type="submit" class="btn btn-success">Simpan Data</button>
            <a href="/peserta" class="btn btn-secondary">Kembali</a>
        </div>
    </form>
<?= $this->endSection() ?>

<?= $this->section('scriptdd_asn') ?>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$(document).ready(function(){
    
    // Langsung jalan pas halaman dibuka
    $.ajax({
        url: "<?= base_url('peserta/get-pesertas') ?>",
        type: "GET",
        dataType: "JSON",
        success: function(response){
            if(response.status == 'success'){
                $('#peserta').html('<option value="">-- Pilih ASN --</option>');
                
                $.each(response.data, function(key, peserta){
                    $('#peserta').append(
                        '<option value="'+peserta.id+'">'+peserta.asn+'</option>'
                    );
                });
            }
        },
        error: function(){
            $('#peserta').html('<option value="">Gagal load data</option>');
        }
    });

});
</script>
 <?= $this->endSection() ?> 