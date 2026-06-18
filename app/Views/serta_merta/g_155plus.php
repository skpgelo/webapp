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
            <table class="text-left">
                            <thead>
                                <!-- <th scope="col"></th> -->
                                <!-- <th scope="col"></th> -->
                            </thead>
                            
                            <tbody >
                                <td class="w-20 p-3">.</td>
                                <td scope="col" >
                                <?php
                                    $data = simplexml_load_file("https://data.bmkg.go.id/DataMKG/TEWS/gempaterkini.xml") or die ("Gagal ambil!");
                                    $i = 1;
                                    foreach($data->gempa as $gempaM5) {
                                    echo "No: " . $i . "<br>";
                                    echo "Tanggal: " . $gempaM5->Tanggal . "<br>";
                                    echo "Jam: " .  $gempaM5->Jam . "<br>";
                                    echo "DateTime: " . $gempaM5->DateTime . "<br>";
                                    echo "Magnitudo: " . $gempaM5->Magnitude . "<br>";
                                    echo "Kedalaman: " . $gempaM5->Kedalaman . "<br>";
                                    echo "Koordinat: " . $gempaM5->point->coordinates . "<br>";
                                    echo "Lintang: " . $gempaM5->Lintang . "<br>";
                                    echo "Bujur: " . $gempaM5->Bujur . "<br>";
                                    echo "Lokasi: " . $gempaM5->Wilayah . "<br>";
                                    echo "Potensi: " . $gempaM5->Potensi . "<br><br>";
                                    $i++;
                                    }
                                    ?>
                                </td>
                            </tbody>
                        </table>
                        <div class="d-flex align-items-right justify-content-between small">
                        <div class="text-muted" ><i style="font-size: 0.9rem;">sumber || data terbuka BMKG <?= date('Y'); ?></i>
                        </div>
                        </div>
                    </div>
    </div>
</div>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>

    <?= $this->endSection() ?>
