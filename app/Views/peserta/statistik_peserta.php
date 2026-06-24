<?= $this->extend('layouts/v_stisla') ?>

<?= $this->section('title') ?> Tambah Peserta <?= $this->endSection() ?>
<?= $this->section('page_header') ?> Tambah Data Peserta <?= $this->endSection() ?>

<?= $this->section('content') ?>

          <div class="row">
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
              <div class="card card-statistic-1">
                <div class="card-icon bg-primary">
                  <i class="far fa-user"></i>
                </div>
                <div class="card-wrap">
                  <div class="card-header">
                    <h4>Peserta</h4>
                  </div>
                  <div class="card-body">
                    <?= $totalUsers ?? 0 ?>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
              <div class="card card-statistic-1">
                <div class="card-icon bg-danger">
                  <i class="far fa-newspaper"></i>
                </div>
                <div class="card-wrap">
                  <div class="card-header">
                    <h4>Asal Jawa Barat</h4>
                  </div>
                  <div class="card-body">
                    <?= $activeUsers ?? 0 ?>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
              <div class="card card-statistic-1">
                <div class="card-icon bg-warning">
                  <i class="far fa-file"></i>
                </div>
                <div class="card-wrap">
                  <div class="card-header">
                    <h4>Jawa Timur</h4>
                  </div>
                  <div class="card-body">
                    <?= $totalPeserta ?? 0 ?>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
              <div class="card card-statistic-1">
                <div class="card-icon bg-success">
                  <i class="fas fa-circle"></i>
                </div>
                <div class="card-wrap">
                  <div class="card-header">
                    <h4>Pria; Wanita;</h4>
                  </div>
                  <div class="card-body">
                    <?= $maleCount ?? 0 ?>, <?= $femaleCount ?? 0 ?>
                  </div>
                </div>
              </div>
            </div>
          </div>


            <div class="row">

              <div class="col-12 col-md-6 col-lg-6">
                <div class="card">
                  <div class="card-header">
                    <h4>Small Table, Caption &amp; Responsive</h4>
                  </div>
                  <div class="card-body">
                    <div class="section-title mt-0">Light</div>
                    <table class="table table-sm">
                      <thead>
                        <tr>
                          <th scope="col">Provinsi</th>
                          <th scope="col">Handle</th>
                        </tr>
                      </thead>
                      </tbody
                       <?php $grandTotal = 0; ?>
                       <?php foreach ($statistik_Prov as $row) : ?>
                        <tr>
                            <td><?= esc($row['provinsi']); ?></td>
                            <td><?= esc($row['total']); ?></td>
                        </tr>
                      <?php $grandTotal += $row['total']; ?>
                      <?php endforeach; ?>
                      </tbody>
                    </table>


                  </div>
                </div>
              </div>
                
              <div class="col-12 col-md-6 col-lg-6">
                <div class="card">
                  <div class="card-header">
                    <h4>Simple</h4>
                  </div>
                  <div class="card-body">
 
                  </div>
                </div>
              </div>

                           <div class="col-12 col-md-12 col-lg-12">
               <div class="card">
                  <div class="card-header">
                    <h4>ChartJS</h4>
                  </div>
                <div style="position: relative; height: 350px; width: 100%;">
                    <canvas id="myChartPeserta"></canvas>
                </div>
                             </div>
                </div>
              </div>

            </div>
             
<?= $this->endSection() ?>

<?= $this->section('chartjsScript') ?>
<script src="https://cloudflare.com"></script>
    <script>
    // Ambil data dari Controller yang sudah diperbaiki sebelumnya
    const chartLabels = <?php echo json_encode($label); ?>;
    const chartData = <?php echo json_encode($total); ?>;

    // Tampilkan data di console untuk memastikan data tidak kosong []
    console.log("Labels ditemukan:", chartLabels);
    console.log("Data ditemukan:", chartData);

    // Ambil elemen canvas
    const ctx = document.getElementById('myChartPeserta');
    
    // Eksekusi pembuatan Chart.js versi 3.x
    new Chart(ctx, {
        type: 'bar',
        data: {
            labels: chartLabels,
            datasets: [{
                label: 'Total Peserta',
                data: chartData,
                backgroundColor: [
                    'rgba(54, 162, 235, 0.6)',
                    'rgba(255, 99, 132, 0.6)',
                    'rgba(255, 206, 86, 0.6)',
                    'rgba(75, 192, 192, 0.6)'
                ],
                borderColor: [
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 99, 132, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)'
                ],
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
            </script>

<?= $this->endSection() ?>