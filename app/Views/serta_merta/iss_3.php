<!DOCTYPE html>
<html lang="en">

<head>
	<title>
		How to select values from a
		JSON object using jQuery?
	</title>

	<!-- Import jQuery cdn library -->
	<script src=
"https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js">
	</script>

	<script>
		$(document).ready(function () {

			var json = [
				{ "name": "1GFG", "text": "1GFGT" },
				{ "name": "2Geeks", "text": "3GeeksT" },
				{ "name": "3GFG", "text": "3GFGT" },
				{ "name": "4Geeks", "text": "4GeeksT" },
				{ "name": "5GFG", "text": "5GFGT" },
				{ "name": "Geeks", "text": "GeeksT" },
				{ "name": "GeeksforGeeks",
					"text": "GeeksforGeeksT" }
			];

			// $('button').click(function () {
				var select = $("<select></select>")
					.attr("name", "cities");

				$.each(json, function (index, json) {
					select.append($("<option></option>")
					.attr("value", json.name).text(json.text));
				});
				$("#GFG").html(select);
			});
		// });
	</script>
</head>

<body style="text-align: center;">
	<h1 style="color: green;">
		GeeksforGeeks
	</h1>

	<h3>
		How to select values from a
		JSON object using jQuery?
	</h3>

  <?php
  $data = simplexml_load_file("https://data.bmkg.go.id/DataMKG/MEWS/DigitalForecast/DigitalForecast-JawaBarat.xml") or die("Gagal mengakses!");
  echo "Tanggal: " . $data->forecast->issue->day . "-"  . $data->forecast->issue->month . "-" . $data->forecast->issue->year . "<br>";
  echo "<h2>Cuaca</h2 " .  $data->forecast->area->parameter . "";
  echo "Jam: " .  $data->forecast->area->name . "<br>";
  echo "DateTime: " . $data->gempa->DateTime . "<br>";
  echo "Magnitudo: " . $data->gempa->Magnitude . "<br>";
  echo "Kedalaman: " . $data->gempa->Kedalaman . "<br>";
  // echo "Koordinat: " . $data->gempa->point->coordinates . "<br>";
  echo "Lintang: " . $data->gempa->Lintang . "<br>";
  echo "Bujur: " . $data->gempa->Bujur . "<br>";
  echo "Lokasi: " . $data->gempa->Wilayah . "<br>";
  echo "Potensi: " . $data->gempa->Potensi . "<br>";
  echo "Dirasakan: " . $data->gempa->Dirasakan . "<br>";
  // echo "Shakemap: <br><img src=\"https://data.bmkg.go.id/DataMKG/TEWS/" . $data->gempa->Shakemap . "\" alt=\"Gempabumi Terbaru\">";
?>

	<div id="GFG"></div>

	<button>Submit</button>

	<?php
  $data = simplexml_load_file("https://data.bmkg.go.id/DataMKG/TEWS/autogempa.xml") or die("Gagal mengakses!");
  echo "<h2>Gempabumi Terbaru</h2>";
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
  echo "Shakemap: <br><img src=\"https://data.bmkg.go.id/DataMKG/TEWS/" . $data->gempa->Shakemap . "\" alt=\"Gempabumi Terbaru\">";
?>

<?php
  $data = simplexml_load_file("https://data.bmkg.go.id/DataMKG/TEWS/gempaterkini.xml") or die ("Gagal ambil!");
  echo "<h2>Daftar 15 Gempabumi M 5.0+</h2>";
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

<?php
  $data = simplexml_load_file("https://data.bmkg.go.id/DataMKG/TEWS/gempadirasakan.xml") or die ("Gagal ambil!");
  echo "<h2>Daftar 15 Gempabumi Dirasakan</h2>";
  $i = 1;
  foreach($data->gempa as $gempaDirasakan) {
    echo "No: " . $i . "<br>";
    echo "Tanggal: " . $gempaDirasakan->Tanggal . "<br>";
    echo "Jam: " .  $gempaDirasakan->Jam . "<br>";
    echo "DateTime: " . $gempaDirasakan->DateTime . "<br>";
    echo "Magnitudo: " . $gempaDirasakan->Magnitude . "<br>";
    echo "Kedalaman: " . $gempaDirasakan->Kedalaman . "<br>";
    echo "Koordinat: " . $gempaDirasakan->point->coordinates . "<br>";
    echo "Lintang: " . $gempaDirasakan->Lintang . "<br>";
    echo "Bujur: " . $gempaDirasakan->Bujur . "<br>";
    echo "Lokasi: " . $gempaDirasakan->Wilayah . "<br>";
    echo "Dirasakan di Wilayah: " . $gempaDirasakan->Dirasakan . "<br><br>";
    $i++;
  }
?>

</body>

</html>
