<?php
	require("conexion.php");
	require("funcionesLimpieza.php");

	if (isset($_POST['guardar'])) {
		
		if (strlen($_POST['id_alumno']) >= 1 &&
			strlen($_POST['nombre']) >= 1 && 
			strlen($_POST['control']) >= 1 && 
			strlen($_POST['edad']) >= 1 &&
			strlen($_POST['telefono']) >= 1 &&
			strlen($_POST['sexo']) >= 1 &&
			strlen($_POST['dominio']) >= 1 &&
			strlen($_POST['correo']) >= 1){
			
			$id_alumno = valida_input($_POST['id_alumno']);
			$nombre = valida_input($_POST['nombre']);
			$control = valida_input($_POST['control']);
			$edad = valida_input($_POST['edad']);
			$telefono = valida_input($_POST['telefono']);
			$correo = valida_input($_POST['correo']);
			$sexo = valida_input($_POST['sexo']);
			$dominio = valida_input($_POST['dominio']);

			$var_update = "UPDATE alumnos SET nombre = '$nombre',
											control = '$control',
											edad = '$edad',
											sexo = '$sexo',
											telefono = '$telefono',
											correo = '$correo',
											dominio = '$dominio'
							WHERE id_alumno = '$id_alumno'";

			$resultado = mysqli_query($obj_conexion, $var_update);

			if ($resultado) {
				echo '<script>
						alert("Alumno Editado Exitosamente.");
						location.href="../html/adminalumnos.php";
					</script>';
			} else {
				echo '<script>
						alert("[ERROR]: Al editar alumno, verifique sus datos.");
						location.href="../html/adminalumnos.php";
					</script>';
			}
		}else{
			echo '<script>
						alert("[ERROR]: No debes dejar campos vacíos.");
						location.href="../html/adminalumnos.php";
					</script>';
		}
	}
?>