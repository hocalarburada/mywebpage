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
  require_once('apps/class/class.DB_items.php');
  require_once('apps/class/class.btn_item.php');
  $DB_Engine  = new hzlsnv_Database;
  $DB_items=new DB_items($DB_Engine);
  $databaseid=1;
  $seviyeler=$DB_items->seviyeler($databaseid);
  
  
  $sql="SELECT 
			 main.*,
			 seviye.ad as seviyead,
			 ders.ad as dersad,
			 CONCAT_WS(' ', yazar.ad, yazar.soyad) as yazar_adsoyad,
			 brans.ad as brans,
			 yazar.uniqid as yazar_uniqid,
			 yazar.cinsiyet,
			 yazar.picture_url,
			 (SELECT count(*) FROM paket_icerikler WHERE disable=0 AND paketid=main.id AND cesitid=4) as video_say,
			 (SELECT count(*) FROM paket_icerikler WHERE disable=0 AND paketid=main.id AND cesitid in (6,7,8,9)) as doc_say,
			 (SELECT count(*) FROM paket_icerikler WHERE disable=0 AND paketid=main.id AND cesitid in (2,3)) as sinav_say,
			 (SELECT count(*) FROM paket_icerikler WHERE disable=0 AND paketid=main.id AND cesitid=0) as grup_say,
			 (SELECT count(*) FROM paket_icerikler WHERE disable=0 AND paketid=main.id AND cesitid in (2,3) AND ucretli=0) as ucretsiz_sinav_say,
			 (SELECT count(*) FROM paket_aboneler as satis WHERE satis.paketid=main.id AND satis.SKT>=CURDATE()) as abone_say
		  FROM paketler as main
		  LEFT JOIN seviyeler as seviye ON seviye.id=main.seviyeid
		  LEFT JOIN dersler as ders ON ders.id=main.dersid 
		  LEFT JOIN kullanicilar as yazar ON yazar.id=main.yazarid
		  LEFT JOIN branslar as brans ON brans.id=yazar.brans
		  WHERE main.disable=0 AND
				main.onay=1
		  ORDER BY main.id DESC
		  LIMIT 0 ,50";
		$rs=$DB_Engine->RunQuery($sql);
		$paket_say=$rs['count'];
  	    $data=($rs['count']>0)?$rs['rows']:array();
        $paketler=new btn_item();
        $paketler->build_paketler($data,true,false); 
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
    <link rel='stylesheet' type='text/css' href='apps/css/metro.min.css?v=12'/>
    <link rel='stylesheet' type='text/css' href='apps/css/metro-colors.min.css' />
    <link rel='stylesheet' type='text/css' href='apps/css/metro-icons.css' />
    <link rel='stylesheet' type='text/css' href='apps/css/metro-responsive.min.css' />
    <link rel='stylesheet' type='text/css' href='apps/css/metro-rtl.min.css' />
    <link rel='stylesheet' type='text/css' href='apps/css/metro-schemes.min.css' /> 
    <link rel='stylesheet' type='text/css' href='apps/css/mystyles.css' /> 
	
    <link rel="stylesheet" href="apps/css/cards.css?v=5">
    <link rel="stylesheet" href="apps/css/filter.css?v=2">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
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
    <link rel="stylesheet" href="web_files/css/jquery-ui.css">
    <link rel="stylesheet" href="web_files/css/aos.css">


    <link rel="stylesheet" href="web_files/css/module-css/banner.css?v=1">
    <link rel="stylesheet" href="web_files/css/module-css/slider.css">
    <link rel="stylesheet" href="web_files/css/module-css/footer.css">
    <link rel="stylesheet" href="web_files/css/module-css/sliding-text.css">
    <link rel="stylesheet" href="web_files/css/module-css/category.css">
    <link rel="stylesheet" href="web_files/css/module-css/about.css?v=1">
    
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
    <link rel="stylesheet" href="web_files/css/style.css?v=38">
    <link rel="stylesheet" href="web_files/css/responsive.css?v=1">
    </head>
<body class="custom-cursor">
<div id='i00_container'>
    <div class="custom-cursor__cursor"></div>
    <div class="custom-cursor__cursor-two"></div>

    <div class="page-wrapper">
        <header class="main-header">
            <div class="main-menu__top">
                <div class="container">
                    <div class="main-menu__top-inner">
                        <ul class="list-unstyled main-menu__contact-list">
                            <li>
                                <div class="icon">
                                    <i class="icon-email"></i>
                                </div>
                                <div class="text">
                                    <p><a href="mailto:hocalarburada.com.tr@gmail.com">hocalarburada.com.tr@gmail.com</a>
                                    </p>
                                </div>
                            </li>                    
                        </ul>
                        <ul class="list-unstyled main-menu__contact-list main-menu__location">
                            <li>
                                <div class="icon">
                                    <i class="icon-location"></i>
                                </div>
                                <div class="text">
                                    <p>İstanbul, TÜRKİYE</p>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </header>

    <div class="stricky-header stricked-menu main-menu">
    <div class="sticky-header__content"></div><!-- /.sticky-header__content -->
</div><!-- /.stricky-header -->
<!-- Banner One Start -->
<section class="banner-one" style='padding-top:80px'>
    <div class="banner-one__bg-shape-1"
        style="background-image: url(web_files/images/myimgs/background7.jpg);"></div>
    <div class="banner-one__icon-1 img-bounce">
        <img src="web_files/images/icon/idea-bulb.png" alt="">
    </div>
    <div class="banner-one__icon-2 float-bob-x">
        <img src="web_files/images/icon/3d-alarm.png" alt="">
    </div>
    <div class="banner-one__icon-3 float-bob-y">
        <img src="web_files/images/icon/linke-icon.png" alt="">
    </div>
    <div class="banner-one__shape-4 float-bob-x">
        <img src="web_files/images/shapes/banner-one-shape-4.png" alt="">
    </div>
    <div class="container">
        <div class="row">
		    <a href=#><img class='mylogo' src="data/imgs/logo_yazi.png"alt=""></a>
            <div class="col-xl-6">
                <div class="banner-one__left" style='margin-top:20px'>
                    <div class="banner-one__title-box" >                
					    <div class="section-title__title  mycaption">Uzman hocalar burada...</div>
                    </div>
                    <p class="banner-one__text">Alanında uzman hocaların hazırladığı konu anlatımları, MEB'in yayınladığı sınav senaryolarını uygun deneme sınavları burada. Uygulanan deneme sınavları yapay zeka tarafından değerlendirsin ve eksikleriniz raporlansın. Böylece sınav öncesi tam hazırlığın rahatlığını yaşayın...</p>
                    <div class="banner-one__thm-and-other-btn-box" style='float:right'>
                        <div class="banner-one__btn-box">
                            <a href="more.php" class="thm-btn" style='width:150px;padding:10px 0;border: 2px solid orange;color:white'>Daha Fazla<span
                                    class="icon-angles-right" ></span></a>
                        </div>  
						<div class="about-one__btn-box" >
                            <a href="apps" class="thm-btn" style='width:150px;padding:10px 0;border: 2px solid aqua;color:white'>Giriş<span
                                    class="icon-angles-right" ></span></a>
                        </div>
						   					
                    </div>
                </div>
            </div>
            <div class="col-xl-6">
                <div class="banner-one__right">
                    <div class="banner-one__img-box">
                        <div class="banner-one__img">
                            <img src="web_files/images/resources/banner-two-img-1.png" alt="">
                            <div class="banner-one__img-shape-box rotate-me">
                                <div class="banner-one__img-shape-1">
                                    <div class="banner-one__img-shape-2"></div>
                                </div>
                                <div class="banner-one__shape-1">
                                    <img src="web_files/images/shapes/banner-one-shape-1.png" alt="">
                                </div>
                                <div class="banner-one__shape-2 rotate-me">
                                    <img src="web_files/images/shapes/banner-one-shape-2.png" alt="">
                                </div>
                                <div class="banner-one__shape-3">
                                    <img src="web_files/images/shapes/banner-one-shape-3.png" alt="">
                                </div>
                            </div>
                            
                            <div class="banner-one__student-trained">
                                <div class="banner-one__student-trained-shape-1 rotate-me">
                                    <img src="web_files/images/shapes/banner-one-student-trained-shape-1.png" alt="">
                                </div>
                                <ul class="list-unstyled banner-one__student-trained-list">
                                    <li>
                                        <div class="banner-one__student-trained-img">
                                            <img src="web_files/images/resources/banner-one-student-trained-img-1-1.jpg"
                                                alt="">
                                        </div>
                                    </li>
                                    <li>
                                        <div class="banner-one__student-trained-img">
                                            <img src="web_files/images/resources/banner-one-student-trained-img-1-2.jpg"
                                                alt="">
                                        </div>
                                    </li>
                                </ul>
                                <div class="banner-one__student-trained-count-box">
                                    <div class="banner-one__student-trained-count-box-inner count-box">
                                        <p class="count-text" data-stop="<?php echo $paket_say;?>" data-speed="100"></p>
                                        <span></span>
                                    </div>
                                    <p class="banner-one__student-trained-text">eğitim paketi</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
           </div>
</section>

<section id="about" class="about-one" style='padding-top: 0px;position: relative;z-index: 10;'>
    <div class="about-one__shape-1">
        <img src="web_files/images/shapes/about-one-shape-1.png" alt="">
    </div>
    <div class="about-one__shape-2">
        <img src="web_files/images/shapes/about-one-shape-2.png" alt="">
    </div>
	<div class="content-area">
		<div class="content-header">
			 <div class="accordion" data-role="accordion" style='width:100%;position:relative;'>
			    <div  class="input-control select" style='position:absolute;right: .5rem;z-index:10;top: .5rem;'>
				    <div id='siralama_lb' style='position:absolute;left: -78px;color: white;top: 8px;'><span class="mif-sort-desc icon" style='position: relative;right: -46px;top: -7px;font-size: 28px;'></span></div>
					<select id='siralamabox' onchange="$('#paketler_getir').click()">
						<option value=1 >En popüler</option>
						<option value=2 selected >En yeniler</option>
						<option value=3 >En ucuzlar</option>
						<option value=4 >En pahalılar</option>
					</select>
				</div>
				<div class="frame active">
					<div class="heading hide-before" style='font-size:1.5rem;padding-left:45px;'>Filtre<span class="mif-filter icon" style='position:absolute;left:5px;font-size: 2rem;margin-top: 6px;'></span></div>
					
					<div class="flex-grid demo-grid" style='background-color: #eee; padding: 10px;'>
						<div class="row">
							<div class="cell" style='flex: 0 0 33%;'>
							   		<div class="input-control select" style='width:100%'>
											<select id='seviyebox' style='background-color: white;color:gray'>
											    <option value=0>Tüm seviyeler</option>
											    <?php foreach ($seviyeler as $id => $seviye): ?>
                                                <option value="<?php echo $id; ?>"><?php echo $seviye; ?></option>
                                                <?php endforeach; ?>							
											</select>
									</div>								   
							</div>
							<div class="cell" style='flex: 0 0 33%;'>
							    <div class="input-control select" style='width:100%'>
											<select id='dersbox' onchange=" $('#paketler_getir').click()" style='background-color: white;color:gray'>
												<option value=0>Tüm dersler</option>
											</select>
								</div>									   							
							</div>
							<div class="cell" style='flex: 0 0 33%;'>
							    <div class="input-control text" data-role="input" style='width:100%'>
                                    <input id='anahtarbox' placeholder='Anahtar kelimeleri giriniz' type="text" style='width:100%;background-color:white;color: gray;'>
                                    <button id='paketler_getir'  class="button"><span class="mif-search"></span></button>
                                </div>
							</div>
						</div>
					</div>                
				</div>
			</div>    
		</div>	
		<!-- Course Grid -->
		<div id="havuz_paketler" class="course-grid" ><?php $paketler->display();?>
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
            <a href="home" aria-label="logo image"><img src="data/imgs/logo_yazi.png" height="50" alt="" /></a>
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
<!--End Preloader-->    
<script src="web_files/js/jquery-3.6.0.min.js"></script>
<script src='apps/js/metro.min3.0.15.js?v=1'></script>
<script src='apps/js/myutils.js?v=27'></script>
<script src='apps/js/mydialogs.js?v=214'></script>
<script src='apps/js/mysystem.js?v=1'></script>
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
<script src="web_files/js/script.js?v=1"></script>
<script>
   $('#seviyebox').change(function(){
       var p='dbid=1&ustid='+$('#seviyebox').val()+'&div=dersbox'; 
  	   EXEC(18,p,{'success':function(){	
                          $('#paketler_getir').click();				  
	                      if($('#seviyebox').val()>=0&&$('#dersbox option').length>1){
						     $('#dersbox option:first-child').html('Tüm dersler');
							 $('#dersbox').removeAttr('disabled');
						  }else{			
						     $('#dersbox').attr('disabled','true');
						  }
						 
	             }}       
	   );
   })
   $('#paketler_getir').click(function(){
	  let page=1;
	  var p='page='+page;
	      p+='&seviyeid=';		  
          p+=($('#seviyebox').val()>0)?$('#seviyebox').val():'0';
		  p+='&dersid=';
		  p+=($('#dersbox').val()>0)?$('#dersbox').val():'0';
		  p+='&anahtar=';
	      p+=($('#anahtarbox').val()!='')?$('#anahtarbox').val():'';
		  p+='&siralama='+$('#siralamabox').val();
	  LOAD(54,p,'havuz_paketler');	
   });
</script>
</div>
</body>

</html>
