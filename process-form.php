<!doctype html>
<html lang="en-US">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap" rel="stylesheet">

	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />

	<title>Title</title>

	<link rel='stylesheet' id='wp-block-library-css' href='https://www.andrewkhburns.com/wp-includes/css/dist/block-library/style.min.css?ver=6.1.1' media='all' />
<link rel='stylesheet' id='classic-theme-styles-css' href='https://www.andrewkhburns.com/wp-includes/css/classic-themes.min.css?ver=1' media='all' />

<link rel='stylesheet' id='bootstrap-css' href='https://www.andrewkhburns.com/wp-content/themes/akhb/vendor/bootstrap/4.5.3/css/bootstrap.min.css?ver=4.5.3' media='all' />
<link rel='stylesheet' id='checkboxes-css' href='https://www.andrewkhburns.com/wp-content/themes/akhb/vendor/awesome-bootstrap-checkbox/awesome-bootstrap-checkbox.css?ver=1.0.1' media='all' />
<link rel='stylesheet' id='akhb-css' href='https://www.andrewkhburns.com/wp-content/themes/akhb/style.css?ver=1661375705' media='all' />
<script src='https://www.andrewkhburns.com/wp-includes/js/jquery/jquery.min.js?ver=3.6.1' id='jquery-core-js'></script>
<script src='https://www.andrewkhburns.com/wp-includes/js/jquery/jquery-migrate.min.js?ver=3.3.2' id='jquery-migrate-js'></script>

</head>

<body>
	<header class="site-header">
		<div class="site-branding">

		</div><!-- .site-branding -->

		<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
		  <a class="navbar-brand" href="https://www.andrewkhburns.com">AKHB</a>
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
		          <a href="https://www.andrewkhburns.com/login/" class="dropdown-item">Sign in</a>		          <a href="https://www.andrewkhburns.com/create-account/" class="dropdown-item">Sign up</a>		        </div>
		      </li>
		      <li class="nav-item dropdown">
		        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
		          Movies
		        </a>
		        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
		          <a href="https://www.andrewkhburns.com/add-movies/" class="dropdown-item">Add to my List</a>
		          <a href="https://www.andrewkhburns.com/list-movies/" class="dropdown-item">My to-watch List</a>
		          <a href="https://www.andrewkhburns.com/list-watched-movies/" class="dropdown-item">Watched movies</a>
		        </div>
		      </li>
		      <li class="nav-item">
		        <a href="https://www.andrewkhburns.com/youtube" class="nav-link">Video Search</a>
		      </li>
		    </ul>
		    <ul class="navbar-nav ml-auto">
		    	<li class="nav-item">
			    	<a href="https://www.andrewkhburns.com/login/" class="nav-link">Sign in <i class="fas fa-sign-in-alt" style="color:#fff;font-size:1.5rem;margin-left:6px;vertical-align:bottom"></i></a>
			    </li>
			</ul>
		    		 
		</nav><!-- #site-navigation -->
	</header>

<div class="masthead">
	<!--<div class="overlay"></div>-->
	<div class="my-info-box">
		<h1 class="masthead-text">
			<span class="my-name">Andy Burns</span>
			<span class="my-title">Web Developer</span>
			<span class="my-location">Portland, Oregon</span>
		</h1>
	</div>
</div>

<main class="site-main">

	<?php 

	echo 'Form results: ';
	print_r($_POST);


	?>

</main>

<footer id="site-footer">
	<div id="footer-wrapper" class="bg-dark text-light-subtitle">
		<div class="container-fluid">
			<div class="footer-bottom py-1">
				<div class="row py-3">
					<div class="col-md-5 col-lg-6">
						<p class="mb-0">&copy; 2023 <a href="https://www.andrewkhburns.com">AKHB</a></p>
					</div>

					<div class="col-md-7 col-lg-6 text-md-right">
						<p class="mb-0"><a href="https://www.andrewkhburns.com/company/">About</a> &bull; <a href="https://www.andrewkhburns.com/company/privacy/">Privacy Policy</a> &bull; <a href="https://www.andrewkhburns.com/company/terms/">Terms of Use</a></p>
					</div>
				</div>
			</div>
		</div>
	</div>
</footer>

	<script src='https://www.andrewkhburns.com/wp-content/themes/akhb/vendor/bootstrap/4.5.3/js/bootstrap.bundle.min.js?ver=4.5.3' id='bootstrap-js'></script>
	<script src='https://www.andrewkhburns.com/wp-content/themes/akhb/js/home.js' id='home-js'></script>
	<script src='https://www.andrewkhburns.com/wp-content/themes/akhb/js/global.js?ver=1644265157' id='akhb-js'></script>
	<script src='https://kit.fontawesome.com/563291e03f.js' id='font-awesome-kit-js'></script>

</body>
</html>