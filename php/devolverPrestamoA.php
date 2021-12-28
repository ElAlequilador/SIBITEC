 <?php
	require("conexion.php");
	require("funcionesLimpieza.php");

	$folio = valida_input($_GET['folio']);


	$var_update = "UPDATE libros SET num_ejemplares = (num_ejemplares + 1)
        WHERE folio = '$folio'";

	$res_update = mysqli_query($obj_conexion, $var_update);

	if ($res_update) {
		    $var_delete = "DELETE FROM prestamos_alumnos WHERE folio = '$folio'";
		    $res_delete = mysqli_query($obj_conexion, $var_delete);
		    if ($res_delete) {
		   		echo'<script>
						alert("Libro Devuelto Exitosamente.");
						location.href="../html/padmin.php";
					</script>';
		    }
	} else {
		echo'<script>
				alert("[ERROR]: Al devolver prestamo, intente nuevamente.");
				location.href="../html/tpendientes.php";
			</script>';
	}
?>