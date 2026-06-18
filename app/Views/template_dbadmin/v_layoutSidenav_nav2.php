            <div id="layoutSidenav_nav">
            <nav class="sb-sidenav accordion sb-sidenav" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
       <?php
        if(count($berita) == 0){
            echo "<br>";
            echo "Belum Ada Data";
        }
        ?>
        <div class="row">
        <?php foreach($berita as $data){ ?>
            <!-- <div class="col-xl-4"> -->
                <!-- <div class="card mb-4"> -->
                    <div class="card-header">
                        <div class="card-body-card-colomn">
                        <?php if(!empty("galeri/".$data['isi_gambar'])) { ?>
                        <img style="width: 100%;" class="d-flex justify-content-center align-items-center mb-2" src="<?= base_url("galeri/".$data['isi_gambar']) ?>" alt="...">
                        <?php } ?> 
                            <div class="text-left">
                            <h6 class="m-0 font-weight-bold text-primary"><?= $data['judul_berita'] ?></h6>
                            <hr>
                            <?php 
                                $isiberita = $data['isi_berita'];
                                $enews = explode(" ", $isiberita );
                            if (count($enews) > 30) {
                                for ($i=0; $i < 30; $i++) { 
                                    echo $enews[$i]." ";
                                } 
                                } else {
                                    echo $data['lokasi'];', '; $data['create_at']; '||'; $data['isi_berita'];
                                }
                            ?>
                            <P>
                            <br>
                            <a href="<?= base_url('detailberita/'.$data['slug']) ?>" class="btn btn-primary btn-icon-split">
                            <span class="icon text-white-50"><i class="fas fa-flag"></i></span>
                            <span class="text">Lihat Berita</span>
                            </a>
                            </div>
                        </div>
                    </div>
                <!-- </div> -->
            <!-- </div> -->
        <?php } ?> 
        </div>
        </div>
        </div>
</nav>
            </div>