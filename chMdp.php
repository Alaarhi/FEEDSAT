<?php 
    include 'dbConnection.php';
    $req=$bd->query("update student set password='".$_POST['mdp']."' where id=".$_POST['studentId']);
    if($req)
    {
    echo "Mot de passe changé avec succès.";
    session_destroy();
    }
    else 
    echo "Echec du changement du mot de passe.";
?>