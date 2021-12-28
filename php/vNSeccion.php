<?php 
	require("conexion.php");
	require("funcionesLimpieza.php");

	date_default_timezone_set('America/Mexico_City');

 	$fecha = date("Y-m-d H:i:s");

	if (isset($_POST['guardar'])) {
		if (strlen($_POST['nombre']) >= 1 &&
			strlen($_POST['categoria']) >= 1) {

			$nombre = valida_input($_POST['nombre']);
			$categoria = valida_input($_POST['categoria']);

			$var_insert = "INSERT INTO secciones(nombre, categoria, fecha_registro) 
			VALUES ('$nombre','$categoria','$fecha')";

			$resultado = mysqli_query($obj_conexion, $var_insert);

			if ($resultado) {
				echo '<script>
						alert("Seccion Registrada Exitosamente!.");
						location.href="../html/reportesSecciones.php";
					</script>';
			} else {
				echo '<script>
						alert("[ERROR]: Al registrar, intente nuevamente.");
						location.href="../html/nuevaseccion.php";
					</script>';
			}
			
		}else{
      echo '<script>
                alert("[ERROR]: No debes dejar campos vacíos.");
                location.href="../html/nuevaseccion.php";
              </script>';
	}
}
?>