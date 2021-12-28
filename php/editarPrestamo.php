<?php
	require("conexion.php");
	require("funcionesLimpieza.php");

  	//$fecha_reg = date("d/m/y");
  	//date_default_timezone_set('America/Mexico_City');

 	//$fecha_registro = date("Y-m-d H:i:s");

	if (isset($_POST['guardar'])) {
		
		if (strlen($_POST['id_libro']) >= 1 &&
			strlen($_POST['num_ejemplares']) >= 1 && 
			strlen($_POST['clasificacion']) >= 1 && 
			strlen($_POST['titulo']) >= 1 &&
			strlen($_POST['autores']) >= 1 &&
			strlen($_POST['editorial']) >= 1 &&
			strlen($_POST['fecha_publicacion']) >= 1 &&
			strlen($_POST['lugar_publicacion']) >= 1 &&
			strlen($_POST['isbn']) >= 1 &&
			strlen($_POST['tomo']) >= 1 &&
			strlen($_POST['edicion']) >= 1 &&
			strlen($_POST['folio']) >= 1){
			
			$id_libro = valida_input($_POST['id_libro']);
			$num_ejemplares = valida_input($_POST['num_ejemplares']);
			$clasificacion = valida_input($_POST['clasificacion']);
			$titulo = valida_input($_POST['titulo']);
			$autores = valida_input($_POST['autores']);
			$editorial = valida_input($_POST['editorial']);
			$fecha_publicacion = valida_input($_POST['fecha_publicacion']);
			$lugar_publicacion = valida_input($_POST['lugar_publicacion']);
			$isbn = valida_input($_POST['isbn']);
			$tomo = valida_input($_POST['tomo']);
			$edicion = valida_input($_POST['edicion']);
			$folio = valida_input($_POST['folio']);

			$var_update = "UPDATE libros SET num_ejemplares = '$num_ejemplares',
											 clasificacion = '$clasificacion',
											 titulo = '$titulo',
											 autores = '$autores',
											 editorial = '$editorial',
											 fecha_publicacion = '$fecha_publicacion',
											 lugar_publicacion = '$lugar_publicacion',
											 isbn = '$isbn',
											 edicion = '$edicion',
											 tomo = '$tomo',
											 folio = '$folio'
			WHERE id_libro = '$id_libro'";

			$resultado = mysqli_query($obj_conexion, $var_update);

			if ($resultado) {
				echo '<script>
						alert("Libro Editado Exitosamente.");
						location.href="../html/reportesLibros.php";
					</script>';
			} else {
				echo '<script>
						alert("[ERROR]: Al editar prestamo, verifique sus datos.");
						location.href="../html/reportesLibros.php";
					</script>';
			}
		}
	}
?>