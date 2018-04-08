<?php

    include 'dbConnection.php';

    $idEtudiant = $_GET['idEtudiant'];
    $idFiliere = $_GET['idFiliere'];
    $level = $_GET['level'];

    if (!(isset($_GET['offset']))) {
        $offset = 0 ;
    } else {
        $offset = $_GET['offset'];
    }

    $nextOffset = intval($offset) + 4;
    $i = 0;
    $reponse = "";

    //MENU VOS ENSEIGNANTS
    $requeteVosEnseignants = $bd->prepare(
        'SELECT DISTINCT p.id, p.name, p.surname, p.photo, p.linkedIn, p.gender FROM rating as r
        INNER JOIN student as s
        INNER JOIN professor as p
        ON (s.id = r.studentId) AND (p.id = r.profId)
        WHERE  (s.fosId = ?) AND (s.level = ?) AND (s.id != ?)
        LIMIT '.$offset.',4');
    $requeteVosEnseignants->execute(array($idFiliere, $level,$idEtudiant));


    
    if ($_GET['nbrVoters'] == 0) {

        $reponse = $reponse.' 
        <div class="col-lg-12 pm-column-spacing pm-center">
            <h4 class="light" style="font-size: 23px;">
                Aucun étudiant de votre promotion n a pour le moment partagé un feedback sur un de vos enseignants.
                <br> Soyez parmi les premiers le faire!
            </h4>
            <h4 class="light" style="font-size:23px; color: rgb(255,255,255);">
        </div>
        <!--<div class="col-lg-3 pm-column-spacing pm-center"></div>-->
        <div class="col-lg-12 col-md-12 col-sm-12 pm-column-spacing pm-center" style="padding-left:15%;padding-right:30%">
            <div class="pm-comment-reply-btn">
            <br><br>
                <a href= "profs.php?id='.$idEtudiant.'" class="pm-square-btn comment-reply"><b>Donner un Feedback</b></a>
            </div>
            <!--<u><a href="profs.php?id=<?php echo $idEtudiant ?>"><b> Faire un feedback</b></a></u>-->
            </h4>
        </div>
        <!--<div class="col-lg-3 pm-column-spacing pm-center"></div>-->';
    
    } else {
        while ($row = $requeteVosEnseignants->fetch(PDO::FETCH_OBJ)) {
            $i ++;
            if ($row->gender == "1")
                $img = "img/AvatarFemaleProfCarre.png";
            else 
                $img = "img/AvatarProf2Carre.png";
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

            switch($requeteVosEnseignants->rowCount()) {
                case 1:
                    $reponse = $reponse.'<div class="col-lg-3 col-md-3 col-sm-12 pm-column-spacing pm-center" style="margin-left:11.5%">';
                    break;

                case 2:
                    $reponse = $reponse.'<div class="col-lg-6 col-md-6 col-sm-12 pm-column-spacing pm-center"  style="padding-left:15%; padding-right:15%">';
                    break;

                case 3:
                    $reponse = $reponse.'<div class="col-lg-4 col-md-4 col-sm-12 pm-column-spacing pm-center" style="padding-left:5%; padding-right:5%">';
                    break;

                case 4:
                    $reponse = $reponse.'<div class="col-lg-3 col-md-3 col-sm-12 pm-column-spacing pm-center">';
                    break;
            }



            $reponse = $reponse.'
                <!-- Staff profile -->
                    <div class="pm-staff-profile-parent-container" >
                        <div class="pm-staff-profile-container" style="background-image:url('.$img.');">
                            <div class="pm-staff-profile-overlay-container">
                                <ul class="pm-staff-profile-icons">
                                    <li><a href="'.$row->linkedIn.'" class="fa fa-linkedin"></a></li>
                                </ul>
                                <div class="pm-staff-profile-quote">
                                    <br><br><br><br><br><br><a href="profile.php?id='.$row->id.'" class="pm-square-btn pm-center-align"> VOIR PROFIL </a>
                              </div>
                            </div>
                            <a href="profile.php?id='.$row->id.'" class="pm-staff-profile-expander fa fa-plus"></a>
                        </div>

                        <div class="pm-staff-profile-info">
                            <p class="pm-staff-profile-name light">'.$row->surname.' '.$row->name.'</p>
                            <p class="pm-staff-profile-name light">';

                            $moy = round($moyenneProf,2); 
                            
                            $reponse = $reponse.$moy.'/10
                            </p>
                            <p class="pm-staff-profile-title light">';

                            //<?php
                            $numRow = 0;
                            switch ($nbrAmisVotants) {
                                case 0:
                                    $reponse = $reponse.'Aucun étudiant de votre classe n a évalué cet enseignant.
                                        Soyez le premier à le faire!';
                                    break;
                                case 1:
                                    foreach ($AmisVotants as $amiVotant) {
                                        $reponse = $reponse.$amiVotant["prenomEtudiant"].' '.$amiVotant["nomEtudiant"].
                                            ' a évalué cet enseignant.';
                                    }
                                    break;
                                case 2:
                                    foreach ($AmisVotants as $amiVotant) {
                                        if ($numRow != 1) {
                                            $reponse = $reponse.$amiVotant["prenomEtudiant"].' '.$amiVotant["nomEtudiant"].' et ';
                                        } else {
                                            $reponse = $reponse.$amiVotant["prenomEtudiant"].' '.$amiVotant["nomEtudiant"].' ont évalué cet enseignant.';
                                            break;
                                        }
                                        $numRow ++;

                                    }
                                    break;
                                case 3:
                                    foreach ($AmisVotants as $amiVotant) {
                                        if ($numRow != 2) {
                                            $reponse = $reponse.$amiVotant["prenomEtudiant"].' '.$amiVotant["nomEtudiant"].', ';
                                        } else {
                                            $reponse = $reponse.' et '.$amiVotant["prenomEtudiant"].' '.$amiVotant["nomEtudiant"].' ont évalué cet enseignant.';
                                            break;
                                        }
                                        $numRow ++;
                                    }
                                    break;
                                default :
                                    foreach ($AmisVotants as $amiVotant) {
                                        if($numRow != $nbrAmisVotants-1) {
                                            $reponse = $reponse.$amiVotant["prenomEtudiant"].' '.$amiVotant["nomEtudiant"].', ';
                                        }   else {
                                            $reponse = $reponse.'et '.($nbrAmisVotants - 3).' autre(s) étudiant(s) de votre promotion ont évalué cet enseignant.';
                                                break;
                                            }
                                        $numRow ++;
                                    }
                                    break;
                            }
                            $reponse = $reponse.'
                            </p>
                        </div>
                    </div>
                    <!-- Staff profile end -->
                </div>';
                 
        }
    }

    echo json_encode(array("reponse" => $reponse, "lastCount" => $nextOffset, "iterations" => $i));        

?>


