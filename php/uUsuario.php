<?php
	require("conexion.php");
	require("funcionesLimpieza.php");

	//date_default_timezone_set('America/Mexico_City');

 	//$fecha = date("Y-m-d H:i:s");

	if (isset($_POST['guardar'])) {
		if (strlen($_POST['id_usuario']) >= 1 && 
			strlen($_POST['nombre']) >= 1 &&
			strlen($_POST['control']) >= 1 &&
			strlen($_POST['edad']) >= 1 &&
			strlen($_POST['telefono']) >= 1 &&
			strlen($_POST['correo']) >= 1 &&
			strlen($_POST['usuario']) >= 1 &&
			strlen($_POST['sexo']) >= 1 &&
			strlen($_POST['rol']) >= 1 &&
			strlen($_POST['dominio']) >= 1 &&
			strlen($_POST['contraseña']) >= 1){

			$id_usuario = valida_input($_POST['id_usuario']);
			$nombre = valida_input($_POST['nombre']);
			$control = valida_input($_POST['control']);
			$edad = valida_input($_POST['edad']);
			$telefono = valida_input($_POST['telefono']);
			$correo = valida_input($_POST['correo']);
			$usuario = valida_input($_POST['usuario']);
			$rol = valida_input($_POST['rol']);
			$dominio = valida_input($_POST['dominio']);
			$sexo = valida_input($_POST['sexo']);
			$contraseña = valida_input($_POST['contraseña']);

			$var_insert = "UPDATE usuarios SET  nombre = '$nombre', 
												control = '$control', 
												edad = '$edad',
												sexo = '$sexo',  
												telefono = '$telefono', 
												correo = '$correo',
												dominio = '$dominio',
												usuario = '$usuario', 
												password = '$contraseña',
												rol = '$rol'
			WHERE id_usuario = '$id_usuario'";

			$resultado = mysqli_query($obj_conexion, $var_insert);

			if ($resultado) {
				echo '<script>
						alert("Usuario editado exitosamente.");
						location.href="../html/adminpersonal.php";
					</script>';
			} else {
				echo '<script>
						alert("[ERROR]: Al editar, verifique sus datos.");
						location.href="../html/adminpersonal.php";
					</script>';
			}
			
		}else{
			echo '<script>
						alert("[ERROR]: No debes dejar campos vacíos.");
						location.href="../html/adminpersonal.php";
					</script>';
		}
	}
?>