<?php
include 'dbConnection.php';

if(!isset($_SESSION['idEtudiant']))
{
echo("unlogged");
exit();
}

if(isset($_GET['commentaire'])&&isset($_GET['publique'])&&isset($_GET['anonyme'])&&isset($_GET['profId']))
{
    if($_GET['publique']=="true")
    $visibility=1;
    else
    $visibility=0;
    $req = $bd->prepare("insert into comment (comment,studentLevel,visibility,studentId,profId) values (:comment,:studentLevel,:visibility,:studentId,:profId) ");
    $req->execute(array(
        'comment' => htmlspecialchars($_GET['commentaire']),
        'studentLevel' => $_SESSION['level'],
        'visibility' => $visibility,
        'studentId' => $_SESSION['idEtudiant'],
        'profId' => $_GET['profId'],
        ));
  
}

?>