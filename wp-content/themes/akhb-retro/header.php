<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

	<?php wp_body_open(); ?>

	<div id="page" class="site">

		<header id="masthead" class="site-header">
			<div class="site-branding">
				<p><a href="<?php echo home_url(); ?>"><i class="fa-solid fa-laptop-code"></i></a></p>
			</div>
			<div class="social-media">
				<p><a href="https://www.linkedin.com/in/andy-burns-web-developer/" target="_blank"><i class="fa-brands fa-linkedin"></i></a></p>
			</div>
			<div class="hamburger">
				<div id="nav-icon3">
				  <span></span>
				  <span></span>
				  <span></span>
				  <span></span>
				</div>
			</div>
			<div class="mobile-nav-wrapper">
				<nav id="mobile-site-navigation" class="main-navigation">
				<?php
					wp_nav_menu(
						array(
							'theme_location' => 'primary',
							'menu_id'        => 'primary-menu',
						)
					);
					?>
				</nav>
			</div>
					
			<nav id="site-navigation" class="main-navigation">
				<?php
					wp_nav_menu(
						array(
							'theme_location' => 'primary',
							'menu_id'        => 'primary-menu',
						)
					);
				?>
			</nav><!-- #site-navigation -->
		</header><!-- #masthead -->