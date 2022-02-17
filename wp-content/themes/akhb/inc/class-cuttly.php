<?php
/**
 * Cuttly API shortener class.
 *
 * @package UtmDotCodes
 */

namespace UtmDotCodes;

/**
 * Class Cuttly.
 */
class Cuttly implements \UtmDotCodes\Shorten {

	const API_URL = 'https://cutt.ly/api/api.php';

	/**
	 * API credentials for Cuttly API.
	 *
	 * @var string|null The API key for the shortener.
	 */
	private $api_key;

	/**
	 * Response from API.
	 *
	 * @var object|null The response object from the shortener.
	 */
	private $response;

	/**
	 * Error message.
	 *
	 * @var object|null Error object with code and message properties.
	 */
	private $error_code;

	/**
	 * Cuttly constructor.
	 *
	 * @param string $api_key Credentials for API.
	 */
	public function __construct( $api_key ) {
		$this->api_key = $api_key;
	}

	/**
	 * See interface for docblock.
	 *
	 * @inheritDoc
	 *
	 * @param array  $data See interface.
	 * @param string $query_string See interface.
	 *
	 * @return void
	 */

	public function shorten( $data, $query_string ) {

		if ( isset( $data['meta_input'] ) ) {
			$data = $data['meta_input'];
		}

		$url_to_shorten = urlencode( $data['utmdclink_url'] . $query_string );
		$cuttly_id = '';

		if( isset( $data['utmdclink_shorturl'] ) ){
			//grab the id portion of the short URL
			$url_pieces = explode( '/', $data['utmdclink_shorturl'] );
			$cuttly_id = end( $url_pieces );
		}

		//build the request
		$cuttly_api_endpoint = self::API_URL . '?key=' . $this->api_key . '&short=' . $url_to_shorten . '&name=' . $cuttly_id;

		if ( '' !== $this->api_key ) {

			//ping the Cuttly API
			$response = wp_remote_get( $cuttly_api_endpoint );
			$response_body = json_decode( $response['body'], true );

			// 7 = Cuttly's code for success
			if( $response_body['url']['status'] !== 7 ) {
				//not really accurate but at least gives the user feedback that something went wrong
				$this->error_code = 1000;

			} elseif ( $response['response']['code'] == 200 ) {

				$response_url = '';

				if ( isset( $response_body['url']['shortLink'] ) ) {
					$response_url = $response_body['url']['shortLink'];
				}

				if ( filter_var( $response_url, FILTER_VALIDATE_URL ) ) {
					$this->response = esc_url( wp_unslash( $response_body['url']['shortLink'] ) );
				}
			}
		}
	}

	/**
	 * Get response from Cuttly API for the request.
	 *
	 * @inheritDoc
	 */
	public function get_response() {
		return $this->response;
	}

	/**
	 * Get error code/message returned by Cuttly API for the request.
	 *
	 * @inheritDoc
	 */
	public function get_error() {
		return $this->error_code;
	}
}
