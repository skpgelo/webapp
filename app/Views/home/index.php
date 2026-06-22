<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>BBPPKS BANDUNG</title>
        <link rel="icon" type="image/x-icon" href="<?= base_url(); ?>/img/Kemensos.png" />
        <!-- Font Awesome icons (free version)-->
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
        <!-- Google fonts-->
        <link href="https://fonts.googleapis.com/css?family=Varela+Round" rel="stylesheet" />
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <!-- Core theme CSS (includes Bootstrap)-->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" >
        <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" > -->
        <!--=============== REMIXICONS ===============-->
        <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">
        <!--=============== SWIPER CSS ===============-->
        <link rel="stylesheet" href="<?= base_url(); ?>chick_carousel/assets/css/swiper-bundle.min.css">
        <!--=============== CSS dashboard===============-->
        <link rel="stylesheet" href="<?= base_url(); ?>lp_gray/css/styles.css"  />
            <!--=============== CSS ===============-->
            <!-- <link rel="stylesheet" href="<?= base_url(); ?>chick_carousel/assets/css/styles.css"> -->
        <!--=============== CSS Berita===============-->
        <link rel="stylesheet" type="text/css" href="<?= base_url(); ?>owl/css/owl.carousel.min.css">
        <!-- <link rel="stylesheet" type="text/css" href="<?= base_url(); ?>owl/css/styles.css"> -->
        <!--=============== CSS tema===============-->
        <link rel="stylesheet" type="text/css" href="<?= base_url(); ?>oc/css/styletema.css">
            <!--=============== CSS sdm===============-->
            <!-- <link rel="stylesheet" type="text/css" href="<?= base_url(); ?>oc/css/styl.css"> -->
            <!--=============== CSS sdm===============-->
            <!-- <link rel="stylesheet" type="text/css" href="<?= base_url(); ?>oc/css/styl.css"> -->
            <!-- <link rel="stylesheet" type="text/css" href="<?= base_url(); ?>oc/css/bootstrap.min.css"> -->
            <!--=============== CSS ===============-->
            <!-- <link rel="stylesheet" type="text/css" href="<?= base_url(); ?>oc/css/styleoc.css"> -->
        <!--=============== CSS sdm===============-->
        <link rel="stylesheet" type="text/css" href="<?= base_url(); ?>owl/css/styleowl.css">
        <!--=============== CSS video===============-->
        <link rel="stylesheet" type="text/css" href="<?= base_url(); ?>video_carousel/css/bootstrap-video-carousel.min.css" />
        <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
        <script type="text/javascript" src="<?= base_url(); ?>oc/js/bootstrap.bundle.min.js"></script>
        <link rel="preconnect" href="https://fonts.googleapis.com">

        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@400..700&display=swap" rel="stylesheet">

        <script type="text/javascript">
        google.charts.load('current', {packages:["orgchart"]});
        google.charts.setOnLoadCallback(drawChart);

        function drawChart() {
            var data = new google.visualization.DataTable();
            data.addColumn('string', 'Name');
            data.addColumn('string', 'Manager');
            data.addColumn('string', 'ToolTip');

            // For each orgchart box, provide the name, manager, and tooltip to show.
            data.addRows([
            [{'v':'Margowiyono', 'f':'Margowiyono<div style="width: 100px; position: text-center; color:red; font-style:italic">Kepala</div>'},
            '', 'The President'],
            [{'v':'M. Slamet Santosa', 'f':'M. Slamet Santosa<div style="color:red; width: 130px; position: text-center; font-style:italic">Bagian Tata Usaha</div>'},
            'Margowiyono', 'VP'],
            ['Fungsional', 'M. Slamet Santosa', 'Margowiyono'],
            ['Carol', 'Fungsional', '']
            ]);

            // Create the chart.
            var chart = new google.visualization.OrgChart(document.getElementById('chart_div'));
            // Draw the chart, setting the allowHtml option to true for the tooltips.
            chart.draw(data, {'allowHtml':true});
        }
        </script>
    </head>
    <body id="page-top">
        <!-- Navigation-->
        <?=$this->include('layout_lp/_navigasi')?>

        <!-- Masthead-->
        <?=$this->include('layout_lp/_masthead')?>

        <!-- About-->
        <?=$this->include('layout_lp/_about')?>

        <!-- tentang kami-->
        <?=$this->include('layout_lp/_tentang_kami')?>

        <!-- berita -->
        <?=$this->include('layout_lp/_berita')?>

        <!-- kip-->
        <?=$this->include('layout_lp/_kip')?>

        <!-- Projects-->
        <!-- <section class="projects-section bg-light" >
            <div class="container px-4 px-lg-5">
            <div class="row gx-0 justify-content-center" > -->
                <!-- Project One Row-->
                <!-- <div class="row gx-0 mb-5 mb-lg-0 justify-content-center" > -->
                    <!-- <div class="col-lg-6"><img style="height: 100%; " class="img-fluid" src="<= base_url(); ?>img/iss.jpg" alt="..." /></div> -->
                    <!-- <div class="col-lg-6">
                    <div class="bg-green bg-opacity-75 text-left h-100 project">
                            <div class="d-flex h-100">
                                <div class="project-text w-100 my-auto text-left">
                                <h4 class="text-white-50" style="font-weight: 500; font-size: 0.9rem; ">Informasi <a class="text-white-50" href="<?= base_url(); ?>setiap_saat"><i>klik !</i></a></h4>
                                <h4 class="text-white-75" style="font-weight: 500; font-size: 0.9rem;">Informasi <a class="text-white-75" href="<?= base_url(); ?>setiap_saat"><i>klik !</i></a> </h4>
                                <h4 class="text-white-25" style="font-weight: 500; font-size: 0.9rem;">Informasi  <a class="text-white-25" href="<?= base_url(); ?>setiap_saat"><i>klik !</i></a> </h4>
                                <h4 class="text-black" style="font-weight: 500; font-size: 1rem;">Informasi  <a class="text-white" href="<?= base_url(); ?>setiap_saat"><i>klik !</i></a> </h4>
                                    </div>
                                    </div>
                                    </div>
                                    </div> -->
                    <!-- </div> -->
                    <!-- <div class="col-lg-6">
                        <div class="bg-black text-center h-100 project">
                            <div class="d-flex h-100">
                                <div class="project-text w-100 my-auto text-center text-lg-left">
                                    <h4 class="text-white">Informasi yang Wajib Tersedia Setiap Saat </h4>
                                    <p class="mb-30 text-white-50">Pasal 21 :: Peraturan Komisi Informasi 1/2021</p>
                                    <a style="font-weight: 800;   font-size: 0.8rem;  line-height: 1.6; text-align: center;" class="btn btn-success" href="<?= base_url(); ?>setiap_saat">Agar kita tau...klik!</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    </div> 
                </div>
                </div>
        </section> -->
                <!-- Project Two Row-->
                <!-- <div class="row gx-0 justify-content-center">
                    <div class="col-lg-6"><img class="img-fluid" src="<= base_url(); ?>lp_gray/assets/img/demo-image-02.jpg" alt="..." /></div>
                    <div class="col-lg-6 order-lg-first">
                        <div class="bg-black text-center h-100 project">
                            <div class="d-flex h-100">
                                <div class="project-text w-100 my-auto text-center text-lg-right">
                                    <h4 class="text-white">Mountainssaat</h4>
                                    <p class="mb-0 text-white-50">Another example of a project with its respective description. These sections work well responsively as well!</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> -->
                <!-- Project One Row-->
                <!-- <div class="row gx-0 mb-5 mb-lg-0 justify-content-center">
                    <div class="col-lg-6"><img class="img-fluid" src="<= base_url(); ?>lp_gray/assets/img/wall.jpg" alt="..." /></div>
                    <div class="col-lg-6">
                        <div class="bg-black text-center h-100 project">
                            <div class="d-flex h-100">
                                <div class="project-text w-100 my-auto text-center text-lg-left">
                                    <h4 class="text-white">Mistysaat</h4>
                                    <p class="mb-0 text-white-50">An example of where you can put an image of a project, or anything else, along with a description.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> -->
        <!-- <section class="projects-section bg-light"  id="owlsimple">        
        <div class="col-lg-12">
        
<div id="carousel">
 <ul>
<li><img alt="" src="http://favbulous.com/demo/skin-a-carousel/images/image1.jpg" /><a href="#">Image1</a></li>
<li><img alt="" src="http://favbulous.com/demo/skin-a-carousel/images/image2.jpg" /><a href="#">Image2</a></li>
<li><img alt="" src="http://favbulous.com/demo/skin-a-carousel/images/image3.jpg" /><a href="#">Image3</a></li>
 </ul>
 <div class="clearfix"></div> 
 prev and next button
 <a id="prev" class="prev" href="#"><</a>
 <a id="next" class="next" href="#">></a>
 pagination
 <div id="pager" class="pager"></div>
</div>
<script type="text/javascript">
  $(function() {

   $('#carousel ul').carouFredSel({
    prev: '#prev',
    next: '#next',
    pagination: "#pager",
    auto: true,
    scroll: 1000,
    pauseOnHover: true
   });

  });
  </script> -->

        <div class="gallery">
            <!-- =============== SWIPER GALLERY CARDS =============== -->
            <!-- <div class="swiper gallery-cards">
                <div class="swiper-wrapper">
                    <div class="swiper-slide">
                        <article class="gallery__card">
                            <img src="<?= base_url(); ?>chick_carousel/assets/img/img1.png" alt="image gallery" class="gallery__img">
                            <div class="gallery__data">
                                <h3 class="gallery__title">Ornament Vase</h3>
                                <span class="gallery__subtitle">Modern</span>
                            </div>
                        </article>
                    </div>

                    <div class="swiper-slide">
                        <article class="gallery__card">
                            <img src="<?= base_url(); ?>chick_carousel/assets/img/img2.png" alt="image gallery" class="gallery__img">
                            <div class="gallery__data">
                                <h3 class="gallery__title">Ornament Vase</h3>
                                <span class="gallery__subtitle">Modern</span>
                            </div>
                        </article>
                    </div>

                    <div class="swiper-slide">
                        <article class="gallery__card">
                            <img src="<?= base_url(); ?>chick_carousel/assets/img/img3.png" alt="image gallery" class="gallery__img">
                            <div class="gallery__data">
                                <h3 class="gallery__title">Ornament Vase</h3>
                                <span class="gallery__subtitle">Modern</span>
                            </div>
                        </article>
                    </div>

                    <div class="swiper-slide">
                        <article class="gallery__card">
                            <img src="<?= base_url(); ?>chick_carousel/assets/img/img4.png" alt="image gallery" class="gallery__img">
                            <div class="gallery__data">
                                <h3 class="gallery__title">Ornament Vase</h3>
                                <span class="gallery__subtitle">Modern</span>
                            </div>
                        </article>
                    </div>

                    <div class="swiper-slide">
                        <article class="gallery__card">
                            <img src="<?= base_url(); ?>chick_carousel/assets/img/img5.png" alt="image gallery" class="gallery__img">
                            <div class="gallery__data">
                                <h3 class="gallery__title">Ornament Vase</h3>
                                <span class="gallery__subtitle">Modern</span>
                            </div>
                        </article>
                    </div>
                </div>
            </div> -->

            <!-- =============== SWIPER GALLERY THUMBNAIL =============== -->
            <!-- <div class="gallery__overflow">
                <div class="swiper gallery-thumbs">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide">
                            <div class="gallery__thumbnail">
                                <img src="<?= base_url(); ?>chick_carousel/assets/img/img1.png" alt="image thumbnail" class="gallery__thumbnail-img">
                            </div>
                        </div>
    
                        <div class="swiper-slide">
                            <div class="gallery__thumbnail">
                                <img src="<?= base_url(); ?>chick_carousel/assets/img/img2.png" alt="image thumbnail" class="gallery__thumbnail-img">
                            </div>
                        </div>
    
                        <div class="swiper-slide">
                            <div class="gallery__thumbnail">
                                <img src="<?= base_url(); ?>chick_carousel/assets/img/img3.png" alt="image thumbnail" class="gallery__thumbnail-img">
                            </div>
                        </div>
    
                        <div class="swiper-slide">
                            <div class="gallery__thumbnail">
                                <img src="<?= base_url(); ?>chick_carousel/assets/img/img4.png" alt="image thumbnail" class="gallery__thumbnail-img">
                            </div>
                        </div>
                        
                        <div class="swiper-slide">
                            <div class="gallery__thumbnail">
                                <img src="<?= base_url(); ?>chick_carousel/assets/img/img5.png" alt="image thumbnail" class="gallery__thumbnail-img">
                            </div>
                        </div>
                    </div> -->
    
                    <!-- Swiper pagination -->
                    <!-- <div class="swiper-pagination"></div>
                </div> -->

                <!-- Swiper arrows -->
                <!-- <div class="swiper-button-next">
                    <i class="ri-arrow-right-line"></i>
                </div>
                <div class="swiper-button-prev">
                    <i class="ri-arrow-left-line"></i>
                </div>
                            </div>
                        </div>
                    </div> -->
        </section>
        
        <!--ska-->
        <?=$this->include('layout_lp/_ska')?>

        <!--sdm-->
        <?=$this->include('layout_lp/_sdm')?>

        <!-- Map-->
        <?=$this->include('layout_lp/_map')?>

        <!-- Map-->
        <?=$this->include('layout_lp/_video')?>


        <!-- <section class="projects-section bg-light"  id="setiapsaat">
        <div class="container px-4 px-lg-5"> -->
            <!-- <div class="row gx-4 gx-lg-5 justify-content-center" > -->
                <!-- <div class="col-lg-12">
        <iframe src="<= base_url(); ?>tematik_korsel" width="100%" height="900px" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>  -->
                        <!-- </div> -->
                    <!-- </div>
        </section> -->
        <!-- mohon-->
        <?=$this->include('layout_lp/_mohon')?>

        <!-- mohon-->
        <?=$this->include('layout_lp/_footer')?>

        <!-- Contact-->
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
        <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" ></script> 
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" ></script>
        <!-- Core theme JS-->
        <script src="<?= base_url(); ?>lp_gray/js/scripts.js"></script>
        <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
        <!-- * *                               SB Forms JS                               * *-->
        <!-- * * Activate your form at https://startbootstrap.com/solution/contact-forms * *-->
        <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
        <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
        <!--=============== SWIPER JS ===============-->
        <script src="<?= base_url(); ?>chick_carousel/assets/js/swiper-bundle.min.js"></script>
        <!--=============== MAIN JS ===============-->
        <script src="<?= base_url(); ?>chick_carousel/assets/js/main.js"></script>
        <script src="<?= base_url(); ?>owl/js/owl.carousel.min.js"></script>
        <script src="<?= base_url(); ?>owl/js/script.js"></script>
    </body>
</html>
