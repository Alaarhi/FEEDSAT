<?php 
	// connect to the database
    $requ=$bd->query("select count(score) as nbr, sum(score) as somme from rating");
    $resrequ=$requ->fetch();
    $logoHeader="img/PopUpLevel0.png";    
    if($resrequ['nbr']!=0)
    {
    if(round($resrequ['somme']/$resrequ['nbr'],0)<=2)
    $logoHeader="img/PopUpLevel0.png";
    if(round($resrequ['somme']/$resrequ['nbr'],0)>2 && round($resrequ['somme']/$resrequ['nbr'],0)<=4)
    $logoHeader="img/PopUpLevel1.png";
    if(round($resrequ['somme']/$resrequ['nbr'],0)>4 && round($resrequ['somme']/$resrequ['nbr'],0)<=6)
    $logoHeader="img/PopUpLevel2.png";
    if(round($resrequ['somme']/$resrequ['nbr'],0)>6 && round($resrequ['somme']/$resrequ['nbr'],0)<=8)
    $logoHeader="img/PopUpLevel3.png";
    if(round($resrequ['somme']/$resrequ['nbr'],0)>8 && round($resrequ['somme']/$resrequ['nbr'],0)<10)
    $logoHeader="img/PopUpLevel4.png";
    if(round($resrequ['somme']/$resrequ['nbr'],0)==10)
    $logoHeader="img/PopUpLevel5.png";
    }


?>
<div id="avis" class="modal" >
<!--<div class="modal-content animate">-->
  <form class="modal-content animate" onsubmit="return false">
    
    <div class="imgcontainer">
        <img src="<?php echo $logoHeader; ?>" alt="Logo">
          <h4 style="margin-top: 5%; text-align:center; color: #303F9F">Identifiez-vous pour accéder à ce contenu</h4>
    </div>
      
    <div class="container">
      <input name="numInscri" id="id1" class="pm-form-textfield" type="text" placeholder="Identifiant (votre numéro d'étudiant)">
      <input name="numCin" id="mdp1" class="pm-form-textfield" type="password" placeholder="Mot de Passe (votre numéro de cin)">        
      <input name="source" id="src1" type="text" hidden value="avis.php" >  
      <div id="err1" style="display:none; padding-left:3%; font-family:Raleway;"> <font color="red"> Nom d'utilisateur ou mot de passe incorrect(s). </font></div>     
      <button style= 
      "
        background-color:  #303F9F;
        color: white;
        padding: 14px 20px;
        margin: 15px 30px;
        border: none;
        cursor: pointer;
        width: 50%;
        font-size:15px;
        font-family: 'Raleway';
        transition: all 0.5s;
        -moz-transition: all 0.5s;
        -webkit-transition: all 0.5s;
        -o-transition: all 0.5s;
      "   
      onclick="seConnecter('id1,mdp1,src1,err1');" id ="avisVoirPlus">SE CONNECTER</button>  
    </div>
  </form>
</div>



<div id="vote" class="modal" >
  <form class="modal-content animate" onsubmit="return false">
    
    <div class="imgcontainer">

        <img src="<?php echo $logoHeader; ?>" alt="Logo">
          <h4 style="margin-top: 5%; text-align:center; color: #303F9F">Identifiez-vous pour accéder à ce contenu</h4>
    </div>
      
    <div class="container">
    <input name="numInscri" id="id2" class="pm-form-textfield" type="text" placeholder="Identifiant (votre numéro d'étudiant)">
    <input name="numCin" id="mdp2" class="pm-form-textfield" type="password" placeholder="Mot de Passe (votre numéro de cin)">        
    <input name="source" id="src2" type="text" hidden value="vote.php" >     
    <div id="err2" style="display:none; padding-left:3%; font-family:Raleway;"> <font color="red"> Iddentifiant ou mot de passe incorrect(s). </font></div>     
  
      <button style= 
      "
        background-color:  #303F9F;
        color: white;
        padding: 14px 20px;
        margin: 15px 30px;
        border: none;
        cursor: pointer;
        width: 50%;
        font-size:15px;
        font-family: 'Raleway';
        transition: all 0.5s;
        -moz-transition: all 0.5s;
        -webkit-transition: all 0.5s;
        -o-transition: all 0.5s;
      "   
      onclick="seConnecter('id2,mdp2,src2,err2');" id ="avisVoirPlus2" >SE CONNECTER</button>  
    </div>
  </form>
</div>



<div id="commentaire" class="modal" >
  <form class="modal-content animate" onsubmit="return false">
    
    <div class="imgcontainer">
        <img src="<?php echo $logoHeader; ?>" alt="Logo">
          <h4 style="margin-top: 5%; text-align:center; color: #303F9F">Identifiez-vous pour laisser un commentaire</h4>
    </div>
      
    <div class="container">
    <input name="numInscri" id="id3" class="pm-form-textfield" type="text" placeholder="Identifiant (votre numéro d'étudiant)">
    <input name="numCin" id="mdp3" class="pm-form-textfield" type="password" placeholder="Mot de Passe (votre numéro de cin)">        
    <input name="source" id="src3" type="text" hidden value="vote.php" >     
    <div id="err3" style="display:none; padding-left:3%; font-family:Raleway;"> <font color="red"> Nom d'utilisateur ou mot de passe incorrect(s). </font></div>     
  
      <button style= 
      "
        background-color:  #303F9F;
        color: white;
        padding: 14px 20px;
        margin: 15px 30px;
        border: none;
        cursor: pointer;
        width: 50%;
        font-size:15px;
        font-family: 'Raleway';
        transition: all 0.5s;
        -moz-transition: all 0.5s;
        -webkit-transition: all 0.5s;
        -o-transition: all 0.5s;
      "   
      onclick="seConnecter('id3,mdp3,src3,err3');" id ="avisVoirPlus3" >SE CONNECTER</button>  
    </div>
  </form>
</div>


<div id="applaud" class="modal" >
  <form class="modal-content animate" onsubmit="return false">
    
    <div class="imgcontainer">
        <img src="<?php echo $logoHeader; ?>" alt="Logo">
          <h4 style="margin-top: 5%; text-align:center; color: #303F9F">Identifiez-vous pour interagir</h4>
    </div>
      
    <div class="container">
    <input name="numInscri" id="id6" class="pm-form-textfield" type="text" placeholder="Identifiant (votre numéro d'étudiant)">
    <input name="numCin" id="mdp6" class="pm-form-textfield" type="password" placeholder="Mot de Passe (votre numéro de cin)">        
    <input name="source" id="src6" type="text" hidden value="vote.php" >     
    <div id="err6" style="display:none; padding-left:3%; font-family:Raleway;"> <font color="red"> Nom d'utilisateur ou mot de passe incorrect(s). </font></div>     
  
      <button style= 
      "
        background-color:  #303F9F;
        color: white;
        padding: 14px 20px;
        margin: 15px 30px;
        border: none;
        cursor: pointer;
        width: 50%;
        font-size:15px;
        font-family: 'Raleway';
        transition: all 0.5s;
        -moz-transition: all 0.5s;
        -webkit-transition: all 0.5s;
        -o-transition: all 0.5s;
      "   
      onclick="seConnecter('id6,mdp6,src6,err6');" id ="avisVoirPlus4" >SE CONNECTER</button>  
    </div>
  </form>
</div>


<div id="dejaVote" class="modal" >
  <form class="modal-content animate" onsubmit="return false">
    
    <div class="imgcontainer" id="message">
        <img src="<?php echo $logoHeader; ?>" alt="Logo">
          <h4 style="margin-top: 10%; text-align:center; color: #5e6467">
            <font color="#4553a9">
              Vous avez déjà attribué un score à ce profil. 
              Une nouvelle tentative modifiera ce dernier et ne comptera pas comme une évaluation supplémentaire.
              <br> <br>
            </font>
          </h4>
          <button style= 
      "
        background-color:  #303F9F;
        color: white;
        padding: 14px 20px;
        margin: 15px 30px;
        border: none;
        cursor: pointer;
        width: 50%;
        font-size:15px;
        font-family: 'Raleway';
        transition: all 0.5s;
        -moz-transition: all 0.5s;
        -webkit-transition: all 0.5s;
        -o-transition: all 0.5s;
      "   
      onclick="validerPopupDejaVote();" id ="validerPopUp">VALIDER</button> 
        </div>
  </form>
</div>


<div id="incapableVoter" class="modal" >
  <form class="modal-content animate" onsubmit="return false">
    
    <div class="imgcontainer" id="message">
        <img src="<?php echo $logoHeader; ?>" alt="Logo"><br>
          <h4 style="margin-top: 10%; text-align:center; color: #5e6467; font-size:19px">
            <font color="#4553a9">
            Desolé, vous n'êtes pas en mesure d'évaluer cet enseignant tant que vous ne suivez pas son cours.
              <br><br>Vous êtes libre toutefois de consulter son profil pour voir et intéragir avec les avis partagés par ses étudiants.
              <br><br><br></font></h4>
          <button style= 
      "
        background-color:  #303F9F;
        color: white;
        padding: 14px 20px;
        margin: 15px 30px;
        border: none;
        cursor: pointer;
        width: 50%;
        font-size:15px;
        font-family: 'Raleway';
        transition: all 0.5s;
        -moz-transition: all 0.5s;
        -webkit-transition: all 0.5s;
        -o-transition: all 0.5s;
      "   
      onclick="validerPopupIncapable();" >Revenir au profil</button> 
        </div>
  </form>
</div>


<div id="submitCommentaire" class="modal" >
  <form class="modal-content animate" onsubmit="return false">
    
    <div class="imgcontainer" id="message">
        <img src="<?php echo $logoHeader; ?>" alt="Logo">
          <h4 style="margin-top: 5%; text-align:center; color: #5e6467; font-size:18px">
          <font color="green"><b>Nous vous remercions pour votre contribution à INSAT-FEEDBACKS. </b>
              <br>
              Grâce à vous, nous sommes capables d'offrir aux INSATiens un support de Feedbacks
              encore plus pertinent.

              </font></h4><br>
            <br><br>
            <h4 style="margin-top: -5%; text-align:center; color: #5e6467; font-size:15px">
              <font color="#4553a9">
                <b>Votre commentaire est désormais en attente d'approbation.</b>
                Gardez à l'esprit que nous pouvons interdire la publication de votre commentaire s'il n'est
                pas conforme à nos critères d'approbation. En aucun cas nous ne tolèrerons les commentaires
                à caractère haineux et non respectueux envers un enseignant, ni que les commentaires qui ne réflètent pas
                une volonté de partager une opinion constructive.
              </font></h4><br>
          <button style= 
      "
        background-color:  #303F9F;
        color: white;
        padding: 14px 20px;
        margin: 15px 30px;
        border: none;
        cursor: pointer;
        width: 50%;
        font-size:15px;
        font-family: 'Raleway';
        transition: all 0.5s;
        -moz-transition: all 0.5s;
        -webkit-transition: all 0.5s;
        -o-transition: all 0.5s;
      "   
      onclick="validerPopupIncapable();" >OK</button> 
        </div>
  </form>
</div>


<div id="submitVote" class="modal" >
  <form class="modal-content animate" onsubmit="return false">
    
    <div class="imgcontainer" id="message">
        <img src="<?php echo $logoHeader; ?>" alt="Logo">
          <h4 style="margin-top: 5%; text-align:center; color: #303F9F"><br>Votre évaluation est bien prise en compte.<br><br> Nous vous remercions pour votre contribution.</h4><br>           
          <button style= 
      "
        background-color:  #303F9F;
        color: white;
        padding: 14px 20px;
        margin: 15px 30px;
        border: none;
        cursor: pointer;
        width: 50%;
        font-size:15px;
        font-family: 'Raleway';
        transition: all 0.5s;
        -moz-transition: all 0.5s;
        -webkit-transition: all 0.5s;
        -o-transition: all 0.5s;
      "   
      onclick="validerPopupVoter();" >OK</button> 
        </div>
  </form>
</div>



<div id="chmdp" class="modal" >
<!--<div class="modal-content animate">-->
  <form class="modal-content animate" onsubmit="return false">
    
    <div class="imgcontainer">
        <img src="<?php echo $logoHeader; ?>" alt="Logo">
          <h4 style="margin-top: 5%; text-align:center; color: #303F9F">Changer votre mot de passe</h4>
    </div>
      
    <div  class="container">
      <div id="chmdpcontainer">
      <input name="numInscri" id="mdpasse" class="pm-form-textfield" type="password" placeholder="Nouveau Mot De Passe">
      <input name="numCin" id="cmdpasse" class="pm-form-textfield" type="password" placeholder="Confirmer Le Nouveau Mot De Passe">        
      <div id="error1" style="display:none; padding-left:3%; font-family:Raleway;"> <font color="red"> Les deux mots de passes ne sont pas identiques. </font></div>     
    </div>
      <button style= 
      "
        background-color:  #303F9F;
        color: white;
        padding: 14px 20px;
        margin: 15px 30px;
        border: none;
        cursor: pointer;
        width: 50%;
        font-size:15px;
        font-family: 'Raleway';
        transition: all 0.5s;
        -moz-transition: all 0.5s;
        -webkit-transition: all 0.5s;
        -o-transition: all 0.5s;
      "   
      onclick="chMdp(<?php echo $_SESSION['idEtudiant']; ?>);" id ="boutonchmdp">VALIDER</button>  
    </div>
  </form>
</div>



<script>

    function chMdp(studentId){
      mdp = document.getElementById("mdpasse").value;
      cmdp = document.getElementById("cmdpasse").value;

      if(document.getElementById("error1").style.display=="block")
      $("#error1").hide();

      if(mdp!=cmdp)
      document.getElementById("error1").style.display="block";
      else
      $.ajax({
                                                        url : 'chMdp.php',
                                                        type : 'POST',
                                                        data: {
                                                        mdp,studentId
                                                        },
                                                        success : function(response, statut){
                                                          if(document.getElementById("errorr"))
                                                          $("#errorr").remove();

                                                          if(response=="Mot de passe changé avec succès.")
                                                          color="green";
                                                          else
                                                          color="red";

                                                          $('#chmdpcontainer').append('<div id="errorr" style="padding-left:3%; font-family:Raleway;"> <font color="'+color+'">'+response+'</font></div> ');
                                                          if(response=="Mot de passe changé avec succès.")
                                                          setTimeout(() => {
                                                            window.location = "index.php";
                                                              }, 1000);
                                                        },
                                                        error : function(response, statut, erreur){
                                                          alert(erreur);
                                                        }
                                                    }); 
    }

    function seConnecter(id){

      id=id.split(',');
      numInscri=document.getElementById(id[0]).value;
      numCin=document.getElementById(id[1]).value;
      source=document.getElementById(id[2]).value;
      errorId=id[3];
      $.ajax({
                                                        url : 'authentification.php',
                                                        type : 'POST',
                                                        data: {
                                                        numInscri,numCin,source  
                                                        },
                                                        success : function(response, statut){
                                                          if(response=="erreur authentification")
                                                          {
                                                          document.getElementById(errorId).style.display="block";
                                                          }
                                                          else
                                                          {
                                                          if((response=="logged")&&(source=="avis.php"))
                                                          {
                                                            window.location.replace('avis.php');
                                                          }
                                                          if((response=="logged")&&(source=="vote.php"))
                                                          {
                                                            document.getElementById('vote').style.display='none';
                                                            location.reload();                                                          }
                                                          }
                                                        },
                                                        error : function(response, statut, erreur){
                                                        }
                                                    }); 

    }

</script>