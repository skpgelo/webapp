<?= $this->extend('base/skeleton'); ?>

<?= $this->section('content'); ?>

<div class="main-content">
        <section class="section">
          <div class="section-header">
          </div>

          <?=$this->include('base/4row')?>
          <?=$this->include('base/4sub_section_header')?>

          <div class="section-body">

            <div class="row">
              <div class="col-12 col-md-6 col-lg-12">
                <div class="card">
                  <div class="card-header">
                    <h4><?= $card_header;?></h4>
                  </div>
                  <div class="card-body p-0">
                    <div class="table-responsive">
                      <table class="table table-striped table-md">
                      <thead>
                            <tr>
                              <th scope="col">Nomor</th>
                              <th scope="col">Tahun</th>
                              <th scope="col">Tentang</th>
                              <th scope="col">Hirarki</th>
                              <th scope="col">Keterangan</th>
                              <th scope="col">Lihat</th>
                              <th scope="col">Download</th>
                            </tr>
                          </thead>
                                        <?php foreach($produk_huk as $data){ ?>
                          <tbody>
                            <tr>
                                            <td><?= $data['nomor'] ?></td>
                                            <td><?= $data['tgl_terbit'] ?></td>
                                            <td><?= $data['tentang'] ?></td>
                                            <td><?= $data['id_hirarki'] ?></td>
                                            <th>keterangan</th>
                                            <th>view</th>
                                            <td><a= href="javascript:prd_download(this)">Download</a=></td>
                                                <!-- <img src="<= site_url()."galeri/".$slug."/thumb_".$data->nama_file; ?>" alt="Loading Image..." > -->
                                                <!-- <input type="checkbox" name="img_check" id="img_check" class="img_check" image="<php echo $prd_row->filename ?>"> -->
                                            <!-- <td><a href="<= base_url().'index.php/download/lakukan_download' ?>">Download file</a></td> -->
                                        <?php } ?> 
                            </tr>
                          </tbody>
                      </table>
                    </div>
                  </div>
                  <div class="card-footer text-right">
                    <nav class="d-inline-block">
                      <ul class="pagination mb-0">
                        <li class="page-item disabled">
                          <a class="page-link" href="#" tabindex="-1"><i class="fas fa-chevron-left"></i></a>
                        </li>
                        <li class="page-item active"><a class="page-link" href="#">1 <span class="sr-only">(current)</span></a></li>
                        <li class="page-item">
                          <a class="page-link" href="#">2</a>
                        </li>
                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                        <li class="page-item">
                          <a class="page-link" href="#"><i class="fas fa-chevron-right"></i></a>
                        </li>
                      </ul>
                    </nav>
                  </div>
                </div>
              </div>
            </div>

          </div>
        </section>
      </div>

<!-- Main Content -->

        <!-- <script src="https://code.jquery.com/jquery-3.7.0.js" crossorigin="anonymous"></script> -->
        <!-- <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js" crossorigin="anonymous"></script> -->
        <!-- <script src="js/scripts.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>
        <script src="js/datatables-simple-demo.js"></script> -->
        <a href="javascript:prd_download(this)">Download</a>

<!-- <img src="<php echo site_url()."/../images/uploads/".$jobno."/thumb_".$prd_row->filename; ?>" alt="Loading Image..." > -->

<!-- <input type="checkbox" name="img_check" id="img_check" class="img_check" image="<php echo $prd_row->filename ?>"> -->


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
</script>

<?= $this->endSection() ?>