
<?php

/** Youtube API
 *
 *
 * Template Name: YouTube Page
 *
 *
 * @author      Andy Burns <akhb1968@yahoo.com>
 * @copyright   2021 Andy Burns
 * @link        https://www.andrewkhburns.com/youtube/
 * @version     $Id$
 *
 */

get_header();

if( $_SERVER['REQUEST_METHOD'] == 'POST' && !empty( $_POST['wp-submit-video-search'] ) ) : ?>

	<?php

		$searchterm = sanitize_text_field( $_POST['searchterm'] );
		$searchterm = urlencode( $searchterm );

		$API_key = YOUTUBE_API_KEY;

		$maxResults = 12;

		$videoList = json_decode( file_get_contents( 'https://www.googleapis.com/youtube/v3/search?order=date&part=snippet&maxResults=' . $maxResults .'&q=' . $searchterm . '&type=video&key='. $API_key ) );

		$error = false;
		if( empty( $videoList ) ){
			$error = true;
		}

		if( $error ) {
			echo '<main class="site-main">';
			echo '<p>We encountered an error. Please try again later.</p>';
			echo '</main>';
			get_footer();
			exit;
		}
		
	?>

	<main class="site-main">

		<div class="container-fluid">
			<h2>Search Results for <?php echo $_POST['searchterm']; ?></h2>
			<br>
			<div class="row">

				<?php for( $i = 0; $i < count( $videoList->items ); $i++ ): ?>
					<?php if( isset( $videoList->items[$i]->id->videoId ) ): ?>

						<div class="col-xs-12 col-sm-6 col-lg-4 text-center">
							<p><a href="#" data-toggle="modal" data-videoid="<?php echo $videoList->items[$i]->id->videoId; ?>" data-target="#videoModal"><img src="<?php echo $videoList->items[$i]->snippet->thumbnails->medium->url; ?>" class="video-thumb" /></a></p>
							<div class="video-title-wrapper" >
			               		<p><?php echo $videoList->items[$i]->snippet->title; ?></p>
			               </div>
						</div>
						
					<?php endif; ?>
				<?php endfor; ?>
				
			</div>
		</div>

		<?php get_template_part( 'template-parts/part', 'video_modal' ); ?> 
  
	</main>

<?php else : ?>

	<main class="site-main">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<h3>Search YouTube via the YouTube API</h3>
					<br>
					<form name="videosearch" id="videosearch" class="needs-validation" novalidate method="post">
						<div class="form-group">
							<label for="searchterm">Enter a search term</label>
							<input type="text" name="searchterm" id="searchterm" class="input form-control" value="" size="20" autocapitalize="off"  required />
							<div class="invalid-feedback">
						    	Please enter a search term
						    </div>
						</div>

						<input type="hidden" name="redirect_to" value="" />
						<p class="submit">
							<input type="submit" name="wp-submit-video-search" id="wp-submit" class="button button-primary button-large" value="Search YouTube" />
						</p>
					</form>
				</div>
			</div>
		</div>
	</main>

<?php endif; ?>

<?php

get_footer();

?>