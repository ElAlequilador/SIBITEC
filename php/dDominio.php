<?php
	require("conexion.php");
	require("funcionesLimpieza.php");
	$id_dominio = valida_input($_GET['id']);


	$var_delete = "DELETE FROM dominios WHERE id_dominio = '$id_dominio'";

	$resultado = mysqli_query($obj_conexion, $var_delete);

	if ($resultado) {
		echo'<script>
				alert("Dominio Eliminado Exitosamente.");
				location.href="../html/admindominios.php";
			</script>';
	} else {
		echo'<script>
				alert("[ERROR]: Al eliminar dominio, intente nuevamente.");
				location.href="../html/admindominios.php";
			</script>';
	}
?>