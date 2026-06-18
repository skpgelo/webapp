
  <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" > -->
  <link rel="stylesheet" type="text/css" href="<?= base_url(); ?>oc/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="<?= base_url(); ?>oc/css/styleoc.css">

 <section class="home">
 <div class=" justify-content-center">
  <div id="carousel" class="carousel slide" data-ride="carousel">
  <div class="carousel-controls">
    <ol class="carousel-indicators">
      <li data-target="#carousel" data-slide-to="0" style="background-image:url('oc/img/slide-1.jpg')"></li>
      <li data-target="#carousel" data-slide-to="1" style="background-image:url('oc/img/slide-2.jpg')"></li>
      <li data-target="#carousel" data-slide-to="2" style="background-image:url('oc/img/slide-3.jpg')"></li>
      
    </ol>
    <a class="carousel-control-prev" href="#carousel" role="button" data-slide="prev">
     <img src="oc/img/left-arrow.svg" alt="Prev"> 
  </a>
  <a class="carousel-control-next" href="#carousel" role="button" data-slide="next">
    <img src="oc/img/right-arrow.svg" alt="Next">
  </a>
  </div>
  <div class="carousel-inner">
    <div class="carousel-item active" style="background-image:url('oc/img/slide-1.jpg')">
      <div class="container">
         <h2>I'm Rose</h2>
         <p>Web Developer</p>
      </div>
    </div>
    <div class="carousel-item" style="background-image:url('oc/img/slide-2.jpg')">
      <div class="container">
         <h2>I'm Jasmine</h2>
         <p>Web Developer</p>
      </div>
    </div>
    <!-- <div class="row gx-4 gx-lg-5 justify-content-center" > -->
          <div class="carousel-item" style="background-image:url('oc/img/slide-3.jpg');">
          <div class="container">
         <h2>I'm Ruby</h2>
         <p>Web Developer</p>
         </div>
         </div>
    </div>
  </div>
</div>
 </section>
<script src="<?= base_url(); ?>oc/js/bootstrap.bundle.min.js"></script>
