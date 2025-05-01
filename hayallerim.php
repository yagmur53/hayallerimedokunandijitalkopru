<?php
$mysqli = require __DIR__ . "/db/connection.php";
session_start();

$isLoggedIn = isset( $_SESSION['user_id'] );
$username   = $_SESSION['user_name'];
$user_id    = $_SESSION['user_id'];
$is_gonullu = $_SESSION['is_gonullu'];

if ( ! $isLoggedIn ) {
	header( "Location: ./index.php" );
	exit();
}

if ( $is_gonullu == 1 ) {
	header( "Location: ./gonullu-paneli.php" );
	exit();
}

$sql    = "SELECT id, user_id, hayal FROM hayaller WHERE user_id = $user_id";
$result = $mysqli->query( $sql );

$dreams = [];

if ( $result->num_rows > 0 ) {
	// Verileri döngü ile alıyoruz
	while ( $row = $result->fetch_assoc() ) {
		$dreams[] = [
			'id'      => $row['id'],
			'user_id' => $row['user_id'],
			'hayal'   => $row['hayal']
		];
	}
} else {
	echo "";
}

// Bağlantıyı kapatıyoruz
$mysqli->close();

?>
<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Original+Surfer&family=DynaPuff:wght@400..700&family=Akaya+Kanadaka&family=Delius&family=Sour+Gummy:ital,wght@0,100..900;1,100..900&family=Playpen+Sans:wght@100..800&family=Patrick+Hand&display=swap"
          rel="stylesheet">

    <link rel="icon" href="./assets/img/favicon.ico" type="image/x-icon">
    <link rel="apple-touch-icon" href="./assets/img/favicon.ico">
    <meta name="msapplication-TileImage" content="./assets/img/favicon.ico">

    <!-- Sandbox -->
    <link rel="stylesheet" href="./assets/css/style.css">
    <link rel="stylesheet" href="./assets/css/plugins.css">
    <link rel="stylesheet" href="./assets/css/hayaller.css">

    <!-- Global -->
    <link rel="stylesheet" href="./assets/css/global.css">
    <link rel="stylesheet" href="./assets/css/user-global.css">

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
                <a href="./kullanici-paneli.php">
                    <img src="./assets/img/logo.png" srcset="./assets/img/logo@2x.png 2x" alt=""/>
                </a>
            </div>
            <div class="navbar-collapse offcanvas offcanvas-nav offcanvas-start global_mobile_nav">
                <div class="offcanvas-header d-lg-none global_header-mobile-logo">
                    <a href="./kullanici-paneli.php">
                        <img src="./assets/img/logo.png" srcset="./assets/img/logo.png 2x" alt=""/>
                    </a>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas"
                            aria-label="Close"></button>
                </div>
                <div class="offcanvas-body ms-lg-auto d-flex flex-column h-100 global_nav-links">
                    <ul class="navbar-nav global_navbar">
						<?php
						$menu_items = [
							[ 'title' => 'Kullanıcı Paneli', 'link' => './kullanici-paneli.php', 'class' => '' ],
							[ 'title' => 'Hayallerim', 'link' => './hayallerim.php', 'class' => '' ],
							[ 'title' => 'İstek Kutusu', 'link' => './istek-kutusu.php', 'class' => '' ],
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
                                    <a class="dropdown-item global_dropdown-link" href="./oyunlar/dort-islem.php">
										<?php echo "Dört İşlem"; ?>
                                    </a>
                                    <a class="dropdown-item global_dropdown-link" href="./oyunlar/mayin-tarlasi.php">
										<?php echo "Mayın Tarlası"; ?>
                                    </a>
                                    <a class="dropdown-item global_dropdown-link" href="./oyunlar/bulut-patlatma.php">
										<?php echo "Bulut Patlatma"; ?>
                                    </a>
                                    <a class="dropdown-item global_dropdown-link" href="./oyunlar/adam-asmaca.php">
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
            <a href="./kullanici-paneli.php"><img src="./assets/img/logo.png" srcset="./assets/img/logo@2x.png 2x"
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

<div class="hayaller_wrapper">
    <div class="stars-container" id="starsContainer"></div>
    <div class="glow"></div>

    <div class="header-section">
        <div class="container">
            <h1 class="display-4 mb-3">Hayallerim</h1>
            <p class="lead">Yazdığın hayallerini görüntüleyebilirsin.</p>
        </div>
    </div>

    <div class="container mb-5">
        <div id="dreamsList">
            <!-- Dreams will be populated here -->
        </div>
    </div>
</div>

<script src="./assets/js/plugins.js"></script>
<script src="./assets/js/theme.js"></script>

<!-- Logout -->
<script src="./assets/js/logout.js"></script>
<script src="./assets/js/user-global.js"></script>
<script>
    const dreams = <?php echo json_encode( $dreams ); ?>;

    function createDreamCard(dream) {
        return `
                <div class="dream-card" data-id="${dream.id}">
                    <div class="card-body p-4">
                        <div class="user-dream-detail">
                            <h6 class="text-white-50 mb-3">Hayal:</h6>
                            <p class="dream-text">${dream.hayal}</p>
                        </div>
                    </div>
                    <div class="delete-dream"  data-id="${dream.id}">
                        <img src="./assets/img/delete.svg" alt="">
                    </div>
                </div>
            `;
    }

    function createStar() {
        const star = document.createElement('div');
        star.className = 'star';
        star.style.setProperty('--duration', `${2 + Math.random() * 3}s`);
        star.style.setProperty('--initial-opacity', `${0.2 + Math.random() * 0.8}`);
        star.style.left = `${Math.random() * 100}%`;
        star.style.top = `${Math.random() * 100}%`;
        return star;
    }

    function initStars() {
        const container = document.getElementById('starsContainer');
        for (let i = 0; i < 150; i++) {
            container.appendChild(createStar());
        }
    }

    function toggleDream(id) {
        const dreamElement = document.getElementById(`dream-${id}`);
        const allDreams = document.querySelectorAll('.dream-detail');

        allDreams.forEach(dream => {
            if (dream.id !== `dream-${id}`) {
                dream.classList.remove('active');
            }
        });

        dreamElement.classList.toggle('active');
    }

    window.onload = function () {
        const dreamsList = document.getElementById('dreamsList');
        dreams.forEach(dream => {
            dreamsList.innerHTML += createDreamCard(dream);
        });
        initStars();

        const elements = document.querySelectorAll('.delete-dream');
        elements.forEach(function(element) {
            element.addEventListener('click', function() {
                const dreamId = element.getAttribute('data-id');
                deleteDream(dreamId);
            });
        });
    };

    function deleteDream(dreamId) {
        $.ajax({
            url: 'delete_dream.php', // PHP silme dosyasına istek gönderiyoruz
            type: 'POST',
            data: { dream_id: dreamId }, // Silinecek hayalin id'sini gönderiyoruz
            success: function(response) {
                const result = JSON.parse(response);
                if (result.success) {
                    // Başarılıysa hayali sayfadan sil
                    document.querySelector(`.dream-card[data-id="${dreamId}"]`).remove();
                    toastr.success(result.message); // Toastr ile başarı mesajı göster
                } else {
                    toastr.error(result.message); // Hata mesajını göster
                }
            },
            error: function() {
                toastr.error('Silme işlemi sırasında bir hata oluştu.');
            }
        });
    }
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>