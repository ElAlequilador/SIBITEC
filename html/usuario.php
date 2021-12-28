<?php
   /* VERIFICAMOS SI YA SE HA INICIADO SESIÓN, DE LO CONTRARIO NO PODRÁ TENER ACCESO A LA 
     PÁGINA */
  //ERROR_REPORTING(0) = NO MOSTRARÁ ERRORES DE PHP
  error_reporting(0);
  session_start();
  $var_correo = $_SESSION['correo'];
  $var_dominio = $_SESSION['dominio'];

  if ($var_correo == null || $var_correo == '' && $var_dominio == null || $var_dominio == '') {
    echo "No tienes acceso para ver esta página";
    die();
  }
  require("../php/conexion.php");

  $var_alumno = "SELECT nombre FROM registro WHERE correo = '$var_correo' AND dominio = '$var_dominio'";
  $res_alumno = mysqli_query($obj_conexion, $var_alumno);
  $nr_alumno = mysqli_fetch_assoc($res_alumno);
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <title>Visitante</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="shortcut icon" href="../img/logo_sibitec.png" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="../css/estilos.css">
  <link rel="stylesheet" href="../css/buscar.css">
  <link rel="stylesheet" href="../css/styles.css">
  <link rel="stylesheet" href="../css/registro.css">
  <link rel="stylesheet" href="../css/tabla_busquedas.css">
  <script src="https://kit.fontawesome.com/9f0a8b2bb7.js" crossorigin="anonymous"></script>
</head>
<body>
<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand">SIBITEC <i class="far fa-registered"></i></a>
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
    <ul class="nav navbar-nav">
      <li class="active"><a href="usuario.php"><i class="fas fa-home"></i> Inicio</a></li>
      <li class="dropdown">
      </li>
    </ul>
    <ul class="nav navbar-nav navbar-right">
      <li><a href="#"><i class="fas fa-user-graduate"></i> <?php echo $var_correo.$var_dominio ?></a></li>
      <li><a href="../php/salir_visitante.php">Salir <i class="fas fa-sign-out-alt"></i></a></li>
    </ul>
  </div>
  </div>
</nav>
<div class="container-fluid text-center">    
  <div class="row content">
    <div class="col-sm-2 sidenav">
      <p><a href="http://sii.itvictoria.edu.mx/sistema/">Sistema de Información Integral</a></p> <br>
      <p><a href="http://www.itvictoria.edu.mx/">Página Oficial</a></p> <br>
      <p><a href="https://www.facebook.com/TECNM.ITVICTORIA">Facebook</a></p> <br>
      <p><a href="https://itvictoria.bibliotecasdigitales.com/home">Biblioteca Digital</a></p><br>
    </div>
    <div class="col-sm-8 text-left"> 
      <div>
        <h1>&bull; SIBITEC &bull;</h1>
          <h1><i class="far fa-eye"></i>CONSULTA VIRTUAL</h1>
          <p><?php echo '¡Hola de Nuevo! ' . $nr_alumno['nombre'] ?>, aquí podrás buscar libros dentro del centro de información de la siguiente manera.</p>
          <p>Ingresa algún título, autor(es) o editorial(es) para que SIBITEC <i class="far fa-registered"></i> lo busque por ti, una vez que lo haya o los haya encontrado los mostrará en la siguiente tabla.</p>
          <p>En la tabla se muestran los libros disponibles relacionados a tu busqueda.</p>
          <p>Sino encuntras lo que buscabas, puedes hacer uso de nuestra Biblioteca Digital, tienes la liga directa en la parte izquierda.</p>
        <div class="underline">
        </div>
        <form  method="POST" class="example" onsubmit="return validarBAlumno()" style="margin:auto;max-width:450px">
          <h3>Datos del libro</h3>
          <input type="text" placeholder="¿Qué estás buscando?..." name="palabras" id="controlE">
          <button type="submit" name="buscar"><i class="fa fa-search"></i></button>
        </form>

        <div 
         style="overflow-y: scroll; height: 300px" class="container-table_b">
            <div class="table_title_b"><p>Resultado de la busqueda de SIBITEC 
              <i class="far fa-registered"></i></p>
            </div>
            <div class="table_header_b"><p>Título</p></div>
            <div class="table_header_b"><p>Autor(es)</p></div>
            <div class="table_header_b"><p>Editorial</p></div>
            <div class="table_header_b"><p>Categoría</p></div>
            <div class="table_header_b"><p>Sección</p></div>

            <?php
            if (isset($_POST['buscar'])) {
              if (strlen($_POST['palabras']) >= 1) { 
                $alert = "";
                require("../php/conexion.php");
                require("../php/funcionesLimpieza.php");

                $palabras = valida_input($_POST['palabras']);
                $var_select1 = "SELECT num_ejemplares, titulo, autores, editorial, categoria, seccion FROM libros 
                               WHERE (num_ejemplares >= 1) AND
                               (titulo LIKE '%$palabras%' OR
                               autores LIKE '%$palabras%' OR
                               editorial LIKE '%$palabras%' OR
                               categoria LIKE '%$palabras%' OR
                               seccion LIKE '%$palabras%')";
                $resultado1 = mysqli_query($obj_conexion, $var_select1);
                $var_select = "SELECT num_ejemplares, titulo, autores, editorial, categoria, seccion FROM libros 
                               WHERE (num_ejemplares >= 1) AND
                               (titulo LIKE '%$palabras%' OR
                               autores LIKE '%$palabras%' OR
                               editorial LIKE '%$palabras%' OR
                               categoria LIKE '%$palabras%' OR
                               seccion LIKE '%$palabras%')";
                $resultado = mysqli_query($obj_conexion, $var_select);

                $nr = mysqli_fetch_array($resultado1);
                $search = $nr[0];
                if($search >= 1){
                  while($row  = mysqli_fetch_assoc($resultado)){
            ?>
            <div class="table_item_b"><?php echo $row["titulo"]; ?></div>
            <div class="table_item_b"><?php echo $row["autores"]; ?></div>
            <div class="table_item_b"><?php echo $row["editorial"]; ?></div>
            <div class="table_item_b"><?php echo $row["categoria"]; ?></div>
            <div class="table_item_b"><?php echo $row["seccion"]; ?></div>

          <?php 
                  }
                }else{
                  $alert = 'Lo siento, no encontré nada relacionado a tu busqueda.';   
                  }
              }else{
                 $alert = 'Porfavor, ingresa algo para buscar';
              }

            } //Llave
            ?>
        </div>
        <div align="text-center">
              <p> <?php echo isset($alert) ? $alert : ''; ?></p>
        </div>
    </div>
  </div>
    <div class="col-sm-2 sidenav">
      <div class="well">
        <div class="wrap">
          <div class="widget">
            <div class="fecha">
              <p id="diaSemana" class="diaSemana"></p>
              <p id="dia" class="dia"></p>
              <p>de</p>
              <p id="mes" class="mes"></p>
              <p>del</p>
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
<script src="../js/jquery-3..5.min.js"></script>    
<script src="../js/hora.js"></script>
<script src="../js/vUsuario.js"></script>
<footer class="container-fluid text-center">
  <p> <?php include ("../config/footer.php"); ?> </p>
</footer>
</body>
</html>