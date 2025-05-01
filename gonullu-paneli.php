<?php
session_start();

$isLoggedIn = isset( $_SESSION['user_id'] );
$username   = $_SESSION['user_name'];
$is_gonullu = $_SESSION['is_gonullu'];

if ( ! $isLoggedIn ) {
	header( "Location: ./index.php" );
	exit();
}

if ( $is_gonullu == 0 ) {
	header( "Location: ./index.php" );
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

	<link rel="icon" href="./assets/img/favicon.ico" type="image/x-icon">
	<link rel="apple-touch-icon" href="./assets/img/favicon.ico">
	<meta name="msapplication-TileImage" content="./assets/img/favicon.ico">

	<!-- Sandbox -->
	<link rel="stylesheet" href="./assets/css/style.css">
	<link rel="stylesheet" href="./assets/css/plugins.css">

	<!-- Global -->
	<link rel="stylesheet" href="./assets/css/global.css">
	<link rel="stylesheet" href="./assets/css/kullanici-paneli.css">
	<link rel="stylesheet" href="./assets/css/user-global.css">
	<link rel="stylesheet" href="./assets/css/anasayfa.css">

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
							[ 'title' => 'Gönüllü Paneli', 'link' => './gonullu-paneli.php', 'class' => '' ],
                            [ 'title' => 'Hakkımızda', 'link' => '#', 'class' => 'hakkimizda_nav' ],
							[ 'title' => 'Neden Biz?', 'link' => '#', 'class' => 'nedenbiz_nav' ],
							[ 'title' => 'İletişim', 'link' => '#', 'class' => 'iletisim_nav' ],
							[ 'title' => 'Hayaller', 'link' => './hayaller.php', 'class' => '' ],
						];

						foreach ( $menu_items as $item ) {
							echo '<li class="nav-item global_navbar-list ' . $item['class'] . '">';
							echo '<a class="nav-link global_navbar-link" href="' . $item['link'] . '">' . $item['title'] . '</a>';
							echo '</li>';
						}
						?>
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


<div class="wrapper kullanici-paneli-hero py-8 py-md-9">
	<div class="container">
		<div class="card bg-soft-primary rounded-4 ">
			<div class="card-body p-md-10 py-xl-11 px-xl-15">
				<div class="row gx-lg-8 gx-xl-0 gy-10 align-items-center">
					<div class="col-lg-6 order-lg-2 d-flex position-relative">
						<img class="img-fluid ms-auto mx-auto" src="./assets/img/panelhayal.png"
						     srcset="./assets/img/panelhayal.png 2x" alt="" data-cue="fadeIn">
					</div>
					<!--/column -->
					<div class="col-lg-6 text-center text-lg-start" data-cues="slideInDown" data-group="page-title"
					     data-delay="600">
						<h1 class="display-3 mb-5">Bir çocuk için süper kahraman olurmusun ?</h1>
						<p class="lead fs-lg lh-sm mb-7 pe-xl-10">Hayallerini süsleyen bir süper kahraman olmak için hayallere göz at</p>
						<div class="d-flex justify-content-center justify-content-lg-start" data-cues="slideInDown"
						     data-group="page-title-buttons" data-delay="900">
							<span><a href="./hayaller.php" class="btn btn-lg btn-outline-primary rounded-pill">Hayaller</a></span>
						</div>
					</div>
					<!--/column -->
				</div>
				<!--/.row -->
			</div>
			<!--/.card-body -->
		</div>
	</div>
</div>

<div class="hakkimizda" id="targetHakkimizda">
    <div class="container hakkimizda_container">
        <div class="hakkimizda_title">
            <h1><?php echo "Hakkımızda"; ?></h1>
        </div>
        <div class="hakkimizda_divider"></div>
        <div class="hakkimizda_desc">
            <p><span class="hakkimizda_highlight"><?php echo '"Hayaller Gerçekleştiren Dijital Köprü"'; ?></span>
				<?php echo "Projesi, kimsesiz çocukların hayallerini gerçekleştirmek, onların mutluluğunu ve umutlarını yeşertmek
                için başlatılmış bir sosyal sorumluluk girişimidir."; ?></p>
            <p><?php echo "Hayal kurmak, her çocuğun hakkıdır. Biz, bu projeyle çocukların içlerindeki umudu canlı tutarak, onların
                geleceğe daha güçlü adımlarla ilerlemelerini sağlıyoruz. Onların hayalleri sadece bir dilek değil, aynı
                zamanda gerçekleşmeyi bekleyen birer umut ışığıdır."; ?></p>
            <p><?php echo "Projemiz, çocukların kendilerini ifade edebilecekleri bir platform sunmaktadır. Burada çocuklar
                hayallerini paylaşabilir, duygu ve düşüncelerini yazabilirler. Ayrıca, gönüllü destekçiler ve
                sponsorlar, bu hayalleri gerçeğe dönüştürmek için el ele vererek onlara umut olmaktadır."; ?></p>
            <p><?php echo '"Hayaller Gerçek Olsun" sadece bir proje değil, aynı zamanda bir dayanışma hareketidir. Düzenlediğimiz
                etkinliklerle, çocuklara unutulmaz anlar yaşatarak onların moral ve motivasyonlarını yükseltiyoruz. Oyun
                alanları, yaratıcı atölyeler ve eğitim destekleri ile çocukların gelişimlerini destekliyoruz.'; ?></p>
            <p><?php echo "Bu projeye destek olarak bir çocuğun yüzündeki tebessümün sebebi olabilir, onun hayatına dokunarak büyük
                bir fark yaratabilirsiniz. Çünkü inanıyoruz ki,"; ?> <span
                        class="hakkimizda_highlight"><?php echo "hayaller gerçekleştiğinde, dünya daha güzel bir yer olur!"; ?></span>
            </p>
        </div>
    </div>
</div>

<div class="anasayfa_first_design">
	<div class="wrapper anasayfa_first_design_wrapper">
		<div class="container py-14 py-md-16 bg-beyaz anasayfa_first_design_container">
			<div class="projects-tiles">
				<div class="project grid grid-view">
					<div class="row gx-md-8 gx-xl-12 gy-10 gy-md-12 isotope">
						<div class="item col-md-6">
							<figure class="rounded mb-0 ">
								<img src="./assets/img/blog1.png" alt=""/>
								<div class="first_design_card">
									<div class="first_design_card_title"><?php echo "Bir Gülümsemeyle Fark Yarat!"; ?>
									</div>
									<div class="first_design_card_desc">
										<h3><?php echo "Yetim çocuklara umut olmak ve onların yanında
                                            yürümek için gönüllü ol! Küçük bir dokunuş, büyük değişimlere yol
                                            açabilir."; ?></h3>
									</div>
								</div>
							</figure>
						</div>
						<div class="item col-md-6 mt-md-17">
							<figure class="rounded mb-0 ">
								<img src="./assets/img/blog2.png" alt=""/>
								<div class="first_design_card">
									<div class="first_design_card_title text-orange">
										<span><?php echo "Bir Sayfa, Bin Hayal!"; ?></span>
									</div>
									<div class="first_design_card_desc"><h3><?php echo "Hayaller, yazıldıkça büyür. Yetim
                                            çocukların
                                            hayallerini
                                            paylaşabileceği,
                                            kendilerini ifade edebileceği özel bir alan sunuyoruz. Onların
                                            iç dünyasını keşfetmeye ve umutlarını yeşertmeye var mısın?"; ?></h3></div>
								</div>
							</figure>
						</div>
						<div class="item col-md-6">
							<figure class="rounded mb-0 ">
								<img src="./assets/img/blog3.png" alt=""/>
								<div class="first_design_card">
									<div class="first_design_card_title text-red">
										<span><?php echo "Anılarla Dolu Sayfalar"; ?></span>
									</div>
									<div class="first_design_card_desc"><h3><?php echo "Her gün bir hikâye, her anı bir hazine!
                                            Kendi
                                            kaleminden dökülen satırlar, birer hatıra olarak geleceğe taşınacak."; ?></h3>
									</div>
								</div>
							</figure>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="wrapper nedenbiz" id="targetNedenBiz">
    <div class="container pt-14 pt-md-16 pb-9 pb-md-11 pb-md-17">
        <div class="row gx-md-5 gy-5 ">
            <div class="col-md-6 col-xl-3">
                <div class="card shadow-lg nedenbiz_esitleme">
                    <div class="card-body">
                        <div class="nedenbiz_img">
                            <img src="./assets/img/target.svg" class=" icon-svg icon-svg-md text-yellow mb-3" alt=""/>
                            <h4><?php echo "Projenin Misyonu ve Hedefleri"; ?></h4>
                        </div>
                        <p class="mb-2"><?php echo "Yetimhanedeki çocukların hayallerini paylaşmalarına ve destek
                            görmelerine olanak tanıyan bir platform oluşturuyoruz. Amacımız, onların sesini duyurmak ve
                            topluma ilham vermek."; ?></p>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-xl-3">
                <div class="card shadow-lg nedenbiz_esitleme">
                    <div class="card-body">
                        <div class="img">
                            <img src="./assets/img/workflow.svg" class=" icon-svg icon-svg-md text-green mb-3" alt=""/>
                            <h4>Proje Süreci</h4>
                        </div>
                        <p class="mb-2">
							<?php echo "1. Çocuklar hayallerini platformda paylaşıyor."; ?><br>
							<?php echo "2. Destekçiler bu hayalleri görüp katkıda bulunabiliyor."; ?><br>
							<?php echo "3. Gerçekleşen hayaller, platformda paylaşılıyor ve daha fazla kişiye ilham veriyor."; ?>
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-xl-3">
                <div class="card shadow-lg nedenbiz_esitleme">
                    <div class="card-body">
                        <div class="img">
                            <img src="./assets/img/megaphone.svg" class=" icon-svg icon-svg-md text-orange mb-3"
                                 alt=""/>
                            <h4><?php echo "Gelecekteki Referanslar ve Destekçiler"; ?></h4>
                        </div>

                        <p class="mb-2"><?php echo "Projemiz geliştikçe, bize destek veren kişi ve kurumları burada paylaşacağız.
                            Siz de bir destekçi olmak isterseniz bizimle iletişime geçebilirsiniz."; ?></p>
                        <a href="#" class="more hover link-orange"><?php echo "Gönüllü Ol"; ?></a>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-xl-3">
                <div class="card shadow-lg nedenbiz_esitleme">
                    <div class="card-body">

                        <div class="img">
                            <img src="./assets/img/plan.svg" class=" icon-svg icon-svg-md text-blue mb-3" alt=""/>
                            <h4><?php echo "Gelecek Planlarımız"; ?></h4>
                        </div>

                        <p class="mb-2"><?php echo "Projemizi daha fazla çocuğa ulaştırmak ve hayallerini gerçekleştirmelerine
                            yardımcı olmak için sürekli geliştiriyoruz.
                            Yakın gelecekte, platforma yeni özellikler eklemeyi ve daha fazla destekçi ile iş birliği
                            yapmayı hedefliyoruz.
                            Siz de bu yolculukta bizimle olmak ister misiniz?"; ?></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="wrapper" id="targetIletisim">
    <div class="container py-14 py-md-16">
        <div class="card bg-soft-primary">
            <div class="card-body p-12">
                <div class="row gx-md-8 gx-xl-12 gy-10">
                    <div class="col-lg-6">
                        <img src="./assets/img/email.svg" class="svg-inject icon-svg icon-svg-sm mb-4" alt="" />
                        <h2 class="display-4 mb-3 pe-lg-10">Bizimle iletişime geç.</h2>
                        <p class="lead pe-lg-12 mb-0">Yetiştirmemiz gereken onlarca hayal var daha hızlı çözümler için bizimle iletişime geç!</p>
                    </div>
                    <!-- /column -->
                    <div class="col-lg-6">
                        <form class="contact-form needs-validation" method="post" action="./assets/php/contact.php" novalidate>
                            <div class="messages"></div>
                            <div class="row gx-4">
                                <div class="col-md-6">
                                    <div class="form-floating mb-4">
                                        <input id="frm_name" type="text" name="name" class="form-control border-0" placeholder="Ahmet" required="required" data-error="İsim gereklidir.">
                                        <label for="frm_name">Adınız *</label>
                                        <div class="invalid-feedback">
                                            Lütfen adınızı girin.
                                        </div>
                                    </div>
                                </div>
                                <!-- /column -->
                                <div class="col-md-6">
                                    <div class="form-floating mb-4">
                                        <input id="frm_email" type="email" name="email" class="form-control border-0" placeholder="test@gmail.com" required="required" data-error="Geçerli e-posta gereklidir.">
                                        <label for="frm_email">E-posta *</label>
                                        <div class="valid-feedback">
                                            Güzel görünüyor!
                                        </div>
                                        <div class="invalid-feedback">
                                            Lütfen geçerli bir e-posta adresi girin.
                                        </div>
                                    </div>
                                </div>
                                <!-- /column -->
                                <div class="col-12">
                                    <div class="form-floating mb-4">
                                        <textarea id="frm_message" name="message" class="form-control border-0" placeholder="Mesajınız" style="height: 150px" required></textarea>
                                        <label for="frm_message">Mesajınız *</label>
                                        <div class="valid-feedback">
                                            Güzel görünüyor!
                                        </div>
                                        <div class="invalid-feedback">
                                            Lütfen mesajınızı girin.
                                        </div>
                                    </div>
                                </div>
                                <!-- /column -->
                                <div class="col-12">
                                    <input type="submit" class="btn btn-outline-primary rounded-pill btn-send mb-3" value="Mesajı Gönder">
                                </div>
                                <!-- /column -->
                            </div>
                            <!-- /.row -->
                        </form>
                        <!-- /form -->
                    </div>
                    <!-- /column -->
                </div>
                <!-- /.row -->
            </div>
            <!--/.card-body -->
        </div>
        <!--/.card -->
    </div>
    <!-- /.container -->
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

<script src="./assets/js/plugins.js"></script>
<script src="./assets/js/theme.js"></script>

<!-- Logout -->
<script src="./assets/js/logout.js"></script>
<script src="./assets/js/user-global.js"></script>
<script src="./assets/js/anasayfa.js"></script>

</body>
</html>