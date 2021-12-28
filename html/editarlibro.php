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
<html lang="en">
<head>
  <title>Editar Libro</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="shortcut icon" href="../img/logo_sibitec.png" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="../css/estilos.css">
  <link rel="stylesheet" href="../css/registro.css">
  <link rel="stylesheet" href="../css/buscar.css">
  <link rel="stylesheet" href="../css/tablas.css">
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
      <div id="container">
          <h1>&bull; SIBITEC &bull;</h1>
          <h1><i class="far fa-edit"></i> EDITAR LIBRO</h1>
          <p>Bienvenido, aquí podrás editar la infromación del libro.</p>
          <p>Una vez realizado los cambios presiona "Guardar".</p>
          <div class="underline">
          </div>
          
            <form action="../php/aLibro.php" method="POST" id="form_ELibro" onsubmit="return validarELibro()">
            <?php

                require("../php/conexion.php");
                require("../php/funcionesLimpieza.php");

                $id_libro = valida_input($_GET['id']);

                $var_select = "SELECT * FROM libros WHERE id_libro = '$id_libro'";

                $query = mysqli_query($obj_conexion, $var_select);

                while($row  = mysqli_fetch_assoc($query)){
                ?>

                <div class="telephone">
                    <label for="name"></label>
                    <input type="text" value="<?php echo $row["id_libro"]; ?>" name="id_libro" id="id_libro" hidden="">
                </div>

                <div class="telephone">
                    <label for="name"><p>Titulo del Libro</p></label>
                    <input type="text" value="<?php echo $row["titulo"]; ?>" name="titulo" id="titulo">
                </div>

                <div class="telephone">
                    <label for="name"><p>Autores</p></label>
                    <input type="text" value="<?php echo $row["autores"]; ?>" name="autores" id="autores">
                </div>

                <div class="telephone">
                    <label for="name"><p>Editorial</p></label>
                    <input type="text" value="<?php echo $row["editorial"]; ?>" name="editorial" id="editorial">
                </div>

                <div class="telephone">
                    <label for="name"><p>Categoría</p></label>
                    <input type="text" value="<?php echo $row["categoria"]; ?>" name="categoria" id="categoria">
                </div>

                <div class="telephone">
                    <label for="name"><p>Sección</p></label>
                    <input type="text" value="<?php echo $row["seccion"]; ?>" name="seccion" id="seccion">
                </div>

                <div class="name">
                    <label for="name"><p>Número de Ejemplares</p></label>
                    <input type="text" value="<?php echo $row["num_ejemplares"]; ?>" name="num_ejemplares" 
                    id="num_ejemplares">
                </div>

                <div class="email">
                    <label for="name"><p>Clasificación</p></label>
                    <input type="text" value="<?php echo $row["clasificacion"]; ?>" name="clasificacion" 
                    id="clasificacion">
                </div>

                <div class="name">
                    <label for="name"><p>Fecha de Publicación</p></label>
                    <input type="text" value="<?php echo $row["fecha_publicacion"]; ?>" name="fecha_publicacion" id="fecha_publicacion">
                </div>

                <div class="email">
                    <label for="name"><p>Lugar de Publicación</p></label>
                    <input type="text" value="<?php echo $row["lugar_publicacion"]; ?>" name="lugar_publicacion" id="lugar_publicacion">
                </div>

                <div class="name">
                    <label for="name"><p>ISBN</p></label>
                    <input type="text" value="<?php echo $row["isbn"]; ?>" name="isbn" id="isbn">
                </div>

                <div class="email">
                    <label for="name"><p>Edición</p></label>
                    <input type="text" value="<?php echo $row["edicion"]; ?>" name="edicion" id="edicion">
                </div>

                <div class="name">
                    <label for="name"><p>Tomo</p></label>
                    <input type="text" value="<?php echo $row["tomo"]; ?>" name="tomo" id="tomo">
                </div>

                <div class="email">
                    <label for="name"><p>Folio</p></label>
                    <input type="text" value="<?php echo $row["folio"]; ?>" name="folio" id="folio">
                </div>

                <div class="telephone">
                    <label for="name"><p>Fecha de Registro</p></label>
                    <input type="text" value="<?php echo $row["fecha_registro"]; ?>" name="fRegistro" 
                    id="fRegistro" disabled="">
                </div>

                <input type="text" disabled="">

                <div class="submit">
                  <input type="submit" name="guardar" value="Guardar" id="form_enviar" />
                </div>
                <?php 

                }
                 ?>
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
<script src="../js/vELibro.js"></script>
<footer class="container-fluid text-center">
  <p> <?php include ("../config/footer.php"); ?> </p>
</footer>
</body>
</html>