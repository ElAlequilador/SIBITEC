<?php
	require("conexion.php");
	require("funcionesLimpieza.php");

	//date_default_timezone_set('America/Mexico_City');

 	//$fecha = date("Y-m-d H:i:s");

	if (isset($_POST['guardar'])) {
		if (strlen($_POST['id_dominio']) >= 1 && 
			strlen($_POST['nombre']) >= 1){

			$id_dominio = valida_input($_POST['id_dominio']);
			$nombre = valida_input($_POST['nombre']);

			$var_insert = "UPDATE dominios SET  id_dominio = '$id_dominio', 
												nombre = '$nombre'
			WHERE id_dominio = '$id_dominio'";

			$resultado = mysqli_query($obj_conexion, $var_insert);

			if ($resultado) {
				echo '<script>
						alert("Dominio Editado Exitosamente.");
						location.href="../html/admindominios.php";
					</script>';
			} else {
				echo '<script>
						alert("[ERROR]: Al editar dominio, verifique sus datos.");
						location.href="../html/admindominios.php";
					</script>';
			}
			
		}else{
			echo '<script>
						alert("[ERROR]: No debes dejar campos vacíos.");
						location.href="../html/admindominios.php";
					</script>';
		}
	}
?>