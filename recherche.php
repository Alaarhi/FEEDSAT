<?php 

include 'dbConnection.php';
$indice = 0;
if (isset($_GET['inputRecherche'])) {    $input = $_GET['inputRecherche'];
    $_SESSION['lastSearch'] = $input;

if (!(isset($_GET['inputRecherche']))) {
    $input = $_SESSION['lastSearch'];
}
        $elements = explode(" ", $input);
        switch (sizeof($elements)) {
            case 1:
                $requeteRecherche = $bd->prepare(
                    'SELECT * FROM professor 
                    WHERE 
                    (name LIKE :inputValue"%")
                    OR
                    (surname LIKE :inputValue"%")'
                );
                $requeteRecherche->bindParam(':inputValue', $elements[0]);
                $requeteRecherche->execute();
                if ($requeteRecherche->rowCount() != 0) {
                    $profs = $requeteRecherche->fetchAll(PDO::FETCH_ASSOC);
                    $indice = 1;
                    
                }
                break;
                
            case 2:
                $requeteRecherche = $bd->prepare(
                    'SELECT * FROM professor AS p 
                    WHERE (p.name = ?) AND (p.surname = ?)'
                );
                $requeteRecherche->execute(array($elements[1],$elements[0]));
                if ($requeteRecherche->rowCount() !=0 ) {
                        $profs = $requeteRecherche->fetchAll(PDO::FETCH_ASSOC);
                        $indice = 1;
                        break;
                    }

                else {
                    $requeteRecherche = $bd->prepare(
                        'SELECT * FROM professor 
                        WHERE (name LIKE :nameValue"%") OR (surname LIKE :surnameValue"%")
                        OR (name LIKE :nameValue) OR (name LIKE "%":nameValue) OR (name LIKE :nameValue"%") OR (name = "%":nameValue)
                        OR (surname LIKE :surnameValue) OR (surname LIKE "%":surnameValue) OR (surname LIKE :surnameValue"%") OR (surname = "%":surnameValue)'
                    );
                    $requeteRecherche->bindParam(':surnameValue', $elements[0]);
                    $requeteRecherche->bindParam(':nameValue', $elements[1]);
                    $requeteRecherche->execute();
                    if ($requeteRecherche->rowCount()!=0) {
                        $profs = $requeteRecherche->fetchAll(PDO::FETCH_ASSOC);
                        $indice = 1;
                        break;
                    }
            }
        }
} 



include 'header.php';
?>

<div class="pm-sub-header-container">
    <div class="pm-sub-header-info-profs" >    	
        <div class="container">
            <div class="row">
                <div class="col-lg-12">               	
                    <p class="pm-page-title" style="display: inline-block">Résultat de recherche pour: &nbsp; &nbsp;</p>
                    <p class="pm-page-message" style="display: inline-block; font-size: 35px; color:blue">
                            <?php echo ' " '.$input.' " ' ?> 
                    </p>
                </div>
            </div>
        </div>            
    </div>          
    <div class="row"><br><br>
        <!--<div class="col-lg-12  pm-columnPadding30 pm-center">
            <br><br>
                <h5>CONSULTER . VOTER . AMÉLIORER </h5>
            <div class="pm-column-title-divider">
                <img height="29" width="32" src="img/MiniLogoWBG.png" alt="icon">
            </div>                  
        </div>-->
    </div>
</div>
<!-- Sub-header area end -->

<!-- PANEL 1 -->
<div class="container pm-containerPadding-bottom-30  pm-containerPadding-top-20">
        <div class="row pm-containerPadding-bottom-60 pm-center">
            <?php
            //if ($requeteRecherche) {
            if ($indice != 0) {
                foreach ($profs as $prof) { 
            ?>
            	<!-- Column 1 -->
                <div class="col-lg-4 col-md-4 col-sm-12 desktop pm-center pm-columnPadding-30 pm-column-spacing">
                    <!-- Single testimonial -->
                    <div class="pm-single-testimonial-shortcode">
                    	<div style="background-image: url(<?php if($prof['gender']=='1') echo  'img/AvatarFemaleProf.png'; else echo  'img/AvatarProf2.png';?>);" class="pm-single-testimonial-img-bg">
                            <div class="pm-single-testimonial-avatar-icon">
                                <img width="33" height="41" class="img-responsive" src="img/news/post-icon.jpg">
                            </div>
                        </div>
                       <a href="profile.php?id=<?php echo $prof['id'] ?>"><p class="name"><?php
                       echo $prof['name'] . $prof['surname'];
                               $idprf=$prof['id'];
                        ?></p></a>
                        <div class="pm-single-testimonial-divider"></div>
                    </div>
                    <!-- Single testimonial end -->
              	</div>
                <!-- Column 1 end -->
            <?php
                }
            }
            else {
            ?>
            <div class="col-lg-12 pm-column-spacing pm-center">
                <h4 class="light" style="font-size:30px;"> <font color=#303F9F> Aucun enseignant ne correspond à votre recherche. <br> Veuillez réessayer.</font></h4></font> 
            </div>    
            <?php } ?>
            </div>
                
            </div>
        <!-- PANEL 5 end -->
        
        <!-- BODY CONTENT end -->


    <?php include 'footer.html';?>



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
