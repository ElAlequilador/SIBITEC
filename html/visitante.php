<?php 
  session_start();
  require("../php/conexion.php");
  require("../php/funcionesLimpieza.php");

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

      $_SESSION['correo'] = $correo;
      $_SESSION['dominio'] = $dominio;

      $var = "SELECT * FROM registro WHERE 
      correo LIKE '%$correo%' AND dominio LIKE '%$dominio%' AND password LIKE '%$contraseña%' " ;

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
                alert("[ERROR]: ");
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
<!DOCTYPE html>
<html lang="es">
<head>
  <title>Inicio de Sesión</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="shortcut icon" href="../img/logo_sibitec.png" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="../css/registro.css">
  <link rel="stylesheet" href="../css/estilos.css">
  <link rel="stylesheet" href="../css/styles.css">
  <script src="https://kit.fontawesome.com/9f0a8b2bb7.js" crossorigin="anonymous"></script>
  <script type="text/javascript">
    function registrarme(){
      location = "registro.php";
    }
  </script>
</head>
<body>
<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div>
      <img  style="max-width:100%;height:auto;display: block;margin: auto;width: 550px;height: auto;border-radius: 25px;" src="../img/header.jpg">
    </div>
  </div>
</nav>
<div class="container-fluid text-center">    
  <div class="row content">
    <div class="col-sm-2 sidenav">
      <p><a href="http://sii.itvictoria.edu.mx/sistema/">Sistema de Información Integral</a></p> <br>
      <p><a href="http://www.itvictoria.edu.mx/">Página Oficial</a></p> <br>
      <p><a href="https://www.facebook.com/TECNM.ITVICTORIA">Facebook</a></p> <br>
    </div>
    <div class="col-sm-8 text-center"> 
      <div id="container">
          <h1>&bull; SIBITEC &bull;</h1>
          <h1><i class="fas fa-user-graduate"></i> BIENVENIDO</h1>
          <p>Para acceder al Centro de Información y que SIBITEC <i class="far fa-registered"></i> registre tu entrada, ingresa CORREO INSTITUCIONAL, CONTRSEÑA y MOTIVO DE VISITA.</p>
          <p>No tienes una cuenta?  <a href="registro.php" name="buscar"> Crear cuenta</a>.</p>
          <div class="underline">
          </div>
          <form  method="POST" id="contact_form" name="login" onsubmit="return validarFormulario()">
            <div class="name">
              <label for="email"></label>
              <input type="text" placeholder="Correo Institucional" name="correo" id="correo">
            </div>
            <div class="email">
              <label for="subject"></label>
              <select placeholder="Dominio" name="dominio" id="dominio">
                <option disabled hidden selected>Selecciona Dominio</option>
                <?php
                  include "../php/conexion.php";
                  $dominio = "SELECT nombre FROM dominios ORDER BY nombre";
                  $resultado = mysqli_query($obj_conexion, $dominio);
                  while($row  = mysqli_fetch_assoc($resultado)){
                  ?>
                  <option><?php echo $row["nombre"]; ?></option>
                  <?php } 
                ?>
              </select>
            </div>
            <div class="telephone">
              <label for="name"></label>
              <input type="password" placeholder="Contraseña" name="password" id="password">
            </div>
            <div class="subject">
              <label for="subject"></label>
              <select placeholder="Motivo" name="motivo" id="motivo">
                <option disabled hidden selected>Selecciona Motivo de Visita</option>
                <?php
                  include "../php/conexion.php";
                  $motivo = "SELECT nombre FROM motivos_entrada ORDER BY nombre";
                  $resultado = mysqli_query($obj_conexion, $motivo);
                  while($row  = mysqli_fetch_assoc($resultado)){
                  ?>
                  <option><?php echo $row["nombre"]; ?></option>
                  <?php } 
                ?>
              </select>
            </div>
            <div class="submit">
              <input type="submit" name="ingresar" onclick="validarVisita()" value="Ingresar" id="form_login">
              <a id="form_login" href="../index.php" name="buscar">Regresar</a>
            </div>
          </form>
      </div>
    </div>
    <div class="col-sm-2 sidenav">
      <div class="well">
        <div class="wrap">
          <div class="widget">
            <div class="fecha">
              <p id="diaSemana" class="diaSemana"></p>
              <p id="dia" class="dia"></p>
              <p>de </p>
              <p id="mes" class="mes"></p>
              <p>del </p>
              <p id="year" class="year"></p>
            </div>
          </div>
        </div>
      </div>
      <div class="well">
        <div class="warp">
          <div class="widget">
             <div class="reloj">
              <p id="horas" class="horas"></p>
              <p>:</p>
              <p id="minutos" class="minutos"></p>
              <p>:</p>
              <p id="segundos" class="segundos"></p>
              <div class="caja-segundos">
                <p id="ampm" class="ampm"></p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<script src="../js/jquery-3.5.1.min.js"></script>    
<script src="../js/hora.js"></script>
<script src="../js/vVisitante.js"></script>
<footer class="container-fluid text-center">
  <p> <?php include ("../config/footer.php"); ?> </p>
</footer>
</body>
</html>