<?php
	require("conexion.php");
	require("funcionesLimpieza.php");
	$id_seccion = valida_input($_GET['id']);


	$var_delete = "DELETE FROM secciones WHERE id_seccion = '$id_seccion'";

	$resultado = mysqli_query($obj_conexion, $var_delete);

	if ($resultado) {
		echo'<script>
				alert("Seccion Eliminado Exitosamente.");
				location.href="../html/adminsecciones.php";
			</script>';
	} else {
		echo'<script>
				alert("[ERROR]: Al eliminar seccion, intente nuevamente.");
				location.href="../html/adminsecciones.php";
			</script>';
	}
?>