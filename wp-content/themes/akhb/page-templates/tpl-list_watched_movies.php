
<?php

/** List of Watched Movies
 *
 *
 * Template Name: List Watched Movies
 *
 *
 * @author      Andy Burns <akhb1968@yahoo.com>
 * @copyright   2021 Andy Burns
 * @link        https://www.andrewkhburns.com/list-watched-movies/
 * @version     $Id$
 *
 */

get_header();

?>

<main class="site-main">

<?php if( is_user_logged_in() ): ?>

	<?php

		$userid = get_current_user_id();

		global $wpdb;

		$query = $wpdb->prepare(
		    "SELECT * from wp_user_movies WHERE userid = %d AND watched = %d ORDER BY movie_title ASC", $userid, 1
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
				<p><strong>Movies I've seen</strong></p>
				<table class="table table-striped table-dark">
				  <thead>
				    <tr>
				      <th scope="col">Movie</th>
				      <th scope="col">Genre</th>
				      <th scope="col">Rating</th>
				    </tr>
				  </thead>
				  <tbody>

				  	<?php 
				  	
					  	for( $i = 0; $i < count( $movie_results ); $i++ ) {

					  		echo '<tr>
					  				<td class="text">' . ucfirst( $movie_results[$i]->movie_title ) . '</td>
					  				<td class="text">' . ucfirst( $movie_results[$i]->genre ) . '</td>
					  				<td><div class="my-rating" data-rating="' . $movie_results[$i]->rating . '" id="' . $movie_results[$i]->id . '"></div></td>
					  			</tr>';
					  	}
				  	?>

				  </tbody>
				</table>

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

<?php

get_footer();

?>