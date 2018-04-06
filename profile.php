<?php 
include 'interpretationProfil.php';
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
    
    }
    if($i>0)
    {
    $cdc=$cdc/$i; $tdp=$tdp/$i; $pdg=$pdg/$i; $adc=$adc/$i; $cdln = $cdln/$i;
    $cdc=round($cdc, 2);
    $tdp=round($tdp, 2);
    $pdg=round($pdg, 2);
    $adc=round($adc, 2);
    $cdln=round($cdln, 2);
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
$note=round($note, 1);
}
$req=$bd->query('select count(distinct(studentId)) as count from comment where profId='.$id.' and approved = 1');
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
                
                                                        <div class="pm-author-bio-img-bg" style="background-image:url(<?php if($prof['gender']=='1') echo  'img/AvatarFemaleProf.png'; else echo 'img/AvatarProf2.png';?>)">
                                                            <div class="pm-single-news-post-avatar-icon">
                                                                <img width="33" height="41" src="img/news/post-icon.jpg" class="img-responsive" alt="icon">
                                                            </div>
                                                        </div>
                
                                                    </div>
                 
                                                    <div class="col-lg-9 col-md-9 col-sm-12">
                                                            <div class="pm-comment-vote-btn">
                                                                <?php
                                                                $voted=0;
                                                                $teaches=0;
                                                                if(isset($_SESSION['idEtudiant']))
                                                                {
                                                                    $requ = $bd->query("select * from rating where studentId='".$_SESSION['idEtudiant']."' and studentLevel='".$_SESSION['niveau']."' and profId='".$id."'");
                                                                    if($requ->fetch())
                                                                    $voted=1;
                                                                    else $voted=0;
                                                                    $requ2 = $bd->query("select * from teach where profId='".$id."'");
                                                                    if($requ2)
                                                                    while($result=$requ2->fetch())
                                                                    {
                                                                        if(($result['fosId']==$_SESSION['idFiliere'])&&($result['level']==$_SESSION['niveau']))
                                                                        $teaches=1;
                                                                    }
                                                                    
                                                                }
                                                                
                                                                ?>
                                                                    <a href="#" onclick="voter(<?php if(isset($_SESSION['idEtudiant'])) echo '1'; else echo '0'?>,<?php echo $voted; ?>,<?php echo $teaches; ?>)" class="pm-square-btn comment-reply">VOTER</a>
                                                                </div>
                                                        <p class="pm-author-name"><?php echo($prof['surname']." ".$prof['name']); ?></p>
                                                        <p class="pm-author-title"><?php echo($prof['grade']); ?></p>
                
                                                        <div class="pm-author-divider"></div>
                                                        <p class="pm-author-bio"><?php echo $phrase; ?></p>
                                                    </div>
                                                    

                                                </div>
                
                                            </div>
                                        </div>
                                       
                                        <div class="row">
                                            <br>
                                            <div class="col-lg-3 col-md-6 col-sm-6 ">
                                            <div class="row">
                                        <img class="arrowVote" src="img/arrow.png" hidden></img>
                                    </div>
                
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
                                                                    <p> Ce critère concerne uniquement le cours que propose cet enseignant, indépendemment 
                                                                        de ce dernier, même ci il peut bien en être l'auteur. 
                                                                        Comment jugez-vous la qualité du cours? Trouvez-vous que sa longueur est appropriée?
                                                                        Prenez en considération son degré de difficulté, son ergonomie et sa pertinence dans le
                                                                        score que vous attribuerez à ce critère.
                                                                    </p>
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
                                                                    <p>
                                                                        Ce critère concerne la fréquence d'absentéisme de l'enseignant.
                                                                        Pensez-vous que cet enseignant s'absente trop fréquemment? 
                                                                        Si c'est le cas, demandez-vous si les conséquences ont impacté 
                                                                        vos notes dans les examens ou votre niveau de compréhension général
                                                                        de la matière en fin de semestre et attribuez un score en fonction de 
                                                                        votre réponse à cette question.
                                                                    </p>
                
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
                                                                    <p>
                                                                        "Il n'est pas de bonne pédagogie qui ne commence par éveiller le désir d'apprendre."
                                                                        Comme son nom l'indique, ce critère évalue les compétences éducatives et pédagogiques 
                                                                        de l'enseignant. 
                                                                        Croyez-vous que cet enseignant fournit un effort supplémentaire pour vous faire 
                                                                        parvenir l'information de manière ergonomique et efficace, ou au contraire, 
                                                                        vous trouvez du mal à saisir toute information véhiculé par celui-ci?
                                                                        Quel sentiment vous procure cet enseignant vis à vis de sa matière? 
                                                                        Pensez-y et accorder une note sincère.
                                                                    </p>
                
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
                                                                    <p>
                                                                        L'ambiance d'un cours est un facteur tout aussi important dans l'expérience
                                                                        d'un étudiant avec un enseignant particulier. Comment la jugez-vous pendant les cours
                                                                        de cet enseignant? Tendue? décontractée? Ennuyeuse?
                                                                        Attribuez votre score en fonction de vos préférences. 
                                                                    </p>
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
                                                                    <p>
                                                                        Pour ce critère, qui concerne les notes obtenus dans les devoirs ou examens, il est recommandé
                                                                        de se baser sur votre expérience et celle de vos camarades de promotion. 
                                                                        Jugez-vous que l'attribution de notes de la part de cet enseignant se fait de manière
                                                                        adéquate, crédible et égale? Avez-vous souvent eu l'impression que vous ne méritiez pas la note
                                                                        obtenue dans un, ou plusieurs, examen? (Attention, il peut également s'agir d'une bonne note non méritée).
                                                                        <b> Prière de faire preuve de sérieux et de maturité au moment où vous attribuerez un score à ce critère. </b>
                                                                    </p>
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
                
                                                <center><h4 class="pm-comments-response-title"> <font color=#303F9F><?php if($commentsNumber==0) echo (" Aucun étudiant n'a"); else if($commentsNumber==1) echo ($commentsNumber." étudiant a"); else echo($commentsNumber." étudiants ont") ?> commenté le profil de cet enseignant</font></h4></center>
                                                <?php if($commentsNumber!=0) { 
                                                    $i=0;
                                                    $reqMAXIComments=$bd->query('select count(*) as counts ,commentId from interact GROUP BY commentId ORDER BY counts DESC');
                                                    ?>

                                                        <div style="padding-left: 33%">
                                                            <br><br>
                                                            <a href="javascript:;" id="topCommentaires" onclick="menuTopCommentaires(<?php echo $id; ?>)" class="pm-square-btn-comment-hovered comment-reply">Top Commentaires</a> &nbsp;&nbsp;&nbsp;&nbsp;
                                                            <a href="javascript:;" id="plusRecents" onclick="menuPlusRecents(<?php echo $id; ?>)" class="pm-square-btn-comment comment-reply" >Les Plus Récents</a>
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
                                                                <a href="javascript:;"  onclick="choice(<?php echo $id; ?>)" class="pm-square-btn-comment comment-reply" >VOIR PLUS +</a>
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
                                                        <textarea id="commentArea" name="pm-comment-message" cols="20" rows="10" placeholder="VOTRE AVIS ICI" class="pm-comment-form-textarea"></textarea>
                                                    </div>
                                                    
                                                    <div class="col-lg-12 pm-clear-element">
                                                        <div class="pm-comment-html-tags">
                                                            <span><font color="#FFC107">Prière d'être constructif</font></span>
                
                                                        </div>
                                                        <input name="pm-comment-submit-btn" class="pm-rounded-btn no-border" onclick="commenter(<?php echo $id; ?>)" type="button" value="Commenter">
                                                        <div id="radios">
                                                        <label for="Identité Publique" class="material-icons">
                                                            <input type="radio" name="mode" id="Identité Publique" value="Identité Publique" checked="">
                                                            <span><i class="material-icons">remove_red_eye</i></span>
                                                        </label>								
                                                        <label for="Anonyme" class="material-icons">
                                                            <input type="radio" name="mode" id="Anonyme" value="Vote Anonyme">
                                                            <span><i class="material-icons">panorama_fish_eye</i></span>
                                                        </label>
                                                        
                                                    </div>
                                                </div>
                                                </form>
                
                                            </div>
                                            <?php include 'loginForm.php'; ?>

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
            $(document).ajaxStart(function () {
                            if(!document.getElementById("loaderRecents"))
                            $("#zone_plus_recents").append('<div style="padding-top:30px;" id="loaderRecents"><center><img src="img/logoanime.gif"/></center></div>');
                            if(!document.getElementById("loaderTop"))
                            $("#zone_top_commentaires").append('<div style="padding-top:30px;" id="loaderTop"><center><img src="img/logoanime.gif"/></center></div>');
                        });
            </script>
            
            
            <script>
                clapping(0);
                
                function validerPopupDejaVote(){
                            window.location.href = "vote.php?id=<?php echo $id; ?>";
                        }

                function validerPopupIncapable(){
                    document.getElementById('incapableVoter').style.display='none';
                    if(document.getElementById('submitCommentaire').style.display=='block')
                    document.getElementById('submitCommentaire').style.display='none';
                }

                function clapPopUp(){
                    document.getElementById('applaud').style.display='block';
                }

                        function voter(etudiant,voted,teaches)
                        {
                            if(etudiant==0)
                            document.getElementById('vote').style.display='block';
                            else if (teaches==0)
                            {
                                document.getElementById('incapableVoter').style.display='block';
                            }
                            else if (voted==1)
                            {
                                document.getElementById('dejaVote').style.display='block';
                                var cpt = 7;
                                setInterval(function(){
                                            --cpt;
                                            document.getElementById('validerPopUp').innerText="VALIDER ( "+cpt+" )";
                                        }, 1000);
                                setTimeout(() => {
                                    window.location.href = "vote.php?id=<?php echo $id; ?>";
                                }, 7000);
                                // puis :
                            }
                            else window.location.href = "vote.php?id=<?php echo $id; ?>";

                        }




                        function commenter(profId){
                            commentaire = document.getElementById("commentArea").value;
                            publique = document.getElementById("Identité Publique").checked;
                            anonyme = document.getElementById("Anonyme").checked;
                            $.ajax({
                                                        url : 'commenter.php',
                                                        type : 'GET',
                                                        data: {
                                                        commentaire,publique,anonyme,profId    
                                                        },
                                                        success : function(response, statut){
                                                            if(response=="unlogged")
                                                            document.getElementById('commentaire').style.display='block';
                                                            else
                                                            {
                                                            document.getElementById("commentArea").value="";
                                                            document.getElementById('submitCommentaire').style.display='block';
                                                            }
                                                        },
                                                        error : function(response, statut, erreur){
                                                        }
                                                    }); 
                            }
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
                    var nbrClicksTopComments=0;    
                    var nbrClicksRecents=0;

      

                            function lastTimee(profId){
                                var x;
                                        $.ajax({
                                            url : 'voirPlus.php',
                                            type : 'GET',
                                            data: {
                                            param,profId    
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
                        lastTimee(<?php echo $id; ?>);

                        
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
                                   

                                    
                            function menuPlusRecents(profId)
                        {   nbrClicksRecents=0;
                            if(document.getElementById("plusRecents").classList.contains("pm-square-btn-comment"))
                            {
                            param=1;
                            lastTime=lastTimee(profId);
                            shown="";
                            plusRecents(profId);
                        }
                        }


                        function menuTopCommentaires(profId)
                        {
                            nbrClicksTopComments=0;    
                            parametre=1;
                            param2=1;
                            topCommentaires(profId);
                        }
                        
                        function choice(profId){
                            if(document.getElementById("topCommentaires").classList.contains("pm-square-btn-comment-hovered"))
                            {
                                topCommentaires(profId);
                            }
                            else
                            {
                                plusRecents(profId);
                            }
                        }


                        function plusRecents(profId){
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
                            
                            /* if(document.getElementById("559"))
                            {
                            var element = document.getElementById("559"); 
                            element.parentNode.removeChild(element);
                            } */


                                        $.ajax({
                                            url : 'voirPlus.php',
                                            type : 'GET',
                                            data: {
                                                lastTime,shown,profId,nbrClicksRecents
                                            },
                                            dataType : "json",
                                            success : function(response, statut){
                                                $("#loaderRecents").remove();
                                                var finVoirPlusR=(nbrClicksRecents.toString()).length;
                                                finVoirPlusR=finVoirPlusR+28;
                                                if(response.comment.length!=finVoirPlusR)
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
                                            nbrClicksRecents=nbrClicksRecents+3;
                                        },
                                            error : function(response, statut, erreur){
                                                setTimeout(() => {
                                                        plusRecents(<?php echo $id; ?>)
                                                    }, 1000)
                                            }
                                        });

                                          

                        }
                
                lastCount=" ";   
               topCommentaires(<?php echo $id; ?>);
               function topCommentaires(profId){
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
                            

                            

                            var parametre = "top";
                            
                            
                            $.ajax({
                                
                                            url : 'voirPlus.php',
                                            type : 'GET',
                                            data: {
                                                lastCount,shown2,parametre,param2,profId,nbrClicksTopComments
                                            },
                                            dataType : "json",
                                            success : function(response, statut){
                                                $("#loaderTop").remove();
                                                var finVoirPlusT=(nbrClicksTopComments.toString()).length;
                                                finVoirPlusT=finVoirPlusT+28;
                                                if(response.comment.length!=finVoirPlusT)
                                                {
                                                $('#zone_top_commentaires').fadeIn(2000);
                                                $("#zone_top_commentaires").append(response.comment);
                                                
                                                lastCount=response.lastCount;
                                                shown2=response.shown2;
                                                param2=0;
                                                if ( $('#voirPlus').css('display') == 'none' )
                                                $('#voirPlus').show();

                                            }
                                                else if(nbrClicksTopComments==0)
                                                {
                                                    $('#zone_top_commentaires').fadeIn(2000);
                                                    $("#zone_top_commentaires").append('<br><br><center><h4 class="pm-comments-response-title"> <font color="#303F9F">Aucun commentaire n\'a fait l\'objet d\'un applaud.</font></h4></center>');
                                                    $('#voirPlus').hide();
                                                }
                                                else
                                                { 
                                                $('#voirPlus').hide();
                                                }
                                            nbrClicksTopComments=nbrClicksTopComments+3;
                                        },
                                            error : function(response, statut, erreur){
                                                setTimeout(() => {
                                                        topCommentaires(<?php echo $id; ?>)
                                                    }, 1000)
                                            }
                                        });

                            

                        }


            </script> 
            
            <script>
                var modal = document.getElementById('incapableVoter');
                var modal2 = document.getElementById('dejaVote');
                var modal3 = document.getElementById('vote');
                var modal4 = document.getElementById('avis');
                var modal5 = document.getElementById('commentaire');
                var modal6 = document.getElementById('submitCommentaire');
                var modal7 = document.getElementById('applaud');
                window.onclick = function(event) {
                    if (event.target == modal) {
                        modal.style.display = "none";
                    }
                    if (event.target == modal2) {
                        modal2.style.display = "none";
                    }
                    if (event.target == modal3) {
                        modal3.style.display = "none";
                    }
                    if (event.target == modal4) {
                        modal4.style.display = "none";
                    }
                    if (event.target == modal5) {
                        modal5.style.display = "none";
                    }
                    if (event.target == modal6) {
                        modal6.style.display = "none";
                    }
                    if (event.target == modal7) {
                        modal7.style.display = "none";
                    }
                }
            
              
            </script>

            <p id="back-top" class="visible-lg visible-md visible-sm" style="bottom: -70px;"></p>



        <div id="ui-datepicker-div" class="ui-datepicker ui-widget ui-widget-content ui-helper-clearfix ui-corner-all"></div></body></html>
