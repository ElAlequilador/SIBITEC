<?php
  error_reporting(0);
  session_start();
  $varsesion = $_SESSION['usuario'];

  if ($varsesion == null || $varsesion == '') {
    echo "No tienes acceso para ver esta página";
    die();
  }
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <title>Inicio</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="shortcut icon" href="../img/logo_sibitec.png" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="../css/registro.css">
  <link rel="stylesheet" href="../css/estilos.css">
  <link rel="stylesheet" href="../css/styles.css">
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
      <li class="active"><a href="administrador.php"><i class="fas fa-home"></i> Inicio</a></li>
      <li class="dropdown">
        <a class="dropdown-toggle" data-toggle="dropdown" href="#"><i class="fas fa-tasks"></i> Dominios
        <span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li><a href="añadirdominio.php">Nuevo Dominio</a></li>
          <li><a href="admindominios.php">Administrar Dominios</a></li>
        </ul>
      </li>
      <li class="dropdown">
        <a class="dropdown-toggle" data-toggle="dropdown" href="#"><i class="far fa-address-card"></i> Usuarios
        <span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li><a href="nuevopersonal.php">Nuevo Usuario</a></li>
          <li><a href="adminpersonal.php">Administrar Usuarios</a></li>
        </ul>
      </li>
      <li class="dropdown">
        <a class="dropdown-toggle" data-toggle="dropdown" href="#"><i class="fas fa-tasks"></i> Carreras
        <span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li><a href="añadircarrera.php">Añadir Carrera</a></li>
          <li><a href="admincarreras.php">Administrar Carreras</a></li>
        </ul>
      </li>
      <li class="dropdown">
        <a class="dropdown-toggle" data-toggle="dropdown" href="#"><i class="fas fa-tasks"></i> M. de Entrada
        <span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li><a href="añadirmotivo.php">Añadir Motivo</a></li>
          <li><a href="adminmotivos.php">Administrar Motivos</a></li>
        </ul>
      </li>
      <li class="dropdown">
        <a class="dropdown-toggle" data-toggle="dropdown" href="#"><i class="fas fa-cog"></i> Administración Avanzada
        <span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li><a href="adminlibros.php">Administrar Libros</a></li>
          <li><a href="admindocentes.php">Administrar Docentes</a></li>
          <li><a href="adminalumnos.php">Administrar Alumnos</a></li>
          <li><a href="admincategorias.php">Administrar Categorias</a></li>
          <li><a href="adminsecciones.php">Administrar Secciónes</a></li>
          <li><a href="adminprestamos.php">Administrar Préstamos</a></li>
        </ul>
      </li>
      <li class="dropdown">
        <a class="dropdown-toggle" data-toggle="dropdown" href="#"><i class="fas fa-search"></i> Busqueda Avanzada
        <span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li><a href="searchL.php">Buscar Libro</a></li>
          <li><a href="searchD.php">Buscar Docente</a></li>
          <li><a href="searchA.php">Buscar Alumno</a></li>
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
<div class="container-fluid text-center">    
  <div class="row content">
    <div class="col-sm-2 sidenav">
      <p><a href="http://sii.itvictoria.edu.mx/sistema/">Sistema de Información Integral</a></p> <br>
      <p><a href="http://www.itvictoria.edu.mx/">Página Oficial</a></p> <br>
      <p><a href="https://www.facebook.com/TECNM.ITVICTORIA">Facebook</a></p> <br>
    </div>
    <div class="col-sm-8 text-left">
      <div>
        <h1>&bull; SIBITEC &bull;</h1>
        <h1><i class="fas fa-home"></i>INICIO</h1>
        <h4><i class="fas fa-address-card"></i> Bienvenido(a), <?php echo $_SESSION['usuario'] ?> ingresaste como:  Administrador.</h4>
        <div class="underline">
        </div>
        <div align="text-left">
          <div>
            <?php
            include "../php/conexion.php";
            $usuarios = "SELECT * FROM usuarios WHERE rol = 'Personal Administrativo'";
            $resultado = mysqli_query($obj_conexion, $usuarios);

            $row  = mysqli_num_rows($resultado);
            ?>  
            <h3><i class="fas fa-user-friends"></i> <span>Personal Administrativo:</span> <?php echo $row; ?></h3>
          </div>
          <div>
          <?php
            include "../php/conexion.php";
            $usuarios = "SELECT * FROM usuarios WHERE rol = 'Administrador'";
            $resultado = mysqli_query($obj_conexion, $usuarios);

            $row  = mysqli_num_rows($resultado);
            ?> 
            <h3><i class="fas fa-user"></i> <span>Administradores:</span>  <?php echo $row; ?></h3>
          </div>
          <div>
          <?php
            include "../php/conexion.php";
            $alumnos = "SELECT * FROM carreras";
            $resultado = mysqli_query($obj_conexion, $alumnos);

            $row  = mysqli_num_rows($resultado);
            ?>  
          <h3><i class="fas fa-tasks"></i> <span>Carreras:</span>  <?php echo $row; ?></h3>
          </div>
          <div>
            <?php
            include "../php/conexion.php";
            $alumnos = "SELECT * FROM categorias";
            $resultado = mysqli_query($obj_conexion, $alumnos);

            $row  = mysqli_num_rows($resultado);
            ?> 
          <h3><i class="far fa-bookmark"></i> <span>Categorias:</span> <?php echo $row; ?></h3>
          </div>
          <div>
            <?php
            include "../php/conexion.php";
            $alumnos = "SELECT * FROM secciones";
            $resultado = mysqli_query($obj_conexion, $alumnos);

            $row  = mysqli_num_rows($resultado);
            ?> 
          <h3><i class="fas fa-book-reader"></i> <span>Secciones:</span> <?php echo $row; ?></h3>
          </div>
          <div>
            <?php
            include "../php/conexion.php";
            $alumnos = "SELECT * FROM libros";
            $resultado = mysqli_query($obj_conexion, $alumnos);

            $row  = mysqli_num_rows($resultado);
            ?>  
          <h3><i class="fas fa-book"></i> <span>Libros:</span>  <?php echo $row; ?></h3>
          </div>
          <div>
            <?php
            include "../php/conexion.php";
            $alumnos = "SELECT * FROM docentes";
            $resultado = mysqli_query($obj_conexion, $alumnos);

            $row  = mysqli_num_rows($resultado);
            ?>  
          <h3><i class="fas fa-user-tie"></i> <span>Docentes:</span> <?php echo $row; ?></h3>
          </div>
          <div>
            <?php
            include "../php/conexion.php";
            $alumnos = "SELECT * FROM alumnos";
            $resultado = mysqli_query($obj_conexion, $alumnos);

            $row  = mysqli_num_rows($resultado);
            ?>  
          <h3><i class="fas fa-users"></i> <span>Alumnos:</span>  <?php echo $row; ?></h3>
          </div>
          <div>
            <?php
            include "../php/conexion.php";
            $motivo = "SELECT * FROM motivos_entrada";
            $resultado = mysqli_query($obj_conexion, $motivo);

            $row  = mysqli_num_rows($resultado);
            ?>  
          <h3><i class="far fa-comments"></i> <span>Motivos de Entrada:</span>  <?php echo $row; ?></h3>
          </div>
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