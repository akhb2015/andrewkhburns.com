
<?php

/** Account Creation Form
 *
 *
 * Template Name: Account Creation Form
 *
 *
 * @author      Andy Burns <akhb1968@yahoo.com>
 * @copyright   2021 Andy Burns
 * @link        https://www.andrewkhburns.com/create-account/
 * @version     $Id$
 *
 */

// Get 'initial_login' if passed in the URL
if ( isset ( $_GET['initial_login'] ) ) {
	$initial_login = filter_input( INPUT_GET, 'initial_login', FILTER_SANITIZE_STRING );
} else {
	$initial_login = '';
}

$email = '';


// If the form has been submitted...
if ( $_SERVER['REQUEST_METHOD'] == 'POST' ) {

	// Get and sanitize the submitted form fields
	//$first_name = sanitize_text_field( $_POST['first_name'] );
	//$last_name = sanitize_text_field( $_POST['last_name'] );
	//$user_login = sanitize_email( $_POST['user_login'] );
	$email = sanitize_email( $_POST['user_email'] );
	//$email_confirmation = sanitize_email( $_POST['email_confirmation'] );
	$password = $_POST['password'];
	$password_confirmation = $_POST['password_confirmation'];
	//$country = sanitize_text_field( $_POST['country'] );
	//$usage = sanitize_text_field( $_POST['usage'] );
	//$terms = sanitize_text_field( $_POST['terms'] );


	// Array for the submitted user info
	$user_data = array();

	// Array for errors
	$errors = array();

	// Make sure the email address is valid and unused
	if ( !is_email( $email ) ) {
		$errors[] = __( 'Please enter a valid email address.', 'akhb' );
	}

	if ( username_exists( $email ) || email_exists( $email ) ) {
		$errors[] = __( 'An account already exists for this email address. Forgot your password? <a href="' . wp_lostpassword_url() . '" class="text-white"><u>Reset it</u>.</a>', 'akhb' );
	}

	// Make sure the password is 8 characters
	if ( 0 === preg_match( '/.{8,}/', $_POST['password'] ) ) {
		$errors[] = __( 'Please enter a password that is at least 8 characters long.', 'akhb' );
	}
	

	// Make sure the passwords match
	if ( strcmp ( $password, $password_confirmation ) !== 0 ) {
		$errors[] = __( 'Passwords do not match.', 'akhb' );
	}
	

	// Make sure the terms box is checked
	/*
	if ( $terms != 'agree' ) {
		$errors[] = __( 'You must agree to the ON1 terms.', 'on1' );
	}
	*/

		// Show any errors that were encountered
	if ( count( $errors ) > 0 ) {
		echo '<div class="alert bg-red text-white">' . "\n";
		foreach ( $errors as $error ) {
			echo '<p class="mb-0"><i class="fas fa-exclamation-triangle"></i> ' . $error . '</p>' . "\n";
		}
		echo '</div>' . "\n";
	}

	// If there are no errors, create the user's account
	if ( 0 === count( $errors ) ) {
		$user_data = array(
			'user_login'      => $email,
			'user_email'      => $email,
			'user_pass'       => $password,
			//'first_name'      => $first_name,
			//'last_name'       => $last_name,
			'user_registered' => date( 'Y-m-d H:i:s' ),
			'role'            => 'subscriber'
		);

		$user_id = wp_insert_user( $user_data );

		//redirect user to home page after account creation
		if ( !empty( $user_id ) ) {
			wp_set_current_user( $user_id );
		    wp_set_auth_cookie( $user_id );
		    wp_safe_redirect( home_url() );
		    exit();
		}
	}
}

get_header();

?>

<main class="site-main">

	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div id="my-reg-form">
					<h2>Create an Account</h2>

					<form name="registerform" id="registerform"  class="needs-validation" novalidate method="post">
					<div class="form-group">
						<input type="email" name="user_email" id="user_email" class="input form-control" value="<?php echo $email ?>" placeholder="Email" pattern="[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$" autocapitalize="off" required />
						<div class="invalid-feedback">
					    	Please enter a valid email
					    </div>
					</div>
					<!--<p id="reg_passmail">
						Registration confirmation will be emailed to you.
					</p>-->
					<div class="form-group">
						<!-- <label for="user_pass">Password</label> -->
						<div class="wp-pwd">
							<input type="password" name="password" id="password" class="input password-input form-control" value="" size="20" autocapitalize="off" placeholder="Password" required />
							<div class="invalid-feedback">
						    	Please enter your password
						    </div>
						</div>
					</div>
					<div class="form-group">
						<!-- <label for="user_pass">Password</label> -->
						<div class="wp-pwd">
							<input type="password" name="password_confirmation" id="password_confirmation" class="input password-input form-control" value="" size="20" autocapitalize="off" placeholder="Re-Enter Password" required />
							<div class="invalid-feedback">
						    	Please retype your password
						    </div>
						</div>
					</div>
					<br class="clear" />
					<input type="hidden" name="redirect_to" value="" />
					<p class="submit">
						<input type="submit" name="wp-submit" id="wp-submit" class="button button-primary button-large" value="Register" />
					</p>
				</form>

			</div>
		</div>
	</div>

</main>

<?php

get_footer();

?>