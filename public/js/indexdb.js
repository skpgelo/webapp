// Mengambil elemen tombol menu dan sidebar
const menuToggle = document.getElementById('menu-toggle');
const sidebar = document.querySelector('.sidebar');

// Menambahkan event klik pada tombol
menuToggle.addEventListener('click', () => {
    sidebar.classList.toggle('hidden');
});
