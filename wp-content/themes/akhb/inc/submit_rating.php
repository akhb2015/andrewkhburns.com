<?php
/**
 * Insert star rating to database


 * Template Name: Save Movie Rating
 *
 * @author      Andy Burns <akhb1968@gmail.com>
 * @copyright   2021 ON1, Inc.
 */

$rating = sanitize_text_field( $_POST['rating'] );
$movieid = sanitize_text_field( $_POST['movieid'] );

/*
$to = 'akhb1968@gmail.com';
$subject = 'Rating';
$body = '<pre>The rating was ' . $rating . ' for ID ' . $movieid . '</pre>';
$headers = array('Content-Type: text/html; charset=UTF-8');

wp_mail( $to, $subject, $body, $headers );
*/

$pdo = Connection::getInstance()->getConnection();

$query=$pdo->prepare( "UPDATE Zwv_user_movies SET rating = :rating WHERE id = :movieid" );
$query->execute( array( ':rating' => $rating, ':movieid' => $movieid ) );

$query->closeCursor();
$query = NULL;
unset($query);

$pdo = NULL;
