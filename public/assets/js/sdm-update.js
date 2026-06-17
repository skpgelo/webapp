// UPDATE: Ambil data Pegawai terpilih lalu isikan ke kolom input form
function showEditModal(id) {
    let k = globalsdmData.find(item => item.id == id);
    if (!k) return;

    // Masukkan data lama ke form modal
    $('#form-id').val(k.id);
    $('#form-nama').val(k.nama);
    $('#form-id_card').val(k.id_card);
    $('#form-jabatan').val(k.jabatan);
    $('#form-parent_id').val(k.parent_id || '');
    $('#form-ttl').val(k.ttl);
    $('#form-tgl_lahir').val(k.tgl_lahir);
    $('#form-email').val(k.email);
    $('#form-gender').val(k.gender);
    $('#form-gol').val(k.gol);

    // Ubah judul modal menjadi Edit
    $('#modalTitle').text('Ubah Profil Pegawai');
    $('#formModal').modal('show');
}
