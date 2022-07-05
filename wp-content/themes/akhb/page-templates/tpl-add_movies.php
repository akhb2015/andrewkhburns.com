
<?php

/** Add Movies
 *
 *
 * Template Name: Add Movies
 *
 *
 * @author      Andy Burns <akhb1968@yahoo.com>
 * @copyright   2021 Andy Burns
 * @link        https://www.andrewkhburns.com/add-movies/
 * @version     $Id$
 *
 */

get_header();

$project_submitted = false;


// If the form has been submitted...
if ( $_POST ) {

	// Get and sanitize the submitted form fields
	if( $_POST['genre'] == 'other' ){
		$genre = sanitize_text_field( $_POST['genre_other'] );
	}else{
		$genre = sanitize_text_field( $_POST['genre'] );
	}
	
	$movie_title = sanitize_text_field( $_POST['movie_title'] );
	$userid = get_current_user_id();

	$wpdb->insert( 'Zwv_user_movies', array(
	    'genre' => $genre,
	    'movie_title' => $movie_title,
	    'userid' => $userid,
	    'watched' => 0
	) );

	$project_submitted = true;
}

?>

<main class="site-main">

<?php if( is_user_logged_in() ): ?>

	<div class="container-fluid">
		<div class="row">
			<div class="col-lg-3 col-md-12">
				<div class="project-button-wrapper">
					<button type="button" id="formButton" class="new-project-button">Add a Movie</button>
					<br><br>
					<button class="current-projects-button" id="" onclick="window.location.href='<?php echo get_home_url() . '/list-movies/'; ?>'">My to-see list</button>
					<br><br>
					<button class="current-projects-button" id="" onclick="window.location.href=''<?php echo get_home_url() . '/list-watched-movies/'; ?>'">Watched Movies</button>
				</div>
			</div>

			<div class="col-lg-9 col-md-12">
				<?php if ( $project_submitted ) : ?>
					<h2 id="project-submitted-msg"><?php echo $movie_title; ?> has been added to your to-see list</h2>
				<?php endif; ?>
				<div id="project-form">
					<h2>Add a movie to my to-see list</h2>

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
							<input type="submit" name="project-submit" id="project-submit" class="button button-primary button-large" value="Save" />
						</p>
					</form>

				</div>
			</div>
		</div>

	<?php else: ?>

		<div class="container-fluid">
			<div class="row">
				<div class="col-md-12">
					<p>Please <a href="<?php echo home_url( 'login' ); ?>">sign in</a> to view this content.</p>
				</div>
			</div>
		</div>

	<?php endif; ?>

</main>

<?php

get_footer();

?>