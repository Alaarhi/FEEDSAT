
<?php
    include 'dbConnection.php';

    if (!(isset($_GET['offset'])))
        $offset = 0;
    else 
        $offset = $_GET['offset']; 

    $nextOffset = intval($offset) + 9;
    $i = 0;
    $reponse = "";

    //if (isset($_GET['dep'])) {
        $departement =  $_GET['dep'];
        $requeteFiltre = $bd->prepare ('SELECT * FROM professor as p WHERE p.departement = ":departement" LIMIT 0,9'); //LIMIT '.$offset.',9'
        switch ($departement) {
            case "gim":
                $depName = "Génie Informatique et Mathématiques";
                $requeteFiltre->bindParam(':departement', $depName);
                
                break;
    
            case "gpi":
                $depName = "Génie Physique et Instrumentation";
                $requeteFiltre->bindParam(':departement', $depName);         
                break;
    
            case "gbc": 
                $depName = "Génie Biologique et de Chimie";
                $requeteFiltre->bindParam(':departement', $depName);
                break;
    
            case "slf":
                $depName = "Sciences Sociales, Langues et Formation Générale";
                $requeteFiltre->bindParam(':departement', $depName);
                break;
        }
        $requeteFiltre->execute();
        $profs = $requeteFiltre->fetchAll(PDO::FETCH_ASSOC);
        
    /*}
    if ($requeteFiltre->rowCount() != 0) {*/
        
        foreach ($profs as $prof) { 
            
            $i ++;
            
            if($prof['gender']=="1")
                $img = "img/AvatarFemaleProf.png";
            else 
                $img = "img/AvatarProf2.png"; 

            $reponse = $reponse.'<!-- Column 1 -->
            <div class="col-lg-4 col-md-4 col-sm-12 desktop pm-center pm-columnPadding-30 pm-column-spacing">
                <!-- Single testimonial -->
                <div class="pm-single-testimonial-shortcode">
                    <div style="background-image:url('.$img.');" class="pm-single-testimonial-img-bg">
                        <div class="pm-single-testimonial-avatar-icon">
                            <img style="padding-top:3px;" width="36" height="41" src="img/MiniLogo.png" class="img-responsive" >
                        </div>
                    </div>
                    <a href="profile.php?id='.$prof["id"].'"> <p class="name">'.$prof["surname"].' '.$prof["name"].'</p> </a>
                    <div class="pm-single-testimonial-divider"></div>
                    </div>
                    <!-- Single testimonial end -->
              	</div>
                <!-- Column 1 end -->';
                $idprf = $prof['id'];
        }
//    } else {
        $reponse = $reponse.'<div class="col-lg-12 pm-column-spacing pm-center">
                            <h4 class="light" style="font-size:30px;"> 
                                <font color=#303F9F> 
                                    Aucun enseignant de ce nom trouvé. <br> Veuillez réessayer.
                                </font> 
                            </h4></font> 
                            </div>';   
    //} 

    echo json_encode(array("reponse" => $reponse, "lastCount" => $nextOffset, "iterations" => $i));        
?>