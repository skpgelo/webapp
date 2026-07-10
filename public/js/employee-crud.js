// Membaca konfigurasi jalur tautan URL dari parameter global view
const { baseUrl, uploadUrl } = CONFIG;

// Mengambil referensi JQuery Modal Bootstrap 4
const $formModal = $('#employeeModal');

// --- 1. PROSES BACA DATA (READ & ADVANCE SEARCH) ---
async function fetchEmployeeTable(tglLahir = '', unit = '') {
    try {
        const queryParams = new URLSearchParams({ tgl_lahir: tglLahir, unit: unit }).toString();
        const response = await fetch(`${baseUrl}/getAllData?${queryParams}`);
        const data = await response.json();
        
        let tableRows = '';
        
        if (data.length === 0) {
            tableRows = `
                <tr>
                    <td colspan="8" class="text-center text-muted py-5 font-weight-bold">
                        <i class="fas fa-folder-open d-block mb-2 style="font-size: 24px;"></i>
                        Tidak ada data karyawan yang cocok dengan kriteria.
                    </td>
                </tr>`;
        } else {
            data.forEach(item => {
                const imgSrc = item.image ? `${uploadUrl}/${item.image}` : 'https://placeholder.com';
                
                tableRows += `
                    <tr>
                        <td>
                            <div class="emp-avatar-container">
                                <img src="${imgSrc}" alt="Avatar">
                            </div>
                        </td>
                        <td class="font-weight-bold">${item.employee_id}</td>
                        <td>${item.name}</td>
                        <td><div class="badge badge-light border font-weight-bold">${item.unit}</div></td>
                        <td><i class="far fa-calendar-alt text-muted mr-1"></i> ${item.tgl_lahir}</td>
                        <td><span class="badge badge-secondary px-2">${item.foreign_id}</span></td>
                        <td class="text-muted small text-truncate" style="max-width: 150px;">${item.address}</td>
                        <td class="text-center">
                            <button class="btn btn-sm btn-warning btn-icon" onclick="prepareEditData(${item.id})" title="Ubah Data">
                                <i class="fas fa-pencil-alt"></i>
                            </button>
                            <button class="btn btn-sm btn-danger btn-icon" onclick="executeDeleteData(${item.id})" title="Hapus Data">
                                <i class="fas fa-trash"></i>
                            </button>
                        </td>
                    </tr>`;
            });
        }
        document.getElementById('employeeTableBody').innerHTML = tableRows;
    } catch (err) {
        console.error("Gagal memuat data tabel API:", err);
    }
}

// Inisialisasi awal saat dokumen selesai dimuat
document.addEventListener('DOMContentLoaded', () => {
    fetchEmployeeTable();
});

// ==========================================
// FUNGSI BARU: UPDATE STISLA INFO-BOX WIDGETS
// ==========================================
async function updateSummaryWidgets() {
    try {
        const response = await fetch(`${baseUrl}/getSummaryWidgets`);
        const stats = await response.json();
        
        // Memperbarui nilai teks pada elemen box widget
        document.getElementById('widgetTotalEmployees').innerText = stats.total_employees;
        document.getElementById('widgetTotalUnits').innerText = stats.total_units;
        document.getElementById('widgetBirthday').innerText = stats.birthday_this_month;
    } catch (err) {
        console.error("Gagal memuat statistik widget:", err);
    }
}

// Mengambil data tabel asli dengan integrasi pembaruan widget
async function fetchEmployeeTable(tglLahir = '', unit = '') {
    try {
        const queryParams = new URLSearchParams({ tgl_lahir: tglLahir, unit: unit }).toString();
        const response = await fetch(`${baseUrl}/getAllData?${queryParams}`);
        const data = await response.json();
        
        let tableRows = '';
        if (data.length === 0) {
            tableRows = `<tr><td colspan="8" class="text-center text-muted py-5 font-weight-bold"><i class="fas fa-folder-open d-block mb-2 style="font-size: 24px;"></i>Tidak ada data karyawan.</td></tr>`;
        } else {
            data.forEach(item => {
                const imgSrc = item.image ? `${uploadUrl}/${item.image}` : 'https://placeholder.com';
                tableRows += `
                    <tr>
                        <td><div class="emp-avatar-container"><img src="${imgSrc}" alt="Avatar"></div></td>
                        <td class="font-weight-bold">${item.employee_id}</td>
                        <td>${item.name}</td>
                        <td><div class="badge badge-light border font-weight-bold">${item.unit}</div></td>
                        <td><i class="far fa-calendar-alt text-muted mr-1"></i> ${item.tgl_lahir}</td>
                        <td><span class="badge badge-secondary px-2">${item.foreign_id}</span></td>
                        <td class="text-muted small text-truncate" style="max-width: 150px;">${item.address}</td>
                        <td class="text-center">
                            <button class="btn btn-sm btn-warning btn-icon" onclick="prepareEditData(${item.id})"><i class="fas fa-pencil-alt"></i></button>
                            <button class="btn btn-sm btn-danger btn-icon" onclick="executeDeleteData(${item.id})"><i class="fas fa-trash"></i></button>
                        </td>
                    </tr>`;
            });
        }
        document.getElementById('employeeTableBody').innerHTML = tableRows;
        
        // PANGGIL UPDATE WIDGET SETIAP KALI TABEL DISEGARKAN
        updateSummaryWidgets();
        
    } catch (err) {
        console.error("Gagal memuat data tabel:", err);
    }
}

// Pemicu muat awal saat halaman dibuka
document.addEventListener('DOMContentLoaded', () => {
    fetchEmployeeTable();
});

// --- LOGIKA EVENT FORM PENCARIAN & RESET (Sama seperti sebelumnya) ---
document.getElementById('searchForm').addEventListener('submit', function(e) {
    e.preventDefault();
    fetchEmployeeTable(document.getElementById('searchTglLahir').value, document.getElementById('searchUnit').value);
});

function resetSearch() {
    document.getElementById('searchForm').reset();
    fetchEmployeeTable();
}

// --- LOGIKA FORM SUBMIT (TAMBAH / EDIT) ---
document.getElementById('employeeForm').addEventListener('submit', async (e) => {
    e.preventDefault();
    const id = document.getElementById('empId').value;
    const formData = new FormData();
    
    formData.append('employee_id', document.getElementById('employeeId').value);
    formData.append('name', document.getElementById('name').value);
    formData.append('foreign_id', document.getElementById('foreignId').value);
    formData.append('address', document.getElementById('address').value);
    formData.append('tgl_lahir', document.getElementById('tglLahir').value);
    formData.append('unit', document.getElementById('unit').value);
    
    const fileSelector = document.getElementById('image');
    if (fileSelector.files.length > 0) formData.append('image', fileSelector.files[0]);

    const endpointUrl = id ? `${baseUrl}/update/${id}` : baseUrl;

    try {
        const response = await fetch(endpointUrl, { method: 'POST', body: formData });
        const result = await response.json();
        $formModal.modal('hide');
        
        Swal.fire({ icon: 'success', title: 'Berhasil!', text: result.message, timer: 1500, showConfirmButton: false });
        resetSearch(); // Otomatis menyegarkan tabel & widget
    } catch (err) {
        Swal.fire({ icon: 'error', title: 'Oops...', text: 'Gagal memproses data.' });
    }
});

// --- AMBIL DETAIL UNTUK EDIT DATA ---
async function prepareEditData(id) {
    try {
        const response = await fetch(`${baseUrl}/${id}`);
        const item = await response.json();
        
        document.getElementById('empId').value = item.id;
        document.getElementById('employeeId').value = item.employee_id;
        document.getElementById('name').value = item.name;
        document.getElementById('foreignId').value = item.foreign_id;
        document.getElementById('address').value = item.address;
        document.getElementById('tglLahir').value = item.tgl_lahir;
        document.getElementById('unit').value = item.unit;
        
        document.getElementById('modalTitle').innerText = 'Ubah Informasi Karyawan';
        $formModal.modal('show');
    } catch (err) { console.error(err); }
}

// --- LOGIKA HAPUS DATA ---
function executeDeleteData(id) {
    Swal.fire({
        title: 'Apakah Anda Yakin?',
        text: "Data karyawan akan dihapus permanen!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#fc544b',
        cancelButtonColor: '#6c757d',
        confirmButtonText: 'Ya, Hapus!',
        cancelButtonText: 'Batal'
    }).then(async (result) => {
        if (result.isConfirmed) {
            try {
                const response = await fetch(`${baseUrl}/${id}`, { method: 'DELETE' });
                const res = await response.json();
                
                Swal.fire({ icon: 'success', title: 'Terhapus!', text: res.message, timer: 1500, showConfirmButton: false });
                resetSearch(); // Otomatis menyegarkan tabel & widget
            } catch (err) { Swal.fire({ icon: 'error', title: 'Gagal!', text: 'Gagal menghapus.' }); }
        }
    });
}


