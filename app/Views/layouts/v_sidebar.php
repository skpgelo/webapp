<div class="main-sidebar sidebar-style-2">
  <aside id="sidebar-wrapper">
    <div class="sidebar-brand">
      <a href="#">STISLA</a>
    </div>
    <div class="sidebar-brand sidebar-brand-sm">
      <a href="#">St</a>
    </div>
    <ul class="sidebar-menu">
      <li class="menu-header">Dashboard</li>
      <li class="active">
        <a class="nav-link" href="<?= base_url('sdm') ?>"><i class="fas fa-users"></i> <span>Data Pegawai</span></a>
      </li>
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
  </aside>
</div>
