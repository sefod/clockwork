<?php
/**
 * Template part for displaying posts. Search Form
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package ClockWork_Construction
 */

?>
<div class="btn-search-header">
	
	<a href="#" class="search-btn">
		<img src="<?php bloginfo('stylesheet_directory'); ?>/img/ico-search.png">
	</a>

	<form action="<?php echo esc_url( home_url( '/' ) ); ?>" method="get" class="searchform-header">
		<input type="text" name="s" id="search" placeholder="Search..." value="<?php the_search_query(); ?>" />
	</form>

</div>

<script type="text/javascript">

jQuery('.search-btn').click(function(){
    if (jQuery ('.btn-search-header').hasClass( "active" ) )
        jQuery('.btn-search-header').removeClass('active');
    else
       	jQuery('.btn-search-header').addClass("active");
});

</script>
