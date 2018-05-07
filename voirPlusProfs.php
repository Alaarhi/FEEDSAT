<?php
include 'dbConnection.php';
if (!(isset($_GET['offset'])))
$offset=0;
else 
$offset=$_GET['offset'];

$nextOffset=intval($offset)+9;

$requeteProfs = $bd->prepare('SELECT * FROM professor ORDER BY photo DESC LIMIT '.$offset.',9');
$requeteMesProfs = $bd->prepare (
    'SELECT * FROM `teach` AS t 
    INNER JOIN professor AS p 
    ON (t.profId = p.id) 
    WHERE 
        fosId = (SELECT fosId FROM student AS s WHERE s.id= ?)
        AND level = (SELECT level FROM student AS s WHERE s.id= ?)'
    );

$i=0;

if (isset($_GET['id'])) {
    $idEtudiant = $_GET['id'];
    $requeteMesProfs->execute(array($idEtudiant,$idEtudiant));
    $profs = $requeteMesProfs->fetchALL(PDO::FETCH_ASSOC);
} else {
    $requeteProfs->execute();
    $profs = $requeteProfs->fetchALL(PDO::FETCH_ASSOC);
}

$reponse="";

foreach ($profs as $prof) { 
    $i++;

if($prof['gender']=="1")
$img="img/AvatarFemaleProf.png";
else 
$img="img/AvatarProf2.png";
//while($prof = $requete->fetch()){
$reponse=$reponse.'<!-- Column 1 -->
    <div class="col-lg-4 col-md-4 col-sm-12 desktop pm-center pm-columnPadding-30 pm-column-spacing">
        <!-- Single testimonial -->
        <div class="pm-single-testimonial-shortcode">
            <div style="background-image:url('.$img.');" class="pm-single-testimonial-img-bg">
                <div class="pm-single-testimonial-avatar-icon">
                    <img style="padding-top:3px;" width="36" height="41" src="img/MiniLogo.png" class="img-responsive" >
                </div>
            </div>
           <a href="profile.php?id='.$prof["id"].'"><p class="name">'.$prof["surname"].' '.$prof["name"].'
            </p></a>
            <div class="pm-single-testimonial-divider"></div>
        </div>
        <!-- Single testimonial end -->
      </div>
    <!-- Column 1 end --> ';
    $idprf=$prof['id'];
    }

    echo json_encode(array("reponse" => $reponse, "lastCount" => $nextOffset, "iterations"=>$i));        

?>