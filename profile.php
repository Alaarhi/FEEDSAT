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

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">


    <link rel="stylesheet" href="css/style-clap.css">

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

                <!-- Sub-header area -->

                <div class="pm-sub-header-container">





                </div>

                 <!-- Sub-header area end -->

                <!-- BODY CONTENT starts here -->

                <!-- PANEL 1 -->

                <!-- PANEL 1 end -->

                <!-- PANEL 2 -->
                <div class="pm-column-container pm-containerPadding-bottom-50 pm-parallax-panel" style="background-image: url(&quot;img/home/purple.jpg&quot;); background-position: 0%" data-stellar-background-ratio="0">

                    <div class="container pm-containerPadding80">
                        <div class="row">
                            <div class="col-lg-12">



                                <div class="row pm-containerPadding-top-30">

                                    <div class="col-lg-3 col-md-3 col-sm-12">

                                        <div class="pm-author-bio-img-bg" style="background-image:url(img/news-post/avatar.jpg);">
                                            <div class="pm-single-news-post-avatar-icon">
                                                <img width="33" height="41" src="img/news/post-icon.jpg" class="img-responsive" alt="icon">
                                            </div>
                                        </div>

                                    </div>

                                    <div class="col-lg-9 col-md-9 col-sm-12">
                                            <div class="pm-comment-vote-btn">
                                                    <a href="vote.php" class="pm-square-btn comment-reply">VOTER</a>
                                                </div>
                                        <p class="pm-author-name">dr. Med Ali Maaref</p>
                                        <p class="pm-author-title">physicien</p>

                                        <div class="pm-author-divider"></div>
                                        <p class="pm-author-bio">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc fringilla erat nec tellus consectetur sodales. Vivamus quis est eget velit scelerisque condimentum sed non lorem. Morbi commodo id magna nec semper. Nullam pulvinar erat nisl, ac laoreet orci tempus iaculis. Vivamus nec tortor velit. Praesent a tortor nulla. Nullam pulvinar erat nisl, ac laoreet orci tempus iaculis.</p>
                                    </div>

                                </div>

                            </div>
                        </div>

                        <div class="row">
                            <br>
                            <div class="col-lg-3 col-md-6 col-sm-6 ">


                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6 ">



                            <div id="accordion" class="panel-group" aria-expanded="false">

                                        <!-- accordion item 1 -->
                                        <div class="panel panel-default">

                                            <div class="panel-heading">
                                                <h4 class="panel-title"><i class="fa fa-plus"></i><a class="pm-accordion-link pm-dark-link collapsed" href="#collapse0" data-parent="#accordion" data-toggle="collapse" aria-expanded="false">Contenu du cours : 8.5</a></h4>
                                            </div>

                                            <div class="panel-collapse collapse" id="collapse0" aria-expanded="false" style="height: 0px;">
                                                <div class="panel-body">
                                                    <p>Mauris adisciping fringila turpis intend tellus ornare etos pelim. Pulvunar est cardio neque vitae elit. Lorem vulputat paentra nunc gravida. Mauris adisciping fringila turpis intend tellus ornare etos.</p>
                                                </div>
                                            </div>

                                        </div>
                                        <!-- accordion item 1 end -->

                                        <!-- accordion item 2 -->
                                        <div class="panel panel-default">

                                            <div class="panel-heading">
                                                <h4 class="panel-title"><i class="fa fa-plus"></i><a class="pm-accordion-link collapsed pm-dark-link" href="#collapse1" data-parent="#accordion" data-toggle="collapse" aria-expanded="false">Taux de présence : 7.46</a></h4>
                                            </div>

                                            <div class="panel-collapse collapse" id="collapse1" aria-expanded="false">
                                                <div class="panel-body">
                                                    <p>Mauris adisciping fringila turpis intend tellus ornare etos pelim. Pulvunar est cardio neque vitae elit. Lorem vulputat paentra nunc gravida. Mauris adisciping fringila turpis intend tellus ornare etos. </p>

                                                    <p>Mauris adisciping fringila turpis intend tellus ornare etos pelim. Pulvunar est cardio neque vitae elit. Lorem vulputat paentra nunc gravida. Mauris adisciping fringila turpis intend tellus ornare etos. </p>
                                                    <a href="#" class="pm-standard-link pm-no-margin">Learn more <i class="fa fa-angle-right"></i></a>
                                                </div>
                                            </div>

                                        </div>
                                        <!-- accordion item 2 end -->

                                        <!-- accordion item 3 -->
                                        <div class="panel panel-default">

                                            <div class="panel-heading">
                                                <h4 class="panel-title"><i class="fa fa-plus"></i><a class="pm-accordion-link collapsed pm-dark-link" href="#collapse2" data-parent="#accordion" data-toggle="collapse" aria-expanded="false">Pédagogie : 6.89</a></h4>
                                            </div>

                                            <div class="panel-collapse collapse" id="collapse2" aria-expanded="false">
                                                <div class="panel-body">
                                                    <p>Mauris adisciping fringila turpis intend tellus ornare etos pelim. Pulvunar est cardio neque vitae elit. Lorem vulputat paentra nunc gravida. Mauris adisciping fringila turpis intend tellus ornare etos.</p>

                                                </div>
                                            </div>

                                        </div>
                                        <!-- accordion item 3 end -->

                                        <!-- accordion item 4 -->
                                        <div class="panel panel-default">

                                            <div class="panel-heading">
                                                <h4 class="panel-title"><i class="fa fa-plus"></i><a class="pm-accordion-link pm-dark-link collapsed" href="#collapse3" data-parent="#accordion" data-toggle="collapse" aria-expanded="false">Ambiance en classe : 8.53</a></h4>
                                            </div>

                                            <div class="panel-collapse collapse" id="collapse3" aria-expanded="false" style="height: 0px;">
                                                <div class="panel-body">
                                                    <p>Mauris adisciping fringila turpis intend tellus ornare etos pelim. Pulvunar est cardio neque vitae elit. Lorem vulputat paentra nunc gravida. Mauris adisciping fringila turpis intend tellus ornare etos.</p>
                                                </div>
                                            </div>

                                        </div>
                                        <!-- accordion item 4 end -->

                                        <!-- accordion item 5 -->
                                        <div class="panel panel-default">

                                            <div class="panel-heading">
                                                <h4 class="panel-title"><i class="fa fa-plus"></i><a class="pm-accordion-link collapsed pm-dark-link" href="#collapse4" data-parent="#accordion" data-toggle="collapse" aria-expanded="false">Crédibilité de la note : 4.23</a></h4>
                                            </div>

                                            <div class="panel-collapse collapse" id="collapse4" aria-expanded="false">
                                                <div class="panel-body">
                                                    <p>Mauris adisciping fringila turpis intend tellus ornare etos pelim. Pulvunar est cardio neque vitae elit. Lorem vulputat paentra nunc gravida. Mauris adisciping fringila turpis intend tellus ornare etos.</p>
                                                </div>
                                            </div>

                                        </div>
                                        <!-- accordion item 5 end -->

                                        <!-- accordion item 6 -->
                                        <div class="panel panel-default">



                                            <div class="panel-collapse collapse" id="collapse5">
                                                <div class="panel-body">
                                                    <p>Mauris adisciping fringila turpis intend tellus ornare etos pelim. Pulvunar est cardio neque vitae elit. Lorem vulputat paentra nunc gravida. Mauris adisciping fringila turpis intend tellus ornare etos.</p>
                                                    <a href="#" class="pm-standard-link pm-no-margin">Learn more <i class="fa fa-angle-right"></i></a>
                                                </div>
                                            </div>

                                        </div>
                                        <!-- accordion item 6 end -->

                                        <!-- accordion item 7 -->
                                        <div class="panel panel-default">



                                            <div class="panel-collapse collapse" id="collapse6">
                                                <div class="panel-body">
                                                    <p>Mauris adisciping fringila turpis intend tellus ornare etos pelim. Pulvunar est cardio neque vitae elit. Lorem vulputat paentra nunc gravida. Mauris adisciping fringila turpis intend tellus ornare etos.</p>
                                                </div>
                                            </div>

                                        </div>
                            </div>
                                        <!-- accordion item 7 end -->



                                </div>

                                <div class="col-lg-3 col-md-6 col-sm-6 desktop pm-center " style="padding: 30px 0px 0px 70px">

                                                            <p class="pm-static-number">7.46</p>

                                                            <!-- milestone -->

                                                            <!-- milestone end -->

                                                        </div>

                    </div>

                </div>
                <!-- PANEL 2 end -->

                <!-- PANEL 3 -->

                <!-- PANEL 3 end-->

                <!-- PANEL 4 -->
                <a id="comments"></a>
                <div class="pm-column-container pm-containerPadding80" style="background-color:#FFFFFF;">

                    <div class="container">
                        <div class="row">
                            <div class="col-lg-12">

                                <h4 class="pm-comments-response-title"> <font color=#303F9F>8 étudiants ont commenté le profil de cet enseignant</font></h4>

                                <!-- Comments -->
                                <div class="pm-comments-container">

                                    <!-- Comment -->
                                    <div class="pm-comment-box-container">

                                        <div class="pm-comment-box-avatar-container">
                                            <div class="pm-comment-avatar" style="background-image:url(img/news/01_avatar.jpg);">
                                            </div>
                                            <ul class="pm-comment-author-list">
                                                <li><p class="pm-comment-name">Hamza Gaaliche</p></li>
                                                <li style="padding-left: 24%">



                                                </li>
                                                <li><p class="pm-comment-date">September 6, 2014</p></li>
                                            </ul>


                                        </div>
                                        <div class="col-md-1" style="padding-top: 25px">

                                            <button id="1" class="clap">
                                                <span>
                                                  <!--  SVG Created by Luis Durazo from the Noun Project  -->
                                                  <svg id="11" class="clap--icon" xmlns="http://www.w3.org/2000/svg" viewBox="-549 338 100.1 125">
                                                <path d="M-471.2 366.8c1.2 1.1 1.9 2.6 2.3 4.1.4-.3.8-.5 1.2-.7 1-1.9.7-4.3-1-5.9-2-1.9-5.2-1.9-7.2.1l-.2.2c1.8.1 3.6.9 4.9 2.2zm-28.8 14c.4.9.7 1.9.8 3.1l16.5-16.9c.6-.6 1.4-1.1 2.1-1.5 1-1.9.7-4.4-.9-6-2-1.9-5.2-1.9-7.2.1l-15.5 15.9c2.3 2.2 3.1 3 4.2 5.3zm-38.9 39.7c-.1-8.9 3.2-17.2 9.4-23.6l18.6-19c.7-2 .5-4.1-.1-5.3-.8-1.8-1.3-2.3-3.6-4.5l-20.9 21.4c-10.6 10.8-11.2 27.6-2.3 39.3-.6-2.6-1-5.4-1.1-8.3z"/>
                                                <path d="M-527.2 399.1l20.9-21.4c2.2 2.2 2.7 2.6 3.5 4.5.8 1.8 1 5.4-1.6 8l-11.8 12.2c-.5.5-.4 1.2 0 1.7.5.5 1.2.5 1.7 0l34-35c1.9-2 5.2-2.1 7.2-.1 2 1.9 2 5.2.1 7.2l-24.7 25.3c-.5.5-.4 1.2 0 1.7.5.5 1.2.5 1.7 0l28.5-29.3c2-2 5.2-2 7.1-.1 2 1.9 2 5.1.1 7.1l-28.5 29.3c-.5.5-.4 1.2 0 1.7.5.5 1.2.4 1.7 0l24.7-25.3c1.9-2 5.1-2.1 7.1-.1 2 1.9 2 5.2.1 7.2l-24.7 25.3c-.5.5-.4 1.2 0 1.7.5.5 1.2.5 1.7 0l14.6-15c2-2 5.2-2 7.2-.1 2 2 2.1 5.2.1 7.2l-27.6 28.4c-11.6 11.9-30.6 12.2-42.5.6-12-11.7-12.2-30.8-.6-42.7m18.1-48.4l-.7 4.9-2.2-4.4m7.6.9l-3.7 3.4 1.2-4.8m5.5 4.7l-4.8 1.6 3.1-3.9"/>
                                              </svg>
                                                </span>

                                              </button>
                                            <div id="111" class="clapsNumber" >25</div>
                                            </div>

                                        <div class="pm-comment">
                                            <p>Sed vitae arcu quis dolor pulvinar rhoncus id eget velit. Vivamus lectus dolor, consectetur quis magna ac, viverra mollis orci. Mauris eget fermentum erat. Maecenas mattis, dui quis mollis commodo, justo elit aliquam nulla, sit amet iaculis nisl velit vitae nibh. Aliquam erat volutpat. Sed scelerisque mattis euismod. Curabitur interdum lectus sit amet nisl tempus, sit amet laoreet.</p>
                                        </div>

                                        <div class="pm-comment-reply-btn">

                                        </div>

                                    </div>
                                    <!-- Comment end -->

                                <div class="pm-comments-container">

                                    <!-- Comment -->
                                    <div class="pm-comment-box-container">

                                        <div class="pm-comment-box-avatar-container">
                                            <div class="pm-comment-avatar" style="background-image:url(img/news/01_avatar.jpg);">
                                            </div>
                                            <ul class="pm-comment-author-list">
                                                <li><p class="pm-comment-name">Skander Meghirbi</p></li>
                                                <li><p class="pm-comment-date">September 6, 2014</p></li>
                                            </ul>


                                        </div>
                                        <div class="col-md-1" style="padding-top: 25px">

                                            <button id="2" class="clap">
                                                <span>
                                                  <!--  SVG Created by Luis Durazo from the Noun Project  -->
                                                  <svg id="21" class="clap--icon" xmlns="http://www.w3.org/2000/svg" viewBox="-549 338 100.1 125">
                                                <path d="M-471.2 366.8c1.2 1.1 1.9 2.6 2.3 4.1.4-.3.8-.5 1.2-.7 1-1.9.7-4.3-1-5.9-2-1.9-5.2-1.9-7.2.1l-.2.2c1.8.1 3.6.9 4.9 2.2zm-28.8 14c.4.9.7 1.9.8 3.1l16.5-16.9c.6-.6 1.4-1.1 2.1-1.5 1-1.9.7-4.4-.9-6-2-1.9-5.2-1.9-7.2.1l-15.5 15.9c2.3 2.2 3.1 3 4.2 5.3zm-38.9 39.7c-.1-8.9 3.2-17.2 9.4-23.6l18.6-19c.7-2 .5-4.1-.1-5.3-.8-1.8-1.3-2.3-3.6-4.5l-20.9 21.4c-10.6 10.8-11.2 27.6-2.3 39.3-.6-2.6-1-5.4-1.1-8.3z"/>
                                                <path d="M-527.2 399.1l20.9-21.4c2.2 2.2 2.7 2.6 3.5 4.5.8 1.8 1 5.4-1.6 8l-11.8 12.2c-.5.5-.4 1.2 0 1.7.5.5 1.2.5 1.7 0l34-35c1.9-2 5.2-2.1 7.2-.1 2 1.9 2 5.2.1 7.2l-24.7 25.3c-.5.5-.4 1.2 0 1.7.5.5 1.2.5 1.7 0l28.5-29.3c2-2 5.2-2 7.1-.1 2 1.9 2 5.1.1 7.1l-28.5 29.3c-.5.5-.4 1.2 0 1.7.5.5 1.2.4 1.7 0l24.7-25.3c1.9-2 5.1-2.1 7.1-.1 2 1.9 2 5.2.1 7.2l-24.7 25.3c-.5.5-.4 1.2 0 1.7.5.5 1.2.5 1.7 0l14.6-15c2-2 5.2-2 7.2-.1 2 2 2.1 5.2.1 7.2l-27.6 28.4c-11.6 11.9-30.6 12.2-42.5.6-12-11.7-12.2-30.8-.6-42.7m18.1-48.4l-.7 4.9-2.2-4.4m7.6.9l-3.7 3.4 1.2-4.8m5.5 4.7l-4.8 1.6 3.1-3.9"/>
                                              </svg>
                                                </span>

                                              </button>
                                              <div id="211" class="clapsNumber" >25</div>

                                            </div>
                                        <div class="pm-comment">
                                            <p>Sed vitae arcu quis dolor pulvinar rhoncus id eget velit. Vivamus lectus dolor, consectetur quis magna ac, viverra mollis orci. Mauris eget fermentum erat. Maecenas mattis, dui quis mollis commodo, justo elit aliquam nulla, sit amet iaculis nisl velit vitae nibh. Aliquam erat volutpat. Sed scelerisque mattis euismod. Curabitur interdum lectus sit amet nisl tempus, sit amet laoreet.</p>
                                        </div>

                                        <div class="pm-comment-reply-btn">
                                            <br>
                                                <a href="#" class="pm-square-btn-comment comment-reply">VOIR PLUS +</a>
                                            </div>

                                    </div>
                                    <!-- Comment end -->

                                </div></div>
                                <!-- Comments end -->

                            </div>
                        </div>
                    </div>

                </div>
                <!-- PANEL 4 end -->


                <!-- PANEL 5 -->
                <div class="container pm-containerPadding-top-100 pm-containerPadding-bottom-80">
                    <div class="row">
                        <div class="col-lg-12">

                            <h4 class="pm-primary"><font color=white>Que pensez vous de cet enseignant ?</font></h4>



                            <div class="row pm-containerPadding-top-20">

                                <form name="pm-submit-comment-form" action="http://projects.pulsarmedia.ca/medical-link/post">

                                    <div class="col-lg-4 col-md-4 col-sm-12">

                                    </div>





                                    <div class="col-lg-12 pm-clear-element">
                                        <textarea name="pm-comment-message" cols="20" rows="10" placeholder="VOTRE AVIS ICI" class="pm-comment-form-textarea"></textarea>
                                    </div>

                                    <div class="col-lg-12 pm-clear-element">
                                        <div class="pm-comment-html-tags">
                                            <span>Prière d'être constructif</span>

                                        </div>

                                        <input name="pm-comment-submit-btn" class="pm-rounded-btn no-border" type="button" value="Commenter">

                                    </div>

                                </form>

                            </div>

                        </div>
                    </div>
                </div>

                <!-- PANEL 5 end-->

                <!-- BODY CONTENT end -->



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
            <script src='https://cdnjs.cloudflare.com/ajax/libs/mo-js/0.288.1/mo.min.js'></script>
            <script  src="js/index-clap.js"></script>

            <p id="back-top" class="visible-lg visible-md visible-sm" style="bottom: -70px;"></p>



        <div id="ui-datepicker-div" class="ui-datepicker ui-widget ui-widget-content ui-helper-clearfix ui-corner-all"></div></body></html>
