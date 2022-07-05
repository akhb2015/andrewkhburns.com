
<?php

/** Custom Reset Password Form
 *
 *
 * Template Name: Reset Pasword Form
 *
 *
 * @author      Andy Burns <akhb1968@yahoo.com>
 * @copyright   2021 Andy Burns
 * @link        https://www.andrewkhburns.com/reset-password/
 * @version     $Id$
 *
 */

get_header();

$error = '';

if( isset( $_REQUEST['error'] ) ){
	$error = $_REQUEST['error'];
}
if( isset( $_REQUEST['key'] ) ){
	$rp_key = $_REQUEST['key'];
}
if( isset( $_REQUEST['login'] ) ){
	$rp_login = $_REQUEST['login'];
}

?>

<main class="site-main">

	<div class="container">
		<div class="row">
			<div class="col-md-12">

				<?php if( is_user_logged_in() ) : ?>

					<h3>You're currently logged in!</h3>

				<?php else : ?>

					<div id="reset-pwd-form">

						<?php if ( !isset( $rp_key ) || empty( $rp_key ) || $rp_key == '' ) : ?>
						
							<h2><?php _e( 'Reset your password' ); ?></h2>

							<div class="alert mb-0 bg-red text-white">
								<p class="mb-0"><i class="fas fa-exclamation-triangle"></i> <?php _e( 'This page cannot be accessed directly. Please check your email for the link. If you need to re-submit your lost password request, you can do so <a href="' . wp_lostpassword_url() . '" class="text-white"><u>here</u></a>.', 'akhb' ); ?></p>
							</div>
						</div>
					</div>
					</div>
					</div>
				</main>
				<?php get_footer(); exit; ?>
						
						<?php else : ?>
							
							<h2><?php _e( 'Reset your password' ); ?></h2>

							<?php if ( $error == 'password_wrong_size' ) : ?>
								<div class="alert mb-0 bg-red text-white">
									<p class="mb-0"><i class="fas fa-exclamation-triangle"></i> <?php _e( 'The password must be at least 8 characters long. Please try again.', 'akhb' ); ?></p>
								</div>
							<?php endif; ?>

							<?php if ( $error == 'password_reset_mismatch' ) : ?>
								<div class="alert mb-0 bg-red text-white">
									<p class="mb-0"><i class="fas fa-exclamation-triangle"></i> <?php _e( 'Passwords do not match. Please try again.', 'akhb' ); ?></p>
								</div>
							<?php endif; ?>
						<?php endif; ?>

						<form id="resetpassform" name="resetpassform" action="<?php echo wp_login_url(); ?>?action=resetpass" method="post" autocomplete="off" class="needs-validation" novalidate>
							<input type="hidden" name="rp_key" id="rp_key" value="<?php echo $rp_key; ?>">
							<input type="hidden" name="rp_login" id="rp_login" value="<?php echo $rp_login; ?>">

							<div class="form-group">
								<label for="password"><?php _e( 'Password', 'akhb' ); ?><span class="text-red">*</span></label>
								<input type="password" name="password" id="password" class="input form-control" autocapitalize="off" required>
								<span class="form-text small"><?php _e( 'Minimum length of 8 characters.', 'akhb' ); ?></span>
								<div class="invalid-feedback text-red">
									<p class="mb-0"><?php _e( 'Please enter a password that is at least 8 characters.', 'akhb' ); ?></p>
								</div>
							</div>

							<div class="form-group">
								<label for="password_confirmation"><?php _e( 'Confirm password', 'akhb' ); ?><span class="text-red">*</span></label>
								<input type="password" name="password_confirmation" id="password-confirmation" class="input form-control" autocapitalize="off" required>
								<div class="invalid-feedback text-red">
									<p class="mb-0"><?php _e( 'Passwords much match. Please re-enter your password.', 'akhb' ); ?></p>
								</div>
							</div>

							<input type="submit" name="submit" class="button button-primary button-large" id="pwd-reset-submit" value="<?php _e( 'Reset password', 'akhb' ); ?>">
						</form>

				<?php endif; ?>
			</div>
		</div>

</main>

<?php

get_footer();

?>