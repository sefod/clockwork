<?php
/**
 * The template for displaying all single posts projects
 *
 * 
 *
 * @package ClockWork_Construction
 */

get_header(); ?>

<?php 
	if ( have_posts() ) {
	while ( have_posts() ) {
	the_post(); 
?>


<div class="project-conten-movil visible-xs">
    <?php the_title( '<h4>', '</h4>' ); ?>
    <?php the_content(); ?>
</div>


	 <div id="myCarousel" class="carousel slide">
			        <!-- Wrapper for Slides -->
			        
			        <div class="carousel-inner">

			        	<?php 
                        $i = 0;
          $pointers = '';
          $active = 'active';
          $pointers .= '<li data-target="#myCarousel" data-slide-to="'.$i.'" class="'.$active.'"></li>';


                        foreach ( get_gallery() as $attachment ) : ?>

						            <div class="item <?php if (!$i++) echo "active"; ?>">
						                <!-- Set the second background image using inline CSS below. -->
                                        <div class="fill" style="background-image:url('<?php echo $attachment->url ?>');"  alt="<?php echo $attachment->alt ?>"></div>
			                            <div class="visible-xs"> <img src="<?php echo $attachment->url ?>"></div>
						            </div>


						<?php endforeach; ?>


			        </div>

			        <!-- Controls -->
			        <a class="left carousel-control" href="#myCarousel" data-slide="prev">
			            <span class="icon-prev"></span>
			        </a>
			        <a class="right carousel-control" href="#myCarousel" data-slide="next">
			            <span class="icon-next"></span>
			        </a>

              <!-- Controls -->
              <ol class="carousel-indicators">
                <?php echo $pointers; ?>
            </ol>   


    </div>
 

<div class="project-conten-inf-movil visible-xs">
        <?php if( get_field('client_testimonial') ): ?>
            <h5>
            Testimonial
            </h5>
                <h4><?php the_field('client_name'); ?></h4>
                <p><?php the_field('client_testimonial'); ?></p>
        <?php endif; ?>



    <a href="javascript:history.back()">
        <span>< &nbsp;</span> Back to all projects
    </a>
    <br>
</div>


<div class="bnt-contact-movil">
  <a href="<?php echo esc_url( home_url( '/' ) ); ?>contact-us/">
  contact us
  </a>
</div>



    <ul class="text-footer-project">
		<?php the_field('bullet_points'); ?>
    </ul>

    <div class="tabs-footer-project">

    	<div class="tabs-footer-share">
            <div class="tab-share-active">
        		<a class="more-share-project">
        			<img src="<?php bloginfo('template_url'); ?>/img/share-icon.jpg">
                    <?php echo do_shortcode('[addtoany]'); ?>
        		</a>
            </div>
    	</div>




    	<div class="tabs-footer-more">
            <div class="tab-more-active on">
    		<a class="more-info-project"><img src="<?php bloginfo('template_url'); ?>/img/arrow-more.jpg">more information</a>
    			<?php the_title( '<h4>', '</h4>' ); ?>
    			<?php the_content(); ?>
    		</div>
    	</div>


        <?php if( get_field('client_testimonial') ): ?>
        	<div class="tabs-footer-testimonial">
                 <div class="tab-testimonial-active">
        		<a class="more-testimonial-project"><img src="<?php bloginfo('template_url'); ?>/img/arrow-testimonial.jpg">testimonial</a>
        			<h4><?php the_field('client_name'); ?></h4>
        			<p><?php the_field('client_testimonial'); ?></p>
        		</div>
        	</div>
        <?php endif; ?>
<?php			
		} // end while
	} // end if
?>
    	<div class="tabs-footer-close">
            <?php
  $url = htmlspecialchars($_SERVER['HTTP_REFERER']);
  echo "<a href='$url'>"; 
?>
                <img src="<?php bloginfo("template_url"); ?>/img/close.jpg">
			</a>
    	</div>

    </div>



<script type="text/javascript">

jQuery('.more-info-project').click(function(){
    if (jQuery ('.tab-more-active').hasClass( "on" ) )
        jQuery('.tab-more-active').removeClass('on');
    else
        jQuery('.tab-more-active').addClass("on");
});


jQuery('.more-info-project').click(function(){
    if (jQuery ('.more-info-project').hasClass( "on" ) )
        jQuery('.more-info-project').removeClass('on');
    else
        jQuery('.more-info-project').addClass("on");
});


jQuery('.more-testimonial-project').click(function(){
    if (jQuery ('.tab-testimonial-active').hasClass( "on" ) )
        jQuery('.tab-testimonial-active').removeClass('on');
    else
        jQuery('.tab-testimonial-active').addClass("on");
});

jQuery('.more-testimonial-project').click(function(){
    if (jQuery ('.more-testimonial-project').hasClass( "on" ) )
        jQuery('.more-testimonial-project').removeClass('on');
    else
        jQuery('.more-testimonial-project').addClass("on");
});

jQuery('.more-share-project').click(function(){
    if (jQuery ('.tab-share-active').hasClass( "on" ) )
        jQuery('.tab-share-active').removeClass('on');
    else
        jQuery('.tab-share-active').addClass("on");
});

</script>



<?php get_footer();