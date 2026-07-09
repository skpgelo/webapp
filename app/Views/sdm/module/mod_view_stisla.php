<?= $this->extend('base/skeleton'); ?>

<?= $this->section('styles') ?>
    <style>
        body { background: #f4f6f9; }
        .emp-img { width: 50px; height: 50px; object-fit: cover; border-radius: 50%; }
        .card { border: none; box-shadow: 0 4px 12px rgba(0,0,0,0.05); }

        /* Bingkai Kotak Pratinjau Foto di Modal */
  .img-preview-box {
      width: 120px;
      height: 120px;
      margin: 10px auto 0 auto;
      position: relative;
      overflow: hidden;
      border-radius: 50%; /* Membuat pratinjau berbentuk bulat */
      border: 3px solid #e4e6fc;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
  }

  .img-preview-box img {
      width: 100%;
      height: 100%;
      object-fit: cover;
  }
</style>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="main-content">
  <?=$this->include('base/4row')?>
  <?=$this->include('base/4sub_section_header')?>

  <div class="section-body">
    <div class="row justify-content-center">
      <div class="col-md-12">
        <div class="card shadow-lg">
          <div class="col-12 col-sm-12 col-lg-12">
            <div class="card">
<!-- awal div card -->
              <div class="card-header d-flex justify-content-between align-items-center mb-3">
                <h4><?= $card_header;?></h4>
                <!-- <a href="/berita/tambah" class="btn btn-primary">Tambah Berita</a> -->
              </div>

  

  <div id="app">
    <!-- <div class="main-wrapper">
      <div class="navbar-bg"></div> -->
      
      <!-- Top Navbar -->
      <!-- <nav class="navbar main-navbar">
        <form class="form-inline mr-auto">
          <ul class="navbar-nav mr-3">
            <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a></li>
          </ul>
        </form>
      </nav> -->

      <!-- Sidebar Menu -->
      <!-- <div class="main-sidebar sidebar-style-2">
        <aside id="sidebar-wrapper">
          <div class="sidebar-brand">
            <a href="#">Stisla IoT</a>
          </div>
          <div class="sidebar-brand sidebar-brand-sm">
            <a href="#">SI</a>
          </div>
          <ul class="sidebar-menu">
            <li class="menu-header">Dashboard</li>
            <li class="active"><a class="nav-link" href="#"><i class="fas fa-users"></i> <span>Master Karyawan</span></a></li>
          </ul>
        </aside>
      </div> -->

      <!-- Main Content Area -->
      <!-- <div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>Manajemen Karyawan</h1>
            <div class="section-header-breadcrumb">
              <button class="btn btn-primary btn-icon icon-left" onclick="showModalAdd()">
                <i class="fas fa-plus"></i> Tambah Karyawan
              </button>
            </div>
          </div> -->

          <!-- <div class="section-body"> -->
            

  <!-- FILTER SEARCH CARD -->
            <div class="card card-primary">
              <!-- <div class="card-header">
                <h4>Filter Pencarian</h4>
              </div> -->
              <div class="card-body">
                <form id="searchForm" class="row align-items-end">
                  <div class="form-group col-md-4 mb-0">
                    <label class="font-weight-bold text-muted small">Tanggal Lahir</label>
                    <input type="date" class="form-control" id="searchTglLahir">
                  </div>
                  <div class="form-group col-md-4 mb-0">
                    <label class="font-weight-bold text-muted small">Jabatan</label>
                    <input type="text" class="form-control" id="searchUnit" placeholder="">
                  </div>
                  <div class="form-group col-md-4 mb-0 d-flex">
                    <button type="submit" class="btn btn-primary btn-lg btn-icon icon-left flex-grow-1 mr-2">
                      <i class="fas fa-search"></i> Cari
                    </button>
                    <button type="button" class="btn btn-light btn-lg text-secondary" onclick="resetSearch()">
                      Reset
                    </button>
                  </div>
                </form>
              </div>
            </div>

            <!-- DATA TABLE CARD -->
            <div class="card">
              <div class="card-body p-0">
                <div class="table-responsive">
                  <table class="table table-striped table-md align-middle mb-0">
                    <thead>
                      <tr>
                        <th>Foto</th>
                        <th>NIP</th>
                        <th>Nama</th>
                        <th>Jabatan</th>
                        <th>Tanggal Lahir</th>
                        <th>Foreign ID</th>
                        <th>Alamat</th>
                        <th class="text-center">Aksi</th>
                      </tr>
                    </thead>
                    <tbody id="employeeTableBody">
                      <!-- Data Diisi Secara Live Oleh Fetch API -->
                    </tbody>
                  </table>
                </div>
              </div>
            </div>

          </div>
        </section>
      </div>
    </div>
  </div>

  <!-- MODAL DIALOG FORM (TAMBAH / EDIT) -->
  <div class="modal fade" id="employeeModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content border-0 shadow-lg">
        <div class="modal-header bg-whitesmoke">
          <h5 class="modal-title font-weight-bold" id="modalTitle">Tambah Karyawan</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form id="employeeForm" enctype="multipart/form-data">
            <input type="hidden" id="empId">
            
            <div class="form-group">
              <label class="font-weight-bold small">NIP</label>
              <input type="text" class="form-control" id="employeeId" required>
            </div>
            <div class="form-group">
              <label class="font-weight-bold small">Nama Lengkap</label>
              <input type="text" class="form-control" id="name" required>
            </div>
            <div class="row">
              <div class="form-group col-md-6">
                <label class="font-weight-bold small">Tanggal Lahir</label>
                <input type="date" class="form-control" id="tglLahir" required>
              </div>
              <div class="form-group col-md-6">
                <label class="font-weight-bold small">Jabatan</label>
                <input type="text" class="form-control" id="unit" required>
              </div>
            </div>
            <div class="form-group">
              <label class="font-weight-bold small">Foreign ID</label>
              <input type="number" class="form-control" id="foreignId" required>
            </div>
            <div class="form-group">
              <label class="font-weight-bold small">Alamat Lengkap</label>
              <textarea class="form-control" id="address" rows="2" required></textarea>
            </div>
            <div class="form-group mb-0">
              <label class="font-weight-bold small">Unggah Foto</label>
              <input type="file" class="form-control-file" id="image" accept="image/*">
            </div>
            
            <div class="mt-4 text-right">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
              <button type="submit" class="btn btn-primary font-weight-bold px-4">Simpan</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>

<!-- akhir div card -->
                </div>
              </div>
            </div>
        </div>
    </div>
  </div>
</div>
<?= $this->endSection() ?>

<?= $this->section('script') ?>
  <!-- General JS Scripts Needed By Stisla (JQuery & Bootstrap 4 Bundle) -->
  <script src="https://jsdelivr.net"></script>
  <script src="https://jsdelivr.net"></script>
  <script src="https://cloudflare.com"></script>
  <script src="https://jsdelivr.net"></script>
  <script src="https://jsdelivr.net"></script>

  <!-- SweetAlert2 For Beautiful Popup Alerts -->
  <script src="https://jsdelivr.net"></script>

  <!-- Token passing Base URL parameter safely to Sliced Javascript -->
  <script>
    const CONFIG = {
      baseUrl: '<?= base_url("employee") ?>',
      uploadUrl: '<?= base_url("uploads") ?>'
    };
  </script>

<script>
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


</script>
<?= $this->endSection() ?>

</body>
</html>
