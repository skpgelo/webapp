// // CREATE: Membuka Modal Form Kosong
// function showTambahModal() {
//     // Reset isi form bawaan browser
//     document.getElementById('sdmForm').reset();
    
//     // Pastikan ID diset kosong agar dideteksi sebagai operasi INSERT oleh CI4
//     $('#form-id').val('');
//     $('#modalTitle').text('Tambah Pegawai Baru');
//     $('#formModal').modal('show');
// }

// // CREATE & UPDATE HANDLER: Kirim payload form data (Mendukung upload file foto)
// function saveData(e) {
//     e.preventDefault();
//     let formElement = document.getElementById('sdmForm');
//     let formData = new FormData(formElement);

//     fetch(`${baseUrl}/sdm/simpan`, {
//         method: 'POST',
//         body: formData
//     })
//     .then(res => res.json())
//     .then(res => {
//         if (res.status) {
//             alert(res.message);
//             $('#formModal').modal('hide');
//             loadDashboardData(); // Sinkronisasi ulang UI tanpa reload halaman
//         } else {
//             alert('Gagal menyimpan: ' + (res.message || 'Terjadi kesalahan sistem.'));
//         }
//     })
//     .catch(err => console.error("Error saat menyimpan data:", err));
// }

// CREATE: Membuka Modal Form Kosong
function showTambahModal() {
    // Reset isi form bawaan browser
    const formElement = document.getElementById('karyawanForm');
    formElement.reset();
    
    // Hapus sisa-sisa kelas error validasi dari input sebelumnya
    formElement.classList.remove('was-validated');
    
    // Pastikan ID diset kosong agar dideteksi sebagai operasi INSERT oleh CI4
    $('#form-id').val('');
    $('#modalTitle').text('Tambah Karyawan Baru');
    $('#formModal').modal('show');
}

// FORM SUBMIT HANDLER: Validasi Input JavaScript sebelum data terkirim
function saveData(e) {
    e.preventDefault(); // Menghentikan submit otomatis halaman browser
    
    const formElement = document.getElementById('karyawanForm');
    
    // 1. Jalankan pengecekan validasi Bootstrap bawaan (HTML5 Validation)
    if (formElement.checkValidity() === false) {
        e.stopPropagation();
        formElement.classList.add('was-validated'); // Memunculkan teks merah di bawah input kosong
        return false; // Stop proses, jangan kirim data ke server
    }
    
    // Tambahkan kelas validasi sukses sebelum data dikirim
    formElement.classList.add('was-validated');

    // 2. PROSES LANJUTAN: Kirim payload form data via AJAX jika validasi lolos
    let formData = new FormData(formElement);

    fetch(`${baseUrl}/karyawan/simpan`, {
        method: 'POST',
        body: formData
    })
    .then(res => res.json())
    .then(res => {
        if (res.status) {
            alert(res.message);
            $('#formModal').modal('hide');
            loadDashboardData(); // Sinkronisasi ulang UI tabel & chart tanpa reload halaman
        } else {
            alert('Gagal menyimpan: ' + (res.message || 'Terjadi kesalahan sistem.'));
        }
    })
    .catch(err => {
        console.error("Error saat menyimpan data:", err);
        alert('Terjadi kesalahan koneksi saat mengirim data.');
    });
}
