<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package ClockWork_Construction
 */

?>

	</div><!-- #content -->


<div class="sop-newsletter-prefooter">
	<div class="container">
		<div class="row">
		    <div class="col-md-4">
			</div>
		    <div class="col-md-6">
			<?php 
			if( function_exists( 'mc4wp_show_form' ) ) {
			    mc4wp_show_form('271');
			};
			?>


			</div>
		    <div class="col-md-2">
			</div>
		</div>
	</div>
</div>



	<footer id="colophon" class="site-footer" role="contentinfo">
<div class="container">


<div class="row">
    <div class="col-md-4">

		<div class="site-info">

1A/45 Bay Road, Taren Point 2229, Phone:<a href="tel:02-9526-2135" style=" color: #626262 !important;font-size: 10px;">02 9526 2135</a><br>
			<br>
			©2016 Clockwork Construction Pty. Ltd

	    </div>
    </div>
    <div class="col-md-4"> </div>
    <div class="col-md-4">
    	<div class="redes-footer">
        <?php wp_nav_menu( array( 'theme_location' => 'footer-menu', 'menu_class' => 'footer-menu' ) ); ?>
    	</div>

    </div>
</div>



</div>
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
