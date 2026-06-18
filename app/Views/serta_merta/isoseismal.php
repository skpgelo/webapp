<?= $this->extend('dbadmin/index') ?>

<?= $this->section('page-content') ?>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <style>
        .card-columns {
            column-count: 6;
        }
    </style>
<div class="container-fluid">

<!-- Page Heading -->
<h4 class="h3 mt-3 ml-5 text-gray-800"><?= $title; ?></h4>
<div class="container-fluid px-4">
<br>
<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary"><?= $card_header; ?></h6>
    </div>
    <div class="card-body">
    <div class="table-responsive">
    <table id="list_data" class="table display row-border table-striped compact" style="width: 100%;">
                                <thead>
                                    <tr>
                                        <th style="width: 30px;">No</th>
                                        <th>Kelurahan</th>
                                        <th>Kecamatan</th>
                                        <th>Kodepos</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1;
                                    foreach ($record as $dt) { ?>
                                        <tr>
                                            <td class="text-center"><?php echo $no; ?></td>
                                            <td><?php echo $dt['kelurahan']; ?></td>
                                            <td><?php echo $dt['kecamatan']; ?></td>
                                            <td><?php echo $dt['kodepos']; ?></td>
                                        </tr>
                                    <?php $no++;
                                    } ?>
                                </tbody>

                                <!-- $kodeHTML =  bacaHTML('http://www.detik.com/');
         $pecah = explode('<ul id="beritautama">', $kodeHTML);
         $pecahLagi = explode('</ul>', $pecah[1]);
         echo "<ul>".$pecahLagi[0]."</ul>"; -->

                            </table>

                        </table>
                        <div class="d-flex align-items-right justify-content-between small">
                        <div class="text-muted" ><i style="font-size: 0.9rem;">sumber || data terbuka BMKG <?= date('Y'); ?></i>
                        </div>
                        </div>
                    </div>
    </div>
</div>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script type="text/javascript">
            $(document).ready(function() {
                $('#list_data').DataTable();
            });
        </script>

    <?= $this->endSection() ?>
