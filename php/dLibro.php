<?php
	require("conexion.php");
	require("funcionesLimpieza.php");

	$id_libro = valida_input($_GET['id']);


	$var_delete = "DELETE FROM libros WHERE id_libro = '$id_libro'";

	$resultado = mysqli_query($obj_conexion, $var_delete);

	if ($resultado) {
		echo'<script>
				alert("Libro Eliminado Exitosamente.");
				location.href="../html/adminlibros.php";
			</script>';
	} else {
		echo'<script>
				alert("[ERROR]: Al eliminar libro, intente nuevamente.");
				location.href="../html/adminlibros.php";
			</script>';
	}
?>