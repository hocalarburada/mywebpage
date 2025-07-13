<?php	
  ini_set('display_errors',1);
  ini_set('display_startup_errors',1);
  error_reporting(-1);
  session_start();
  $_SESSION['langid']='tr';
  $og_url="https://hocalarburada.com.tr/index.php";
  $og_title="HocalarBurada";
  $og_desc="Uzman Hocalar Burada";
  $og_image="https://hocalarburada.com.tr/data/imgs/og.jpg"; 
  
  if(!isset($_GET['paketid'])||!is_numeric($_GET['paketid'])){
	  header('HTTP/1.1 400 Bad Request'); // Geçersiz istek durum kodu.
	  exit('Geçersiz işlem isteği.'); // Güvenli çıkış ve mesaj.
  }
  require_once($_SERVER['DOCUMENT_ROOT']."apps/class/class.db.php");
  require_once($_SERVER['DOCUMENT_ROOT']."apps/class/class.PaketAgaci.php");
  require_once($_SERVER['DOCUMENT_ROOT']."apps/funcs/utils.php");
   
  $DB_Engine  = new hzlsnv_Database;
  $paketAgaci = new PaketAgaci($DB_Engine);
  
  $paketid    =$_GET['paketid'];
  $sql="SELECT 
			 main.*,
			 seviye.ad as seviyead,
			 ders.ad as dersad,
			 CONCAT_WS(' ', yazar.ad, yazar.soyad) as yazar_adsoyad,
			 brans.ad as brans,
			 yazar.uniqid as yazar_uniqid,
			 yazar.cinsiyet,
			 yazar.picture_url,
			 (SELECT count(*) FROM paket_icerikler WHERE disable=0 AND paketid=main.id AND cesitid=2) as video_say,
			 (SELECT count(*) FROM paket_icerikler WHERE disable=0 AND paketid=main.id AND cesitid in (3,4)) as doc_say,
			 (SELECT count(*) FROM paket_icerikler WHERE disable=0 AND paketid=main.id AND cesitid=5) as sinav_say,
			 (SELECT count(*) FROM paket_icerikler WHERE disable=0 AND paketid=main.id AND cesitid=6) as grup_say,
			 (SELECT count(*) FROM paket_icerikler WHERE disable=0 AND paketid=main.id AND cesitid=5 AND ucretli=0) as ucretsiz_sinav_say,
			 (SELECT count(*) FROM paket_aboneler as satis WHERE satis.paketid=main.id AND satis.SKT>=CURDATE()) as abone_say
		  FROM paketler as main
		  LEFT JOIN seviyeler as seviye ON seviye.id=main.seviyeid
		  LEFT JOIN dersler as ders ON ders.id=main.dersid 
		  LEFT JOIN kullanicilar as yazar ON yazar.id=main.yazarid
		  LEFT JOIN branslar as brans ON brans.id=yazar.brans
		  WHERE main.id=$paketid AND
		        main.onay=1
		  ";
  $rs=$DB_Engine->RunQuery($sql);
  $data=$rs['rows'][0];
  $jpegfile=$_SERVER['DOCUMENT_ROOT']."data/paketler/".$data['uniqid']."_[$paketid]_img.jpg";
  $baslik  =$data['baslik'];
  $aciklama=$data['aciklama'];
  $src=path2url($jpegfile);
  
  
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

     
	 <link rel='stylesheet' type='text/css' href='apps/css/metro.min.css?v=12'/>
     <link rel='stylesheet' type='text/css' href='apps/css/metro-colors.min.css' />
     <link rel='stylesheet' type='text/css' href='apps/css/metro-icons.css?v=4' />
     <link rel='stylesheet' type='text/css' href='apps/css/metro-responsive.min.css' />
     <link rel='stylesheet' type='text/css' href='apps/css/metro-rtl.min.css' />
     <link rel='stylesheet' type='text/css' href='apps/css/metro-schemes.min.css' />
	 <link rel='stylesheet' type='text/css' href='apps/css/tinymce-editor.css?v=1.4.4'/>
	 
	 
	 <link rel='stylesheet' type='text/css' href='apps/css/mystyles.css?v=483'/>        
	 <link rel='stylesheet' type='text/css' href='apps/css/star-rating-svg.css' />
	 <link rel='stylesheet' type='text/css' href='apps/css/class.posts.css?v=11' />
	 <link rel='stylesheet' type='text/css' href='apps/css/class.exam.css?v=10' />
	 <link rel='stylesheet' type='text/css' href='apps/css/cards.css?v=12' />
	 
	 <link rel='stylesheet' type='text/css' href='apps/css/myresponsive.css?v=1.3.9' />
     <link rel='stylesheet' type='text/css' href='apps/css/literallycanvas.css?v=1.0.0' />
	 <link rel='stylesheet' type='text/css' href='apps/css/style.css?v=20'/>
	 <link rel='stylesheet' type='text/css' href='apps/js/cropper/cropper.min.css?v=5'/>
	 <link rel='stylesheet' type='text/css' href='apps/css/onesignal.min.css'/>
	 
	 <link rel='stylesheet' type='text/css' href="apps/css/lightbox.min.css">
     <link rel="stylesheet" type="text/css" href="apps/css/addtohomescreen.css">
	 <link rel='stylesheet' type='text/css' href='apps/css/datatables.min.css' />
	 <link rel='stylesheet' type='text/css' href='apps/css/viewer.min.css?v=2' />
	 <link rel='stylesheet' type='text/css' href='apps/css/prices.css' />
	 <link rel='stylesheet' type='text/css' href='apps/css/responsiveslides.css' />
	 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/apps/css/all.min.css">
	 
	 
	 
	 
	 
 
	 <script type='text/javascript' src='../languages/<?php echo $langid;?>.js?v=7'></script>
	 <script type='text/javascript' src="apps/js/jquery-2.1.4.min.js"></script>
	 
	 <script type='text/javascript' src='apps/js/jquery.flip.min.js'></script>
	 <script type='text/javascript' src='apps/js/responsiveslides.min.js'></script>
     <script type='text/javascript' src='apps/js/maskedinput.min.js'></script>
     <script type='text/javascript' src='apps/js/jquery.bbslider.min.js'></script>
     <script type='text/javascript' src='apps/js/jquery.star-rating-svg.js'></script>
     <script type='text/javascript' src='apps/js/jquery.balloon.min.js?v=1'></script>
     <script type='text/javascript' src='apps/js/myutils.js?v=27'></script>
     <script type='text/javascript' src='apps/js/myload_content.js?v=6'></script>
     <script type='text/javascript' src='apps/js/myvariables.js?v=1.0.2'></script>
	 <script type='text/javascript' src='apps/js/check.js?v=1.1.9'></script>
	 <script type='text/javascript' src='apps/js/Chart.min.js'></script>
	 <script type='text/javascript' src='apps/js/metro.min3.0.15.js?v=1'></script>
	 <script type='text/javascript' src='apps/js/ai_utils.js?v=65'></script>
	 <script type='text/javascript' src='apps/js/mydialogs.js?v=214'></script>
	 <script type="text/javascript" src='apps/js/mysystem.js?v=92'></script>
	 <script type='text/javascript' src='apps/js/pure-swipe.js'></script>
	 <script type='text/javascript' src='apps/js/datatables.min.js'></script>
	 <script type='text/javascript' src="apps/js/addtohomescreen.min.js?v=1.1.0"></script>
     <script type='text/javascript' src="apps/js/viewer.min.js"></script>
     <script type='text/javascript' src="apps/js/jquery-viewer.min.js"></script>
	 <script type='text/javascript' src="apps/js/lightbox.js"></script>
	 <script type='text/javascript' src="apps/js/rolldate.min.js"></script>
	 
	 







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
                                <a href="https://hocalarburada.com.tr"><img src="data/imgs/logo_yazi_parlak.png" style='height:45px'></a>
                            </li>                    
                        </ul>
                        <ul class="list-unstyled main-menu__contact-list main-menu__location">
                            <li>
                                <div class="about-one__btn-box">
                                   <a href="apps" class="thm-btn" style="width:100%;border: 2px solid aqua;color:white">Giriş<span class="icon-angles-right"></span></a>
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
<section id='about' class="about-one" style='padding-top:65px'>
    <div class="about-one__shape-1">
        <img src="web_files/images/shapes/about-one-shape-1.png" alt="">
    </div>
    <div class="about-one__shape-2">
        <img src="web_files/images/shapes/about-one-shape-2.png" alt="">
    </div>
    <div class="container">
		<div class='course-content-container' style='background-color:white;width:100%;margin:0 auto;max-width:800px;position:relative;'>
			 <div id='content-header' class='course-thumbnail' style='height:240px'>
				<img src='<?php echo $src;?>' style='width:100%;height:240px;object-fit: cover;'>    
				<div class="duration-badge"><h3 style='text-align:left;color:aqua'><?php echo $baslik;?></h3><h4 style='color:white'><?php echo $aciklama;?></h4></div>
			 </div>
			 <div id='content-body' style='position:relative;background-color:#eeefff'>
				<?php echo $paketAgaci->renderTreeHtml($paketid,true);?>
			 </div>
		</div>	
    </div>
</section>

<!-- Site Footer Start -->
<footer class="site-footer">
    <div class="site-footer__shape-bg" style="background-image: url(web_files/images/shapes/site-footer-shape-bg.png);"></div>
    <div class="site-footer__bottom">
        <div class="container" style='text-align:center'>
            <div class="row" style='display:inline-block'>
                <div class="col-xl-12">
                    <div class="site-footer__bottom-inner">
                        <div class="site-footer__copyright">
                            <p class="site-footer__copyright-text">Copyright &copy; 2025 <a href="#">HocalarBurada</a>. Tüm Hakları Saklıdır</p>
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
            <a href="home" aria-label="logo image"><img src="data/imgs/logo_yazi_parlak.png" height="50" alt="" /></a>
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
