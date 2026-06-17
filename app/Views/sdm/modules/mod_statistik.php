<!-- Bagian dari VIEW/READ: Menampilkan ringkasan data -->
<div class="accordion mb-4" id="accordionStatistik">
    <div class="card card-primary shadow-sm">
        <div class="card-header py-3" style="cursor:pointer;" data-toggle="collapse" data-target="#collapseStatistik">
            <h4><i class="fas fa-chart-pie mr-2"></i> Klik untuk Ringkasan Statistik</h4>
        </div>
        <div id="collapseStatistik" class="collapse" data-parent="#accordionStatistik">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-4 mb-3">
                        <div class="card bg-primary text-white text-center p-4 rounded shadow-sm">
                            <h6>Total Karyawan</h6>
                            <h2 id="stat-total" class="font-weight-bold mb-0">0</h2>
                        </div>
                    </div>
                    <div class="col-md-4 mb-3">
                        <div class="card p-3 border shadow-sm">
                            <h6 class="font-weight-bold text-muted border-bottom pb-2">Komposisi Gender</h6>
                            <div id="stat-gender-list"></div>
                        </div>
                    </div>
                    <div class="col-md-4 mb-3">
                        <div class="card p-3 border shadow-sm">
                            <h6 class="font-weight-bold text-muted border-bottom pb-2">Distribusi Jabatan</h6>
                            <div id="stat-jabatan-list" style="max-height: 120px; overflow-y:auto;"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
