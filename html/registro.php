<!DOCTYPE html>
<html lang="es">
<head>
  <title>Crear Cuenta de Visitante</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="shortcut icon" href="../img/logo_sibitec.png" /> 
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <link rel="stylesheet" href="../css/registro.css">
  <link rel="stylesheet" href="../css/estilos.css">
  <link rel="stylesheet" href="../css/styles.css">
  <script src="https://kit.fontawesome.com/9f0a8b2bb7.js" crossorigin="anonymous"></script>
    <script type="text/javascript">
    function confirmInsert(){

      var respuesta= confirm("Todos los datos están correctos?");

      if (respuesta == true) {
        return true;
      }else{
        return false;
      }
    }
  </script>
</head>
<body>
<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div>
      <img style="max-width:100%;height:auto;display: block;margin: auto;width: 550px;height: auto;border-radius: 25px;" src="../img/header.jpg">
    </div>
  </div>
</nav>
<div class="container-fluid text-center">    
  <div class="row content">
    <div class="col-sm-2 sidenav">
      <p><a href="http://sii.itvictoria.edu.mx/sistema/">Sistema de Informacion Integral</a></p> <br>
      <p><a href="http://www.itvictoria.edu.mx/">Pagina Oficial</a></p> <br>
      <p><a href="https://www.facebook.com/TECNM.ITVICTORIA">Facebook</a></p> <br>
    </div>
    <div class="col-sm-8 text-center"> 
      <div id="container">
          <h1>&bull; SIBITEC &bull;</h1>
          <h1><i class="fas fa-user-check"></i> REGISTRO DE VISITANTE</h1>
          <p>Bienvenido, para crear una cuenta de visitante deberás llenar todos los campos.</p>
          <p>Este registro es necesario para que SIBITEC <i class="far fa-registered"></i> te reconozca en tu próxima consulta.</p>
          <p><i class="fas fa-user-shield"></i> Guarda bien tu contraseña.</p>
          <p>Ya tienes una cuenta? <a href="visitante.php" name="buscar">Inicia sesión</a></p>
          <div class="underline">
          </div>
          <form action="../php/vNRegistro.php" method="POST" id="form_visitante" onsubmit="return validarFormulario()">
            <div class="telephone">
              <label for="email"></label>
              <input type="text" placeholder="Nombre Completo" name="nombre" id="nombre">
            </div>
            <div class="name">
              <label for="name"></label>
              <input type="text" placeholder="Correo Institucional" name="correo" id="correo">
            </div>
            <div class="email">
              <label for="subject"></label>
              <select placeholder="Dominio" name="dominio" id="dominio">
                <option disabled hidden selected>Selecciona Dominio</option>
                <?php
                  include "../php/conexion.php";
                  $dominio = "SELECT nombre FROM dominios";
                  $resultado = mysqli_query($obj_conexion, $dominio);
                  while($row  = mysqli_fetch_assoc($resultado)){
                  ?>
                  <option><?php echo $row["nombre"]; ?></option>
                  <?php } 
                ?>
              </select>
            </div>
            <div class="name">
              <label for="name"></label>
              <input type="text" placeholder="Edad" name="edad" id="edad">
            </div>
            <div class="email">
              <label for="name"></label>
              <input type="text" placeholder="N° Control / N° Tarjeta" name="control" id="control">
            </div>
            <div class="telephone">
              <label for="name"></label>
              <input type="text" placeholder="Telefono" name="telefono" id="telefono">
            </div>
            <div class="telephone">
              <label for="name"></label>
              <input type="password" placeholder="Contraseña" name="password" id="contraseña">
            </div>
            <div class="telephone">
              <label for="name"></label>
              <input type="password" placeholder="Repite la Contraseña" name="rpassword" id="rcontraseña">
            </div>
            <div class="subject">
              <label for="subject"></label>
              <select placeholder="Carrea" name="carrera" id="carrera">
                <option disabled hidden selected>Selecciona Carrera</option>
                <?php
                  include "../php/conexion.php";
                  $motivo = "SELECT nombre FROM carreras";
                  $resultado = mysqli_query($obj_conexion, $motivo);
                  while($row  = mysqli_fetch_assoc($resultado)){
                  ?>
                  <option><?php echo $row["nombre"]; ?></option>
                  <?php } 
                ?>
              </select>
            </div>
            <div class="subject">
              <label for="subject"></label>
              <select placeholder="Sexo" name="sexo" id="sexo">
                <option disabled hidden selected>Selecciona Sexo</option>
                <option>Masculino</option>
                <option>Femenino</option>
              </select>
            </div>
            <div class="submit">
              <input type="submit" name="enviar" onclick="return confirmInsert()" value="Registrar" id="form_enviar" />
              <input type="button" name="limpiar" value="Limpiar" onclick="limpiarFormulario()" id="form_limpiar" />
              
            </div>
            <br>
            <div class="submit">
              <p><i class="fas fa-exclamation"></i> Recuerda no dar tu correo y contraseña a nadie. <i class="fas fa-exclamation"></i></p>
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
<script src="../js/vRegistro.js"></script>
<footer class="container-fluid text-center">
  <p> <?php include ("../config/footer.php"); ?> </p>
</footer>
</body>
</html>