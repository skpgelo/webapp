<?= $this->extend('layouts/v_stisla') ?>

<?= $this->section('title') ?> Berita Per Kategori (Tabs) <?= $this->endSection() ?>
<?= $this->section('page_header') ?> Navigasi Berita Kategori <?= $this->endSection() ?>

<?= $this->section('styles') ?>
<style>
    .img-box-news {
        height: 180px;
        object-fit: cover;
        width: 100%;
        border-radius: 4px 4px 0 0;
    }
    /* Kustomisasi agar warna tab Stisla lebih interaktif */
    .nav-tabs-custom .nav-item .nav-link {
        color: #6c757d;
        font-weight: 600;
        border: none;
        border-bottom: 2px solid transparent;
        padding: 12px 20px;
    }
    .nav-tabs-custom .nav-item .nav-link.active {
        color: #6777ef !important;
        border: none;
        border-bottom: 2px solid #6777ef;
        background: transparent;
    }
</style>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="row">
    <div class="col-12">
        
        <?php if (empty($kelompok_berita)): ?>
            <div class="card shadow-sm p-5 text-center">
                <div class="empty-state">
                    <div class="empty-state-icon bg-warning text-white"><i class="fas fa-folder-open"></i></div>
                    <h2>Belum Ada Berita</h2>
                    <p class="lead">Pastikan Anda sudah menginputkan kategori beserta rilis beritanya.</p>
                </div>
            </div>
        <?php else: ?>

            <!-- KONTEN UTAMA: CARD DENGAN NAVIGASI TAB HORIZONTAL -->
            <div class="card">
                <div class="card-header border-bottom-0 pb-0">
                    <!-- 1. HEADER TAB HORIZONTAL -->
                    <ul class="nav nav-tabs nav-tabs-custom" id="categoryTab" role="tablist">
                        <?php foreach ($kelompok_berita as $index => $kelompok): 
                            // Membuat ID unik yang aman untuk selector HTML Tab (menghapus spasi)
                            $tabId = 'kat-' . preg_replace('/[^A-Za-z0-9\-]/', '', strtolower($kelompok['nama_kategori']));
                        ?>
                            <li class="nav-item">
                                <a class="nav-link <?= $index === 0 ? 'active' : '' ?>" 
                                   id="<?= $tabId ?>-tab" 
                                   data-toggle="tab" 
                                   href="#<?= $tabId ?>" 
                                   role="tab" 
                                   aria-controls="<?= $tabId ?>" 
                                   aria-selected="<?= $index === 0 ? 'true' : 'false' ?>">
                                    📁 <?= esc($kelompok['nama_kategori']) ?> 
                                    <span class="badge badge-secondary ml-1" style="font-size: 10px; padding: 3px 6px;">
                                        <?= count($kelompok['daftar_berita']) ?>
                                    </span>
                                </a>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                </div>
                
                <!-- 2. KONTEN DARI TAB YANG AKTIF -->
                <div class="card-body mt-3">
                    <div class="tab-content" id="categoryTabContent">
                        <?php foreach ($kelompok_berita as $index => $kelompok): 
                            $tabId = 'kat-' . preg_replace('/[^A-Za-z0-9\-]/', '', strtolower($kelompok['nama_kategori']));
                        ?>
                            <div class="tab-pane fade <?= $index === 0 ? 'show active' : '' ?>" 
                                 id="<?= $tabId ?>" 
                                 role="tabpanel" 
                                 aria-labelledby="<?= $tabId ?>-tab">
                                
                                <!-- Deskripsi Kategori opsional -->
                                <?php if ($kelompok['keterangan']): ?>
                                    <p class="text-muted mb-4 bg-light p-3 rounded" style="font-style: italic;">
                                        <i class="fas fa-info-circle mr-1"></i> <?= esc($kelompok['keterangan']) ?>
                                    </p>
                                <?php endif; ?>

                                <!-- Grid Berita di dalam Kategori Terkait -->
                                <div class="row">
                                    <?php foreach ($kelompok['daftar_berita'] as $news): ?>
                                        <div class="col-12 col-sm-6 col-md-4 mb-4">
                                            <div class="card card-primary shadow-sm h-100 mb-0">
                                                <img src="<?= base_url('uploads/foto/' . $news['foto']) ?>" class="img-box-news" alt="Thumbnail">
                                                
                                                <div class="card-body p-3 d-flex flex-column justify-content-between">
                                                    <div>
                                                        <h5 class="font-weight-bold text-dark mb-2" style="line-height: 1.4; height: 44px; overflow: hidden; display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical;">
                                                            <?= esc($news['judul_berita']) ?>
                                                        </h5>
                                                        <p class="text-muted text-small mb-3" style="height: 54px; overflow: hidden; display: -webkit-box; -webkit-line-clamp: 3; -webkit-box-orient: vertical;">
                                                            <?= strip_tags($news['isi_berita']) ?>
                                                        </p>
                                                    </div>
                                                    
                                                    <div class="border-top pt-2 mt-2 d-flex justify-content-between align-items-center">
                                                        <span class="text-small text-muted font-weight-600">
                                                            <i class="far fa-user mr-1"></i> <?= esc(explode('@', $news['kontributor'])[0]) ?>
                                                        </span>
                                                        <span class="text-small text-muted">
                                                            <i class="far fa-calendar-alt mr-1"></i> <?= date('d M Y', strtotime($news['created_at'])) ?>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    <?php endforeach; ?>
                                </div> <!-- End Row -->

                            </div>
                        <?php endforeach; ?>
                    </div> <!-- End Tab Content -->
                </div>
            </div> <!-- End Card Master -->

        <?php endif; ?>

    </div>
</div>
<?= $this->endSection() ?>

<!-- baru -->

<!-- lama -->

<?= $this->extend('layouts/v_stisla') ?>

<?= $this->section('title') ?> Berita Per Kategori <?= $this->endSection() ?>
<?= $this->section('page_header') ?> Pengelompokan Berita Kategori <?= $this->endSection() ?>

<?= $this->section('styles') ?>
<style>
    .news-category-title {
        border-left: 4px solid #6777ef;
        padding-left: 15px;
        margin-bottom: 20px;
        font-weight: 700;
        color: #34395e;
    }
    .img-box-news {
        height: 180px;
        object-fit: cover;
        width: 100%;
        border-radius: 4px 4px 0 0;
    }
    .badge-kat {
        position: absolute;
        top: 15px;
        left: 15px;
        z-index: 10;
    }
</style>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="row">
    <div class="col-12">
        
        <?php if (empty($kelompok_berita)): ?>
            <div class="card shadow-sm p-5 text-center">
                <div class="empty-state">
                    <div class="empty-state-icon bg-warning text-white"><i class="fas fa-folder-open"></i></div>
                    <h2>Belum Ada Berita yang Dikelompokkan</h2>
                    <p class="lead">Pastikan Anda sudah menginputkan kategori beserta rilis beritanya.</p>
                </div>
            </div>
        <?php else: ?>
            
            <!-- Loop Kelompok Kategori Utama -->
            <?php foreach ($kelompok_berita as $kelompok): ?>
                <div class="mb-5">
                    <h3 class="news-category-title">
                        📁 Kategori: <?= esc($kelompok['nama_kategori']) ?>
                        <?php if ($kelompok['keterangan']): ?>
                            <br><small class="text-muted font-weight-normal" style="font-size: 13px;"><?= esc($kelompok['keterangan']) ?></small>
                        <?php endif; ?>
                    </h3>
                    
                    <div class="row">
                        <!-- Loop Berita di dalam Kategori Terkait -->
                        <?php foreach ($kelompok['daftar_berita'] as $news): ?>
                            <div class="col-12 col-sm-6 col-md-4 mb-4">
                                <div class="card card-primary shadow-sm h-100 mb-0 position-relative">
                                    <!-- Label Badge Kategori Mengambang -->
                                    <span class="badge badge-primary badge-kat shadow"><?= esc($kelompok['nama_kategori']) ?></span>
                                    
                                    <img src="<?= base_url('uploads/foto/' . $news['foto']) ?>" class="img-box-news" alt="Thumbnail">
                                    
                                    <div class="card-body p-3 d-flex flex-column justify-content-between">
                                        <div>
                                            <h5 class="font-weight-bold text-dark text-truncate-2 mb-2" title="<?= esc($news['judul_berita']) ?>" style="line-height: 1.4; height: 44px; overflow: hidden; display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical;">
                                                <?= esc($news['judul_berita']) ?>
                                            </h5>
                                            <p class="text-muted text-small mb-3" style="height: 54px; overflow: hidden; display: -webkit-box; -webkit-line-clamp: 3; -webkit-box-orient: vertical;">
                                                <?= strip_tags($news['isi_berita']) ?>
                                            </p>
                                        </div>
                                        
                                        <div class="border-top pt-2 mt-2 d-flex justify-content-between align-items-center">
                                            <span class="text-small text-muted font-weight-600">
                                                <i class="far fa-user mr-1"></i> <?= esc(explode('@', $news['kontributor'])[0]) ?>
                                            </span>
                                            <span class="text-small text-muted">
                                                <i class="far fa-calendar-alt mr-1"></i> <?= date('d M Y', strtotime($news['created_at'])) ?>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            <?php endforeach; ?>

        <?php endif; ?>

    </div>
</div>
<?= $this->endSection() ?>
