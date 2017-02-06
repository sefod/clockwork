<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package ClockWork_Construction
 */

get_header(); ?>

   <div id="myCarousel" class="carousel slide" data-interval="4000" data-ride="carousel">
              <!-- Wrapper for Slides -->         
     <div class="carousel-inner">

      <?php
    while ( have_posts() ) : the_post();

      // check if the repeater field has rows of data
      if( have_rows('home_slider') ):

        // loop through the rows of data

          $i = 0;
          $pointers = '';
          $active = 'active';

          while ( have_rows('home_slider') ) : the_row();
          $pointers .= '<li data-target="#myCarousel" data-slide-to="'.$i.'" class="'.$active.'"></li>';
          ?>
          <div class="item <?php echo $active; if (!$i++) $active = ''; ?>">
          <!-- Set the second background image using inline CSS below. -->
               <div class="fill" style="background-image:url('<?php the_sub_field('slide_image'); ?>');"  alt=""></div>
           
                    <div class="carousel-caption">
                      <?php the_sub_field('slide_text'); ?>
                    </div>
            </div>
            <?php             
            endwhile;

      endif;

    endwhile; // End of the loop.

    ?>
     

  </div>

              <!-- Controls -->
              <ol class="carousel-indicators">
                <?php echo $pointers; ?>
            </ol>   
              <a href="#" class="arrow-down-home"><img src="<?php echo get_template_directory_uri(); ?>/img/arrow-down.png"/></a>
</div> 
</div> 
</div> 

<div class="container">
    <div class="row">
      <ul class="thumbnails list-unstyled" id="home-cats">
        <li class="hidden-xs  hidden-sm col-md-3">
        </li>
        <li class="col-xs-12 col-sm-6 col-md-3">
          <div class="thumbnail-sop">
      			<a href="projects/residential/">
                <div class="thumbnail-photo">
                  <img src="<?php bloginfo('stylesheet_directory'); ?>/img/accesos-home01.jpg" class="img-responsive">
                  <div class="thumbnail-photo-hover">
                    VIEW MORE
                  </div>
                </div>
                <div class="thumbnail-caption">
                  <h2>Residential</h2>
                </div>
      			</a>
          </div>
        </li>
        <li class="col-xs-12 col-sm-6 col-md-3">
          <div class="thumbnail-sop">
            <a href="projects/commercial/">
                <div class="thumbnail-photo">
                  <img src="<?php bloginfo('stylesheet_directory'); ?>/img/accesos-home02.png" class="img-responsive">
                  <div class="thumbnail-photo-hover">
                    VIEW MORE
                  </div>
                </div>
	            <div class="thumbnail-caption">
	              <h2>Commercial</h2>
	            </div>
      			</a>
          </div>
        </li>
        <li class="hidden-xs  hidden-sm col-md-3">
        </li>
      </ul>
    </div>
</div>

<div class="bnt-contact-movil">
  <a href="<?php echo esc_url( home_url( '/' ) ); ?>contact-us/">
  contact us
  </a>
</div>

<script type="text/javascript">

jQuery(".arrow-down-home").click(function() {
    jQuery('html, body').animate({
        scrollTop: jQuery("#home-cats").offset().top
    }, 1500);
});

</script>


<?php
get_footer();
