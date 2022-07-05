<?php
/**
 * Establish a database connection
 *
 * @author      Andy Burns <akhb1968@gmail.com>
 * @copyright   2021 ON1, Inc.
 */
class Connection {
	
	protected static $_instance;
	protected $_connection;
	protected $_dns;
	protected $_username;
	protected $_password;

	protected function __construct() {

		if ( $_SERVER['HTTP_HOST'] == 'aburns-dev.com' ) {
			$this->_dns = 'mysql:dbname=myDB;host=127.0.0.1';
			$this->_username = 'root';
			$this->_password = '1234abc';
		} else {
			//$this->_dns = 'mysql:dbname=' . $_SERVER['eb_db_name'] . ';host=' . $_SERVER['eb_db_host'];
			//$this->_username = $_SERVER['eb_db_user'];
			//$this->_password = $_SERVER['eb_db_password'];
			$this->_dns = 'mysql:dbname=' . DB_NAME . ';host=' . DB_HOST;
			$this->_username = DB_USER;
			$this->_password = DB_PASSWORD;
		}

		try {
			$this->_connection = new PDO($this->_dns, $this->_username, $this->_password);
			$this->_connection->exec('SET CHARACTER SET utf8');
			$this->_connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_SILENT);
			// $this->_connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING); // FOR DEBUGGING ONLY!
		} catch( PDOException $e ) {
			die( 'Error #' . $e->getCode() . ' ' . $e->getMessage() . '<br>' );
		}
	}

	public function getConnection() {
		return $this->_connection;
	}

	public static function getInstance() {
		if ( null === self::$_instance ) {
			self::$_instance = new self();
		}

		return self::$_instance;
	}

	// Singleton pattern implementation makes "clone" unavailable
	protected function __clone() {}
}
