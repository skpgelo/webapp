// Konfigurasi Global Asset
const placeholder = 'https://flaticon.com';
let globalsdmData = [];

// Load Google Charts Core
google.charts.load('current', { packages: ["orgchart"] });

$(document).ready(function () {
    loadDashboardData();
});

// READ: Ambil seluruh data dari REST API Server
function loadDashboardData() {
    fetch(`${baseUrl}/sdm/getAllData`)
        .then(res => res.json())
        .then(data => {
            globalsdmData = data.struktur;
            renderStatistik(data);
            renderTabel(data.struktur);
            renderDropdownAtasan(data.struktur);
            google.charts.setOnLoadCallback(() => drawOrgChart(data.struktur));
        })
        .catch(err => console.error("Gagal memuat data dashboard:", err));
}

// VIEW: Tampilkan Angka & Grafik Ringkasan di Accordion
function renderStatistik(data) {
    $('#stat-total').text(data.total_s);
    
    let htmlGender = '';
    data.stat_gender.forEach(g => {
        let gLabel = g.gender === 'L' ? '👨 Laki-laki' : '👩 Perempuan';
        htmlGender += `<div class="d-flex justify-content-between border-bottom py-1"><span>${gLabel}</span><b>${g.jumlah} Orang</b></div>`;
    });
    $('#stat-gender-list').html(htmlGender || 'Data Kosong');

    let htmlJabatan = '';
    data.stat_jabatan.forEach(j => {
        htmlJabatan += `<div class="d-flex justify-content-between border-bottom py-1"><span class="text-truncate" style="max-width:140px;">💼 ${j.jabatan}</span><b>${j.jumlah}</b></div>`;
    });
    $('#stat-jabatan-list').html(htmlJabatan || 'Data Kosong');
}

// VIEW: Tampilkan list data ke komponen Tabel HTML
function renderTabel(sdmList) {
    let html = '';
    sdmList.forEach(k => {
        let imgPath = k.foto ? `${baseUrl}/uploads/foto/${k.foto}` : placeholder;
        html += `
            <tr>
                <td class="text-center"><img src="${imgPath}" class="rounded-circle border shadow-sm" style="width:40px; height:40px; object-fit:cover;"></td>
                <td><strong>${k.nama}</strong><br><small class="text-muted">ID: ${k.nip}</small></td>
                <td><span class="badge badge-light border text-dark">${k.jabatan}</span></td>
                <td>${k.gender === 'L' ? 'Laki-laki' : 'Perempuan'}</td>
                <td>
                    <button class="btn btn-info btn-sm" onclick="showDetailModal(${k.id})" title="Lihat Detail"><i class="fas fa-eye"></i></button>
                    <button class="btn btn-warning btn-sm" onclick="showEditModal(${k.id})" title="Ubah Data"><i class="fas fa-edit"></i></button>
                    <button class="btn btn-danger btn-sm" onclick="deleteData(${k.id})" title="Hapus"><i class="fas fa-trash"></i></button>
                </td>
            </tr>
        `;
    });
    $('#tabel-sdm-body').html(html || '<tr><td colspan="5" class="text-center">Belum ada data</td></tr>');
}

// VIEW: Render Bagan Google Org Chart (Otomatis Terlipat)
function drawOrgChart(sdmList) {
    var data = new google.visualization.DataTable();
    data.addColumn('string', 'EntityId');
    data.addColumn('string', 'ParentId');
    data.addColumn('string', 'ToolTip');

    sdmList.forEach(k => {
        let parentId = (k.parent_id && k.parent_id != 0) ? String(k.parent_id) : '';
        let imgPath = k.foto ? `${baseUrl}/uploads/foto/${k.foto}` : placeholder;
        
        let nodeHtml = `
            <div class="custom-node" onclick="showDetailModal(${k.id})">
                <img src="${imgPath}" class="node-avatar">
                <div>
                    <div class="node-name">${k.nama}</div>
                    <div class="node-title">${k.jabatan}</div>
                </div>
            </div>
        `;
        data.addRow([{ 'v': String(k.id), 'f': nodeHtml }, parentId, k.jabatan]);
    });

    if (sdmList.length === 0) return;

    var chart = new google.visualization.OrgChart(document.getElementById('chart_div'));
    chart.draw(data, { 'allowHtml': true, 'allowCollapse': true, 'size': 'medium' });

    // Collapse All saat pertama dimuat
    for (var i = 0; i < data.getNumberOfRows(); i++) {
        chart.collapse(i, true);
    }
}

// VIEW: Tampilkan isi data lengkap ke dalam Modal Detail Profil sdm
function showDetailModal(id) {
    let k = globalsdmData.find(item => item.id == id);
    if (!k) return;

    $('#detail-foto').attr('src', k.foto ? `${baseUrl}/uploads/foto/${k.foto}` : placeholder);
    $('#detail-nama').text(k.nama);
    $('#detail-jabatan').text(k.jabatan);
    $('#detail-nip').text(k.nip);
    $('#detail-gender').text(k.gender === 'L' ? 'Laki-laki' : 'Perempuan');
    $('#detail-ttl').text(`${k.ttl || '-'}, ${k.tgl_lahir || '-'}`);
    $('#detail-email').text(k.email || '-');
    $('#detail-gol').text(k.gol || '-');

    $('#detailModal').modal('show');
}

// VIEW: Update list pilihan dropdown relasi atasan secara dinamis
function renderDropdownAtasan(sdmList) {
    let options = '<option value="">-- Tanpa Atasan (Pimpinan Tertinggi) --</option>';
    sdmList.forEach(k => {
        options += `<option value="${k.id}">${k.nama} (${k.jabatan})</option>`;
    });
    $('#form-parent_id').html(options);
}
