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
          <li><a href="nuevodocente.php">Nuevo Docente</a></li>
        </ul>
      </li>
      <li class="dropdown">
        <a class="dropdown-toggle" data-toggle="dropdown" href="#"><i class="fas fa-book"></i> Libros
        <span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li><a href="nuevolibro.php">Nuevo Libro</a></li>
          <li><a href="editarprestamo.php">Editar Préstamo</a></li>
        </ul>
      </li>
      <li class="dropdown">
        <a class="dropdown-toggle" data-toggle="dropdown" href="#"><i class="far fa-calendar"></i> Préstamos
        <span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li><a href="nuevoprestamo.php">Nuevo Préstamo</a></li>
          <li><a href="tpendientes.php">Préstamos Pendientes</a></li>
        </ul>
      </li>
      <li class="dropdown">
        <a class="dropdown-toggle" data-toggle="dropdown" href="#"><i class="fas fa-chart-line"></i> Reportes
        <span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li><a href="reportesAlumnos.php">Reportes Alumnos</a></li>
          <li><a href="reportesDocentes.php">Reportes Docentes</a></li>
          <li><a href="reportesCategorias.php">Reportes Categorías</a></li>
          <li><a href="reportesSecciones.php">Reportes Secciones</a></li>
          <li><a href="reportesLibros.php">Reportes Libros</a></li>
          <li><a href="reportesVisitantes.php">Reportes Visitantes</a></li>
          <li><a href="reportesEntradas.php">Reportes Entradas</a></li>
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
    <div class="col-sm-8 text-center"> 
      <div id="container">
        <h1>&bull; SIBITEC &bull;</h1>
        <h1><i class="far fa-edit"></i>EDITAR PRÉSTAMO</h1>
        <p>Bienvenido, para editar el préstamo del alumno sólo debes agregar una nueva fecha de entrega.
        </p>
        <div class="underline">
        </div>
          
        <form action="../php/uPrestamoA.php" method="POST" id="form_ELibro" onsubmit="return validarELibro()">
          <?php

            require("../php/conexion.php");
            require("../php/funcionesLimpieza.php");

            $id = valida_input($_GET['id']);
            $var_select= "SELECT * FROM prestamos_alumnos 
                          WHERE id_prestamo = '$id'";
            $resultado = mysqli_query($obj_conexion, $var_select);

            while($row  = mysqli_fetch_assoc($resultado)){
            ?>

              <div class="name">
                  <label for="name"></label>
                  <input type="text" value="<?php echo $row["id_prestamo"]; ?>" name="id_prestamo" 
                  id="id_prestamo" hidden="">
              </div><br>

              <div class="telephone">
                  <label for="name"><p>Título</p></label>
                  <input type="text" value="<?php echo $row["titulo"]; ?>" name="titulo" id="titulo" 
                  disabled="">
              </div>

              <div class="telephone">
                  <label for="name"><p>Autor(es)</p></label>
                  <input type="text" value="<?php echo $row["autor"]; ?>" name="autores" id="autores" 
                  disabled="">
              </div>

              <div class="telephone">
                  <label for="name"><p>Editorial</p></label>
                  <input type="text" value="<?php echo $row["editorial"]; ?>" name="editorial" id="editorial" disabled="">
              </div>

              <div class="telephone">
                  <label for="name"><p>Categoría</p></label>
                  <input type="text" value="<?php echo $row["categoria"]; ?>" name="categoria" id="categoria" disabled="">
              </div>

              <div class="telephone">
                  <label for="name"><p>Sección</p></label>
                  <input type="text" value="<?php echo $row["seccion"]; ?>" name="seccion" id="seccion" 
                  disabled="">
              </div>

              <div class="name">
                  <label for="name"><p>Folio</p></label>
                  <input type="text" value="<?php echo $row["folio"]; ?>" name="folio" id="folio" disabled="">
              </div>
              
              <div class="email">
                  <label for="name"><p>Alumno</p></label>
                  <input type="text" value="<?php echo $row["nombre"]; ?>" name="alumno" id="alumno" 
                  disabled="">
              </div>

              <div class="name">
                  <label for="name"><p>Fecha de Salida</p></label>
                  <input type="text" value="<?php echo $row["fecha_salida"]; ?>" name="fecha_salida" 
                  id="fecha_salida" disabled="">
              </div>

              <div class="email">
                  <label for="name"><p>Fecha de Entrega</p></label>
                  <input type="text" value="<?php echo $row["fecha_entrega"]; ?>" name="fecha_entrega" 
                  id="fecha_entrega" disabled="">
              </div>

              <div class="telephone">
                  <label for="name"><p>Nueva Fecha de Entrega</p></label>
                  <input type="date" name="nfecha_entrega" id="nfecha_entrega">
              </div>

              <input type="text" disabled="">

              <div class="submit">
                <input type="submit" name="guardar" onclick="return confirmInsert()" value="Guardar" id="form_enviar" />
              </div>
                <?php 
                }
                 ?>
          </form>
      </div>
    </div>
    <!-- FECHA Y HORA -->
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
<script src="../js/vEPrestamo.js"></script>
<footer class="container-fluid text-center">
  <p> <?php include ("../config/footer.php"); ?> </p>
</footer>
</body>
</html>