    <link href="https://jsdelivr.net" rel="stylesheet">
    <style>
        body { background: #f4f6f9; }
        .emp-img { width: 50px; height: 50px; object-fit: cover; border-radius: 50%; }
        .card { border: none; box-shadow: 0 4px 12px rgba(0,0,0,0.05); }
    </style>


<div class="container py-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h3 class="fw-bold text-dark">Data Master Karyawan</h3>
        <button class="btn btn-dark fw-bold shadow-sm" onclick="showModalAdd()">+ Tambah Karyawan</button>
    </div>

    <!-- KOMPONEN BARU: FORM SEARCH DUA PARAMETER -->
    <div class="card p-4 rounded-3 mb-4">
        <h6 class="fw-bold text-secondary mb-3">Filter Pencarian</h6>
        <form id="searchForm" class="row g-3 align-items-end">
            <div class="col-md-4">
                <label class="form-label small fw-bold text-muted">Tanggal Lahir</label>
                <input type="date" class="form-control" id="searchTglLahir">
            </div>
            <div class="col-md-4">
                <label class="form-label small fw-bold text-muted">Nama Unit</label>
                <input type="text" class="form-control" id="searchUnit" placeholder="Contoh: IT, HRD, Produksi">
            </div>
            <div class="col-md-4 d-flex gap-2">
                <button type="submit" class="btn btn-primary fw-bold w-100">Cari Data</button>
                <button type="button" class="btn btn-outline-secondary fw-bold" onclick="resetSearch()">Reset</button>
            </div>
        </form>
    </div>

    <!-- Tabel Tampilan Data -->
    <div class="card p-4 rounded-3">
        <div class="table-responsive">
            <table class="table table-hover align-middle">
                <thead class="table-light">
                    <tr>
                        <th>Foto</th>
                        <th>ID Karyawan</th>
                        <th>Nama</th>
                        <th>Unit</th>
                        <th>Tgl Lahir</th>
                        <th>Foreign ID</th>
                        <th>Alamat</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody id="employeeTableBody">
                    <!-- Data dimuat secara asinkron oleh JS -->
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Modal Form Tambah / Edit -->
<div class="modal fade" id="employeeModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title fw-bold" id="modalTitle">Tambah Karyawan</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="employeeForm" enctype="multipart/form-data">
                    <input type="hidden" id="empId">
                    
                    <div class="mb-2">
                        <label class="form-label small fw-bold">ID Karyawan (Employee ID)</label>
                        <input type="text" class="form-control" id="employeeId" required>
                    </div>
                    <div class="mb-2">
                        <label class="form-label small fw-bold">Nama Lengkap</label>
                        <input type="text" class="form-control" id="name" required>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-2">
                            <label class="form-label small fw-bold">Tanggal Lahir</label>
                            <input type="date" class="form-control" id="tglLahir" required>
                        </div>
                        <div class="col-md-6 mb-2">
                            <label class="form-label small fw-bold">Unit / Divisi</label>
                            <input type="text" class="form-control" id="unit" required>
                        </div>
                    </div>
                    <div class="mb-2">
                        <label class="form-label small fw-bold">Foreign ID</label>
                        <input type="number" class="form-control" id="foreignId" required>
                    </div>
                    <div class="mb-2">
                        <label class="form-label small fw-bold">Alamat</label>
                        <textarea class="form-control" id="address" rows="2" required></textarea>
                    </div>
                    <div class="mb-3">
                        <label class="form-label small fw-bold">Foto Karyawan</label>
                        <input type="file" class="form-control" id="image" accept="image/*">
                    </div>
                    
                    <button type="submit" class="btn btn-primary w-100 fw-bold py-2">Simpan Data</button>
                </form>
            </div>
        </div>
    </div>
</div>

<script src="https://jsdelivr.net"></script>

<script>
    const baseUrl = '<?= base_url("employee") ?>';
    const uploadUrl = '<?= base_url("uploads") ?>';
    const myModal = new bootstrap.Modal(document.getElementById('employeeModal'));

    // --- 1. AMBIL DATA (READ & SEARCH ENGINE) ---
    async function loadTable(tglLahir = '', unit = '') {
        try {
            // Menyusun query string URL secara dinamis untuk filter pencarian
            const urlParameters = new URLSearchParams({ tgl_lahir: tglLahir, unit: unit }).toString();
            
            const response = await fetch(`${baseUrl}/getAllData?${urlParameters}`);
            const data = await response.json();
            
            let rows = '';
            if (data.length === 0) {
                rows = `<tr><td colspan="8" class="text-center text-muted py-4">Data tidak ditemukan sesuai kriteria filter.</td></tr>`;
            } else {
                data.forEach(item => {
                    const imgSrc = item.image ? `${uploadUrl}/${item.image}` : 'https://placeholder.com';
                    
                    rows += `
                        <tr>
                            <td><img src="${imgSrc}" class="emp-img shadow-sm"></td>
                            <td class="fw-bold">${item.employee_id}</td>
                            <td>${item.name}</td>
                            <td><span class="badge bg-light text-dark border">${item.unit}</span></td>
                            <td class="small">${item.tgl_lahir}</td>
                            <td><span class="badge bg-secondary">${item.foreign_id}</span></td>
                            <td class="text-muted small">${item.address}</td>
                            <td>
                                <button class="btn btn-sm btn-warning fw-bold me-1" onclick="editData(${item.id})">Edit</button>
                                <button class="btn btn-sm btn-danger fw-bold" onclick="deleteData(${item.id})">Hapus</button>
                            </td>
                        </tr>`;
                });
            }
            document.getElementById('employeeTableBody').innerHTML = rows;
        } catch (err) { console.error("Gagal memuat data:", err); }
    }

    // Ambil data default awal saat halaman siap
    loadTable();

    // --- LOGIKA EVENT SEARCH ---
    document.getElementById('searchForm').addEventListener('submit', function(e) {
        e.preventDefault();
        const tglLahirValue = document.getElementById('searchTglLahir').value;
        const unitValue = document.getElementById('searchUnit').value;
        
        // Memanggil tabel ulang dengan parameter filter yang diisi user
        loadTable(tglLahirValue, unitValue);
    });

    function resetSearch() {
        document.getElementById('searchForm').reset();
        loadTable(); // Tampilkan kembali seluruh data tanpa filter
    }

    // --- 2. EKSEKUSI DATA (CREATE & UPDATE) ---
    function showModalAdd() {
        document.getElementById('employeeForm').reset();
        document.getElementById('empId').value = '';
        document.getElementById('modalTitle').innerText = 'Tambah Karyawan';
        myModal.show();
    }

    document.getElementById('employeeForm').addEventListener('submit', async (e) => {
        e.preventDefault();
        
        const id = document.getElementById('empId').value;
        const formData = new FormData();
        formData.append('employee_id', document.getElementById('employeeId').value);
        formData.append('name', document.getElementById('name').value);
        formData.append('foreign_id', document.getElementById('foreignId').value);
        formData.append('address', document.getElementById('address').value);
        formData.append('tgl_lahir', document.getElementById('tglLahir').value); // Append Baru
        formData.append('unit', document.getElementById('unit').value);           // Append Baru
        
        const fileInput = document.getElementById('image');
        if (fileInput.files[0]) {
            formData.append('image', fileInput.files[0]);
        }

        const url = id ? `${baseUrl}/update/${id}` : baseUrl;

        try {
            const response = await fetch(url, { method: 'POST', body: formData });
            const result = await response.json();
            
                    alert(result.message);
                    myModal.hide();
                    resetSearch(); // Muat ulang data bersih
                } catch (err) { console.error("Aksi form gagal:", err); }
            });

    // --- 3. AMBIL DATA EDIT ---
    async function editData(id) {

        try {
            const response = await fetch(`${baseUrl}/${id}`);
        if (!response.ok) return;
            const item = await response.json();
            document.getElementById('empId').value = item.id;
            document.getElementById('employeeId').value = item.employee_id;
            document.getElementById('name').value = item.name;
            document.getElementById('foreignId').value = item.foreign_id;
            document.getElementById('address').value = item.address;
            document.getElementById('tglLahir').value = item.tgl_lahir; // Set nilai lama
            document.getElementById('unit').value = item.unit; // Set nilai lama
            document.getElementById('modalTitle').innerText = 'Ubah Data Karyawan';
            myModal.show();
            
            } catch (err) { console.error("Gagal ambil detail:", err); }
        }

    // --- 4. HAPUS DATA ---
    async function deleteData(id) {
        if (!confirm("Hapus data karyawan ini?")) return;

        try {
            const response = await fetch(`${baseUrl}/${id}`, { method: 'DELETE' });
            const result = await response.json();
                    alert(result.message);
                    resetSearch();
        } catch (err) { console.error("Gagal menghapus:", err); }
        }
