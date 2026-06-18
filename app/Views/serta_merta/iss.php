<?= $this->extend('dbadmin/index') ?>

<?= $this->section('page-content') ?>


        <!-- start -->
        <link
      rel="stylesheet"
      href="https://unpkg.com/leaflet@1.4.0/dist/leaflet.css"
      integrity="sha512-puBpdR0798OZvTTbP4A8Ix/l+A4dHDD0DGqYW6RQ+9jxkRFclaxxQb/SJAWZfWAkuyeQUytO7+7N4QKrDh+drA=="
      crossorigin=""
    />
    <script
      src="https://unpkg.com/leaflet@1.4.0/dist/leaflet.js"
      integrity="sha512-QVftwZFqvtRNi0ZyCtsznlKSWOStnDORoefr1enyq5mVL4tmKB3S/EnC3rRJcxCPavG10IcrVGSmPh6Qw5lwrg=="
      crossorigin=""
    ></script>
    <style>
      #issMap {
        height: 90vh;
	  		width: 100%
      }
    </style>

<div class="container-fluid">

<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800"><?php $title; ?></h1>
<div class="container-fluid px-4">
<br>
<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary"><?= $card_header; ?></h6>
    </div>
    <div class="card-body">
    <div class="title">
    <span><h7> latitude: <span id="lat"></span>° :: longitude: <span id="lon"></span>°  :: altitude: <span id="alt"></span> km || latitude matahari:<span id="solar_lat"></span>° :: longitude matahari:<span id="solar_lon"></span>°</h7></span>
			<!-- <p>Date : <span class="tanggal"></span></p>
		</div>
		<div class="select">
			<select type="date" name="select-tanggal"></select> -->
		</div>
    <!-- <hr> -->
        <div>
        <!-- <canvas id="mapid"></canvas> -->
        <div id="issMap"></div>
                <!-- <div id="mapid_cuaca"></div> -->
                </div>
                </div>
                </div>
                </div>
                </div>
        <!-- leaflet js  -->

<script>
  // Making a map and tiles
  const mymap = L.map('issMap').setView([0, 0], 1);
  const attribution =
    '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors';

  const tileUrl = 'https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png';
  const tiles = L.tileLayer(tileUrl, { attribution });
  tiles.addTo(mymap);
  // marker.bindPopup(response[i].officer_name).openPopup();
  // marker.bindPopup(response[i].description).openPopup();

  // Making a marker with a custom icon
  const issIcon = L.icon({
    iconUrl: '<?= base_url('img/iss200.png') ?>',
    iconSize: [30, 22],
    iconAnchor: [25, 16]
  });

  var customPopup = 'iAM hERE:'   ;

  var customOptions = {
        'maxWidth': '500',
        'className' : 'custom'
        }

  const marker = L.marker([0, 0], { icon: issIcon}).bindPopup(customPopup,customOptions).addTo(mymap);

  const api_url = 'https://api.wheretheiss.at/v1/satellites/25544';

  let firstTime = true;

  async function getISS() {
    const response = await fetch(api_url);
    const data = await response.json();
    const { latitude, longitude, altitude, solar_lat, solar_lon } = data;

    marker.setLatLng([latitude, longitude]);
    if (firstTime) {
      mymap.setView([latitude, longitude], 2);
      firstTime = false;
    }
    document.getElementById('lat').textContent = latitude.toFixed(4);
    document.getElementById('lon').textContent = longitude.toFixed(4);
    document.getElementById('alt').textContent = altitude.toFixed(2);
    document.getElementById('solar_lat').textContent = solar_lat.toFixed(4);
    document.getElementById('solar_lon').textContent = solar_lon.toFixed(4);
  }

  getISS();

  setInterval(getISS, 1000);
</script>
<!-- end -->

<?= $this->endSection() ?>