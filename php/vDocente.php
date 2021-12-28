<?php
	require("conexion.php");
	require("funcionesLimpieza.php");

	date_default_timezone_set('America/Mexico_City');

 	$fecha = date("Y-m-d H:i:s");

	if (isset($_POST['registrar'])) {
		
		if (strlen($_POST['nombre']) >= 1 && 
			strlen($_POST['correo']) >= 1 && 
			strlen($_POST['dominio']) >= 1 &&
			strlen($_POST['edad']) >= 1 &&
			strlen($_POST['sexo']) >= 1 &&
			strlen($_POST['telefono']) >= 1){

			$nombre = valida_input($_POST['nombre']);
			$correo = valida_input($_POST['correo']);
			$dominio = valida_input($_POST['dominio']);
			$edad = valida_input($_POST['edad']);
			$sexo = valida_input($_POST['sexo']);
			$telefono = valida_input($_POST['telefono']);
			

			$var_insert = "INSERT INTO docentes(nombre, correo, dominio, edad, sexo, telefono, fecha_registro) 
			VALUES ('$nombre', '$correo', '$dominio', '$edad', '$sexo', '$telefono', '$fecha')";

			$resultado = mysqli_query($obj_conexion, $var_insert);

			if ($resultado) {
				echo '<script>
						alert("Docente Registrado Exitosamente.");
						location.href="../html/reportesDocentes.php";
					</script>';
			} else {
				echo '<script>
						alert("[ERROR]: Al Registrar, intente nuevamente.");
						location.href="../html/nuevodocente.php";
					</script>';
			}
		}else{
			echo '<script>
						alert("[ERROR]: No debes dejar campos vacios.");
						location.href="../html/nuevodocente.php";
					</script>';
		}
	}
?>