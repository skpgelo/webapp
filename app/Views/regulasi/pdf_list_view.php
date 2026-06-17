<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar File PDF</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://jsdelivr.net" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link href="https://jsdelivr.net" rel="stylesheet">
    
    <style>
        /* Efek Smooth Transition Kustom untuk Modal */
        .modal.fade .modal-dialog {
            transform: scale(0.9) translateY(30px);
            opacity: 0;
            transition: transform 0.4s cubic-bezier(0.34, 1.56, 0.64, 1), opacity 0.3s ease-out;
        }
        .modal.show .modal-dialog {
            transform: scale(1) translateY(0);
            opacity: 1;
        }
        /* Layout Belah Dua di Dalam Modal */
        .pdf-preview-container {
            height: 75vh;
            border-right: 1px solid #dee2e6;
        }
        .pdf-details-container {
            height: 75vh;
            overflow-y: auto;
            padding-left: 20px;
        }
        iframe {
            width: 100%;
            height: 100%;
            border: none;
            border-radius: 4px;
        }
    </style>
</head>
<body class="bg-light py-5">

<div class="container">
    <div class="card shadow-sm">
        <div class="card-header bg-primary text-white">
            <h5 class="mb-0"><i class="bi bi-file-earmark-pdf-fill me-2"></i>Daftar Dokumen PDF</h5>
        </div>
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover table-striped align-middle mb-0">
                    <thead class="table-dark">
                        <tr>
                            <th>Nama File</th>
                            <th>Kelompok</th>
                            <th>Keterangan</th>
                            <th>Tahun</th>
                            <th class="text-center" style="width: 250px;">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if(!empty($pdf_list)): ?>
                            <?php foreach($pdf_list as $pdf): ?>
                            <tr>
                                <td class="fw-semibold"><?= esc($pdf['nama_file']); ?></td>
                                <td><span class="badge bg-secondary"><?= esc($pdf['kelompok']); ?></span></td>
                                <td><?= esc($pdf['ket']); ?></td>
                                <td><?= esc($pdf['tahun']); ?></td>
                                <td class="text-center">
                                    <!-- Tombol Detail / View PDF -->
                                    <button type="button" 
                                            class="btn btn-sm btn-info text-white btn-detail" 
                                            data-id="<?= $pdf['id']; ?>"
                                            data-nama="<?= esc($pdf['nama_file']); ?>"
                                            data-kelompok="<?= esc($pdf['kelompok']); ?>"
                                            data-ket="<?= esc($pdf['ket']); ?>"
                                            data-tahun="<?= esc($pdf['tahun']); ?>"
                                            data-url="<?= base_url('uploads/pdf/' . $pdf['nama_file']); ?>">
                                        <i class="bi bi-eye-fill me-1"></i> Detail
                                    </button>
                                    
                                    <!-- Tombol Download Langsung -->
                                    <a href="<?= base_url('pdf/download/' . $pdf['id']); ?>" class="btn btn-sm btn-success">
                                        <i class="bi bi-download me-1"></i> Download
                                    </a>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="5" class="text-center text-muted py-4">Tidak ada data file PDF tersedia.</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- MODAL DETAIL & VIEW PDF (SMOOTH TRANSITION) -->
<div class="modal fade" id="pdfModal" tabindex="-1" aria-labelledby="pdfModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-centered">
        <div class="modal-content shadow-lg">
            <div class="modal-header bg-dark text-white">
                <h5 class="modal-title" id="pdfModalLabel"><i class="bi bi-file-pdf me-2 text-danger"></i>Pratinjau Dokumen</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body p-0">
                <div class="container-fluid">
                    <div class="row">
                        <!-- SISI KIRI: View PDF -->
                        <div class="col-md-7 p-3 pdf-preview-container bg-secondary bg-opacity-10">
                            <iframe id="pdfViewer" src="" title="PDF Viewer"></iframe>
                        </div>
                        
                        <!-- SISI KANAN: Teks Detail PDF -->
                        <div class="col-md-5 p-4 pdf-details-container d-flex flex-column justify-content-between">
                            <div>
                                <h4 class="border-bottom pb-2 mb-3 text-primary">Detail File</h4>
                                <table class="table table-borderless fs-6">
                                    <tr>
                                        <th style="width: 30%;">Nama File</th>
                                        <td>: <span id="detNama" class="fw-bold text-break"></span></td>
                                    </tr>
                                    <tr>
                                        <th>Kelompok</th>
                                        <td>: <span id="detKelompok" class="badge bg-secondary fs-6"></span></td>
                                    </tr>
                                    <tr>
                                        <th>Tahun</th>
                                        <td>: <span id="detTahun"></span></td>
                                    </tr>
                                    <tr>
                                        <th>Keterangan</th>
                                        <td>: <p id="detKet" class="text-muted mt-1 text-wrap"></p></td>
                                    </tr>
                                </table>
                            </div>
                            <!-- Tombol Download di Dalam Modal -->
                            <div class="pt-3 border-top">
                                <a id="detDownloadBtn" href="" class="btn btn-success w-100 py-2">
                                    <i class="bi bi-download me-2"></i>Unduh Dokumen Sekarang
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Bootstrap 5 Bundle JS -->
<script src="https://jsdelivr.net"></script>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const pdfModal = new bootstrap.Modal(document.getElementById('pdfModal'));
        
        // Tangkap semua tombol detail
        document.querySelectorAll('.btn-detail').forEach(button => {
            button.addEventListener('click', function () {
                // Ambil data dari atribut tombol yang diklik
                const id = this.getAttribute(
'data-id');
                const nama = this.getAttribute('data-nama');
                const kelompok = this.getAttribute('data-kelompok');
                const ket = this.getAttribute('data-ket');
                const tahun = this.getAttribute('data-tahun');
                const pdfUrl = this.getAttribute('data-url');

                // Inject data ke komponen modal sisi kanan
                document.getElementById('detNama').innerText = nama;
                document.getElementById('detKelompok').innerText = kelompok;
                document.getElementById('detTahun').innerText = tahun;
                document.getElementById('detKet').innerText = ket;
                
                // Set link download untuk tombol di dalam modal
                document.getElementById('detDownloadBtn').setAttribute('href', '<?= base_url('pdf/download/'); ?>' + id);

                // Inject URL file ke iframe sisi kiri untuk preview
                document.getElementById('pdfViewer').setAttribute('src', pdfUrl);

                // Tampilkan modal dengan transisi smooth
                pdfModal.show();
            });
        });

        // Bersihkan src iframe saat modal ditutup agar proses streaming file berhenti
        document.getElementById('pdfModal').addEventListener('hidden.bs.modal', function () {
            document.getElementById('pdfViewer').setAttribute('src', '');
        });
    });
</script>
</body>
</html>
