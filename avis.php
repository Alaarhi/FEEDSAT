<?php include 'dbConnection.php';?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="favicon.php">

    <title>MEDICAL-LINK :: Premium Medical Template</title>
    
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

  <body class="">
    
  <!-- Theme color selector -->

    <!-- Theme color selector -->
    

	<div id="pm_layout_wrapper" class="pm-full-mode"><!-- Use wrapper for wide or boxed mode -->
    
      <!-- Sub-Menu -->
   	  
        <!-- Sub-Menu end -->
        
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
                        	<input name="" class="pm-request-appointment-form-textfield appointment-form-datepicker hasDatepicker" type="text" placeholder="Date of Appointment" id="datepicker">
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12">
                        	<input name="" class="pm-request-appointment-form-textfield appointment-form-datepicker" type="text" placeholder="Time of Appointment (ex. 10:30am)">
                        </div>
                        <div class="col-lg-12 pm-clear-element" style="padding-top:20px;">
                        	<input type="submit" value="Submit Request" class="pm-square-btn appointment-form">
                            <p class="pm-appointment-form-notice">All fields are required.</p>                            <a href="#" class="pm-appointment-form-close" id="pm-close-appointment-form"><i class="fa fa-close"></i> Close Appointment form</a>
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
                            <a href="index.php"><img src="img/medical-link.jpg" class="img-responsive pm-header-logo" alt="Medical-Link Template"></a> 
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
                                        <p class="pm-menu-title">Categories</p>
                                        <i class="fa fa-angle-down"></i>
                                    </div>
                                    <div class="pm-dropmenu-active" style="display: none;">
                                        <ul>
                                           <li><a href="news.php">Health</a></li>
                                           <li><a href="news.php">Medicine</a></li>
                                           <li><a href="news.php">Research</a></li>
                                           <li><a href="news.php">Diseases</a></li>
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
            
                                    <nav class="navbar-collapse collapse" id="pm-main-navigation" style="display: block;">
            
                                        <ul class="sf-menu pm-nav sf-js-enabled">
            
                                            <li><a href="index.php" class="fa fa-home" id="pm-home-btn"></a></li>
                                            <li class="">
                                                <a href="profs.php" class="sf-with-ul">Liste des enseignants<span class="sf-sub-indicator"><i class="fa fa-angle-down"></i></span></a>
                                                <ul style="display: none;">
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
                
        <!-- Sub-header area -->
        
        <div class="pm-sub-header-container">
        
        	<div class="pm-sub-header-info">
            	
                <div class="container">
                	<div class="row">
                    	<div class="col-lg-12">
                        	
                            <p class="pm-page-title">Avis De Mes Collègues</p>
                            <p class="pm-page-message">Découvrez toute l'activité de vos amis (Ne les laissez pas vous influencer) </p>
                            
                        </div>
                    </div>
                </div>
                
            </div>
            
            <div class="pm-sub-header-breadcrumbs">
            	
                <div class="container">
                	
                </div>
                
            </div>
        
        </div>
        
 		<!-- Sub-header area end -->
        
        <!-- BODY CONTENT starts here -->
                
        <!-- PANEL 1 -->
        
        <div class="container pm-containerPadding-top-60 pm-containerPadding-bottom-80">
        
        	<div class="row">
            	<div class="col-lg-12 pm-columnPadding30 pm-center">
                	
                    <h5>VOS AMIS EN NOMBRES</h5>
                    <br>
                    <div class="pm-column-title-divider">
                    	<img height="29" width="29" src="img/divider-icon.png" alt="icon">
                    </div>
                    
                </div>
            </div>
        
        	<div class="row">
            
            	<div class="col-lg-3 col-md-6 col-sm-6 desktop pm-center pm-columnPadding-30 pm-column-spacing">
                	
                    <p class="typcn typcn-group pm-static-icon"></p>
                    
                    <!-- milestone -->
                    <div class="milestone already-animated">
                        <div class="milestone-content">                         
                            <span data-speed="2000" data-stop="1789" class="milestone-value">1789</span>
                            <div class="milestone-description">Patients Treated</div>
                        </div>
                    </div>
                    <!-- milestone end -->
                    
                </div>
                
                <div class="col-lg-3 col-md-6 col-sm-6 desktop pm-center pm-columnPadding-30 pm-column-spacing">
                	
                    <p class="fa fa-ambulance pm-static-icon"></p>
                    
                    <!-- milestone -->
                    <div class="milestone already-animated">
                        <div class="milestone-content">                         
                            <span data-speed="2000" data-stop="548" class="milestone-value">548</span>
                            <div class="milestone-description">Emergency Patients Treated</div>
                        </div>
                    </div>
                    <!-- milestone end -->
                    
                </div>
                
                <div class="col-lg-3 col-md-6 col-sm-6 desktop pm-center pm-columnPadding-30 pm-column-spacing">
                	
                    <p class="typcn typcn-phone pm-static-icon"></p>
                    
                    <!-- milestone -->
                    <div class="milestone already-animated">
                        <div class="milestone-content">                         
                            <span data-speed="2000" data-stop="3490" class="milestone-value">3490</span>
                            <div class="milestone-description">Appointments Booked</div>
                        </div>
                    </div>
                    <!-- milestone end -->
                    
                </div>
                
                <div class="col-lg-3 col-md-6 col-sm-6 desktop pm-center pm-columnPadding-30 pm-column-spacing">
                	
                    <p class="typcn typcn-mortar-board pm-static-icon"></p>
                    
                    <!-- milestone -->
                    <div class="milestone already-animated">
                        <div class="milestone-content">                         
                            <span data-speed="2000" data-stop="439" class="milestone-value">439</span>
                            <div class="milestone-description">Practioneers Trained</div>
                        </div>
                    </div>
                    <!-- milestone end -->
                    
                </div>
            
            </div>
        
        </div><!-- PANEL 1 end -->
        
        <!-- PANEL 2 -->
        <div class="pm-column-container testimonials pm-parallax-panel" style=" background-image: url('img/home/purple.jpg'); background-repeat: repeat-y; " data-stellar-background-ratio="0" >
        
        	<div class="container pm-containerPadding-top-110 pm-containerPadding-bottom-80">
            	<div class="row">
                
                	<div class="col-lg-12 pm-column-spacing pm-center">
                    
                    	<h5 class="light">VOS ENSEIGNANTS</h5>
                        
                        <p class="light">Ce que vos amis ont voté pour vos enseignants</p>
                        <br>
                        
                    </div>
                
                	<div class="col-lg-3 col-md-3 col-sm-12 pm-column-spacing">
                	
                        <!-- Staff profile -->
                        <div class="pm-staff-profile-parent-container">
                        
                            <div class="pm-staff-profile-container" style="background-image:url(img/home/staff-profile1.jpg);">
                        
                                <div class="pm-staff-profile-overlay-container">
                                
                                    <ul class="pm-staff-profile-icons">
                                        
                                        
                                        
                                        <li><a href="#" class="fa fa-linkedin"></a></li>
                                    </ul>
                                    
                                    <div class="pm-staff-profile-quote">
                                        <p>"The good physician treats the disease; the great physician treats the patient who has the disease."</p>
                                        <a href="#" class="pm-square-btn pm-center-align">View profile</a>
                                    </div>
                                
                                </div>
                                                        
                                <a href="#" class="pm-staff-profile-expander fa fa-plus"></a>
                                                    
                            </div>
                            
                            <div class="pm-staff-profile-info">
                                <p class="pm-staff-profile-name light">Dr. Mehdi Abouda</p>
<p class="pm-staff-profile-name light">8.49 / 10</p>
                                <p class="pm-staff-profile-title light">Hamza Gaaliche, Skander Meghirbi, Abir Messaoudi et 13 autres amis ont voté pour ce prof</p>
                            </div>
                            
                        </div>                    
                        <!-- Staff profile end -->
                        
                    </div>




<div class="col-lg-3 col-md-3 col-sm-12 pm-column-spacing">
                	
                        <!-- Staff profile -->
                        <div class="pm-staff-profile-parent-container">
                        
                            <div class="pm-staff-profile-container" style="background-image:url(img/home/staff-profile1.jpg);">
                        
                                <div class="pm-staff-profile-overlay-container">
                                
                                    <ul class="pm-staff-profile-icons">
                                        
                                        
                                        
                                        <li><a href="#" class="fa fa-linkedin"></a></li>
                                    </ul>
                                    
                                    <div class="pm-staff-profile-quote">
                                        <p>"The good physician treats the disease; the great physician treats the patient who has the disease."</p>
                                        <a href="#" class="pm-square-btn pm-center-align">View profile</a>
                                    </div>
                                
                                </div>
                                                        
                                <a href="#" class="pm-staff-profile-expander fa fa-plus"></a>
                                                    
                            </div>
                            
                            <div class="pm-staff-profile-info">
                                <p class="pm-staff-profile-name light">Dr. Mehdi Abouda</p>
<p class="pm-staff-profile-name light">8.49 / 10</p>
                                <p class="pm-staff-profile-title light">Hamza Gaaliche, Skander Meghirbi, Abir Messaoudi et 13 autres amis ont voté pour ce prof</p>
                            </div>
                            
                        </div>                    
                        <!-- Staff profile end -->
                        
                    </div>

<div class="col-lg-3 col-md-3 col-sm-12 pm-column-spacing">
                	
                        <!-- Staff profile -->
                        <div class="pm-staff-profile-parent-container">
                        
                            <div class="pm-staff-profile-container" style="background-image:url(img/home/staff-profile1.jpg);">
                        
                                <div class="pm-staff-profile-overlay-container">
                                
                                    <ul class="pm-staff-profile-icons">
                                        
                                        
                                        
                                        <li><a href="#" class="fa fa-linkedin"></a></li>
                                    </ul>
                                    
                                    <div class="pm-staff-profile-quote">
                                        <p>"The good physician treats the disease; the great physician treats the patient who has the disease."</p>
                                        <a href="#" class="pm-square-btn pm-center-align">View profile</a>
                                    </div>
                                
                                </div>
                                                        
                                <a href="#" class="pm-staff-profile-expander fa fa-plus"></a>
                                                    
                            </div>
                            
                            <div class="pm-staff-profile-info">
                                <p class="pm-staff-profile-name light">Dr. Mehdi Abouda</p>
<p class="pm-staff-profile-name light">8.49 / 10</p>
                                <p class="pm-staff-profile-title light">Hamza Gaaliche, Skander Meghirbi, Abir Messaoudi et 13 autres amis ont voté pour ce prof</p>
                            </div>
                            
                        </div>                    
                        <!-- Staff profile end -->
                        
                    </div><div class="col-lg-3 col-md-3 col-sm-12 pm-column-spacing">
                	
                        <!-- Staff profile -->
                        <div class="pm-staff-profile-parent-container">
                        
                            <div class="pm-staff-profile-container" style="background-image:url(img/home/staff-profile1.jpg);">
                        
                                <div class="pm-staff-profile-overlay-container">
                                
                                    <ul class="pm-staff-profile-icons">
                                        
                                        
                                        
                                        <li><a href="#" class="fa fa-linkedin"></a></li>
                                    </ul>
                                    
                                    <div class="pm-staff-profile-quote">
                                        <p>"The good physician treats the disease; the great physician treats the patient who has the disease."</p>
                                        <a href="#" class="pm-square-btn pm-center-align">View profile</a>
                                    </div>
                                
                                </div>
                                                        
                                <a href="#" class="pm-staff-profile-expander fa fa-plus"></a>
                                                    
                            </div>
                            
                            <div class="pm-staff-profile-info">
                                <p class="pm-staff-profile-name light">Dr. Mehdi Abouda</p>
<p class="pm-staff-profile-name light">8.49 / 10</p>
                                <p class="pm-staff-profile-title light">Hamza Gaaliche, Skander Meghirbi, Abir Messaoudi et 13 autres amis ont voté pour ce prof</p>
                            </div>
                            
                        </div>                    
                        <!-- Staff profile end -->
                        
                    </div>
                    
                    <div class="pm-comment-reply-btn">
                        <br>
                            <a href="#" class="pm-square-btn-comment-avis comment-reply">VOIR PLUS +</a>
                        </div>
                    
                    
                
                </div><!-- /.row -->
            </div><!-- /.container -->
        
        </div>
        <!-- PANEL 2 end -->
        
        <!-- PANEL 3 -->
        
        <!-- PANEL 3 end -->
        
        <!-- PANEL 4 -->
        <div class="pm-column-container testimonials pm-parallax-panel" style="background-color: rgb(32, 186, 199); background-image: url(&quot;img/home/testimonials-bg.jpg&quot;); background-repeat: repeat-y; background-position: 0% -1376.5px;" data-stellar-background-ratio="0.5" data-stellar-vertical-offset="-50">
        
        	<!-- /.container -->
        
        </div>
        <!-- PANEL 4 end -->
        
        <!-- PANEL 5 -->
        <div class="container pm-containerPadding-top-90 pm-containerPadding-bottom-30">
        
        	<div class="row">
            	<div class="col-lg-12 pm-columnPadding30 pm-center">
                	
                   <h5>Les commentaires les plus populaires écrits par vos amis </h5>
                    <div class="pm-column-title-divider">
                    	<img height="29" width="29" src="img/divider-icon.png" alt="icon">
                    </div>
  
                    
                </div>
            </div>
            
            <div class="row pm-containerPadding-top-30 pm-containerPadding-bottom-60 pm-center">
            
            	<!-- Column 1 -->
                <div class="col-lg-4 col-md-4 col-sm-12 desktop pm-center pm-columnPadding-30 pm-column-spacing">
                	
                    <!-- Single testimonial -->
                    <div class="pm-single-testimonial-shortcode">
                    	
                    	<div style="background-image:url(img/information/avatar1.jpg);" class="pm-single-testimonial-img-bg">
                            <div class="pm-single-testimonial-avatar-icon">
                                <img width="33" height="41" class="img-responsive" src="img/news/post-icon.jpg">
                            </div>
                        </div>
                        
                        <p class="name">Hamza Gaaliche</p>
                        
                        
                        <div class="pm-single-testimonial-divider"></div>
                        
                        <p class="quote">" Yadi ma aadech kraya fel fac. Lezmna nekhdmou ala rwehna "</p>
                        
                         <div class="pm-single-testimonial-divider"></div>
                         
                         <p class="date">June 2014</p>
                    
                    </div>
                    <!-- Single testimonial end -->
                    
              	</div>
                <!-- Column 1 end -->
                
                <!-- Column 2 -->
                <div class="col-lg-4 col-md-4 col-sm-12 desktop pm-center pm-columnPadding-30 pm-column-spacing">
                	
                    <!-- Single testimonial -->
                    <div class="pm-single-testimonial-shortcode">
                    	
                    	<div style="background-image:url(img/information/avatar2.jpg);" class="pm-single-testimonial-img-bg">
                            <div class="pm-single-testimonial-avatar-icon">
                                <img width="33" height="41" class="img-responsive" src="img/news/post-icon.jpg">
                            </div>
                        </div>
                        
                        <p class="name">Abir Messaoudi</p>
                        
                        
                        <div class="pm-single-testimonial-divider"></div>
                        
                        <p class="quote">“ N7eb nod5el na9ra. Manajamch mane7melch. Asma3 men 7a9i raw nod5el na9ra ”</p>
                        
                         <div class="pm-single-testimonial-divider"></div>
                         
                         <p class="date">September 2014</p>
                    
                    </div>
                    <!-- Single testimonial end -->
                    
              </div>
                <!-- Column 2 end -->
                
                <!-- Column 3 -->
                <div class="col-lg-4 col-md-4 col-sm-12 desktop pm-center pm-columnPadding-30 pm-column-spacing">
                	
                    <!-- Single testimonial -->
                    <div class="pm-single-testimonial-shortcode">
                    	
                    	<div style="background-image:url(img/information/avatar3.jpg);" class="pm-single-testimonial-img-bg">
                            <div class="pm-single-testimonial-avatar-icon">
                                <img width="33" height="41" class="img-responsive" src="img/news/post-icon.jpg">
                            </div>
                        </div>
                        
                        <p class="name">Skander Meghirbi</p>
                        
                        
                        <div class="pm-single-testimonial-divider"></div>
                        
                        <p class="quote">“ Lezmni mac sayé ma aach fiha. Lezmni Kindle zeda. Normal weldi yatlaa Gay ”</p>
                        
                         <div class="pm-single-testimonial-divider"></div>
                         
                         <p class="date">December 2014</p>
                    
                  </div>
                    <!-- Single testimonial end -->
                    
              </div>
                <!-- Column 3 end -->
                
            </div>
        
        </div>
        <!-- PANEL 5 end -->
        
        <!-- BODY CONTENT end -->
        
        <div class="pm-fat-footer pm-parallax-panel" data-stellar-background-ratio="0.5" style="background-position: 50% 194.953px;">
            
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
        <footer>

            
            

                
        </footer>
                
       
    
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
    <script src="js/meanmenu/jquery.meanmenu.min.js"></script>
    <script src="js/flexslider/jquery.flexslider.js"></script>
    <script src="js/jquery.testimonials.js"></script>
    <script src="js/wow/wow.min.js"></script>
    <script src="js/jquery-migrate-1.2.1.js"></script>
    <script src="js/prettyphoto/js/jquery.prettyPhoto.js"></script>
    <script src="js/tinynav.js"></script>
    <script src="js/jquery-ui.js"></script>
    <script src="js/countdown/countdown.js"></script>
        
    <p id="back-top" class="visible-lg visible-md visible-sm" style="bottom: 10px;"></p>
    
  

<div id="ui-datepicker-div" class="ui-datepicker ui-widget ui-widget-content ui-helper-clearfix ui-corner-all"></div></body></html>
