<?php 
    include 'dbConnection.php';
    if(!isset($_SESSION['idEtudiant']))
    header ("location: /index.php");
        
    if($_SESSION['idEtudiant']==$_POST['studentId'])
    $req=$bd->query("update student set password='".$_POST['mdp']."' where id=".$_POST['studentId']);
    else {
        header ("location: /index.php");
        exit();
    }
    if($req)
    {
    echo "Mot de passe changé avec succès.";
    session_destroy();
    }
    else 
    echo "Echec du changement du mot de passe.";
?>