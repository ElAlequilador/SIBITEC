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
?>
<!--CÓDIGO GRÁFICO DOCENTES POR SEXO-->
<?php
  require('../php/conexion.php');
  $fechaE = $_POST['fechaE'];
  $fechaS = $_POST['fechaS'];
  $var_selectS = "SELECT * FROM docentes WHERE (fecha_registro BETWEEN '$fechaE' AND '$fechaS')";
  $queryS = mysqli_query($obj_conexion,$var_selectS);
  $resS = mysqli_num_rows($queryS);

  $var_SM = "SELECT * FROM docentes WHERE (fecha_registro BETWEEN '$fechaE' AND '$fechaS') 
             AND sexo = 'Masculino'";
  $query_SM = mysqli_query($obj_conexion,$var_SM);
  $res_SM = mysqli_num_rows($query_SM);
  $totSM = $res_SM*100/$resS;

  $var_SF = "SELECT * FROM docentes  WHERE (fecha_registro BETWEEN '$fechaE' AND '$fechaS') 
             AND sexo = 'Femenino'";
  $query_SF = mysqli_query($obj_conexion,$var_SF);
  $res_SF = mysqli_num_rows($query_SF);
  $totSF = $res_SF*100/$resS;

  while ($rowSM = mysqli_fetch_array($query_SM)) {
    $SM = "['".$rowSM["sexo"]."', ".$totSM."],"; 
  }
  while ($rowSF = mysqli_fetch_array($query_SF)) {
    $SF = "['".$rowSF["sexo"]."', ".$totSF."],"; 
  }
?>
  
<!DOCTYPE html>
<html lang="es">
<head>
  <!--TITULO, SCRIPTS -->
  <title>Estadísticas Docentes</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="shortcut icon" href="../img/logo_sibitec.png" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="../css/estilos.css">
  <link rel="stylesheet" href="../css/registro.css">
  <link rel="stylesheet" href="../css/styles.css">
  <script src="https://kit.fontawesome.com/9f0a8b2bb7.js" crossorigin="anonymous"></script>
  <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
  <script type="text/javascript">
    google.charts.load('current', {'packages':['corechart']});
    google.charts.setOnLoadCallback(drawChart);

    function drawChart() {

      var data = google.visualization.arrayToDataTable([
        ['SEXO', 'DOCENTES'],
          <?php 
            echo $SM;
            echo $SF;
          ?>
      ]);

      var options = {
        title: 'Gráfico Docentes en SIBITEC por SEXO'
      };

      var chart = new google.visualization.PieChart(document.getElementById('piechart_Docentes'));

      chart.draw(data, options);
      }
    </script>
</head>
<body>
<!-- COMIENZA BARRA DE NAVEGACIÓN -->
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
    <div class="col-sm-3 sidenav">
      <form method="POST" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'])?>">
        <p>Generar Gráfico por Fechas</p>
        <div>
            <label>De: </label>
            <input type="date" name="fechaE" id="fechaE">
          </div>

          <div>
            <label>Al: </label>
            <input type="date" name="fechaS" id="fechaS">
          </div>

          <div class="telephone">
            <button type="submit" id="form_enviar" name="buscar">Generar <i class="fas fa-chart-pie"></i>
            </button>
          </div>
      </form>
    </div>
    <div class="col-sm-8 text-center"> 
       <h1>&bull; SIBITEC &bull;</h1>
          <h1><i class="fas fa-chart-pie"></i>ESTADÍSTICAS DOCENTES</h1>
          <div id="piechart_Docentes" style="max-width:100%;height:auto;"></div>
          <hr>
    </div>
    <!-- FECHA Y HORA -->
  </div>
</div>
<script src="../js/jquery-3.5.1.min.js"></script>    
<script src="../js/hora.js"></script>
<footer class="container-fluid text-center">
  <p> <?php include ("../config/footer.php"); ?> </p>
</footer>
</body>
</html>