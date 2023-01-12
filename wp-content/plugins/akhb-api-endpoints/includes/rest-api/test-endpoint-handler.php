<?php

	function akhb_rest_api_handler($request) {
		//status = 1 failed
		//status = 2 success

		$response = ['status' => 1];
		$params = $request->get_json_params();

		//check expected data is set
		if(!isset( $params['email'], $params['firstname'], $params['lastname'] ) || 
			empty( $params['email'] ) || 
			empty( $params['firstname'] ) || 
			empty( $params['lastname'] )) {

				return $response;
		}

		//sanitize values
		$email = sanitize_email($params['email']);
		$firstname = sanitize_text_field($params['firstname']);
		$lastname = sanitize_text_field($params['lastname']);

		//insert into the database
		global $wpdb;

		$table = $wpdb->prefix . 'endpoint_test';
		$data = array('firstname' => $firstname, 'lastname' => $lastname, 'email' => $email);
		$format = array( '%s', '%s', '%s');
		$result = $wpdb->insert($table, $data, $format);

		if ( $result !== 1 ) {
			return $response;
		}

		$response['status'] = 2;

		return $response;
	}