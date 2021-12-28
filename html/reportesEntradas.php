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
<!DOCTYPE html>
<html lang="es">
<head>
  <!--TITULO, SCRIPTS -->
  <title>Reportes de Entrada</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="shortcut icon" href="../img/logo_sibitec.png" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="../css/estilos.css">
  <link rel="stylesheet" href="../css/registro.css">
  <link rel="stylesheet" href="../css/tabla_entradas.css">
  <link rel="stylesheet" href="../css/styles.css">
  <link rel="stylesheet" href="../css/buscar.css">
  <script src="https://kit.fontawesome.com/9f0a8b2bb7.js" crossorigin="anonymous"></script>
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
<!-- TERMINA BARRA DE NAVEGACIÓN -->
<!-- INICIA LA INFORMACÓN DE LA PÁGINA -->
<div class="container-fluid text-center">    
  <div class="row content">
    <div class="col-sm-3 sidenav">
      <!-- FORMULARIO PARA GENERAR UN DOCUMENTO .XLS A PARTIR DE UN RANGO DE FECHAS -->
            <form method="POST" action="../php/reporteEntradas.php">
        <p>Generar Excel por Fechas</p>
        <div>
            <label>De: </label>
            <input type="date" name="fechaE" id="fechaE">
          </div>

          <div>
            <label>Al: </label>
            <input type="date" name="fechaS" id="fechaS">
          </div>

          <div class="telephone">
            <button type="submit" id="form_enviar" name="buscar">Generar <i class="fas fa-file-excel"></i>
            </button>
          </div>
      </form>
    </div>
    <div class="col-sm-6 text-center"> 
      <div>
          <h1>&bull; SIBITEC &bull;</h1>
          <h1><i class="fas fa-clipboard"></i>REPORTES VISITANTES</h1>
          <p>Bienvenido, aqui se muestran a todos las entradas al Centro de Información registradas en SIBITEC <i class="far fa-registered"></i>.</p>
          <div class="underline">
          </div>
          <br>
          <hr>
          
          <div style="overflow-y: scroll; height: 300px" class="container-table_v">
            <div class="table_title_v">
              <p>Visitas registradas en SIBTEC <i class="far fa-registered"></i></p>
            </div>
            <div class="table_header_v"><p>ID</p></div>
            <div class="table_header_v"><p>Correo</p></div>
            <div class="table_header_v"><p>Dominio</p></div>
            <div class="table_header_v"><p>Motivo de Entrada</p></div>
            <div class="table_header_v"><p>Fecha de Entrada</p></div>

            <?php
            include "../php/conexion.php";
            $visitantes = "SELECT * FROM visitantes ORDER BY motivo";
            $resultado = mysqli_query($obj_conexion, $visitantes);

            while($row  = mysqli_fetch_assoc($resultado)){
            ?>
            <div class="table_item_v"><?php echo $row["id_visita"]; ?> </div>
            <div class="table_item_v"><?php echo $row["correo"]; ?> </div>
            <div class="table_item_v"><?php echo $row["dominio"]; ?> </div>
            <div class="table_item_v"><?php echo $row["motivo"]; ?> </div>
            <div class="table_item_v"><?php echo $row["fecha_entrada"]; ?> </div>
            <?php } ?>
          </div>
      </div> 
    </div>
    <div class="col-sm-3 sidenav">
      <!-- FORMULARIO PARA GENERAR UN DOCUMENTO .PDF A PARTIR DE UN RANGO DE FECHAS -->
      <form method="POST" action="../php/pdfEntradas.php">
        <p>Generar PDF por Fechas</p>
        <div>
            <label>De: </label>
            <input type="date" name="fechaE" id="fechaE">
          </div>

          <div>
            <label>Al: </label>
            <input type="date" name="fechaS" id="fechaS">
          </div>

          <div class="telephone">
            <label for="name"></label>
            <button type="submit" id="form_enviar" name="buscar">Generar <i class="fas fa-file-pdf"></i></button>
          </div>
      </form>
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
