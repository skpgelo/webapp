// CREATE: Membuka Modal Form Kosong
function showTambahModal() {
    // Reset isi form bawaan browser
    document.getElementById('sdmForm').reset();
    
    // Pastikan ID diset kosong agar dideteksi sebagai operasi INSERT oleh CI4
    $('#form-id').val('');
    $('#modalTitle').text('Tambah Pegawai Baru');
    $('#formModal').modal('show');
}

// CREATE & UPDATE HANDLER: Kirim payload form data (Mendukung upload file foto)
function saveData(e) {
    e.preventDefault();
    let formElement = document.getElementById('sdmForm');
    let formData = new FormData(formElement);

    fetch(`${baseUrl}/sdm/simpan`, {
        method: 'POST',
        body: formData
    })
    .then(res => res.json())
    .then(res => {
        if (res.status) {
            alert(res.message);
            $('#formModal').modal('hide');
            loadDashboardData(); // Sinkronisasi ulang UI tanpa reload halaman
        } else {
            alert('Gagal menyimpan: ' + (res.message || 'Terjadi kesalahan sistem.'));
        }
    })
    .catch(err => console.error("Error saat menyimpan data:", err));
}
