<?php	
  ini_set('display_errors',1);
  ini_set('display_startup_errors',1);
  error_reporting(-1);
  session_start();
  $_SESSION['langid']='tr';
  $og_url="https://hocalarburada.com.tr/index.php";
  $og_title="JETödev";
  $og_desc="Hız Kaliteyle Buluştu";
  $og_image="https://hocalarburada.com.tr/data/imgs/og.jpg"; 
  
   require_once("apps/class/class.db.php");
   $DB_Engine  = new hzlsnv_Database;
  
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" lang='tr'>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>HocalarBurada</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<meta property="og:url"                content="<?php echo $og_url;?>" />
    <meta property="og:type"               content="article" />
    <meta property="og:title"              content="<?php echo $og_title;?>" />
    <meta property="og:description"        content="<?php echo $og_desc;?>" />
    <meta property="og:image"              content="<?php echo $og_image;?>" />
	<meta property="fb:app_id"             content="503125783123938" />
  

    <!-- FAVICONS -->
	<link rel="icon" type="image/png" href="data/imgs/favicons/favicon-96x96.png" sizes="96x96" />
	<link rel="icon" type="image/svg+xml" href="data/imgs/favicons/favicon.svg" />
	<link rel="shortcut icon" href="data/imgs/favicons/favicon.ico" />
	<link rel="apple-touch-icon" sizes="180x180" href="data/imgs/favicons/apple-touch-icon.png" />
     <!-- FAVICONS ENDS-->
    <meta name="description" content="Hocalar Burada Uygulaması" />

    <!-- fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@100..900&display=swap" rel="stylesheet">


    <link
        href="https://fonts.googleapis.com/css2?family=Roboto+Serif:ital,opsz,wght@0,8..144,100..900;1,8..144,100..900&display=swap"
        rel="stylesheet">

    <link rel="stylesheet" href="web_files/css/bootstrap.min.css">
    <link rel="stylesheet" href="web_files/css/animate.min.css">
    <link rel="stylesheet" href="web_files/css/custom-animate.css">
    <link rel="stylesheet" href="web_files/css/swiper.min.css">
    <link rel="stylesheet" href="web_files/css/font-awesome-all.css">
    <link rel="stylesheet" href="web_files/css/jarallax.css">
    <link rel="stylesheet" href="web_files/css/jquery.magnific-popup.css">
    <link rel="stylesheet" href="web_files/css/odometer.min.css">
    <link rel="stylesheet" href="web_files/css/flaticon.css">
    <link rel="stylesheet" href="web_files/css/owl.carousel.min.css">
    <link rel="stylesheet" href="web_files/css/owl.theme.default.min.css">
    <link rel="stylesheet" href="web_files/css/nice-select.css">
    <link rel="stylesheet" href="web_files/css/jquery-ui.css">
    <link rel="stylesheet" href="web_files/css/aos.css">


    <link rel="stylesheet" href="web_files/css/module-css/banner.css?v=1">
    <link rel="stylesheet" href="web_files/css/module-css/slider.css">
    <link rel="stylesheet" href="web_files/css/module-css/footer.css">
    <link rel="stylesheet" href="web_files/css/module-css/sliding-text.css">
    <link rel="stylesheet" href="web_files/css/module-css/category.css">
    <link rel="stylesheet" href="web_files/css/module-css/about.css?v=1">
    <link rel="stylesheet" href="web_files/css/module-css/courses.css">
    <link rel="stylesheet" href="web_files/css/module-css/why-choose.css">
    <link rel="stylesheet" href="web_files/css/module-css/live-class.css">
    <link rel="stylesheet" href="web_files/css/module-css/video-one.css?v=1">
    <link rel="stylesheet" href="web_files/css/module-css/blog.css">
    <link rel="stylesheet" href="web_files/css/module-css/counter.css">
    <link rel="stylesheet" href="web_files/css/module-css/team.css">
    <link rel="stylesheet" href="web_files/css/module-css/newsletter.css">
    <link rel="stylesheet" href="web_files/css/module-css/testimonial.css">
    <link rel="stylesheet" href="web_files/css/module-css/contact.css">
    <link rel="stylesheet" href="web_files/css/module-css/courses-search.css">
    <link rel="stylesheet" href="web_files/css/module-css/pricing.css">
    <link rel="stylesheet" href="web_files/css/module-css/process.css">
    <link rel="stylesheet" href="web_files/css/module-css/event.css">
    <link rel="stylesheet" href="web_files/css/module-css/page-header.css">
    <link rel="stylesheet" href="web_files/css/module-css/skill.css">
    <link rel="stylesheet" href="web_files/css/module-css/become-a-teacher.css">
    <link rel="stylesheet" href="web_files/css/module-css/gallery.css">
    <link rel="stylesheet" href="web_files/css/module-css/faq.css">
    <link rel="stylesheet" href="web_files/css/module-css/shop.css">
    <link rel="stylesheet" href="web_files/css/module-css/error.css" />
    <link href="https://fonts.googleapis.com/css2?family=Poetsen+One&display=swap" rel="stylesheet">

    <!-- template styles -->
    <link rel="stylesheet" href="web_files/css/style.css?v=39">
    <link rel="stylesheet" href="web_files/css/responsive.css?v=1">
	<style>
	.myvideo_btn{    
	background-size: 360px 60px;
    background-image: url(web_files/images/myimgs/btn_back.png);
    color: white;
    width: 360px;
    height: 60px;
    box-shadow: -10px 5px 5px gray;
    line-height: 50px;
    text-align: center;
    font-weight: bold;
    border-radius: 50px;
	}
	</style
    </head>
<body class="custom-cursor">
    <div class="custom-cursor__cursor"></div>
    <div class="custom-cursor__cursor-two"></div>

    <div class="page-wrapper">
        <header class="main-header">
            <div class="main-menu__top2">
                <div class="container">
                    <div class="main-menu__top-inner" style='padding:10px 0'>
                        <ul class="list-unstyled main-menu__contact-list">
                            <li>
                                <a href="https://hocalarburada.com.tr"><img id="menu_logo" src="../data/imgs/logo_yazi_parlak.png" style='height:45px'></a>
                            </li>                    
                        </ul>
                        <ul class="list-unstyled main-menu__contact-list main-menu__location">
                            <li>
                                <div class="about-one__btn-box">
                                   <a href="apps" class="thm-btn" style="width:100%;border: 2px solid aqua;">Giriş<span class="icon-angles-right"></span></a>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </header>

    <div class="stricky-header stricked-menu main-menu">
        <div class="sticky-header__content"></div><!-- /.sticky-header__content -->
    </div>

<!-- About One Start -->
<section id='about' class="about-one">
    <div class="about-one__shape-1">
        <img src="web_files/images/shapes/about-one-shape-1.png" alt="">
    </div>
    <div class="about-one__shape-2">
        <img src="web_files/images/shapes/about-one-shape-2.png" alt="">
    </div>
    <div class="container">
        <div class="row">
            <div class="col-xl-6 wow slideInLeft" data-wow-delay="100ms" data-wow-duration="2500ms">
                <div class="about-one__left">
                    <div class="about-one__left-shape-1 rotate-me"></div>
                    <div class="row">
                        <div class="col-xl-6 col-lg-6 col-md-6">
                            <div class="about-one__img-box">
                                <div class="about-one__img">
                                    <img src="web_files/images/myimgs/ogrt_erkek.jpg" alt="">
                                </div>
                            </div>
							<div class="about-one__experience-box">
                                <div class="about-one__experience-box-inner">
                                    <div class="about-one__experience-icon">
                                        <img src="web_files/images/myimgs/ogretmen.jpg" height='60'alt="">
                                    </div>
                                    <div class="about-one__experience-count-box">
                                        <div class="about-one__experience-count">
                                            <h3 class="odometer" data-count="<?php echo $ogrt_say/1000;?>" >00</h3>
                                    <span >+bin</span>
                                        </div>
                                        <p>öğretmen</p>
                                    </div>
                                </div>
                                <div class="about-one__experience-box-shape"></div>
                            </div>
                        </div>
                        <div class="col-xl-6 col-lg-6 col-md-6">
                            <div class="about-one__experience-box">
                                <div class="about-one__experience-box-inner">
                                    <div class="about-one__experience-icon">
                                        <img src="web_files/images/myimgs/tecrube.png?v=1" height='60'alt="">
                                    </div>
                                    <div class="about-one__experience-count-box">
                                        <div class="about-one__experience-count">
                                            <h3 class="odometer" data-count="5">0</h3>
                                            <span>+</span>
                                            <p>Yıl</p>
                                        </div>
                                        <p>tecrübe </p>
                                    </div>
                                </div>
                                <div class="about-one__experience-box-shape"></div>
                            </div>
                            <div class="about-one__img-box-2">
                                <div class="about-one__img-2">
                                    <img src="web_files/images/myimgs/ogrt_kadin.jpg" alt="">
                                </div>
                                <div class="about-one__img-shape-1 float-bob-y">
                                    <img src="web_files/images/shapes/about-one-img-shape-1.png" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-6">
                <div class="about-one__right">
                    <div class="section-title text-left sec-title-animation animation-style2">
                        <h2 class="section-title__title title-animation">Öğretmen odaklı <span>gelişim <img src="web_files/images/shapes/section-title-shape-1.png"
                                    alt=""></span></h2>
                    </div>
                    <p class="about-one__text">Özellikle pandemi döneminde uzaktan eğitimin zorunlu olduğu süreçte öğretmenlerin iş yükünü azaltmak ve eğitimin kalitesini artırmak amacıyla geliştirilmiş bir yazılımdır. Yazılımımız ile öğretmenler ellerindeki kaynaklarını gerek PDF'ye çevirerek gerekse ekran görüntüsü alarak soru bankasını oluşturabilir. Her bir soruyu ünitesine, kazanımına göre etiketleyebilir, varsa çözüm videosunun linkini ekleyebilir. Sonrasında bir kaç tık ile ödevini oluşturup öğrenciye gönderebilir. Sonuçlar detaylı olarak raporlanır ve öğrencilerin nerede zayıf olduğu çok rahat bir şekilde tespit edebilir.</p>
                    <ul class="about-one__mission-and-vision list-unstyled">
                        <li>
                            <div class="about-one__icon-and-title">
                                <div class="about-one__icon">
                                    <img src="web_files/images/myimgs/misyon.png" height='60'alt="">
                                </div>
                                <h3>Misyonumuz</h3>
                            </div>
                            <p class="about-one__mission-and-vision-text">Öğrenciler, öğretmenler ve veliler için kaliteli ve erişilebilir dijital içerikler sunarak, etkileşimli bir öğrenme topluluğu oluşturmak.</p>
                        </li>
                        <li>
                            <div class="about-one__icon-and-title">
                                <div class="about-one__icon">
                                    <img src="web_files/images/myimgs/vizyon.png" height='60' alt="">
                                </div>
                                <h3>Vizyonumuz</h3>
                            </div>
                            <p class="about-one__mission-and-vision-text">Eğitimi sınıfın dışına taşıyan, katılımcı ve yenilikçi bir dijital platform olarak Türkiye'nin öncü eğitim ekosistemi olmak.</p>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- About One End -->


<!-- Hizmetler One Start -->
<section class="courses-one">
    <div class="container">
        <div class="section-title text-center sec-title-animation animation-style1">
            <h2 class="section-title__title title-animation">Hız kaliteyle <span>buluştu <img src="web_files/images/shapes/section-title-shape-1.png"
                                    alt=""></span></h2>
        </div>
        <div class="courses-one__carousel owl-theme owl-carousel">
            <!--Courses One Single Start-->
            <div class="item">
                <div class="courses-one__single">
                    <div class="courses-one__img-box">
                        <div class="courses-one__img">
                            <img src="web_files/images/myimgs/chatgpt.jpg" alt="">
                        </div>
                    </div>
                    <div class="courses-one__content">
                        
                        <h3 class="courses-one__title"><a href=course-details>ChatGPT</a></h3>
						   <div class="courses-one__tag">
                                <span>Öğretmenler</span>
								<p class='courses-one__meta'>istedikleri soruyu ChatGPT'ye detaylı olarak çözdürebilir.</p>
                           </div>
						   <div class="courses-one__tag ">
                                <span>Öğrenciler</span>
								<p class='courses-one__meta'>ödev değerlendirildikten sonra istedikleri soruları ChatGPT'ye çözdürebilir.</p>
                           </div>
                    </div>
                </div>
            </div>
            <!--Courses One Single End-->
            <!--Courses One Single Start-->
            <div class="item">
                <div class="courses-one__single">
                    <div class="courses-one__img-box">
                        <div class="courses-one__img">
                            <img src="web_files/images/myimgs/soru_girisi.jpg" alt="">
                        </div>
                    </div>
                    <div class="courses-one__content">
                        
                        <h3 class="courses-one__title"><a href=course-details>Soru Girişi</a></h3>
						   <div class="courses-one__tag">
                                <span>PDF'den Ekle</span>
								<p class='courses-one__meta'>PDF formatında testinizi açıp, sorunuzu kırparak hızlı bir şekilde girebilirsiniz</p>
                           </div>
						   <div class="courses-one__tag ">
                                <span>Editör'de Yaz</span>
								<p class='courses-one__meta'>JETödev editörünü kullanarak sorunuzu yazabilirsiniz.</p>
                           </div>
                    </div>
                </div>
            </div>
            <!--Courses One Single End-->
             <!--Courses One Single Start-->
            <div class="item">
                <div class="courses-one__single">
                    <div class="courses-one__img-box">
                        <div class="courses-one__img">
                            <img src="web_files/images/myimgs/youtube.jpg" alt="">
                        </div>
                    </div>
                    <div class="courses-one__content">
                        
                        <h3 class="courses-one__title"><a href=course-details>Çözüm Videosu</a></h3>
						   <div class="courses-one__tag">
                                <span>Öğretmenler</span>
								<p class='courses-one__meta'>soruların çözüm video bağlantısını her bir soruya ayrı ayrı ekleyebilir</p>
								<span>Öğrenciler</span>
								<p class='courses-one__meta'>ödev değerlendirildikten sonra çözüm videolarını izleyebilir</p>

                           </div>
						   
                    </div>
                </div>
            </div>
            <!--Courses One Single End-->
            <!--Courses One Single Start-->
            <div class="item">
                <div class="courses-one__single">
                    <div class="courses-one__img-box">
                        <div class="courses-one__img">
                            <img src="web_files/images/myimgs/zipgrade.jpg" alt="">
                        </div>
                    </div>
                    <div class="courses-one__content">
                        
                        <h3 class="courses-one__title"><a href=course-details>Çevrimdışı Uygulamalar</a></h3>
						   <div class="courses-one__tag">
                                <span>ZipGrade</span>
								<p class='courses-one__meta'>ZipGrade uygulaması ile ödevin cevaplarını sistemine aktarabilirsiniz</p>
								
                           </div>
						   <div class="courses-one__tag">
                                <span>OptikForm</span>
								<p class='courses-one__meta'>Kurumunuzun optik okuyucusu okuduğu cevapları sisteme aktarabilirsiniz</p>
								
                           </div>
                    </div>
                </div>
            </div>
            <!--Courses One Single End-->
            <!--Courses One Single Start-->
            <div class="item">
                <div class="courses-one__single">
                    <div class="courses-one__img-box">
                        <div class="courses-one__img">
                            <img src="web_files/images/myimgs/grafikler.jpg" alt="">
                        </div>
                    </div>
                    <div class="courses-one__content">
                        
                        <h3 class="courses-one__title"><a href=course-details>Başarıyı Artırmak</a></h3>
						  <div class="courses-one__tag">
                                <span>Detaylı Raporlama</span>
								<p class='courses-one__meta'>Öğrencilerin kazanım bazlı ödev raporları görsel olarak sunulur.</p>
								
                           </div>
						   <div class="courses-one__tag">
                                <span>Eksik Tamamlama Kitapçığı</span>
								<p class='courses-one__meta'>Her bir öğrenciye bireysel olarak eksik tamamlama kitapçığı oluşturulur.</p>
								
                           </div>
                    </div>
                </div>
            </div>
            <!--Courses One Single End-->
             <!--Courses One Single Start-->
            <div class="item">
                <div class="courses-one__single">
                    <div class="courses-one__img-box">
                        <div class="courses-one__img">
                            <img src="web_files/images/myimgs/hediye_puan.jpg" alt="">
                        </div>
                    </div>
                    <div class="courses-one__content">
                        
                        <h3 class="courses-one__title"><a href=course-details>Ücretsiz Kullanım</a></h3>
						  <div class="courses-one__tag">
                                <span>Puan Sistemi</span>
								<p class='courses-one__meta'>Öğretmenler paylaşımlı sorular ile hediye puan kazanır sistemi ücretsiz kullanabilir.</p>
								
                           </div>
						   <div class="courses-one__tag">
                                <span>Paylaşımın Gücü</span>
								<p class='courses-one__meta'>Her bir paylaşılan soru ile sistem güncel kalmakta ve büyümektedir.</p>
								
                           </div>
                    </div>
                </div>
            </div>
            <!--Courses One Single End-->
            
            
        </div>
    </div>
</section>
<!-- Hizmetler One End -->


<!-- Ekip One Start -->
<section class="video-one" style='padding-top:100px;padding-bottom:50px;'>
        <div class="section-title text-center sec-title-animation animation-style1">
            <br>
            <h2 class="section-title__title title-animation">JETödev ekibine <span><a href='https://forms.gle/bnLLCYJPxMWREvZY9' target='_blank'> katılın</a> <img src="web_files/images/shapes/section-title-shape-1.png"
                                    alt=""></span></h2>
        </div>
    <div class="video-one__shape-3 float-bob-y">
        <img src="web_files/images/shapes/video-one-shape-3.png" alt="">
    </div>
    <div class="video-one__shape-4 img-bounce">
        <img src="web_files/images/shapes/video-one-shape-4.png" alt="">
    </div>
    <div class="container">
        <div class="video-one__inner">
            <div class="video-one__shape-1"></div>
            <div class="video-one__shape-2 rotate-me"></div>
            <div class="video-one__img-box">
                <img src="web_files/images/myimgs/myvid.jpg" alt="">
                <div class="video-one__video-link">
                    <a href="https://www.youtube.com/watch?v=MtKQyckzFww" class="video-popup">
                        <div class="video-one__video-shape-1">
                            <img src="web_files/images/shapes/video-one-video-shape-1.png" alt="">
                        </div>
                        <div class="video-one__video-icon">
                            <span class="fa fa-play"></span>
                            <i class="ripple"></i>
                        </div>
                    </a>
                </div>
  
                <div class="video-one__live">
                    <div class="video-one__live-icon">
                        <span class="icon-wifi"></span>
                    </div>
                    <p class="video-one__live-text">Ekibe katılmak için <a href='https://forms.gle/bnLLCYJPxMWREvZY9' target='_blank'> <u>tıklayınız</a></u></p>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Ekip One End -->

<!-- İzleyerek öğrenelim One Start -->
<section class="category-one">
    <div class="category-one__bg-shape"
        style="background-image: url(web_files/images/shapes/category-one-bg-shape.png);"></div>
    <div class="category-one__shape-1">
        <img src="web_files/images/shapes/category-one-shape-1.png" alt="">
    </div>
    <div class="category-one__shape-2">
        <img src="web_files/images/shapes/category-one-shape-2.png" alt="">
    </div>
    <div class="category-one__shape-3">
        <img src="web_files/images/shapes/category-one-shape-3.png" alt="">
    </div>
    <div class="container">
        <div class="row">
            <div>
                <div class="category-one__left">
                    <div class="section-title text-left sec-title-animation animation-style2">
                        
                        <h2 class="section-title__title title-animation">İzleyerek <span>öğrenelim...<img src="web_files/images/shapes/section-title-shape-2.png"alt=""></span></h2>
                    </div>
                    <ul class="category-one__category-list list-unstyled">
                        <li>
                            <div class="category-one__count-and-arrow">
                                <div class="category-one__count-box">
                                    <div class="category-one__count"></div>
                                    <div class="category-one__count-content">
                                        <h3><a href='https://youtu.be/ZQESnxrxUgM'>Bankaya soru ekleme...</a></h3>
                                    </div>
                                </div>
                                <div class="category-one__count-arrow">
                                    <a href='https://youtu.be/ZQESnxrxUgM'<span
                                            class="icon-arrow-up-right-2"></span></a>
                                </div>
                            </div>
                            
                        </li>
                        <li>
                            <div class="category-one__count-and-arrow">
                                <div class="category-one__count-box">
                                    <div class="category-one__count"></div>
                                    <div class="category-one__count-content">
                                        <h3><a href='https://youtu.be/4uy5mIW6UmA'>Soru düzenleme</a></h3>
                                    </div>
                                </div>
                                <div class="category-one__count-arrow">
                                    <a href='https://youtu.be/4uy5mIW6UmA'<span
                                            class="icon-arrow-up-right-2"></span></a>
                                </div>
                            </div>
                            
                        </li>
                        <li>
                            <div class="category-one__count-and-arrow">
                                <div class="category-one__count-box">
                                    <div class="category-one__count"></div>
                                    <div class="category-one__count-content">
                                        <h3><a href='https://youtu.be/lkAAFsMOYyA'>Koda ödev gönderme...</a></h3>
                                       
                                    </div>
                                </div>
                                <div class="category-one__count-arrow">
                                    <a href='https://youtu.be/lkAAFsMOYyA'><span
                                            class="icon-arrow-up-right-2"></span></a>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="category-one__count-and-arrow">
                                <div class="category-one__count-box">
                                    <div class="category-one__count"></div>
                                    <div class="category-one__count-content">
                                        <h3><a href='ttps://youtu.be/XebXHNbHp2Y'>Sınıfa ödev gönderme...</a></h3>
                        
                                    </div>
                                </div>
                                <div class="category-one__count-arrow">
                                    <a href='https://youtu.be/XebXHNbHp2Y'><span
                                            class="icon-arrow-up-right-2"></span></a>
                                </div>
                            </div>
                        </li>  
						
						<li>
                            <div class="category-one__count-and-arrow">
                                <div class="category-one__count-box">
                                    <div class="category-one__count"></div>
                                    <div class="category-one__count-content">
                                        <h3><a href='https://youtu.be/WudAs5s4qd0'>Kendi müfredatını tanımla</a></h3>
                        
                                    </div>
                                </div>
                                <div class="category-one__count-arrow">
                                    <a href='https://youtu.be/WudAs5s4qd0'><span
                                            class="icon-arrow-up-right-2"></span></a>
                                </div>
                            </div>
                        </li>                       
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- İzleyerek öğrenelim One End -->



<!-- Site Footer Start -->
<footer class="site-footer">
    <div class="site-footer__shape-bg" style="background-image: url(web_files/images/shapes/site-footer-shape-bg.png);"></div>
    <div class="site-footer__bottom">
        <div class="container" style='text-align:center'>
            <div class="row" style='display:inline-block'>
                <div class="col-xl-12">
                    <div class="site-footer__bottom-inner">
                        <div class="site-footer__copyright">
                            <p class="site-footer__copyright-text">Copyright &copy; 2025 <a href="#">JetÖdev</a>. Tüm Hakları Saklıdır</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>

<!--Site Footer End-->
</div><!-- /.page-wrapper --><div class="mobile-nav__wrapper">
    <div class="mobile-nav__overlay mobile-nav__toggler"></div>
    <!-- /.mobile-nav__overlay -->
    <div class="mobile-nav__content">
        <span class="mobile-nav__close mobile-nav__toggler"><i class="fa fa-times"></i></span>

        <div class="logo-box">
            <a href="home" aria-label="logo image"><img src="data/imgs/logo_yazi_b.png" height="50" alt="" /></a>
        </div>
        <!-- /.logo-box -->
        <div class="mobile-nav__container"></div>
        <!-- /.mobile-nav__container -->

        <ul class="mobile-nav__contact list-unstyled">
            <li>
                <i class="fa fa-envelope"></i>
                <a href="mailto:hocalarburada.com.tr@gmail.com">hocalarburada.com.tr@gmail.com@gmail.com</a>
            </li>
        </ul><!-- /.mobile-nav__contact -->
        <div class="mobile-nav__top">
            <div class="mobile-nav__social">
                <a href="https://facebook.com/jetodev" class="fab fa-facebook-square"></a>
                <a href="https://facebook.com/hocalarburada.com.tr" class="fab fa-instagram"></a>
            </div><!-- /.mobile-nav__social -->
        </div><!-- /.mobile-nav__top -->

    </div>
    <!-- /.mobile-nav__content -->
</div>
<!-- /.mobile-nav__wrapper -->

<a href="#" data-target="html" class="scroll-to-target scroll-to-top">
    <span class="scroll-to-top__wrapper"><span class="scroll-to-top__inner"></span></span>
    <span class="scroll-to-top__text">Yukarı</span>
</a>    

    <!--Start Preloader-->
<div class="loader js-preloader">
    <div></div>
    <div></div>
    <div></div>
</div>
<!--End Preloader-->    <script src="web_files/js/jquery-3.6.0.min.js"></script>
<script src="web_files/js/bootstrap.bundle.min.js"></script>
<script src="web_files/js/jarallax.min.js"></script>
<script src="web_files/js/jquery.ajaxchimp.min.js"></script>
<script src="web_files/js/jquery.appear.min.js"></script>
<script src="web_files/js/swiper.min.js"></script>
<script src="web_files/js/jquery.magnific-popup.min.js"></script>
<script src="web_files/js/jquery.validate.min.js"></script>
<script src="web_files/js/odometer.min.js"></script>
<script src="web_files/js/wNumb.min.js"></script>
<script src="web_files/js/wow.js"></script>
<script src="web_files/js/isotope.js"></script>
<script src="web_files/js/owl.carousel.min.js"></script>
<script src="web_files/js/jquery-ui.js"></script>
<script src="web_files/js/jquery.nice-select.min.js"></script>
<script src="web_files/js/marquee.min.js"></script>
<script src="web_files/js/aos.js"></script>

<script src="web_files/js/gsap/gsap.js"></script>
<script src="web_files/js/gsap/ScrollTrigger.js"></script>
<script src="web_files/js/gsap/SplitText.js"></script>

<!-- template js -->
<script src="web_files/js/script.js"></script>
<?php 
  if(isset($_GET['odevkod'])){
	   $odevkod=$_GET['odevkod'];
	   echo "<script>location.href='https://hocalarburada.com.tr/apps/index.php?odevkod=$odevkod';</script>";
	  
   }
?>




</body>

</html>
