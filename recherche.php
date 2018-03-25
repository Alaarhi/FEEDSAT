<?php 

include 'dbConnection.php';

if (isset($_POST['inputRecherche'])) {
    $input = $_POST['inputRecherche'];

    $elements = explode(" ", $input);
    switch (sizeof($elements)) {
        case 1:
            $requeteRecherche = $bd->prepare(
                'SELECT * FROM professor 
                WHERE 
                (name LIKE "inputValue") OR (name LIKE "%inputValue") OR (name LIKE "inputValue%") OR (name = "%inputValue") 
                OR
                (surname LIKE "inputValue") OR (surname LIKE "%inputValue") OR (surname LIKE "inputValue%") OR (surname = "%inputValue")'
            );
            $requeteRecherche->bindParam(':inputValue', $elements[0]);
           
            //header("location: profs.php?ind=0");
            break;
        
        case 2:
            $requeteRecherche = $bd->prepare(
                'SELECT * FROM professor 
                WHERE 
                (name LIKE "nameValue") AND (surname LIKE "surnameValue")
                OR (name LIKE "nameValue") OR (name LIKE "%nameValue") OR (name LIKE "nameValue%") OR (name = "%nameValue") 
                OR (surname LIKE "surnameValue") OR (surname LIKE "%surnameValue") OR (surname LIKE "surnameValue%") OR (surname = "%surnameValue")'            
            );
            $requeteRecherche->bindParam(':surnameValue', $elements[0]);
            $requeteRecherche->bindParam(':nameValue', $elements[1]);
            
            while ($row = $requeteRecherche->fetch(PDO::FETCH_OBJ)) {
                $prof = $reqRecherche->fetch(PDO::FETCH_OBJ);
                $url = 'profs.php?idRech='.$reqRecherche->id;
            }
            header("location: $url");
            break;
    }
} else {
    header("location: profs.php?ind=0");
}

?>