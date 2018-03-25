<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="favicon.php">

    <title>FEEDSSAT</title>

    <link href="bootstrap3/css/bootstrap.css" rel="stylesheet">

    <!-- main css -->
    <link href="css/master.css" rel="stylesheet">
    <link href="css/modal.css" rel="stylesheet">
    <link href="css/style-clap.css" rel="stylesheet">



    <!-- mobile css -->
    <link href="css/responsive.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
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
                                	
                                	<form action="recherche.php" method="post">
                                    	<input name="inputRecherche" class="pm-search-field" type="text" placeholder="Rechercher un prof...">
                                        <!--<a href="recherche.php" type="submit" class="fa fa-search"></a>-->
                                    </form>
                                </div>
                            </li>
                            <li>
                            	<div class="pm-dropdown pm-categories-menu" >
                                    <div class="pm-dropmenu" >
                                        <p class="pm-menu-title">Filtrer par Département</p>
                                        <i class="fa fa-angle-down"></i>
                                    </div>
                                    <div class="pm-dropmenu-active" >
                                        <ul>
                                           <li><a href="filtre.php?dep=gim"><center>Génie informatique et Mathématique</center></a></li>
                                           <li><a href="filtre.php?dep=gpi"><center>Génie physique et instrumentation</center></a></li>
                                           <li><a href="filtre.php?dep=gbc"><center>Génie Biologie et chimie</center></a></li>
                                           <li><a href="filtre.php?dep=slf"><center>Sciences Sociales, langues et Formation générale</center></a></li>
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
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <nav class="navbar-collapse collapse" id="pm-main-navigation">
                            <ul class="sf-menu pm-nav">
                                <li><a href="index.php" class="fa fa-home" id="pm-home-btn"></a></li>
                                <li>
                                	<a href="profs.php">Liste des enseignants</a>
                                    <ul>
                                        <li><a href="filtre.php?dep=gim">Génie informatique et Mathématique</a></li>
                                        <li><a href="filtre.php?dep=gpi">Génie physique et instrumentation</a></li>
                                        <li><a href="filtre.php?dep=gbc">Génie Biologie et chimie</a></li>
                                        <li><a href="filtre.php?dep=slf">Sciences Sociales, langues et Formation générale</a></li>
                                    </ul>
                                </li>
                                <?php if (isset($_SESSION['nom'])) { ?>
                                <li><a href="avis.php">Avis de mes collègues</a></li>
                                <?php } else { ?>
                                <li><a onclick="document.getElementById('avis').style.display='block'">Avis de mes collègues</a></li>
                                <?php } ?>
                                
                            </ul>
                            <ul class="sf-menu pm-nav" style="float: right;">
                            <?php if (isset($_SESSION['nom'])) { ?>    
                                <li><a href="javascript:;"><?php echo $_SESSION['prenom']." ".$_SESSION['nom']; ?></a>
                                    <ul>
                                    <li><a href="#">Ajouter une photo d'identité</a></li>
                                    <li><a href="#">Changer mon mot de passe</a></li>
                                    <li><a href="deconnexion.php">Déconnexion</a></li>
                                    </ul>
                                </li>
                                <?php } ?>
                            </ul>
                        </nav>
                        <?php include 'loginForm.php'; ?>
                    </div>
                </div>
            </div>
        </div>
        <!-- Navigation area end -->

<!--
<script>
$("#avisVoirPlus").click(avisVoirPlus(){
    
    $.ajax({
        url : 'authentification.php',
        type : 'GET',
        data: {
          numInscri, numCin
        },
        success : function(response, statut) {
            if (response == 1) {
              header('location: avis.php');
            } else {
              header('location: index.php');
            }
        },
        error : function(response, statut, erreur) {
        }
    });
    //return "x";
});
</script>
-->


<script>
// If user clicks anywhere outside of the modal, Modal will close
var modal = document.getElementById('avis');
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}
</script>
