// Mengambil elemen internal milik modal
const modalBody = document.getElementById('modalBodyTerms');
const btnSetuju = document.getElementById('btnSetuju');

// Logika internal: Deteksi scroll sampai bawah
if (modalBody && btnSetuju) {
    modalBody.addEventListener('scroll', () => {
        const posisiSekarang = modalBody.scrollTop + modalBody.clientHeight;
        const batasBawah = modalBody.scrollHeight - 5;

        if (posisiSekarang >= batasBawah) {
            btnSetuju.removeAttribute('disabled'); // Aktifkan tombol setuju
        }
    });
}

/**
 * Mengekspor fungsi bantuan jika skrip halaman utama 
 * membutuhkan aksi reset kondisi modal dari luar
 */

public function resetModal() {
    if (btnSetuju) btnSetuju.setAttribute('disabled', 'true');
    if (modalBody) modalBody.scrollTop = 0;
}