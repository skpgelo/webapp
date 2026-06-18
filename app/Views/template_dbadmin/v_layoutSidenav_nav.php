<style>
nav{
    font-size: 0.9rem;
    color: white;
    /* font-family: "Poppins", sans-serif; */
    opacity: 0.9;
}
</style>
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <div class="sb-sidenav-menu-heading">Core</div>
                            <a class="nav-link" href="<?= base_url(); ?>">
                                <div class="sb-nav-link-icon"><i class="fa-regular fa-paper-plane"></i>
                                <!-- <i class="fas fa-tachometer-alt"></i> -->
                            </div>
                                Halaman Utama
                            </a>
                            <a class="nav-link" href="<?= base_url(); ?>dash">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Dashboard
                            </a>
                            <a class="nav-link" href="<?= base_url(); ?>dash1">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Dashboard1
                            </a>
                            <div class="sb-sidenav-menu-heading">Antarmuka
                            </div>
                            <!-- <a class="nav-link" href="<?= base_url(); ?>profilkami"> -->
                            <a class="nav-link collapsed" href="<?= base_url(); ?>profilkami" data-bs-toggle="collapse" data-bs-target="#profilkami" aria-expanded="false" aria-controls="profilkami">
                                <div class="sb-nav-link-icon"><i class="fas fa-solid fa-id-card-clip"></i></div>
                                Profil Kami
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapsePages" aria-labelledby="headingTwo" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">
                                    <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#pagesCollapseAuth" aria-expanded="false" aria-controls="pagesCollapseAuth">
                                    Profile Lembaga
                                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                    </a>
                                    <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#pagesCollapseError" aria-expanded="false" aria-controls="pagesCollapseError">
                                    Profile Pimpinan 
                                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                        <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#pagesCollapseError" aria-expanded="false" aria-controls="pagesCollapseError">
                                    Profile Sumberdaya Manusia 
                                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                    </a>
                                    </a>
                                </nav>
                            </div>
                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapsePagesibk" aria-expanded="false" aria-controls="collapsePages">
                                <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
                                Informasi Berkala 
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapsePagesibk" aria-labelledby="headingTwo" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">
                                    <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#pagesCollapseAuth" aria-expanded="false" aria-controls="pagesCollapseAuth">
                                    Kegiatan & Kinerja
                                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                    </a>
                                    <div class="collapse" id="pagesCollapseAuth" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordionPages">
                                        <nav class="sb-sidenav-menu-nested nav">
                                            <a class="nav-link" href="register.html">Atensi</a>
                                            <a class="nav-link" href="password.html">Pemberdayaan Masyarakat </a>
                                            <a class="nav-link" href="login.html">Pelatihan</a>
                                            <a class="nav-link" href="login.html">Sertifikasi</a>
                                            <a class="nav-link" href="register.html">Akreditasi</a>
                                            <a class="nav-link" href="password.html">Kesiapsiagaan Bencana</a>
                                        </nav>
                                    </div>
                                    <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#pagesCollapseError" aria-expanded="false" aria-controls="pagesCollapseError">
                                    Akuntabilitas 
                                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                    </a>
                                    <div class="collapse" id="pagesCollapseError" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordionPages">
                                        <nav class="sb-sidenav-menu-nested nav">
                                            <a class="nav-link" href="401.html">Realisasi Anggaran</a>
                                            <a class="nav-link" href="404.html"> Pengadaan Barang/Jasa </a>
                                            <a class="nav-link" href="500.html">500 Page</a>
                                        </nav>
                                    </div>
                                </nav>
                            </div>
                            <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="<?= base_url(); ?>berkala">Static Navigation</a>
                                    <a class="nav-link" href="layout-sidenav-light.html">Light Sidenav</a>
                                </nav>
                            </div>
                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapsePagesiss" aria-expanded="false" aria-controls="collapsePages">
                            <!-- <a class="nav-link" href="<?= base_url(); ?>setiap_saat"> -->
                                <div class="sb-nav-link-icon"><i class="fas fa-solid fa-mug-hot"></i></div>
                                Informasi Setiap Saat
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapsePagesiss" aria-labelledby="headingThree" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">
                                    <a class="nav-link " href="<?= base_url(); ?>grabbing" aria-expanded="false" aria-controls="pagesCollapseGrabb">
                                    AAAAA
                                        <!-- <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div> -->
                                    </a>
                                    <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#pagesCollapseError" aria-expanded="false" aria-controls="pagesCollapseError">
                                    BBBBB 
                                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                        <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#pagesCollapseError" aria-expanded="false" aria-controls="pagesCollapseError">
                                    CCCCC 
                                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                    </a>
                                    <div class="collapse" id="pagesCollapseError" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordionPages">
                                        <nav class="sb-sidenav-menu-nested nav">
                                            <a class="nav-link" href="<?= base_url(); ?>g_shake">Gempabumi 5+M Terkini</a>
                                            <a class="nav-link" href="<?= base_url(); ?>g_155plus">15 Gempabumi Terkini </a>
                                            <a class="nav-link" href="<?= base_url(); ?>g_tutor">Tutorial</a>
                                            <a class="nav-link" href="<?= base_url(); ?>iss">ISS</a>
                                        </nav>
                                    </div>
                                    </a>
                                </nav>
                            </div>
                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapsePagesism" aria-expanded="false" aria-controls="collapsePages">
                                <div class="sb-nav-link-icon"><i class="fas fa-solid fa-route"></i></div>
                                Informasi Serta Merta
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapsePagesism" aria-labelledby="headingFour" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">
                                    <a class="nav-link" href="<?= base_url(); ?>jalur_evakuasi" aria-expanded="false" aria-controls="pagesCollapseAuth">
                                    Jalur Evakuasi
                                        <!-- <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div> -->
                                    </a>
                                    <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#pagesCollapseSelem" aria-expanded="false" aria-controls="pagesCollapseSelem">
                                    Sesar Lembang 
                                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                    </a>
                                    <div class="collapse" id="pagesCollapseSelem" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordionPages">
                                        <nav class="sb-sidenav-menu-nested nav">
                                            <a class="nav-link" href="<?= base_url(); ?>skenario">Skenario</a>
                                            <a class="nav-link" href="<?= base_url(); ?>isoseismal">Isoseismal Terkini </a>
                                            <!-- <a class="nav-link" href="<?= base_url(); ?>g_tutor">Tutorial</a>
                                            <a class="nav-link" href="<?= base_url(); ?>iss">ISS</a> -->
                                        </nav>
                                    </div>
                                </a>
                                    <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#pagesCollapseInfogb" aria-expanded="false" aria-controls="pagesCollapseInfogb">
                                    Informasi Gempabumi 
                                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                    </a>
                                    <div class="collapse" id="pagesCollapseInfogb" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordionPages">
                                        <nav class="sb-sidenav-menu-nested nav">
                                            <a class="nav-link" href="<?= base_url(); ?>g_shake">Gempabumi 5+M Terkini</a>
                                            <a class="nav-link" href="<?= base_url(); ?>g_155plus">15 Gempabumi Terkini </a>
                                            <a class="nav-link" href="<?= base_url(); ?>g_tutor">Tutorial</a>
                                            <a class="nav-link" href="<?= base_url(); ?>iss">ISS</a>
                                        </nav>
                                    </div>
                                </nav>
                            </div>
                            <a class="nav-link" href="<?= base_url(); ?>dikecualikan" >
                                <div class="sb-nav-link-icon"><i class="fas fa-solid fa-route"></i></div>
                                Informasi yang Dikecualikan
                                <!-- <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div> -->
                            </a>
                            <div class="sb-sidenav-menu-heading">Laman</div>
                            <a class="nav-link" href="<?= base_url(); ?>berita">
                                <div class="sb-nav-link-icon"><i class="fas fa-solid fa-microphone"></i></div>
                                Berita
                            </a>
                            <a class="nav-link" href="<?= base_url(); ?>ragam">
                                <div class="sb-nav-link-icon"><i class="fas fa-solid fa-clipboard"></i></div>
                                Ragam
                            </a>
                            <a class="nav-link" href="<?= base_url(); ?>produk_hukum">
                                <div class="sb-nav-link-icon"><i class="fas fa-solid fa-clipboard"></i></div>
                                Produk Hukum
                            </a>
                            <div class="sb-sidenav-menu-heading">Ragam</div>
                            <!-- <div class="sb-sidenav-menu-heading">Addons</div>
                            <a class="nav-link" href="charts.html">
                                <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                                Charts
                            </a>
                            <a class="nav-link" href="tables.html">
                                <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                                Tables
                            </a> -->
                        </div>
                    </div>
                    <div class="sb-sidenav-footer">
                        <div class="small">sedang login sebagai:</div>
                        [USERS]
                    </div>
                </nav>
            </div>
