<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package ClockWork_Construction
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="apple-touch-icon" sizes="76x76" href="<?php echo esc_url( home_url( '/' ) ); ?>favicons/apple-icon-76x76.png">
<link rel="icon" type="image/png" href="<?php echo esc_url( home_url( '/' ) ); ?>favicons/favicon-32x32.png" sizes="32x32">
<link rel="icon" type="image/png" href="<?php echo esc_url( home_url( '/' ) ); ?>favicons/favicon-16x16.png" sizes="16x16">
<link rel="manifest" href="<?php echo esc_url( home_url( '/' ) ); ?>favicons/manifest.json">
<link rel="shortcut icon" href="<?php echo esc_url( home_url( '/' ) ); ?>favicons/favicon.ico">
<meta name="msapplication-config" content="<?php echo esc_url( home_url( '/' ) ); ?>favicons/browserconfig.xml">
<meta name="theme-color" content="#ffffff">

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content">
		<?php esc_html_e( 'Skip to content', 'clockwork-construction' ); ?>
	</a>

	<header id="masthead" class="site-header" role="banner">
		<div class="container">

			<div class="site-branding">
				<?php
				if ( is_front_page() && is_home() ) : ?>
					<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">1 <?php bloginfo( 'name' ); ?></a></h1>
				<?php else : ?>
					<p class="site-title">
						<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
				          <img src="<?php bloginfo('stylesheet_directory'); ?>/img/logo.png" class="logo_header">
						</a>
					</p>
				<?php
				endif;

				?>
			</div><!-- .site-branding -->
			<?php get_template_part( 'template-parts/searchform', get_post_format() ); ?> 
			<nav id="site-navigation" class="main-navigation" role="navigation">
				<?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_id' => 'primary-menu' ) ); ?>
			</nav><!-- #site-navigation -->

		</div>
	</header><!-- #masthead -->

	<div id="content" class="site-content">
