<?php
	require("conexion.php");
	require("funcionesLimpieza.php");

	date_default_timezone_set('America/Mexico_City');

 	$fecha = date("Y-m-d H:i:s");

	if (isset($_POST['guardar'])) {
		if (strlen($_POST['motivo']) >= 1) {

			$nombre = valida_input($_POST['motivo']);

			$var_insert = "INSERT INTO motivos_entrada(nombre, fecha_registro) 
			VALUES ('$nombre','$fecha')";

			$resultado = mysqli_query($obj_conexion, $var_insert);

			if ($resultado) {
				echo '<script>
						alert("Motivo registrado exitosamente.");
						location.href="../html/adminmotivos.php";
					</script>';
			} else {
				echo '<script>
						alert("[ERROR]: Al Registrar, intente nuevamente.");
						location.href="../html/añadirmotivo.php";
					</script>';
			}
			
		}else{
			echo '<script>
						alert("[ERROR]: No debes dejar campos vacios.");
						location.href="../html/añadirmotivo.php";
					</script>';
		}
	}
?>