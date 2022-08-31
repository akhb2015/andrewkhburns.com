<?php
/**
 * akhb functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package akhb
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

if ( ! function_exists( 'akhb_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function akhb_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on akhb, use a find and replace
		 * to change 'akhb' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'akhb', get_template_directory() . '/languages' );

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
				'menu-1' => esc_html__( 'Primary', 'akhb' ),
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
				'akhb_custom_background_args',
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
add_action( 'after_setup_theme', 'akhb_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function akhb_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'akhb_content_width', 970 );
}
add_action( 'after_setup_theme', 'akhb_content_width', 0 );


/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function akhb_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'akhb' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'akhb' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'akhb_widgets_init' );


/**
 * Enqueue scripts and styles.
 */
function akhb_styles() {

	wp_enqueue_style( 'bootstrap', get_theme_file_uri( 'vendor/bootstrap/4.5.3/css/bootstrap.min.css' ), null, '4.5.3' );
	wp_enqueue_style( 'checkboxes', get_theme_file_uri( 'vendor/awesome-bootstrap-checkbox/awesome-bootstrap-checkbox.css' ), null, '1.0.1' );

	//load page-specific css
	if ( is_page_template( 'page-templates/tpl-login_form.php' ) ) {
		wp_enqueue_style( 'myLogin', get_theme_file_uri( 'css/forms/login.css' ), null, filemtime( get_theme_file_path( 'css/forms/login.css' ) ) );
	}
	if ( is_page_template( 'page-templates/tpl-create_account.php' ) ) {
		wp_enqueue_style( 'registration', get_theme_file_uri( 'css/forms/registration.css' ), null, filemtime( get_theme_file_path( 'css/forms/registration.css' ) ) );
	}
	if ( is_page_template( 'page-templates/tpl-lost_password.php' ) ) {
		wp_enqueue_style( 'lostpassword', get_theme_file_uri( 'css/forms/lostpassword.css' ), null, filemtime( get_theme_file_path( 'css/forms/lostpassword.css' ) ) );
	}
	if ( is_page_template( 'page-templates/tpl-reset_password.php' ) ) {
		wp_enqueue_style( 'lostpassword', get_theme_file_uri( 'css/forms/reset-password.css' ), null, filemtime( get_theme_file_path( 'css/forms/reset-password.css' ) ) );
	}
	if ( is_page_template( 'page-templates/tpl-add_movies.php' ) ) {
		wp_enqueue_style( 'movies', get_theme_file_uri( 'css/forms/movies.css' ), null, filemtime( get_theme_file_path( 'css/forms/movies.css' ) ) );
	}
	if ( is_page_template( 'page-templates/tpl-list_watched_movies.php' ) ) {
		wp_enqueue_style( 'stars', get_theme_file_uri( 'css/star-rating-svg.css' ), null, filemtime( get_theme_file_path( 'css/star-rating-svg.css' ) ) );
	}
	if ( is_page_template( 'page-templates/tpl-video_search.php' ) ) {
		wp_enqueue_style( 'videosearch', get_theme_file_uri( 'css/video-search.css' ), null, filemtime( get_theme_file_path( 'css/video-search.css' ) ) );
	}

	// Theme defaults
	wp_enqueue_style( 'akhb', get_theme_file_uri( 'css/style.css' ), null, filemtime( get_theme_file_path( 'css/style.css' ) ) );
}
add_action( 'wp_enqueue_scripts', 'akhb_styles' );


function akhb_scripts() {

	wp_enqueue_script( 'jquery', get_theme_file_uri( 'vendor/jquery/jquery-3.5.1.min.js' ), array( 'jquery' ), '4.5.3', true );
	wp_enqueue_script( 'bootstrap', get_theme_file_uri( 'vendor/bootstrap/4.5.3/js/bootstrap.bundle.min.js' ), array( 'jquery' ), '4.5.3', true );

	//load page-specific js
	if ( is_page_template( 'page-templates/tpl-add_movies.php' ) || is_page_template( 'page-templates/tpl-list_movies.php' ) || is_page_template( 'page-templates/tpl-list_watched_movies.php' ) ) {
		wp_enqueue_script( 'movies', get_theme_file_uri( 'js/movies.js' ), array( 'jquery' ), null, true );
	}
	if ( is_page_template( 'page-templates/tpl-homepage_template.php' ) || is_page_template( 'page-templates/tpl-homepage_template.php' ) ) {
		wp_enqueue_script( 'home', get_theme_file_uri( 'js/home.js' ), array( 'jquery' ), null, true );
	}
	if ( is_page_template( 'page-templates/tpl-video_search.php' ) ) {
		wp_enqueue_script( 'video-search', get_theme_file_uri( 'js/video-search.js' ), array( 'jquery' ), null, true );
	}
	if ( is_page_template( 'page-templates/tpl-list_watched_movies.php' ) ) {
		wp_enqueue_script( 'stars', get_theme_file_uri( 'js/jquery.star-rating-svg.js' ), array( 'jquery' ), null, true );
	}
	// Reset password page
	if ( is_page( 'reset-password' ) ) {
		wp_enqueue_script( 'reset-password', get_theme_file_uri( 'js/reset-password.js' ), array( 'jquery' ), filemtime( get_theme_file_path( 'js/reset-password.js' ) ), true );
	}

	// Theme defaults
	wp_enqueue_script( 'akhb', get_theme_file_uri( 'js/global.js' ), array( 'jquery' ), filemtime( get_theme_file_path( 'js/global.js' ) ), true );

	wp_enqueue_script( 'font-awesome-kit', 'https://kit.fontawesome.com/563291e03f.js', [], null, true );
}
add_action( 'wp_enqueue_scripts', 'akhb_scripts' );

//security headers
add_action( 'init', function() {
  $headers = [
    'Content-Security-Policy' => 'upgrade-insecure-requests',
    'Permissions-Policy' => 'geolocation=(self)',
    'Referrer-Policy' => 'no-referrer-when-downgrade',
    'X-Content-Type-Options' => 'nosniff',
    'X-Frame-Options' => 'sameorigin',
    'X-XSS-Protection' => '1; mode=block',
    'Access-Control-Allow-Origin:' => '*'
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
 * PDO connection class.
 */
require get_template_directory() . '/inc/pdo-connect.php';

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

function remove_admin_bar() {
	if (!current_user_can('administrator') && !is_admin()) {
	  show_admin_bar( false );
	}
}
add_action('after_setup_theme', 'remove_admin_bar');


/*------------------------------------------------------------------------------
 * Redirect wp-login.php to our custom sign-in page
 -----------------------------------------------------------------------------*/
function akhb_redirect_to_custom_sign_in() {
	if ( $_SERVER['REQUEST_METHOD'] == 'GET' ) {
		$login_url = home_url( 'login' );

		// Check for 'redirect_to' and add it to the URL
		if ( !empty( $_REQUEST['redirect_to'] ) ) {
			$login_url = add_query_arg( 'redirect_to', $_REQUEST['redirect_to'], $login_url );
		}

		// Check for 'checkemail' and add it to the URL
		if ( !empty( $_REQUEST['checkemail'] ) ) {
			$login_url = add_query_arg( 'checkemail', $_REQUEST['checkemail'], $login_url );
		}

		wp_redirect( $login_url );
		exit;
	}
}
add_action( 'login_form_login', 'akhb_redirect_to_custom_sign_in' );

/*------------------------------------------------------------------------------
 * Redirect wp-login.php?action=register to our custom create account page
 -----------------------------------------------------------------------------*/
function akhb_redirect_to_custom_create_account_page() {
	if ( 'GET' == $_SERVER['REQUEST_METHOD'] ) {
		wp_redirect( home_url( 'create-account' ) );
		exit;
	}
}
add_action( 'login_form_register', 'akhb_redirect_to_custom_create_account_page' );


/*------------------------------------------------------------------------------
 * Redirect wp-login.php?action=lostpassword to our custom lost password page
 -----------------------------------------------------------------------------*/
function akhb_redirect_to_custom_lost_password_page() {
	if ( 'GET' == $_SERVER['REQUEST_METHOD'] ) {
		wp_redirect( home_url( 'lost-password' ) );
		exit;
	}
}
add_action( 'login_form_lostpassword', 'akhb_redirect_to_custom_lost_password_page' );


/*------------------------------------------------------------------------------
 * Redirect the user after a successful login
 -----------------------------------------------------------------------------*/
function akhb_redirect_after_login( $redirect_to, $request, $user ) {
	/*
	if ( $user && is_object( $user ) && is_a( $user, 'WP_User' ) ) {
		if ( $user->has_cap( 'administrator' ) ) {
			$redirect_to = admin_url();
		} else {
			$redirect_to = home_url( 'account' );
		}
	}
	*/

	return wp_validate_redirect( $redirect_to, home_url() );
}
add_filter( 'login_redirect', 'akhb_redirect_after_login', 10, 3 );


/*------------------------------------------------------------------------------
 * Redirect the user if there are authentication errors
 -----------------------------------------------------------------------------*/
function akhb_maybe_redirect_after_authenticate( $user, $username, $password ) {

		if ( $_SERVER['REQUEST_METHOD'] === 'POST' ) {
			if ( is_wp_error( $user ) ) {
				$error_codes = join( ',', $user->get_error_codes() );

				$redirect_url = home_url( 'login' );
				$redirect_url = add_query_arg( 'error', $error_codes, $redirect_url );

				wp_redirect( $redirect_url );
				exit;
			}
		}

	return $user;
}
add_filter( 'authenticate', 'akhb_maybe_redirect_after_authenticate', 101, 3 );

/*------------------------------------------------------------------------------
 * Initiate the password reset
 -----------------------------------------------------------------------------*/
function akhb_initiate_password_reset() {
	if ( 'POST' == $_SERVER['REQUEST_METHOD'] ) {
		$errors = retrieve_password();

		if ( is_wp_error( $errors ) ) {
			// Errors found
			$redirect_url = home_url( 'lost-password' );
			$redirect_url = add_query_arg( 'errors', join( ',', $errors->get_error_codes() ), $redirect_url );
		} else {
			// Email sent
			$redirect_url = home_url( 'login' );
			$redirect_url = add_query_arg( 'checkemail', 'confirm', $redirect_url );

			if ( !empty( $_REQUEST['redirect_to'] ) ) {
				$redirect_url = $_REQUEST['redirect_to'];
			}
		}

		wp_safe_redirect( $redirect_url );
		exit;
	}
}
add_action( 'login_form_lostpassword', 'akhb_initiate_password_reset' );

/*------------------------------------------------------------------------------
 * Customize the lost password email
 -----------------------------------------------------------------------------*/
function akhb_lost_password_email_content_type() {
	return 'text/html';
}

function akhb_custom_lost_password_email( $message, $key, $user_login, $user_data ) {
	add_filter( 'wp_mail_content_type', 'akhb_lost_password_email_content_type' );

	ob_start();
	include_once( get_theme_file_path( 'inc/emails/account-lost-password.php' ) );
	$message = ob_get_contents();
	ob_end_clean();

	return $message;
}
add_filter( 'retrieve_password_message', 'akhb_custom_lost_password_email', 99, 4 );
add_filter( 'retrieve_password_title', function( $title ) { $title = __( 'Password Reset' ); return $title; } );


/*------------------------------------------------------------------------------
 * Redirect wp-login.php?action=resetpass to our custom reset password page
 -----------------------------------------------------------------------------*/
function akhb_redirect_to_custom_reset_password_page() {
	if ( 'GET' == $_SERVER['REQUEST_METHOD'] ) {
		$user = check_password_reset_key( $_REQUEST['key'], $_REQUEST['login'] );

		if ( !$user || is_wp_error( $user ) ) {
			if ( $user && $user->get_error_code() === 'expired_key' ) {
				wp_redirect( home_url( 'login/?login=expired_key' ) );
			} else {
				wp_redirect( home_url( 'login/?login=invalid_key' ) );
			}
			exit;
		}

		$reset_pass_url = home_url( 'reset-password' );

		// Add 'key' and 'login' to the URL
		$reset_pass_url = add_query_arg( 'key', esc_attr( $_REQUEST['key'] ), $reset_pass_url );
		$reset_pass_url = add_query_arg( 'login', esc_attr( $_REQUEST['login'] ), $reset_pass_url );

		wp_redirect( $reset_pass_url );
		exit;
	}
}
add_action( 'login_form_rp', 'akhb_redirect_to_custom_reset_password_page' );
add_action( 'login_form_resetpass', 'akhb_redirect_to_custom_reset_password_page' );

/*------------------------------------------------------------------------------
 * Do the password reset
 -----------------------------------------------------------------------------*/
function akhb_do_password_reset() {
	
	if ( 'POST' == $_SERVER['REQUEST_METHOD'] ) {
		$rp_key = $_REQUEST['rp_key'];
		$rp_login = $_REQUEST['rp_login'];

		$user = check_password_reset_key( $rp_key, $rp_login );

		if ( !$user || is_wp_error( $user ) ) {
			if ( $user && $user->get_error_code() === 'expired_key' ) {
				wp_redirect( home_url( 'login/?error=expired_key' ) );
			} else {
				wp_redirect( home_url( 'login/?error=invalid_key' ) );
			}
			exit;
		}

		// Make sure the password is 8 characters
		if ( 0 === preg_match( '/.{8,}/', $_POST['password'] ) ) {
			$redirect_url = home_url( 'reset-password' );
			$redirect_url = add_query_arg( 'key', $rp_key, $redirect_url );
			$redirect_url = add_query_arg( 'login', $rp_login, $redirect_url );
			$redirect_url = add_query_arg( 'error', 'password_wrong_size', $redirect_url );

			wp_redirect( $redirect_url );
			exit;
		}

		// Make sure the passwords match
		if ( strcmp ( $_POST['password'], $_POST['password_confirmation'] ) !== 0 ) {
			$redirect_url = home_url( 'reset-password' );
			$redirect_url = add_query_arg( 'key', $rp_key, $redirect_url );
			$redirect_url = add_query_arg( 'login', $rp_login, $redirect_url );
			$redirect_url = add_query_arg( 'error', 'password_reset_mismatch', $redirect_url );

			wp_redirect( $redirect_url );
			exit;
		}

		// Parameter checks OK, reset password
		reset_password( $user, $_POST['password'] );
		wp_redirect( home_url( 'sign-in/?password=changed' ) );

		exit;
	}
}
add_action( 'login_form_rp', 'akhb_do_password_reset' );
add_action( 'login_form_resetpass', 'akhb_do_password_reset' );


//WP cookies blocked bug
setcookie(TEST_COOKIE, 'WP Cookie check', 0, COOKIEPATH, COOKIE_DOMAIN, false, true);
if ( SITECOOKIEPATH != COOKIEPATH ) setcookie(TEST_COOKIE, 'WP Cookie check', 0, SITECOOKIEPATH, COOKIE_DOMAIN, false, true, 'LAX');



function curl_api_call( $url, $access_token, $payload = NULL, $request_type ) {
 
	$curl = curl_init();

	curl_setopt_array( $curl, array(
	CURLOPT_URL => $url,
	CURLOPT_CUSTOMREQUEST  => $request_type,
	CURLOPT_POSTFIELDS     => $payload,
	CURLOPT_RETURNTRANSFER => true,
	CURLOPT_ENCODING       => '',
	CURLOPT_MAXREDIRS      => 10,
	CURLOPT_TIMEOUT        => 30,
  	CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  	CURLOPT_HTTPHEADER => array(
	    "Accept: application/json",
	    "Content-Type: application/json",
	    "Authorization: Bearer " . $access_token
	  ),
	));

	$error = curl_error( $curl );

	$response = curl_exec( $curl );
	$decoded_response = json_decode( $response, true );

	curl_close( $curl );

	if( !empty( $error ) ) {
		echo '<br>cURL error: ';
		print_r( $error );
	}

	//echo '<br>Response: ';
	//print_r( $response );

	return $decoded_response;
}



function imdb_api_call( $searchterm ) {

	$curl = curl_init();

	curl_setopt_array($curl, [
		CURLOPT_URL => "https://imdb-internet-movie-database-unofficial.p.rapidapi.com/search/" . $searchterm . "?type=movie",
		CURLOPT_RETURNTRANSFER => true,
		CURLOPT_FOLLOWLOCATION => true,
		CURLOPT_ENCODING => "",
		CURLOPT_MAXREDIRS => 10,
		CURLOPT_TIMEOUT => 30,
		CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		CURLOPT_CUSTOMREQUEST => "GET",
		CURLOPT_HTTPHEADER => [
			"x-rapidapi-host: imdb-internet-movie-database-unofficial.p.rapidapi.com",
			"x-rapidapi-key: 38d0b8fe97msh365f2f916b398f6p1890ccjsn154c92a0686c"
		],
	]);

	$response = curl_exec($curl);
	$decoded_response = json_decode( $response, TRUE );
	$err = curl_error($curl);

	curl_close($curl);

	if ($err) {
		echo "cURL Error #:" . $err;
	} else {
		echo '<pre>';
		print_r($decoded_response);
		echo '</pre>';
	}
}


//Page Custom Body Class
function add_custom_body_class( $classes ) {
    global $post;
    if ( isset( $post ) ) {
        $classes[] = $post->post_name;
    }
    $new_class = get_field( 'custom_body_class', $post->ID );
    if( !empty( $new_class ) ) {
        $classes[] = $new_class;
    }
    return $classes;
}
add_filter( 'body_class', 'add_custom_body_class' );


// Function to change email address
function wpb_sender_email( $original_email_address ) {
    return 'support@andrewkhburns.com';
}
 
// Function to change sender name
function wpb_sender_name( $original_email_from ) {
    return 'AKHB Support';
}
 
// Hooking up our functions to WordPress filters 
add_filter( 'wp_mail_from', 'wpb_sender_email' );
add_filter( 'wp_mail_from_name', 'wpb_sender_name' );