<?php
// Veritabanı bağlantısını yapıyoruz
$mysqli = require __DIR__ . "/db/connection.php";
session_start();

// Kullanıcı oturumu kontrolü (Bu kısmı mevcut kodunla aynı tutuyoruz)
$isLoggedIn = isset( $_SESSION['user_id'] );
if ( ! $isLoggedIn ) {
	echo json_encode( [ 'success' => false, 'message' => 'Kullanıcı giriş yapmamış.' ] );
	exit();
}

// Silinecek hayalin id'sini alıyoruz
if ( isset( $_POST['dream_id'] ) ) {
	$dream_id = (int) $_POST['dream_id'];
	$user_id  = $_SESSION['user_id'];

	// Hayali silmek için SQL sorgusu
	$sql  = "DELETE FROM hayaller WHERE id = ? AND user_id = ?";
	$stmt = $mysqli->prepare( $sql );
	$stmt->bind_param( "ii", $dream_id, $user_id );

	if ( $stmt->execute() ) {
		echo json_encode( [ 'success' => true, 'message' => 'Hayal başarıyla silindi.' ] );
	} else {
		echo json_encode( [ 'success' => false, 'message' => 'Hayal silinirken bir hata oluştu.' ] );
	}
	$stmt->close();
} else {
	echo json_encode( [ 'success' => false, 'message' => 'Geçersiz istek.' ] );
}

$mysqli->close();
?>
