﻿<?php 
include 'dbConnection.php';
if(isset($_GET['id']))
{
$id=$_GET['id'];
$req=$bd->query('select * from professor where id='.$id);
$prof=$req->fetch();
$req=$bd->query('select * from rating where profId='.$id);
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
    

$cdc=$cdc/$i; $tdp=$tdp/$i; $pdg=$pdg/$i; $adc=$adc/$i; $cdln = $cdln/$i;
}
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
                                <div class="pm-column-container pm-containerPadding-top-60 pm-containerPadding-bottom-50" style="background-color:#FFFFFF;">
                
                                    <div class="container">
                                        <div class="row">
                                            <div  class="col-lg-12">
                
                                                <center><h4 class="pm-comments-response-title"> <font color=#303F9F><?php echo $commentsNumber ?> étudiants ont commenté le profil de cet enseignant</font></h4></center>
                                                <?php if($commentsNumber!=0) { 
                                                    $i=0;
                                                    $reqMAXIComments=$bd->query('select count(*) as counts ,commentId from interact GROUP BY commentId ORDER BY counts DESC');
                                                    ?>

                                                        <div style="padding-left: 33%">
                                                            <br><br>
                                                            <a id="topCommentaires" onclick="menuTopCommentaires()" class="pm-square-btn-comment-hovered comment-reply">Top Commentaires</a> &nbsp;&nbsp;&nbsp;&nbsp;
                                                            <a id="plusRecents" onclick="menuPlusRecents()" class="pm-square-btn-comment comment-reply" >Les Plus Récents</a>
                                                            </div>

                                                <!-- Comments -->
                                                <div class="pm-comments-container" id="zone_par_defaut">
                
                                                    <!-- Comment -->

                                                    
                                                    <!-- Comment end -->
                
                                                </div> 

                                                <div id="zone" >

                                                <div class="pm-comments-container" id="zone_plus_recents">
                                                </div>

                                                <div class="pm-comments-container" id="zone_top_commentaires">
                                                </div>

                                                 </div>
                                                <!-- Comments end -->
                                                <div id="voirPlus" class="pm-comment-reply-btn">
                                                            <br><br>
                                                                <a  onclick="choice()" class="pm-square-btn-comment comment-reply" >VOIR PLUS +</a>
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
            <script id="559" src="js/index-clap.js"></script>
            <script src='https://cdnjs.cloudflare.com/ajax/libs/mo-js/0.288.1/mo.min.js'></script>
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
                                                        },
                                                        error : function(response, statut, erreur){
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
                                                        },
                                                        error : function(response, statut, erreur){
                                                        }
                                                    });
                                            }
                        
                        }
            </script>
            <script>
                    
                    var param = 1;
                    var param2 = 1;
                    var lastTime;  
                    var shown="";
                    var shown2;
                    var parametre;
                    
                    
      

                            function lastTimee(){
                                var x;
                                        $.ajax({
                                            url : 'voirPlus.php',
                                            type : 'GET',
                                            data: {
                                            param    
                                            },
                                            dataType : "json",
                                            success : function(response, statut){
                                                lastTime=response.timemax;
                                                x=response.timemax;
                                        },
                                            error : function(response, statut, erreur){
                                        }
                                        });
                                        return "x";
                                    }
                        lastTimee();

                        
                                        $.ajax({
                                            url : 'voirPlus.php',
                                            type : 'GET',
                                            data: {
                                            param2    
                                            },
                                            dataType : "json",
                                            success : function(response, statut){
                                                
                                                lastCount=response.lastCount;
                                                

                                        },
                                            error : function(response, statut, erreur){
                                        }
                                        });
                                   

                                    
                            function menuPlusRecents()
                        {   
                            if(document.getElementById("plusRecents").classList.contains("pm-square-btn-comment"))
                            {
                            param=1;
                            lastTime=lastTimee();
                            shown="";
                            plusRecents();
                        }
                        }


                        function menuTopCommentaires()
                        {
                            
                            parametre=1;
                            param2=1;
                            topCommentaires();
                        }
                        
                        function choice(){
                            if(document.getElementById("topCommentaires").classList.contains("pm-square-btn-comment-hovered"))
                            {
                                topCommentaires(1);
                            }
                            else
                            {
                                plusRecents();
                            }
                        }

                        function plusRecents(){
                            var param;
                            var zone = '<div class="pm-comments-container" hidden id="zone_plus_recents"></div>'; 
                            if(document.getElementById("zone_top_commentaires"))
                            $('#zone_top_commentaires').remove();

                            if(!document.getElementById("zone_plus_recents"))
                            {
                            $('#zone').append(zone);
                            $('#zone_plus_recents').fadeIn(2000);
                            $('#zone').fadeIn(2000);
                            }

                            

                            if(document.getElementById("topCommentaires").classList.contains("pm-square-btn-comment-hovered"))
                            {
                            document.getElementById("topCommentaires").classList.remove("pm-square-btn-comment-hovered");
                            document.getElementById("topCommentaires").classList.add("pm-square-btn-comment");
                            }
                            if(document.getElementById("plusRecents").classList.contains("pm-square-btn-comment"))
                            {
                            document.getElementById("plusRecents").classList.remove("pm-square-btn-comment");
                            document.getElementById("plusRecents").classList.add("pm-square-btn-comment-hovered");
                            }
                            
                            if(document.getElementById("559"))
                            {
                            var element = document.getElementById("559"); 
                            element.parentNode.removeChild(element);
                            }


                                        $.ajax({
                                            url : 'voirPlus.php',
                                            type : 'GET',
                                            data: {
                                                lastTime,shown
                                            },
                                            dataType : "json",
                                            success : function(response, statut){
                                                if(response.comment.length!="50")
                                                {
                                                $('#zone_plus_recents').fadeIn(2000);
                                                $("#zone_plus_recents").append(response.comment);
                                                lastTime=response.lastTime;
                                                shown=response.shown;
                                                
                                                if ( $('#voirPlus').css('display') == 'none' )
                                                $('#voirPlus').show();

                                            }
                                                else
                                                { 
                                                $('#voirPlus').hide();

                                            }
                                        },
                                            error : function(response, statut, erreur){

                                            }
                                        });

                                          

                        }
                
                lastCount=" ";       
               topCommentaires();
               function topCommentaires(){
                            var zone = '<div class="pm-comments-container" hidden id="zone_top_commentaires"></div>'; 
                            if(document.getElementById("zone_plus_recents"))
                            $('#zone_plus_recents').remove();
                            
                            if(!document.getElementById("zone_top_commentaires"))
                            {
                            $("#zone").append(zone);
                            $("#zone").fadeIn(2000);                            
                            $('#zone_top_commentaires').fadeIn(2000);
                            }
                            if(document.getElementById("plusRecents").classList.contains("pm-square-btn-comment-hovered"))
                            {
                            document.getElementById("plusRecents").classList.remove("pm-square-btn-comment-hovered");
                            document.getElementById("plusRecents").classList.add("pm-square-btn-comment"); 
                            }
                            if(document.getElementById("topCommentaires").classList.contains("pm-square-btn-comment"))
                            {
                            document.getElementById("topCommentaires").classList.remove("pm-square-btn-comment");
                            document.getElementById("topCommentaires").classList.add("pm-square-btn-comment-hovered");  
                            }   
                            

                            if(document.getElementById("559"))
                            {
                            var element = document.getElementById("559"); 
                            element.parentNode.removeChild(element);
                            }

                            var parametre = "top";
                            
                            alert(lastCount);
                            
                            $.ajax({
                                
                                            url : 'voirPlus.php',
                                            type : 'GET',
                                            data: {
                                                lastCount,shown2,parametre,param2
                                            },
                                            dataType : "json",
                                            success : function(response, statut){
                                                if(response.comment.length!="50")
                                                {
                                                $('#zone_top_commentaires').fadeIn(2000);
                                                $("#zone_top_commentaires").append(response.comment);
                                                
                                                lastCount=response.lastCount;
                                                shown2=response.shown2;
                                                param2=0;
                                                if ( $('#voirPlus').css('display') == 'none' )
                                                $('#voirPlus').show();

                                            }
                                                else
                                                { 
                                                $('#voirPlus').hide();

                                            }
                                            
                                        },
                                            error : function(response, statut, erreur){
                                                alert(erreur);

                                            }
                                        });

                            

                        }
            </script>           
            <p id="back-top" class="visible-lg visible-md visible-sm" style="bottom: -70px;"></p>



        <div id="ui-datepicker-div" class="ui-datepicker ui-widget ui-widget-content ui-helper-clearfix ui-corner-all"></div></body></html>
