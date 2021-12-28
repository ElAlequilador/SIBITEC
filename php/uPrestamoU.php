<?php
	require("conexion.php");
	require("funcionesLimpieza.php");

	if (isset($_POST['guardar'])) {
		
		if (strlen($_POST['id_prestamo']) >= 1 &&
			strlen($_POST['nfecha_entrega']) >= 1){
			
			$id_prestamo = valida_input($_POST['id_prestamo']);
			$fecha_NEntrega = $_POST['nfecha_entrega'];


			$var_update = "UPDATE prestamos_usuarios SET id_prestamo = '$id_prestamo',
												fecha_entrega = '$fecha_NEntrega'
			WHERE id_prestamo = '$id_prestamo'";

			$resultado = mysqli_query($obj_conexion, $var_update);

			if ($resultado) {
				echo '<script>
						alert("Prestamo Editado Exitosamente.");
						location.href="../html/tpendientes.php";
					</script>';
			} else {
				echo '<script>
						alert("[ERROR]: Al editar, verifique sus datos.");
						location.href="../html/editarprestamoU.php";
					</script>';
			}
		}else{
			echo '<script>
						alert("[ERROR]: No debes dejar campos vacíos.");
						location.href="../html/editarprestamoU.php";
					</script>';
		}
	}
?>