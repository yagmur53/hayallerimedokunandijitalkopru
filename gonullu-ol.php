<!DOCTYPE html>
<html lang="tr">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<!--Google Fonts-->
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<!--Font-->
	<link href="https://fonts.googleapis.com/css2?family=Sour+Gummy:ital,wght@0,100..900;1,100..900&display=swap"
	      rel="stylesheet">
	<!--css-->
	<link rel="stylesheet" href="assets/css/gonullu-ol.css">

	<!-- Toastr CSS (Hata/başarı bildirimleri için) -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">

	<!-- jQuery (Toastr için gerekli) -->
	<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

	<!-- Toastr JS (Bildirimler için) -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>

	<title>Gönüllü Ol</title>
</head>

<body>
<img width="32" height="32"
     src="https://img.icons8.com/external-flaticons-flat-flat-icons/500/external-sun-astrology-flaticons-flat-flat-icons.png"
     alt="external-sun-astrology-flaticons-flat-flat-icons" class="sign2"/>
<img width="32" height="32" src="https://img.icons8.com/fluency/500/leaf.png" alt="leaf" class="sign1"/>
<div class="spectacledcoder-container">
    <div class="exit-ico">
        <a href="./index.php">
            <img src="./assets/img/exit.svg" alt="Ana sayfaya dön">
        </a>
    </div>
	<div class="square"><h2>Hayalleri Gerçekleştirmek İçin Adım</h2></div>
	<form class="f-col m-auto form-container" method="POST" onsubmit="return handleSignupSubmit2(event)" novalidate>

		<label class="mb-10" for="gonulluAdSoyad">Adınız Soyadınız</label>
		<input class="spectacledcoder-input" type="text" id="gonulluAdSoyad" name="adsoyad" required>

		<label class="mb-10 mt-20" for="gonulluEmail">Email</label>
		<input class="spectacledcoder-input" id="gonulluEmail" type="email" name="email" required>

		<label class="mb-10 mt-20" for="gonulluSifre">Şifrenizi Giriniz</label>
		<div class="spectacledcoder-password f-row">
			<input class="m-auto spectacledcoder-input" type="password" name="password" id="gonulluSifre" required>
			<img class="m-auto eye-icon" width="18" height="18"
			     src="https://img.icons8.com/fluency-systems-filled/48/FD7E14/visible.png" alt="visible"
			     onclick="toggle1()"/>
		</div>

		<label class="mb-10 mt-20" for="gonulluSifreTekrar">Şifrenizi Tekrardan Giriniz</label>
		<div class="spectacledcoder-password f-row">
			<input class="m-auto spectacledcoder-input" type="password" name="confirm_password"
			       id="gonulluSifreTekrar" required>
			<img class="m-auto eye-icon" width="18" height="18"
			     src="https://img.icons8.com/fluency-systems-filled/48/FD7E14/visible.png" alt="visible"
			     onclick="toggle2()"/>
		</div>

		<button class="mt-40 m-auto spectacledcoder-hover-fill-button" type="submit" name="gonulluKayit" id="gonulluKayit">
			<div class="color-fill"></div>
			<p>Kaydol</p></button>
	</form>
</div>
<p class="disclaimer">Designed & Created by <b>Hayalleri Gerçekleştiren Dijital Köprü</b> | Bir Adım At, Bir Hayal
	Gerçek Olsun</p>

<script src="assets/js/gonullu-ol.js"></script>
<script src="assets/js/verify.js"></script>

</body>
</html>