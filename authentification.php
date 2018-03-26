<?php 

include 'dbConnection.php';

//Authentification et création d'une session
    if ((isset($_POST['numInscri'])) && (isset($_POST['numCin']))) {
        $numCin = $_POST['numCin'];
        $numInscri = $_POST['numInscri'];

        $requete = $bd->prepare('SELECT * FROM student WHERE password = ? AND id = ?');
        $requete->execute(array($numCin, $numInscri));

        if (($requete->rowCount()) == 0) {
            
            echo "erreur authentification";
        } else {
            $etudiant = $requete->fetch(PDO::FETCH_OBJ);
            $_SESSION['idEtudiant'] = $etudiant->id;
            $_SESSION['nom'] = $etudiant->name;
            $_SESSION['prenom'] = $etudiant->surname;
            $_SESSION['niveau'] = $etudiant->level;
            $_SESSION['idFiliere'] = $etudiant->fosId;
            $_SESSION['level'] = $etudiant->level;
            echo "logged";           

            
        }     
    }


?>