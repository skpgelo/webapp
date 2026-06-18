<?= $this->extend('dbadmin/index') ?>

<?= $this->section('page-content') ?>

<script src="https://cdn.ckeditor.com/ckeditor5/39.0.1/classic/ckeditor.js"></script>

<style>
            #container {
                width: 1000px;
                margin: 20px auto;
            }
            .ck-editor__editable[role="textbox"] {
                /* editing area */
                min-height: 100px;
            }
            .ck-content .image {
                /* block images */
                max-width: 80%;
                margin: 20px auto;
            }
        </style>


  <!-- Page Heading -->
<div class="container-fluid">
<div class="container-fluid px-4">
<h3 class="mt-4">[<?= $db ?>]</h3>
<br>
<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary"><?= $juduldb; ?></h6>
    </div>
    <div class="card-body">
    <?php if(!empty(session()->getFlashdata('success'))):?>
                    <div class="alert alert-success">
                       <?= session()->getFlashdata('success') ?>
                    </div>
                <?php endif;?>
                <form action="save" method="post" enctype="multipart/form-data">
                <!-- <= form_open_multipart(base_url('/save')); ?> -->
<label class="col-sm-4 col-form-label">Nomor</label>
 <input type="text" class="form-control" id="nomor" name="nomor" placeholder="Nomor Produk Hukum" required>

 <label class="col-sm-4 col-form-label" >Tahun</label>
 <!-- <input type="date" class="form-control"  id="tahun" name="tahun" placeholder="Tahun Terbit Produk Hukum" required> -->
 <select class="form-control"  id="tahun" name="tahun" required >
 <option selected="selected">Tahun Terbit Produk Hukum</option>
 <?php
 for($i=date('Y'); $i>=date('Y')-50; $i-=1){
 echo "<option value='$i'> $i </option>";
 }
 ?>
 </select>                                    
 <label class="col-sm-4 col-form-label" >Tentang</label>
 <input type="textarea" class="form-control"  id="tentang" name="tentang" placeholder="Tentang Produk Hukum" style="width:100%; height: 100px" required>

 <label class="col-sm-4 col-form-label" >Keterangan</label>
 <input type="textarea" class="form-control"  id="keterangan" name="keterangan" placeholder="Keterangan" >

 <label class="col-sm-4 col-form-label">File</label>
 <input type="file" class="form-control" id="isi_pdf" name="isi_pdf" placeholder="File Produk Hukum [.pdf]" multiple="true" required>
    
 <label class="col-sm-4 col-form-label" >Hirarki</label>
 <input type="text" class="form-control"  id="id_hirarki" name="id_hirarki" placeholder="Hirarki dalam Peraturan Perundang-undangan" required>
 <input type="hidden" id="hirarki" name="hirarki" placeholder="Hirarki dalam Peraturan Perundang-undangan" required>

 <label class="col-sm-4 col-form-label">Penulis</label>
 <input type="text" class="form-control" id="autor" name="autor" placeholder="Penulis">
 <input type="hidden" id="lokasi" name="lokasi"  value="<?= $lokasi ?>">
 <input type="hidden" id="lat" name="lat" value="<?= $lat ?>">
 <input type="hidden" id="lon" name="lon" value="<?= $lon ?>">
</br>
 <button type="submit" class="btn btn-primary">Upload</button>

<!-- <= form_close() ?> -->
                </form>
</div>
</div>
</div>
</div>
        <script>
            ClassicEditor
                .create( document.querySelector( '#tentang') )
                .catch( error => {
                    console.error( error );
                } );
                ClassicEditor
                .create( document.querySelector('#keterangan') )
                .catch( error => {
                    console.error( error );
                } );
        </script>

<?= $this->endSection() ?>
