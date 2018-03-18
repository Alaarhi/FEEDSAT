<?php 
	// On demarre la session AVANT d'ecrire du code HTML
	session_start();

	// connect to the database
	$bd = new PDO('mysql:host=localhost;dbname=feedsat;charset=utf8', 'root', '');

?>