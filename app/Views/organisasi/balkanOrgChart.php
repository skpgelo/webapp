<!DOCTYPE html>
<html lang="id">
<head>
    <title>Organization Chart</title>
    <!-- <script src="https://balkangraph.com"></script> -->
    <!-- <script src="https://balkan.app"></script> -->
     <script src="https://cdn.balkan.app/orgchart.js"></script>
        <style>
        /* Penting: Berikan tinggi pasti agar chart tidak berukuran 0px */
        #tree {
            width: 100%;
            height: 700px;
            border: 1px solid #ddd;
        }
    </style>    
</head>
<body>

    <div id="tree"></div>

   <script>
        document.addEventListener("DOMContentLoaded", function() {
            // Mengambil data JSON yang dikirim oleh CodeIgniter Controller
            // Menggunakan sintaks raw agar string JSON tidak ter-escape oleh sistem keamanan
             OrgChart.templates.ana.field_2 = '<image preserveAspectRatio="xMidYMid slice" xlink:href="{val}" x="20" y="-15" width="80" height="80"></image>';
            var rawData = <?= $chartData; ?>;
            // var rawData = [
            // { id: 1, pid: null, name: "CEO", title: "Chief Executive Officer", foto: "https://cdn.balkan.app/shared/4.jpg" },
            // { id: 2, pid: 1, name: "CTO", title: "Chief Technology Officer", foto: "https://cdn.balkan.app/shared/3.jpg" },
            // { id: 3, pid: 1, name: "CFO", title: "Chief Financial Officer", foto: "https://cdn.balkan.app/shared/1.jpg" },
            // { id: 4, pid: 3, name: "Dev Manager", title: "Development Manager", foto: "https://cdn.balkan.app/shared/2.jpg" }
            // { id: 5, pid: 2, name: "QA Manager", title: "Quality Assurance Manager" },
            // { id: 6, pid: 3, name: "Accountant", title: "Accountant" }
            // ];
            // var rawData = JSON.parse(JSON.stringify(<= $chartData ?>));
            // Inisialisasi BALKAN OrgChart
            var chart = new OrgChart(document.getElementById("tree"), {
                // orientation: OrgChart.orientation.up,
                // layout: OrgChart.mixed,
                nodeBinding: {
                    field_0: "name",  // Menampilkan properti 'name' dari database
                    field_1: "title",  // Menampilkan properti 'title' dari database
                    // field_2: "jabatan",  // Menampilkan properti 'title' dari database
                    field_2: "foto"   // Menampilkan properti 'foto' dari database
                },
                nodes: rawData
            });
        });
    </script>
</body>
</html>