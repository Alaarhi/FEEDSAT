<?php include 'dbConnection.php';?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="favicon.php">

    <title>Medical-Link :: Premium Medical Template</title>

    <link href="bootstrap3/css/bootstrap.css" rel="stylesheet">

    <!-- main css -->
    <link href="css/master.css" rel="stylesheet">

    <!-- mobile css -->
    <link href="css/responsive.css" rel="stylesheet">

    <!-- FontAwesome Support -->
    <link rel="stylesheet" type="text/css" href="css/fontawesome/font-awesome.min.css" />
    <!-- FontAwesome Support -->

    <!-- Superfish menu -->
    <link rel="stylesheet" type="text/css" href="css/superfish/superfish.css" />
    <!-- Superfish menu -->

    <!-- Theme Color selector -->
    <link href="js/theme-color-selector/theme-color-selector.css" type="text/css" rel="stylesheet">
    <!-- Theme Color selector -->

    <!-- Owl Carousel -->
    <link rel="stylesheet" type="text/css" href="js/owl-carousel/owl.carousel.css" />
    <!-- Owl Carousel -->

    <!-- Typicons -->
    <link rel="stylesheet" type="text/css" href="css/typicons/typicons.min.css" />
    <!-- Typicons -->

    <!-- WOW animations -->
    <link rel="stylesheet" type="text/css" href="js/wow/css/libs/animate.css" />
    <!-- WOW animations -->

    <!-- Pulse Slider -->
    <link rel="stylesheet" type="text/css" href="js/pulse/pm-slider.css" />
    <!-- Pulse Slider -->

    <!-- MeanMenu (mobile) -->
    <link rel="stylesheet" type="text/css" href="js/meanmenu/meanmenu.css" />
    <!-- MeanMenu (mobile) -->

    <!-- Flexslider -->
    <link rel="stylesheet" type="text/css" href="js/flexslider/flexslider-post.css" />
    <!-- Flexslider -->

    <!-- PrettyPhoto -->
    <link rel="stylesheet" type="text/css" href="js/prettyphoto/css/prettyPhoto.css" />
    <!-- PrettyPhoto -->

    <!-- jQuery UI -->
    <link rel="stylesheet" type="text/css" href="css/jquery-ui/jquery-ui.css" />
    <!-- jQuery UI -->

    <!-- Development Google Fonts -->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300italic,300,400italic,600,600italic,700,700italic,800,800italic%7COpen+Sans+Condensed:300,300italic,700%7CRaleway:400,200,300,100,600,500,700,800,900%7COswald:400,300,700%7CRoboto:400,100,100italic,300,300italic,400italic,500,500italic,700,700italic,900,900italic%7CRoboto+Condensed:400,300,300italic,400italic,700,700italic%7CRoboto+Slab:400,100,300,700%7CLato:400,100,100italic,300,300italic,400italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>
    <!-- Development Google Fonts -->

  </head>

  <body>

  <!-- Theme color selector -->
  
    <!-- Theme color selector -->


	<div id="pm_layout_wrapper" class="pm-full-mode"><!-- Use wrapper for wide or boxed mode -->

    	<!-- Sub-Menu -->

        <!-- Request appointment form -->
        <div class="pm-request-appointment-form" id="pm-appointment-form">

            <div class="container">
            	<div class="row">

                    <form action="#" method="post">
                        <div class="col-lg-4 col-md-4 col-sm-6">
                        	<input name="" type="text" class="pm-request-appointment-form-textfield" placeholder="Full Name">
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-6">
                        	<input name="" type="email" class="pm-request-appointment-form-textfield" placeholder="Email Address">
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-6">
                        	<input name="" type="email" class="pm-request-appointment-form-textfield" placeholder="Phone Number">
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6">
                        	<input name="" class="pm-request-appointment-form-textfield appointment-form-datepicker" type="text" placeholder="Date of Appointment" id="datepicker">
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12">
                        	<input name="" class="pm-request-appointment-form-textfield appointment-form-datepicker" type="text" placeholder="Time of Appointment (ex. 10:30am)">
                        </div>
                        <div class="col-lg-12 pm-clear-element" style="padding-top:20px;">
                        	<input type="submit" value="Submit Request" class="pm-square-btn appointment-form" />
                            <p class="pm-appointment-form-notice">All fields are required.</p><a href="#" class="pm-appointment-form-close" id="pm-close-appointment-form"><i class="fa fa-close"></i> Close Appointment form</a>
                        </div>

                    </form>

                </div>
            </div>

        </div>
        <!-- Request appointment form end -->

    	<!-- Header area -->
        <header>

        	<div class="container">

            	<div class="row">

                	<div class="col-lg-4 col-md-4 col-sm-12">

                    	 <div class="pm-header-logo-container">
                            <a href="index.php"><img src="img/Medical-Link.jpg" class="img-responsive pm-header-logo" alt="Medical-Link Template"></a>
                        </div>

                    </div>

                    <div class="col-lg-8 col-md-8 col-sm-12">
                        <ul class="pm-search-container">
                        	<li>
                            	<div class="pm-search-field-container">
                                	<a href="#" class="fa fa-search"></a>
                                	<form action="#" method="post">
                                    	<input name="pm-search-field" class="pm-search-field" type="text" placeholder="Rechercher un prof...">
                                    </form>
                                </div>
                            </li>
                            <li>
                            	<div class="pm-dropdown pm-categories-menu">
                                    <div class="pm-dropmenu">
                                        <p class="pm-menu-title">Filtrer par département</p>
                                        <i class="fa fa-angle-down"></i>
                                    </div>
                                    <div class="pm-dropmenu-active">
                                        <ul>
                                           <li><a href="news.php">Département 1</a></li>
                                           <li><a href="news.php">Département 2</a></li>
                                           <li><a href="news.php">Département 3</a></li>
                                           <li><a href="news.php">Département 4</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </li>
                        </ul>

                    </div>

                </div>

            </div>

        </header>
        <!-- /Header area end -->

        <!-- Navigation area -->
        <div class="pm-nav-container">

        	<div class="container">

                <div class="row">

                    <div class="col-lg-10 col-md-10 col-sm-12">

                        <nav class="navbar-collapse collapse" id="pm-main-navigation">

                            <ul class="sf-menu pm-nav">

                        		<li><a href="index.php" class="fa fa-home" id="pm-home-btn"></a></li>
                                <li>
                                	<a href="profs.php">Liste des enseignants</a>
                                    <ul>
                                        <li><a href="medical-staff.php">Département 1</a></li>
                                        <li><a href="medical-staff.php">Département 2</a></li>
                                        <li><a href="medical-staff.php">Département 3</a></li>
                                        <li><a href="medical-staff.php">Département 4</a></li>
                                        <li><a href="medical-staff.php">Département 5</a></li>

                                    </ul>
                                </li>
                              
                                <li><a href="avis.php">Avis de mes collègues</a></li>

                            </ul>

                        </nav>

                    </div>

                    <div class="col-lg-2 col-md-2 col-sm-12 pm-main-menu">

                        

                    </div>

                </div>

            </div>

        </div>
        <!-- Navigation area end -->

        <!-- SLIDER AREA -->

        <div class="pm-pulse-container" id="pm-pulse-container">

            <div id="pm-pulse-loader">
                <img src="js/pulse/img/ajax-loader.gif" alt="Slider Loading" />
            </div>

            <div id="pm-slider" class="pm-slider">

                <div id="pm-slider-progress-bar"></div>

                <ul class="pm-slides-container" id="pm_slides_container">

                    <!-- FULL WIDTH slides -->
                    <li data-thumb="" class="pmslide_0"><img src="img/home/insatbirds2.jpg" alt="img01" />


                            <div class="pm-holder">
                                <div class="pm-caption">
                                      <h1>L'INSAT EST UN JOYAU</h1>
                                      <span class="pm-caption-decription">
                                        La préserver est notre devoir
                                      </span>
                                      <span class="pm-caption-excerpt">
                                        <b>Un espace de feedbacks et de critiques constructifs </b>
                                      </span>
                                      <a href="services.php" class="pm-slide-btn">Plus <i class="fa fa-plus"></i></a>
                                </div>
                            </div>


                    </li>

                    <li data-thumb="" class="pmslide_1"><img src="img/home/purple.jpg" alt="img02" />


                        	<div class="pm-holder">
                                <div class="pm-caption">
                                      <h1>Leading the way</h1>
                                      <span class="pm-caption-decription">
                                        in research and development
                                      </span>
                                      <span class="pm-caption-excerpt">
                                        Medical-Link provides many great features like a custom slider and a medical appointment form.
                                      </span>
                                      <a href="services.php" class="pm-slide-btn">learn more <i class="fa fa-plus"></i></a>
                                </div>
                            </div>


                    </li>

                    <li data-thumb="" class="pmslide_2"><img src="img/home/purple.jpg" alt="img02" />


                        	<div class="pm-holder">
                                <div class="pm-caption">
                                      <h1>A friendly staff</h1>
                                      <span class="pm-caption-decription">
                                        for a comfortable experience
                                      </span>
                                      <span class="pm-caption-excerpt">
                                        Pulsar Media is always around to answer your questions or help solve your technical issues.
                                      </span>
                                      <a href="medical-staff.php" class="pm-slide-btn">meet our staff <i class="fa fa-plus"></i></a>
                                </div>
                            </div>


                    </li>

                </ul>

            </div>

        </div>

 		<!-- SLIDER AREA end -->

        <!-- BODY CONTENT starts here -->

       	<!-- PANEL 1 -->
        <div class="container pm-containerPadding-top-100 pm-containerPadding-bottom-90">
        	<div class="row">
            <div class="col-lg-12 pm-center pm-containerPadding-bottom-0">

                  <h5> F E E D S A T &nbsp;&nbsp;&nbsp; A W A R D S </h5>
                  <div class="pm-column-title-divider">
                    <img height="29" width="29" src="img/divider-icon.png" alt="icon">
                    <br><br>
                  </div>

              </div>

            	<!-- Column 1 -->
                <div class="col-lg-4 col-md-4 col-sm-12 pm-center pm-columnPadding-30 pm-column-spacing wow fadeInUp animated" data-wow-delay="0.3s" data-wow-offset="50" data-wow-duration="1s">

                	<a href="#" class="fa fa-hand-o-up pm-icon-btn"></a>

                    <h6 class="pm-column-title">Dr Wided Miled</h6>
                    <h7 class="pm-column-subtitle">Le enseignant avec le plus de feedback positif</h7>

                    <div class="pm-title-divider"></div>

                    <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.</p>

                    <a href="#" class="pm-standard-link">consulter ce profil <i class="fa fa-plus"></i></a>

                </div>
                <!-- Column 1 end -->

                <!-- Column 2 -->
                <div class="col-lg-4 col-md-4 col-sm-12 pm-center pm-columnPadding-30 pm-column-spacing wow fadeInUp animated
" data-wow-delay="0.6s" data-wow-offset="50" data-wow-duration="1s">

                    <a href="#" class="fa fa-hand-o-down pm-icon-btn"></a>

                    <h6 class="pm-column-title">Dr. Khalil Chebil</h6>
                    <h7 class="pm-column-subtitle">Le enseignant avec le plus de feedback négatif</h7>

                    <div class="pm-title-divider"></div>

                    <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.</p>

                    <a href="#" class="pm-standard-link">consulter ce profil<i class="fa fa-plus"></i></a>

                </div>
                <!-- Column 2 end -->

                <!-- Column 3 -->
                <div class="col-lg-4 col-md-4 col-sm-12 pm-center pm-columnPadding-30 wow fadeInUp animated
" data-wow-delay="0.9s" data-wow-offset="50" data-wow-duration="1s">

                    <a href="#" class="fa fa-fire pm-icon-btn"></a>

                    <h6 class="pm-column-title">Dr. Mouhamed Ali Maaref</h6>
                    <h7 class="pm-column-subtitle">Le enseignant avec le plus de feeddback</h7>

                    <div class="pm-title-divider"></div>

                    <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.</p>

                    <a href="#" class="pm-standard-link">consulter ce profil<i class="fa fa-plus"></i></a>

                </div>
                <!-- Column 3 end -->

            </div>
        </div>
        <!-- PANEL 1 end -->

        <!-- PANEL 4 -->
        <div class="pm-column-container testimonials pm-parallax-panel" style="background-color:#A34DE9; background-image:url(img/home/purple.jpg);  background-repeat:repeat-y;" data-stellar-background-ratio="0.5" data-stellar-vertical-offset="-20">

          <!-- Column message -->
        	<div class="pm-column-container-message">
            	<p><strong>Le saviez-vous?</strong> Nous mesurons le niveau de satisfaction des différentes filières</p>
            </div>
            <!-- Column message end -->


          <div class="container pm-containerPadding-top-40 pm-containerPadding-bottom-80">
              <div class="row">

                <div class="col-lg-12 col-md-12">
                  <h4 class="light">Quelle filière est la plus satisafaite de ses enseignants?</h4>
                    <div class="pm-divider light"></div>
                    <br />
                </div>

                <div class="col-lg-5 col-md-5">
                      <!-- Progress bar -->
                      <div class="pm-progress-bar-description" id="pm-progress-bar-desc-1">
                          1er Cycle (MPI)
                          <div class="pm-progress-bar-diamond"></div>
                          <span>42%</span>
                      </div>
                      <div class="pm-progress-bar">
                          <span data-width="42" class="pm-progress-bar-outer" id="pm-progress-bar-1">
                              <span class="pm-progress-bar-inner"></span>
                          </span>
                      </div>
                      <!-- Progress bar end -->

                      <!-- Progress bar -->
                      <div class="pm-progress-bar-description" id="pm-progress-bar-desc-2">
                          Génie Logiciel (GL)
                          <div class="pm-progress-bar-diamond"></div>
                          <span>89%</span>
                      </div>
                      <div class="pm-progress-bar">
                          <span data-width="89" class="pm-progress-bar-outer" id="pm-progress-bar-2">
                              <span class="pm-progress-bar-inner"></span>
                          </span>
                      </div>
                      <!-- Progress bar end -->

                      <!-- Progress bar -->
                      <div class="pm-progress-bar-description" id="pm-progress-bar-desc-3">
                          Informtique Industrielle Automatique (IIA)
                          <div class="pm-progress-bar-diamond"></div>
                          <span>75%</span>
                      </div>
                      <div class="pm-progress-bar">
                          <span data-width="75" class="pm-progress-bar-outer" id="pm-progress-bar-3">
                              <span class="pm-progress-bar-inner"></span>
                          </span>
                      </div>
                      <!-- Progress bar end -->

                      <!-- Progress bar -->
                      <div class="pm-progress-bar-description" id="pm-progress-bar-desc-4">
                          Chimie Industrielle (CH)
                          <div class="pm-progress-bar-diamond"></div>
                          <span>60%</span>
                      </div>
                      <div class="pm-progress-bar">
                          <span data-width="60" class="pm-progress-bar-outer" id="pm-progress-bar-4">
                              <span class="pm-progress-bar-inner"></span>
                          </span>
                      </div>
                      <!-- Progress bar end -->

                  </div>

                  <div class="col-lg-2 col-md-2"></div>
                  <div class="col-lg-5 col-md-5">
                      <!--<h4 class="light">Our core strengths</h4>
                        <div class="pm-divider light"></div>
                        <br />-->

                        <!-- Progress bar -->
                        <div class="pm-progress-bar-description" id="pm-progress-bar-desc-5">
                            1er Cycle (CBA)
                            <div class="pm-progress-bar-diamond"></div>
                            <span>75%</span>
                        </div>
                        <div class="pm-progress-bar">
                            <span data-width="75" class="pm-progress-bar-outer" id="pm-progress-bar-5">
                                <span class="pm-progress-bar-inner"></span>
                            </span>
                        </div>
                        <!-- Progress bar end -->

                        <!-- Progress bar -->
                        <div class="pm-progress-bar-description" id="pm-progress-bar-desc-6">
                            Réseaux Informatiques et Télécommunications (RT)
                            <div class="pm-progress-bar-diamond"></div>
                            <span>36%</span>
                        </div>
                        <div class="pm-progress-bar">
                            <span data-width="36" class="pm-progress-bar-outer" id="pm-progress-bar-6">
                                <span class="pm-progress-bar-inner"></span>
                            </span>
                        </div>
                        <!-- Progress bar end -->

                        <!-- Progress bar -->
                        <div class="pm-progress-bar-description" id="pm-progress-bar-desc-7">
                            Informatiques et Mainenance Industrielle (IMI)
                            <div class="pm-progress-bar-diamond"></div>
                            <span>23%</span>
                        </div>
                        <div class="pm-progress-bar">
                            <span data-width="23" class="pm-progress-bar-outer" id="pm-progress-bar-7">
                                <span class="pm-progress-bar-inner"></span>
                            </span>
                        </div>
                        <!-- Progress bar end -->

                        <!-- Progress bar -->
                        <div class="pm-progress-bar-description" id="pm-progress-bar-desc-8">
                            Biologie Industrielle (BIO)
                            <div class="pm-progress-bar-diamond"></div>
                            <span>50%</span>
                        </div>
                        <div class="pm-progress-bar">
                            <span data-width="50" class="pm-progress-bar-outer" id="pm-progress-bar-8">
                                <span class="pm-progress-bar-inner"></span>
                            </span>
                        </div>
                        <!-- Progress bar end -->

                    </div>
                  </div><!-- /.row -->
            </div><!-- /.container -->

        </div>
        <!-- PANEL 4 end -->

        <!-- PANEL 3 -->
        <div class="container pm-containerPadding-top-70 pm-containerPadding-bottom-60">

          <div class="row">
              <div class="col-lg-12 pm-columnPadding30 pm-center">

                    <h5>FEEDSAT EN CHIFFRES</h5>
                    <div class="pm-column-title-divider">
                      <img height="29" width="29" src="img/divider-icon.png" alt="icon">
                      <br>
                    </div>

                </div>
            </div>

          <div class="row">

              <div class="col-lg-3 col-md-6 col-sm-6 desktop pm-center pm-columnPadding-30 pm-column-spacing">

                    <p class="typcn typcn-group pm-static-icon"></p>

                    <!-- milestone -->
                    <div class="milestone">
                        <div class="milestone-content">
                            <span data-speed="2000" data-stop="1789" class="milestone-value"></span>
                            <div class="milestone-description">Fedbacks</div>
                        </div>
                    </div>
                    <!-- milestone end -->

                </div>

                <div class="col-lg-3 col-md-6 col-sm-6 desktop pm-center pm-columnPadding-30 pm-column-spacing">

                    <p class="fa fa-comment-o pm-static-icon"></p>

                    <!-- milestone -->
                    <div class="milestone">
                        <div class="milestone-content">
                            <span data-speed="2000" data-stop="548" class="milestone-value"></span>
                            <div class="milestone-description">Commentaires</div>
                        </div>
                    </div>
                    <!-- milestone end -->

                </div>

                <div class="col-lg-3 col-md-6 col-sm-6 desktop pm-center pm-columnPadding-30 pm-column-spacing">

                    <p class="fa fa-thumbs-o-up pm-static-icon"></p>

                    <!-- milestone -->
                    <div class="milestone">
                        <div class="milestone-content">
                            <span data-speed="2000" data-stop="3490" class="milestone-value"></span>
                            <div class="milestone-description">Interactions</div>
                        </div>
                    </div>
                    <!-- milestone end -->

                </div>

                <div class="col-lg-3 col-md-6 col-sm-6 desktop pm-center pm-columnPadding-30 pm-column-spacing">

                    <p class="fa fa-line-chart pm-static-icon"></p>

                    <!-- milestone -->
                    <div class="milestone">
                        <div class="milestone-content">
                            <span data-speed="2000" data-stop="439" class="milestone-value"></span>
                            <div class="milestone-description">Taux de participation</div>
                        </div>
                    </div>
                    <!-- milestone end -->

                </div>

            </div>

        </div>
        <!-- PANEL 3 end -->

        <!-- PANEL 6 -->
        <div class="pm-column-container testimonials pm-parallax-panel" style="background-color:#A34DE9; background-image:url(img/home/purple.jpg); background-repeat:repeat-y;" data-stellar-background-ratio="0.5" data-stellar-vertical-offset="0">

            <div class="container pm-containerPadding100">
            	<div class="row">

                	<div class="col-lg-12 pm-center">
                    	<h5 class="light">TOP COMMENTAIRES EN CE MOMENT</h5>
                    </div>

                	<div class="pm-testimonials-carousel" id="pm-testimonials-carousel">

                    	<ul class="pm-testimonial-items">
                        	<li>
                                <div class="pm-testimonial-img" style="background-image:url(img/information/hamza.jpg);">
                                	<!--<div class="pm-testimonial-img-icon">
                                    	<img src="img/home/post-icon.jpg" class="img-responsive pm-center-align" alt="icon">
                                    </div>-->
                                </div>
                                <p class="pm-testimonial-name">Hamza Gaaliche</p>
                                <p class="pm-testimonial-title">RT 4</p>
                                <div class="pm-testimonial-divider"></div>
                                <p class="pm-testimonial-quote">Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam quis nostrud exerci tation.</p>
                            </li>
                            <li>
                                <div class="pm-testimonial-img" style="background-image:url(img/information/abir.jpg);">
                                </div>
                                <p class="pm-testimonial-name">Abir Messaoudi</p>
                                <p class="pm-testimonial-title">CBA</p>
                                <div class="pm-testimonial-divider"></div>
                                <p class="pm-testimonial-quote">Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam quis nostrud exerci tation.</p>
                            </li>
                            <li>
                                <div class="pm-testimonial-img" style="background-image:url(img/information/ala.jpg);">
                                </div>
                                <p class="pm-testimonial-name">Alàa Riahi</p>
                                <p class="pm-testimonial-title">GL 2</p>
                                <div class="pm-testimonial-divider"></div>
                                <p class="pm-testimonial-quote">Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam quis nostrud exerci tation.</p>
                            </li>
                        </ul>

                    </div>

                </div>
            </div>

        </div>
        <!-- PANEL 6 end -->

        <!-- PANEL 5  -->
        
               
                <!-- Column 3 end -->

        

        
           

        </div>
        <!-- PANEL 5 end -->

        <!-- PANEL 2 -->
      
        <!-- PANEL 2 end -->

        <!-- PANEL 7 -->
        <!--<div class="container pm-containerPadding-top-100 pm-containerPadding-bottom-120">
        </div>-->
        <!-- PANEL 7 end -->

        <!-- BODY CONTENT end -->

        <div class="pm-fat-footer pm-parallax-panel" data-stellar-background-ratio="0.5">

            <div class="container">
                <div class="row">

                    <div class="col-lg-3 col-md-3 col-sm-12 pm-widget-footer">

                    	<h6 class="pm-fat-footer-title"><span>À propos</span> de Feedsat</h6>
                        <div class="pm-fat-footer-title-divider"></div>

                        <p>Medical-Link is a premium medical template designed by Pulsar Media
                          Medical-Link is a premium medical template designed by Pulsar Media.
                          Medical-Link is a premium medical template designed by Pulsar Media</p>

                    </div>

                    <div class="col-lg-6 col-md-6 col-sm-12 pm-widget-footer"></div>
                    <div class="col-lg-3 col-md-3 col-sm-12 pm-widget-footer">

                       <h6 class="pm-fat-footer-title"> <span>Contactez-</span>Nous</h6>
                       <div class="pm-fat-footer-title-divider"></div>

                       <ul class="pm-general-icon-list">
                       	  
                          <li>
                          	<span class="fa fa-inbox pm-general-icon"></span>
                       		<p><a href="mailto:contact@feedsat.com">contact@feedsat.com</a></p>
                          </li>
                          
                       </ul>

                    </div>



                    </div>

                </div>
            </div>

        </div>





    </div><!-- /pm_layout-wrapper -->

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="js/jquery-2.1.3.min.js"></script>
    <script src="js/jquery.viewport.mini.js"></script>
    <script src="js/jquery.easing.1.3.js"></script>
    <script src="bootstrap3/js/bootstrap.min.js"></script>
    <script src="js/modernizr.custom.js"></script>
    <script src="js/owl-carousel/owl.carousel.js"></script>
    <script src="js/main.js"></script>
    <script src="js/jquery.tooltip.js"></script>
    <script src="js/superfish/superfish.js"></script>
    <script src="js/superfish/hoverIntent.js"></script>
    <script src="js/stellar/jquery.stellar.js"></script>
    <script src="js/theme-color-selector/theme-color-selector.js"></script>
    <script src="js/pulse/jquery.PMSlider.js"></script>
    <script src="js/meanmenu/jquery.meanmenu.min.js"></script>
    <script src="js/flexslider/jquery.flexslider.js"></script>
    <script src="js/jquery.testimonials.js"></script>
    <script src="js/wow/wow.min.js"></script>
    <script src="js/jquery-migrate-1.2.1.js"></script>
    <script src="js/prettyphoto/js/jquery.prettyPhoto.js"></script>
    <script src="js/tinynav.js"></script>
    <script src="js/jquery-ui.js"></script>

    <p id="back-top" class="visible-lg visible-md visible-sm"></p>

  </body>
</html>
