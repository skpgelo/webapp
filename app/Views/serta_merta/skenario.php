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
<h6 class="mt-3 ml-5 font-weight-bold text-primary">Hasil Kajian Sesar Lembang: Deputi Bidang Geofisika - BMKG</h6>
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
                                <td scope="col" >
                                <p>Di wilayah Kota Bandung memang terdapat struktur Sesar Lembang dengan panjang jalur sesar yang mencapai 30 km. Hasil kajian menunjukkan bahwa laju pergeseran Sesar Lembang mencapai 5,0 mm/tahun, sementara itu hasil monitoring BMKG juga menunjukkan adanya beberapa aktivitas seismik dengan kekuatan kecil. </p>
                                <p>Adanya potensi gempabumi di jalur Sesar Lembang dengan magnitudo maksimum M=6,8 merupakan hasil kajian para ahli, sehingga kita patut mengapresiasi hasil penelitian tersebut.</p>
                                <p>Hasil pemodelan peta tingkat guncangan (shakemap) oleh BMKG dengan skenario gempa dengan kekuatan M=6,8 dengan kedalaman hiposenter 10 km di zona Sesar Lembang (garis hitam tebal), menunjukkan bahwa dampak gempa dapat mencapai skala intensitas VII-VIII MMI (setara dengan percepatan tanah maksimum 0,2 - 0,4 g) dengan diskripsi terjadi kerusakan ringan pada bangunan dengan konstruksi yang kuat.</p> 
                                <p>Dinding tembok dapat lepas dari rangka, monument/menara roboh, dan air menjadi keruh. Sementara untuk bangunan sederhana non struktural dapat terjadi kerusakan berat hingga dapat menyebabkan bangunan roboh. Secara umum skala intensitas VII-VIII MMI dapat mengakibatkan terjadinya goncangan sangat kuat dengan kerusakan sedang hingga berat (Gambar di atas).</p>
                                <p>Dengan adanya hasil kajian sesar aktif oleh beberapa ahli akhir-akhir ini, maka penting kiranya pemerintah memperhatikan peta rawan bencana sebelum merencanakan penataan ruang dan wilayah. Perlu ada upaya serius dari berbagai pihak dalam mendukung dan memperkuat penerapan building code dalam membangun struktur bangunan tahan gempa. Saat ini building code Indonesia mengacu kepada peraturan SNI 1726-2012. Upaya pembaharuan peraturan ini sedang dalam proses melalui Tim Pusat Studi Gempa Nasional (PUSGEN) yang melibatkan lintas bidang dan lintas sektoral dimana BMKG berperan aktif di dalamnya.</p>
                                <p>Adanya hasil kajian potensi bencana, jangan sampai membuat masyarakat yang bermukim di dekat jalur sesar terus dicekam rasa khawatir. Warga masyarakat harus meningkatkan kemampuan dalam memahami cara penyelamatan saat terjadi gempa dan mengikuti arahan pemerintah dalam melakukan evakuasi. Kegiatan sosialisasi di daerah rawan harus digalakkan, karena dapat membuat masyarakat lebih siap dalam menghadapi bencana. Kesiapan dalam menghadapi bencana terbukti dapat memperkecil jumlah korban.</p>
                                <p>Kepada masyarakat dihimbau agar tetap tenang dan tidak mudah terpancing isu yang tidak dapat dipertanggungjawabkan kebenarannya. Pastikan informasi gempabumi berasal dari lembaga resmi pemerintah dalam hal ini BMKG. Untuk mendapatkan informasi tersebut dapat mengunjungi website BMKG (www.bmkg.go.id) dan media sosial resmi BMKG.</p>
                                </td>
                            </thead>
                            
                            <tbody >
                                <td class="w-20 p-3">
                                    <img style="margin-right: 40px ; margin-left: 40px ;" src="img/Sesar-Lembang.jpg" width='650' height='auto'>
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
