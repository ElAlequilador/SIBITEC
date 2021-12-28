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
  <title>Todos los Prestamos</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="shortcut icon" href="../img/logo_sibitec.png" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="../css/estilos.css">
  <link rel="stylesheet" href="../css/registro.css">
  <link rel="stylesheet" href="../css/styles.css">
  <link rel="stylesheet" href="../css/tabla_todop.css">
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
<div class="container-fluid text-center">    
  <div class="row content">
    <div class="col-sm-2 sidenav">
      <p><a href="http://sii.itvictoria.edu.mx/sistema/">Sistema de Informacion Integral</a></p> <br>
      <p><a href="http://www.itvictoria.edu.mx/">Pagina Oficial</a></p> <br>
      <p><a href="https://www.facebook.com/TECNM.ITVICTORIA">Facebook</a></p> <br>
    </div>
    <div class="col-sm-8 text-center"> 
      <div>
          <h1>&bull; SIBITEC &bull;</h1>
          <h1><i class="far fa-calendar-alt"></i>TODOS LOS PRESTAMOS</h1>
          <p>Bienvenido, aqui se muestran todos los préstamos registrados en SIBITEC <i class="far fa-registered"></i>.</p>
          <div class="underline">
          </div>

          <div 
         style="overflow-y: scroll; height: 300px" class="container-table_p">
            <div class="table_title_p"><p>Prestamos registrados en SIBITEC <i class="far fa-registered"></i></p></div>
            <div class="table_header_p"><p>ID</p></div>
            <div class="table_header_p"><p>Folio</p></div>
            <div class="table_header_p"><p>Titulo</p></div>
            <div class="table_header_p"><p>Autor</p></div>
            <div class="table_header_p"><p>Solicitante</p></div>
            <div class="table_header_p"><p>Fecha de Registro</p></div>

            <?php
            include "../php/conexion.php";
            $prestamo = "SELECT * FROM tprestamos ORDER BY fecha_registro";

            $resultado = mysqli_query($obj_conexion, $prestamo);

            while($row  = mysqli_fetch_assoc($resultado)){
            ?>
            <div class="table_item_p"><?php echo $row["id"]; ?></div>
            <div class="table_item_p"><?php echo $row["folio"]; ?></div>
            <div class="table_item_p"><?php echo $row["titulo"]; ?></div>
            <div class="table_item_p"><?php echo $row["autor"]; ?></div>
            <div class="table_item_p"><?php echo $row["solicitante"]; ?></div>
            <div class="table_item_p"><?php echo $row["fecha_registro"]; ?></div>
            <?php } ?>
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