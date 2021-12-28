<?php
	require("conexion.php");
	require("funcionesLimpieza.php");

  	//date_default_timezone_set('America/Mexico_City');

 	//$fecha = date("Y-m-d H:i:s");

	if (isset($_POST['guardar'])) {
		
		if (strlen($_POST['id_docente']) >= 1 &&
			strlen($_POST['nombre']) >= 1 && 
			strlen($_POST['sexo']) >= 1 &&
			strlen($_POST['dominio']) >= 1 &&
			strlen($_POST['correo']) >= 1 && 
			strlen($_POST['edad']) >= 1 &&
			strlen($_POST['telefono']) >= 1){
			
			$id_docente = valida_input($_POST['id_docente']);
			$nombre = valida_input($_POST['nombre']);
			$correo = valida_input($_POST['correo']);
			$edad = valida_input($_POST['edad']);
			$telefono = valida_input($_POST['telefono']);
			$sexo = valida_input($_POST['sexo']);
			$dominio = valida_input($_POST['dominio']);
			

			$var_update = "UPDATE docentes SET nombre = '$nombre',
											 correo = '$correo',
											 dominio = '$dominio',
											 edad = '$edad',
											 sexo = '$sexo',
											 telefono = '$telefono'
							WHERE id_docente = '$id_docente'";

			$resultado = mysqli_query($obj_conexion, $var_update);

			if ($resultado) {
				echo '<script>
						alert("Docente Editado Exitosamente.");
						location.href="../html/admindocentes.php";
					</script>';
			} else {
				echo '<script>
						alert("[ERROR]: Al editar docente, verifique sus datos.");
						location.href="../html/admindocentes.php";
					</script>';
			}
		}else{
			echo '<script>
						alert("[ERROR]: No debes dejar campos vacíos.");
						location.href="../html/admindocentes.php";
					</script>';
		}
	}
?>