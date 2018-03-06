<?php 
	// On démarre la session AVANT d'écrire du code HTML
	session_start();

	// connect to the database
	$bd = mysqli_connect('localhost', 'root', '', 'feedsat');

?>