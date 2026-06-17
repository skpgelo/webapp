<?= $this->extend('layouts/v_stisla') ?>

<?= $this->section('title') ?> Ruang Galeri Konten Multimedia <?= $this->endSection() ?>
<?= $this->section('page_header') ?> Ruang Integrasi Galeri Berita <?= $this->endSection() ?>

<?= $this->section('styles') ?>
<link rel="stylesheet" href="https://cloudflare.com">
<link rel="stylesheet" href="https://cloudflare.com">
<style>
    .gallery-carousel-img { height: 160px; object-fit: cover; width: 100%; border-radius: 4px; }
</style>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="row mb-4">
    <div class="col-12 text-right">
        <button class="btn btn-primary btn-lg shadow" onclick="bukaModalTambah()"><i class="fas fa-plus-circle mr-2"></i> Tambah Koleksi Gambar</button>
    </div>
</div>

<!-- Menggabungkan Semua Potongan Slicing Modul -->
<?= $this->include('galeri/modules/mod_carousel') ?>
<?= $this->include('galeri/modules/mod_tabel') ?>
<?= $this->include('galeri/modules/mod_form') ?>
<!-- Masukkan include ini bersama deretan modul lainnya di dalam section content -->
<?= $this->include('galeri/modules/mod_form') ?>
<?= $this->include('galeri/modules/mod_form_tematik') ?> <!-- File Baru Ditambahkan -->

<?= $this->endSection() ?>

<?= $this->section('scripts') ?>
<script src="https://cloudflare.com"></script>
<script>

// Membuka sub-modal input tematik khusus
function bukaModalTematik() {
    const formTematik = document.getElementById('tematikForm');
    formTematik.reset();
    formTematik.classList.remove('was-validated');
    $('#tematikFormModal').modal('show');
}

// CREATE: Submit data tematik ke database menggunakan AJAX
function submitTematik(e) {
    e.preventDefault();
    const form = document.getElementById('tematikForm');

    // Cek Validasi Form Sisi Klien
    if (form.checkValidity() === false) {
        e.stopPropagation();
        form.classList.add('was-validated');
        return false;
    }

    let fd = new FormData(form);

    fetch(`${baseUrl}/galeri/storeTematik`, { 
        method: 'POST', 
        body: fd 
    })
    .then(res => res.json())
    .then(res => {
        if(res.status) {
            alert(res.message);
            $('#tematikFormModal').modal('hide');
            
            // DINAMIS: Panggil kembali data komponen untuk memperbarui dropdown secara real-time
            muatSemuaKomponen(); 
        } else {
            alert('Gagal menyimpan agenda: ' + JSON.stringify(res.errors));
        }
    })
    .catch(err => {
        console.error("Error saat menyimpan tematik:", err);
        alert('Terjadi kendala jaringan saat menyimpan data tematik.');
    });
}

// Menampilkan atau menyembunyikan inputan range hari secara interaktif
function toggleHariInput(val) {
    if (val !== "") {
        $('#wrapper-hari').slideDown(250);
        $('#form-hari').attr('required', true);
    } else {
        $('#wrapper-hari').slideUp(250);
        $('#form-hari').attr('required', false).val(0);
    }
}

// Saat tombol tambah diklik, pastikan inputan hari disembunyikan kembali
function bukaModalTambah() {
    const form = document.getElementById('galeriForm');
    form.reset();
    form.classList.remove('was-validated');
    $('#wrapper-hari').hide();
    $('#galeriFormModal').modal('show');
}


const baseUrl = '<?= base_url() ?>';

    $(document).ready(function() {
        muatSemuaKomponen();
    });

    // READ: Ambil Data Paket dari Server
    function muatSemuaKomponen() {
        fetch(`${baseUrl}/galeri/getAllData`)
            .then(res => res.json())
            .then(data => {
                renderTabel(data.galeri);
                renderDropdowns(data.berita, data.tematik);
                renderMasterCarousels(data.galeri);
            });
    }

    // VIEW: Susun Tampilan Tabel Data
    function renderTabel(listGaleri) {
        let h = '';
        listGaleri.forEach(g => {
            let files = g.file_foto.split(',');
            h += `<tr>
                <td><strong>${g.judul_berita}</strong></td>
                <td><span class="badge badge-light border text-dark">${files[0]} ...</span></td>
                <td><span class="badge badge-primary">${g.total_foto} Gambar</span></td>
                <td>
                    <button class="btn btn-danger btn-sm" onclick="eksekusiHapus(${g.id_berita})"><i class="fas fa-trash"></i> Hapus Paket</button>
                </td>
            </tr>`;
        });
        $('#tabel-galeri-body').html(h || '<tr><td colspan="4" class="text-center">Belum ada lampiran berkas galeri.</td></tr>');
    }

    // VIEW & SOURCE DROPDOWN: Penggabungan id_tematik & tgl_tematik ke Dropdown
    function renderDropdowns(berita, tematik) {
        let bOpt = '<option value="">-- Pilih Target Berita --</option>';
        berita.forEach(b => bOpt += `<option value="${b.id}">${b.judul_berita}</option>`);
        $('#opt-berita').html(bOpt);

        let tOpt = '<option value="">-- Pilih Agenda Tematik --</option>';
        tematik.forEach(t => {
            // Format Tanggal Indonesia Sederhana (YYYY-MM-DD -> DD/MM/YYYY)
            let d = t.tgl_tematik.split('-').reverse().join('/');
            tOpt += `<option value="${t.id}">${t.judul_tematik} [Tanggal: ${d}]</option>`;
        });
        $('#opt-tematik').html(tOpt);
    }

    // VIEW: Membangun Struktur Grid & Multi Owl-Carousel per Berita
    function renderMasterCarousels(listGaleri) {
        let container = $('#container-carousel-master');
        container.empty();

        if(listGaleri.length === 0) {
            container.html('<div class="col-12"><div class="card p-4 text-center text-muted">Belum ada klaster album terikat berita.</div></div>');
            return;
        }

        listGaleri.forEach((g, index) => {
            let files = g.file_foto.split(',');
            let carouselId = `owl-inner-${g.id_berita}`;

            let cardHtml = `
                <div class="col-md-6 col-lg-4 mb-4">
                    <div class="card card-dark shadow-sm">
                        <div class="card-header py-2 bg-light"><h6 class="text-primary font-weight-bold text-truncate mb-0" style="max-width:260px;">${g.judul_berita}</h6></div>
                        <div class="card-body p-2">
                            <div class="owl-carousel owl-theme custom-gallery-slide" id="${carouselId}"></div>
                        </div>
                    </div>
                </div>`;
            
            container.append(cardHtml);

            // Suntikkan kumpulan elemen gambar ke dalam slider berita terkait
            let sliderEl = $(`#${carouselId}`);
            files.forEach(f => {
                sliderEl.append(`<div class="item"><img src="${baseUrl}/uploads/foto/${f}" class="gallery-carousel-img"></div>`);
            });

            // Jalankan inisialisasi Owl-Carousel mandiri pada klaster berita tersebut
            sliderEl.owlCarousel({
                items: 1,
                loop: false,
                margin: 5,
                nav: false,
                dots: true,
                autoplay: true,
                autoplayTimeout: 3000
            });
        });
    }

    function bukaModalTambah() {
        const form = document.getElementById('galeriForm');
        form.reset();
        form.classList.remove('was-validated');
        $('#galeriFormModal').modal('show');
    }

    // CREATE: Submit data payload form lewat Validasi Sisi Klien
    function submitGaleri(e) {
        e.preventDefault();
        const form = document.getElementById('galeriForm');

        if (form.checkValidity() === false) {
            e.stopPropagation();
            form.classList.add('was-validated');
            return false;
        }

        let fd = new FormData(form);
        fetch(`${baseUrl}/galeri/store`, { method: 'POST', body: fd })
            .then(res => res.json())
            .then(res => {
                if(res.status) {
                    alert(res.message);
                    $('#galeriFormModal').modal('hide');
                    muatSemuaKomponen(); // Re-draw instan tanpa reload halaman
                } else {
                    alert('Error: ' + JSON.stringify(res.errors || res.message));
                }
            });
    }

    // DELETE: Operasi pembersihan paket album foto
    function eksekusiHapus(id_berita) {
        if(confirm('Apakah Anda yakin ingin menghapus seluruh lampiran foto dari berita ini secara permanen?')) {
            fetch(`${baseUrl}/galeri/deleteByBerita/${id_berita}`, { method: 'DELETE' })
                .then(res => res.json())
                .then(res => {
                    alert(res.message);
                    muatSemuaKomponen();
                });
        }
    }
</script>
<?= $this->endSection() ?>
