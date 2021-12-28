<?php
	require("conexion.php");
	require("funcionesLimpieza.php");

	//date_default_timezone_set('America/Mexico_City');

 	//$fecha = date("Y-m-d H:i:s");

	if (isset($_POST['guardar'])) {
		if (strlen($_POST['id_seccion']) >= 1 &&
			strlen($_POST['nombre']) >= 1){

			$id_seccion = valida_input($_POST['id_seccion']);
			$nombre = valida_input($_POST['nombre']);

			$var_update = "UPDATE secciones SET nombre = '$nombre'
						   WHERE id_seccion = '$id_seccion'";

			$resultado = mysqli_query($obj_conexion, $var_update);

			if ($resultado) {
				echo '<script>
						alert("Sección Editada Exitosamente.");
						location.href="../html/reportesSecciones.php";
					</script>';
			} else {
				echo '<script>
						alert("[ERROR]: Al editar seccion, verifique sus datos.");
						location.href="../html/reportesSecciones.php";
					</script>';
			}
			
		}else{
			echo '<script>
						alert("[ERROR]: No debes dejar campos vacíos.");
						location.href="../html/reportesSecciones.php";
					</script>';
		}
	}
?>