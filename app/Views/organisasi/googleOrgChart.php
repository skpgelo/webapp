<!DOCTYPE html>
<html lang="id">
<head>
    <title>Google Charts Org Chart</title>
    <!-- Load Google Charts API -->
    <script type="text/javascript" src="https://gstatic.com"></script>
   <style>
        /* Sifat dasar kontainer bagan */
        #chart_div {
            width: 100%;
            margin-top: 20px;
        }
        /* Kustomisasi warna kotak Google OrgChart via CSS */
        .google-visualization-orgchart-node {
            border: 2px solid #1a73e8 !important;
            background-color: #f8f9fa !important;
            border-radius: 8px !important;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
            padding: 10px !important;
            font-family: 'Roboto', Arial, sans-serif;
        }
    </style>
    </head>
<body>

    <!-- Wadah untuk memunculkan Org Chart -->
   <div id="chart_div"></div>

    <script type="text/javascript">
        // Muat paket visualization dan orgchart dari Google
        google.charts.load('current', {packages:["orgchart"]});
        google.charts.setOnLoadCallback(drawChart);

        function drawChart() {
            var data = new google.visualization.DataTable();
            data.addColumn('string', 'Entity');
            data.addColumn('string', 'Parent');
            data.addColumn('string', 'ToolTip');

            // 3. Memasukkan data database CI4 ke dalam baris Google Chart
            data.addRows([
                <?php foreach ($pegawai as $p) : ?>
                    [
                        {
                            // 'v' adalah ID unik (wajib string), 'f' adalah format tampilan HTML di dalam kotak
                            v: '<?= $p['id']; ?>', 
                            f: '<div style="font-weight:bold; color:#1a73e8;"><?= esc($p['nama']); ?></div><div style="font-size:11px; color:#5f6368;"><?= esc($p['jabatan']); ?></div>'
                        },
                        // Menentukan atasan. Jika atasan_id kosong atau 0, diisi string kosong '' (artinya dia pucuk pimpinan)
                        '<?= ($p['parent_id'] == 0 || empty($p['parent_id'])) ? '' : $p['parent_id']; ?>',
                        // Tooltip saat mouse diarahkan ke kotak
                        '<?= esc($p['jabatan']); ?>'
                    ],
                <?php endforeach; ?>
            ]);

            // 4. Inisialisasi dan Render Google OrgChart
            var chart = new google.visualization.OrgChart(document.getElementById('chart_div'));
            
            // Konfigurasi tambahan (allowHtml wajib TRUE jika menggunakan kustom tag div/HTML di atas)
            chart.draw(data, {
                allowHtml: true,
                size: 'medium' // Pilihan: 'small', 'medium', 'large'
            });
        }
    </script>
</body>
</html>
