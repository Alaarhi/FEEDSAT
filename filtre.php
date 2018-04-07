<?php 
include 'dbConnection.php';

if (isset($_GET['dep'])) {
    $departement =  $_GET['dep'];
    switch ($departement) {
        case "gim":
            $depName = "Génie Informatique et Mathématiques";
            break;

        case "gpi":
            $depName = "Génie Physique et Instrumentation";
            break;

        case "gbc": 
            $depName = "Génie Biologique et de Chimie";
            break;

        case "slf":
            $depName = "Sciences Sociales, Langues et Formation Générale";
            break;
    }
}

include 'header.php';
?>

<div class="pm-sub-header-container">
    <div class="pm-sub-header-info-profs">    	
        <div class="container">
            <div class="row">
                <div class="col-lg-12">               	
                    <p class="pm-page-title"><?php echo $depName?></p>
                    <p class="pm-page-message">Découvrez la popularité des enseignants de ce département. </p>
                </div>
            </div>
        </div>            
    </div>          
    <div class="row"><br><br>
        <!--<div class="col-lg-12  pm-columnPadding30 pm-center">
            <br><br>
                <h5>CONSULTER . VOTER . AMÉLIORER </h5>
            <div class="pm-column-title-divider">
                <img height="29" width="32" src="img/MiniLogoWBG.png" alt="icon">
            </div>                  
        </div>-->
    </div>
</div>
<!-- Sub-header area end -->

<!-- PANEL 1 -->
<div class="container pm-containerPadding-bottom-30  pm-containerPadding-top-20">
        <div class="row pm-containerPadding-bottom-60 pm-center" id="row">
            </div>

            <div id="voirPlus" class="pm-comment-reply-btn">
                    <br>
                    <a href="javascript:;" onclick="voirPlus();" class="pm-square-btn-comment comment-reply">VOIR PLUS +</a>
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
        var dep = <?php echo $_GET['dep'] ?>;
        voirPlus(dep)
        var offset = 0;
        
        function voirPlus(dep) {
            if(!document.getElementById("loader")) {
                $("#row").append('<div style="padding-left:2%;" id="loader"><img src="img/logoanime.gif"/></div>');
            }
            $.ajax({
                url : 'voirPlusFiltre.php',
                type : 'GET',
                data: {
                    offset,
                    dep
                },
                dataType : "json",
                success : function(response, statut) {
                    console.log("succes");
                    console.dir(response);
                    $("#loader").remove();
                    if((response.reponse.length!="")) {
                        $("#row").append(response.reponse);
                        $('#row').fadeIn(2000);
                        offset=response.lastCount;
                        if(response.iterations != 9)
                            $('#voirPlus').hide();
                    }
                    else { 
                        $('#voirPlus').hide();
                    }
                },
                error : function(response, statut, erreur){
                    console.log(status);
                    console.dir(response);
                    console.log(erreur);
                    alert("error");
                    setTimeout(() => {
                        voirPlus()
                    }, 1000)
                }
            });
        }
    </script>
        
    <p id="back-top" class="visible-lg visible-md visible-sm" style="bottom: 10px;"></p>
    
  

<div id="ui-datepicker-div" class="ui-datepicker ui-widget ui-widget-content ui-helper-clearfix ui-corner-all"></div></body></html>
