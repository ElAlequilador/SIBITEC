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
  <title>Editar Préstamo</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="shortcut icon" href="../img/logo_sibitec.png" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="../css/estilos.css">
  <link rel="stylesheet" href="../css/registro.css">
  <link rel="stylesheet" href="../css/buscar.css">
  <link rel="stylesheet" href="../css/styles.css">
  <link rel="stylesheet" href="../css/tabla_pendientes.css">
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
    <div class="col-sm-12 text-center"> 
      <div>
          <h1>&bull; SIBITEC &bull;</h1>
          <h1><i class="far fa-edit"></i>EDITAR PRÉSTAMO</h1>
          <p>Bienvenido, para editar un prestamo deberás ingresar el nombre del docente que solicitó el préstamo para buscarlo en SIBITEC 
            <i class="far fa-registered"></i>.
          </p>
          <p>En la tabla se muestran los prestamos que el docente ha solicitado y no ha devuelto.</p>
          <p>Después elegirás el préstamo a editar.</p>
          <p><i class="far fa-clipboard"></i> Puedes generar el reporte de préstamos cuando la fecha de entrega haya pasado y no se haya devuelto el libro.</p>
          <div class="underline">
          </div>
          <form  method="POST" class="example" onsubmit="return validarBAlumno()" style="margin:auto;max-width:450px">
            <input type="text" placeholder="Nombre del Docente" name="nombre" id="nombre">
            <button type="submit" name="buscar"><i class="fa fa-search"></i></button>
          </form>
          
          <div 
         style="overflow-y: scroll; height: 300px" class="container-table_p">
            <div class="table_title_p">
              <p>Préstamos pendientes del Docente registrados en SIBITEC <i class="far fa-registered"></i> </p>
            </div>
            <div class="table_header_p"><p>ID</p></div>
            <div class="table_header_p"><p>Folio</p></div>
            <div class="table_header_p"><p>Título</p></div>
            <div class="table_header_p"><p>Autor(es)</p></div>
            <div class="table_header_p"><p>Editorial</p></div>
            <div class="table_header_p"><p>Categoría</p></div>
            <div class="table_header_p"><p>Sección</p></div>
            <div class="table_header_p"><p>Docente</p></div>
            <div class="table_header_p"><p>Fecha de Salida</p></div>
            <div class="table_header_p"><p>Fecha de Entrega</p></div>
            <div class="table_header_p"><p>Operación</p></div>

            <?php
            if (isset($_POST['buscar'])) {
              if (strlen($_POST['nombre']) >= 1) {
                require("../php/conexion.php");
                require("../php/funcionesLimpieza.php");

                $nombre = valida_input($_POST['nombre']);

                $prestamo = "SELECT * FROM prestamos_docentes WHERE nombre LIKE '%$nombre%'
                             ORDER BY fecha_salida";
            
                $resultado = mysqli_query($obj_conexion, $prestamo);

                while($row  = mysqli_fetch_assoc($resultado)){
            ?>
            <div class="table_item_p"><?php echo $row["id_prestamo"]; ?></div>
            <div class="table_item_p"><?php echo $row["folio"]; ?></div>
            <div class="table_item_p"><?php echo $row["titulo"]; ?></div>
            <div class="table_item_p"><?php echo $row["autor"]; ?></div>
            <div class="table_item_p"><?php echo $row["editorial"]; ?></div>
            <div class="table_item_p"><?php echo $row["categoria"]; ?></div>
            <div class="table_item_p"><?php echo $row["seccion"]; ?></div>
            <div class="table_item_p"><?php echo $row["nombre"]; ?></div>
            <div class="table_item_p"><?php echo $row["fecha_salida"]; ?></div>
            <div class="table_item_p"><?php echo $row["fecha_entrega"]; ?></div>
            <div class="table_item_p">
              <a class="btn btn-success"  href="editPrestamoD.php?id=<?php echo $row["id_prestamo"]; ?>"><i class="far fa-edit"></i> Editar </a>
              <a class="btn btn-warning" onclick="return confirmInsert()" 
              href="rDocente.php?id=<?php echo $row["id_prestamo"]; ?>"> <i class="far fa-clipboard"></i> Reporte </a>
            </div>

            <?php 
                }
              }
            } 
            ?>
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