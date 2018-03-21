<?php 
    include 'dbConnection.php';    
    include 'header.php';
    $ind=0;
    $req0=$bd->query('select id from professor');    
    while($result0=$req0->fetch())  
    {  
    $req=$bd->query('select * from rating where profId='.$result0['id']);
    $cdc=0; $tdp=0; $pdg=0; $adc=0; $cdln = 0; $i=0;$note=0;
    if($req)
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
    if($i>0)
    {
    $cdc=$cdc/$i; $tdp=$tdp/$i; $pdg=$pdg/$i; $adc=$adc/$i; $cdln = $cdln/$i;
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
    //insertion dans 2tabs:
    
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
        $gradeBestProf="Pr";
    if($grade=="Maître de Conférences")
        $gradeBestProf="M conf";
    if($grade=="Maître Assistant")
        $gradeBestProf="M asst";
    if($grade=="Assistant")
        $gradeBestProf="Asst";
    //Min:
    $idWorstProfRate=$tabIdProf[$imin];
    $noteWorst=$tabNote[$imin];    
    $req3=$bd->query('select * from professor where id='.$idWorstProfRate);
    $result3=$req3->fetch();
    $nomWorstProf=$result3['name'];
    $prenomWorstProf=$result3['surname'];
    $grade=$result3['grade'];
    if($grade=="Professeur")
        $gradeWorstProf="Pr";
    if($grade=="Maître de Conférences")
        $gradeWorstProf="M conf";
    if($grade=="Maître Assistant")
        $gradeWorstProf="M asst";
    if($grade=="Assistant")
        $gradeWorstProf="Asst";


//prof avec le plus de feedbacks:
$reqFeed=$bd->query('select COUNT(profId),profId from rating GROUP BY profId ORDER BY COUNT(profId) DESC');    
$resultFeed=$reqFeed->fetch();

$reqProf=$bd->query('select * from professor where id='.$resultFeed['profId']);
$resultProf=$reqProf->fetch();

$nomPlusFeed=$resultProf['name'];
$prenomPlusFeed=$resultProf['surname'];
$grade=$resultProf['grade'];
if($grade=="Professeur")
    $gradePlusFeed="Pr";
if($grade=="Maître de Conférences")
    $gradePlusFeed="M conf";
if($grade=="Maître Assistant")
    $gradePlusFeed="M asst";
if($grade=="Assistant")
    $gradePlusFeed="Asst";

//nombre interactions:
$reqnbinteract=$bd->query('select COUNT(*) from rating');
$resultnbinteract=$reqnbinteract->fetch();

//nombre comments:
$reqnbincom=$bd->query('select COUNT(*) from comment');
$resultnbcom=$reqnbinteract->fetch();

// nb feedbacks:
$nbfeed=$resultnbinteract[0]+$resultnbincom[0];

//taux participation:
$reqnbstudent=$bd->query('select COUNT(*) from student');
$resultnbstudent=$reqnbstudent->fetch();
$taux=round(($nbfeed/$resultnbstudent[0])*100,4);

//Best comments:
/*$reqBestCom=$bd->query('select COUNT(commentId),commentId,studentId from interact GROUP BY commentId ORDER BY COUNT(commentId) DESC');    
$i=0;
while(($resultBestCom=$reqFeed->fetch()) || $i<3 )
{
    $reqCom=$bd->query('select comment from comment where id='.$resultBestCom['commentId']);
    $resultCom=$reqCom->fetch();
    $reqCom=$db->query('select name,surname,level,fosId from student where id='.$resultBestCom['studentId']);
    $resultCom=$reqCom->fetch();
    $tabCom[$i]=$resultCom[0];
    $tabStName[$i]=$resultSt['name'];
    $tabStSurname[$i]=$resultSt['surname'];
    $tabStLevel[$i]=$resultSt['level'];
    $reqFos=$db->query('select fos from fos where id='.$resultBestCom['fosId']);
    $resultFos=$reqCom->fetch();
    $tabStFos[$i]=$resultFos[0];    
    $i++;
}*/

    
?>

        <!-- SLIDER AREA -->
        <div class="pm-pulse-container" id="pm-pulse-container">

            <div id="pm-pulse-loader">
                <img src="js/pulse/img/ajax-loader.gif" alt="Slider Loading" />
            </div>

            <div id="pm-slider" class="pm-slider">

                <div id="pm-slider-progress-bar"></div>

                <ul class="pm-slides-container" id="pm_slides_container">

                    <!-- FULL WIDTH slides -->
                    <li data-thumb="" class="pmslide_0"><img src="img/home/insatbirds2.jpg" alt="img01" />


                            <div class="pm-holder">
                                <div class="pm-caption">
                                      <h1>L'INSAT EST UN JOYAU</h1>
                                      <span class="pm-caption-decription">
                                        La préserver est notre devoir
                                      </span>
                                      <span class="pm-caption-excerpt">
                                        <b>Un espace de feedbacks et de critiques constructifs </b>
                                      </span>
                                      <a href="services.php" class="pm-slide-btn">Plus <i class="fa fa-plus"></i></a>
                                </div>
                            </div>


                    </li>

                    <li data-thumb="" class="pmslide_1"><img src="img/home/purple.jpg" alt="img02" />


                        	<div class="pm-holder">
                                <div class="pm-caption">
                                      <h1>Leading the way</h1>
                                      <span class="pm-caption-decription">
                                        in research and development
                                      </span>
                                      <span class="pm-caption-excerpt">
                                        Medical-Link provides many great features like a custom slider and a medical appointment form.
                                      </span>
                                      <a href="services.php" class="pm-slide-btn">learn more <i class="fa fa-plus"></i></a>
                                </div>
                            </div>


                    </li>

                    <li data-thumb="" class="pmslide_2"><img src="img/home/purple.jpg" alt="img02" />


                        	<div class="pm-holder">
                                <div class="pm-caption">
                                      <h1>A friendly staff</h1>
                                      <span class="pm-caption-decription">
                                        for a comfortable experience
                                      </span>
                                      <span class="pm-caption-excerpt">
                                        Pulsar Media is always around to answer your questions or help solve your technical issues.
                                      </span>
                                      <a href="medical-staff.php" class="pm-slide-btn">meet our staff <i class="fa fa-plus"></i></a>
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

                  <h5> F E E D S A T &nbsp;&nbsp;&nbsp; A W A R D S </h5>
                  <div class="pm-column-title-divider">
                    <img height="29" width="29" src="img/divider-icon.png" alt="icon">
                    <br><br>
                  </div>

              </div>

            	<!-- Column 1 -->
                <div class="col-lg-4 col-md-4 col-sm-12 pm-center pm-columnPadding-30 pm-column-spacing wow fadeInUp animated" data-wow-delay="0.3s" data-wow-offset="50" data-wow-duration="1s">

                	<a href="#" class="fa fa-hand-o-up pm-icon-btn"></a>

                    <h6 class="pm-column-title"><?php echo($gradeBestProf." ".$nomBestProf." ".$prenomBestProf); ?></h6>
                    <h7 class="pm-column-subtitle">Le enseignant avec le plus de feedback positif</h7>

                    <div class="pm-title-divider"></div>

                    <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.</p>

                    <a href="#" class="pm-standard-link">consulter ce profil <i class="fa fa-plus"></i></a>

                </div>
                <!-- Column 1 end -->

                <!-- Column 2 -->
                <div class="col-lg-4 col-md-4 col-sm-12 pm-center pm-columnPadding-30 pm-column-spacing wow fadeInUp animated
" data-wow-delay="0.6s" data-wow-offset="50" data-wow-duration="1s">

                    <a href="#" class="fa fa-hand-o-down pm-icon-btn"></a>

                    <h6 class="pm-column-title"><?php echo($gradeWorstProf." ".$nomWorstProf." ".$prenomWorstProf); ?></h6>
                    <h7 class="pm-column-subtitle">Le enseignant avec le plus de feedback négatif</h7>

                    <div class="pm-title-divider"></div>

                    <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.</p>

                    <a href="#" class="pm-standard-link">consulter ce profil<i class="fa fa-plus"></i></a>

                </div>
                <!-- Column 2 end -->

                <!-- Column 3 -->
                <div class="col-lg-4 col-md-4 col-sm-12 pm-center pm-columnPadding-30 wow fadeInUp animated
" data-wow-delay="0.9s" data-wow-offset="50" data-wow-duration="1s">

                    <a href="#" class="fa fa-fire pm-icon-btn"></a>

                    <h6 class="pm-column-title"><?php echo($gradePlusFeed." ".$nomPlusFeed." ".$prenomPlusFeed); ?></h6>
                    <h7 class="pm-column-subtitle">Le enseignant avec le plus de feeddback</h7>

                    <div class="pm-title-divider"></div>

                    <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.</p>

                    <a href="#" class="pm-standard-link">consulter ce profil<i class="fa fa-plus"></i></a>

                </div>
                <!-- Column 3 end -->

            </div>
        </div>
        <!-- PANEL 1 end -->

        <!-- PANEL 4 -->
        <div class="pm-column-container testimonials pm-parallax-panel" style="background-color:#A34DE9; background-image:url(img/home/purple.jpg);  background-repeat:repeat-y;" data-stellar-background-ratio="0.5" data-stellar-vertical-offset="-20">

          <!-- Column message -->
        	<div class="pm-column-container-message">
            	<p><strong>Le saviez-vous?</strong> Nous mesurons le niveau de satisfaction des différentes filières</p>
            </div>
            <!-- Column message end -->


          <div class="container pm-containerPadding-top-40 pm-containerPadding-bottom-80">
              <div class="row">

                <div class="col-lg-12 col-md-12">
                  <h4 class="light">Quelle filière est la plus satisafaite de ses enseignants?</h4>
                    <div class="pm-divider light"></div>
                    <br />
                </div>

                <div class="col-lg-5 col-md-5">
                      <!-- Progress bar -->
                      <div class="pm-progress-bar-description" id="pm-progress-bar-desc-1">
                          1er Cycle (MPI)
                          <div class="pm-progress-bar-diamond"></div>
                          <span>42%</span>
                      </div>
                      <div class="pm-progress-bar">
                          <span data-width="42" class="pm-progress-bar-outer" id="pm-progress-bar-1">
                              <span class="pm-progress-bar-inner"></span>
                          </span>
                      </div>
                      <!-- Progress bar end -->

                      <!-- Progress bar -->
                      <div class="pm-progress-bar-description" id="pm-progress-bar-desc-2">
                          Génie Logiciel (GL)
                          <div class="pm-progress-bar-diamond"></div>
                          <span>89%</span>
                      </div>
                      <div class="pm-progress-bar">
                          <span data-width="89" class="pm-progress-bar-outer" id="pm-progress-bar-2">
                              <span class="pm-progress-bar-inner"></span>
                          </span>
                      </div>
                      <!-- Progress bar end -->

                      <!-- Progress bar -->
                      <div class="pm-progress-bar-description" id="pm-progress-bar-desc-3">
                          Informtique Industrielle Automatique (IIA)
                          <div class="pm-progress-bar-diamond"></div>
                          <span>75%</span>
                      </div>
                      <div class="pm-progress-bar">
                          <span data-width="75" class="pm-progress-bar-outer" id="pm-progress-bar-3">
                              <span class="pm-progress-bar-inner"></span>
                          </span>
                      </div>
                      <!-- Progress bar end -->

                      <!-- Progress bar -->
                      <div class="pm-progress-bar-description" id="pm-progress-bar-desc-4">
                          Chimie Industrielle (CH)
                          <div class="pm-progress-bar-diamond"></div>
                          <span>60%</span>
                      </div>
                      <div class="pm-progress-bar">
                          <span data-width="60" class="pm-progress-bar-outer" id="pm-progress-bar-4">
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
                            <span>75%</span>
                        </div>
                        <div class="pm-progress-bar">
                            <span data-width="75" class="pm-progress-bar-outer" id="pm-progress-bar-5">
                                <span class="pm-progress-bar-inner"></span>
                            </span>
                        </div>
                        <!-- Progress bar end -->

                        <!-- Progress bar -->
                        <div class="pm-progress-bar-description" id="pm-progress-bar-desc-6">
                            Réseaux Informatiques et Télécommunications (RT)
                            <div class="pm-progress-bar-diamond"></div>
                            <span>36%</span>
                        </div>
                        <div class="pm-progress-bar">
                            <span data-width="36" class="pm-progress-bar-outer" id="pm-progress-bar-6">
                                <span class="pm-progress-bar-inner"></span>
                            </span>
                        </div>
                        <!-- Progress bar end -->

                        <!-- Progress bar -->
                        <div class="pm-progress-bar-description" id="pm-progress-bar-desc-7">
                            Informatiques et Mainenance Industrielle (IMI)
                            <div class="pm-progress-bar-diamond"></div>
                            <span>23%</span>
                        </div>
                        <div class="pm-progress-bar">
                            <span data-width="23" class="pm-progress-bar-outer" id="pm-progress-bar-7">
                                <span class="pm-progress-bar-inner"></span>
                            </span>
                        </div>
                        <!-- Progress bar end -->

                        <!-- Progress bar -->
                        <div class="pm-progress-bar-description" id="pm-progress-bar-desc-8">
                            Biologie Industrielle (BIO)
                            <div class="pm-progress-bar-diamond"></div>
                            <span>50%</span>
                        </div>
                        <div class="pm-progress-bar">
                            <span data-width="50" class="pm-progress-bar-outer" id="pm-progress-bar-8">
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

                    <h5>FEEDSAT EN CHIFFRES</h5>
                    <div class="pm-column-title-divider">
                      <img height="29" width="29" src="img/divider-icon.png" alt="icon">
                      <br>
                    </div>

                </div>
            </div>

          <div class="row">

              <div class="col-lg-3 col-md-6 col-sm-6 desktop pm-center pm-columnPadding-30 pm-column-spacing">

                    <p class="typcn typcn-group pm-static-icon"></p>

                    <!-- milestone -->
                    <div class="milestone">
                        <div class="milestone-content">
                            <span data-speed="2000" data-stop="<?php echo($nbfeed); ?>" class="milestone-value"></span>
                            <div class="milestone-description">Fedbacks</div>
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
                            <div class="milestone-description">Commentaires</div>
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
                            <div class="milestone-description">Interactions</div>
                        </div>
                    </div>
                    <!-- milestone end -->

                </div>

                <div class="col-lg-3 col-md-6 col-sm-6 desktop pm-center pm-columnPadding-30 pm-column-spacing">

                    <p class="fa fa-line-chart pm-static-icon"></p>

                    <!-- milestone -->
                    <div class="milestone">
                        <div class="milestone-content">
                            <span data-speed="2000" data-stop="<?php echo($taux); ?>" class="milestone-value"></span>
                            <div class="milestone-description">Taux de participation</div>
                        </div>
                    </div>
                    <!-- milestone end -->

                </div>

            </div>

        </div>
        <!-- PANEL 3 end -->

        <!-- PANEL 6 -->
        <div class="pm-column-container testimonials pm-parallax-panel" style="background-color:#A34DE9; background-image:url(img/home/purple.jpg); background-repeat:repeat-y;" data-stellar-background-ratio="0.5" data-stellar-vertical-offset="0">

            <div class="container pm-containerPadding100">
            	<div class="row">

                	<div class="col-lg-12 pm-center">
                    	<h5 class="light">TOP COMMENTAIRES EN CE MOMENT</h5>
                    </div>

                	<div class="pm-testimonials-carousel" id="pm-testimonials-carousel">

                    	<ul class="pm-testimonial-items">
                        	<li>
                                <div class="pm-testimonial-img" style="background-image:url(img/information/hamza.jpg);">
                                	<!--<div class="pm-testimonial-img-icon">
                                    	<img src="img/home/post-icon.jpg" class="img-responsive pm-center-align" alt="icon">
                                    </div>-->
                                </div>
                                <p class="pm-testimonial-name"> </p>
                                <p class="pm-testimonial-title"></p>
                                <div class="pm-testimonial-divider"></div>
                                <p class="pm-testimonial-quote">Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam quis nostrud exerci tation.</p>
                            </li>
                            <li>
                                <div class="pm-testimonial-img" style="background-image:url(img/information/abir.jpg);">
                                </div>
                                <p class="pm-testimonial-name">Abir Messaoudi</p>
                                <p class="pm-testimonial-title">CBA</p>
                                <div class="pm-testimonial-divider"></div>
                                <p class="pm-testimonial-quote">Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam quis nostrud exerci tation.</p>
                            </li>
                            <li>
                                <div class="pm-testimonial-img" style="background-image:url(img/information/ala.jpg);">
                                </div>
                                <p class="pm-testimonial-name">Alàa Riahi</p>
                                <p class="pm-testimonial-title">GL 2</p>
                                <div class="pm-testimonial-divider"></div>
                                <p class="pm-testimonial-quote">Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam quis nostrud exerci tation.</p>
                            </li>
                        </ul>

                    </div>

                </div>
            </div>

        </div>
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
