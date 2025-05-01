<?php
session_start();

$user_id    = $_SESSION['user_id'];
$username   = $_SESSION['user_name'];
$isLoggedIn = isset( $_SESSION['user_id'] );
$is_gonullu = $_SESSION['is_gonullu'];

if ( ! $isLoggedIn ) {
	header( "Location: ./index.php" );
	exit();
}

if ( $is_gonullu == 1 ) {
	header( "Location: ./index.php" );
	exit();
}
?>
<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="/assets/img/favicon.ico">

    <link rel="icon" href="./assets/img/favicon.ico" type="image/x-icon">
    <link rel="apple-touch-icon" href="./assets/img/favicon.ico">
    <meta name="msapplication-TileImage" content="./assets/img/favicon.ico">

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>


    <!-- Tüm Fontlar -->
    <link href="https://fonts.googleapis.com/css2?family=Original+Surfer&family=DynaPuff:wght@400..700&family=Akaya+Kanadaka&family=Delius&family=Sour+Gummy:ital,wght@0,100..900;1,100..900&family=Playpen+Sans:wght@100..800&family=Patrick+Hand&display=swap"
          rel="stylesheet">

    <link href="./assets/css/istek-kutusu.css" rel="stylesheet">

    <!-- Toastr CSS (Hata/başarı bildirimleri için) -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">

    <!-- jQuery (Toastr için gerekli) -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- Toastr JS (Bildirimler için) -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>

    <script src="https://cdn.jsdelivr.net/particles.js/2.0.0/particles.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/stats.js/17/Stats.min.js"></script>

    <title>Hayalleri Gerçekleştiren Dijital Köprü</title>
</head>
<body>
<div id="bg"></div>
<div class="istek-kutusu">
    <div class="istek-kutusu__title">
        <h1>Bilgilerinizi Giriniz</h1>
        <span></span>
    </div>
    <div class="container istek-kutusu__container">
        <form id="hayalGonderForm" method="POST" onsubmit="return handleHayalSubmit(event)"
              data-user-id="<?php echo $user_id ?>">
            <div class="tab-1">
                <div class="group">
                    <input name="adsoyad" type="text" placeholder="Adınız Soyadınız..." autocomplete="off" required/>
                    <span class="highlight"></span><span class="bar"></span>
                </div>

                <div class="group">
                    <input name="sehir" type="text" placeholder="Yaşadığınız İl..." autocomplete="off" required/>
                    <span class="highlight"></span><span class="bar"></span>
                </div>

                <div class="group">
                    <input name="ilce" type="text" placeholder="Yaşadığınız İlçe..." autocomplete="off" required/>
                    <span class="highlight"></span><span class="bar"></span>
                </div>

                <div class="group">
                    <textarea name="adres" type="text" placeholder="Adresiniz..." autocomplete="off"
                              required></textarea>
                    <span class="highlight"></span><span class="bar"></span>
                </div>

                <div class="group">
                    <input name="yetimhane" type="text" placeholder="Yetimhanenizin Adı..." autocomplete="off"
                           required/><span
                            class="highlight"></span><span class="bar"></span>
                </div>
            </div>
            <div class="tab-2 disabled">
                <span id="hayal" class="sheet istek-area" role="textbox" spellcheck="false" contenteditable="true">
                    <br/>Merhaba 👋🏻<br/><br/>
                    Artık hayalini yazmaya başlayabilirsin... <br>
                    Hayalini yazdıktan sonra kaydetmeyi unutma 😉<br/>
                    Şimdi dile benden ne istersen.. 🤩
                </span>

                <button class="istek-kutusu-submit-btn" type="submit">KAYDET</button>
            </div>
        </form>
        <a class="disabled-link" id="nextButtonIstekKutusu" href="#">Hayalini Yazmaya Başla</a>
        <a id="backButtonIstekKutusu" href="./kullanici-paneli.php">Geri Dön</a>
    </div>
</div>

<script src="assets/js/istek-kutusu.js"></script>
<script src="assets/js/verify.js"></script>
</body>
</html>