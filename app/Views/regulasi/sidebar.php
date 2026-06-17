<ul class="sidebar-menu">
    <li class="menu-header">Dashboard</li>
    <li><a class="nav-link" href="#"><i class="fas fa-fire"></i> <span>Dashboard Utama</span></a></li>
    
    <li class="menu-header">Modul Dokumen</li>
    <li class="<?= url_is('pdf') || url_is('pdf/*') ? 'active' : '' ?>">
        <a class="nav-link" href="<?= base_url('pdf') ?>"><i class="fas fa-file-pdf"></i> <span>Daftar PDF</span></a>
    </li>
    
    <!-- Menu Statistik Baru -->
    <li class="<?= url_is('statistik*') ? 'active' : '' ?>">
        <a class="nav-link" href="<?= base_url('statistik') ?>"><i class="fas fa-chart-pie"></i> <span>Statistik Dokumen</span></a>
    </li>
</ul>
