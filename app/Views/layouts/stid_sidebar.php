<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="#">Stisla PDF</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="#">SP</a>
        </div>
        <ul class="sidebar-menu">
            <li class="menu-header">Dashboard</li>
            <li><a class="nav-link" href="#"><i class="fas fa-fire"></i> <span>Dashboard Utama</span></a></li>
            
            <li class="menu-header">Modul Dokumen</li>
            <!-- Menu aktif otomatis berdasarkan URL -->
            <li class="<?= url_is('pdf*') ? 'active' : '' ?>">
                <a class="nav-link" href="<?= base_url('pdf') ?>"><i class="fas fa-file-pdf"></i> <span>Daftar PDF</span></a>
            </li>
        </ul>
    </aside>
</div>
