<?php 
	// On d�marre la session AVANT d'�crire du code HTML
	session_start();

	// connect to the database
	$bd = mysqli_connect('localhost', 'root', '', 'feedsat');

?>