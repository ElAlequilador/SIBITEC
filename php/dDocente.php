<?php
	require("conexion.php");
	require("funcionesLimpieza.php");
	$id_docente = valida_input($_GET['id']);


	$var_delete = "DELETE FROM docentes WHERE id_docente = '$id_docente'";

	$resultado = mysqli_query($obj_conexion, $var_delete);

	if ($resultado) {
		echo'<script>
				alert("Docente Eliminado Exitosamente.");
				location.href="../html/administrador.php";
			</script>';
	} else {
		echo'<script>
				alert("[ERROR]: Al eliminar docente, intente nuevamente.");
				location.href="../html/admindocentes.php";
			</script>';
	}
?>