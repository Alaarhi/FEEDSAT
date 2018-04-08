<?php 
	// On demarre la session AVANT d'ecrire du code HTML
	session_start();

	// connect to the database
	$bd = new PDO('mysql:host=insatfeewwfeedsa.mysql.db;dbname=insatfeewwfeedsa;charset=utf8', 'insatfeewwfeedsa', '123456mmM');

?>