        // Ambil data dari Controller menggunakan json_encode
        const labelData = <?= json_encode($label); ?>;
        const totalData = <?= json_encode($total); ?>;

        const ctx = document.getElementById('grafikPegawai').getContext('2d');
        const myChart = new Chart(ctx, {
            type: 'bar', // Tipe grafik: bar, pie, line, doughnut, dll.
            data: {
                labels: labelData,
                datasets: [{
                    label: 'Jumlah Pegawai',
                    data: totalData,
                    backgroundColor: [
                        'rgba(54, 162, 235, 0.6)',
                        'rgba(255, 99, 132, 0.6)',
                        'rgba(75, 192, 192, 0.6)',
                        'rgba(255, 206, 86, 0.6)'
                    ],
                    borderColor: [
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 99, 132, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(255, 206, 86, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
