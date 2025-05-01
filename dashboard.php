<?php
session_start();

$isLoggedIn = isset( $_SESSION['user_id'] );
$username   = $_SESSION['user_name'];

if ( ! $isLoggedIn ) {
	header( "Location: index.php" );
	exit();
}
?>
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

    <!-- Anasayfa -->
    <link rel="stylesheet" href="assets/css/anasayfa.css">

    <!-- Global -->
    <link rel="stylesheet" href="assets/css/global.css">

    <!-- User Profile -->
    <link rel="stylesheet" href="assets/css/user-profile.css">

    <!-- Toastr CSS (Hata/başarı bildirimleri için) -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">

    <!-- jQuery (Toastr için gerekli) -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- Toastr JS (Bildirimler için) -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>


    <title>Hayalleri Gerçekleştiren Dijital Köprü</title>
</head>
<body>

<header class="wrapper bg-soft-primary global_header">
    <nav class="navbar navbar-expand-lg classic transparent navbar-light global_header-nav">
        <div class="container flex-lg-row flex-nowrap align-items-center global_nav-container">
            <div class="navbar-brand w-100 global_header-logo">
                <a href="/index.php">
                    <img src="./assets/img/logo.png" srcset="./assets/img/logo@2x.png 2x" alt=""/>
                </a>
            </div>
            <div class="navbar-collapse offcanvas offcanvas-nav offcanvas-start global_mobile_nav">
                <div class="offcanvas-header d-lg-none global_header-mobile-logo">
                    <a href="./index.php">
                        <img src="./assets/img/logo.png" srcset="./assets/img/logo.png 2x" alt=""/>
                    </a>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas"
                            aria-label="Close"></button>
                </div>
                <div class="offcanvas-body ms-lg-auto d-flex flex-column h-100 global_nav-links">
                    <ul class="navbar-nav global_navbar">
                        <li class="nav-item dropdown global_navbar-list">
                            <a class="nav-link dropdown-toggle global_navbar-link" href="#" data-bs-toggle="dropdown">Ana
                                Sayfa</a>
                            <ul class="dropdown-menu global_dropdown">
                                <li class="nav-item global_dropdown-list"><a
                                            class="dropdown-item global_dropdown-link" href="#">Hakkımızda</a></li>
                                <li class="nav-item global_dropdown-list"><a
                                            class="dropdown-item global_dropdown-link" href="#">Referanslar</a></li>
                                <li class="nav-item global_dropdown-list"><a
                                            class="dropdown-item global_dropdown-link" href="#">İletişim</a></li>
                            </ul>
                        </li>
                        <li class="nav-item dropdown global_navbar-list">
                            <a class="nav-link dropdown-toggle global_navbar-link" href="#" data-bs-toggle="dropdown">Hayaller</a>
                            <ul class="dropdown-menu global_dropdown">
                                <li class="nav-item"><a class="dropdown-item global_dropdown-link" href="#">İstek
                                        Kutusu</a></li>
                                <li class="dropdown dropdown-submenu dropend">
                                    <a class="dropdown-item dropdown-toggle global_dropdown-link" href="#"
                                       data-bs-toggle="dropdown">Oyunlar</a>
                                    <ul class="dropdown-menu global_dropdown">
                                        <li class="nav-item global_dropdown-list"><a
                                                    class="dropdown-item global_dropdown-link" href="#">Çarpım
                                                Tablosu</a></li>
                                        <li class="nav-item global_dropdown-list"><a
                                                    class="dropdown-item global_dropdown-link" href="#">Mayın
                                                Tarlası</a></li>
                                        <li class="nav-item global_dropdown-list"><a
                                                    class="dropdown-item global_dropdown-link" href="#">Kart
                                                Eşleştirme</a></li>
                                    </ul>
                                </li>
                                <li class="nav-item"><a class="dropdown-item global_dropdown-link" href="#">Günlük</a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item global_navbar-list"><a class="nav-link global_navbar-link" href="#">Hayal
                                Kahramanları</a></li>
                    </ul>
                    <div class="offcanvas-footer d-lg-none global_mobile_contact">
                        <div>
                            <a href="mailto:first.last@email.com" class="link-inverse">info@email.com</a>
                            <br/> 00 (123) 456 78 90 <br/>
                            <nav class="nav social social-white mt-4">
                                <a href="#"><i class="uil uil-twitter "></i></a>
                                <a href="#"><i class="uil uil-facebook-f"></i></a>
                                <a href="#"><i class="uil uil-dribbble"></i></a>
                                <a href="#"><i class="uil uil-instagram"></i></a>
                                <a href="#"><i class="uil uil-youtube"></i></a>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
            <div class="user_info">
                <div class="user_profile">
                    <div class="user_avatar">
                        <img src="./assets/img/avatar.jpg" alt="">
                    </div>
                    <div class="user_detail">
                        <div class="user_message">Hoş geldin,</div>
                        <div class="user_name"><?php echo $username ? $username : '' ?></div>
                    </div>
                    <div class="user_settings">
                        <img src="./assets/img/settings.svg" alt="">
                    </div>
                </div>
                <div class="user_panel">
                    <div class="user_panel_info">
                        <div class="user_panel_avatar">
                            <img src="./assets/img/avatar.jpg" alt="">
                        </div>
                        <div class="user_panel_detail">
                            <div class="user_panel_message">Hoş geldin,</div>
                            <div class="user_panel_name"><?php echo $username ? $username : '' ?></div>
                        </div>
                        <div class="user_panel_logout">
                            <a href="javascript:void(0);" onclick="logout()">
                                <img src="./assets/img/exit.svg" alt=""></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </nav>
    <div class="offcanvas offcanvas-end text-inverse global_info-box" id="offcanvas-info" data-bs-scroll="true">
        <div class="offcanvas-header">
            <a href="/index.php"><img src="./assets/img/logo.png" srcset="./assets/img/logo@2x.png 2x" alt=""/></a>
            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas"
                    aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">
            <div class="widget mb-8 global_info-box-widget">
                <p>Çocukların yanında olmak, hayatlarına dokunmak ve birlikte daha güzel yarınlar inşa etmek için sen de
                    bize
                    katıl! Küçük bir destek, büyük bir değişim yaratır.</p>
            </div>
            <div class="widget mb-8 global_info-box-widget">
                <h4 class="widget-title text-white mb-3 global_info-box-widget-title">İletişim Bilgileri</h4>
                <address> Recep Tayyip Erdoğan Üniversitesi <br/> Rize, Ardeşen</address>
                <a href="mailto:first.last@email.com">info@email.com</a><br/> 00 (123) 456 78 90
            </div>
            <div class="widget mb-8 global_info-box-widget">
                <h4 class="widget-title text-white mb-3 global_info-box-widget-title">Daha Fazla Bilgi Edin</h4>
                <ul class="list-unstyled">
                    <li><a href="#">Hakkımızda</a></li>
                    <li><a href="#">Kullanım Şartları</a></li>
                    <li><a href="#">Gizlilik Politikası</a></li>
                    <li><a href="#">Bize Ulaşın</a></li>
                </ul>
            </div>
            <div class="widget global_info-box-widget">
                <h4 class="widget-title text-white mb-3 global_info-box-widget-title">Bizi Takip Edin</h4>
                <nav class="nav social global_info-box-social">
                    <a href="#"><i class="uil uil-twitter global_info-box-social-icon"></i></a>
                    <a href="#"><i class="uil uil-facebook-f global_info-box-social-icon"></i></a>
                    <a href="#"><i class="uil uil-dribbble global_info-box-social-icon"></i></a>
                    <a href="#"><i class="uil uil-instagram global_info-box-social-icon"></i></a>
                    <a href="#"><i class="uil uil-youtube global_info-box-social-icon"></i></a>
                </nav>
            </div>
        </div>
    </div>
</header>

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

<!-- Dashboard -->
<script src="assets/js/dashboard.js"></script>

<!-- Sandbox -->
<script src="assets/js/plugins.js"></script>
<script src="assets/js/theme.js"></script>

<!-- Logout -->
<script src="assets/js/logout.js"></script>

</body>
</html>