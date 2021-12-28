<?php
	require("conexion.php");
	require("funcionesLimpieza.php");
	$id_motivo = valida_input($_GET['id']);


	$var_delete = "DELETE FROM motivos_entrada WHERE id_motivo = '$id_motivo'";

	$resultado = mysqli_query($obj_conexion, $var_delete);

	if ($resultado) {
		echo'<script>
				alert("Motivo Eliminado Exitosamente.");
				location.href="../html/adminmotivos.php";
			</script>';
	} else {
		echo'<script>
				alert("[ERROR]: Al eliminar motivo de entrada, intente nuevamente.");
				location.href="../html/adminmotivos.php";
			</script>';
	}
?>