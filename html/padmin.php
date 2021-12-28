<?php
  /* VERIFICAMOS SI YA SE HA INICIADO SESIÓN, DE LO CONTRARIO NO PODRÁ TENER ACCESO A LA 
     PÁGINA */
  //ERROR_REPORTING(0) = NO MOSTRARÁ ERRORES DE PHP
  error_reporting(0);
  session_start();
  $varsesion = $_SESSION['usuario'];

  if ($varsesion == null || $varsesion == '') {
    echo "No tienes acceso para ver esta página";
    die();
  }
  include "../php/conexion.php";
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <!--TITULO, SCRIPTS -->
  <title>Inicio</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="shortcut icon" href="../img/logo_sibitec.png" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <link rel="stylesheet" type="text/css" href="../css/registro.css">
  <link rel="stylesheet" type="text/css" href="../css/estilos.css">
  <link rel="stylesheet" type="text/css" href="../css/styles.css">
  <script src="https://kit.fontawesome.com/9f0a8b2bb7.js" crossorigin="anonymous"></script>
</head>
<body>
<!-- INICIA BARRA DE NAVEGACIÓN -->  
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
      <li class="active"><a href="padmin.php"><i class="fas fa-home"></i> Inicio</a></li>
      <li class="dropdown">
        <a class="dropdown-toggle" data-toggle="dropdown" href="#"><i class="fas fa-cog"></i> Secciones y Categorias
        <span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li><a href="nuevacategoria.php">Nueva Categoría</a></li>
          <li><a href="nuevaseccion.php">Nueva Sección</a></li>
        </ul>
      </li>
      <li class="dropdown">
        <a class="dropdown-toggle" data-toggle="dropdown" href="#"><i class="far fa-address-card"></i> Registro de Usuarios
        <span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li><a href="nuevoalumno.php">Nuevo Alumno</a></li>
          <li><a href="buscarAlumno.php">Buscar Alumno</a></li>
          <li><a href="nuevodocente.php">Nuevo Docente</a></li>
          <li><a href="buscarDocente.php">Buscar Docente</a></li>
        </ul>
      </li>
      <li class="dropdown">
        <a class="dropdown-toggle" data-toggle="dropdown" href="#"><i class="fas fa-book"></i> Libros
        <span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li><a href="nuevolibro.php">Nuevo Libro</a></li>
          <li><a href="buscarLibro.php">Buscar Libro</a></li>
        </ul>
      </li>
      <li class="dropdown">
        <a class="dropdown-toggle" data-toggle="dropdown" href="#"><i class="far fa-calendar"></i> Préstamos
        <span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li><a href="nuevoprestamo.php">Nuevo Préstamo</a></li>
          <li><a href="editarprestamo.php">Editar Préstamo</a></li>
          <li><a href="tpendientes.php">Préstamos Pendientes</a></li>
          <li><a href="tprestamos.php">Todos los Préstamos</a></li>
        </ul>
      </li>
      <li class="dropdown">
        <a class="dropdown-toggle" data-toggle="dropdown" href="#"><i class="fas fa-chart-line"></i> Reportes
        <span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li><a href="reportesAlumnos.php">Reportes Alumnos</a></li>
          <li><a href="reportesDocentes.php">Reportes Docentes</a></li>
          <li><a href="reportesCategorias.php">Reportes Categorias</a></li>
          <li><a href="reportesSecciones.php">Reportes Secciones</a></li>
          <li><a href="reportesLibros.php">Reportes Libros</a></li>
          <li><a href="reportesVisitantes.php">Reportes Registros</a></li>
          <li><a href="reportesEntradas.php">Reportes Visitantes</a></li>
        </ul>
      </li>
      <li class="dropdown">
        <a class="dropdown-toggle" data-toggle="dropdown" href="#"><i class="fas fa-chart-pie"></i> Estadísticas
        <span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li><a href="estadisticasAlumnos.php">Estadísticas Alumnos</a></li>
          <li><a href="estadisticasDocentes.php">Estadísticas Docentes</a></li>
          <li><a href="estadisticasRegistros.php">Estadísticas Registros</a></li>
          <li><a href="estadisticasVisitantes.php">Estadísticas Visitantes</a></li>
        </ul>
      </li>
    </ul>
    <ul class="nav navbar-nav navbar-right">
      <li><a href="#"><?php echo $_SESSION['usuario'] ?> <i class="fas fa-user-tie"></i></a></li>
      <li><a href="../php/salir.php">Salir <i class="fas fa-sign-out-alt"></i></a></li>
    </ul>
  </div>
  </div>
</nav>
<!-- TERMINA BARRA DE NAVEGACIÓN -->
<!-- INICIA LA INFORMACÓN DE LA PÁGINA -->    
<div class="container-fluid text-center">    
  <div class="row content">
    <div class="col-sm-2 sidenav">
      <!-- LINKS DEL LADO IZQUIERDO CON ACCESO A LOS SITIOS MENCIONADOS -->  
      <p><a href="http://sii.itvictoria.edu.mx/sistema/">Sistema de Información Integral</a></p> <br>
      <p><a href="http://www.itvictoria.edu.mx/">Página Oficial</a></p> <br>
      <p><a href="https://www.facebook.com/TECNM.ITVICTORIA">Facebook</a></p> <br>
    </div>
    <!-- INFORMACIÓN BÁSICA PARA EL USUARIO -->  
    <div class="col-sm-8 text-left">
      <div>
        <h1>&bull; SIBITEC &bull;</h1>
        <h1><i class="fas fa-home"></i>INICIO</h1>
        <h4>Bienvenido(a), <?php echo $_SESSION['usuario'] ?> ingresaste como: Personal Administartivo.</h4>
        <div class="underline">
        </div>
        <div align="text-left">
          <div>
            <?php
            $usuarios = "SELECT * FROM usuarios WHERE rol = 'Personal Administrativo'";
            $resultado = mysqli_query($obj_conexion, $usuarios);

            $row  = mysqli_num_rows($resultado);
            ?>  
            <h3><i class="fas fa-user-tie"></i> Personal Administrativo: <?php echo $row; ?></h3>
          </div>
          <div>
            <?php
              $alumnos = "SELECT * FROM alumnos";
              $resultado = mysqli_query($obj_conexion, $alumnos);

              $row  = mysqli_num_rows($resultado);
              ?>            
              <h3><i class="fas fa-user-graduate"></i> Alumnos: <?php echo $row; ?></h3>
          </div>
          <div>
            <?php
              $docentes = "SELECT * FROM docentes";
              $resultado = mysqli_query($obj_conexion, $docentes);

              $row  = mysqli_num_rows($resultado);
              ?>  
            <h3><i class="fas fa-chalkboard-teacher"></i> Docentes: <?php echo $row; ?></h3>
          </div>
          <div>
            <?php
              $libros = "SELECT * FROM libros";
              $resultado = mysqli_query($obj_conexion, $libros);

              $row  = mysqli_num_rows($resultado);
              ?>  
            <h3><i class="fas fa-book"></i> Libros:  <?php echo $row; ?></h3>
          </div>
          <div>
            <?php
              $categorias = "SELECT * FROM categorias";
              $resultado = mysqli_query($obj_conexion, $categorias);

              $row  = mysqli_num_rows($resultado);
              ?> 
            <h3><i class="far fa-bookmark"></i> Categorías: <?php echo $row; ?></h3>
          </div>
          <div>
            <?php
              $secciones = "SELECT * FROM secciones";
              $resultado = mysqli_query($obj_conexion, $secciones);

              $row  = mysqli_num_rows($resultado);
              ?> 
            <h3><i class="fas fa-book-reader"></i> Secciones: <?php echo $row; ?></h3>
          </div>
          <div>
            <details>
              <?php 
                $p_alumnos = "SELECT * FROM prestamos_alumnos";
                $res_a = mysqli_query($obj_conexion, $p_alumnos);
                $row_a = mysqli_num_rows($res_a);
                $p_docentes = "SELECT * FROM prestamos_docentes";
                $res_d = mysqli_query($obj_conexion, $p_docentes);
                $row_d = mysqli_num_rows($res_d);
                $p_usuarios = "SELECT * FROM prestamos_usuarios";
                $res_u = mysqli_query($obj_conexion, $p_usuarios);
                $row_u = mysqli_num_rows($res_u);
                $tot = $row_a + $row_d + $row_u;
              ?>
              <summary><h3><i class="fas fa-undo-alt"></i> Devoluciones Pendientes: <?php echo $tot; ?></h3></summary>

              <?php
                $p_alumnos = "SELECT * FROM prestamos_alumnos";
                $resultado = mysqli_query($obj_conexion, $p_alumnos);

                $row  = mysqli_num_rows($resultado);
                ?> 
              <h4><i class="fas fa-user-graduate"></i> Alumnos: <?php echo $row; ?></h4>

              <?php
                $p_docentes = "SELECT * FROM prestamos_docentes";
                $resultado = mysqli_query($obj_conexion, $p_docentes);

                $row  = mysqli_num_rows($resultado);
                ?> 
              <h4><i class="fas fa-chalkboard-teacher"></i> Docentes: <?php echo $row; ?></h4>

              <?php
                $p_usuarios = "SELECT * FROM prestamos_usuarios";
                $resultado = mysqli_query($obj_conexion, $p_usuarios);

                $row  = mysqli_num_rows($resultado);
                ?> 
              <h4><i class="fas fa-user-tie"></i> Usuarios: <?php echo $row; ?></h4>
            </details>
          </div>
        </div>
      </div>
    </div>
    <!-- RELOJ Y FECHA -->  
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
<footer class="container-fluid text-center">
  <p> <?php include ("../config/footer.php"); ?> </p>
</footer>
</body>
</html>