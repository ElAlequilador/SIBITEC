<?php
	require("conexion.php");
	require("funcionesLimpieza.php");

	//date_default_timezone_set('America/Mexico_City');

 	//$fecha = date("Y-m-d H:i:s");

	if (isset($_POST['guardar'])) {
		if (strlen($_POST['id_motivo']) >= 1 && 
			strlen($_POST['nombre']) >= 1){

			$id_motivo = valida_input($_POST['id_motivo']);
			$nombre = valida_input($_POST['nombre']);

			$var_insert = "UPDATE motivos_entrada SET nombre = '$nombre'
						   WHERE id_motivo = '$id_motivo'";

			$resultado = mysqli_query($obj_conexion, $var_insert);

			if ($resultado) {
				echo '<script>
						alert("Motivo de Entrada Editado Exitosamente.");
						location.href="../html/adminmotivos.php";
					</script>';
			} else {
				echo '<script>
						alert("[ERROR]: Al editar motivo de netrada, verifique sus datos.");
						location.href="../html/adminmotivos.php";
					</script>';
			}
			
		}else{
			echo '<script>
						alert("[ERROR]: No debes dejar campos vacíos.");
						location.href="../html/adminmotivos.php";
					</script>';
		}
	}
?>