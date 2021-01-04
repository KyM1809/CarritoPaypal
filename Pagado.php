<?php
	
	session_start();
	session_unset('Carrito');
	session_destroy();
	header('location:index.php');
?>
