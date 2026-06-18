<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>PPID BBPPKS BANDUNG</title>
        <link rel="icon" type="image/x-icon" href="<?= base_url(); ?>img/Kemensos.png" />
        <!-- Font Awesome icons (free version)-->
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>

        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" >
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" >
        <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">
        <div class="wrap_choo">
        <div class="container">
          <div class="chooseUs">
          <h3> SPECIALS / ANNOUNCEMENTS</h3>
          <div class="list_services">
              <?php
                // set the "paged" parameter (use 'page' if the query is on a static front page)
                $paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
                // the query
                $the_query = new WP_Query( 'order=DSC&paged=' . $paged );
              ?>
            <div id="owl-example" class="owl-carousel">
              <?php if ( $the_query->have_posts() ) : ?>
              <?php
                // the loop
                while ( $the_query->have_posts() ) : $the_query->the_post();
              ?>
                <div class="col-sm-12 col-xs-12 col-md-12 respBox  wow bounceInUp text-center" data-wow-delay='0.5s'>
                  <div class="thumbnail udarpakhi">
                    <?php the_post_thumbnail(); ?>
                    <div class="caption">
                      <h4 class="post_title <?php the_title(); ?>">
                      <?php the_title(); ?></h4>
                      <p>
                      <?php echo wp_trim_words( get_the_content(), 15, '...' ); ?>
                      <a href="<?php the_permalink(); ?>">Read More</a>
                      </p>
                    </div>
                  </div>
                </div>
              <?php endwhile; ?>
          
              <?php
              // clean up after the query and pagination
              wp_reset_postdata();
              ?>
              <?php else:  ?>
              <p>
                <?php _e( 'Sorry, no posts matched your criteria.' ); ?>
              </p>
              <?php endif; ?>
            </div>
        <!--owl-->
      <div class="customNavigation">
      <a class="btn prev"><img src="http://roomsserver.com/wp-content/themes/roomsserver/img/arrow-left.png"/></a>
      <a class="btn next"><img src="https://image.freepik.com/free-icon/chevron-arrow-to-right-ios-7-interface-symbol_318-33616.png"/> </a>
      </div>
    </div><!--customNavigation list_services-->
  </div>
  <!--chooseUs--->
</div>
<!--container-->
</div><!--wrap_choo-->
</body>
</html>
<!-- //https://wordpresswithzaheer.blogspot.com/2016/09/display-wordpress-posts-with-owl.html -->