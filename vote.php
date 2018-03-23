<?php 
include 'dbConnection.php';
if (!(isset($_SESSION['idEtudiant']))) {
        header ("location: index.php");
    }

if(isset($_GET['id']))
{
$id=$_GET['id'];
$req=$bd->query('select * from professor where id='.$id);
$prof=$req->fetch();
}
else 
{
    header ("location: index.php");    
}
?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="favicon.html">

    <title>FEEDSAT </title>

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
        <?php include 'header.php' ?>
        <!-- /Header area end -->

        <!-- Navigation area -->

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



                              <div class="row pm-containerPadding-top-30" style="padding-left: 32.5%;">

                                  <div class="col-lg-3 col-md-3 col-sm-12">

                                      <div class="pm-author-bio-img-bg" style="background-image:url(img/news-post/avatar.jpg);">
                                          <div class="pm-single-news-post-avatar-icon">
                                              <img width="33" height="41" src="img/news/post-icon.jpg" class="img-responsive" alt="icon">
                                          </div>
                                      </div>

                                  </div>

                                  <div class="col-lg-9 col-md-9 col-sm-12" style="padding-top: 75px;padding-left: 30px;">
                                      <p class="pm-author-name"><?php echo $prof['surname'].' '.$prof['name']; ?></p>
                                      <p class="pm-author-title"><?php echo($prof['grade']); ?></p>

                                      <div class="pm-author-divider"></div>
                                      
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
                                </div>

                    </div>

                </div>
                <!-- PANEL 2 end -->

                <!-- PANEL 3 -->

                <!-- PANEL 3 end-->

                <!-- PANEL 4 -->
                <br><br><br><br>

                        <div class="row">
                            <center>
                            <h5 class="light">Partagez votre avis sur cet enseignant</h5>
                            <p class="light"> Pour chacun des critères ci dessous, dites quelle note attribuez-vous.</p></center>
                              <!--<div class="pm-divider light" style="padding-left:25px"></div>-->
                              <br><br>


                          <div id="accordion" class="panel-group" aria-expanded="false">

                                      <!-- accordion item 1 -->
                                      <div class="panel panel-default">

                                          <div class="panel-heading">
                                              <h4 class="panel-title"><i class="fa fa-plus"></i><a class="pm-accordion-link pm-dark-link collapsed" href="#collapse0" data-parent="#accordion" data-toggle="collapse" aria-expanded="false"><b>Contenu du cours</b></a></h4>
                                          </div>

                                          <div class="panel-collapse collapse" id="collapse0" aria-expanded="true" style="height: 0px;">
                                              <div class="panel-body">
                                                <p>Commenet jugez-vous le cours que procure cet enseignant? Que pensez-vous de la qualité du cours, sa longeur et son utilité?
                                                  Commenet jugez-vous le cours que procure cet enseignant? Que pensez-vous de la qualité du cours, sa longeur et son utilité?
                                                  Commenet jugez-vous le cours que procure cet enseignant? Que pensez-vous de la qualité du cours, sa longeur et son utilité?</p>
                                                  <div class="rating" id="contenuCours">
                                                      <input type="radio" id="cours10" name="contenuCours" value="10" /> <label class = "full" for="cours10" title="Awesome - 5 stars"></label>
                                                      <input type="radio" id="cours9" name="contenuCours" value="9" /><label class="half" for="cours9" title="Pretty good - 4.5 stars"></label>
                                                      <input type="radio" id="cours8" name="contenuCours" value="8" /> <label class = "full" for="cours8" title="Pretty good - 4 stars"></label>
                                                      <input type="radio" id="cours7" name="contenuCours" value="7" /><label class="half" for="cours7" title="Meh - 3.5 stars"></label>
                                                      <input type="radio" id="cours6" name="contenuCours" value="6" /><label class = "full" for="cours6" title="Meh - 3 stars"></label>
                                                      <input type="radio" id="cours5" name="contenuCours" value="5" /><label class="half" for="cours5" title="Kinda bad - 2.5 stars"></label>
                                                      <input type="radio" id="cours4" name="contenuCours" value="4" /><label class = "full" for="cours4" title="Kinda bad - 2 stars"></label>
                                                      <input type="radio" id="cours3" name="contenuCours" value="3" />  <label class="half" for="cours3" title="Meh - 1.5 stars"></label>
                                                      <input type="radio" id="cours2" name="contenuCours" value="2" /><label class = "full" for="cours2" title="Sucks big time - 1 star"></label>
                                                      <input type="radio" id="cours1" name="contenuCours" value="1" /><label class="half" for="cour1" title="Sucks big time - 0.5 stars"></label>
                                                  </div>

                                              </div>
                                          </div>

                                      </div>
                                      <!-- accordion item 1 end -->
                                      <br><br>
                                      <!-- accordion item 2 -->
                                      <div class="panel panel-default">

                                          <div class="panel-heading">
                                              <h4 class="panel-title"><i class="fa fa-plus"></i><a class="pm-accordion-link collapsed pm-dark-link" href="#collapse1" data-parent="#accordion" data-toggle="collapse" aria-expanded="false"><b>Taux de présence</b></a></h4>
                                          </div>

                                          <div class="panel-collapse collapse" id="collapse1" aria-expanded="false">
                                              <div class="panel-body">
                                                <p>Commenet jugez-vous le cours que procure cet enseignant? Que pensez-vous de la qualité du cours, sa longeur et son utilité?
                                                  Commenet jugez-vous le cours que procure cet enseignant? Que pensez-vous de la qualité du cours, sa longeur et son utilité?
                                                  Commenet jugez-vous le cours que procure cet enseignant? Que pensez-vous de la qualité du cours, sa longeur et son utilité?</p>
                                                  <div class="rating" id="presence">
                                                      <input type="radio" id="presence10" name="presence" value="10" /> <label class = "full" for="presence10" title="Awesome - 5 stars"></label>
                                                      <input type="radio" id="presence9" name="presence" value="9" /><label class="half" for="presence9" title="Pretty good - 4.5 stars"></label>
                                                      <input type="radio" id="presence8" name="presence" value="8" /> <label class = "full" for="presence8" title="Pretty good - 4 stars"></label>
                                                      <input type="radio" id="presence7" name="presence" value="7" /><label class="half" for="presence7" title="Meh - 3.5 stars"></label>
                                                      <input type="radio" id="presence6" name="presence" value="6" /><label class = "full" for="presence6" title="Meh - 3 stars"></label>
                                                      <input type="radio" id="presence5" name="presence" value="5" /><label class="half" for="presence5" title="Kinda bad - 2.5 stars"></label>
                                                      <input type="radio" id="presence4" name="presence" value="4" /><label class = "full" for="presence4" title="Kinda bad - 2 stars"></label>
                                                      <input type="radio" id="presence3" name="presence" value="3" />  <label class="half" for="presence3" title="Meh - 1.5 stars"></label>
                                                      <input type="radio" id="presence2" name="presence" value="2" /><label class = "full" for="presence2" title="Sucks big time - 1 star"></label>
                                                      <input type="radio" id="presence1" name="presence" value="1" /><label class="half" for="presence1" title="Sucks big time - 0.5 stars"></label>
                                                  </div>

                                              </div>
                                          </div>

                                      </div>
                                      <!-- accordion item 2 end -->
                                      <br><br>
                                      <!-- accordion item 3 -->
                                      <div class="panel panel-default">

                                          <div class="panel-heading">
                                              <h4 class="panel-title"><i class="fa fa-plus"></i><a class="pm-accordion-link collapsed pm-dark-link" href="#collapse2" data-parent="#accordion" data-toggle="collapse" aria-expanded="false"><b>Pédagogie</b></a></h4>
                                          </div>

                                          <div class="panel-collapse collapse" id="collapse2" aria-expanded="false">
                                              <div class="panel-body">
                                                <p>Commenet jugez-vous le cours que procure cet enseignant? Que pensez-vous de la qualité du cours, sa longeur et son utilité?
                                                  Commenet jugez-vous le cours que procure cet enseignant? Que pensez-vous de la qualité du cours, sa longeur et son utilité?
                                                  Commenet jugez-vous le cours que procure cet enseignant? Que pensez-vous de la qualité du cours, sa longeur et son utilité?</p>
                                                  <div class="rating" id="pedagogie">
                                                      <input type="radio" id="pedagogie10" name="pedagogie" value="10" /> <label class = "full" for="pedagogie10" title="Awesome - 5 stars"></label>
                                                      <input type="radio" id="pedagogie9" name="pedagogie" value="9" /><label class="half" for="pedagogie9" title="Pretty good - 4.5 stars"></label>
                                                      <input type="radio" id="pedagogie8" name="pedagogie" value="8" /> <label class = "full" for="pedagogie8" title="Pretty good - 4 stars"></label>
                                                      <input type="radio" id="pedagogie7" name="pedagogie" value="7" /><label class="half" for="pedagogie7" title="Meh - 3.5 stars"></label>
                                                      <input type="radio" id="pedagogie6" name="pedagogie" value="6" /><label class = "full" for="pedagogie6" title="Meh - 3 stars"></label>
                                                      <input type="radio" id="pedagogie5" name="pedagogie" value="5" /><label class="half" for="pedagogie5" title="Kinda bad - 2.5 stars"></label>
                                                      <input type="radio" id="pedagogie4" name="pedagogie" value="4" /><label class = "full" for="pedagogie4" title="Kinda bad - 2 stars"></label>
                                                      <input type="radio" id="pedagogie3" name="pedagogie" value="3" />  <label class="half" for="pedagogie3" title="Meh - 1.5 stars"></label>
                                                      <input type="radio" id="pedagogie2" name="pedagogie" value="2" /><label class = "full" for="pedagogie2" title="Sucks big time - 1 star"></label>
                                                      <input type="radio" id="pedagogie1" name="pedagogie" value="1" /><label class="half" for="pedagogie1" title="Sucks big time - 0.5 stars"></label>
                                                  </div>
                                              </div>
                                          </div>

                                      </div>
                                      <!-- accordion item 3 end -->
                                      <br><br>
                                      <!-- accordion item 4 -->
                                      <div class="panel panel-default">

                                          <div class="panel-heading">
                                              <h4 class="panel-title"><i class="fa fa-plus"></i><a class="pm-accordion-link pm-dark-link collapsed" href="#collapse3" data-parent="#accordion" data-toggle="collapse" aria-expanded="false"><b>Ambiance en classe</b></a></h4>
                                          </div>

                                          <div class="panel-collapse collapse" id="collapse3" aria-expanded="false" style="height: 0px;">
                                              <div class="panel-body">
                                                <p>Commenet jugez-vous le cours que procure cet enseignant? Que pensez-vous de la qualité du cours, sa longeur et son utilité?
                                                  Commenet jugez-vous le cours que procure cet enseignant? Que pensez-vous de la qualité du cours, sa longeur et son utilité?
                                                  Commenet jugez-vous le cours que procure cet enseignant? Que pensez-vous de la qualité du cours, sa longeur et son utilité?</p>
                                                  <div class="rating" id="ambiance">
                                                      <input type="radio" id="ambiance10" name="ambiance" value="10" /> <label class = "full" for="ambiance10" title="Awesome - 5 stars"></label>
                                                      <input type="radio" id="ambiance9" name="ambiance" value="9" /><label class="half" for="ambiance9" title="Pretty good - 4.5 stars"></label>
                                                      <input type="radio" id="ambiance8" name="ambiance" value="8" /> <label class = "full" for="ambiance8" title="Pretty good - 4 stars"></label>
                                                      <input type="radio" id="ambiance7" name="ambiance" value="7" /><label class="half" for="ambiance7" title="Meh - 3.5 stars"></label>
                                                      <input type="radio" id="ambiance6" name="ambiance" value="6" /><label class = "full" for="ambiance6" title="Meh - 3 stars"></label>
                                                      <input type="radio" id="ambiance5" name="ambiance" value="5" /><label class="half" for="ambiance5" title="Kinda bad - 2.5 stars"></label>
                                                      <input type="radio" id="ambiance4" name="ambiance" value="4" /><label class = "full" for="ambiance4" title="Kinda bad - 2 stars"></label>
                                                      <input type="radio" id="ambiance3" name="ambiance" value="3" />  <label class="half" for="ambiance3" title="Meh - 1.5 stars"></label>
                                                      <input type="radio" id="ambiance2" name="ambiance" value="2" /><label class = "full" for="ambiance2" title="Sucks big time - 1 star"></label>
                                                      <input type="radio" id="ambiance1" name="ambiance" value="1" /><label class="half" for="ambiance1" title="Sucks big time - 0.5 stars"></label>
                                                  </div>
                                              </div>
                                          </div>

                                      </div>
                                      <!-- accordion item 4 end -->
                                      <br><br>
                                      <!-- accordion item 5 -->
                                      <div class="panel panel-default">

                                          <div class="panel-heading">
                                              <h4 class="panel-title"><i class="fa fa-plus"></i><a class="pm-accordion-link collapsed pm-dark-link" href="#collapse4" data-parent="#accordion" data-toggle="collapse" aria-expanded="false"><b>Crédibilité de la note</b></a></h4>
                                          </div>

                                          <div class="panel-collapse collapse" id="collapse4" aria-expanded="false">
                                              <div class="panel-body">
                                                <p>Commenet jugez-vous le cours que procure cet enseignant? Que pensez-vous de la qualité du cours, sa longeur et son utilité?
                                                  Commenet jugez-vous le cours que procure cet enseignant? Que pensez-vous de la qualité du cours, sa longeur et son utilité?
                                                  Commenet jugez-vous le cours que procure cet enseignant? Que pensez-vous de la qualité du cours, sa longeur et son utilité?</p>
                                                  <div class="rating" id="note">
                                                      <input type="radio" id="note10" name="note" value="10" /> <label class = "full" for="note10" title="Awesome - 5 stars"></label>
                                                      <input type="radio" id="note9" name="note" value="9" /><label class="half" for="note9" title="Pretty good - 4.5 stars"></label>
                                                      <input type="radio" id="note8" name="note" value="8" /> <label class = "full" for="note8" title="Pretty good - 4 stars"></label>
                                                      <input type="radio" id="note7" name="note" value="7" /><label class="half" for="note7" title="Meh - 3.5 stars"></label>
                                                      <input type="radio" id="note6" name="note" value="6" /><label class = "full" for="note6" title="Meh - 3 stars"></label>
                                                      <input type="radio" id="note5" name="note" value="5" /><label class="half" for="note5" title="Kinda bad - 2.5 stars"></label>
                                                      <input type="radio" id="note4" name="note" value="4" /><label class = "full" for="note4" title="Kinda bad - 2 stars"></label>
                                                      <input type="radio" id="note3" name="note" value="3" />  <label class="half" for="note3" title="Meh - 1.5 stars"></label>
                                                      <input type="radio" id="note2" name="note" value="2" /><label class = "full" for="note2" title="Sucks big time - 1 star"></label>
                                                      <input type="radio" id="note1" name="note" value="1" /><label class="half" for="note1" title="Sucks big time - 0.5 stars"></label>
                                                  </div>
                                              </div>
                                          </div>

                                      </div>
                                      <!-- accordion item 5 end -->
                                      <br><br>
                                      <br><br>
                        </div>

                        <div class="row">
                          <div class="pm-comment-vote-btn " onclick="voter(<?php echo $id; ?>)">
                            <a href="javascript:;" class="pm-square-btn2" style="width:400px">SOUMETTRE </a>
                          </div>
                        </div>
                <!-- PANEL 4 end -->


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

            <script>
                function voter(profId){
                    note=0;
                    ambiance=0;
                    pedagogie=0;
                    presence=0;
                    cours=0;
                    for(i=1;i<=10;i++)
                        {
                            if(document.getElementById('note'+i).checked)
                            note=i;
                            if(document.getElementById('ambiance'+i).checked)
                            ambiance=i;
                            if(document.getElementById('pedagogie'+i).checked)
                            pedagogie=i;
                            if(document.getElementById('presence'+i).checked)
                            presence=i;
                            if(document.getElementById('cours'+i).checked)
                            cours=i;
                        }

                        $.ajax({
                            url : 'submitVote.php',
                            type : 'GET',
                            data: {
                            note,ambiance,pedagogie,presence,cours,profId   
                            },
                            success : function(response, statut){
                                if(response=="done")
                                alert("POPUP : POPUP : VOTE RECU PUIS REDIRECTION")
                            },
                            error : function(response, statut, erreur){
                                alert('ma tsabech  '+erreur);
                            }
                        }); 
                    

                }
                
            </script>

            <p id="back-top" class="visible-lg visible-md visible-sm" style="bottom: -70px;"></p>



        <div id="ui-datepicker-div" class="ui-datepicker ui-widget ui-widget-content ui-helper-clearfix ui-corner-all"></div></body></html>
