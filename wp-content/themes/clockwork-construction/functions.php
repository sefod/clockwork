<?php
/**
 * ClockWork Construction functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package ClockWork_Construction
 */

if ( ! function_exists( 'clockwork_construction_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function clockwork_construction_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on ClockWork Construction, use a find and replace
	 * to change 'clockwork-construction' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'clockwork-construction', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => esc_html__( 'Primary', 'clockwork-construction' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'clockwork_construction_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );
}
endif;
add_action( 'after_setup_theme', 'clockwork_construction_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function clockwork_construction_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'clockwork_construction_content_width', 640 );
}
add_action( 'after_setup_theme', 'clockwork_construction_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function clockwork_construction_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'clockwork-construction' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'clockwork-construction' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'clockwork_construction_widgets_init' );

function clockwork_contact_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Contact Us Sidebar', 'clockwork-construction' ),
		'id'            => 'contact-sidebar',
		'description'   => esc_html__( 'Add widgets here.', 'clockwork-construction' ),
		'before_widget' => '',
		'after_widget'  => '',
		'before_title'  => '<h2>',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'clockwork_contact_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function clockwork_construction_scripts() {
	wp_enqueue_style( 'clockwork-construction-style', get_stylesheet_uri() );

	wp_enqueue_script( 'clockwork-slicknav', get_template_directory_uri() . '/js/jquery.slicknav.js', array('jquery'), '0.1', true );
	
	wp_enqueue_style( 'clockwork-slicknav-css', get_template_directory_uri() . '/js/slicknav.css', array(), '3.0.2', 'all' );

	wp_enqueue_script( 'clockwork-construction-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

	wp_register_script( 'bootstrap-js', get_template_directory_uri() . '/bootstrap/js/bootstrap.min.js', array( 'jquery' ), '3.0.2', true );

	wp_register_style( 'bootstrap-css', get_template_directory_uri() . '/bootstrap/css/bootstrap.min.css', array(), '3.0.2', 'all' );

	wp_register_style( 'fontawesome-css', get_template_directory_uri() . '/css/font-awesome-4.7.0/css/font-awesome.min.css');

	wp_enqueue_script( 'bootstrap-js' );

	wp_enqueue_style( 'bootstrap-css' );

	wp_enqueue_style( 'fontawesome-css' );


	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}

add_action( 'wp_enqueue_scripts', 'clockwork_construction_scripts' );

function clockwork_theme_menu() {
  register_nav_menu('footer-menu',__( 'Footer Menu' ));
}
add_action( 'init', 'clockwork_theme_menu' );


//Google Fonts
add_action('init', 'clockwork_js_css');
function clockwork_js_css(){
wp_register_style( 'googleFonts', 'http://fonts.googleapis.com/css?family=Roboto:400,700');
wp_enqueue_style( 'googleFonts' );
}



// CREATE POST TYPES

add_action( 'init', 'create_post_type' );
function create_post_type() {
  register_post_type( 'project',
    array(
		'labels' => array(
		'name' => __( 'Projects' ),
		'singular_name' => __( 'Projects' ),
      ),
		'public' => true,
		'has_archive' => true,
        'supports' => array( 'title', 'editor', 'thumbnail')
    )
  );
  register_post_type( 'team',
    array(
		'labels' => array(
		'name' => __( 'Team' ),
		'singular_name' => __( 'Team' ),
      ),
		'public' => true,
		'has_archive' => true,
        'supports' => array( 'title', 'editor', 'thumbnail')
    )
  );
  register_post_type( 'awards',
    array(
		'labels' => array(
		'name' => __( 'Awards' ),
		'singular_name' => __( 'Awards' ),
      ),
		'public' => true,
		'has_archive' => true,
        'supports' => array( 'title', 'editor', 'thumbnail')
    )
  );
};
  
// Register Custom Taxonomy
function custom_taxonomy() {

	$labels = array(
		'name'                       => _x( 'Categories', 'Taxonomy General Name', 'clockwork' ),
		'singular_name'              => _x( 'Category', 'Taxonomy Singular Name', 'clockwork' ),
		'menu_name'                  => __( 'Categories', 'clockwork' ),
		'all_items'                  => __( 'All Items', 'clockwork' ),
		'parent_item'                => __( 'Parent Item', 'clockwork' ),
		'parent_item_colon'          => __( 'Parent Item:', 'clockwork' ),
		'new_item_name'              => __( 'New Item Name', 'clockwork' ),
		'add_new_item'               => __( 'Add New Item', 'clockwork' ),
		'edit_item'                  => __( 'Edit Item', 'clockwork' ),
		'update_item'                => __( 'Update Item', 'clockwork' ),
		'view_item'                  => __( 'View Item', 'clockwork' ),
		'separate_items_with_commas' => __( 'Separate items with commas', 'clockwork' ),
		'add_or_remove_items'        => __( 'Add or remove items', 'clockwork' ),
		'choose_from_most_used'      => __( 'Choose from the most used', 'clockwork' ),
		'popular_items'              => __( 'Popular Items', 'clockwork' ),
		'search_items'               => __( 'Search Items', 'clockwork' ),
		'not_found'                  => __( 'Not Found', 'clockwork' ),
		'no_terms'                   => __( 'No items', 'clockwork' ),
		'items_list'                 => __( 'Items list', 'clockwork' ),
		'items_list_navigation'      => __( 'Items list navigation', 'clockwork' ),

	);
	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => true,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => true,
		'show_tagcloud'              => true,
		'rewrite' => array(
                'slug' => 'projects'
            )
	);
	register_taxonomy( 'project_category', array( 'project' ), $args );

}
add_action( 'init', 'custom_taxonomy', 0 );





/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';

if(!get_option("medium_crop"))
add_option("medium_crop", "0");
else
update_option("medium_crop", "0");


function cw_footer_scripts(){
	echo '<script type="text/javascript">
	jQuery(document).ready(function() {

		
		

		jQuery( window ).resize(function() {

		  var width = jQuery(window).width(), height = jQuery(window).height();
		  if ((width <= 768)) {
				jQuery("#primary-menu").slicknav({
					prependTo:"#site-navigation",
					label: ""
				});
			};
		});

		jQuery(window).trigger("resize");
		

		jQuery(".footer-menu li a" ).html( "" );
		jQuery(".footer-menu li a").css( "display", "block" );

	});
	</script>';

}

add_action( 'wp_footer', 'cw_footer_scripts' );



