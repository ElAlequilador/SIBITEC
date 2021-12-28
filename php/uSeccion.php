<?php
	require("conexion.php");
	require("funcionesLimpieza.php");

	//date_default_timezone_set('America/Mexico_City');

 	//$fecha = date("Y-m-d H:i:s");

	if (isset($_POST['guardar'])) {
		if (strlen($_POST['nombre']) >= 1 &&
			strlen($_POST['categoria']) >= 1 &&
			strlen($_POST['id_seccion']) >= 1){

			$nombre = valida_input($_POST['nombre']);
			$id_seccion = valida_input($_POST['id_seccion']);
			$categoria = valida_input($_POST['categoria']);
			//$fecha = $_POST['fecha'];

			$var_insert = "UPDATE secciones SET nombre = '$nombre',
												categoria = $categoria 
						   WHERE id_seccion = '$id_seccion'";

			$resultado = mysqli_query($obj_conexion, $var_insert);

			if ($resultado) {
				echo '<script>
						alert("Sección editada exitosamente!.");
						location.href="../html/adminsecciones.php";
					</script>';
			} else {
				echo '<script>
						alert("[ERROR]: Al editar, verifique sus datos.");
						location.href="../html/adminsecciones.php";
					</script>';
			}
			
		}else{
			echo '<script>
						alert("[ERROR]: No debes dejar campos vacíos.");
						location.href="../html/adminsecciones.php";
					</script>';
		}
	}
?>