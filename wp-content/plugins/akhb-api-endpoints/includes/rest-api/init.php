<?php

	function akhb_rest_api_init() {
		//custom endpoint
		//example.com/wp-json/akhb/v1/signup
		register_rest_route('akhb/v1', '/endpoint', [
			//'methods' => 'POST',
			'methods' => WP_REST_Server::CREATABLE, //equivalent to POST
			'callback' => 'akhb_rest_api_handler',
			'permission_callback' => '__return_true'
		]);
	}