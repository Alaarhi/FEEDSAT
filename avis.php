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

    //MENU TOP COMMENTS
    $requeteTopComments = $bd->prepare(
        'SELECT c.comment as commentaire,
        s.id as idAauteur, s.surname as prenomAuteur, s.name as nomAuteur,
        sum(interaction) as nbrInteractions,
        date_format(c.timestamp, "%d-%m-%Y") as dateCommentaire,
        s.imageUrl as photo
        FROM interact as i
        INNER JOIN student as s
        INNER JOIN comment as c
        ON (c.studentId = s.id) AND (c.id = i.commentId)
        WHERE (s.fosId = ?) AND (c.approved = 1) AND (s.id != ?)
        GROUP BY i.commentId
        ORDER BY nbrInteractions DESC
        LIMIT 0,3');
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
                    	<img height="29" width="32" src="img/MiniLogoWBG.png" alt="icon">
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
            	<div class="row" id="row">
                	<div class="col-lg-12 pm-column-spacing pm-center" style="padding-bottom: 50px;">
                    	<h5 class="light">MES ENSEIGNANTS</h5>
                        <p class="light">
                        Une liste exhaustive des enseignants ayant été évalués par les étudiants de votre promotion.
                        </p>
                    </div>
                </div><!-- /.row -->

                <div id="voirPlus" class="pm-comment-reply-btn">
                    <br>
                    <aS href="javascript:;" onclick="voirPlus();" class="pm-square-btn-comment comment-reply">VOIR PLUS +</a>
                </div>

                    <?php /* if (($requeteVosEnseignants->rowCount()) != 0) { ?>
                        <p class="light" style="font-size:13px">
                        NB: Le score affiché s'agit de la moyenne de cet enseignant attribuée par ce groupe restreint d'étudiants.
                        Le score général, attribué par toute filière confondue, peut être différent. Ce dernier est visible sur le profil de chaque enseignant. 
                        </p>
                    <?php } */ ?>

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
                    	<img height="29" width="32" src="img/MiniLogoWBG.png" alt="icon">
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
                        <div class="col-lg-6 col-md-6 col-sm-12 desktop pm-center pm-columnPadding-30 pm-column-spacing" style="padding-left:0%;padding-right:0%">
                    <?php } ?>

                    <?php if (($requeteTopComments->rowCount()) == 1 ) { ?>
                        <div class="col-lg-12 col-md-12 col-sm-12 desktop pm-center pm-columnPadding-30 pm-column-spacing" style="padding-left:0%;padding-right:0%">
                    <?php } ?>

                    <!--<div class="col-lg-4 col-md-4 col-sm-12 desktop pm-center pm-columnPadding-30 pm-column-spacing">-->
                        <div class="pm-single-testimonial-shortcode">
                            <div style="background-image:url(<?php echo $row->photo; ?>);" class="pm-single-testimonial-img-bg">
                                <div class="pm-single-testimonial-avatar-icon">
                                    <img style="padding-top:3px;" width="36" height="41" src="img/MiniLogoWBG.png" class="img-responsive" >
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


    <script>
    voirPlus();
    var offset = 0;
    function voirPlus() {
        var level = <?php echo $level ?>;
        var idEtudiant = <?php echo $idEtudiant ?>;
        var idFiliere = <?php echo $idFiliere ?>;
        var nbrVoters = <?php echo $_SESSION['nbrVoters'] ?>;
        $.ajax({
            url : 'voirPlusAvis.php',
            type : 'GET',
            data: {
                offset,
                level,
                idEtudiant,
                idFiliere,
                nbrVoters
            },
            dataType : "json",
            success: function(response, statut) {
                console.log("succes");
                console.dir(response);
                if ((response.reponse.length != ""))
                    {
                        $("#row").append(response.reponse);
                        $('#row').fadeIn(2000);
                        offset = response.lastCount;
                        if (response.iterations != 4)
                            $('#voirPlus').hide();
                    }
                else { 
                    $('#voirPlus').hide();
                }
            },
            error: function(response, statut, erreur) {
                console.log(status);
                console.dir(response);
                console.log(erreur);
                alert("error");
            }
        });
    }
    </script>       

    <p id="back-top" class="visible-lg visible-md visible-sm" style="bottom: 10px;"></p>



<div id="ui-datepicker-div" class="ui-datepicker ui-widget ui-widget-content ui-helper-clearfix ui-corner-all"></div></body></html>
