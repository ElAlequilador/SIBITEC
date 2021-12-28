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
  <title>Reportes Alumnos</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="shortcut icon" href="../img/logo_sibitec.png" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <script src="https://kit.fontawesome.com/9f0a8b2bb7.js" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="../css/estilos.css">
  <link rel="stylesheet" href="../css/registro.css">
  <link rel="stylesheet" href="../css/tabla_alumnos.css">
  <link rel="stylesheet" href="../css/styles.css">
  <link rel="stylesheet" href="../css/buscar.css">
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
<!-- TERMINA BARRA DE NAVEGACIÓN -->
<!-- INICIA LA INFORMACÓN DE LA PÁGINA -->
<div class="container-fluid text-center">    
  <div class="row content">
    <!-- FORMULARIO PARA GENERAR UN DOCUMENTO .XLS A PARTIR DE UN RANGO DE FECHAS -->
    <!--<div class="col-sm-3 sidenav">
      
    </div>-->
    <div class="col-sm-12 text-center"> 
      <div>
          <h1>&bull; SIBITEC &bull;</h1>
          <h1><i class="fas fa-clipboard"></i>REPORTES ALUMNOS</h1>
          <p>Bienvenido, aqui se muestran a todos los alumnos registrados en SIBITEC <i class="far fa-registered"></i>.</p>
          <p>Puedes administrar a cada uno de ellos en el apartado de "Operación".</p>
          
          <div class="underline">
          </div>
          <br>
          <hr>
           
          <div 
         style="overflow-y: scroll; height: 300px" class="container-table_a">
            <div class="table_title_a">
              <p>Alumnos registrados en SIBTEC <i class="far fa-registered"></i></p>
            </div>
            <div class="table_header_a"><p>ID</p></div>
            <div class="table_header_a"><p>Nombre Completo</p></div>
            <div class="table_header_a"><p>N° Control</p></div>
            <div class="table_header_a"><p>Carrera</p></div>
            <div class="table_header_a"><p>Edad</p></div>
            <div class="table_header_a"><p>Sexo</p></div>
            <div class="table_header_a"><p>Teléfono</p></div>
            <div class="table_header_a"><p>Correo</p></div>
            <div class="table_header_a"><p>Dominio</p></div>
            <div class="table_header_a"><p>Fecha Registro</p></div>
            <div class="table_header_a"><p>Operación</p></div>

            <?php
            include "../php/conexion.php";
            $alumnos = "SELECT * FROM alumnos ORDER BY nombre";
            $resultado = mysqli_query($obj_conexion, $alumnos);

            while($row  = mysqli_fetch_assoc($resultado)){
            ?>
            <div class="table_item_a"><?php echo $row["id_alumno"]; ?> </div>
            <div class="table_item_a"><?php echo $row["nombre"]; ?> </div>
            <div class="table_item_a"><?php echo $row["control"]; ?> </div>
            <div class="table_item_a"><?php echo $row["carrera"]; ?> </div>
            <div class="table_item_a"><?php echo $row["edad"]; ?> </div>
            <div class="table_item_a"><?php echo $row["sexo"]; ?></div>
            <div class="table_item_a"><?php echo $row["telefono"]; ?> </div>
            <div class="table_item_a"><?php echo $row["correo"]; ?> </div>
            <div class="table_item_a"><?php echo $row["dominio"]; ?> </div>
            <div class="table_item_a"><?php echo $row["fecha_registro"]; ?> </div>
            <div class="table_item_a">
              <a class="btn btn-success"  href="editaralumno.php?id=<?php echo $row["id_alumno"]; ?>"> 
                <i class="fas fa-user-edit"></i> Editar </a>
              
            </div>
            <?php } ?>
          </div>
      </div> 
    </div>
    <div class="name">
      <form method="POST" action="../php/reporteAlumnos.php">
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
    <div class="email">
      <form method="POST" action="../php/pdfAlumnos.php">
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
    <!-- FORMULARIO PARA GENERAR UN DOCUMENTO .PDF A PARTIR DE UN RANGO DE FECHAS -->
    <!--<div class="col-sm-3 sidenav">
       
    </div>-->
  </div>
</div>
<script src="../js/jquery-3.5.1.min.js"></script>    
<script src="../js/hora.js"></script>
<footer class="container-fluid text-center">
  <p> <?php include ("../config/footer.php"); ?> </p>
</footer>
</body>
</html>
