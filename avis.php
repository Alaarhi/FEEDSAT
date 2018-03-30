﻿<?php

    include 'dbConnection.php';

    if (!(isset($_SESSION['idEtudiant']))) {
        header ("location: index.php");
    }

    $idEtudiant = $_SESSION['idEtudiant'];
    $idFiliere = $_SESSION['idFiliere'];
    $level = $_SESSION['level'];


    //Note moyenne attribuée par les étudiants
    //if (!(isset($_SESSION['moyenneFiliere']))) {
        $reqMoyenne = $bd->prepare('SELECT avg(score) as moyenne
            FROM student
            INNER JOIN rating ON student.id = rating.studentId
            WHERE (student.fosId= ?) AND (student.level = ?)');
        $reqMoyenne->execute(array($idFiliere, $level));
        $moyenneFiliere = $reqMoyenne->fetch(PDO::FETCH_OBJ);
        $_SESSION['moyenneFiliere'] = $moyenneFiliere->moyenne;



    //Taux anonymat chez une filière
    //if (!(isset($_SESSION['tauxAnonymes']))) {

        $nbrCommentsAnonymes = 0;
        $nbrCommentsVisibles = 0;
        $tauxAnonymes = 0;

        $requeteTauxAnonyme = $bd->prepare('SELECT visibility as visibilite, count(*) as nbrComments from student
            INNER JOIN comment
            ON (student.id = comment.studentId)
            WHERE (student.fosId = ?) AND (student.level = ?)
            GROUP BY (comment.visibility)');
        $requeteTauxAnonyme->execute(array($idFiliere, $level));

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



    //Nombre d'amis contribuables
    //Extraire le nombre des commentators+voters en éliminant les doublons
    //i.e. celui qui est à la fois commentator et voter sera compté 1 seule fois

    //if (!(isset($_SESSION['nbrContributors']))) {
        $voters = array();
        $commentators = array();
        $contributors = array();

        $requeteNbrAmis = $bd->prepare('SELECT COUNT(*) as nbrAmis FROM student
            WHERE (student.fosId = ?) AND (student.id != ?) AND (student.level = ?)');
        $requeteNbrAmis->execute(array($idFiliere, $idEtudiant, $level));
        $nbrAmis = $requeteNbrAmis->fetch(PDO::FETCH_OBJ);

        $requeteIdOfVoters = $bd->prepare('SELECT DISTINCT studentId FROM rating
            INNER JOIN student
            ON (student.id = rating.studentId)
            WHERE (student.fosId = ?) AND (student.id != ?) AND (student.level = ?)');
        $requeteIdOfVoters->execute(array($idFiliere, $idEtudiant, $level));

        $requeteIdOfCommentators= $bd->prepare('SELECT DISTINCT studentId FROM comment
            INNER JOIN student
            ON (student.id = comment.studentId)
            WHERE (student.fosId = ?) AND (student.id != ?) AND (student.level = ?)');
        $requeteIdOfCommentators->execute(array($idFiliere, $idEtudiant, $level));

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

        $_SESSION['nbrVoters'] = sizeof($voters);
        $_SESSION['nbrCommentators'] = sizeof($commentators);
        $_SESSION['nbrContributors'] = $nbrContributors;
        $_SESSION['nbrAmis'] = ($nbrAmis->nbrAmis);


    // STATISTIQUE #4 : Nombre de profs évalués par mes amis
    $reqNbrProfsRated = $bd->prepare(
        'SELECT count(*) as nbrProfsRated
        FROM rating as r
        INNER JOIN professor as p
        INNER JOIN student as s
        ON (r.studentId = s.id) AND (r.profId = p.id)
        WHERE (s.fosId = ?) AND (s.level = ?)');
    $reqNbrProfsRated->execute(array($idFiliere, $level));

    $nbrProfsRated = $reqNbrProfsRated->fetch(PDO::FETCH_OBJ);
    $_SESSION['nbrProfsRated'] = $nbrProfsRated->nbrProfsRated;


    //MENU VOS ENSEIGNANTS
    $requeteVosEnseignants = $bd->prepare(
        'SELECT DISTINCT p.id, p.name, p.surname, p.photo, p.linkedIn FROM rating as r
        INNER JOIN student as s
        INNER JOIN professor as p
        ON (s.id = r.studentId) AND (p.id = r.profId)
        WHERE  (s.fosId = ?) AND (s.level = ?) AND (s.id != ?)
        LIMIT 0,4');
    $requeteVosEnseignants->execute(array($idFiliere, $level,$idEtudiant));

    //MENU TOP COMMENTS
    $requeteTopComments = $bd->prepare(
        'SELECT c.comment as commentaire,
        s.id as idAauteur, s.surname as prenomAuteur, s.name as nomAuteur,
        sum(interaction) as nbrInteractions,
        date_format(c.timestamp, \'%d-%m-%Y\') as dateCommentaire,
        s.imageUrl as photo
        FROM interact as i
        INNER JOIN student as s
        INNER JOIN comment as c
        ON (c.studentId = s.id) AND (c.id = i.commentId)
        WHERE (s.fosId = ?) AND (c.approved = 1) AND (s.id != ?)
        GROUP BY i.commentId
        ORDER BY nbrInteractions DESC
        LIMIT 0,3'
        );
    $requeteTopComments->execute(array($idFiliere, $idEtudiant));

    include 'header.php';
?>

        <!-- Sub-header area -->
        <div class="pm-sub-header-container">
        	<div class="pm-sub-header-info">
                <div class="container">
                	<div class="row">
                    	<div class="col-lg-12">
                            <p class="pm-page-title"><?php echo 'Bienvenue, '.$_SESSION['prenom']. '!'?></p>
                            <p class="pm-page-message">Découvrez un aperçu sur l'activité des étudiants de votre promotion sur la plateforme.</p>
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
                    <h5> MA PROMOTION EN CHIFFRES </h5>
                    <div class="pm-column-title-divider">
                    	<img height="29" width="29" src="img/divider-icon.png" alt="icon">
                    </div>
                </div>
            </div>
        	<div class="row">

                <div class="col-lg-3 col-md-6 col-sm-6 desktop pm-center pm-columnPadding-30 pm-column-spacing">
                    <p class="fa fa-comments pm-static-icon"></p>
                    <!-- milestone -->
                    <div class="milestone already-animated">
                        <div class="milestone-content">
                            <span data-speed="2000" data-stop="3490" class="milestone-value"><?php echo $_SESSION['nbrContributors'].'/'.$_SESSION['nbrAmis']; ?></span>
                            <div class="milestone-description"><b> Actifs </b> sur la plateforme </div>
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
                            <div class="milestone-description"> Actifs <b> Anonymes </b></div>
                        </div>
                    </div>
                    <!-- milestone end -->
                </div>

            	<div class="col-lg-3 col-md-6 col-sm-6 desktop pm-center pm-columnPadding-30 pm-column-spacing">
                    <p class="fa fa-bar-chart pm-static-icon"></p>
                    <!-- milestone -->
                    <div class="milestone already-animated">
                        <div class="milestone-content">
                            <span data-speed="2000" data-stop="1789" class="milestone-value"><?php printf('%0.2f', $_SESSION['moyenneFiliere']);echo'/10'; ?> </span>
                            <div class="milestone-description"><b> Score moyen </b> attribué</div>
                        </div>
                    </div>
                    <!-- milestone end -->
                </div>

                <div class="col-lg-3 col-md-6 col-sm-6 desktop pm-center pm-columnPadding-30 pm-column-spacing">
                    <p class="fa fa-users pm-static-icon"></p>
                    <!-- milestone -->
                    <div class="milestone already-animated">
                        <div class="milestone-content">
                            <span data-speed="2000" data-stop="439" class="milestone-value"><?php echo $_SESSION['nbrProfsRated'] ?></span>
                            <div class="milestone-description"><b>Enseignant(s) </b> évalué(s)</div>
                        </div>
                    </div>
                    <!-- milestone end -->
                </div>
            </div>
        </div>
        <!-- PANEL 1 end -->

        <!-- PANEL 2 -->
        <div class="pm-column-container testimonials pm-parallax-panel" id="zone-profs" style=" background-image: url('img/home/purple.jpg'); background-repeat: repeat-y; " data-stellar-background-ratio="0" >
        	<div class="container pm-containerPadding-top-70 pm-containerPadding-bottom-20">
            	<div class="row">
                	<div class="col-lg-12 pm-column-spacing pm-center">
                    	<h5 class="light">MES ENSEIGNANTS</h5>
                        <p class="light"><b>
                        Une liste exhaustive des enseignants ayant été évalués par les étudiants de votre promotion.
                        </p></b>
                        <?php if (($requeteVosEnseignants->rowCount()) !=0) { ?>
                        <p class="light" style="font-size:13px">
                        NB: Le score affiché s'agit de la moyenne de cet enseignant attribué par ce groupe restreint d'étudiants.
                        Le score général, attribué par toute filière confondue, peut être différent. Ce dernier est visible sur la profil de chaque enseignant. 
                        </p>
                        <?php } ?>
                        </p>
                        
                    </div>
                    <?php
                    if ($_SESSION['nbrVoters'] == 0) {
                    ?>
                        <div class="col-lg-12 pm-column-spacing pm-center">
                            <h4 class="light" style="font-size: 23px;">
                                Aucun étudiant de votre promotion n'a pour le moment partagé un feedback sur un de vos enseignants.
                                <br> Soyez parmi les premiers le faire!
                            </h4>
                            <h4 class="light" style="font-size:23px; color: rgb(255,255,255);">
                        </div>
                        <!--<div class="col-lg-3 pm-column-spacing pm-center"></div>-->
                        <div class="col-lg-12 col-md-12 col-sm-12 pm-column-spacing pm-center" style="padding-left:15%;padding-right:30%">
                            <div class="pm-comment-reply-btn">
                            <br><br>
                                <a href= "profs.php?id=<?php echo $idEtudiant ?>"; class="pm-square-btn comment-reply"><b>Donner un Feedback</b></a>
                            </div>
                            <!--<u><a href="profs.php?id=<?php //echo $idEtudiant ?>"><b> Faire un feedback</b></a></u>-->
                            </h4>
                        </div>
                        <!--<div class="col-lg-3 pm-column-spacing pm-center"></div>-->
                    <?php
                    }
                    else {
                        while ($row = $requeteVosEnseignants->fetch(PDO::FETCH_OBJ)) {
                        $requeteAmisVotants = $bd->prepare(
                            'SELECT s.surname as prenomEtudiant, s.name AS nomEtudiant,
                            p.id, p.surname AS prenomProf, p.name AS nomProf,
                            r.score
                            FROM student AS s
                            INNER JOIN rating AS r
                            INNER JOIN professor AS p
                            ON (r.studentId = s.id) AND (r.profId = p.id)
                            WHERE (s.id != ?) AND (s.fosId = ?) AND (r.studentLevel = ?) AND (p.id = ?)');
                        $requeteAmisVotants->execute(array($idEtudiant, $idFiliere, $level, $row->id));
                        $nbrAmisVotants = $requeteAmisVotants->rowCount();

                        $AmisVotants = $requeteAmisVotants->fetchALL(PDO::FETCH_ASSOC);


                        $moyenneProf = 0;
                        if ($nbrAmisVotants != 0) {
                            foreach ($AmisVotants as $amiVotant) {
                                $moyenneProf = $moyenneProf + $amiVotant['score'];
                            }
                            $moyenneProf = ($moyenneProf / $nbrAmisVotants);
                        }
                    ?>
                    <?php if (($requeteVosEnseignants->rowCount()) == 1) { ?>
                    <div class="col-lg-12 col-md-12 col-sm-12 pm-column-spacing pm-center" style="padding-left:40%; padding-right:40%">
                    <?php } ?>
                   
                    <?php if (($requeteVosEnseignants->rowCount()) == 2) { ?>
                    <div class="col-lg-6 col-md-6 col-sm-12 pm-column-spacing pm-center"  style="padding-left:15%; padding-right:15%">
                    <?php } ?>

                    <?php if (($requeteVosEnseignants->rowCount()) == 3) { ?>
                    <div class="col-lg-4 col-md-4 col-sm-12 pm-column-spacing pm-center" style="padding-left:5%; padding-right:5%">
                    <?php } ?>

                    <?php if (($requeteVosEnseignants->rowCount()) == 4) { ?>
                    <div class="col-lg-3 col-md-3 col-sm-12 pm-column-spacing pm-center">
                    <?php } ?>

                    <!-- Staff profile -->
                        <div class="pm-staff-profile-parent-container" >
                            <div class="pm-staff-profile-container" style="background-image:url(<?php echo $row->photo; ?>);">
                                <div class="pm-staff-profile-overlay-container">
                                    <ul class="pm-staff-profile-icons">
                                        <li><a href="<?php echo $row->linkedIn?>" class="fa fa-linkedin"></a></li>
                                    </ul>
                                    <div class="pm-staff-profile-quote">
                                        <!--<p>"The good physician treats the disease; the great physician treats the patient who has the disease."</p>-->
                                        <br><br><br><br><br><br><a href="profile.php?id=<?php echo $row->id ?>" class="pm-square-btn pm-center-align">VOIR PROFIL</a>
                                    </div>
                                </div>
                                <a href="#" class="pm-staff-profile-expander fa fa-plus"></a>
                            </div>

                            <div class="pm-staff-profile-info">
                                <p class="pm-staff-profile-name light"><?php echo $row->surname.' '.$row->name; ?></p>
                                <p class="pm-staff-profile-name light">
                                <?php printf('%0.2f', $moyenneProf); echo '/10'?>
                                </p>
                                <p class="pm-staff-profile-title light">
                                <?php
                                $numRow = 0;
                                switch ($nbrAmisVotants) {
                                    case 0:
                                        echo 'Aucun étudiant de votre classe n\'a évalué cet enseignant.
                                            Soyez le premier à le faire!';
                                        break;
                                    case 1:
                                        foreach ($AmisVotants as $amiVotant) {
                                            echo $amiVotant['prenomEtudiant'].' '.$amiVotant['nomEtudiant'].
                                                ' a évalué cet enseignant.';
                                        }
                                        break;
                                    case 2:
                                        foreach ($AmisVotants as $amiVotant) {
                                            if ($numRow != 1) {
                                                echo $amiVotant['prenomEtudiant'].' '.$amiVotant['nomEtudiant'].' et ';
                                            } else {
                                                echo $amiVotant['prenomEtudiant'].' '.$amiVotant['nomEtudiant'].' ont évalué cet enseignant.';
                                                break;
                                            }
                                            $numRow ++;

                                        }
                                        break;
                                    case 3:
                                        foreach ($AmisVotants as $amiVotant) {
                                            if ($numRow != 2) {
                                                echo $amiVotant['prenomEtudiant'].' '.$amiVotant['nomEtudiant'].', ';
                                            } else {
                                                echo ' et '.$amiVotant['prenomEtudiant'].' '.$amiVotant['nomEtudiant'].' ont évalué cet enseignant.';
                                                break;
                                            }
                                            $numRow ++;
                                        }
                                        break;
                                    default :
                                        foreach ($AmisVotants as $amiVotant) {
                                            if($numRow != $nbrAmisVotants-1) {
                                                echo $amiVotant['prenomEtudiant'].' '.$amiVotant['nomEtudiant'].', ';
                                            }   else {
                                                    echo 'et '.($nbrAmisVotants - 3).' autre(s) étudiant(s) de votre promotion ont évalué cet enseignant.';
                                                    break;
                                                }
                                            $numRow ++;
                                        }
                                        break;
                                }
                                ?>
                                </p>
                            </div>
                        </div>
                        <!-- Staff profile end -->
                    </div>
                    <?php } ?>
                    </div>
                    <?php } ?>
                    <?php if (($requeteVosEnseignants->rowCount()) == 4) { ?>
                        <div class="row">
                            <div class="pm-comment-reply-btn">
                                <br><br>
                                <a href= "#"; class="pm-square-btn-comment-avis comment-reply"><b>VOIR PLUS</b></a>
                            </div>
                        </div>
                    </div>
                    <?php } ?>
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
                   <h5> MEILLEURS COMMENTAIRES </h5>
                    <div class="pm-column-title-divider">
                    	<img height="29" width="29" src="img/divider-icon.png" alt="icon">
                    </div>
                </div>
            </div>
            <div class="row pm-containerPadding-top-30 pm-containerPadding-bottom-60 pm-center">
            	<!-- Column 1 TO 3 -->
                <?php
                if ($_SESSION['nbrCommentators'] == 0) {
                    echo '<div class="col-lg-12 pm-column-spacing pm-center">
                    <h4 class="light" style="font-size:30px;"> <font color=#303F9F> Vos amis n\'ont pas de commentaires sur le site, pour le moment.</font></h4>

                    <h4 class="light" style="font-size:20px;"><font color=#303F9F>
                    <u><a href="profs.php"> Donnez un feedback </a> </u> (sous forme d\'un commentaire) sur le profil d\'un de vos enseignant.
                    </h4>
                    </font>
                    </div>';
                }
                else {
                    if (($requeteTopComments->rowCount()) !=0 ) {
                        while ($row = $requeteTopComments->fetch(PDO::FETCH_OBJ)) {
                    ?>

                    <?php if (($requeteTopComments->rowCount()) == 3 ) { ?>
                        <div class="col-lg-4 col-md-4 col-sm-12 desktop pm-center pm-columnPadding-30 pm-column-spacing">
                    <?php } ?>

                    <?php if (($requeteTopComments->rowCount()) == 2 ) { ?>
                        <div class="col-lg-6 col-md-6 col-sm-12 desktop pm-center pm-columnPadding-30 pm-column-spacing" style="padding-left:15%;padding-right:15%">
                    <?php } ?>

                    <?php if (($requeteTopComments->rowCount()) == 1 ) { ?>
                        <div class="col-lg-12 col-md-12 col-sm-12 desktop pm-center pm-columnPadding-30 pm-column-spacing" style="padding-left:40%;padding-right:40%">
                    <?php } ?>

                    <!--<div class="col-lg-4 col-md-4 col-sm-12 desktop pm-center pm-columnPadding-30 pm-column-spacing">-->
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
                            <p class="date"> <?php echo $row->dateCommentaire; ?> <br> <?php echo $row->nbrInteractions.' intéraction(s)';?> </p>
                        </div>
                    </div>
                    <?php }}} ?>
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
