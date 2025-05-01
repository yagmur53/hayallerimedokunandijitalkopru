<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="/assets/img/favicon.ico">

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <!-- Tüm Fontlar -->
    <link href="https://fonts.googleapis.com/css2?family=Original+Surfer&family=DynaPuff:wght@400..700&family=Akaya+Kanadaka&family=Delius&family=Sour+Gummy:ital,wght@0,100..900;1,100..900&family=Playpen+Sans:wght@100..800&family=Patrick+Hand&display=swap"
          rel="stylesheet">

    <!-- Sandbox -->
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/plugins.css">

    <!-- Giriş sayfası stili -->
    <link rel="stylesheet" href="assets/css/login.css">

    <!-- Global -->
    <link rel="stylesheet" href="assets/css/global.css">

    <!-- Toastr CSS (Hata/başarı bildirimleri için) -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">

    <!-- jQuery (Toastr için gerekli) -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- Toastr JS (Bildirimler için) -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>

    <!-- GSAP (Animasyonlar için) -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.5/gsap.min.js"></script>

    <title>Hayalleri Gerçekleştiren Dijital Köprü</title>
</head>
<body>

<canvas id="space"></canvas>
<div class="login_form">
    <div class="form-container">
        <div class="exit-ico">
            <a href="./index.php">
                <img src="./assets/img/exit-white.svg" alt="Ana sayfaya dön">
            </a>
        </div>
        <div class="slider-container">
            <div class="slider"></div>
        </div>
        <div class="form-switcher">
            <button id="loginBtn" class="active">Giriş Yap</button>
            <button id="signupBtn">Kaydol</button>
        </div>

        <div class="form-wrapper">

            <form id="loginForm" class="active" method="POST" onsubmit="return handleLoginSubmit(event)">
                <div class="input-group">
                    <input type="email" id="loginEmail" name="email" required>
                    <label for="loginEmail">E-Mail</label>
                </div>
                <div class="input-group">
                    <input type="password" id="loginPassword" name="password" required>
                    <label for="loginPassword">Parola</label>
                </div>
                <button type="submit" name="login">Giriş Yap</button>
            </form>

            <form id="signupForm" method="POST" onsubmit="return handleSignupSubmit(event)" novalidate>
                <div class="input-group">
                    <input type="text" id="signupAdSoyad" name="adsoyad" required>
                    <label for="signupAdSoyad">Adınız Soyadınız</label>
                </div>
                <div class="input-group">
                    <input type="email" id="signupEmail" name="email2" required>
                    <label for="signupEmail">E-Mail</label>
                </div>
                <div class="input-group">
                    <input type="password" id="signupPassword" name="password2" required>
                    <label for="signupPassword">Parola</label>
                </div>
                <div class="input-group">
                    <input type="password" id="signupConfirmPassword" name="confirm_password" required>
                    <label for="signupConfirmPassword">Parolayı Tekrar Giriniz</label>
                </div>
                <button type="submit" name="signup">Kaydol</button>
            </form>
        </div>
    </div>
</div>

<footer class="text-inverse global_footer">
    <div class="container py-13 py-md-15 global_footer_wrapper">
        <div class="row gy-6 gy-lg-0 global_footer_entry">
            <div class="col-md-4 col-lg-3 global_footer_card">
                <div class="widget global_footer_widget">
                    <img class="mb-4" src="./assets/img/logo.png" srcset="./assets/img/logo@2x.png 2x" alt=""/>
                    <p class="mb-4">© 2024 Hayalime Dokun. <br class="d-none d-lg-block"/>Tüm hakklar saklıdır.</p>
                    <nav class="nav social social-white">
                        <a href="#"><i class="uil uil-twitter"></i></a>
                        <a href="#"><i class="uil uil-facebook-f"></i></a>
                        <a href="#"><i class="uil uil-dribbble"></i></a>
                        <a href="#"><i class="uil uil-instagram"></i></a>
                        <a href="#"><i class="uil uil-youtube"></i></a>
                    </nav>
                </div>
            </div>
            <div class="col-md-4 col-lg-3 global_footer_card">
                <div class="widget global_footer_widget ">
                    <h4 class="widget-title text-white mb-3 global_footer_widget_title">İletişime Geçin</h4>
                    <address class="pe-xl-15 pe-xxl-17">Recep Tayyip Üniversitesi</address>
                    <a href="mailto:#">ardesenMYO.com</a><br/><a href="">05** *** **</a>
                </div>
            </div>
            <div class="col-md-4 col-lg-3 global_footer_card">
                <div class="widget global_footer_widget">
                    <h4 class="widget-title text-white mb-3 global_footer_widget_title">Daha Fazla Bilgi Edin</h4>
                    <ul class="list-unstyled  mb-0">
                        <li><a href="#">Ana Sayfa</a></li>
                        <li><a href="#">Hakkımızda</a></li>
                        <li><a href="#">Referanslar</a></li>
                        <li><a href="#">Kullanım Şartları</a></li>
                        <li><a href="#">Gizlilik Politikası</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-md-12 col-lg-3 global_footer_card">
                <div class="widget global_footer_widget">
                    <h4 class="widget-title text-white mb-3 global_footer_widget_title">Haber Bültenimiz</h4>
                    <p class="mb-5">Haber ve fırsatlarımızın size ulaşması için bültenimize abone olun.</p>
                </div>
            </div>
        </div>
    </div>
</footer>

<!-- Sandbox -->
<script src="assets/js/plugins.js"></script>
<script src="assets/js/theme.js"></script>

<!-- Login ile ilgili özel JS -->
<script src="assets/js/login.js"></script>
<script src="assets/js/verify.js"></script>
</body>
</html>