<?php
	require("conexion.php");
	require("funcionesLimpieza.php");

	date_default_timezone_set('America/Mexico_City');

 	$fecha = date("Y-m-d H:i:s");
 

	if (isset($_POST['guardar'])) {
		if (strlen($_POST['nombre']) >= 1) {

			$nombre = valida_input($_POST['nombre']);

			$var_insert = "INSERT INTO carreras(nombre, fecha_registro) 
			VALUES ('$nombre','$fecha')";

			$resultado = mysqli_query($obj_conexion, $var_insert);

			if ($resultado) {
				echo '<script>
						alert("Carrera registrada exitosamente.");
						location.href="../html/admincarreras.php";
					</script>';
			} else {
				echo '<script>
						alert("[ERROR]: Al Registrar, intenta nuevamente.");
						location.href="../html/añadircarrera.php";
					</script>';
			}
			
		}else{
			echo '<script>
						alert("[ERROR]: No debes dejar campos vacíos.");
						location.href="../html/añadircarrera.php";
					</script>';
		}
	}
?>