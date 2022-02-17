
<?php

/** Custom Login
 *
 *
 * Template Name: Login Page
 *
 *
 * @author      Andy Burns <akhb1968@yahoo.com>
 * @copyright   2021 Andy Burns
 * @link        https://www.andrewkhburns.com/login/
 * @version     $Id$
 *
 */

get_header();

$error = '';
$check_email = false;
$password_changed = false;

if( isset( $_REQUEST['error'] ) ){
	$error = $_REQUEST['error'];
}
if( isset( $_REQUEST['checkemail'] ) && $_REQUEST['checkemail'] == 'confirm' ) {
	$check_email = true;
}
if( isset( $_REQUEST['password'] ) && $_REQUEST['checkemail'] == 'changed' && strstr( $referer, 'reset-password' )) {
	$password_changed = true;
}


?>

<main class="site-main">

	<div class="container">
		<div class="row">
			<div class="col-md-12">

				<?php if( is_user_logged_in() ) : ?>

					<h3>You're currently logged in!</h3>

				<?php else : ?>

					<div id="my-login-form">
						<h2>Sign In</h2>

						<?php if ( $check_email ) : ?>
							<div class="alert bg-purple text-white">
								<p class="mb-0"><i class="fas fa-info-circle"></i> <?php _e( 'Please check your email for a password reset link.', 'akhb' ); ?></p>
							</div>
						<?php endif; ?>

						<?php if ( $password_changed  ) : ?>
							<div class="alert bg-purple text-white">
								<p class="mb-0"><i class="fas fa-thumbs-up"></i> <?php _e( 'Password successfully changed. Sign in with it below.', 'akhb' ); ?>
							</div>
						<?php endif; ?>

						<?php if ( $error == 'invalid_email' ) : ?>
							<div class="alert bg-red text-white">
								<p class="mb-0"><i class="fas fa-exclamation-triangle"></i> <?php _e( 'We do not have a user registered with that email address. Maybe you signed up with a different one?', 'akhb' ); ?></p>
							</div>
						<?php endif; ?>
						<?php if ( $error == 'incorrect_password' ) : ?>
							<div class="alert bg-red text-white">
								<?php $err = __( 'The password you entered was incorrect. Please try again, or <a href="%s" class="text-white"><u>reset your password</u></a>.', 'akhb' ); ?>
								<p class="mb-0"><i class="fas fa-exclamation-triangle"></i> <?php printf( $err, wp_lostpassword_url() ); ?></p>
							</div>
						<?php endif; ?>

						<form name="loginform" id="loginform" class="needs-validation" novalidate action="https://www.andrewkhburns.com/wp-login.php" method="post">
							<div class="form-group">
								<!-- <label for="user_login">Username or Email Address</label> -->
								<input type="text" name="log" id="user_login" class="input form-control" placeholder="Email"  autocapitalize="off" required />
								<div class="invalid-feedback">
							    	Please enter a valid email
							    </div>
							</div>

							<div class="form-group">
								<!-- <label for="user_pass">Password</label> -->
								<div class="wp-pwd">
									<input type="password" name="pwd" id="user_pass" class="input password-input form-control" value="" size="20" autocapitalize="off" placeholder="Password" required />
									<div class="invalid-feedback">
								    	Please enter your password
								    </div>
									<!--
									<button type="button" class="button button-secondary wp-hide-pw hide-if-no-js" data-toggle="0" aria-label="Show password">
										<span class="dashicons dashicons-visibility" aria-hidden="true"></span>
									</button>
									-->
								</div>
							</div>
							<p class="forgetmenot"><input name="rememberme" type="checkbox" id="rememberme" value="forever" checked /> <label for="rememberme">Remember Me</label></p>
							<p class="submit">
								<input type="submit" name="wp-submit" id="wp-submit" class="button button-primary button-large" value="Log In" />
								<input type="hidden" name="redirect_to" value="http://www.andrewkhburns.com/" />
								<input type="hidden" name="testcookie" value="1" />
							</p>
						</form>

						<p id="nav">
							<strong><a href="http://www.andrewkhburns.com/wp-login.php?action=lostpassword">Forget your password?</a></strong>
						</p>

					</div>
					<div class="create-account-link mt-3">
						<?php echo '<a href="' . wp_registration_url() . '">Create an Account</a>'; ?>
					</div>

				<?php endif; ?>
			</div>
		</div>
	</div>

</main>

<?php

get_footer();

?>