<?php
	session_start();
	if(isset($_SESSION['correo'])){
		unset($_SESSION['correo']);
	}
	session_destroy();
	header("Location: ../html/visitante.php");
?>