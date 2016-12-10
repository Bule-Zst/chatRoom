<?php 
	session_start();
	$language = $_POST['language'];
	$_SESSION['language'] = $language;
 ?>