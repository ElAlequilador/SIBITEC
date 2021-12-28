<?php
	require("conexion.php");
	require("funcionesLimpieza.php");

	//date_default_timezone_set('America/Mexico_City');

 	//$fecha = date("Y-m-d H:i:s");

	if (isset($_POST['guardar'])) {

		if (strlen($_POST['id_categoria']) >= 1 && 
			strlen($_POST['nombre']) >= 1){

			$id_categoria = valida_input($_POST['id_categoria']);
			$nombre = valida_input($_POST['nombre']);


			$var_update = "UPDATE categorias SET nombre = '$nombre'
						   WHERE id_categoria = '$id_categoria'";

			$resultado = mysqli_query($obj_conexion, $var_update);

			if ($resultado) {
				echo '<script>
						alert("Categoria Editada Exitosamente.");
						location.href="../html/reportesCategorias.php";
					</script>';
			} else {
				echo '<script>
						alert("[ERROR]: Al editar categoría, verifique sus datos.");
						location.href="../html/reportesCategorias.php";
					</script>';
			}
			
		}else{
			echo '<script>
						alert("[ERROR]: No debes dejar campos vacíos.");
						location.href="../html/reportesCategorias.php";
					</script>';
		}
	}
?>