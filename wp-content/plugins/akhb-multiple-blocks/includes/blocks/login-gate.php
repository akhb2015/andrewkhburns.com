<?php

//Callback render function
function akhb_login_gate_cb( $atts ) {

	$custom_message = $atts['message'];

	add_filter( 'the_content', function ($content) use ($custom_message) {

	    if( !is_user_logged_in() ){
				$content = '<div class="login-message">' . $custom_message . '</div>';
				return $content;
			}
			return $content;
	}, 10, 1);
}