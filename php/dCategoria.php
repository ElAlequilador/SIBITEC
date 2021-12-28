<?php
	require("conexion.php");
	require("funcionesLimpieza.php");
	$id_categoria = valida_input($_GET['id']);


	$var_delete = "DELETE FROM categorias WHERE id_categoria = '$id_categoria'";

	$resultado = mysqli_query($obj_conexion, $var_delete);

	if ($resultado) {
		echo'<script>
				alert("Categoria Eliminada Exitosamente.");
				location.href="../html/admincategorias.php";
			</script>';
	} else {
		echo'<script>
				alert("[ERROR]: Al eliminar categoria, intente nuevamente.");
				location.href="../html/admincategorias.php";
			</script>';
	}
?>