
<?php

/** List Movies
 *
 *
 * Template Name: List Movies
 *
 *
 * @author      Andy Burns <akhb1968@yahoo.com>
 * @copyright   2021 Andy Burns
 * @link        https://www.andrewkhburns.com/list-movies/
 * @version     $Id$
 *
 */

get_header();

if( isset( $_GET['title'] ) ) $title = $_GET['title'];

?>

<main class="site-main">

<?php if( is_user_logged_in() ): ?>

	<?php

		$userid = get_current_user_id();

		global $wpdb;

		$query = $wpdb->prepare(
		    "SELECT * from wp_user_movies WHERE userid = %d AND watched = %d ORDER BY movie_title ASC", $userid, 0
		);

		$movie_results = $wpdb->get_results( $query );

		if ( empty( $movie_results ) ) {
			echo '<p>No movies on your list yet. Feel free to start <a href="/add-movies/">adding movies now</a>.</p>';
			echo '</main>';
			get_footer();
			exit;
		}

		//imdb_api_call('braveheart');

	?>	

	<div class="container-fluid">
		<div class="row">
			<div class="col-lg-12">
				<?php if ( isset( $_GET['movie-deleted'] ) ) : ?>
					<h3 id="project-deleted"><?php echo $title; ?> was moved to your watched list</h3>
				<?php endif; ?>
				<p><strong>Movies I want to see</strong></p>
				<table class="table table-striped table-dark">
				  <thead>
				    <tr>
				      <th scope="col">Movie</th>
				      <th scope="col">Genre</th>
				    </tr>
				  </thead>
				  <tbody>

				  	<?php 
					  	for( $i = 0; $i < count( $movie_results ); $i++ ) {

					  		echo '<tr>
					  				<td class="text">' . ucfirst( $movie_results[$i]->movie_title ) . '</td>
					  				<td class="text">' . ucfirst( $movie_results[$i]->genre ) . '</td>
					  				<td><button type="button" class="btn btn-primary btn-confirm" data-toggle="modal" data-movieid="' . $movie_results[$i]->id . '" data-moviename="' . $movie_results[$i]->movie_title . ' "data-target="#basicExampleModal">Watched</button></td>
					  			</tr>';
					  	}
				  	?>

				  </tbody>
				</table>

				<!-- Modal -->
				<div class="modal fade" id="basicExampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
				  <div class="modal-dialog" role="document">
				    <div class="modal-content">
				      <div class="modal-header">
				        <h5 class="modal-title" id="exampleModalLabel">Watched it</h5>
				        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
				          <span aria-hidden="true">&times;</span>
				        </button>
				      </div>
				      <div class="modal-body edit-content">
				        
				      </div>
				      <div class="modal-footer">
				        <button type="button" class="btn btn-secondary btn-cancel-modal" data-dismiss="modal">Not just yet</button>
				        <button type="button" id="btn-confirm" class="btn btn-primary">Please do</button>
				      </div>
				    </div>
				  </div>
				</div>

			</div>
		</div>
	</div>

	<?php else: ?>

	<div class="container-fluid">
		<div class="row">
			<div class="col-lg-12">
				<p>Please <a href="<?php echo home_url( 'login' ); ?>">sign in</a> to view this content</p>
			</div>
		</div>
	</div>

	<?php endif; ?>

</main>

<div id="imgSpinner1"></div>

<?php

get_footer();

?>