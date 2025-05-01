<?php
$servername = "localhost";
$username   = "root";
$password   = "";
$dbname     = "login_db";

$conn = new mysqli( $servername, $username, $password, $dbname );

if ( $conn->connect_errno ) {
	die( "Bağlantı hatası: " . $conn->connect_error );
}

return $conn;

?>
