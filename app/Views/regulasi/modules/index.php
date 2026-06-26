<?= $this->extend('base/skeleton'); ?>

<?= $this->section('styles') ?>
<!-- DataTables CSS Bootstrap 4 -->
<link rel="stylesheet" href="https://datatables.net">
<style>
    /* Efek Smooth Transition untuk Modal */
    .modal.fade .modal-dialog {
        transform: scale(0.9) translateY(30px);
        opacity: 0;
        transition: transform 0.4s cubic-bezier(0.34, 1.56, 0.64, 1), opacity 0.3s ease-out;
    }
    .modal.show .modal-dialog {
        transform: scale(1) translateY(0);
        opacity: 1;
    }
    .pdf-preview-container, .pdf-details-container { height: 70vh; }
    .pdf-details-container { overflow-y: auto; }
    iframe { width: 100%; height: 100%; border: none; border-radius: 4px; }
</style>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<!-- Notifikasi Alert Sukses / Gagal Upload -->
<?php if (session()->getFlashdata('success')) : ?>
    <div class="alert alert-success alert-dismissible show fade">
        <div class="alert-body">
            <button class="close" data-dismiss="alert"><span>&times;</span></button>
            <?= session()->getFlashdata('success') ?>
        </div>
    </div>
<?php endif; ?>

<div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1><?= $section_header;?></h1>
          </div>

          <?=$this->include('base/4row')?>
          <?=$this->include('base/4sub_section_header')?>

          <div class="section-body">

            <div class="row">
              <div class="col-12 col-md-6 col-lg-12">
                <div class="card">
                  <div class="card-header">
                    <h4><?= $card_header;?></h4>
                                        <a href="<?= base_url('pdf/create') ?>" class="btn btn-primary"><i class="fas fa-plus mr-1"></i> Tambah PDF</a>
                  </div>
                  <div class="card-body p-0">
                    <div class="table-responsive">
                      <table class="table table-striped table-md" id="pdfTable">            
<!-- <div class="card shadow-sm">
    <div class="card-header bg-whitesmoke d-flex justify-content-between align-items-center">
        <h4><i class="fas fa-table mr-2 text-primary"></i>Manajemen Berkas Dokumen</h4> -->
        <!-- Tombol Menuju Form Tambah -->
        <!-- <a href="<= base_url('pdf/create') ?>" class="btn btn-primary"><i class="fas fa-plus mr-1"></i> Tambah PDF</a>
    </div>
    <div class="card-body">
        <div class="table-responsive"> -->
            <!-- Tambahkan ID pdfTable di sini -->
            <!-- <table class="table table-striped table-md align-middle mb-0" id="pdfTable"> -->
                <thead>
                    <tr>
                        <th>Nama File</th>
                        <th>Kelompok</th>
                        <th>Keterangan</th>
                        <th>Tahun</th>
                        <th class="text-center" style="width: 200px;">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if(!empty($pdf_list)): ?>
                        <?php foreach($pdf_list as $pdf): ?>
                        <tr>
                            <td><span class="badge badge-secondary"><?= esc($pdf['kelompok']); ?></span></td>
                            <td class="font-weight-600"><?= esc($pdf['nama_file']); ?></td>
                            <td><?= esc($pdf['ket']); ?></td>
                            <td><?= esc($pdf['tahun']); ?></td>
                            <td class="text-center">
                                <button type="button" class="btn btn-sm btn-info btn-detail" 
                                        data-id="<?= $pdf['id']; ?>"
                                        data-nama="<?= esc($pdf['nama_file']); ?>"
                                        data-kelompok="<?= esc($pdf['kelompok']); ?>"
                                        data-ket="<?= esc($pdf['ket']); ?>"
                                        data-tahun="<?= esc($pdf['tahun']); ?>"
                                        data-url="<?= base_url('uploads/pdf/' . $pdf['nama_file']); ?>">
                                    <i class="fas fa-eye"></i> Detail
                                </button>
                                <a href="<?= base_url('pdf/download/' . $pdf['id']); ?>" class="btn btn-sm btn-success">
                                    <i class="fas fa-download"></i> Download
                                </a>
                            </td>
<!-- Bagian kolom aksi di dalam loop foreach data tabel -->
<td class="text-center">
    <div class="btn-group" role="group">
        <button type="button" class="btn btn-sm btn-info btn-detail" data-id="<?= $pdf['id']; ?>" data-nama="<?= esc($pdf['nama_file']); ?>" data-kelompok="<?= esc($pdf['kelompok']); ?>" data-ket="<?= esc($pdf['ket']); ?>" data-tahun="<?= esc($pdf['tahun']); ?>" data-url="<?= base_url('uploads/pdf/' . $pdf['nama_file']); ?>">
            <i class="fas fa-eye"></i>
        </button>
                                <a href="<?= base_url('pdf/download/' . $pdf['id']); ?>" class="btn btn-sm btn-success">
                                    <i class="fas fa-download"></i>
                                </a>
                                <!-- Tombol Edit Baru -->
                                <a href="<?= base_url('pdf/edit/' . $pdf['id']); ?>" class="btn btn-sm btn-warning">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <!-- Tombol Hapus Baru dengan Konfirmasi -->
                                <a href="<?= base_url('pdf/delete/' . $pdf['id']); ?>" class="btn btn-sm btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus file ini secara permanen dari server?');">
                                    <i class="fas fa-trash"></i>
                                </a>
                            </div>
                        </td>
                        </tr>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

          </div>
        </section>
      </div>

<!-- MODAL DETAIL (Sama seperti sebelumnya) -->
<div class="modal fade" id="pdfModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-centered" role="document">
        <div class="modal-content shadow-lg">
            <div class="modal-header bg-dark text-white">
                <h5 class="modal-title"><i class="fas fa-file-pdf mr-2 text-danger"></i>Pratinjau Dokumen</h5>
                <button type="button" class="close text-white" data-dismiss="modal"><span>&times;</span></button>
            </div>
            <div class="modal-body p-0">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-7 p-3 pdf-preview-container bg-secondary bg-opacity-10">
                            <iframe id="pdfViewer" src=""></iframe>
                        </div>
                        <div class="col-md-5 p-4 pdf-details-container d-flex flex-column justify-content-between">
                            <div>
                                <h4 class="border-bottom pb-2 mb-3 text-primary">Detail File</h4>
                                <table class="table table-borderless table-sm">
                                    <tr><th style="width: 30%;">Nama File</th><td>: <span id="detNama" class="font-weight-bold text-break"></span></td></tr>
                                    <tr><th>Kelompok</th><td>: <span id="detKelompok" class="badge badge-secondary"></span></td></tr>
                                    <tr><th>Tahun</th><td>: <span id="detTahun"></span></td></tr>
                                    <tr><th>Keterangan</th><td>: <p id="detKet" class="text-muted mt-1"></p></td></tr>
                                </table>
                            </div>
                            <div class="pt-3 border-top">
                                <a id="detDownloadBtn" href="" class="btn btn-success btn-block btn-lg shadow-sm"><i class="fas fa-download mr-2"></i>Unduh Dokumen</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>

<?= $this->section('scripts') ?>
<!-- DataTables & Bootstrap JS JS -->
<script src="https://datatables.net"></script>
<script src="https://datatables.net"></script>
<script>
    $(document).ready(function () {
        // Inisialisasi DataTables dengan Bahasa Indonesia
        $('#pdfTable').DataTable({
            "paging": true,
            "ordering": true,
            "info": true,
            "lengthMenu":,
            "language": {
                "search": "Cari:",
                "lengthMenu": "Tampilkan _MENU_ data per halaman",
                "zeroRecords": "Data tidak ditemukan",
                "info": "Menampilkan halaman _PAGE_ dari _PAGES_",
                "infoEmpty": "Tidak ada data tersedia",
                "infoFiltered": "(difilter dari _MAX_ total data)",
                "paginate": {
                    "first": "Pertama",
                    "last": "Terakhir",
                    "next": "Lanjut",
                    "previous": "Kembali"
                }
            }
        });

        // Event handler detail modal (sama seperti sebelumnya)
        $('.btn-detail').on('click', function () {
            $('#detid_hirarki').text($(this).data('id_hirarki'));
            $('#detid_status').text($(this).data('id_status'));
            $('#detjudul').text($(this).data('judul'));
            $('#dettentang').text($(this).data('tentang'));
            $('#detjenis_peradilan').text($(this).data('jenis_peradilan'));
            $('#dett tempat_penetapan').text($(this).data('tempat_penetapan'));
            $('#detpemrakarsa').text($(this).data('pemrakarsa'));
            $('#detnomor').text($(this).data('nomor'));
            $('#detsumber').text($(this).data('sumber'));
            $('#dettgl_terbit').text($(this).data('tgl_terbit'));
            $('#detaktif').text($(this).data('aktif'));
            $('#detpdf').text($(this).data('pdf'));
            $('#detabstrak').text($(this).data('abstrak'));
            $('#detskata_kunci').text($(this).data('kata_kunci'));
            $('#detbahasa').text($(this).data('bahasa'));
            $('#detcreated_at').text($(this).data('created_at'));
            $('#detupdated_at').text($(this).data('updated_at'));
            $('#detdeleted_at').text($(this).data('deleted_at'));
            $('#detfile_name').text($(this).data('file_name'));
            $('#detfile_path').text($(this).data('file_path'));
            $('#detfile_type').text($(this).data('file_type'));
            $('#detDownloadBtn').attr('href', '<?= base_url('pdf/download/'); ?>' + $(this).data('id'));
            $('#pdfViewer').attr('src', $(this).data('url'));
            $('#pdfModal').modal('show');
        });

        $('#pdfModal').on('hidden.bs.modal', function () {
            $('#pdfViewer').attr('src', '');
        });
    });
</script>
<?= $this->endSection() ?>
