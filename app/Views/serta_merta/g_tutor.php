<?= $this->extend('dbadmin/index') ?>

<?= $this->section('page-content') ?>

<div class="container-fluid">

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<!-- Page Heading -->
<h4 class="h3 mt-3 ml-5 text-gray-800"><?= $title; ?></h4>
<div class="container-fluid px-4">
<br>
<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary"><?= $card_headera; ?></h6>
    </div>
    <div class="card-body">
        <div class="container">
            <div class="table-responsive">
                        <table>
                            <!-- <thead>
                                <th scope="col"></th>
                                <th scope="col"></th>
                            </thead> -->
                            <tbody>
                                <tr>
                                <td scope="row" class="text-right" style="margin-right: 40px ; margin-left: 40px ;">
                                <p>A. Kunci Utama adalah
                                    Mengenali apa yang disebut gempabumi;</p>
                                    Pastikan bahwa struktur dan letak rumah Anda dapat terhindar dari bahaya yang disebabkan oleh gempabumi (longsor, liquefaction dll);
                                    Mengevaluasi dan merenovasi ulang struktur bangunan Anda agar terhindar dari bahaya gempabumi.
                                </td>
                                <td class="text-left" class="w-30 ">
                                <img style="margin-right: 40px ; margin-left: 40px ;" src="img/antisipasi01.webp" width='150' height='auto'>
                                </td>
                                </tr>
                                </tbody>
                                </table>
                                <table>
                                <tbody>
                                <tr>
                                <td scope="row" class="text-center" class="p-3 mb-2 ">
                                
                                </td>
                                <td  class="text-left">
                                
                                </td>
                                </tr>
                                </tbody>
                                </table>
                                <table>
                                <tbody>
                                <tr>
                                <td scope="row" class="text-right" style="margin-right: 40px ; margin-left: 40px ;" >
                                <img style="margin-top: 20px; margin-bottom: 20px; margin-right: 40px; margin-left: 40px ;" src="img/antisipasi02.webp" width='150' height='auto'>
                                </td>
                                <td class="text-left">
                                <p>B. Kenali Lingkungan Tempat Anda Bekerja</p>
                                    Perhatikan letak pintu, lift serta tangga darurat, apabila terjadi gempabumi, sudah mengetahui tempat paling aman untuk berlindung;
                                    Belajar melakukan P3K;
                                    Belajar menggunakan alat pemadam kebakaran;
                                    Catat nomor telepon penting yang dapat dihubungi pada saat terjadi gempabumi.
                                </td>
                                </tr>
                            </tbody>
                        </table>
                        <table>
                            <!-- <thead>
                                <th scope="col"></th>
                                <th scope="col"></th>
                            </thead> -->
                            <tbody>
                                <tr>
                                <td scope="row" class="text-right" style="margin-right: 40px ; margin-left: 40px ;">
                                <p>C. Persiapan Rutin pada tempat Anda bekerja dan tinggal</p>
Perabotan (lemari, cabinet, dll) diatur menempel pada dinding (dipaku, diikat, dll) untuk menghindari jatuh, roboh, bergeser pada saat terjadi gempabumi.
Simpan bahan yang mudah terbakar pada tempat yang tidak mudah pecah agar terhindar dari kebakaran.
Selalu mematikan air, gas dan listrik apabila tidak sedang digunakan.                                </td>
                                <td class="text-left" class="w-30 ">
                                <img style="margin-right: 40px ; margin-left: 40px ;" src="img/antisipasi01.webp" width='150' height='auto'>
                                </td>
                                </tr>
                                </tbody>
                                </table>
                        <div class="d-flex align-items-right justify-content-between small">
                        <div class="text-muted" ><i style="font-size: 0.9rem;">sumber || informasi terbuka BMKG <?= date('Y'); ?></i>
                        </div>
    </div>
        </div>
<!-- <div id="map"></div> -->
</div>
</div>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<?= $this->endSection() ?>
