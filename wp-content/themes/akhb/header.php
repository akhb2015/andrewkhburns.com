<?php
/**
 * The header for our theme
 *
 * @package akhb
 */

// Body class
if ( is_front_page() ) {
	$body_class = 'home bg-light';
} else {
	$body_class = get_post_meta( get_the_ID(), 'body_class', true );
}

if( is_user_logged_in() ){
	$wpnonce = wp_create_nonce( 'log-out' );

	$login_link = '<p class="nav">Signed In</p>';
	$reg_link = '<a href="' . get_home_url() . '/wp-login.php?action=logout&_wpnonce=' . $wpnonce . '" class="dropdown-item">Sign Out</a>';
}else{
	$login_link = '<a href="/login/" class="dropdown-item">Sign in</a>';
	$reg_link = '<a href="/create-account/" class="dropdown-item">Sign up</a>';
}

$user = wp_get_current_user();
$user_id = $user->ID;

?>

<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap" rel="stylesheet">

	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />

	<?php wp_head(); ?>
</head>

<body <?php body_class( $body_class ); ?>>

<?php wp_body_open(); ?>

	<header class="site-header">
		<div class="site-branding">

		</div><!-- .site-branding -->

		<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
		  <a class="navbar-brand" href="<?php echo get_home_url(); ?>">A>K>H>B></a>
		  <button class="navbar-toggler collapsed border-0" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
		  	<!--<span class="navbar-toggler-icon"></span>
		    <div class="close-icon py-1">&times;</div>-->
	        <div id="nav-icon3">
			  <span></span>
			  <span></span>
			  <span></span>
			  <span></span>
			</div>
		   </button>

		  <div class="collapse navbar-collapse" id="navbarSupportedContent">
		    <ul class="navbar-nav mr-auto">
		      <li class="nav-item dropdown">
		        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
		          Account
		        </a>
		        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
		          <?php echo $login_link ?>
		          <?php echo $reg_link ?>
		        </div>
		      </li>
		      <li class="nav-item dropdown">
		        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
		          Movies
		        </a>
		        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
		          <a href="<?php echo get_home_url() . '/add-movies/'; ?>" class="dropdown-item">Add to my List</a>
		          <a href="<?php echo get_home_url() . '/list-movies/'; ?>" class="dropdown-item">My to-watch List</a>
		          <a href="<?php echo get_home_url() . '/list-watched-movies/'; ?>" class="dropdown-item">Watched movies</a>
		        </div>
		      </li>
		      <li class="nav-item">
		        <a href="<?php echo get_home_url() . '/youtube'; ?>" class="nav-link">Video Search</a>
		      </li>
		    </ul>
		    <?php //get_search_form(); ?>
		    <?php if( is_user_logged_in() ): ?>
		    	<a href="<?php echo get_home_url() ?> '/wp-admin/profile.php" class="profile-link" title="Edit my profile" aria-label="Edit my profile"><i class="fa fa-user" style="color:#fff;margin-right:20px"></i></a>
		    <?php else : ?>
			    <ul class="navbar-nav ml-auto">
			    	<li class="nav-item">
				    	<a href="/login/" class="nav-link">Sign in <i class="fas fa-sign-in-alt" style="color:#fff;font-size:1.5rem;margin-left:6px;vertical-align:bottom"></i></a>
				    </li>
				</ul>
		    <?php endif; ?>
		 
		</nav><!-- #site-navigation -->
	</header>
