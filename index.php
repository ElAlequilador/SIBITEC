<?php
    session_start();
    $alert = "";
    require("php/conexion.php");
    require("php/funcionesLimpieza.php");
      
    if (isset($_POST['usuario']) && isset($_POST['contraseña'])) {

        $usuario = valida_input($_POST['usuario']);
        $contraseña = valida_input($_POST['contraseña']);

        $_SESSION['usuario'] = $usuario;

        $pass_segura = mysqli_real_escape_string($obj_conexion, $contraseña);

        $var_select = "SELECT * FROM usuarios 
                       WHERE usuario = '".$usuario."' AND password = '".$pass_segura."'";

        $query = mysqli_query($obj_conexion,$var_select);

        $nr = mysqli_fetch_array($query);

        if ($nr) {
          $rol = $nr[10];
          $_SESSION['rol'] = $rol;

          switch ($_SESSION['rol']) {
            case 'Administrador':
             echo'<script>
                  alert("¡BIENVENIDO ADMINISTRADOR!.");
                  </script>';
              header("Location: html/administrador.php");
            break;
            case 'Personal Administrativo':
              echo'<script>
                  alert("¡BIENVENIDO PERSONAL ADMINISTRATIVO!.");
                  </script>';
              header("Location: html/padmin.php");
            break;
            default:
             header("Location: index.php");
            break;
        }
      }else{
        $alert = "El USUARIO y/o CONTRASEÑA incorrectos";
      }
    }

?>
<!DOCTYPE html>
<html lang="es">
<head>
  <title>Inicio de Sesión</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <link rel="shortcut icon" href="img/logo_sibitec.png" />
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="css/registro.css">
  <link rel="stylesheet" href="css/estilos.css">
  <link rel="stylesheet" href="css/styles.css">
  <script src="https://kit.fontawesome.com/9f0a8b2bb7.js" crossorigin="anonymous"></script>
</head>
<body>
<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div>
      <img style="max-width:100%;height:auto;display: block;margin: auto;width: 550px;height: auto;border-radius: 25px;" src="img/header.jpg">
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
          <h1><i class="fas fa-user-tie"></i> BIENVENIDO</h1>
          <p>Para acceder ingresa tu usuario y contraseña.</p>
          <p>Eres visitante? <a href="html/visitante.php" name="buscar">Ingresa aquí</a> </p>
          <div class="underline">
          </div>
          <form method="POST" id="contact_form" onsubmit="return validarLogin()">
            <div class="telephone">
              <label for="name"></label>
              <input type="text" placeholder="Usuario" name="usuario" id="usuario">
            </div>
            
            <div class="telephone">
              <label for="name"></label>
              <input type="password" placeholder="Contraseña" name="contraseña" id="contraseña">
            </div>

            <div class="submit">
              <input type="submit"  name="ingresar" value="Ingresar" id="form_login">
              
            </div>
            
            <br>
            <div class="submit">
              <p><i class="fas fa-user-shield"></i> Recuerda no dar tu usuario y contraseña a nadie.</p>
            </div>
            <div class="submit">
              <p> <?php echo isset($alert) ? $alert : ''; ?></p>
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
<script src="js/jquery-3.5.1.min.js"></script>    
<script src="js/hora.js"></script>
<script src="js/vLogin.js"></script>
<footer class="container-fluid text-center">
  <p> <?php include ("config/footer.php"); ?> </p>
</footer>
</body>
</html>