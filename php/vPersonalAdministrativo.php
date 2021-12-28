<?php
	require("conexion.php");
	require("funcionesLimpieza.php");

  	date_default_timezone_set('America/Mexico_City');

 	$fecha = date("Y-m-d H:i:s");

	if (isset($_POST['enviar'])) {
		
		if (strlen($_POST['nombre']) >= 1 && 
			strlen($_POST['usuario']) >= 1 &&
			strlen($_POST['edad']) >= 1 &&
			strlen($_POST['sexo']) >= 1 && 
			strlen($_POST['telefono']) >= 1 && 
			strlen($_POST['correo']) >= 1 &&
			strlen($_POST['dominio']) >= 1 && 
			strlen($_POST['password']) >= 1 &&
			strlen($_POST['rpassword']) >= 1 &&
			strlen($_POST['rol']) >= 1) {
			
			$nombre = valida_input($_POST['nombre']);
			$control = valida_input($_POST['control']);
			$usuario = valida_input($_POST['usuario']);
			$edad = valida_input($_POST['edad']);
			$sexo = valida_input($_POST['sexo']);
			$telefono = valida_input($_POST['telefono']);
			$correo = valida_input($_POST['correo']);
			$dominio = valida_input($_POST['dominio']);
			$pass = valida_input($_POST['password']);
			$rpass = valida_input($_POST['rpassword']);
			$rol = valida_input($_POST['rol']);

			if ($pass != $rpass) {
				die('Las contraseñas no coinciden, Verifique <br/> <a href="../html/nuevopersonal.php"> Volver</a>');
			}else{
				$contraseñaUser = $pass;
			}
			

			$var_insert = "INSERT INTO usuarios(nombre, control, edad, sexo, telefono, correo, dominio, usuario, password, rol, fecha_registro) 
			VALUES ('$nombre', '$control', '$edad', '$sexo', '$telefono', '$correo', '$dominio', '$usuario', '$rpass', '$rol', '$fecha')";

			$resultado = mysqli_query($obj_conexion, $var_insert);

			if ($resultado) {
				echo '<script>
						alert("Registro de Usuario Exitoso.");
						location.href="../html/adminpersonal.php";
					</script>';
			} else {
				echo '<script>
						alert("[ERROR]: Al registrar, intente de nuevo.");
						location.href="../html/nuevopersonal.php";
					</script>';
			}
		}else{
			echo '<script>
						alert("[ERROR]: No debes dejar campos vacíos.");
						location.href="../html/nuevopersonal.php";
					</script>';
		}
	}
?>