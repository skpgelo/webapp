<?= $this->extend('dbadmin/index') ?>

<?= $this->section('page-content') ?>

<!-- <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
<link href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css" rel="stylesheet" />
<link href="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min." rel="stylesheet" /> -->
<main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">[<?= $db ?>]</h1>
                        <ol class="breadcrumb mb-4">
                            <!-- <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                            <li class="breadcrumb-item active">Tables</li> -->
                        </ol>
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                <?= $juduldb ?>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
<table class="table">
                                    <thead>
                                        <tr>
                                            <th>Nomor</th>
                                            <th>Tahun</th>
                                            <th>Tentang</th>
                                            <th>Hirarki</th>
                                            <th>Download</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                        <?php foreach($berita as $data){ ?>
                                            <td><? $data->nomor ?></td>
                                            <td><? $data->tahun ?></td>
                                            <td><? $data->tentang ?></td>
                                            <td><? $data->hirarki ?></td>
                                            <td><a href="javascript:prd_download(this)">Download</a></td>
                                                <img src="<?= site_url()."galeri/".$slug."/thumb_".$data->nama_file; ?>" alt="Loading Image..." >
                                                <!-- <input type="checkbox" name="img_check" id="img_check" class="img_check" image="<?php echo $prd_row->filename ?>"> -->
                                            <!-- <td><a href="<?= base_url().'index.php/download/lakukan_download' ?>">Download file</a></td> -->
                                            <td>aksi</td>
                                            <?php } ?> 
                                        </tr>
                                        </tbody>
        <tfoot>
            <tr>
                <th>Name</th>
                <th>Position</th>
                <th>Office</th>
                <th>Age</th>
                <th>Start date</th>
                <th>Salary</th>
            </tr>
        </tfoot>
    </table>    
                            </div>
                        </div>
                    </div>
                </main>
        <!-- <script src="https://code.jquery.com/jquery-3.7.0.js" crossorigin="anonymous"></script> -->
        <!-- <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js" crossorigin="anonymous"></script> -->
        <!-- <script src="js/scripts.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>
        <script src="js/datatables-simple-demo.js"></script> -->
        <a href="javascript:prd_download(this)">Download</a>

<img src="<?php echo site_url()."/../images/uploads/".$jobno."/thumb_".$prd_row->filename; ?>" alt="Loading Image..." >

<input type="checkbox" name="img_check" id="img_check" class="img_check" image="<?php echo $prd_row->filename ?>">


<!-- <script type="text/javascript">
function prd_download(ele)
{   
    var selected_images = $(".img_check:checked");
    var job_no = $("#product_table").attr("jobno");
    var image_name = new Array();
    for(i = 0; i < selected_images.length; i++)
    {
        image_name[i] = $(selected_images[i]).attr('image');
    }
        $.get('<php echo site_url('project_controller/file_download') ?>', {file_name : image_name, jobno : job_no});
}
</script> -->
<script type="text/javascript">
function prd_download(ele)
{   
    var selected_images = $(".img_check:checked");
    var job_no = $("#product_table").attr("jobno");
    var image_name = new Array();
    for(i = 0; i < selected_images.length; i++)
    {
        image_name[i] = $(selected_images[i]).attr('image');
    }
        window.location.href = "<?php echo site_url('project_controller/file_download') ?>?file_name="+ image_name +"&jobno="+ job_no;
}
</script><?= $this->endSection() ?>