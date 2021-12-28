<?php
	require("conexion.php");
	require("funcionesLimpieza.php");

  	//$fecha_reg = date("d/m/y");
  	date_default_timezone_set('America/Mexico_City');

 	$fecha_reg = date("Y-m-d H:i:s");

	if (isset($_POST['enviar'])) {
		
		if (strlen($_POST['nombre']) >= 1 &&  
			strlen($_POST['carrera']) >= 1 &&
			strlen($_POST['edad']) >= 1 &&
			strlen($_POST['sexo']) >= 1 && 
			strlen($_POST['telefono']) >= 1 && 
			strlen($_POST['correo']) >= 1 && 
			strlen($_POST['dominio']) >= 1 &&
			strlen($_POST['password']) >= 1 &&
			strlen($_POST['rpassword']) >= 1) {
			
			$nombre = valida_input($_POST['nombre']);
			$control = valida_input($_POST['control']);
			$carrera = valida_input($_POST['carrera']);
			$edad = valida_input($_POST['edad']);
			$sexo = valida_input($_POST['sexo']);
			$telefono = valida_input($_POST['telefono']);
			$correo = valida_input($_POST['correo']);
			$dominio = valida_input($_POST['dominio']);
			$pass = valida_input($_POST['password']);
			$rpass = valida_input($_POST['rpassword']);

			if ($pass != $rpass) {
				die('Las contraseñas no coinciden, Verifique <br /> <a href="../html/registro.php">Volver</a>');
			}else{
				$contraseñaUser = $pass;
			}
			$pass_segura = mysqli_real_escape_string($obj_conexion, $contraseñaUser);

			$var = "SELECT * FROM registro WHERE correo LIKE '%$correo%' AND dominio LIKE '%$dominio%'" ;
			$query = mysqli_query($obj_conexion, $var);
      		$nr = mysqli_fetch_array($query);

			if ($nr) {
				die('Ya existe una cuenta con ese correo, Verifique <br /> <a href="../html/visitante.php">Volver</a>');
			}else{
				$var_insert = "INSERT INTO registro(nombre, control, carrera, edad, sexo, telefono, correo, dominio, password, fecha_registro) 	VALUES ('$nombre','$control','$carrera','$edad','$sexo','$telefono','$correo', '$dominio','$pass_segura','$fecha_reg')";
				$resultado = mysqli_query($obj_conexion, $var_insert);

				if ($resultado) {
					echo '<script>
							alert("Registro Exitoso.");
							location.href="../html/visitante.php";
						</script>';
				} else {
					echo '<script>
							alert("[ERROR]: Al Registrar, verifique sus datos.");
							location.href="../html/registro.php";
						</script>';
				}

			}
		}else{
      		echo '<script>
                alert("[ERROR]: No debes dejar campos vacíos.");
                location.href="../html/registro.php";
              </script>';
	}
}
?>