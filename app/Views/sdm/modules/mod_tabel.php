<!-- Bagian dari VIEW/READ, mendatangkan tombol aksi UPDATE dan DELETE -->
<div class="card card-primary shadow-sm mb-4">
    <div class="card-header">
        <h4><i class="fas fa-table mr-2"></i> List Data Karyawan</h4>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-striped table-bordered" width="100%">
                <thead class="bg-light">
                    <tr>
                        <th>Foto</th>
                        <th>Nama / ID Card</th>
                        <th>Jabatan</th>
                        <th>Gender</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody id="tabel-karyawan-body">
                    <!-- Diisi otomatis oleh karyawan-read.js -->
                </tbody>
            </table>
        </div>
    </div>
</div>
