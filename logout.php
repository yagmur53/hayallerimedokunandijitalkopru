<?php
session_start();

$response = array( 'success' => false );

if ( isset( $_POST['logout'] ) && $_POST['logout'] === 'true' ) {

	session_unset();
	session_destroy();


	$response['success'] = true;
}


echo json_encode( $response );
?>
