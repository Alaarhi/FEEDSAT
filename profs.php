<?php
    include 'dbConnection.php';
    include 'header.php';


?>
        <div class="pm-sub-header-container">
        	<div class="pm-sub-header-info-profs">    	
                <div class="container">
                	<div class="row">
                    	<div class="col-lg-12">               	
                            <p class="pm-page-title">Les enseignants de l'INSAT</p>
                            <p class="pm-page-message">Curieux de découvrir la côte de popularité d'un enseignant ? <br> Consulter son profil et découvrez ce qu'en pensent les étudiants </p>
                            
                        </div>
                    </div>
                </div>            
            </div>          
            <div class="pm-sub-header-breadcrumbs">          	
                <div class="container">  	
                </div>   
            </div>
            <div class="row">
                <br><br>
                   <!-- <div class="col-lg-12  pm-columnPadding30 pm-center">
                        <br><br>
                        <h5>CONSULTER . VOTER . AMÉLIORER </h5>
                        <div class="pm-column-title-divider">
                            <img height="29" width="32" src="img/MiniLogoWBG.png" alt="icon">
                        </div>                  
                    </div>-->
            </div>
        </div>
 		<!-- Sub-header area end -->
        
        <!-- BODY CONTENT starts here -->
        <!-- PANEL 4 -->
        <div class="pm-column-container testimonials pm-parallax-panel" style="background-color: rgb(32, 186, 199); background-image: url(&quot;img/home/testimonials-bg.jpg&quot;); background-repeat: repeat-y; background-position: 0% -1376.5px;" data-stellar-background-ratio="0.5" data-stellar-vertical-offset="-50">
        <!-- /.container -->
        </div>


<!-- PANEL 1 -->
        <div id="subRow" class="container pm-containerPadding-bottom-30  pm-containerPadding-top-20">
        <div id="row" class="row pm-containerPadding-bottom-10 pm-center">
            </div>
                <div id="voirPlus" class="pm-comment-reply-btn">
                    <br>
                    <a href="javascript:;" onclick="voirPlus(<?php if (isset($_GET['id'])) echo $_GET['id']; ?>);" class="pm-square-btn-comment comment-reply">VOIR PLUS +</a>
                </div>
            
            </div>
        <!-- PANEL 5 end -->
        
        <!-- BODY CONTENT end -->


  <?php include 'footer.html';?>



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

                        $(document).ajaxStart(function () {
                            if(!document.getElementById("loader"))
                            $("#row").append('<div style="padding-left:2%;" id="loader"><img src="img/logoanime.gif"/></div>');
                        });



        <?php if(isset($_GET['id'])) echo "voirPlus(".$_GET['id'].");"; else echo "voirPlus();"; ?>
                var offset=0;
                function voirPlus(id){
                    
                                        $.ajax({
                                            url : 'voirPlusProfs.php',
                                            type : 'GET',
                                            data: {
                                                    offset,id
                                                  },
                                            dataType : "json",
                                            success : function(response, statut){
                                                $("#loader").remove();
                                                if((response.reponse.length!=""))
                                                    {
                                                        
                                                        $("#row").append(response.reponse);
                                                        $('#row').fadeIn(2000);
                                                        offset=response.lastCount;
                                                        if(response.iterations!=9)
                                                        $('#voirPlus').hide();
                                                    }
                                                else
                                                { 
                                                    $('#voirPlus').hide();
                                                }
                                        },
                                            error : function(response, statut, erreur){
                                                setTimeout(() => {
                                                        voirPlus()
                                                    }, 1000)
                                            }
                                        });

                                          

                        }

    </script>
        
    <p id="back-top" class="visible-lg visible-md visible-sm" style="bottom: 10px;"></p>
    
  

<div id="ui-datepicker-div" class="ui-datepicker ui-widget ui-widget-content ui-helper-clearfix ui-corner-all"></div></body></html>
