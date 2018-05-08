<?php 
    include 'dbConnection.php';   

    $test=$bd->query('select * from rating');
    $resTest=$test->fetch();
    if($test->rowCount()!=0)
    {
    $ind=0;
    $req0=$bd->query('select id from professor');    
    while($result0=$req0->fetch())  
         {  
            $req=$bd->query('select * from rating where profId='.$result0['id']);
            $cdc=0; $tdp=0; $pdg=0; $adc=0; $cdln = 0; $i=0;$note=0;
            if($req->rowCount()!=0)
                {
                    while($result=$req->fetch())
                        {   
                            $cdc+= intval($result['courseContent']);
                            $tdp+= intval($result['absenteism']);
                            $pdg+= intval($result['pedagogy']);
                            $adc+= intval($result['ambiance']);
                            $cdln+= intval($result['gradesCredibility']);    
                            $i=$i+1;    
                        }
                  //  if($i>0)
                    //    {
                            $cdc=$cdc/$i; $tdp=$tdp/$i; $pdg=$pdg/$i; $adc=$adc/$i; $cdln = $cdln/$i;
                      //  }
                    $req5=$bd->query('select * from rcriteria');                        
                    while ($result5=$req5->fetch())
                        {
                            if($result5['criteria']=="Ambiance en classe")
                            $adcr=$result5['weight'];
                            if($result5['criteria']=="Contenu du cours")
                            $cdcr=$result5['weight'];
                            if($result5['criteria']=="Crédibilité de la note")
                            $cdlnr=$result5['weight'];
                            if($result5['criteria']=="Pédagogie")
                            $pdgr=$result5['weight'];
                            if($result5['criteria']=="Taux de présence")
                            $tdpr=$result5['weight'];   
                        }
                    $note=($cdc*$cdcr+$adc*$adcr+$cdln*$cdlnr+$pdg*$pdgr+$tdp*$tdpr)/10;
                    $tabIdProf[$ind]=$result0['id'];
                    $tabNote[$ind]=$note;
                    $ind++;    
                }    
        }//fin while 1
    $max=0;
    $imax=0;
    $min=10;
    $imin=0;
    for ($num= 0; $num<$ind; $num++)
    {
        if($tabNote[$num]>$max)
                {$max=$tabNote[$num];
                $imax=$num;}
        if($tabNote[$num]<$min)
                {$min=$tabNote[$num];
                $imin=$num;}
    }
    //Best:
    $idBestProfRate=$tabIdProf[$imax];
    $noteBest=$tabNote[$imax];
    $req2=$bd->query('select * from professor where id='.$idBestProfRate);
    $result2=$req2->fetch();
    $nomBestProf=$result2['name'];
    $prenomBestProf=$result2['surname'];
    $grade=$result2['grade'];
    if($grade=="Professeur")
        $gradeBestProf="Pr.";
    if($grade=="Maître de Conférences")
        $gradeBestProf="MC.";
    if($grade=="Maître Assistant")
        $gradeBestProf="MA.";
    if($grade=="Assistant")
        $gradeBestProf="A.";
    //Min:
    $idWorstProfRate=$tabIdProf[$imin];
    $noteWorst=$tabNote[$imin];    
    $req3=$bd->query('select * from professor where id='.$idWorstProfRate);
    $result3=$req3->fetch();
    $nomWorstProf=$result3['name'];
    $prenomWorstProf=$result3['surname'];
    $grade=$result3['grade'];
    if($grade=="Professeur")
        $gradeWorstProf="Pr.";
    if($grade=="Maître de Conférences")
        $gradeWorstProf="MC.";
    if($grade=="Maître Assistant")
        $gradeWorstProf="MA.";
    if($grade=="Assistant")
        $gradeWorstProf="A.";
    }
    else
    {
        $nomBestProf="aucun";
        $prenomBestProf="prof";
        $gradeBestProf="existe";

        $nomWorstProf="aucun";
        $prenomWorstProf="Prof";
        $gradeWorstProf="existe";

    }

//prof avec le plus de feedbacks:
$reqFeed=$bd->query('select COUNT(profId),profId from rating GROUP BY profId ORDER BY COUNT(profId) DESC');    
$resultFeed=$reqFeed->fetch();

if($reqFeed->rowCount()!=0)
{
$reqProf=$bd->query('select * from professor where id='.$resultFeed['profId']);
$resultProf=$reqProf->fetch();

$nomPlusFeed=$resultProf['name'];
$prenomPlusFeed=$resultProf['surname'];
$grade=$resultProf['grade'];
if($grade=="Professeur")
    $gradePlusFeed="Pr.";
if($grade=="Maître de Conférences")
    $gradePlusFeed="MC.";
if($grade=="Maître Assistant")
    $gradePlusFeed="MA.";
if($grade=="Assistant")
    $gradePlusFeed="A.";
}
else
{
    $nomPlusFeed="Aucun";
    $prenomPlusFeed="prof";
    $gradePlusFeed="existe";
}
//nombre interactions:
$reqnbinteract=$bd->query('select COUNT(*) from interact');
$resultnbinteract=$reqnbinteract->fetch();

//nombre comments:
$reqnbincom=$bd->query('select COUNT(*) from comment where approved=1');
$resultnbcom=$reqnbincom->fetch();

// nb feedbacks:
$reqfeed=$bd->query('select COUNT(*) from rating');
$nbfeed=$reqfeed->fetch();

//taux participation:
$reqnbstudent=$bd->query('select COUNT(*) from student');
$resultnbstudent=$reqnbstudent->fetch();
$interm = $bd->query('select COUNT(*) as count from ( select count(*) from rating group by studentId) as B');
$interm = $interm->fetch();
$taux=round(($interm['count']/$resultnbstudent[0])*100,2);

//Best comments:
$reqBestCom=$bd->query('select COUNT(commentId),commentId,studentId from interact GROUP BY commentId ORDER BY COUNT(commentId) DESC');    
$nbCom=0;
while(($resultBestCom=$reqBestCom->fetch()) && $nbCom<3 )
{
    $reqCom=$bd->query('select comment,visibility, studentId, profId from comment where id='.$resultBestCom["commentId"]);
    $resultCom=$reqCom->fetch();
    $reqSt=$bd->query('select name,surname,level,fosId from student where id='.$resultCom["studentId"]);
    $resultSt=$reqSt->fetch(); 

    $tabCom[$nbCom]=$resultCom["comment"];
    $tabStName[$nbCom]=$resultSt['name'];
    $tabStSurname[$nbCom]=$resultSt['surname'];
    $tabStLevel[$nbCom]=$resultSt['level']; 
    $tabComVis[$nbCom]=$resultCom["visibility"];

    $reqProf=$bd->query('select name,surname,grade from professor where id='.$resultCom["profId"]);    
    $resProf=$reqProf->fetch();
    $nom[$nbCom]=$resProf['name'];
    $prenom[$nbCom]=$resProf['surname'];
    $grade[$nbCom]=$resProf['grade'];

    $reqFos=$bd->query('select fos from fos where id='.$resultSt["fosId"]);
    $resultFos=$reqFos->fetch();

    if($resultFos[0]=="Réseaux informatiques et télécommunications") $tabStFos[$nbCom]="RT";
    if($resultFos[0]=="Génie Logiciel") $tabStFos[$nbCom]="GL";
    if($resultFos[0]=="Biologie") $tabStFos[$nbCom]="BIO";
    if($resultFos[0]=="Chimie") $tabStFos[$nbCom]="CH";
    if($resultFos[0]=="Informatique Industrielle et Automatique") $tabStFos[$nbCom]="IIA";
    if($resultFos[0]=="Instrumentation et maintenance industrielle") $tabStFos[$nbCom]="IMI";
    $nbCom++;
}
 
//satisfaction:
$reqMPI=$bd->query('select COUNT(score) from rating, student where( (rating.score>=5) 
and (rating.studentId=student.id) and (student.fosId=0) )');
$reqBIO=$bd->query('select COUNT(score) from rating, student where( (rating.score>=5) 
and (rating.studentId=student.id) and (student.fosId=1) )');
$reqCBA=$bd->query('select COUNT(score) from rating, student where( (rating.score>=5) 
and (rating.studentId=student.id) and (student.fosId=2) )');
$reqCH=$bd->query('select COUNT(score) from rating, student where( (rating.score>=5) 
and (rating.studentId=student.id) and (student.fosId=3) )');
$reqGL=$bd->query('select COUNT(score) from rating, student where( (rating.score>=5) 
and (rating.studentId=student.id) and (student.fosId=4) )');
$reqIIA=$bd->query('select COUNT(score) from rating, student where( (rating.score>=5) 
and (rating.studentId=student.id) and (student.fosId=5) )');
$reqIMI=$bd->query('select COUNT(score) from rating, student where( (rating.score>=5) 
and (rating.studentId=student.id) and (student.fosId=6) )');
$reqRT=$bd->query('select COUNT(score) from rating, student where( (rating.score>=5) 
and (rating.studentId=student.id) and (student.fosId=13) )');

$resultMPI=$reqMPI->fetch();
$resultBIO=$reqBIO->fetch();
$resultCBA=$reqCBA->fetch();
$resultCH=$reqCH->fetch();
$resultGL=$reqGL->fetch();
$resultIIA=$reqIIA->fetch();
$resultIMI=$reqIMI->fetch();
$resultRT=$reqRT->fetch();

$rMPI=$bd->query('select COUNT(score) from rating, student where( 
(rating.studentId=student.id) and (student.fosId=0) )');
$rBIO=$bd->query('select COUNT(score) from rating, student where( 
(rating.studentId=student.id) and (student.fosId=1) )');
$rCBA=$bd->query('select COUNT(score) from rating, student where( 
(rating.studentId=student.id) and (student.fosId=2) )');
$rCH=$bd->query('select COUNT(score) from rating, student where( 
(rating.studentId=student.id) and (student.fosId=3) )');
$rGL=$bd->query('select COUNT(score) from rating, student where( 
 (rating.studentId=student.id) and (student.fosId=4) )');
$rIIA=$bd->query('select COUNT(score) from rating, student where( 
(rating.studentId=student.id) and (student.fosId=5) )');
$rIMI=$bd->query('select COUNT(score) from rating, student where( 
(rating.studentId=student.id) and (student.fosId=6) )');
$rRT=$bd->query('select COUNT(score) from rating, student where( 
(rating.studentId=student.id) and (student.fosId=13) )');

$resultMPI1=$rMPI->fetch();
$resultBIO1=$rBIO->fetch();
$resultCBA1=$rCBA->fetch();
$resultCH1=$rCH->fetch();
$resultGL1=$rGL->fetch();
$resultIIA1=$rIIA->fetch();
$resultIMI1=$rIMI->fetch();
$resultRT1=$rRT->fetch();

if($resultMPI1[0] > 0) 
{
$MPI=$resultMPI[0]*100/$resultMPI1[0];
$MPI=round($MPI,1);
}
else {$MPI=0;}
if($resultBIO1[0] > 0) 
{
$BIO= $resultBIO[0]*100/$resultBIO1[0];
$BIO=round($BIO,1);
}
else {$BIO=0;}
if($resultCBA1[0] > 0) 
{
$CBA=$resultCBA[0]*100/$resultCBA1[0];
$CBA=round($CBA,1);
}
else {$CBA=0;}
if($resultCH1[0] > 0) 
{
$CH=$resultCH[0]*100/$resultCH1[0];
$CH=round($CH,1);
}
else {$CH=0;}
if($resultGL1[0] > 0) 
{
$GL=$resultGL[0]*100/$resultGL1[0];
$GL=round($GL,1);
}
else {$GL=0;}
if($resultIIA1[0] > 0) 
{
$IIA=$resultIIA[0]*100/$resultIIA1[0];
$IIA=round($IIA,1);
}
else {$IIA=0;}
if($resultIMI1[0] > 0) 
{
$IMI=$resultIMI[0]*100/$resultIMI1[0];
$IMI=round($IMI,1);
}
else {$IMI=0;}
if($resultRT1[0] > 0) 
{
$RT=($resultRT[0]*100/$resultRT1[0]);
$RT=round($RT,1);
}
else {$RT=0;}
        
                    

    
?>
<?php include 'header.php'; ?>
        <!-- SLIDER AREA -->
        <div class="pm-pulse-container" id="pm-pulse-container">
        
                    <div id="pm-pulse-loader">
                        <img src="js/pulse/img/ajax-loader.gif" alt="Slider Loading" />
                    </div>
        
                    <div id="pm-slider" class="pm-slider">
        
                        <div id="pm-slider-progress-bar"></div>
        
                        <ul class="pm-slides-container" id="pm_slides_container">
        
                            <!-- FULL WIDTH slides -->
                            <li data-thumb="" class="pmslide_0"><img src="img/insights2.jpg" alt="img01" />
        
        
                                    <div class="pm-holder">
                                        <div class="pm-caption">
                                              <h1>Rejoignez la communauté</h1>
                                              <span class="pm-caption-decription">
                                                Parce que votre voix compte
                                              </span>
                                              <span class="pm-caption-excerpt">
                                                <b>Un espace où les étudiants peuvent partager leurs points de vue librement</b>
                                              </span>
                                              <a href="about.php" class="pm-slide-btn">À propos de nous <i class="fa fa-plus"></i></a>
                                        </div>
                                    </div>
        
        
                            </li>
        
                            <li data-thumb="" class="pmslide_1"><img src="img/inss.jpg" alt="img02" />
        
        
                                    <div class="pm-holder">
                                        <div class="pm-caption">
                                              <h1>Un pas de plus </h1>
                                              <span class="pm-caption-decription">
                                              vers un changement positif
                                              </span>
                                              <span class="pm-caption-excerpt">
                                               <b> Tout étudiant a un rôle à jouer. Ne soyez plus un simple spectateur. </b>
                                              </span>
                                              <a href="profs.php" class="pm-slide-btn">Partagez un feedback <i class="fa fa-plus"></i></a>
                                        </div>
                                    </div>
        
        
                            </li>
        
                            <li data-thumb="" class="pmslide_2"><img src="img/ins.jpg" alt="img02" />
        
        
                                    <div class="pm-holder">
                                        <div class="pm-caption">
                                              <h1>Partagez un feedback</h1>
                                              <span class="pm-caption-decription">
                                                Votez, commentez, intéragissez
                                              </span>
                                              <span class="pm-caption-excerpt">
                                                <b>Vous pouvez intéragir de plusieurs manières avec vos enseignants ou vos camarades </b>
                                              </span>
                                              <a href="about.php" class="pm-slide-btn">Plus d'informations<i class="fa fa-plus"></i></a>
                                        </div>
                                    </div>
        
        
                            </li>
        
                        </ul>
        
                    </div>
        
                </div>

 		<!-- SLIDER AREA end -->

        <!-- BODY CONTENT starts here -->

       	<!-- PANEL 1 -->
        <div class="container pm-containerPadding-top-100 pm-containerPadding-bottom-90">
        	<div class="row">
            <div class="col-lg-12 pm-center pm-containerPadding-bottom-0">

                  <h5>  PROFILS DU MOMENT </h5>
                  <div class="pm-column-title-divider">
                    <img height="29" width="32" src="img/MiniLogoWBG.png" alt="icon">
                    <br><br>
                  </div>

              </div>

            	<!-- Column 1 -->
                <div class="col-lg-4 col-md-4 col-sm-12 pm-center pm-columnPadding-30 pm-column-spacing wow fadeInUp animated" data-wow-delay="0.3s" data-wow-offset="50" data-wow-duration="1s">

                	<a href="#" class="fa fa-hand-o-up pm-icon-btn"></a>

                    <h6 class="pm-column-title"><?php echo($gradeBestProf." ".$nomBestProf." ".$prenomBestProf); ?></h6>
                    <h7 class="pm-column-subtitle">Le profil avec le plus de<b>  feedbacks positifs </b></h7>

                    <div class="pm-title-divider"></div>

                    <p>
                        En première place sur le podium, ce profil détient actuellement le meilleur score 
                        sur la plateforme. Ceci reflète la satisfaction de ses étudiants
                        et sa popularité auprès d'eux.
                    </p>

                    <?php
                    if($nomBestProf<>"aucun"){ ?>
                    <a href="profile.php?id=<?php echo($idBestProfRate); ?>" class="pm-standard-link">Voir profil <i class="fa fa-plus"></i></a>
                  <?php  } ?>
                </div>
                <!-- Column 1 end -->

                <!-- Column 2 -->
                <div class="col-lg-4 col-md-4 col-sm-12 pm-center pm-columnPadding-30 pm-column-spacing wow fadeInUp animated
" data-wow-delay="0.6s" data-wow-offset="50" data-wow-duration="1s">

                    <a href="#" class="fa fa-hand-o-down pm-icon-btn"></a>

                    <h6 class="pm-column-title"><?php echo($gradeWorstProf." ".$nomWorstProf." ".$prenomWorstProf); ?></h6>
                    <h7 class="pm-column-subtitle">Le profil avec le plus de <b> feedbacks négatifs </b> </h7>

                    <div class="pm-title-divider"></div>
                    <p>
                        Avec le score le plus bas sur la plateforme, cet enseignant doit 
                        sa notoriété à l'insatisfaction de ses étudiants et l'accumulation 
                        des critiques négatives le concernant.
                    </p>
                    <?php
                    if($nomWorstProf<>"aucun"){ ?>
                    <a href="profile.php?id=<?php echo($idWorstProfRate); ?>" class="pm-standard-link">Voir profil<i class="fa fa-plus"></i></a>
                    <?php  } ?>
                </div>
                <!-- Column 2 end -->

                <!-- Column 3 -->
                <div class="col-lg-4 col-md-4 col-sm-12 pm-center pm-columnPadding-30 wow fadeInUp animated
" data-wow-delay="0.9s" data-wow-offset="50" data-wow-duration="1s">

                    <a href="#" class="fa fa-fire pm-icon-btn"></a>

                    <h6 class="pm-column-title"><?php echo($gradePlusFeed." ".$nomPlusFeed." ".$prenomPlusFeed); ?></h6>
                    <h7 class="pm-column-subtitle">Le profil le <b> plus populaire </b></h7>

                    <div class="pm-title-divider"></div>
                    <p>
                        Ce profil occupe la première place dans le classement 
                        des profils les plus visités, commentés et évalués en ce moment.

                    </p><br>
                    <?php
                    if($nomWorstProf<>"aucun"){ ?>
                    <a href="profile.php?id=<?php echo($resultFeed['profId']); ?>" class="pm-standard-link">Voir profil<i class="fa fa-plus"></i></a>
                    <?php  } ?>
                </div>
                <!-- Column 3 end -->

            </div>
        </div>
        <!-- PANEL 1 end -->

        <!-- PANEL 4 -->
        <div class="pm-column-container testimonials pm-parallax-panel" style="background-color:#A34DE9; background-image:url(img/home/purple.jpg);  background-repeat:repeat-y;" data-stellar-background-ratio="0.5" data-stellar-vertical-offset="-20">

          <!-- Column message -->
        	<div class="pm-column-container-message">
            <p><strong>INSAT-FEEDBACKS</strong> permet aux étudiants de toutes les filières de l'INSAT de s'exprimer librement et partager leurs retours d'expérience </p>
            </div>
            <!-- Column message end -->


          <div class="container pm-containerPadding-top-40 pm-containerPadding-bottom-80">
              <div class="row">

                <div class="col-lg-12 col-md-12">
                  <h4 class="light">Quelques chiffres sur le taux de satisfaction de chaque filière</h4>
                    <div class="pm-divider light"></div>
                    <br />
                </div>

                <div class="col-lg-5 col-md-5">
                      <!-- Progress bar -->
                      <div class="pm-progress-bar-description" id="pm-progress-bar-desc-1">
                          1er Cycle (MPI)
                          <div class="pm-progress-bar-diamond"></div>
                          <span><?php echo($MPI."%"); ?></span>
                      </div>
                      <div class="pm-progress-bar">
                          <span data-width="<?php echo($MPI); ?>" class="pm-progress-bar-outer" id="pm-progress-bar-1">
                              <span class="pm-progress-bar-inner"></span>
                          </span>
                      </div>
                      <!-- Progress bar end -->

                      <!-- Progress bar -->
                      <div class="pm-progress-bar-description" id="pm-progress-bar-desc-2">
                          Génie Logiciel (GL)
                          <div class="pm-progress-bar-diamond"></div>
                          <span><?php echo($GL."%"); ?></span>
                      </div>
                      <div class="pm-progress-bar">
                          <span data-width="<?php echo($GL); ?>" class="pm-progress-bar-outer" id="pm-progress-bar-2">
                              <span class="pm-progress-bar-inner"></span>
                          </span>
                      </div>
                      <!-- Progress bar end -->

                      <!-- Progress bar -->
                      <div class="pm-progress-bar-description" id="pm-progress-bar-desc-3">
                          Informatique Industrielle Automatique (IIA)
                          <div class="pm-progress-bar-diamond"></div>
                          <span><?php echo($IIA."%"); ?></span>
                      </div>
                      <div class="pm-progress-bar">
                          <span data-width="<?php echo($IIA); ?>" class="pm-progress-bar-outer" id="pm-progress-bar-3">
                              <span class="pm-progress-bar-inner"></span>
                          </span>
                      </div>
                      <!-- Progress bar end -->

                      <!-- Progress bar -->
                      <div class="pm-progress-bar-description" id="pm-progress-bar-desc-4">
                          Chimie Industrielle (CH)
                          <div class="pm-progress-bar-diamond"></div>
                          <span><?php echo($CH."%"); ?></span>
                      </div>
                      <div class="pm-progress-bar">
                          <span data-width="<?php echo($CH); ?>" class="pm-progress-bar-outer" id="pm-progress-bar-4">
                              <span class="pm-progress-bar-inner"></span>
                          </span>
                      </div>
                      <!-- Progress bar end -->

                  </div>

                  <div class="col-lg-2 col-md-2"></div>
                  <div class="col-lg-5 col-md-5">
                      <!--<h4 class="light">Our core strengths</h4>
                        <div class="pm-divider light"></div>
                        <br />-->

                        <!-- Progress bar -->
                        <div class="pm-progress-bar-description" id="pm-progress-bar-desc-5">
                            1er Cycle (CBA)
                            <div class="pm-progress-bar-diamond"></div>
                            <span><?php echo($CBA."%"); ?></span>
                        </div>
                        <div class="pm-progress-bar">
                            <span data-width="<?php echo($CBA); ?>" class="pm-progress-bar-outer" id="pm-progress-bar-5">
                                <span class="pm-progress-bar-inner"></span>
                            </span>
                        </div>
                        <!-- Progress bar end -->

                        <!-- Progress bar -->
                        <div class="pm-progress-bar-description" id="pm-progress-bar-desc-6">
                            Réseaux Informatiques et Télécommunications (RT)
                            <div class="pm-progress-bar-diamond"></div>
                            <span><?php echo($RT."%"); ?></span>
                        </div>
                        <div class="pm-progress-bar">
                            <span data-width="<?php echo($RT); ?>" class="pm-progress-bar-outer" id="pm-progress-bar-6">
                                <span class="pm-progress-bar-inner"></span>
                            </span>
                        </div>
                        <!-- Progress bar end -->

                        <!-- Progress bar -->
                        <div class="pm-progress-bar-description" id="pm-progress-bar-desc-7">
                            Instrumentation et Maintenance Industrielle (IMI)
                            <div class="pm-progress-bar-diamond"></div>
                            <span><?php echo($IMI."%"); ?></span>
                        </div>
                        <div class="pm-progress-bar">
                            <span data-width="<?php echo($IMI); ?>" class="pm-progress-bar-outer" id="pm-progress-bar-7">
                                <span class="pm-progress-bar-inner"></span>
                            </span>
                        </div>
                        <!-- Progress bar end -->

                        <!-- Progress bar -->
                        <div class="pm-progress-bar-description" id="pm-progress-bar-desc-8">
                            Biologie Industrielle (BIO)
                            <div class="pm-progress-bar-diamond"></div>
                            <span><?php echo($BIO."%"); ?></span>
                        </div>
                        <div class="pm-progress-bar">
                            <span data-width="<?php echo($BIO); ?>" class="pm-progress-bar-outer" id="pm-progress-bar-8">
                                <span class="pm-progress-bar-inner"></span>
                            </span>
                        </div>
                        <!-- Progress bar end -->

                    </div>
                  </div><!-- /.row -->
            </div><!-- /.container -->

        </div>
        <!-- PANEL 4 end -->

        <!-- PANEL 3 -->
        <div class="container pm-containerPadding-top-70 pm-containerPadding-bottom-60">

          <div class="row">
              <div class="col-lg-12 pm-columnPadding30 pm-center">

                    <h5>HIGHLIGHTS</h5>
                    <div class="pm-column-title-divider">
                      <img height="29" width="32" src="img/MiniLogoWBG.png" alt="icon">
                      <br>
                    </div>

                </div>
            </div>

          <div class="row">

              <div class="col-lg-3 col-md-6 col-sm-6 desktop pm-center pm-columnPadding-30 pm-column-spacing">

                    <p class="fa fa-line-chart pm-static-icon"></p>


                    <!-- milestone -->
                    <div class="milestone">
                        <div class="milestone-content">
                            <span data-speed="2000" data-stop="<?php echo $taux; ?>" class="milestone-value"></span>
                            <div class="milestone-description"> % Taux de participation en pourcentage </div>
                        </div>
                    </div>
                    
                    <!-- milestone end -->

                </div>

                <div class="col-lg-3 col-md-6 col-sm-6 desktop pm-center pm-columnPadding-30 pm-column-spacing">

                    <p class="fa fa-comment-o pm-static-icon"></p>

                    <!-- milestone -->
                    <div class="milestone">
                        <div class="milestone-content">
                            <span data-speed="2000" data-stop="<?php echo($resultnbcom[0]); ?>" class="milestone-value"></span>
                            <div class="milestone-description"> Commentaires </div>
                        </div>
                    </div>
                    <!-- milestone end -->

                </div>

                <div class="col-lg-3 col-md-6 col-sm-6 desktop pm-center pm-columnPadding-30 pm-column-spacing">

                    <p class="fa fa-thumbs-o-up pm-static-icon"></p>

                    <!-- milestone -->
                    <div class="milestone">
                        <div class="milestone-content">
                            <span data-speed="2000" data-stop="<?php echo($resultnbinteract[0]); ?>" class="milestone-value"></span>
                            <div class="milestone-description"> Intéractions sur les commentaires </div>
                        </div>
                    </div>
                    <!-- milestone end -->

                </div>

                <div class="col-lg-3 col-md-6 col-sm-6 desktop pm-center pm-columnPadding-30 pm-column-spacing">

                <p class="typcn typcn-group pm-static-icon"></p>                    
                    <!-- milestone -->
                    <div class="milestone">
                        <div class="milestone-content">
                            <span data-speed="2000" data-stop="<?php echo($nbfeed[0]); ?>" class="milestone-value"></span>
                            <div class="milestone-description"> Ratings </div>
                        </div>
                    </div>
                    <!-- milestone end -->

                </div>

            </div>

        </div>
        <!-- PANEL 3 end -->

        <!-- PANEL 6 -->
        <?php if($nbCom>=3)
                                {?>
        <div class="pm-column-container testimonials pm-parallax-panel" style="background-color:#A34DE9; background-image:url(img/home/purple.jpg); background-repeat:repeat-y;" data-stellar-background-ratio="0.5" data-stellar-vertical-offset="0">

            <div class="container pm-containerPadding100">
            	<div class="row">
                
                	<div class="col-lg-12 pm-center">
                        <h5 class="light">LES MEILLEURS COMMENTAIRES</h5>
                        <center><div class="pm-divider light"></div></center>
                    </div>

                	<div class="pm-testimonials-carousel" id="pm-testimonials-carousel">

                    	<ul class="pm-testimonial-items">
                        
                        	<li>
                                <div class="pm-testimonial-img" style="background-image:url(img/avatarEtudiant.jpg);">
                                </div>
                                <?php if($tabComVis[0]== "1") { ?>
                                <p class="pm-testimonial-name"> <?php echo($tabStSurname[0]." ".$tabStName[0]); ?> </p>
                                <p class="pm-testimonial-title"> <?php echo($tabStFos[0]." ".$tabStLevel[0]); ?></p>
                                <?php }
                                else { ?>
                                    <p class="pm-testimonial-name"> <?php echo("anonyme"); ?> </p>
                                <?php } ?>
                                <div class="pm-testimonial-divider"> </div>
                                <p class="pm-testimonial-quote"><?php echo("<b>à ".$nom[0]." ".$prenom[0]." :</b> ".$tabCom[0]); ?></p>
                            </li>


                            <li>
                                <div class="pm-testimonial-img" style="background-image:url(img/avatarEtudiant.jpg);">
                                </div>
                                <?php if($tabComVis[1]== "1") { ?>
                                    <p class="pm-testimonial-name"> <?php echo($tabStSurname[1]." ".$tabStName[1]); ?> </p>
                                    <p class="pm-testimonial-title"> <?php echo($tabStFos[1]." ".$tabStLevel[1]); ?></p>
                                    <?php }
                                    else { ?>
                                        <p class="pm-testimonial-name"> <?php echo("anonyme"); ?> </p>
                                    <?php } ?>
                                <div class="pm-testimonial-divider"></div>
                                <p class="pm-testimonial-quote"><?php echo("<b>à ".$nom[1]." ".$prenom[1]." :</b> ".$tabCom[1]); ?></p>
                            </li>


                            <li>
                                <div class="pm-testimonial-img" style="background-image:url(img/avatarEtudiant.jpg);">
                                </div>
                                <?php if($tabComVis[2]== "1") { ?>
                                    <p class="pm-testimonial-name"> <?php echo($tabStSurname[2]." ".$tabStName[2]); ?> </p>
                                    <p class="pm-testimonial-title"> <?php echo($tabStFos[2]." ".$tabStLevel[2]); ?></p>
                                    <?php }
                                    else { ?>
                                        <p class="pm-testimonial-name"> <?php echo("anonyme"); ?> </p>
                                    <?php } ?>
                                <div class="pm-testimonial-divider"></div>
                                <p class="pm-testimonial-quote"><?php echo("<b>à ".$nom[2]." ".$prenom[2]." :</b> ".$tabCom[2]); ?></p>
                                
                            </li>
                        </ul>
                    </div>

                </div>
            </div>

        </div>
        <?php  } ?>

        <!-- ***********0 commentaire************ -->

        <?php if($nbCom==0)
                                {?>
        <div class="pm-column-container testimonials pm-parallax-panel" style="background-color:#A34DE9; background-image:url(img/home/purple.jpg); background-repeat:repeat-y;" data-stellar-background-ratio="0.5" data-stellar-vertical-offset="0">

            <div class="container pm-containerPadding100">
            	<div class="row">
                <div class="col-lg-12 pm-center">
                        <h5 class="light">LES MEILLEURS COMMENTAIRES</h5>
                        <center><div class="pm-divider light"></div></center>
                        <br><br>

                    </div>
                	<div class="col-lg-12 pm-center">
                    <h4 class="light">Pour le moment, il n'existe aucun commentaire sur la plateforme ayant des interactions.</h4>
                    </div>
                	<div class="pm-testimonials-carousel" id="pm-testimonials-carousel">
                    	<ul class="pm-testimonial-items">
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <?php  } ?>

        <!-- ***********1 commentaire************ -->
        <?php if($nbCom==1)
                                {?>
        <div class="pm-column-container testimonials pm-parallax-panel" style="background-color:#A34DE9; background-image:url(img/home/purple.jpg); background-repeat:repeat-y;" data-stellar-background-ratio="0.5" data-stellar-vertical-offset="0">

            <div class="container pm-containerPadding100">
            	<div class="row">
                	<div class="col-lg-12 pm-center">
                    	<h5 class="light">LES MEILLEURS COMMENTAIRES</h5>
                    </div>
                	<div class="pm-testimonials-carousel" id="pm-testimonials-carousel">
                    	<ul class="pm-testimonial-items">
                        	<li>
                                <div class="pm-testimonial-img" style="background-image:url(img/avatarEtudiant.jpg);">
                                </div>
                                <?php if($tabComVis[0]== "1") { ?>
                                    <p class="pm-testimonial-name"> <?php echo($tabStSurname[0]." ".$tabStName[0]); ?> </p>
                                    <p class="pm-testimonial-title"> <?php echo($tabStFos[0]." ".$tabStLevel[0]); ?></p>
                                    <?php }
                                    else { ?>
                                        <p class="pm-testimonial-name"> <?php echo("anonyme"); ?> </p>
                                    <?php } ?>
                                <div class="pm-testimonial-divider"> </div>
                                <p class="pm-testimonial-quote"><?php echo("<b>à ".$nom[0]." ".$prenom[0]." :</b> ".$tabCom[0]); ?></p>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <?php  } ?>

        <!-- ***********2 commentaires************ -->
        <?php if($nbCom==2)
                                {?>
        <div class="pm-column-container testimonials pm-parallax-panel" style="background-color:#A34DE9; background-image:url(img/home/purple.jpg); background-repeat:repeat-y;" data-stellar-background-ratio="0.5" data-stellar-vertical-offset="0">

            <div class="container pm-containerPadding100">
            	<div class="row">
                
                	<div class="col-lg-12 pm-center">
                    	<h5 class="light">LES MEILLEURS COMMENTAIRES</h5>
                    </div>

                	<div class="pm-testimonials-carousel" id="pm-testimonials-carousel">

                    	<ul class="pm-testimonial-items">
                        
                        	<li>
                                <div class="pm-testimonial-img" style="background-image:url(img/avatarEtudiant.jpg);">
                                	<!--<div class="pm-testimonial-img-icon">
                                    	<img src="img/home/post-icon.jpg" class="img-responsive pm-center-align" alt="icon">
                                    </div>-->
                                </div>
                                
                                <?php if($tabComVis[0]== "1") { ?>
                                    <p class="pm-testimonial-name"> <?php echo($tabStSurname[0]." ".$tabStName[0]); ?> </p>
                                    <p class="pm-testimonial-title"> <?php echo($tabStFos[0]." ".$tabStLevel[0]); ?></p>
                                    <?php }
                                    else { ?>
                                        <p class="pm-testimonial-name"> <?php echo("anonyme"); ?> </p>
                                    <?php } ?>
                                <div class="pm-testimonial-divider"> </div>
                                <p class="pm-testimonial-quote"><?php echo("<b>à ".$nom[0]." ".$prenom[0]." :</b> ".$tabCom[0]); ?></p>

                            </li>
                            <li>
                                <div class="pm-testimonial-img" style="background-image:url(img/avatarEtudiant.jpg);">
                                </div>
                                <?php if($tabComVis[1]== "1") { ?>
                                    <p class="pm-testimonial-name"> <?php echo($tabStSurname[1]." ".$tabStName[1]); ?> </p>
                                    <p class="pm-testimonial-title"> <?php echo($tabStFos[1]." ".$tabStLevel[1]); ?></p>
                                    <?php }
                                    else { ?>
                                        <p class="pm-testimonial-name"> <?php echo("anonyme"); ?> </p>
                                    <?php } ?>
                                <div class="pm-testimonial-divider"></div>
                                <p class="pm-testimonial-quote"><?php echo("<b>à ".$nom[1]." ".$prenom[1]." :</b> ".$tabCom[1]); ?></p>
                            </li>
                        </ul>
                    </div>

                </div>
            </div>

        </div>
        <?php  } ?>
        <!-- PANEL 6 end -->

        <!-- PANEL 5  -->
        
               
                <!-- Column 3 end -->


        </div>
        <!-- PANEL 5 end -->

        <!-- PANEL 2 -->
      
        <!-- PANEL 2 end -->

        <!-- PANEL 7 -->
        <!--<div class="container pm-containerPadding-top-100 pm-containerPadding-bottom-120">
        </div>-->
        <!-- PANEL 7 end -->

        <!-- BODY CONTENT end -->
        
    <?php include 'footer.html';?>

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
    <script src="js/pulse/jquery.PMSlider.js"></script>
    <script src="js/meanmenu/jquery.meanmenu.min.js"></script>
    <script src="js/flexslider/jquery.flexslider.js"></script>
    <script src="js/jquery.testimonials.js"></script>
    <script src="js/wow/wow.min.js"></script>
    <script src="js/jquery-migrate-1.2.1.js"></script>
    <script src="js/prettyphoto/js/jquery.prettyPhoto.js"></script>
    <script src="js/tinynav.js"></script>
    <script src="js/jquery-ui.js"></script>

    <p id="back-top" class="visible-lg visible-md visible-sm"></p>

  </body>
</html>
