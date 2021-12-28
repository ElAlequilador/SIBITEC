<?php
	require("conexion.php");
	require("funcionesLimpieza.php");
	$id_carrera = valida_input($_GET['id']);


	$var_delete = "DELETE FROM carreras WHERE id_carrera = '$id_carrera'";

	$resultado = mysqli_query($obj_conexion, $var_delete);

	if ($resultado) {
		echo'<script>
				alert("Carrera Eliminada Exitosamente.");
				location.href="../html/admincarreras.php";
			</script>';
	} else {
		echo'<script>
				alert("[ERROR]: Al eliminar carrera, intente nuevamente.");
				location.href="../html/admincarreras.php";
			</script>';
	}
?>