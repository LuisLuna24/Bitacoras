<?php 

//No tocar este elemento

	session_start();
	session_unset();
	session_destroy();
	header("location:../../index.php");
?>