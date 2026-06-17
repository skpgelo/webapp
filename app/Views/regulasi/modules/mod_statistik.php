<?= $this->extend('layouts/stisla') ?>

<?= $this->section('styles') ?>
<style>
    .chart-container {
        position: relative;
        height: 320px;
        width: 100%;
    }
</style>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<!-- SECTION FILTER RENTANG TAHUN -->
<div class="row">
    <div class="col-12">
        <div class="card shadow-sm border-bottom-0">
            <div class="card-body py-3">
                <form action="<?= base_url('statistik'); ?>" method="GET" class="form-inline d-flex justify-content-between align-items-center flex-wrap">
                    <div class="d-flex align-items-center flex-wrap">
                        <span class="font-weight-600 mr-3 mb-2"><i class="fas fa-filter text-primary mr-1"></i> Filter Periode:</span>
                        
                        <!-- Tahun Mulai -->
                        <select name="tahun_mulai" class="form-control form-control-sm mr-2 mb-2">
                            <option value="">-- Tahun Mulai --</option>
                            <?php foreach($opsi_tahun as $t): ?>
                                <option value="<?= $t['tahun']; ?>" <?= $filter_mulai == $t['tahun'] ? 'selected' : ''; ?>><?= $t['tahun']; ?></option>
                            <?php endforeach; ?>
                        </select>

                        <span class="mr-2 mb-2">s/d</span>

                        <!-- Tahun Selesai -->
                        <select name="tahun_selesai" class="form-control form-control-sm mr-2 mb-2">
                            <option value="">-- Tahun Selesai --</option>
                            <?php foreach($opsi_tahun as $t): ?>
                                <option value="<?= $t['tahun']; ?>" <?= $filter_selesai == $t['tahun'] ? 'selected' : ''; ?>><?= $t['tahun']; ?></option>
                            <?php endforeach; ?>
                        </select>

                        <button type="submit" class="btn btn-sm btn-primary mb-2 mr-2"><i class="fas fa-search mr-1"></i> Terapkan</button>
                        <?php if(!empty($filter_mulai) || !empty($filter_selesai)): ?>
                            <a href="<?= base_url('statistik'); ?>" class="btn btn-sm btn-light mb-2 text-danger"><i class="fas fa-times"></i> Bersihkan</a>
                        <?php endif; ?>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="row mt-2">
    <!-- ================= SISI KIRI: WIDGET & TABEL STATISTIK ================= -->
    <div class="col-lg-6 col-md-12">
        <!-- Mini Card Grand Total -->
        <div class="card card-statistic-1 shadow-sm mb-3">
            <div class="card-icon bg-primary">
                <i class="fas fa-file-archive"></i>
            </div>
            <div class="card-wrap">
                <div class="card-header">
                    <h4>Grand Total Dokumen Terfilter</h4>
                </div>
                <div class="card-body">
                    <?= $grand_total; ?> <small class="text-muted" style="font-size: 14px;">Berkas</small>
                </div>
            </div>
        </div>

        <!-- Tabel Akumulasi -->
        <div class="card shadow-sm">
            <div class="card-header bg-whitesmoke text-dark">
                <h4><i class="fas fa-table mr-2 text-primary"></i>Tabel Akumulasi Kelompok</h4>
            </div>
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-striped table-md align-middle mb-0">
                        <thead class="table-dark">
                            <tr>
                                <th style="width: 12%;">#</th>
                                <th>Kelompok Dokumen</th>
                                <th class="text-center">Total Berkas</th>
                                <th class="text-center">Persentase</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if(!empty($statistik_kelompok)): ?>
                                <?php 
                                $no = 1; 
                                foreach($statistik_kelompok as $stat): 
                                    $persen = ($grand_total > 0) ? ($stat['total_dokumen'] / $grand_total) * 100 : 0;
                                ?>
                                <tr>
                                    <td><?= $no++; ?></td>
                                    <td><span class="font-weight-600"><?= esc($stat['kelompok']); ?></span></td>
                                    <td class="text-center font-weight-bold text-primary"><?= $stat['total_dokumen']; ?> Berkas</td>
                                    <td class="text-center">
                                        <div class="d-flex align-items-center justify-content-center">
                                            <span class="mr-2 font-weight-600"><?= round($persen, 1); ?>%</span>
                                            <div class="progress" style="height: 6px; width: 60px;">
                                                <div class="progress-bar bg-success" style="width: <?= $persen; ?>%"></div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <?php endforeach; ?>
                                <tr class="table-secondary font-weight-bold">
                                    <td colspan="2" class="text-right text-uppercase">Total:</td>
                                    <td class="text-center text-dark"><?= $grand_total; ?> Bks</td>
                                    <td class="text-center text-dark">100%</td>
                                </tr>
                            <?php else: ?>
                                <tr>
                                    <td colspan="4" class="text-center text-muted py-4">Tidak ada data untuk rentang tahun ini.</td>
                                </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- ================= SISI KANAN: GRAFIK (CHART.JS) BERDAMPINGAN ================= -->
    <div class="col-lg-6 col-md-12">
        <div class="card shadow-sm">
            <div class="card-header bg-whitesmoke d-flex justify-content-between align-items-center">
                <h4><i class="fas fa-chart-pie mr-2 text-primary"></i>Visualisasi Grafik</h4>
                <!-- Tab Navigasi Pilihan Tipe Grafik -->
                <ul class="nav nav-pills" id="chartTab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active py-1 px-3" id="pie-tab" data-toggle="tab" href="#pieContent" role="tab"><i class="fas fa-chart-pie"></i> Lingkaran</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link py-1 px-3" id="bar-tab" data-toggle="tab" href="#barContent" role="tab"><i class="fas fa-chart-bar"></i> Batang</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link py-1 px-3" id="line-tab" data-toggle="tab" href="#lineContent" role="tab"><i class="fas fa-chart-line"></i> Garis</a>
                    </li>
                </ul>
            </div>
            <div class="card-body">
                <div class="tab-content" id="chartTabContent">
                    
                    <!-- 1. GRAFIK LINGKARAN (PIE CHRART) -->
                    <div class="tab-pane fade show active" id="pieContent" role="tabpanel">
                        <div class="chart-container">
                            <canvas id="myPieChart"></canvas>
                        </div>
                    </div>
                    
                    <!-- 2. GRAFIK BATANG (BAR CHART) -->
                    <div class="tab-pane fade" id="barContent" role="tabpanel">
                        <div class="chart-container">
                            <canvas id="myBarChart"></canvas>
                        </div>
                    </div>

                    <!-- 3. GRAFIK GARIS (LINE CHART TREN) -->
                    <div class="tab-pane fade" id="lineContent" role="tabpanel">
                        <div class="chart-container">
                            <canvas id="myLineChart"></canvas>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>

<?= $this->section('scripts') ?>
<!-- Muat Library Chart.js Resmi via CDN -->
<script src="https://jsdelivr.net"></script>

<script>
    document.addEventListener("DOMContentLoaded", function () {
        
        // --- PARSING DATA DARI PHP CODEIGNITER 4 KE JAVASCRIPT ---
        const dataKelompok = <?= json_encode($statistik_hirarki); ?>;
        const dataTren = <?= json_encode($statistik_tren); ?>;

        // Ekstrak Label dan Nilai untuk Grafik Kelompok (Pie & Bar)
        const labelsKelompok = dataKelompok.map(item => item.hirarki);
        const valuesKelompok = dataKelompok.map(item => parseInt(item.total_dokumen));

        // Ekstrak Label dan Nilai untuk Grafik Tren (Line)
        const labelsTren = dataTren.map(item => item.tahun);
        const valuesTren = dataTren.map(item => parseInt(item.total_tahunan));

        // Konfigurasi Palet Warna Statis yang Estetik
        const chartColors = ['#3f51b5', '#26a69a', '#ffb300', '#ec407a', '#78909c'];

        // ================= 1. INISIALISASI PIE CHART =================
        const ctxPie = document.getElementById('myPieChart').getContext('2d');
        new Chart(ctxPie, {
            type: 'pie',
            data: {
            labels: labelsKelompok,
            datasets: [{
            data: valuesKelompok,
            backgroundColor: chartColors.slice(0, labelsKelompok.length),
            }]
            },
            options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
            legend: { position: 'bottom' }
            }
            }
            });
            // ================= 2. INISIALISASI BAR CHART =================
            const ctxBar = document.getElementById('myBarChart').getContext('2d');
            new Chart(ctxBar, {
            type: 'bar',
            data: {
            labels: labelsKelompok,
            datasets: [{
            label: 'Jumlah Dokumen Berkas',
            data: valuesKelompok,
            backgroundColor: '#3f51b5',
            borderRadius: 4
            }]
            },
            options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: { legend: { display: false } },
            scales: {
            y: { beginAtZero: true, ticks: { stepSize: 1 } }
            }
            }
            });
            // ================= 3. INISIALISASI LINE CHART =================
            const ctxLine = document.getElementById('myLineChart').getContext('2d');
            new Chart(ctxLine, {
            type: 'line',
            data: {
            labels: labelsTren,
            datasets: [{
            label: 'Tren Kenaikan Dokumen',
            data: valuesTren,
            borderColor: '#ec407a',
            backgroundColor: 'rgba(236, 64, 122, 0.1)',
            fill: true,
            tension: 0.3,
            pointRadius: 5,
            pointHoverRadius: 7
            }]
            },
            options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: { legend: { position: 'top' } },
            scales: {
            y: { beginAtZero: true, ticks: { stepSize: 1 } }
            }
            }
            });
            });
</script>
<?= $this->endSection() ?>