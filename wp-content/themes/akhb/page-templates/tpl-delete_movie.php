<?php

/** Delete Movie from to-see list, move to watched list
 *
 * Template Name: Delete Movie
 *
 * @author      Andy Burns <akhb1968@yahoo.com>
 * @copyright   2021 Andy Burns
 * @version     $Id$
 *
 */

if( isset( $_GET['mymovieid'] ) ) $movie_id = $_GET['mymovieid'];

/*
$pdo = Connection::getInstance()->getConnection();

$query=$pdo->prepare( 'UPDATE wp_user_movies SET watched = 1 WHERE id = :id' );
$query->execute( array( ':id' => $movie_id ) );

$query->closeCursor();
$query = NULL;
unset($query);

$pdo = NULL;

*/

global $wpdb;

$result = $wpdb->update( $wpdb->prefix .'user_movies', array( 'watched' => 1 ), array( 'id' => $movie_id ) );