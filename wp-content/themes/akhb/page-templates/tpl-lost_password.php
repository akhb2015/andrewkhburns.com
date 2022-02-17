
<?php

/** Custom Lost Password Form
 *
 *
 * Template Name: Lost Pasword Form
 *
 *
 * @author      Andy Burns <akhb1968@yahoo.com>
 * @copyright   2021 Andy Burns
 * @link        https://www.andrewkhburns.com/lost-password/
 * @version     $Id$
 *
 */

get_header();

$error = '';

if( isset( $_REQUEST['errors'] ) ){
	$error = $_REQUEST['errors'];
}

?>

<main class="site-main">

	<div class="container">
		<div class="row">
			<div class="col-md-12">

				<?php if( is_user_logged_in() ) : ?>

					<h3>You're currently logged in!</h3>

				<?php else : ?>

					<div id="my-password-form">

						<h2><?php _e( 'Forgot your password?' ); ?></h2>

						<?php if ( $error == 'invalid_email' ) : ?>
							<div class="alert bg-red text-white">
								<p class="mb-0"><i class="fas fa-exclamation-triangle"></i> <?php _e( 'We do not have a user registered with that email address. Maybe you signed up with a different one?', 'akhb' ); ?></p>
							</div>
						<?php endif; ?>

						<p class="message">Please enter your email address. You will receive an email message with instructions on how to reset your password.</p>

						<form name="lostpasswordform" id="lostpasswordform" class="needs-validation" novalidate action="https://www.andrewkhburns.com/wp-login.php?action=lostpassword" method="post">
							<div class="form-group">
								<input type="text" name="user_login" id="user_login" class="input form-control" value="" size="20" autocapitalize="off" placeholder="Email" pattern="[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$" required />
								<div class="invalid-feedback">
							    	Please enter a valid email
							    </div>
							</div>
							
							<input type="hidden" name="redirect_to" value="" />
							<p class="submit">
								<input type="submit" name="wp-submit" id="wp-submit" class="button button-primary button-large" value="Get New Password" />
							</p>
						</form>


				<?php endif; ?>
			</div>
		</div>
	</div>

</main>

<?php

get_footer();

?>