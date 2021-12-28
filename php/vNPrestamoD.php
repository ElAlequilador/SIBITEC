<?php
  require("conexion.php");
  require("funcionesLimpieza.php");

  //date_default_timezone_set('America/Mexico_City');

  //$fecha = date("Y-m-d H:i:s");

  if (isset($_POST['enviar'])) {
    
    if (strlen($_POST['fechaS']) >= 1 &&
      strlen($_POST['fechaE']) >= 1 &&
      strlen($_POST['folio']) >= 1 && 
      strlen($_POST['titulo']) >= 1 &&
      strlen($_POST['autores']) >= 1 &&
      strlen($_POST['editorial']) >= 1 && 
      strlen($_POST['categoria']) >= 1 && 
      strlen($_POST['seccion']) >= 1 &&
      strlen($_POST['nombre']) >= 1) {
      
      $fechaS = $_POST['fechaS'];
      $fechaE = $_POST['fechaE'];
      $folio = valida_input($_POST['folio']);
      $titulo = valida_input($_POST['titulo']);
      $autor = valida_input($_POST['autores']);
      $editorial = valida_input($_POST['editorial']);
      $categoria = valida_input($_POST['categoria']);
      $seccion = valida_input($_POST['seccion']);
      $nombre = valida_input($_POST['nombre']);
      
      $var_select = "SELECT * FROM libros WHERE folio = '$folio' ";

      $resultado_select = mysqli_query($obj_conexion, $var_select);

      $row = mysqli_fetch_array($resultado_select);

      $ne = $row[1];

      if ($ne > 0) {

        $var_insert = "INSERT INTO 
        prestamos_docentes(folio, titulo, autor, editorial, categoria, seccion, nombre, fecha_salida, fecha_entrega) 
        VALUES 
        ('$folio', '$titulo', '$autor', '$editorial', '$categoria', '$seccion', '$nombre', '$fechaS', 
        '$fechaE')";

        $resultado_insert = mysqli_query($obj_conexion, $var_insert);

        $var = "INSERT INTO tprestamos(folio, titulo, autor, solicitante, fecha_registro)
        VALUES ('$folio','$titulo','$autor','$nombre','$fechaS')";
        $res = mysqli_query($obj_conexion, $var);

        $var_update = "UPDATE libros SET num_ejemplares = (num_ejemplares - 1)
        WHERE folio = '$folio'";

        $resultado_update = mysqli_query($obj_conexion, $var_update);

        if ($resultado_update) {
        	echo '<script>
              		alert("Prestamo registrado exitosamente.");
              		location.href="../html/padmin.php";
            </script>';
        }else{
        	echo '<script>
            		alert("[ERROR]: Al realizar el préstamo, intente nuevamente.");
            		location.href="../html/prestamodocente.php";
          		</script>';
        }
      } else {
        echo '<script>
            	alert("No hay libro disponible para prestar.");
            	location.href="../html/prestamodocente.php";
          	</script>';
      }
    }else{
      echo '<script>
                alert("[ERROR]: No debes dejar campos vacíos.");
                location.href="../html/prestamodocente.php";
              </script>';
  }
}
?>