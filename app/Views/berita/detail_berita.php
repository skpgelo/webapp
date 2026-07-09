    <!-- Load Bootstrap 5 via CDN untuk Layout Grid Otomatis -->
    <link href="https://jsdelivr.net" rel="stylesheet">
    <!-- Load GLightbox (Library Lightbox Modern, Ringan, Tanpa jQuery) -->
    <link rel="stylesheet" href="https://jsdelivr.net" />
    <style>
        .gallery-item img {
            transition: transform 0.3s ease;
            object-fit: cover;
            height: 200px; /* Mengunci tinggi gambar agar sejajar rata */
            width: 100%;
        }
        .gallery-item img:hover {
            transform: scale(1.05); /* Efek zoom tipis saat kursor di atas gambar */
            cursor: pointer;
        }
        .cover-berita {
            max-height: 450px;
            object-fit: cover;
            width: 100%;
        }
    </style>

    <div class="container bg-white p-4 rounded shadow-sm" style="max-width: 900px;">
        <!-- 1. HEADER BERITA -->
        <h1 class="fw-bold mb-2"><?= esc($berita['judul_berita']) ?></h1>
        <p class="text-muted small mb-4">
            Diposting oleh: <strong><?= esc($berita['kontributor']) ?></strong> | 
            <?= date('d M Y H:i', strtotime($berita['created_at'])) ?>
        </p>

        <!-- 2. COVER IMAGE UTAMA -->
        <?php if (!empty($berita['cover_image'])): ?>
            <img src="<?= base_url('uploads/berita/cover/' . $berita['cover_image']) ?>" class="img-fluid rounded cover-berita mb-4" alt="Cover Berita">
        <?php endif; ?>

        <!-- 3. ISI BERITA (DARI CKEDITOR) -->
        <div class="article-content fs-5 line-height-lg mb-5">
            <!-- Gunakan format unescaped karena data CKEditor menyimpan tag HTML asli seperti <p>, <strong>, dll -->
            <?= $berita['isi_berita'] ?> 
        </div>

        <hr class="my-4">

        <!-- 4. ALBUM GALERI FOTO (GRID 3 KOLOM) -->
        <h3 class="fw-bold mb-3">Galeri Foto Pendukung</h3>
        
        <?php if (empty($galeri)): ?>
            <p class="text-muted italic">Tidak ada foto pendukung untuk berita ini.</p>
        <?php else: ?>
            <div class="row g-3"> <!-- g-3 mengatur jarak renggang antar kotak (gutter) -->
                <?php foreach ($galeri as $row): ?>
                    <div class="col-6 col-md-4">
                        <div class="card h-100 shadow-sm gallery-item overflow-hidden rounded">
                            
                            <!-- LINK href mengarah ke GAMBAR ASLI / BESAR -->
                            <a href="<?= base_url('uploads/berita/galeri/' . $row['cover_image']) ?>" class="glightbox" data-gallery="gallery1">
                                <!-- TAG img menampilkan GAMBAR THUMBNAIL / KECIL -->
                                <img src="<?= base_url('uploads/berita/galeri/thumb/' . $row['cover_image']) ?>" class="card-img-top" alt="Foto Dokumentasi">
                            </a>

                            <div class="card-footer bg-white p-2 text-end">
                                <small class="text-muted" style="font-size: 11px;">Oleh: <?= esc($row['pengupload']) ?></small>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>

    </div>

    <!-- Script GLightbox untuk mengaktifkan efek pop-up gambar -->
    <script src="https://jsdelivr.net"></script>
    <script>
        // Inisialisasi GLightbox untuk semua class .glightbox
        const lightbox = GLightbox({
            selector: '.glightbox',
            loop: true // Pengguna bisa geser (next/prev) foto secara terus-menerus
        });
    </script>
