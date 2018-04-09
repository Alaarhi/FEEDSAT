<?php
include '../dbConnection.php';
if (!(isset($_SESSION['idEtudiant']))) {
    header ("location: /index.php");
}
else if (($_SESSION['idEtudiant']!="1300265")&&($_SESSION['idEtudiant']!="1300158")&&($_SESSION['idEtudiant']!="1400307")&&($_SESSION['idEtudiant']!="1400327"))
header ("location: /index.php");
else {
$var = $_POST['id'];

if ($req = $bd->query("UPDATE comment SET approved = 2 WHERE id=".$var)) {
    echo "comment desapproved";
}

else {echo "error ";}
}
?>