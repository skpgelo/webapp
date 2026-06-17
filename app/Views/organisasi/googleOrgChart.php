<!DOCTYPE html>
<html lang="id">
<head>
    <title>Google Charts Org Chart</title>
    <!-- Load Google Charts API -->
    <script type="text/javascript" src="https://gstatic.com"></script>
    <style>
        /* Mengatur kustomisasi gaya kotak/node */
        .custom-node {
            border: 2px solid #2980b9 !important;
            background-color: #ecf0f1 !important;
            border-radius: 8px !important;
            padding: 10px !important;
            box-shadow: 0 4px 6px rgba(0,0,0,0.1) !important;
            font-family: Arial, sans-serif;
            text-align: center;
        }
        .node-name {
            font-weight: bold;
            color: #2c3e50;
            font-size: 14px;
        }
        .node-title {
            font-style: italic;
            color: #7f8c8d;
            font-size: 12px;
            margin-top: 5px;
        }
    </style>
</head>
<body>

    <!-- Wadah untuk memunculkan Org Chart -->
    <div id="chart_div" style="width: 100%; overflow-x: auto; padding: 20px;"></div>

    <script type="text/javascript">
        // 1. Inisialisasi Google Charts
        google.charts.load('current', {packages:["orgchart"]});
        google.charts.setOnLoadCallback(drawChart);

        function drawChart() {
            var data = new google.visualization.DataTable();
            data.addColumn('string', 'Entity'); // ID Unik Node
            data.addColumn('string', 'Parent'); // ID Unik Atasan
            data.addColumn('string', 'ToolTip'); // Tooltip saat hover

            // 2. Data mentah dari CodeIgniter 4
            const rawData = <?= json_encode($sdm); ?>;

            // 3. Transformasi data menjadi spesifik HTML
            const formattedData = rawData.map(item => {
                // Desain spesifik isi kotak menggunakan HTML string
                const htmlDisplay = `
                    <div class="custom-node">
                        <div class="node-name">${item.nama}</div>
                        <div class="node-title">${item.jabatan}</div>
                    </div>
                `;

                return [
                    { 
                        'v': String(item.id), // ID dalam bentuk string
                        'f': htmlDisplay       // Tampilan spesifik node
                    },
                    item.parent_id ? String(item.parent_id) : '', // Atasan (kosong jika top level)
                    item.jabatan // Tooltip teks
                ];
            });

            // 4. Masukkan data ke chart
            data.addRows(formattedData);

            // 5. Konfigurasi Tampilan Gambar
            var chart = new google.visualization.OrgChart(document.getElementById('chart_div'));
            chart.draw(data, {
                'allowHtml': true,          // WAJIB bernilai true untuk mengaktifkan HTML spesifik
                'allowCollapse': true,      // Bisa klik node untuk menyembunyikan bawahan
                'size': 'medium'            // Ukuran dasar bawaan (small, medium, large)
            });
        }
    </script>
</body>
</html>
