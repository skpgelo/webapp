<?= $this->extend('dbadmin/index') ?>

<?= $this->section('page-content') ?>

<div class="container-fluid">

<!-- Page Heading -->
    <div class="container-fluid px-4">
        <h4 class="h3 mt-3 ml-5 text-gray-800">[<?= $db; ?>]</h4>
        <ol class="breadcrumb mb-4">
            <h6><li class="breadcrumb-item active"><?= $juduldb ?></li></h6>
        </ol>
    </div>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary"></h6>
        </div>
        <div class="card-body">
            <?php
        $url="https://www.bmkg.go.id/seismologi-teknik/peta-isoseismal.bmkg?p=peta-isoseismal-gempabumi-bantul-yogyakarta-30-juni-2023&tag=&lang=ID";
$data=@file_get_contents($url);

$data=preg_replace('/\n+/','', $data);

$data2=preg_replace('/<\!DOCTYPE(.+?)<div class=\"col-sm-8 col-xs-12 clearfi\">/', '', $data);
$judul=preg_replace('/<\/div>(.+?)html>/', '', $data2);

// echo "<ul>".$judul[0]."</ul>";
echo $judul;
// $url = 'http://blog.kristiandes.com/grabbing-jadwal-bola-hari-ini/';
// //end
// // get / mengambil content berdasarkan url yang akan di curi datanya
// $content = file_get_contents($url);
// //
// // STEP 1 mengambil syntax pembuka
// $first_step = explode( "<div class='container content'>" , $content );
// //
// // STEP 2 mengambil syntax penutup
// $second_step = explode("</div>" , $first_step[0] );
// //
// // Replace syntax </tbody> dengan </tbody></table>
// $text1 = $second_step[1];
// //Tampilkan 
// echo $text1;

?>
        </div>
    </div>
</div>
<!-- <h1 class="title-big-detail">judul</h1>
<div class="pull-right">
     -->
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<?= $this->endSection() ?>
