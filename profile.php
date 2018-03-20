<?php 
include 'dbConnection.php';
if(isset($_GET['id']))
{
$id=$_GET['id'];
$req=$bd->query('select * from professor where id='.$id);
$prof=$req->fetch();
$req=$bd->query('select * from rating where profId='.$id);
$cdc=0; $tdp=0; $pdg=0; $adc=0; $cdln = 0; $i=0;$note=0;
if($req->rowCount()>0)
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

$cdc=$cdc/$i; $tdp=$tdp/$i; $pdg=$pdg/$i; $adc=$adc/$i; $cdln = $cdln/$i;

$req=$bd->query('select * from rcriteria');
while ($result=$req->fetch())
{
    if($result['criteria']=="Ambiance en classe")
        $adcr=$result['weight'];
    if($result['criteria']=="Contenu du cours")
        $cdcr=$result['weight'];
    if($result['criteria']=="Crédibilité de la note")
        $cdlnr=$result['weight'];
    if($result['criteria']=="Pédagogie")
        $pdgr=$result['weight'];
    if($result['criteria']=="Taux de présence")
        $tdpr=$result['weight'];
    
}
$note=($cdc*$cdcr+$adc*$adcr+$cdln*$cdlnr+$pdg*$pdgr+$tdp*$tdpr)/10;
}
$req=$bd->query('select count(*) as count from comment where profId='.$id);
$result=$req->fetch();
$commentsNumber=$result['count'];

}
?>

<?php include 'header.php'; ?>

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
                
                
                
                                                <div class="row pm-containerPadding-top-30">
                
                                                    <div class="col-lg-3 col-md-3 col-sm-12">
                
                                                        <div class="pm-author-bio-img-bg" style="background-image:url(img/news-post/avatar.jpg);">
                                                            <div class="pm-single-news-post-avatar-icon">
                                                                <img width="33" height="41" src="img/news/post-icon.jpg" class="img-responsive" alt="icon">
                                                            </div>
                                                        </div>
                
                                                    </div>
                
                                                    <div class="col-lg-9 col-md-9 col-sm-12">
                                                            <div class="pm-comment-vote-btn">
                                                                    <a href="vote.php" class="pm-square-btn comment-reply">VOTER</a>
                                                                </div>
                                                        <p class="pm-author-name"><?php echo($prof['surname']." ".$prof['name']); ?></p>
                                                        <p class="pm-author-title"><?php echo($prof['grade']); ?></p>
                
                                                        <div class="pm-author-divider"></div>
                                                        <p class="pm-author-bio">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc fringilla erat nec tellus consectetur sodales. Vivamus quis est eget velit scelerisque condimentum sed non lorem. Morbi commodo id magna nec semper. Nullam pulvinar erat nisl, ac laoreet orci tempus iaculis. Vivamus nec tortor velit. Praesent a tortor nulla. Nullam pulvinar erat nisl, ac laoreet orci tempus iaculis.</p>
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
                
                                                        <!-- accordion item 1 -->
                                                        <div class="panel panel-default">
                
                                                            <div class="panel-heading">
                                                                <h4 class="panel-title"><i class="fa fa-plus"></i><a class="pm-accordion-link pm-dark-link collapsed" href="#collapse0" data-parent="#accordion" data-toggle="collapse" aria-expanded="false">Contenu du cours : <?php echo $cdc; ?></a></h4>
                                                            </div>
                
                                                            <div class="panel-collapse collapse" id="collapse0" aria-expanded="false" style="height: 0px;">
                                                                <div class="panel-body">
                                                                    <p>Mauris adisciping fringila turpis intend tellus ornare etos pelim. Pulvunar est cardio neque vitae elit. Lorem vulputat paentra nunc gravida. Mauris adisciping fringila turpis intend tellus ornare etos.</p>
                                                                </div>
                                                            </div>
                
                                                        </div>
                                                        <!-- accordion item 1 end -->
                
                                                        <!-- accordion item 2 -->
                                                        <div class="panel panel-default">
                
                                                            <div class="panel-heading">
                                                                <h4 class="panel-title"><i class="fa fa-plus"></i><a class="pm-accordion-link collapsed pm-dark-link" href="#collapse1" data-parent="#accordion" data-toggle="collapse" aria-expanded="false">Taux de présence : <?php echo $tdp; ?></a></h4>
                                                            </div>
                
                                                            <div class="panel-collapse collapse" id="collapse1" aria-expanded="false">
                                                                <div class="panel-body">
                                                                    <p>Mauris adisciping fringila turpis intend tellus ornare etos pelim. Pulvunar est cardio neque vitae elit. Lorem vulputat paentra nunc gravida. Mauris adisciping fringila turpis intend tellus ornare etos. </p>
                
                                                                    <p>Mauris adisciping fringila turpis intend tellus ornare etos pelim. Pulvunar est cardio neque vitae elit. Lorem vulputat paentra nunc gravida. Mauris adisciping fringila turpis intend tellus ornare etos. </p>
                                                                    <a href="#" class="pm-standard-link pm-no-margin">Learn more <i class="fa fa-angle-right"></i></a>
                                                                </div>
                                                            </div>
                
                                                        </div>
                                                        <!-- accordion item 2 end -->
                
                                                        <!-- accordion item 3 -->
                                                        <div class="panel panel-default">
                
                                                            <div class="panel-heading">
                                                                <h4 class="panel-title"><i class="fa fa-plus"></i><a class="pm-accordion-link collapsed pm-dark-link" href="#collapse2" data-parent="#accordion" data-toggle="collapse" aria-expanded="false">Pédagogie : <?php echo $pdg; ?></a></h4>
                                                            </div>
                
                                                            <div class="panel-collapse collapse" id="collapse2" aria-expanded="false">
                                                                <div class="panel-body">
                                                                    <p>Mauris adisciping fringila turpis intend tellus ornare etos pelim. Pulvunar est cardio neque vitae elit. Lorem vulputat paentra nunc gravida. Mauris adisciping fringila turpis intend tellus ornare etos.</p>
                
                                                                </div>
                                                            </div>
                
                                                        </div>
                                                        <!-- accordion item 3 end -->
                
                                                        <!-- accordion item 4 -->
                                                        <div class="panel panel-default">
                
                                                            <div class="panel-heading">
                                                                <h4 class="panel-title"><i class="fa fa-plus"></i><a class="pm-accordion-link pm-dark-link collapsed" href="#collapse3" data-parent="#accordion" data-toggle="collapse" aria-expanded="false">Ambiance en classe : <?php echo $adc; ?></a></h4>
                                                            </div>
                
                                                            <div class="panel-collapse collapse" id="collapse3" aria-expanded="false" style="height: 0px;">
                                                                <div class="panel-body">
                                                                    <p>Mauris adisciping fringila turpis intend tellus ornare etos pelim. Pulvunar est cardio neque vitae elit. Lorem vulputat paentra nunc gravida. Mauris adisciping fringila turpis intend tellus ornare etos.</p>
                                                                </div>
                                                            </div>
                
                                                        </div>
                                                        <!-- accordion item 4 end -->
                
                                                        <!-- accordion item 5 -->
                                                        <div class="panel panel-default">
                
                                                            <div class="panel-heading">
                                                                <h4 class="panel-title"><i class="fa fa-plus"></i><a class="pm-accordion-link collapsed pm-dark-link" href="#collapse4" data-parent="#accordion" data-toggle="collapse" aria-expanded="false">Crédibilité de la note : <?php echo $cdln; ?></a></h4>
                                                            </div>
                
                                                            <div class="panel-collapse collapse" id="collapse4" aria-expanded="false">
                                                                <div class="panel-body">
                                                                    <p>Mauris adisciping fringila turpis intend tellus ornare etos pelim. Pulvunar est cardio neque vitae elit. Lorem vulputat paentra nunc gravida. Mauris adisciping fringila turpis intend tellus ornare etos.</p>
                                                                </div>
                                                            </div>
                
                                                        </div>
                                                        <!-- accordion item 5 end -->
                
                                                        <!-- accordion item 6 -->
                                                        <div class="panel panel-default">
                
                
                
                                                            <div class="panel-collapse collapse" id="collapse5">
                                                                <div class="panel-body">
                                                                    <p>Mauris adisciping fringila turpis intend tellus ornare etos pelim. Pulvunar est cardio neque vitae elit. Lorem vulputat paentra nunc gravida. Mauris adisciping fringila turpis intend tellus ornare etos.</p>
                                                                    <a href="#" class="pm-standard-link pm-no-margin">Learn more <i class="fa fa-angle-right"></i></a>
                                                                </div>
                                                            </div>
                
                                                        </div>
                                                        <!-- accordion item 6 end -->
                
                                                        <!-- accordion item 7 -->
                                                        <div class="panel panel-default">
                
                
                
                                                            <div class="panel-collapse collapse" id="collapse6">
                                                                <div class="panel-body">
                                                                    <p>Mauris adisciping fringila turpis intend tellus ornare etos pelim. Pulvunar est cardio neque vitae elit. Lorem vulputat paentra nunc gravida. Mauris adisciping fringila turpis intend tellus ornare etos.</p>
                                                                </div>
                                                            </div>
                
                                                        </div>
                                            </div>
                                                        <!-- accordion item 7 end -->
                
                
                
                                                </div>
                
                                                <div class="col-lg-3 col-md-6 col-sm-6 desktop pm-center " style="padding: 30px 0px 0px 70px">
                
                                                                            <p class="pm-static-number"><?php echo $note; ?></p>
                
                                                                            <!-- milestone -->
                
                                                                            <!-- milestone end -->
                
                                                                        </div>
                
                                    </div>
                
                                </div>
                                <!-- PANEL 2 end -->
                
                                <!-- PANEL 3 -->
                
                                <!-- PANEL 3 end-->
                
                                <!-- PANEL 4 -->
                                <a id="comments"></a>
                                <div class="pm-column-container pm-containerPadding-top-80 pm-containerPadding-bottom-50" style="background-color:#FFFFFF;">
                
                                    <div class="container">
                                        <div class="row">
                                            <div  class="col-lg-12">
                
                                                <h4 class="pm-comments-response-title"> <font color=#303F9F><?php echo $commentsNumber ?> étudiants ont commenté le profil de cet enseignant</font></h4>
                                                <?php if($commentsNumber!=0) { 
                                                    $i=0;
                                                    $reqMAXIComments=$bd->query('select count(*) as counts ,commentId from interact GROUP BY commentId ORDER BY counts DESC');
                                                    ?>
                                                <!-- Comments -->
                                                <div class="pm-comments-container" id="zone_de_rechargement">
                
                                                    <!-- Comment -->
                                                    <?php while( ($i<3) && ($MAXIComments=$reqMAXIComments->fetch()) ) {
                                                        $req1 = $bd->query('select * from comment where id = "'.$MAXIComments["commentId"].'"');
                                                        $comment=$req1->fetch();
                                                        $req2 = $bd->query('select * from student where id = "'.$comment['studentId'].'"');
                                                        $student=$req2->fetch();
                
                                                        ?>
                                                    <div class="pm-comment-box-container">
                
                                                        <div class="pm-comment-box-avatar-container">
                                                            <div class="pm-comment-avatar" style="background-image:url(img/news/01_avatar.jpg);">
                                                            </div>
                                                            <ul class="pm-comment-author-list">
                                                                <li><p class="pm-comment-name"><?php echo $student['surname'].' '.$student['name'] ; ?></p></li>
                                                                <li style="padding-left: 24%">
                
                
                
                                                                </li>
                                                                <li><p class="pm-comment-date"><?php echo date("j M Y", strtotime($comment['timestamp'])); ?></p></li>
                                                            </ul>
                
                
                                                        </div>
                                                        <div class="col-md-1" style="padding-top: 25px">
                
                                                            <button id="<?php echo $MAXIComments['commentId'] ; ?>" class="clap" onclick="clap(<?php echo $MAXIComments['commentId'] ; ?>,<?php echo "1100675"; ?>)">
                                                                <span>
                                                                  <!--  SVG Created by Luis Durazo from the Noun Project  -->
                                                                  <svg id="<?php echo $MAXIComments['commentId'].'1' ; ?>" class="clap--icon" xmlns="http://www.w3.org/2000/svg" viewBox="-549 338 100.1 125">
                                                                <path d="M-471.2 366.8c1.2 1.1 1.9 2.6 2.3 4.1.4-.3.8-.5 1.2-.7 1-1.9.7-4.3-1-5.9-2-1.9-5.2-1.9-7.2.1l-.2.2c1.8.1 3.6.9 4.9 2.2zm-28.8 14c.4.9.7 1.9.8 3.1l16.5-16.9c.6-.6 1.4-1.1 2.1-1.5 1-1.9.7-4.4-.9-6-2-1.9-5.2-1.9-7.2.1l-15.5 15.9c2.3 2.2 3.1 3 4.2 5.3zm-38.9 39.7c-.1-8.9 3.2-17.2 9.4-23.6l18.6-19c.7-2 .5-4.1-.1-5.3-.8-1.8-1.3-2.3-3.6-4.5l-20.9 21.4c-10.6 10.8-11.2 27.6-2.3 39.3-.6-2.6-1-5.4-1.1-8.3z"/>
                                                                <path d="M-527.2 399.1l20.9-21.4c2.2 2.2 2.7 2.6 3.5 4.5.8 1.8 1 5.4-1.6 8l-11.8 12.2c-.5.5-.4 1.2 0 1.7.5.5 1.2.5 1.7 0l34-35c1.9-2 5.2-2.1 7.2-.1 2 1.9 2 5.2.1 7.2l-24.7 25.3c-.5.5-.4 1.2 0 1.7.5.5 1.2.5 1.7 0l28.5-29.3c2-2 5.2-2 7.1-.1 2 1.9 2 5.1.1 7.1l-28.5 29.3c-.5.5-.4 1.2 0 1.7.5.5 1.2.4 1.7 0l24.7-25.3c1.9-2 5.1-2.1 7.1-.1 2 1.9 2 5.2.1 7.2l-24.7 25.3c-.5.5-.4 1.2 0 1.7.5.5 1.2.5 1.7 0l14.6-15c2-2 5.2-2 7.2-.1 2 2 2.1 5.2.1 7.2l-27.6 28.4c-11.6 11.9-30.6 12.2-42.5.6-12-11.7-12.2-30.8-.6-42.7m18.1-48.4l-.7 4.9-2.2-4.4m7.6.9l-3.7 3.4 1.2-4.8m5.5 4.7l-4.8 1.6 3.1-3.9"/>
                                                              </svg>
                                                                </span>
                
                                                              </button>
                                                            <div id="<?php echo $MAXIComments['commentId'].'11' ; ?>" class="clapsNumber" ><?php echo $MAXIComments['counts'] ;?></div>
                                                            </div>
                
                                                        <div class="pm-comment">
                                                            <p><?php echo $comment['comment']; ?></p>
                                                        </div>
                
                                                        <div class="pm-comment-reply-btn">
                
                                                        </div>
                
                                                    </div>
                                                    <?php } ?>
                                                    <!-- Comment end -->
                
                                                </div> 
                                                <!-- Comments end -->
                                                <div class="pm-comment-reply-btn">
                                                            <br><br>
                                                                <a  id="voirPlus" class="pm-square-btn-comment comment-reply">VOIR PLUS +</a>
                                                            </div>
                                                            <?php } ?>
                                            </div>
                                        </div>
                                    </div>
                
                                </div>
                                <!-- PANEL 4 end -->
                
                
                                <!-- PANEL 5 -->
                                <div class="container pm-containerPadding-top-100 pm-containerPadding-bottom-80">
                                    <div class="row">
                                        <div class="col-lg-12">
                
                                            <h4 class="pm-primary"><font color=white>Que pensez vous de cet enseignant ?</font></h4>
                
                
                
                                            <div class="row pm-containerPadding-top-20">
                
                                                <form name="pm-submit-comment-form" action="http://projects.pulsarmedia.ca/medical-link/post">
                
                                                    <div class="col-lg-4 col-md-4 col-sm-12">
                
                                                    </div>
                
                
                
                
                
                                                    <div class="col-lg-12 pm-clear-element">
                                                        <textarea name="pm-comment-message" cols="20" rows="10" placeholder="VOTRE AVIS ICI" class="pm-comment-form-textarea"></textarea>
                                                    </div>
                
                                                    <div class="col-lg-12 pm-clear-element">
                                                        <div class="pm-comment-html-tags">
                                                            <span>Prière d'être constructif</span>
                
                                                        </div>
                
                                                        <input name="pm-comment-submit-btn" class="pm-rounded-btn no-border" type="button" value="Commenter">
                
                                                    </div>
                
                                                </form>
                
                                            </div>
                
                                        </div>
                                    </div>
                                </div>
                
                                <!-- PANEL 5 end-->
                
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
            <script src='https://cdnjs.cloudflare.com/ajax/libs/mo-js/0.288.1/mo.min.js'></script>
            <script  src="js/index-clap.js"></script>
            <script>
                        var param = 1;
                        var lastTime;
                                    $.ajax({
                                        url : 'voirPlus.php',
                                        type : 'GET',
                                        data: {
                                        param    
                                        },
                                        dataType : "json",
                                        success : function(response, statut){
                                            lastTime=response.timemax;
                                    },
                                        error : function(response, statut, erreur){
                                        alert(erreur);
                                    }
                                    });
                        var param;
                        var shown="";

                                $("#voirPlus").click(function(){
                                    $.ajax({
                                        url : 'voirPlus.php',
                                        type : 'GET',
                                        data: {
                                            lastTime,shown
                                        },
                                        dataType : "json",
                                        success : function(response, statut){
                                            if(response.comment!="")
                                            {
                                            $('#zone_de_rechargement').fadeIn(2000);
                                            $("#zone_de_rechargement").append(response.comment);
                                            lastTime=response.lastTime;
                                            shown=response.shown;
                                            }
                                            else 
                                            $('#voirPlus').hide();
                                    },
                                        error : function(response, statut, erreur){
                                        alert(erreur);
                                    }
                                    });
                        
                                });
            </script>
            <script>
                        function clap(commentId,studentId){
                                            j=commentId;
                                            if(document.getElementById(j+"1").classList.contains("checked"))
                                            {
                                                param=1;
                                                $.ajax({
                                                        url : 'interaction.php',
                                                        type : 'GET',
                                                        data: {
                                                        param,commentId,studentId    
                                                        },
                                                        success : function(response, statut){
                                                        alert(response);
                                                        },
                                                        error : function(response, statut, erreur){
                                                        alert(erreur);
                                                        }
                                                    });  
                                            }
                                            else 
                                            {
                                                param=0;
                                                $.ajax({
                                                        url : 'interaction.php',
                                                        type : 'GET',
                                                        data: {
                                                        param,commentId,studentId   
                                                        },
                                                        success : function(response, statut){
                                                            alert(response);
                                                        },
                                                        error : function(response, statut, erreur){
                                                        alert(erreur);
                                                        }
                                                    });
                                            }
                        
                        }
            </script>
            <p id="back-top" class="visible-lg visible-md visible-sm" style="bottom: -70px;"></p>



        <div id="ui-datepicker-div" class="ui-datepicker ui-widget ui-widget-content ui-helper-clearfix ui-corner-all"></div></body></html>
