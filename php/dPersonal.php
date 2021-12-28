<?php
	require("conexion.php");
	require("funcionesLimpieza.php");
	$id_usuario = valida_input($_GET['id']);


	$var_delete = "DELETE FROM usuarios WHERE id_usuario = '$id_usuario'";

	$resultado = mysqli_query($obj_conexion, $var_delete);

	if ($resultado) {
		echo'<script>
				alert("Usuario Eliminado Exitosamente.");
				location.href="../html/adminpersonal.php";
			</script>';
	} else {
		echo'<script>
				alert("[ERROR]: Al eliminar usuario, intente nuevamente.");
				location.href="../html/adminpersonal.php";
			</script>';
	}
?>