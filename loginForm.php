
<div id="avis" class="modal" >
<!--<div class="modal-content animate">-->
  <form class="modal-content animate" onsubmit="return false">
    
    <div class="imgcontainer">
      <span onclick="document.getElementById('avis').style.display='none'" class="close" title="fermer">&times;</span>
        <img src="img/medical-link.jpg" alt="Logo">
          <h4 style="margin-top: 5%; text-align:center; color: #5e6467">Identifiez-vous pour accéder à ce contenu</h4>
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
      <span onclick="document.getElementById('vote').style.display='none'" class="close" title="fermer">&times;</span>
        <img src="img/medical-link.jpg" alt="Logo">
          <h4 style="margin-top: 5%; text-align:center; color: #5e6467">Identifiez-vous pour voter à cet enseignant</h4>
    </div>
      
    <div class="container">
    <input name="numInscri" id="id2" class="pm-form-textfield" type="text" placeholder="Identifiant (votre numéro d'étudiant)">
    <input name="numCin" id="mdp2" class="pm-form-textfield" type="password" placeholder="Mot de Passe (votre numéro de cin)">        
    <input name="source" id="src2" type="text" hidden value="vote.php" >     
    <div id="err2" style="display:none; padding-left:3%; font-family:Raleway;"> <font color="red"> Nom d'utilisateur ou mot de passe incorrect(s). </font></div>     
  
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
      onclick="seConnecter('id2,mdp2,src2,err2');" id ="avisVoirPlus" >SE CONNECTER</button>  
    </div>
  </form>
</div>



<div id="commentaire" class="modal" >
  <form class="modal-content animate" onsubmit="return false">
    
    <div class="imgcontainer">
      <span onclick="document.getElementById('commentaire').style.display='none'" class="close" title="fermer">&times;</span>
        <img src="img/medical-link.jpg" alt="Logo">
          <h4 style="margin-top: 5%; text-align:center; color: #5e6467">Identifiez-vous pour laisser un commentaire</h4>
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
      onclick="seConnecter('id3,mdp3,src3,err3');" id ="avisVoirPlus" >SE CONNECTER</button>  
    </div>
  </form>
</div>


<div id="applaud" class="modal" >
  <form class="modal-content animate" onsubmit="return false">
    
    <div class="imgcontainer">
      <span onclick="document.getElementById('applaud').style.display='none'" class="close" title="fermer">&times;</span>
        <img src="img/medical-link.jpg" alt="Logo">
          <h4 style="margin-top: 5%; text-align:center; color: #5e6467">Identifiez-vous pour interagir</h4>
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
      onclick="seConnecter('id6,mdp6,src6,err6');" id ="avisVoirPlus" >SE CONNECTER</button>  
    </div>
  </form>
</div>


<div id="dejaVote" class="modal" >
  <form class="modal-content animate" onsubmit="return false">
    
    <div class="imgcontainer" id="message">
      <span onclick="document.getElementById('dejaVote').style.display='none'" class="close" title="fermer">&times;</span>
        <img src="img/medical-link.jpg" alt="Logo">
          <h4 style="margin-top: 10%; text-align:center; color: #5e6467"><font color="#4553a9">Vous avez déja donné votre avis par rapport à cet enseignant. <br><br> Ce vote sera considéré comme un changement d'avis et non pas un vote supplémentaire.</font></h4>
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
      <span onclick="document.getElementById('incapableVoter').style.display='none'" class="close" title="fermer">&times;</span>
        <img src="img/medical-link.jpg" alt="Logo">
          <h4 style="margin-top: 10%; text-align:center; color: #5e6467"><font color="#4553a9">Cet enseignant ne vous enseigne pas cette année. <br><br>Vous êtes incapable de l'évaluer.<br><br></font></h4>
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
      onclick="validerPopupIncapable();" >VALIDER</button> 
        </div>
  </form>
</div>


<div id="submitCommentaire" class="modal" >
  <form class="modal-content animate" onsubmit="return false">
    
    <div class="imgcontainer" id="message">
      <span onclick="document.getElementById('submitCommentaire').style.display='none'" class="close" title="fermer">&times;</span>
        <img src="img/medical-link.jpg" alt="Logo">
          <h4 style="margin-top: 5%; text-align:center; color: #5e6467"><font color="green">Votre commentaire est maintenant en attente d'approbation.</font></h4><br><br><h4 style="margin-top: -5%; text-align:center; color: #5e6467"><font color="#4553a9"> Vos commentaires seront automatiquement approuvés si vous faites preuve d'activité et de volonté constructive.</font></h4><br>
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


<script>



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
                                                          alert(erreur);
                                                        }
                                                    }); 

    }

</script>