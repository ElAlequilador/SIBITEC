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
			strlen($_POST['control']) >= 1 &&
			strlen($_POST['telefono']) >= 1 && 
			strlen($_POST['carrera']) >= 1 &&
			strlen($_POST['sexo']) >= 1){
			
			$nombre = valida_input($_POST['nombre']);
			$correo = valida_input($_POST['correo']);
			$dominio = valida_input($_POST['dominio']);
			$edad = valida_input($_POST['edad']);
			$control = valida_input($_POST['control']);
			$telefono = valida_input($_POST['telefono']);
			$carrera = valida_input($_POST['carrera']);
			$sexo = valida_input($_POST['sexo']);
			

			$var_insert = "INSERT INTO alumnos(nombre, control, carrera, edad, sexo, telefono, correo, dominio, fecha_registro) 
			VALUES ('$nombre','$control','$carrera','$edad','$sexo','$telefono','$correo','$dominio','$fecha')";

			$resultado = mysqli_query($obj_conexion, $var_insert);

			if ($resultado) {
				echo '<script>
						alert("Alumno Registrado Exitosamente.");
						location.href="../html/reportesAlumnos.php";
					</script>';
			} else {
				echo '<script>
						alert("[ERROR]: Al Registrar, intente nuevamente.");
						location.href="../html/nuevoalumno.php";
					</script>';
			}
		}else{
			echo '<script>
						alert("[ERROR]: No debes dejar campos vacios.");
						location.href="../html/nuevoalumno.php";
					</script>';
		}
	}
?>