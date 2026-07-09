<?= $this->extend('layouts/stisla') ?>

<?= $this->section('content') ?>
<div class="row">
    <!-- Widget Grand Total (Stisla Style) -->
    <div class="col-lg-4 col-md-6 col-sm-6 col-12">
        <div class="card card-statistic-1 shadow-sm">
            <div class="card-icon bg-primary">
                <i class="fas fa-file-archive"></i>
            </div>
            <div class="card-wrap">
                <div class="card-header">
                    <h4>Grand Total Dokumen</h4>
                </div>
                <div class="card-body">
                    <?= $grand_total; ?> <small class="text-muted" style="font-size: 14px;">Berkas</small>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row mt-4">
    <div class="col-md-8">
        <div class="card shadow-sm">
            <div class="card-header bg-whitesmoke text-dark">
                <h4><i class="fas fa-chart-bar mr-2 text-primary"></i>Tabel Akumulasi Kelompok Dokumen</h4>
            </div>
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-striped table-md align-middle mb-0">
                        <thead class="table-dark">
                            <tr>
                                <th style="width: 10%;">#</th>
                                <th>Kelompok Dokumen</th>
                                <th class="text-center" style="width: 25%;">Total Berkas</th>
                                <th class="text-center" style="width: 25%;">Persentase</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if(!empty($statistik_kelompok)): ?>
                                <?php 
                                $no = 1; 
                                foreach($statistik_kelompok as $stat): 
                                    // Hitung persentase kontribusi kelompok terhadap grand total
                                    $persen = ($grand_total > 0) ? ($stat['total_dokumen'] / $grand_total) * 100 : 0;
                                ?>
                                <tr>
                                    <td><?= $no++; ?></td>
                                    <td>
                                        <span class="font-weight-600"><?= esc($stat['kelompok']); ?></span>
                                    </td>
                                    <td class="text-center font-weight-bold text-primary">
                                        <?= $stat['total_dokumen']; ?> Berkas
                                    </td>
                                    <td class="text-center">
                                        <div class="d-flex align-items-center justify-content-center">
                                            <span class="mr-2 font-weight-600"><?= round($persen, 1); ?>%</span>
                                            <div class="progress" style="height: 6px; width: 80px;">
                                                <div class="progress-bar bg-success" role="progressbar" style="width: <?= $persen; ?>%" aria-valuenow="<?= $persen; ?>" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <?php endforeach; ?>
                                
                                <!-- Baris Grand Total di Bagian Paling Bawah Tabel -->
                                <tr class="table-secondary font-weight-bold">
                                    <td colspan="2" class="text-right text-uppercase">Grand Total Keseluruhan :</td>
                                    <td class="text-center text-dark" style="font-size: 15px;">
                                        <?= $grand_total; ?> Berkas
                                    </td>
                                    <td class="text-center text-dark">
                                        100%
                                    </td>
                                </tr>
                            <?php else: ?>
                                <tr>
                                    <td colspan="4" class="text-center text-muted py-4">Belum ada data dokumen untuk dikalkulasi.</td>
                                </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>
