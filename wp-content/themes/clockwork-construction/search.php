<?php
/**
 * The template for displaying search results pages.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package ClockWork_Construction
 */

get_header(); ?>

	<section id="primary" class="container search-results">
		<main id="main" class="site-main" role="main">



		<div class="row">
		    <div class="col-md-1">
			</div>
		    <div class="col-md-10">

				<div class="sop-content-center">

		<?php
		if ( have_posts() ) : ?>

			<div class="entry-header">
				<h1 class="tit-search-results"><?php printf( esc_html__( 'Search Results for: %s', 'clockwork-construction' ), '<span>' . get_search_query() . '</span>' ); ?></h1>
			</div>

			<br>

			<?php
			/* Start the Loop */
			while ( have_posts() ) : the_post();
			?>

				<!--/**
				 * Run the loop for the search to output the results.
				 * If you want to overload this in a child theme then include a file
				 * called content-search.php and that will be used instead.
				 */-->
				<!--get_template_part( 'template-parts/content', 'search' );-->
				
			<div id="results-content">
			<div class="thumbnail-sop project-thumb cropper">
				<a href="<?php echo get_permalink(); ?>">
				<div class="thumbnail-photo">
                  		<?php echo the_post_thumbnail(); ?>
                  	<div class="thumbnail-photo-hover thumbnail-photo-hover-wide">
                    		<?php echo get_the_title(); ?>
                  	</div>
                	</div></a></div>
			</div>
				
			<?php
			endwhile;

			the_posts_navigation();

		else : ?>

			<!--get_template_part( 'template-parts/content', 'none' );-->

		<div id="no-results-content">
			<header class="page-header">
				<h1 class="page-title"><?php printf( esc_html__( 'Search Results for: %s', 'clockwork-construction' ), '<span>' . get_search_query() . '</span>' ); ?></h1>
			</header><!-- .page-header -->
            
			<p><?php esc_html_e( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'clockwork-construction' ); ?></p>
		
        		<?php get_search_form(); ?>
            	</div>
        <?php
		endif; ?>




				</div>

			</div>
		    <div class="col-md-1">
			</div>
		</div>



		</main><!-- #main -->
	</div><!-- #primary -->
<?php
get_sidebar();
get_footer();
