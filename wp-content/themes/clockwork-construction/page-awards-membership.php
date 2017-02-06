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
						<a href="#">ABOUT US</a>  /  AWARDS & membership 
					</div>

					<div class="entry-header">
						<h1 class="content-awards">
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





				<br>
				<br>

				<?php 
				// the query
				$args = array( 
					'post_type' => 'awards',
					'posts_per_page' => '3'
				);
				$the_query = new WP_Query( $args ); ?>

				<?php if ( $the_query->have_posts() ) : ?>

				  <!-- pagination here -->
					<div class="row sop-awards-base">

					  <!-- the loop -->
						<?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>

						<div class="col-md-4">
							<div class="sop-awards-post">
								<div class="sop-awards-photo">
						        	<?php the_post_thumbnail(''); ?>
						    	</div>
								<h2>
									<?php the_title(); ?>
								</h2>
								<h5>
									<?php the_field('year_award'); ?>
								</h5>
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


				<?php 
				// the query
				$args = array( 
					'post_type' => 'awards',
					'posts_per_page' => '999',
					'offset' => '3',

				);
				$the_query = new WP_Query( $args ); ?>

				<?php if ( $the_query->have_posts() ) : ?>

				  <!-- pagination here -->
					<div class="row sop-awards-base sop-awards-base-inf">

					  <!-- the loop -->
						<?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>

						<div class="col-md-3">
							<div class="sop-awards-post">
								<div class="sop-awards-photo">
						        	<?php the_post_thumbnail(''); ?>
						    	</div>
								<h2>
									<?php the_title(); ?>
								</h2>
								<h5>
									<?php the_field('year_award'); ?>
								</h5>
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
