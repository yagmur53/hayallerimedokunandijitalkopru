<?php

$mysqli = require __DIR__ . "/db/connection.php";

$response = [
	'success' => false,
	'message' => ''
];

// Giriş Yap işlemi
if ( isset( $_POST['login'] ) ) {
	$email    = $_POST['email'];
	$password = $_POST['password'];

	$sql  = "SELECT * FROM user WHERE email = ?";
	$stmt = $mysqli->prepare( $sql );
	$stmt->bind_param( "s", $email );
	$stmt->execute();
	$result = $stmt->get_result();
	$user   = $result->fetch_assoc();

	if ( $user ) {
		if ( password_verify( $password, $user['password_hash'] ) ) {

			session_start();
			session_regenerate_id( true );
			$_SESSION['user_id']    = $user['id'];
			$_SESSION['user_name']  = $user['name'];
			$_SESSION['is_gonullu'] = $user['is_gonullu'];

			$response['success'] = true;
			$response['message'] = 'Giriş başarılı!';
		} else {
			$response['message'] = 'Yanlış parola!';
		}
	} else {
		$response['message'] = 'Kullanıcı bulunamadı!';
	}
}

// Kayıt Ol İşlemleri
if ( isset( $_POST['signup'] ) ) {
	$adsoyad          = $_POST['adsoyad'];
	$email            = $_POST['email2'];
	$password         = $_POST['password2'];
	$confirm_password = $_POST['confirm_password'];
	$is_gonullu       = isset( $_POST['is_gonullu'] ) ? $_POST['is_gonullu'] : 0;

	$sql  = "SELECT * FROM user WHERE email = ?";
	$stmt = $mysqli->prepare( $sql );
	$stmt->bind_param( "s", $email );
	$stmt->execute();
	$result = $stmt->get_result();

	if ( $result->num_rows > 0 ) {
		$response['message'] = 'Bu e-posta adresi zaten kullanılıyor!';
	} elseif ( empty( $adsoyad ) ) {
		$response['message'] = 'Lütfen adınızı ve soyadınızı giriniz.';
	} elseif ( ! filter_var( $email, FILTER_VALIDATE_EMAIL ) ) {
		$response['message'] = 'Lütfen geçerli bir e-posta adresi giriniz.';
	} elseif ( strlen( $password ) < 8 ) {
		$response['message'] = 'Şifrenizin en az 8 karakter olmalıdır!';
	} elseif ( ! preg_match( "/[a-z]/i", $password ) ) {
		$response['message'] = 'Şifre en az bir harf içermelidir.';
	} elseif ( ! preg_match( "/[0-9]/i", $password ) ) {
		$response['message'] = 'Şifre en az bir sayı içermelidir.';
	} elseif ( $password !== $confirm_password ) {
		$response['message'] = 'Şifrelerinizin aynı olduğundan emin olunuz!';
	} else {
		$password_hash = password_hash( $password, PASSWORD_DEFAULT );

		$sql  = "INSERT INTO user (name, email, password_hash, is_gonullu) VALUES (?, ?, ? , ?)";
		$stmt = $mysqli->prepare( $sql );
		$stmt->bind_param( "sssi", $adsoyad, $email, $password_hash, $is_gonullu );

		if ( $stmt->execute() ) {
			$response['success'] = true;
			$response['message'] = 'Başarıyla kaydoldunuz!';
		} else {
			if ( $mysqli->errno === 1062 ) {
				$response['message'] = 'Bu e-posta adresi zaten kullanılıyor!';
			} else {
				$response['message'] = 'Kayıt sırasında bir hata oluştu!';
			}
		}
	}
}

if ( isset( $_POST['hayal_kaydet'] ) ) {
	$user_id   = $_POST['user_id'];
	$adsoyad   = $_POST['adsoyad'];
	$sehir     = $_POST['sehir'];
	$ilce      = $_POST['ilce'];
	$adres     = $_POST['adres'];
	$yetimhane = $_POST['yetimhane'];
	$hayal     = $_POST['hayal'];

	$sql = "INSERT INTO hayaller (user_id, adsoyad, sehir, ilce, adres, yetimhane, hayal) 
            VALUES (?, ?, ?, ?, ?, ?, ?)";

	if ( $stmt = $mysqli->prepare( $sql ) ) {
		$stmt->bind_param( "issssss", $user_id, $adsoyad, $sehir, $ilce, $adres, $yetimhane, $hayal );

		if ( $stmt->execute() ) {
			$response['success'] = true;
			$response['message'] = "Hayal başarıyla kaydedildi!";
		} else {
			$response['message'] = "Veritabanına kayıt yapılırken bir hata oluştu!";
		}
	} else {
		$response['message'] = "Sorgu hatası!";
	}
}

echo json_encode( $response );

?>