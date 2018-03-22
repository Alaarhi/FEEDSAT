﻿<?php 
    
    include 'dbConnection.php';

    //Authentification et création d'une session
    if ((isset($_POST['numInscri'])) && (isset($_POST['numCin']))) {
        $numCin = $_POST['numCin'];
        $numInscri = $_POST['numInscri'];

        $requete = $bd->prepare('SELECT * FROM student WHERE password = ? AND id = ?');
        $requete->execute(array($numCin, $numInscri));

        if (($requete->rowCount()) == 0) {
            header("Location: index.php");
            exit;
        } else {
            $etudiant = $requete->fetch(PDO::FETCH_OBJ);
            $_SESSION['idEtudiant'] = $etudiant->id;
            $_SESSION['nom'] = $etudiant->name;
            $_SESSION['prenom'] = $etudiant->surname;
            $_SESSION['niveau'] = $etudiant->level;
            $_SESSION['idFiliere'] = $etudiant->fosId;
        }     
    }

    $idFiliere = $_SESSION['idFiliere'];

    //Extraction de données pour le contenu de la page - Les requêtes ne sont exécutées qu'une seule fois pour une session donnée
    
    //Note moyenne attribuée par les étudiants
    if (!(isset($_SESSION['moyenneFiliere']))) {
        $reqMoyenne = $bd->prepare('SELECT avg(score) as moyenne 
            FROM student 
            INNER JOIN rating ON student.id = rating.studentId 
            WHERE student.fosId= ?');
        $reqMoyenne->execute(array($idFiliere));
        $moyenneFiliere = $reqMoyenne->fetch(PDO::FETCH_OBJ);
        $_SESSION['moyenneFiliere'] = $moyenneFiliere->moyenne;
    } 


    //Taux anonymat chez une filière
    if (!(isset($_SESSION['tauxAnonymes']))) {

        $nbrCommentsAnonymes = 0;
        $nbrCommentsVisibles = 0;
        $tauxAnonymes = 0;

        $requeteTauxAnonyme = $bd->prepare('SELECT visibility as visibilite, count(*) as nbrComments from student 
            INNER JOIN comment
            ON (student.id = comment.studentId)
            WHERE (student.fosId = ?)
            GROUP BY (comment.visibility)');     
        $requeteTauxAnonyme->execute(array($idFiliere));

        if (($requeteTauxAnonyme->rowCount()) !=0 ) {
            while ($row = $requeteTauxAnonyme->fetch(PDO::FETCH_OBJ)) {
                switch ($row->visibilite) {
                    case 0:
                        $nbrCommentsAnonymes = $row->nbrComments;
                        break;
                    case 1:
                        $nbrCommentsVisibles = $row->nbrComments;  
                        break;
                }
            }
        } 
        $nbrCommentsTotal = $nbrCommentsVisibles + $nbrCommentsAnonymes;      
        if (($nbrCommentsTotal) != 0) {
            $tauxAnonymes = (($nbrCommentsAnonymes * 100) / $nbrCommentsTotal);
        }
        $_SESSION['tauxAnonymes'] = (int)$tauxAnonymes;     
    }


    //Nombre d'amis contribuables 
    //Extraire le nombre des commentators+voters en éliminant les doublons 
    //i.e. celui qui est à la fois commentator et voter doit être compté 1 seule fois
    if (!(isset($_SESSION['nbrContributors']))) {

        $voters = array();
        $commentators = array();
        $contributors = array();

        $requeteNbrAmis = $bd->prepare('SELECT COUNT(*) as nbrAmis FROM student
            WHERE (student.fosId = ?)');     
        $requeteNbrAmis->execute(array($idFiliere));
        $nbrAmis = $requeteNbrAmis->fetch(PDO::FETCH_OBJ);

        $requeteIdOfVoters = $bd->prepare('SELECT DISTINCT studentId FROM rating 
            INNER JOIN student
            ON (student.id = rating.studentId)
            WHERE (student.fosId = ?)');     
        $requeteIdOfVoters->execute(array($idFiliere));

        $requeteIdOfCommentators= $bd->prepare('SELECT DISTINCT studentId FROM comment
            INNER JOIN student
            ON (student.id = comment.studentId)
            WHERE (student.fosId = ?)');     
        $requeteIdOfCommentators->execute(array($idFiliere));

        if (($requeteIdOfVoters->rowCount()) !=0 ) {
            while ($row = $requeteIdOfVoters->fetch(PDO::FETCH_OBJ)) {
                array_push($voters, $row->studentId);
            }
        }

        if (($requeteIdOfCommentators->rowCount()) !=0 ) {
            while ($row = $requeteIdOfCommentators->fetch(PDO::FETCH_OBJ)) {
                array_push($commentators, $row->studentId);
            }
        }

        $contributors = array_unique(array_merge($voters,$commentators));
        $nbrContributors = sizeof($contributors);
        
        $_SESSION['nbrContributors'] = $nbrContributors;
        $_SESSION['nbrAmis'] = $nbrAmis->nbrAmis;
    }

    // STATISTIQUE #4


    //Top commentaires de vos amis
    $requeteTopComments = $bd->prepare('SELECT c.comment as commentaire, 
        s.id as idAauteur, s.surname as prenomAuteur, s.name as nomAuteur,
        sum(interaction) as nbrInteractions,
        date_format(c.timestamp, \'%d-%m-%Y\') as dateCommentaire,
        s.imageUrl as photo
        FROM interact as i INNER JOIN student as s INNER JOIN comment as c 
        ON (c.studentId = s.id) AND (c.id = i.commentId) 
        WHERE (s.fosId = ?) 
        GROUP BY i.commentId 
        ORDER BY nbrInteractions DESC    
        LIMIT 0,3');     
    $requeteTopComments->execute(array($idFiliere));

    include 'header.php'; 
?>
        
        

        <!-- Sub-header area -->
        
        <div class="pm-sub-header-container">     
        	<div class="pm-sub-header-info">    	
                <div class="container">
                	<div class="row">
                    	<div class="col-lg-12">                       	
                            <p class="pm-page-title"><?php echo 'Bienvenue, '.$_SESSION['prenom']. '!'?></p>
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
                    <h5> Vos amis en chiffres </h5>
                    <br>
                    <div class="pm-column-title-divider">
                    	<img height="29" width="29" src="img/divider-icon.png" alt="icon">
                    </div> 
                </div>
            </div>
        	<div class="row">
            	<div class="col-lg-3 col-md-6 col-sm-6 desktop pm-center pm-columnPadding-30 pm-column-spacing">              	
                    <p class="fa fa-bar-chart pm-static-icon"></p>            
                    <!-- milestone -->
                    <div class="milestone already-animated">
                        <div class="milestone-content">                         
                            <span data-speed="2000" data-stop="1789" class="milestone-value"><?php printf('%0.2f', $_SESSION['moyenneFiliere']) ?> </span>
                            <div class="milestone-description">Note moyenne attribuée par vos amis</div>
                        </div>
                    </div>
                    <!-- milestone end --> 
                </div> 
                <div class="col-lg-3 col-md-6 col-sm-6 desktop pm-center pm-columnPadding-30 pm-column-spacing">
                    <p class="fa fa-eye-slash pm-static-icon"></p>
                    <!-- milestone -->
                    <div class="milestone already-animated">
                        <div class="milestone-content">                         
                            <span data-speed="2000" data-stop="548" class="milestone-value"><?php echo $_SESSION['tauxAnonymes'].' %' ?></span>
                            <div class="milestone-description">Des commentaires de vos amis sont anonymes</div>
                        </div>
                    </div>
                    <!-- milestone end -->
                </div>
                
                <div class="col-lg-3 col-md-6 col-sm-6 desktop pm-center pm-columnPadding-30 pm-column-spacing">
                    <p class="fa fa-comments pm-static-icon"></p>
                    <!-- milestone -->
                    <div class="milestone already-animated">
                        <div class="milestone-content">                         
                            <span data-speed="2000" data-stop="3490" class="milestone-value"><?php echo $_SESSION['nbrContributors'].'/'.$_SESSION['nbrAmis']; ?></span>
                            <div class="milestone-description">De vos amis ont contribué au site</div>
                        </div>
                    </div>
                    <!-- milestone end --> 
                </div>
                
                <div class="col-lg-3 col-md-6 col-sm-6 desktop pm-center pm-columnPadding-30 pm-column-spacing">	
                    <p class="fa fa-eye-slash pm-static-icon"></p> 
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
        </div>
        <!-- PANEL 1 end -->
        
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
        
        <!-- PANEL 4 -->
        <div class="pm-column-container testimonials pm-parallax-panel" style="background-color: rgb(32, 186, 199); background-image: url(&quot;img/home/testimonials-bg.jpg&quot;); background-repeat: repeat-y; background-position: 0% -1376.5px;" data-stellar-background-ratio="0.5" data-stellar-vertical-offset="-50">        
        </div>
        <!-- PANEL 4 end -->
        
        <!-- PANEL 5 -->
        <div class="container pm-containerPadding-top-90 pm-containerPadding-bottom-30">
        	<div class="row">
            	<div class="col-lg-12 pm-columnPadding30 pm-center">
                   <h5>Top commentaires de vos amis </h5>
                    <div class="pm-column-title-divider">
                    	<img height="29" width="29" src="img/divider-icon.png" alt="icon">
                    </div>   
                </div>
            </div>
            <div class="row pm-containerPadding-top-30 pm-containerPadding-bottom-60 pm-center">
            	<!-- Column 1 TO 3 -->
                <?php 
                if (($requeteTopComments->rowCount()) !=0 ) {
                    while ($row = $requeteTopComments->fetch(PDO::FETCH_OBJ)) {
                ?>
                <div class="col-lg-4 col-md-4 col-sm-12 desktop pm-center pm-columnPadding-30 pm-column-spacing">             	
                    <div class="pm-single-testimonial-shortcode">                 	
                    	<div style="background-image:url(<?php echo $row->photo; ?>);" class="pm-single-testimonial-img-bg">
                            <div class="pm-single-testimonial-avatar-icon">
                                <img width="33" height="41" class="img-responsive" src="img/news/post-icon.jpg">
                            </div>
                        </div>         
                        <p class="name"><?php echo $row->prenomAuteur.' '.$row->nomAuteur; ?></p>                      
                        <div class="pm-single-testimonial-divider"></div>
                        <p class="quote"> <?php echo '"'.$row->commentaire.'"'; ?> </p>
                        <div class="pm-single-testimonial-divider"></div>
                        <p class="date"> <?php echo $row->dateCommentaire; ?> </p>
                    </div>
                </div>
                <?php }} ?>
                <!-- Column 1 TO 3 end -->    
            </div>
        </div>
        <!-- PANEL 5 end --> 
    <!-- BODY CONTENT end -->
    <?php include 'footer.html';?>
    </div>

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