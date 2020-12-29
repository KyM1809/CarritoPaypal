<?php
	session_start();
	//include "Utiles.php";
	//$Util = new Utiles();
	//$Util->ActualizarDatosCierre($_SESSION["Usuario"]);
	session_unset("Logueado");
	session_unset("Usuario");
	session_unset("Nombre");
	session_destroy();
	header("Location:../index.php");
?>