<?php
	require("conexion.php");
	require("funcionesLimpieza.php");
	$id_alumno = valida_input($_GET['id']);


	$var_delete = "DELETE FROM alumnos WHERE id_alumno = '$id_alumno'";

	$resultado = mysqli_query($obj_conexion, $var_delete);

	if ($resultado) {
		echo'<script>
				alert("Alumno Eliminado Exitosamente.");
				location.href="../html/administrador.php";
			</script>';
	} else {
		echo'<script>
				alert("[ERROR]: Al eliminar alumno, intente nuevamente.");
				location.href="../html/adminalumnos.php";
			</script>';
	}
?>