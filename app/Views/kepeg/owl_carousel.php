<link rel="stylesheet" type="text/css" href="<?= base_url(); ?>oc/css/bootstrap.min.css">
<div class="carousel slide article-slide" id="myCarousel">
      <div class="carousel-inner cont-slider">
     <div class="item active">
          <img src="oc/img/slide-1.jpg" alt="" ></div>

        <div class="item"><img src="oc/img/slide-1.jpg" alt="" ></div>

        <div class="item"><img src="oc/img/slide-2.jpg" alt="natural-hist" width="1021" height="402" class="alignnone size-full wp-image-75" /></div>

        <div class="item"><img src="oc/img/slide-3.jpg" alt="dot-red" width="1027" height="406" class="alignnone size-full wp-image-73" /></div>

        <div class="item"><img src="oc/img/slide-3.jpg" alt="vita_time" width="1027" height="404" class="alignnone size-full wp-image-76" /></div>
<div class="item"><img src="oc/img/slide-1.jpg" alt="aerobic" width="420" height="404" class="alignnone size-full wp-image-70" /></div>
<div class="item"><img src="oc/img/slide-2.jpg" alt="cd" width="1025" height="402" class="alignnone size-full wp-image-71" /></div>

</div>
<ol class="carousel-indicators visible-lg visible-md">
        <li class="active" data-slide-to="0" data-target="#myCarousel">
        <img src="oc/img/slide-1.jpg" alt="" >
        </li>
        <li class="" data-slide-to="1" data-target="#myCarousel">
        <img src="oc/img/slide-2.jpg" alt="" width="727" height="404" class="alignnone size-full wp-image-74" />
        </li>
        <li class="" data-slide-to="2" data-target="#myCarousel">
        <img src="oc/img/slide-2.jpg" alt="" width="1021" height="402" class="alignnone size-full wp-image-75" />
        </li>               
        <li class="" data-slide-to="3" data-target="#myCarousel">
        <img src="oc/img/slide-3.jpg" alt="" width="1027" height="406" class="alignnone size-full wp-image-73" />
        </li>               
 <li class="" data-slide-to="4" data-target="#myCarousel">
          <img src="oc/img/slide-3.jpg" alt="vita_time" width="1027" height="404" class="alignnone size-full wp-image-76" />
        </li>               
<li class="" data-slide-to="5" data-target="#myCarousel">
          <img src="oc/img/slide-1.jpg" alt="aerobic" width="420" height="404" class="alignnone size-full wp-image-70" />
        </li>               
<li class="" data-slide-to="6" data-target="#myCarousel">
          <img src="oc/img/slide-2.jpg" alt="cd" width="1025" height="402" class="alignnone size-full wp-image-71" />
        </li>               

      </ol>     
          
<div class="bs_controls"><a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">  <i class="fa fa-caret-left fa-2x" ></i><span class="sr-only">Previous</span></a>
  <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next"><i class="fa fa-caret-right fa-2x" ></i><span class="sr-only">Next</span></a><div class="playpause">
  <a class="right" id="playButton" >
        <i class="fa fa-caret-right" ></i>
     </a>
<a class="right1" id="playButton">
        <i class="fa fa-caret-right" ></i>
     </a>
<a class="right" id="playButton">
        <i class="fa fa-caret-right" ></i>
     </a>
    <a class="left" id="pauseButton">
        <i class="fa fa-pause"></i>
    </a>
</div>
</div>
   </div>

   <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" ></script> 
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" ></script>

<script>

$(function () {
     $('.carousel').carousel({
    interval:3000
  });
    $('#playButton').click(function () {
        $('#myCarousel').carousel('cycle');
     
    });
        $('#pauseButton').click(function () {
        $('#myCarousel').carousel('pause');
    });
 
 $('.right1').click(function () {
        $('#myCarousel').carousel('cycle');
     
    });
 
 
});


</script>


<script>
$(document).ready(function(){
  $("#pauseButton").click(function(){
    $(".right1").css('z-index','2');
  });
   $(".right1").click(function(){
    $(".right1").hide();
  });



});
</script>