<?= $this->extend('dbadmin/index') ?>

<?= $this->section('page-content') ?>

    <!-- Bootstrap CSS -->
    <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" />
  <link rel="stylesheet" href="assets/css/app.css"> -->

<!-- Get Bootstrap CDN in https://www.bootstrapcdn.com/ -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
<!-- load script package jquery -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.2/jquery.min.js" integrity="sha512-tWHlutFnuG0C6nQRlpvrEhE4QpkG1nn2MOUMWmUeRePl4e3Aki0VB6W1v3oLjFtd0hVOtRQ9PHpSfN6u6/QXkQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
 
<!-- load script package bootstrap.js -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js" integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
 
<!-- load file css leaflet -->
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.3/dist/leaflet.css" integrity="sha256-kLaT2GOSpHechhsozzB+flnD+zUyjE2LlfWPgU04xyI=" crossorigin=""/>
<style type="text/css">
</style>
<!-- load file js leaflet -->
<script src="https://unpkg.com/leaflet@1.9.3/dist/leaflet.js" integrity="sha256-WBkoXOwTeyKclOHuWtc+i2uENFpDZ9YPdf5Hf+D7ewM=" crossorigin=""></script>

<style type="text/css">
#map {         height: 90vh;
	  		width: 100%;
    }
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
                        <table>
                            <!-- <thead>
                                <th scope="col"></th>
                                <th scope="col"></th>
                            </thead> -->
                            
                            <tbody class="text-left">
                                <td scope="row">
                                <?php
                                $data = simplexml_load_file("https://data.bmkg.go.id/DataMKG/TEWS/autogempa.xml") or die("Gagal mengakses!");
                                echo "<img src=\"https://data.bmkg.go.id/DataMKG/TEWS/" . $data->gempa->Shakemap . "\" alt=\"Gempabumi Terbaru\">";
                                ?>
                                </td>
                                <td scope="row" >
                                <?php
                                //   echo "<h2>Gempabumi Terbaru</h2>";
                                echo "Tanggal: " . $data->gempa->Tanggal . "<br>";
                                echo "Jam: " .  $data->gempa->Jam . "<br>";
                                echo "DateTime: " . $data->gempa->DateTime . "<br>";
                                echo "Magnitudo: " . $data->gempa->Magnitude . "<br>";
                                echo "Kedalaman: " . $data->gempa->Kedalaman . "<br>";
                                echo "Koordinat: " . $data->gempa->point->coordinates . "<br>";
                                echo "Lintang: " . $data->gempa->Lintang . "<br>";
                                echo "Bujur: " . $data->gempa->Bujur . "<br>";
                                echo "Lokasi: " . $data->gempa->Wilayah . "<br>";
                                echo "Potensi: " . $data->gempa->Potensi . "<br>";
                                echo "Dirasakan: " . $data->gempa->Dirasakan . "<br>";
                                ?>
                                </td>
                                <td>
                            </tbody>
                        </table>
                        <div class="d-flex align-items-right justify-content-between small">
                        <div class="text-muted" ><i style="font-size: 0.9rem;">sumber || data terbuka BMKG <?= date('Y'); ?></i>
                        </div>
                        </div>
                    </div>
<!-- <div id="map"></div> -->
</div>
</div>
</div>
  <script type="text/javascript">
	var geojson_id = '', map;
    // var id_1 = '9';
	// proses baca file json yang ada di path /asssets/files/
	// sesuaikan path ini dengan lokasi tempat kalian menyimpan file data geojson
	$.getJSON("/data_json/indonesia_geojson.json", function(data){
		//deklarasi variable map dengan fungsi L.map
		geojson_id = data;//variabel yang isinya data geojson
		var map = L.map('map', {
					scrollWheelZoom: true, //disable zoom melalui scroll pada mouse
					zoomControl: true //disable zoom control (static)
				}).setView([-3.1073741,117.4016219], 4.50); //set titik koordinat center dan zoom
															//sesuaikan titik koordinat dan zoom ini dengan posisi maps yang
															//ingin ditampilkan secara default 
		
		//set base maps menggunakan google maps
		L.tileLayer('https://{s}.google.com/vt/lyrs=m&x={x}&y={y}&z={z}', {
			attribution: '<h9>Map &copy; <a href="https://maps.google.com/">Google Maps</a></h9>',
			subdomains:['mt0','mt1','mt2','mt3']
		}).addTo(map);

		//style untuk geojson, silahkan ubah sesuai kebutuhan
		function style(feature) {
            kec = feature.properties.state;
            // latlan = ;
			return {
				fillColor: getColor(kec),  //'green',
				weight: 0.3,
				opacity: 1,
				color: 'green',
				dashArray: '3',
				fillOpacity: 0.3
			};
		}

        function getColor(d) {
    return d == 'Kalimantan Barat' ? '#F38484' :
           d == 'Jawa Barat' ? '#D597F9' :
           d == 'Jakarta Raya' ? '#ACC715' :
           d == 'Banten' ? '#EC9949' :
           d == 'Lampung' ? '#5C51EF' :
           d == 'Bangka-Belitung' ? '#EF4242' :
		'#59FD02';
        }


		//fungsi untuk menggunakan geojson
		L.geoJSON(geojson_id, {
			style: style
        })
          .bindPopup(function (e) {
        return '<center> </br>'+ e.feature.properties.state +'</center>';
        })
        .addTo(map);   
 
 
    //     let testing=L.geoJson(riverdata, {
    // style: lineStyle,
    // onEachFeature: function (feature,layer) { 
    //     layer.bindPopup(feature.coordinates);  // I also tried feature.geometry.coordinates
        
    //     }
    // });

    // testing.addTo(map)

//     let testing = L.geoJson(riverdata, {
//   style: lineStyle,
//   onEachFeature: function (feature,layer) { 
//     layer.bindPopup('');
//     layer.on('popupopen', function(e) {
//       var popup = e.popup;
//       popup.setContent(popup.getLatLng().toString());
//     });
//   }
// });
//     testing.addTo(map)
        // L.bindPopup(function (e) {
        // return '<center>BBPPKS Bandung :: Regional III</br>'+ e.feature.properties.state +'</center>';
        // })
        // .addTo(map);   

    }).fail(function(){
		console.log("An error has occurred.");
	});
 
  </script>

  <!-- <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
  <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>
  <script src="https://unpkg.com/rbush@2.0.2/rbush.min.js"></script>
  <script src="https://unpkg.com/labelgun@6.1.0/lib/labelgun.min.js"></script>
  <script src="assets/js/labels.js"></script>
  <script src="assets/js/app.js"></script> -->
    <?= $this->endSection() ?>
