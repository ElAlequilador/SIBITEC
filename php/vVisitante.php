<?php
$alert ="";
 require("conexion.php");
 require("funcionesLimpieza.php");

 date_default_timezone_set('America/Mexico_City');

 $fecha = date("Y-m-d H:i:s");

  if (isset($_POST['ingresar'])) {

    if (strlen($_POST['correo']) >= 1 && 
        strlen($_POST['password']) >= 1 &&
        strlen($_POST['dominio']) >= 1 &&
        strlen($_POST['motivo']) >= 1) {

      $correo = valida_input($_POST['correo']);
      $dominio = valida_input($_POST['dominio']);
      $contraseña = valida_input($_POST['password']);
      $motivo = valida_input($_POST['motivo']);

      $var = "SELECT * FROM registro WHERE 
      correo LIKE '%$correo%' AND dominio LIKE '%$dominio%' AND password LIKE '%$contraseña%' " ;

    /*$var_select = " SELECT * FROM registro WHERE correo = '".$correo."' 
                                              AND dominio = '".$dominio."'
                                              AND password = '".$contraseña."'";*/

      //$var = "SELECT * FROM registro WHERE correo = '".$correo."' and password = '".$contraseña."'"

      $query = mysqli_query($obj_conexion, $var);

      $nr = mysqli_fetch_array($query);

      if($nr){

        $var_insert =
        "INSERT INTO visitantes(correo, dominio, motivo, fecha_entrada) 
        VALUES ('$correo', '$dominio', '$motivo', '$fecha')";

        $resultado = mysqli_query($obj_conexion, $var_insert);

        if ($resultado) { 
          echo '<script>
                alert("¡BIENVENIDO!");
                location.href="../html/usuario.php";
              </script>';
        }else{
          echo '<script>
                alert("[ERROR]: Al ingresar intente nuevamente.");
                location.href="../html/visitante.php";
              </script>';
        }

      }else{
        echo '<script>
                alert("[ERROR]: Al ingresar, verifique sus datos.");
                location.href="../html/visitante.php";
              </script>';
      }
    }else{
      echo '<script>
                alert("[ERROR]: No debes dejar campos vacíos.");
                location.href="../html/visitante.php";
              </script>';
    }
  }
?>
