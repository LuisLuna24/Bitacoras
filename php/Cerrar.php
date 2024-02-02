<?php 
	//Cierra sesión no tocar
	session_start();
	session_unset();
	session_destroy();
	header("location:../index.php");
?>