<?php
	require("conexion.php");
	require("funcionesLimpieza.php");

	date_default_timezone_set('America/Mexico_City');

 	$fecha = date("Y-m-d H:i:s");

	if (isset($_POST['guardar'])) {
		if (strlen($_POST['dominio']) >= 1) {

			$nombre = valida_input($_POST['dominio']);

			$var_insert = "INSERT INTO dominios(nombre, fecha_registro) 
			VALUES ('$nombre','$fecha')";

			$resultado = mysqli_query($obj_conexion, $var_insert);

			if ($resultado) {
				echo '<script>
						alert("Dominio registrado exitosamente.");
						location.href="../html/admindominios.php";
					</script>';
			} else {
				echo '<script>
						alert("[ERROR]: Al Registrar, intente nuevamente.");
						location.href="../html/añadirdominio.php";
					</script>';
			}
			
		}else{
			echo '<script>
						alert("[ERROR]: No debes dejar campos vacios.");
						location.href="../html/añadirdominio.php";
					</script>';
		}
	}
?>