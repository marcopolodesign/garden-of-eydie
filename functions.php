<?php
/**
 * Garden Of Eydie functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Garden_Of_Eydie
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

if ( ! function_exists( 'garden_of_eydie_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function garden_of_eydie_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on Garden Of Eydie, use a find and replace
		 * to change 'garden-of-eydie' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'garden-of-eydie', get_template_directory() . '/languages' );

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
		register_nav_menus(
			array(
				'menu-1' => esc_html__( 'Left Header', 'garden-of-eydie' ),
				'menu-2' => esc_html__( 'Right Header', 'garden-of-eydie' ),
				'menu-3' => esc_html__( 'Footer', 'garden-of-eydie' ),
			)
		);

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support(
			'html5',
			array(
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
				'style',
				'script',
			)
		);

		// Set up the WordPress core custom background feature.
		add_theme_support(
			'custom-background',
			apply_filters(
				'garden_of_eydie_custom_background_args',
				array(
					'default-color' => 'ffffff',
					'default-image' => '',
				)
			)
		);

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support(
			'custom-logo',
			array(
				'height'      => 250,
				'width'       => 250,
				'flex-width'  => true,
				'flex-height' => true,
			)
		);
	}
endif;
add_action( 'after_setup_theme', 'garden_of_eydie_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function garden_of_eydie_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'garden_of_eydie_content_width', 640 );
}
add_action( 'after_setup_theme', 'garden_of_eydie_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function garden_of_eydie_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'garden-of-eydie' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'garden-of-eydie' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'garden_of_eydie_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function garden_of_eydie_scripts() {
	wp_enqueue_style( 'garden-of-eydie-style', get_stylesheet_uri(), array(), _S_VERSION );
	wp_style_add_data( 'garden-of-eydie-style', 'rtl', 'replace' );

	wp_enqueue_style('garden-of-eydie-tachyons', get_template_directory_uri() . '/css/tachyons.css');

	wp_enqueue_style('garden-of-eydie-marcopolo', get_template_directory_uri() . '/css/marcopolo.css');


	wp_enqueue_style('garden-of-eydie-custom', get_template_directory_uri() . '/css/custom.css');


	wp_enqueue_script( 'garden-of-eydie-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true );

	wp_enqueue_script( 'garden-of-eydie-barba', get_template_directory_uri() . '/js/barba.js',  array( 'jquery' ), '0.5.2' , true);

	wp_enqueue_script( 'garden-of-eydie-prefetch', get_template_directory_uri() . '/js/barba-prefetch.js',  array( 'jquery' ), '0.5.2' , true);

	wp_enqueue_script( 'garden-of-eydie-gsap', get_template_directory_uri() . '/js/gsap.js',  array( 'jquery' ), '0.5.2' , true);

	wp_enqueue_script( 'garden-of-eydie-main', get_template_directory_uri() . '/js/main.js',  array( 'jquery' ), '0.5.2' , true);


	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'garden_of_eydie_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

/**
 * Load WooCommerce compatibility file.
 */
if ( class_exists( 'WooCommerce' ) ) {
	require get_template_directory() . '/inc/woocommerce.php';
}
