<?php
	require("conexion.php");
	require("funcionesLimpieza.php");

	//date_default_timezone_set('America/Mexico_City');

 	//$fecha = date("Y-m-d H:i:s");

	if (isset($_POST['guardar'])) {
		if (strlen($_POST['nombre']) >= 1 &&
			strlen($_POST['id_categoria']) >= 1){

			$nombre = valida_input($_POST['nombre']);
			$id_categoria = valida_input($_POST['id_categoria']);
			//$fecha = $_POST['fecha'];

			$var_update = "UPDATE categorias SET nombre = '$nombre' 
						   WHERE id_categoria = '$id_categoria'";

			/*$var_insert = "UPDATE categoria SET codigo='12345678', nombre='A', fecha_registro='13/12/2020' 
			WHERE codigo='77777777'";*/

			$resultado = mysqli_query($obj_conexion, $var_update);

			if ($resultado) {
				echo '<script>
						alert("Categoria editada exitosamente.");
						location.href="../html/admincategorias.php";
					</script>';
			} else {
				echo '<script>
						alert("[ERROR]: Al editar categoria, verifique sus datos.");
						location.href="../html/admincategorias.php";
					</script>';
			}
			
		}else{
			echo '<script>
						alert("[ERROR]: No debes dejar campos vacíos.");
						location.href="../html/admincategorias.php";
					</script>';
		}
	}
?>