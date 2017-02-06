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

				<div class="sop-content-center">

					<div class="sop-root-nav">
						<a href="#">ABOUT US</a>  /  OUR TEAM
					</div>

					<div class="entry-header">
						<h1>
						    <?php the_title(); ?>
						</h1>

						<br>

						<div class="row">
						    <div class="col-md-4">
								<div class="archive-description">
									<?php the_field('text_page'); ?>
								</div>
							</div>
						    <div class="col-md-1">
							</div>
						    <div class="col-md-4">

								<?php while ( have_posts() ) : the_post(); ?>
									<?php the_content(); ?>
								<?php endwhile;?>

							</div>
						    <div class="col-md-2">
							</div>
						</div>

					</div>

				</div>


		<div class="row">
		    <div class="col-md-8">

				<?php 
				$image = get_field('imagen_page');
				if( !empty($image) ): ?>
					<img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" width="100%" />
				<?php endif; ?>


			</div>
		    <div class="col-md-4">
				<?php 
				$image = get_field('imagen_page_team');
				if( !empty($image) ): ?>
					<img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" width="100%" />
				<?php endif; ?>

			</div>
		</div>



				<br>
				<br>

				<?php 
				// the query
				$args = array( 'post_type' => 'team');
				$the_query = new WP_Query( $args ); ?>

				<?php if ( $the_query->have_posts() ) : ?>

				  <!-- pagination here -->
					<div class="row sop-team-base">

					  <!-- the loop -->
						<?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
						<div class="col-md-4">
							<div class="sop-team-post">
								<div class="sop-team-photo">
						        	<?php the_post_thumbnail(''); ?>
						    	</div>
								<h2>
									<?php the_title(); ?>
								</h2>
								<?php the_content(); ?>
						    </div>
						</div>
						      

					  <?php endwhile; ?>
					  <!-- end of the loop -->

					</div>

				  <!-- pagination here -->

				  <?php wp_reset_postdata(); ?>

				<?php else : ?>
				  <p><?php _e( '' ); ?></p>
				<?php endif; ?>





				</div>

			</div>
		    <div class="col-md-1">
			</div>
		</div>



		</main><!-- #main -->
	</div><!-- #primary -->

<div class="bnt-contact-movil">
  <a href="<?php echo esc_url( home_url( '/' ) ); ?>contact-us/">
  contact us
  </a>
</div>



<?php
get_footer();
