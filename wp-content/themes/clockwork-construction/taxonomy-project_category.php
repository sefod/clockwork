<?php
/**
 * The template for displaying archive pages.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package ClockWork_Construction
 */

get_header(); 

$term_id = get_queried_object()->term_id;
$taxonomy_name = get_queried_object()->taxonomy;
				
$termchildren = get_term_children( $term_id, $taxonomy_name );
$parent_term = get_term(get_queried_object()->parent, $taxonomy_name );
$parent_term_link = get_term_link(get_queried_object()->parent, $taxonomy_name );
?>


<!-- 

<?php if( get_field('hero_image', $taxonomy_name . '_' . $term_id) ): ?>
	 <div class="image-category" style="background-image:url('<?php the_field('hero_image', $taxonomy_name . '_' . $term_id); ?>');"></div>
<?php endif; ?>
-->  
   <div id="myCarousel" class="carousel slide" data-interval="4000" data-ride="carousel" style="height:318px;">
              <!-- Wrapper for Slides -->         
     <div class="carousel-inner">

<?php

// check if the repeater field has rows of data
if( have_rows('slider_cat', $taxonomy_name . '_' . $term_id ) ):

     	$i = 0;
        $pointers = '';
        $active = 'active';

 	// loop through the rows of data
    while ( have_rows('slider_cat', $taxonomy_name . '_' . $term_id ) ) : the_row(); ?> 

          <div class="item <?php echo $active; if (!$i++) $active = ''; ?>">
          <!-- Set the second background image using inline CSS below. -->
               <div class="fill" style="background-image:url('<?php the_sub_field('slider_image_category'); ?>');"  alt=""></div>

            </div>

   <?php endwhile;

else :

    // no rows found

endif;

?>

</div> 
</div> 

	<div id="primary" class="container">
		<main id="main" class="site-main" role="main">
		<div class="row">
		    <div class="col-md-1">
			</div>
		    <div class="col-md-10">

			<div class="sop-content-center">

			<div class="sop-root-nav">
				<?php 
					if($parent_term->slug == null){
						echo get_post_type() . " / " . get_queried_object()->slug;
					}else{
						echo get_post_type() .  " / " . "<a href=" . home_url() . "/projects/" . $parent_term->slug . ">" . $parent_term->slug . "</a>" ." / " . get_queried_object()->name;
					}
				?>
			</div>


				<div class="entry-header">
					<h1>
					<a href="<?php echo home_url() . "/projects/" . $parent_term->slug; ?>">
						<?php echo $parent_term->slug ?>
					</a>
					</h1>
					<h1>
						<?php
						echo get_queried_object()->name; 
					?>
					</h1>

				<br>

					<div class="row">
					    <div class="col-md-4">
				<?php
					the_archive_description( '<div class="archive-description">', '</div>' );
				?>
						</div>
					    <div class="col-md-1">
						</div>
					    <div class="col-md-4">

				<p><?php the_field('category_text', $taxonomy_name . '_' . $term_id); ?></p>

						</div>
					    <div class="col-md-2">
						</div>
					</div>

				</div>

				<!--
				<?php 

				$image = get_field('category_image', $taxonomy_name . '_' . $term_id);

				if( !empty($image) ): ?>

					<img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>"  width="210"/>

				<?php endif; ?>

				-->


</div>



<?php

if ( $termchildren) :

	echo '<div class="row">
      <ul class="thumbnails list-unstyled list-taxonomy thumbnails-category">';
	foreach ( $termchildren as $child ) {
		$term = get_term_by( 'id', $child, $taxonomy_name );
		$thumb = get_field('category_image', $taxonomy_name . '_' . $term->term_id);
		echo '<li class="col-md-3">
				<a href="' . get_term_link( $child, $taxonomy_name ) . '">
					<div class="thumbnail-sop category-thumb cropper">
						<div class="thumbnail-photo">
                  		  <img src="'. $thumb['sizes']['thumbnail'] .'" class="img-responsive">
		                  <div class="thumbnail-photo-hover">
		                    VIEW MORE
		                  </div>
                		</div>
                	</div>
	                <div class="thumbnail-caption">
	                  <h2> ' . $term->name . '</h2>
	                </div>
                </a>
               </li>';
	}
	echo '</ul>
    </div>';

else :

	if ( have_posts() ) : ?>

<div class="row">
      <ul class="thumbnails list-unstyled list-taxonomy thumbnails-subcategory">
			<?php
			/* Start the Loop */
			while ( have_posts() ) : the_post();
				{


					echo '<li class="col-md-4"><div class="thumbnail-sop project-thumb cropper"><a href="' . get_permalink( $id, $leavename ) . '"><div class="thumbnail-photo">
                  ' . get_the_post_thumbnail( $post_id, 'medium') . '
                  <div class="thumbnail-photo-hover thumbnail-photo-hover-wide">'; ?>

                    
                    <?php the_title(); ?>

                    <?php echo '
                  </div>
                </div></a></li>';
				}

			endwhile;

			echo "</ul>
    </div>";

			the_posts_navigation();

		else :

			get_template_part( 'template-parts/content', 'none' );

		endif; 

endif; ?>

<br>
<br>
<br>


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

