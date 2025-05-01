<?php
session_start();

$isLoggedIn = isset( $_SESSION['user_id'] );
$username   = $_SESSION['user_name'];
$is_gonullu = $_SESSION['is_gonullu'];

if ( ! $isLoggedIn ) {
	header( "Location: ../index.php" );
	exit();
}

if ( $is_gonullu == 1 ) {
	header( "Location: ../index.php" );
	exit();
}
?>
<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Original+Surfer&family=DynaPuff:wght@400..700&family=Akaya+Kanadaka&family=Delius&family=Sour+Gummy:ital,wght@0,100..900;1,100..900&family=Playpen+Sans:wght@100..800&family=Patrick+Hand&display=swap"
          rel="stylesheet">


    <link rel="icon" href="../assets/img/favicon.ico" type="image/x-icon">
    <link rel="apple-touch-icon" href="../assets/img/favicon.ico">
    <meta name="msapplication-TileImage" content="../assets/img/favicon.ico">

    <!-- Ana Sayfa -->
    <link rel="stylesheet" href="../assets/css/anasayfa.css">

    <!-- Sandbox -->
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="stylesheet" href="../assets/css/plugins.css">

    <!-- Global -->
    <link rel="stylesheet" href="../assets/css/global.css">
    <link rel="stylesheet" href="../assets/css/user-global.css">

    <!-- Toastr CSS (Hata/başarı bildirimleri için) -->
    <link rel="stylesheet" href="../assets/css/mayin-tarlasi.css">

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
                <a href="../kullanici-paneli.php">
                    <img src="../assets/img/logo.png" srcset="../assets/img/logo@2x.png 2x" alt=""/>
                </a>
            </div>
            <div class="navbar-collapse offcanvas offcanvas-nav offcanvas-start global_mobile_nav">
                <div class="offcanvas-header d-lg-none global_header-mobile-logo">
                    <a href="../kullanici-paneli.php">
                        <img src="../assets/img/logo.png" srcset="../assets/img/logo.png 2x" alt=""/>
                    </a>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas"
                            aria-label="Close"></button>
                </div>
                <div class="offcanvas-body ms-lg-auto d-flex flex-column h-100 global_nav-links">
                    <ul class="navbar-nav global_navbar">
						<?php
						$menu_items = [
							[ 'title' => 'Kullanıcı Paneli', 'link' => '../kullanici-paneli.php', 'class' => '' ],
							[ 'title' => 'İstek Kutusu', 'link' => '../istek-kutusu.php', 'class' => '' ],
						];

						foreach ( $menu_items as $item ) {
							echo '<li class="nav-item global_navbar-list ' . $item['class'] . '">';
							echo '<a class="nav-link global_navbar-link" href="' . $item['link'] . '">' . $item['title'] . '</a>';
							echo '</li>';
						}
						?>
                        <li class="nav-item dropdown global_navbar-list">
                            <a class="nav-link dropdown-toggle global_navbar-link" href="#"
                               data-bs-toggle="dropdown"><?php echo "Oyunlar"; ?></a>
                            <ul class="dropdown-menu global_dropdown">
                                <li>
                                    <a class="dropdown-item global_dropdown-link" href="../oyunlar/dort-islem.php">
										<?php echo "Dört İşlem"; ?>
                                    </a>
                                    <a class="dropdown-item global_dropdown-link" href="../oyunlar/mayin-tarlasi.php">
										<?php echo "Mayın Tarlası"; ?>
                                    </a>
                                    <a class="dropdown-item global_dropdown-link" href="../oyunlar/bulut-patlatma.php">
										<?php echo "Bulut Patlatma"; ?>
                                    </a>
                                    <a class="dropdown-item global_dropdown-link" href="../oyunlar/adam-asmaca.php">
										<?php echo "Adam Asmaca"; ?>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item dropdown global_navbar-list">
                            <div class="profile-card" id="profileCard">
                                <div class="profile-header">
                                    <img
                                            src="https://icons.iconarchive.com/icons/papirus-team/papirus-status/512/avatar-default-icon.png"
                                            alt="Profile Avatar"
                                            class="avatar"
                                    />
                                    <div class="profile-name"><?php echo $username; ?></div>
                                </div>
                                <div class="profile-actions">
                                    <button class="logout-button" onclick="logout2()">Çıkış Yap</button>
                                </div>
                            </div>
                        </li>
                    </ul>
                    <div class="offcanvas-footer d-lg-none global_mobile_contact">
                        <div>
							<?php
							$email        = 'info@email.com';
							$phone        = '00 (123) 456 78 90';
							$social_links = [
								'twitter'   => '#',
								'facebook'  => '#',
								'dribbble'  => '#',
								'instagram' => '#',
								'youtube'   => '#'
							];
							?>
                            <div class="mail">
                                <a href="mailto:<?php echo $email; ?>" class="link-inverse"><?php echo $email; ?></a>
                            </div>
                            <div class="tel">
                                <a href="tel:<?php echo str_replace( [ ' ', '(', ')' ], '', $phone ); ?>"
                                   class="link-inverse"><?php echo $phone; ?></a>
                            </div>
                            <nav class="nav social social-white mt-4">
								<?php foreach ( $social_links as $platform => $link ): ?>
                                    <a href="<?php echo $link; ?>"><i class="uil uil-<?php echo $platform; ?>"></i></a>
								<?php endforeach; ?>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
            <div class="navbar-other ms-lg-4">
                <ul class="navbar-nav flex-row align-items-center ms-auto">
                    <li class="nav-item global_navbar-info"><a class="nav-link" data-bs-toggle="offcanvas"
                                                               data-bs-target="#offcanvas-info"><i
                                    class="uil uil-info-circle"></i></a>
                    </li>
                    <li class="nav-item d-none d-lg-block global_navbar-login">
                        <div class="profile-trigger" onclick="toggleProfile()">
                            Profil
                            <div class="profile-card" id="profileCard">
                                <div class="profile-header">
                                    <img
                                            src="https://icons.iconarchive.com/icons/papirus-team/papirus-status/512/avatar-default-icon.png"
                                            alt="Profile Avatar"
                                            class="avatar"
                                    />
                                    <div class="profile-name"><?php echo $username; ?></div>
                                </div>
                                <div class="profile-actions">
                                    <button class="logout-button" onclick="logout2()">Çıkış Yap</button>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li class="nav-item d-lg-none">
                        <button class="hamburger offcanvas-nav-btn global_hamburger"><span></span></button>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="offcanvas offcanvas-end text-inverse global_info-box" id="offcanvas-info" data-bs-scroll="true">
        <div class="offcanvas-header">
            <a href="../kullanici-paneli.php"><img src="../assets/img/logo.png" srcset="../assets/img/logo@2x.png 2x"
                                                   alt=""/></a>
            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas"
                    aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">
            <div class="widget mb-8 global_info-box-widget">
                <p><?php echo "Çocukların yanında olmak, hayatlarına dokunmak ve birlikte daha güzel yarınlar inşa etmek için sen de
                    bize
                    katıl! Küçük bir destek, büyük bir değişim yaratır." ?></p>
            </div>
            <div class="widget mb-8 global_info-box-widget">
                <h4 class="widget-title text-white mb-3 global_info-box-widget-title"><?php echo "İletişim Bilgileri" ?></h4>
                <address> <?php echo "Recep Tayyip Erdoğan Üniversitesi"; ?> <br/> <?php echo "Rize, Ardeşen"; ?>
                </address>
                <div class="mail">
                    <a href="mailto:<?php echo $email; ?>"><?php echo $email; ?></a>
                </div>
                <div class="tel">
                    <a href="tel:<?php echo str_replace( [ ' ', '(', ')' ], '', $phone ); ?>"><?php echo $phone; ?></a>
                </div>
            </div>
            <div class="widget global_info-box-widget">
                <h4 class="widget-title text-white mb-3 global_info-box-widget-title">Bizi Takip Edin</h4>
                <nav class="nav social global_info-box-social">
					<?php foreach ( $social_links as $platform => $link ): ?>
                        <a href="<?php echo $link; ?>"><i
                                    class="uil uil-<?php echo $platform; ?> global_info-box-social-icon"></i></a>
					<?php endforeach; ?>
                </nav>
            </div>
        </div>
    </div>
</header>

<div class="hero">
    <div class="hero_header">
        <div class="container hero_header_title">
            <h1>HAYALLER GERÇEK OLSUN</h1>
            <p>Birlikte umut olalım, hayalleri gerçeğe dönüştürelim.</p>
        </div>
    </div>
    <div class="hero_entry">
        <div class="container hero_container">
            <div class="hero_firstcard">
                <!-- Oyun Kutusu -->
                <div class="game-box">
                    <div id="gameBoard" class="game-board"></div>
                </div>
                <div class="bubble-container">
                    <!-- Baloncuklar için bir konteyner -->
                </div>
                <div class="control-box">
                    <div class="score" id="score">Skor: 0</div>
                    <button class="button" onclick="startGame()">Yeniden Başla</button>
                </div>
            </div>
        </div>
    </div>
</div>

<footer class="text-inverse global_footer">
    <div class="container py-13 py-md-15 global_footer_wrapper">
        <div class="row gy-6 gy-lg-0 global_footer_entry">
            <div class="col-md-4 col-lg-3 global_footer_card">
                <div class="widget global_footer_widget">
                    <img class="mb-4" src="../assets/img/logo.png" srcset="../assets/img/logo@2x.png 2x" alt=""/>
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

<script src="../assets/js/plugins.js"></script>
<script src="../assets/js/theme.js"></script>

<!-- Logout -->
<script src="../assets/js/logout.js"></script>

<script>
    const rows = 5;
    const cols = 10;
    const mineCount = 15;
    const gameBoard = document.getElementById("gameBoard");
    const scoreDisplay = document.getElementById("score");

    let mines = [];
    let revealedCount = 0;
    let gameOver = false;

    function startGame() {
        gameBoard.innerHTML = "";
        mines = [];
        revealedCount = 0;
        gameOver = false;
        scoreDisplay.textContent = "Skor: 0";

        while (mines.length < mineCount) {
            const mine = Math.floor(Math.random() * rows * cols);
            if (!mines.includes(mine)) {
                mines.push(mine);
            }
        }

        for (let i = 0; i < rows * cols; i++) {
            const cell = document.createElement("div");
            cell.classList.add("cell");
            cell.dataset.index = i;
            cell.addEventListener("click", () => revealCell(cell));
            gameBoard.appendChild(cell);
        }
    }

    function revealCell(cell) {
        if (gameOver) return;
        const index = parseInt(cell.dataset.index);

        if (mines.includes(index)) {
            cell.textContent = "💣";
            cell.classList.add("mine");
            endGame(false);
        } else {
            cell.textContent = "✨";
            cell.classList.add("safe");
            revealedCount++;
            scoreDisplay.textContent = `Skor: ${revealedCount}`;
            checkWin();
        }
    }

    function endGame(win) {
        gameOver = true;
        if (win) {
            alert("Tebrikler! Kazandınız! 🎉");
        } else {
            alert("Mayına bastınız! 😢");
        }
    }

    function checkWin() {
        if (revealedCount + mineCount === rows * cols) {
            endGame(true);
        }
    }


    // Baloncuk Üretme Fonksiyonu
    function createBubble() {
        const bubbleContainer = document.querySelector('.bubble-container');
        const bubble = document.createElement('div');
        bubble.classList.add('bubble');

        // Rastgele yatay pozisyon belirleme
        const randomPosition = Math.random() * window.innerWidth;
        bubble.style.left = `${randomPosition}px`;

        // Balonun konteynere eklenmesi
        bubbleContainer.appendChild(bubble);

        // Baloncuk animasyonu tamamlandığında kaldırma
        setTimeout(() => {
            bubble.remove();
        }, 8000); // Animasyon süresiyle uyumlu
    }

    // Baloncuk Üretimi İçin Döngü
    setInterval(createBubble, 1000); // Her saniyede bir baloncuk eklenir


    startGame();
</script>


</body>
</html>