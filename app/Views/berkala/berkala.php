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
            <h6 class="m-0 font-weight-bold text-primary">Tentang Kami</h6>
        </div>
        <div class="card-body">
        <?php  
//         $Option= array(
//             "ssl" =>array(
//                 "verify_peer" => false,
//                 "verify_peer_name" => false,
//             ),
//         );
//  $sumber = 'satudata.jakarta.go.id/open-data/detail/data-yayasan-di-provinsi-dki-jakartan';
//  $konten = file_get_contents($sumber, false, stream_context_create($Option));
//  $data = json_decode($konten, true);

 //echo $data[1]["nama_lokasi"];
//  echo "<h1 align='center'>Jumlah lomba anak bercerita terbaik jakarta ada ".count($data)." Siswa dan Siswi</h1>";
//  echo "<br/>";
?>

 <style>
  table {
   width: 100%; 
  }
  table tr td {
   padding: 1rem;
  }
 </style>
 <table border="1">
  <tr>
   <th>No</th>
   <th>Tahun</th>
   <th>Jenis Lomba</th>
   <th>Juara</th>
   <th>Nama</th>
   <th>Sekolah</th>
   <th>ID</th> 
  </tr>
  <?php   
//    for($a=0; $a < count($data); $a++)
//    {
//     print "<tr>";
//     // penomeran otomatis
//     print "<td>".$a."</td>";
//     // menayangkan 
//     print "<td>".$data[$a]['tahun']."</td>";
//     print "<td>".$data[$a]['jenis']."</td>";
//     print "<td>".$data[$a]['juara']."</td>";
//     print "<td>".$data[$a]['nama']."</td>";
//     print "<td>".$data[$a]['sekolah']."</td>";
//     print "<td>".$data[$a]['id']."</td>";
//     print "</tr>";
//    }
  ?>
 </table>

        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<?= $this->endSection() ?>
