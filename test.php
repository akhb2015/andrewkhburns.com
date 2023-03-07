<!doctype html>
<html lang="en-US">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">

		<link rel="preconnect" href="https://fonts.gstatic.com">
		<link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap" rel="stylesheet">

		<link rel='stylesheet' id='bootstrap-css' href='wp-content/themes/akhb/vendor/bootstrap/4.5.3/css/bootstrap.min.css?ver=4.5.3' media='all' />
		<link rel='stylesheet' id='checkboxes-css' href='wp-content/themes/akhb/vendor/awesome-bootstrap-checkbox/awesome-bootstrap-checkbox.css?ver=1.0.1' media='all' />
		<link rel='stylesheet' id='akhb-css' href='style.css?ver=1661375705' media='all' />

		<title>Page title</title>
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
			          <a href="https://www.andrewkhburns.com/login/" class="dropdown-item">Sign in</a>		 <a href="https://www.andrewkhburns.com/create-account/" class="dropdown-item">Sign up</a>
			      </div>
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
			<div class="my-info-box">
				<h1 class="masthead-text">
					<span class="my-name">Andy Burns</span>
					<span class="my-title">Web Developer</span>
					<span class="my-location">Portland, Oregon</span>
				</h1>
			</div>
		</div>

		<main class="site-main">
			<div class="container-fluid">
				<div class="row">
					<div class="col-md-12">

						<?php 

							//check if form was submitted
							if( $_POST ):

							//sanitize form values
							$genre = filter_var( $_POST['genre'], FILTER_SANITIZE_STRING );
							$title = filter_var( $_POST['movie_title'], FILTER_SANITIZE_STRING );

							echo $title . ' is a great ' . $genre . ' movie!';

							else:

						?>

						<button type="button" class="btn btn-pink btn-confirm" data-toggle="modal" data-target="#basicExampleModal">Click Me</button>



						<!-- Modal -->
						<div class="modal fade" id="basicExampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
						  <div class="modal-dialog" role="document">
						    <div class="modal-content">
						      <div class="modal-header">
						        <h5 class="modal-title" id="exampleModalLabel">My Form</h5>
						        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
						          <span aria-hidden="true">&times;</span>
						        </button>
						      </div>
						      <div class="modal-body edit-content">

						      	<form name="projectForm" id="projectForm" class="needs-validation" novalidate method="post">
									<div class="form-group">
										<select name="genre" id="genre" class="select form-control" required>
										  <option value="">Select movie genre</option>
										  <option value="action">Action</option>
										  <option value="adventure">Adventure</option>
										  <option value="comedy">Comedy</option>
										  <option value="fantasy">Fantasy</option>
										  <option value="historical">Historical</option>
										  <option value="horror">Horror</option>
										  <option value="mystery">Mystery</option>
										  <option value="romance">Romance</option>
										  <option value="Sci Fi">Sci Fi</option>
										  <option value="thriller">Thriller</option>
										  <option value="western">Western</option>
										  <option value="other">Other</option>
										</select>
										<div class="invalid-feedback">
									    	Please select a movie genre
									    </div>
									</div>
									<div class="form-group" id="genre_other" style="display:none">
										<input type="text" name="genre_other" id="genre_other" class="input form-control" value="" placeholder="Genre" autocapitalize="off" />
										<div class="invalid-feedback">
									    	Please enter a genre
									    </div>
									</div>
									<div class="form-group">
										<input type="text" name="movie_title" id="movie_title" class="input form-control" value="" placeholder="Movie Title" autocapitalize="off" required />
										<div class="invalid-feedback">
									    	Please enter the name of the film
									    </div>
									</div>

									<br class="clear" />
									<input type="hidden" name="redirect_to" value="" />
									<p class="submit">
										<input type="submit" name="project-submit" id="project-submit" class="btn btn-pink" value="Save" />
									</p>
								</form>
						        
						    </div>
						  </div>
						</div>
					</div> <!--end modal-->



				</div>
			</div>
		</div>

			<?php endif; ?>

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

		<script src='wp-includes/js/jquery/jquery.min.js?ver=3.6.1' id='jquery-core-js'></script>
		<script src='wp-content/themes/akhb/vendor/bootstrap/4.5.3/js/bootstrap.bundle.min.js?ver=4.5.3' id='bootstrap-js'></script>
		<script src='wp-content/themes/akhb/js/global.js?ver=1644265157' id='akhb-js'></script>
		<script src='https://kit.fontawesome.com/563291e03f.js' id='font-awesome-kit-js'></script>

		<script>
			$(document).ready(function () {
			    toggleFields(); 
			    $("#genre").change(function () {
			        toggleFields();
			    });

			});

			// toggles the visibility of other input
			function toggleFields() {
			    if ($("#genre").val() === "other") {
			      $("#genre_other").show()
			      $("input#genre_other").prop("required", true);
			    } else {
			      $("#genre_other").hide();
			    }  
			}
		</script>

	</body>
</html>