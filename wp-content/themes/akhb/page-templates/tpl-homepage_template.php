
<?php

/** Testing
 *
 *
 * Template Name: Home Page Template
 *
 *
 * @author      Andy Burns <akhb1968@yahoo.com>
 * @copyright   2021 Andy Burns
 * @link        https://www.andrewkhburns.com/
 * @version     $Id$
 *
 */

get_header();

/*
$to = 'akhb1968@gmail.com';
$subject = 'From home page';
$body = '<pre>Home cha cha cha</pre>';
$headers = array('Content-Type: text/html; charset=UTF-8');

wp_mail( $to, $subject, $body, $headers );

*/	

?>

<div class="masthead">
	<div class="overlay"></div>
	<h1 class="animate__animated animate__fadeInDownBig animate__delay-1s masthead-text first">Andy Burns</h1>
	<h1 class="animate__animated animate__fadeInDownBig animate__delay-2s masthead-text">Web Developer</h1>
	<h1 class="animate__animated animate__fadeInDownBig animate__delay-3s masthead-text">Portland, Oregon</h1>
</div>


<main class="site-main">

	<div class="container-fluid">
		<div class="row">
			<div class="col-md-12">
				<p>Powered by <strong>AWS</strong>: EC2, RDS, SES, Route 53 and S3. Made with <a href="https://www.wordpress.org" target="_blank">Wordpress</a>, Bootstrap, jQuery and <i class="fas fa-heart"></i></p>
				<p>CI/CD workflow via GitHub Actions</p>
				<p>Custom theme: <strong>akhb</strong></p>
				<p><strong>No WP Plugins!</strong></p>

				<?php

					$wpnonce = wp_create_nonce( 'log-out' );

					if( is_user_logged_in() ){
						echo '<p>Thanks for logging in!</p>';
						echo '<p>Feel free to <a href="https://www.andrewkhburns.com/wp-admin/profile.php">Edit your Profile</a> or you can <a href="https://www.andrewkhburns.com/wp-login.php?action=logout&_wpnonce=' . $wpnonce . '">Log Out</a>.</p>';
					}else{
						echo '<p>You\'re welcome to <a href="/login/">sign in</a>.</p>';
						echo '<p>No account? <a href="https://www.andrewkhburns.com/create-account/">Create one here</a>.</p>';
					}

				?>

			</div>
		</div>
	</div>

	<div class="cookie-disclaimer">
	  <div class="cookie-close"><i class="fa fa-times"></i></div>
		  <div class="container">
		    <p>This website uses cookies for an enhanced user experience. &nbsp;&nbsp;
		    <button type="button" class="btn btn-success accept-cookie">I'm cool with that</button></p>
		  </div>
		</div>
	</div>

</main>

<?php

get_footer();