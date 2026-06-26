<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>Dashboard Karyawan &mdash; Stisla</title>

    <!-- Stisla & Bootstrap 4 CSS (Sesuai Spek Template Stisla) -->
    <link rel="stylesheet" href="https://jsdelivr.net">
    <link rel="stylesheet" href="https://fontawesome.com">
    <link rel="stylesheet" href="https://cloudflare.com">

    <!-- Google Charts -->
    <script type="text/javascript" src="https://gstatic.com"></script>

    <style>
        /* CSS Integrasi Google Org Chart agar sinkron dengan Stisla */
        #chart_div { display: flex; justify-content: center; overflow-x: auto; padding: 20px; background: #fff; border-radius: 5px; }
        .custom-node { border: 2px solid #6777ef !important; background-color: #fff !important; border-radius: 8px !important; padding: 8px 12px !important; display: flex; align-items: center; gap: 10px; min-width: 170px; box-shadow: 0 4px 8px rgba(0,0,0,0.03); }
        .node-avatar { width: 40px; height: 40px; border-radius: 50%; object-fit: cover; border: 2px solid #6777ef; }
        .node-name { font-weight: 700; color: #191d21; font-size: 13px; text-align: left; }
        .node-title { font-size: 11px; color: #fc544b; font-style: italic; text-align: left; }
    </style>
</head>

<body class="bg-light text-dark" style="font-size: 14px;">
    <div class="container-fluid py-4">
        
        <!-- Header -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Manajemen Struktur & Karyawan</h1>
            <button class="btn btn-primary shadow-sm" onclick="showTambahModal()">
                <i class="fas fa-plus fa-sm text-white-50"></i> Tambah Karyawan
            </button>
        </div>

        <!-- STISLA COLLAPSE ACCORDION STATISTIK -->
        <div class="accordion mb-4" id="accordionStatistik">
            <div class="card border-left-primary shadow h-100">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between" style="cursor:pointer;" data-toggle="collapse" data-target="#collapseStatistik">
                    <h6 class="m-0 font-weight-bold text-primary"><i class="fas fa-chart-pie mr-2"></i> Klik untuk Melihat Ringkasan & Statistik Karyawan</h6>
                </div>
                <div id="collapseStatistik" class="collapse" data-parent="#accordionStatistik">
                    <div class="card-body">
                        <div class="row">
                            <!-- Total Karyawan -->
                            <div class="col-md-4 mb-3">
                                <div class="card bg-primary text-white text-center p-3">
                                    <h6>Total Karyawan</h6>
                                    <h2 id="stat-total" class="font-weight-bold">0</h2>
                                </div>
                            </div>
                            <!-- Komposisi Gender -->
                            <div class="col-md-4 mb-3">
                                <div class="card p-3 border">
                                    <h6 class="font-weight-bold text-secondary">Komposisi Gender</h6>
                                    <div id="stat-gender-list"></div>
                                </div>
                            </div>
                            <!-- Distribusi Jabatan -->
                            <div class="col-md-4 mb-3">
                                <div class="card p-3 border">
                                    <h6 class="font-weight-bold text-secondary">Distribusi Jabatan</h6>
                                    <div id="stat-jabatan-list" style="max-height: 120px; overflow-y:auto;"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- GOOGLE ORG CHART (Mulai Terlipat) -->
        <div class="card shadow mb-4">
            <div class="card-header py-3"><h6 class="m-0 font-weight-bold text-primary"><i class="fas fa-sitemap mr-2"></i> Bagan Organisasi (Klik 2x untuk Ekspan/Lipat Atasan)</h6></div>
            <div class="card-body"><div id="chart_div"></div></div>
        </div>

        <!-- TABEL DATA KARYAWAN (CRUD LIST) -->
        <div class="card shadow mb-4">
            <div class="card-header py-3"><h6 class="m-0 font-weight-bold text-primary"><i class="fas fa-table mr-2"></i> List Data Karyawan</h6></div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered align-middle" width="100%" cellspacing="0">
                        <thead class="bg-gray-100">
                            <tr>
                                <th>Foto</th><th>Nama / ID Card</th><th>Jabatan</th><th>Gender</th><th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody id="tabel-karyawan-body">
                    <?php if (!empty($struktur)): ?>
                        <?php foreach ($struktur as $row): ?>
                            <tr>
                                <td><?= esc($row['id']) ?></td>
                                <td>
                                    <?php if (!empty($row['foto'])): ?>
                                        <!-- Sesuaikan base_url folder penyimpanan foto Anda -->
                                        <img src="<?= base_url('uploads/' . $row['foto']) ?>" alt="Foto" class="img-thumbnail" style="max-width: 80px;">
                                    <?php else: ?>
                                        <span class="text-muted">Tidak ada foto</span>
                                    <?php endif; ?>
                                </td>
                                <td>
                                    <strong><?= esc($row['nama']) ?></strong><br>
                                    <small class="text-muted">NIP. <?= esc($row['nip']) ?></small>
                                </td>
                                <td><?= esc($row['jabatan']) ?></td>
                            </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="4" class="text-center">Data pegawai kosong.</td>
                        </tr>
                    <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>

    <!-- ==================== MODAL FORM (TAMBAH / EDIT) ==================== -->
    <div class="modal fade" id="formModal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <form id="karyawanForm" onsubmit="saveData(event)" enctype="multipart/form-data">
                    <div class="modal-header bg-primary text-white">
                        <h5 class="modal-title" id="modalTitle">Tambah Karyawan</h5>
                        <button class="close text-white" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                    </div>
                    <div class="modal-body p-4">
                        <input type="hidden" name="id" id="form-id">
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label class="font-weight-bold">Nama Lengkap</label>
                                <input type="text" name="nama" id="form-nama" class="form-control" required>
                            </div>
                            <div class="form-group col-md-6">
                                <label class="font-weight-bold">Nomor ID Card</label>
                                <input type="text" name="id_card" id="form-id_card" class="form-control" required>
                            </div>
                            <div class="form-group col-md-6">
                                <label class="font-weight-bold">Jabatan</label>
                                <input type="text" name="jabatan" id="form-jabatan" class="form-control" required>
                            </div>
                            <div class="form-group col-md-6">
                                <label class="font-weight-bold">Atasan (Silsilah Organisasi)</label>
                                <select name="parent_id" id="form-parent_id" class="form-control">
                                    <!-- Diisi via JS dinamis -->
                                </select>
                            </div>
                            <div class="form-group col-md-6">
                                <label class="font-weight-bold">Tempat Lahir</label>
                                <input type="text" name="tmp_lahir" id="form-tmp_lahir" class="form-control">
                            </div>
                            <div class="form-group col-md-6">
                                <label class="font-weight-bold">Tanggal Lahir</label>
                                <input type="date" name="tgl_lahir" id="form-tgl_lahir" class="form-control">
                            </div>
                            <div class="form-group col-md-6">
                                <label class="font-weight-bold">Email</label>
                                <input type="email" name="emai" id="form-emai" class="form-control">
                            </div>
                            <div class="form-group col-md-6">
                                <label class="font-weight-bold">Jenis Kelamin</label>
                                <select name="gender" id="form-gender" class="form-control">
                                    <option value="L">Laki-laki</option>
                                    <option value="P">Perempuan</option>
                                </select>
                            </div>
                            <div class="form-group col-12">
                                <label class="font-weight-bold">Alamat Rumah</label>
                                <textarea name="alamat" id="form-alamat" class="form-control" rows="2"></textarea>
                            </div>
                            <div class="form-group col-12">
                                <label class="font-weight-bold">Upload Foto Profil</label>
                                <input type="file" name="foto" class="form-control-file">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
                        <button class="btn btn-primary" type="submit">Simpan Data</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
<!-- ==================== MODAL FORM (TAMBAH / EDIT) Detail Profil Karyawan ==================== -->
<!-- Bagian dari VIEW/READ: Menampilkan data lengkap individu -->
<div class="modal fade" id="detailModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-success text-white">
                <h5 class="modal-title"><i class="fas fa-user-circle mr-2"></i> Detail Profil Karyawan</h5>
                <button class="close text-white" type="button" data-dismiss="modal"><span>×</span></button>
            </div>
            <div class="modal-body text-center p-4">
                <img id="detail-foto" src="" class="rounded-circle border mb-3 shadow-sm" style="width:110px; height:110px; object-fit:cover;">
                <h4 id="detail-nama" class="font-weight-bold text-dark mb-0">-</h4>
                <span id="detail-jabatan" class="badge badge-danger mt-1 px-3 py-1 rounded-pill">-</span>
                <table class="table table-sm table-striped border text-left mt-4">
                    <tr><th width="40%">ID Card</th><td id="detail-id_card"></td></tr>
                    <tr><th>Gender</th><td id="detail-gender"></td></tr>
                    <tr><th>TTL</th><td id="detail-ttl"></td></tr>
                    <tr><th>Email</th><td id="detail-email"></td></tr>
                    <tr><th>Alamat</th><td id="detail-alamat" class="text-wrap"></td></tr>
                </table>
            </div>
        </div>
    </div>
</div>






<script>
let globalKaryawanData = [];
const baseUrl = '';
const placeholder = 'flaticon.com';
google.charts.load('current', {packages:["orgchart"]});
$(document).ready(function() {
loadDashboardData();
});
// 1. AJAX: Ambil semua data server & render ke semua komponen
function loadDashboardData() {
fetch(${baseUrl}/karyawan/getAllData)
.then(res => res.json())
.then(data => {
globalKaryawanData = data.struktur;
renderStatistik(data);
renderTabel(data.struktur);
renderDropdownAtasan(data.struktur);
google.charts.setOnLoadCallback(() => drawOrgChart(data.struktur));
});
}
// 2. Render Statistik
function renderStatistik(data) {
$('#stat-total').text(data.total_karyawan);
let htmlGender = '';
data.stat_gender.forEach(g => {
let gLabel = g.gender === 'L' ? '👨 Laki-laki' : '👩 Perempuan';
htmlGender += <div class="d-flex justify-content-between border-bottom py-1"><span>${gLabel}</span><b>${g.jumlah} Orang</b></div>;
});
$('#stat-gender-list').html(htmlGender || 'Data Kosong');
let htmlJabatan = '';
data.stat_jabatan.forEach(j => {
htmlJabatan += <div class="d-flex justify-content-between border-bottom py-1"><span class="text-truncate" style="max-width:140px;">💼 ${j.jabatan}</span><b>${j.jumlah}</b></div>;
});
$('#stat-jabatan-list').html(htmlJabatan || 'Data Kosong');
}

// 3. Render Data ke HTML Tabel List Karyawan

function renderTabel(karyawanList) {
let html = '';
karyawanList.forEach(k => {
let imgPath = k.foto ? ${baseUrl}/uploads/foto/${k.foto} : placeholder;
html += <tr> <td class="text-center"><img src="${imgPath}" class="rounded-circle border shadow-sm" style="width:40px; height:40px; object-fit:cover;"></td> <td><strong>${k.nama}</strong><br><small class="text-muted">ID: ${k.id_card}</small></td> <td><span class="badge badge-light border text-dark">${k.jabatan}</span></td> <td>${k.gender === 'L' ? 'Laki-laki' : 'Perempuan'}</td> <td> <button class="btn btn-info btn-sm" onclick="showDetailModal(${k.id})"><i class="fas fa-eye"></i></button> <button class="btn btn-warning btn-sm" onclick="showEditModal(${k.id})"><i class="fas fa-edit"></i></button> <button class="btn btn-danger btn-sm" onclick="deleteData(${k.id})"><i class="fas fa-trash"></i></button> </td> </tr>;
});
$('#tabel-karyawan-body').html(html || 'Belum ada data');
}

// 4. Sinkronisasi Dropdown Pilihan Atasan di Form

function renderDropdownAtasan(karyawanList) {
let options = '-- Tanpa Atasan (Pimpinan Tertinggi) --';
karyawanList.forEach(k => {
options += <option value="${k.id}">${k.nama} (${k.jabatan})</option>;
});
$('#form-parent_id').html(options);
}
// 3. Render Data ke HTML Tabel List Karyawan

function drawOrgChart(karyawanList) {
var data = new google.visualization.DataTable();
data.addColumn('string', 'EntityId');
data.addColumn('string', 'ParentId');
data.addColumn('string', 'ToolTip');
karyawanList.forEach(k => {
let parentId = (k.parent_id && k.parent_id != 0) ? String(k.parent_id) : '';
let imgPath = k.foto ? ${baseUrl}/uploads/foto/${k.foto} : placeholder;
let nodeHtml = <div class="custom-node" onclick="showDetailModal(${k.id})"> <img src="${imgPath}" class="node-avatar"> <div> <div class="node-name">${k.nama}</div> <div class="node-title">${k.jabatan}</div> </div> </div>;
data.addRow([{ 'v': String(k.id), 'f': nodeHtml }, parentId, k.jabatan]);
});
if(karyawanList.length === 0) return;
var chart = new google.visualization.OrgChart(document.getElementById('chart_div'));
chart.draw(data, { 'allowHtml': true, 'allowCollapse': true, 'size': 'medium' });
// Otomatis terlipat semua (Collapse All) saat pertama dimuat
for (var i = 0; i < data.getNumberOfRows(); i++) {
chart.collapse(i, true);
}
}
// ==================== OPERASI CRUD (JAVASCRIPT ACTION) ====================

function showTambahModal() {
$('#karyawanForm')[0].reset();
$('#form-id').val('');
$('#modalTitle').text('Tambah Karyawan');
$('#formModal').modal('show');
}
function showDetailModal(id) {
let k = globalKaryawanData.find(item => item.id == id);
if (!k) return;
$('#detail-foto').attr('src', k.foto ? ${baseUrl}/uploads/foto/${k.foto} : placeholder);
$('#detail-nama').text(k.nama);
$('#detail-jabatan').text(k.jabatan);
$('#detail-id_card').text(k.id_card);
$('#detail-gender').text(k.gender === 'L' ? 'Laki-laki' : 'Perempuan');
$('#detail-ttl').text(${k.tmp_lahir || '-'}, ${k.tgl_lahir || '-'});
$('#detail-email').text(k.emai || '-');
$('#detail-alamat').text(k.alamat || '-');
$('#detailModal').modal('show');
}
function showEditModal(id) {
let k = globalKaryawanData.find(item => item.id == id);
if (!k) return;
$('#form-id').val(k.id);
$('#form-nama').val(k.nama);
$('#form-id_card').val(k.id_card);
$('#form-jabatan').val(k.jabatan);
$('#form-parent_id').val(k.parent_id || '');
$('#form-tmp_lahir').val(k.tmp_lahir);
$('#form-tgl_lahir').val(k.tgl_lahir);
$('#form-emai').val(k.emai);
$('#form-gender').val(k.gender);
$('#form-alamat').val(k.alamat);
$('#modalTitle').text('Edit Karyawan');
$('#formModal').modal('show');
}
function saveData(e) {
e.preventDefault();
let formData = new FormData(document.getElementById('karyawanForm'));
fetch(${baseUrl}/karyawan/simpan, {
method: 'POST',
body: formData
})
.then(res => res.json())
.then(res => {
if(res.status) {
alert(res.message);
$('#formModal').modal('hide');
loadDashboardData(); // Reload instant tanpa refresh page
}
});
}
function deleteData(id) {
if (confirm('Apakah Anda yakin ingin menghapus data ini? Hubungan struktur di bawahnya akan disesuaikan otomatis.')) {
fetch(${baseUrl}/karyawan/hapus/${id}, { method: 'DELETE' })
.then(res => res.json())
.then(res => {
if(res.status) {
alert(res.message);
loadDashboardData();
}
});
}
}
</script>

