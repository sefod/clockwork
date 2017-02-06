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


	<div id="primary" class="container">
		<main id="main" class="site-main" role="main">


		<div class="row">
		    <div class="col-md-1">
			</div>
		    <div class="col-md-10">



		<div class="row">
		    <div class="col-md-4 hidden-xs">
				<div class="sop-content-center-contact01">

<aside id="secondary" class="widget-area" role="complementary">
	<?php dynamic_sidebar( 'contact-sidebar' ); ?>
</aside><!-- #secondary -->

				</div>
			</div>
		    <div class="col-md-8">
				<div class="sop-content-center-contact02">
<?php 
	if ( have_posts() ) {
	while ( have_posts() ) {
	the_post(); 
?>
					<div class="sop-root-nav">
					 <?php the_title(); ?> 
					</div>

<img src="<?php bloginfo('stylesheet_directory'); ?>/img/temp-map.jpg" class="img-responsive hidden-xs">
<img src="<?php bloginfo('stylesheet_directory'); ?>/img/temp-map-mov.jpg" class="img-responsive visible-xs">
                  
<div class="sop-form-contact">


	<?php the_content(); ?> 
	

</div>

<?php			
		} // end while
	} // end if
?>
			</div>
		    <div class="col-md-4 visible-xs">
				<div class="sop-content-center-contact01">
<aside id="secondary" class="widget-area" role="complementary">
	<?php dynamic_sidebar( 'contact-sidebar' ); ?>
</aside><!-- #secondary -->

				</div>
			</div>


		</div>

</div>

			</div>
		    <div class="col-md-1">
			</div>
		</div>



		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
