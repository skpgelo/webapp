// Fungsi untuk menyembunyikan/menampilkan sidebar di layar kecil (Mobile)
const menuToggle = document.getElementById("menuToggle");
const sidebar = document.getElementById("sidebar");

menuToggle.addEventListener("click", function() {
    sidebar.classList.toggle("active");
});

// Script untuk membuat grafik dari Chart.js
const ctx = document.getElementById('myChart').getContext('2d');
const myChart = new Chart(ctx, {
    type: 'bar', // Tipe grafik (Bisa diganti: line, pie, dll)
    data: {
        labels: ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun'],
        datasets: [{
            label: 'Penjualan Bulanan (Unit)',
            data: [12, 19, 3, 5, 2, 3], // Angka data grafik
            backgroundColor: 'rgba(54, 162, 235, 0.6)',
            borderColor: 'rgba(54, 162, 235, 1)',
            borderWidth: 1
        }]
    },
    options: {
        responsive: true,
        scales: {
            y: {
                beginAtZero: true
            }
        }
    }
});
