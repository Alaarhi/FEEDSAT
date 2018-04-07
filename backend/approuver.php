<?php
include '../dbConnection.php';

$var = $_POST['id'];

if ($req = $bd->query("UPDATE comment SET approved = 1 WHERE id=".$var)) {
    echo "comment approved";
}

else {echo "error";}
?>