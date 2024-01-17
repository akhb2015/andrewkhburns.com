<?php

	function akhb_rest_api_init() {
		//make endpoint public
		add_filter( 'rest_authentication_errors', function( $result ) {
		    if ( ! is_user_logged_in() ) {
		        return true;
		    }
		    return $result;
		});
		
		//custom endpoint
		//example.com/wp-json/akhb/v1/endpoint
		register_rest_route('akhb/v2', '/endpoint', [
			//'methods' => 'POST',
			'methods' => WP_REST_Server::CREATABLE, //equivalent to POST
			'callback' => 'akhb_rest_api_handler',
			'permission_callback' => '__return_true'
		]);
	}