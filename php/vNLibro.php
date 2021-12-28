<?php

	require("conexion.php");
	require("funcionesLimpieza.php");

  	date_default_timezone_set('America/Mexico_City');

 	$fecha = date("Y-m-d H:i:s");

	if (isset($_POST['enviar'])) {
		
		if (strlen($_POST['num_ejemplares']) >= 1 &&  
			strlen($_POST['titulo']) >= 1 &&
			strlen($_POST['autores']) >= 1 &&
			strlen($_POST['editorial']) >= 1 && 
			strlen($_POST['f_publicacion']) >= 1 && 
			strlen($_POST['l_publicacion']) >= 1 &&
			strlen($_POST['edicion']) >= 1 &&
			strlen($_POST['tomo']) >= 1 && 
			strlen($_POST['folio']) >= 1 &&
			strlen($_POST['categoria']) >= 1 &&
			strlen($_POST['seccion']) >= 1) {
			

			$num_ejemplares = valida_input($_POST['num_ejemplares']);
			$clasificacion = valida_input($_POST['clasificacion']);
			$titulo = valida_input($_POST['titulo']);
			$autores = valida_input($_POST['autores']);
			$editorial = valida_input($_POST['editorial']);
			$f_publicacion = valida_input($_POST['f_publicacion']);
			$l_publicacion = valida_input($_POST['l_publicacion']);
			$isbn = valida_input($_POST['isbn']);
			$edicion = valida_input($_POST['edicion']);
			$tomo = valida_input($_POST['tomo']);
			$folio = valida_input($_POST['folio']);
			$categoria = valida_input($_POST['categoria']);
			$seccion = valida_input($_POST['seccion']);

			$query = "SELECT * FROM libros WHERE folio = '$folio'";
			$res = mysqli_query($obj_conexion, $query);
			$nr = mysqli_fetch_array($res);

			if ($nr) {
				die('Ya existe un libro registrado con ese folio, verifique.<br/> <a href="../html/nuevolibro.php">Volver</a>');
			}else{
				$var_insert = "INSERT INTO libros(num_ejemplares, clasificacion, titulo, autores, editorial,		fecha_publicacion, lugar_publicacion, isbn, edicion, tomo, folio, categoria, seccion, fecha_registro) 
					VALUES ('$num_ejemplares', '$clasificacion', '$titulo', '$autores', '$editorial', '$f_publicacion', '$l_publicacion', '$isbn',  '$edicion',  '$tomo',  '$folio',  '$categoria', '$seccion', '$fecha')";

				$resultado = mysqli_query($obj_conexion, $var_insert);

				if ($resultado) {
					echo '<script>
							alert("Libro registrado exitosamente.");
							location.href="../html/padmin.php";
						</script>';
				} else {
					echo '<script>
							alert("[ERROR]: Al Registrar, intente nuevamente.");
							location.href="../html/nuevolibro.php";
						</script>';
				}
			}
			
		}else{
			echo '<script>
						alert("[ERROR]: No debes dejar campos vacios.");
						location.href="../html/nuevolibro.php";
					</script>';
		}
	}
?>