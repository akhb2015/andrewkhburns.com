<?php
/**
 * akhb-retro functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package akhb-retro
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function akhb_retro_setup() {
	/*
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		* If you're building a theme based on akhb-retro, use a find and replace
		* to change 'akhb-retro' to the name of your theme in all the template files.
		*/
	load_theme_textdomain( 'akhb-retro', get_template_directory() . '/languages' );

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

	// This theme uses wp_nav_menu() in 2 locations.
	register_nav_menus(
		array(
			'primary' => esc_html__( 'Primary', 'akhb-retro' ),
			'footer' => esc_html__( 'Footer Menu', 'akhb-retro' )
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
			'akhb_retro_custom_background_args',
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
add_action( 'after_setup_theme', 'akhb_retro_setup' );


/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function akhb_retro_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'akhb-retro' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'akhb-retro' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'akhb_retro_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function akhb_retro_scripts() {

	 //wp_enqueue_style( 'bootstrap', get_theme_file_uri( 'vendor/bootstrap/4.5.3/css/bootstrap.min.css' ), null, '4.5.3' );

	wp_enqueue_script( 'main-js', get_template_directory_uri() . '/js/main.js', array( 'jquery' ), time(), true );

    wp_enqueue_style('site-styles', get_template_directory_uri() . '/css/style.css', [], time() );

    wp_enqueue_style( 'google-fonts', 'https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap', false );

    wp_enqueue_script( 'font-awesome-kit', 'https://kit.fontawesome.com/563291e03f.js', [], null, true );

    //wp_enqueue_style( 'aos-styles', 'https://unpkg.com/aos@2.3.1/dist/aos.css', false );
    //wp_enqueue_script( 'aos-scripts', 'https://unpkg.com/aos@2.3.1/dist/aos.js', [], null, false );

}
add_action( 'wp_enqueue_scripts', 'akhb_retro_scripts' );


/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

//login check
function akhb_login_check( $content ) {
	if( is_page('blah') ) {
		if( !is_user_logged_in() ){
			$content = '<br><br><br><br>You need to be logged in to view this content<br><br><br>';
			return $content;
		}
	}
	return $content;
}

add_filter('the_content','akhb_login_check');


/**
 * Add a sensible starter set of security headers
 */
add_action( 'init', function() {
  $headers = [
    'Content-Security-Policy' => 'upgrade-insecure-requests',
    'Permissions-Policy' => 'geolocation=(self)',
    'Referrer-Policy' => 'no-referrer-when-downgrade',
    'X-Content-Type-Options' => 'nosniff',
    'X-Frame-Options' => 'sameorigin',
    'X-XSS-Protection' => '1; mode=block',
    'Strict-Transport-Security' => 'max-age=31536000; includeSubDomains'
  ];

  foreach ($headers as $header => $value) {
    header(sprintf(
      '%s: %s',
      $header,
      $value
    ));
  }
});

/**
 * Gently prevent user enumeration by redirecting likely author crawl requests.
 *
 * Any request with author query string will be sent to the homepage.
 * 301 header not included to avoid accidentally impacting SEO with errant user query strings.
 *
 * Note: This could be added to wp-redirects.php instead for better performance if available on the site.
 */
add_action('parse_request', function($wp) {
  $isAuthorEnumeration = (
    !isset($wp->query_vars['rest_route']) &&
    !!preg_match('/author=([0-9]*)/i', $_SERVER['QUERY_STRING'])
  );
  $isRestApiAuthorEnumeration = (
    !!isset($wp->query_vars['rest_route']) &&
    (!!preg_match('/wp-json\/v2\/users\/?/i', $wp->request) || !!preg_match('/wp-json\/wp\/v2\/users\/?/i', $wp->request))
  );
  if (!is_admin() && !is_user_logged_in() && ($isAuthorEnumeration || $isRestApiAuthorEnumeration)) {
    header(sprintf('Location: %s', get_home_url()));
    exit;
  }
}, 9);