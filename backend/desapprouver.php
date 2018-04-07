<?php
include '../dbConnection.php';

$var = $_POST['id'];

if ($req = $bd->query("UPDATE comment SET approved = 2 WHERE id=".$var)) {
    echo "comment desapproved";
}

else {echo "error";}
?>