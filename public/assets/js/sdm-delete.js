// DELETE: Eksekusi penghapusan data
function deleteData(id) {
    if (confirm('Apakah Anda yakin ingin menghapus pegawai ini? Hubungan struktur bawahan di bawahnya akan disesuaikan otomatis menjadi pimpinan tertinggi.')) {
        
        fetch(`${baseUrl}/sdm/hapus/${id}`, { 
            method: 'DELETE' 
        })
        .then(res => res.json())
        .then(res => {
            if (res.status) {
                alert(res.message);
                loadDashboardData(); // Gambar ulang komponen halaman secara instant
            } else {
                alert('Gagal menghapus data.');
            }
        })
        .catch(err => console.error("Error saat menghapus data:", err));
    }
}
