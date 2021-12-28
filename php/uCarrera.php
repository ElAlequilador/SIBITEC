<?php
	require("conexion.php");
	require("funcionesLimpieza.php");

	//date_default_timezone_set('America/Mexico_City');

 	//$fecha = date("Y-m-d H:i:s");

	if (isset($_POST['guardar'])) {
		if (strlen($_POST['id_carrera']) >= 1 &&
			strlen($_POST['nombre']) >= 1){

			$id_carrera = valida_input($_POST['id_carrera']);
			$nombre = valida_input($_POST['nombre']);

			$var_update = "UPDATE carreras SET nombre = '$nombre'
						   WHERE id_carrera = '$id_carrera'";

			$resultado = mysqli_query($obj_conexion, $var_update);

			if ($resultado) {
				echo '<script>
						alert("Carrera Editada Exitosamente.");
						location.href="../html/admincarreras.php";
					</script>';
			} else {
				echo '<script>
						alert("[ERROR]: Al editar carrera, verifique sus datos.");
						location.href="../html/admincarreras.php";
					</script>';
			}
			
		}else{
			echo '<script>
						alert("[ERROR]: No debes dejar campos vacíos.");
						location.href="../html/admincarreras.php";
					</script>';
		}
	}
?>