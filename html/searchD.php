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
  <title>Buscar Docente</title>
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
  <link rel="stylesheet" href="../css/tabla_docentes.css">
  <script src="https://kit.fontawesome.com/9f0a8b2bb7.js" crossorigin="anonymous"></script>
  <script type="text/javascript">
    function confirmDelete(){

      var respuesta = confirm("Estas seguro que deseas eliminar al Docente?");

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

<!-- TERMINA BARRA DE NAVEGACIÓN -->
<!-- INICIA LA INFORMACÓN DE LA PÁGINA --> 
<div class="container-fluid text-center">    
  <div class="row content">
    <!--<div class="col-sm-2 sidenav">
       LINKS DEL LADO IZQUIERDO CON ACCESO A LOS SITIOS MENCIONADOS 
      <p><a href="http://sii.itvictoria.edu.mx/sistema/">Sistema de Información Integral</a></p> <br>
      <p><a href="http://www.itvictoria.edu.mx/">Página Oficial</a></p> <br>
      <p><a href="https://www.facebook.com/TECNM.ITVICTORIA">Facebook</a></p> <br>
    </div>-->
    <div class="col-sm-12 text-center"> 
      <div>
          <h1>&bull; SIBITEC &bull;</h1>
          <h1><i class="far fa-eye"></i>BUSCAR DOCENTE</h1>
          <p>Bienvenido, aquí podrás buscar a uno o varios docentes registrados en SIBITEC <i class="far fa-registered"></i>.</p>
          <p>Para realizar la busqueda ingresa el NOMBRE o TELÉFONO.</p>
          <div class="underline">
          </div>
          <form  method="POST" class="example" onsubmit="return validarBAlumno()" style="margin:auto;max-width:450px">
            <input type="text" placeholder="Busqueda..." name="docente" id="docente">
            <button type="submit" name="buscar"><i class="fa fa-search"></i></button>
          </form>
          
           <div 
         style="overflow-y: scroll; height: 300px" class="container-table_d">
            <div class="table_title_d">
              <p>Docentes registrados en SIBITEC <i class="far fa-registered"></i></p>
            </div>
            <div class="table_header_d"><p>ID</p></div>
            <div class="table_header_d"><p>Nombre</p></div>
            <div class="table_header_d"><p>Correo</p></div>
            <div class="table_header_d"><p>Dominio</p></div>
            <div class="table_header_d"><p>Edad</p></div>
            <div class="table_header_d"><p>Sexo</p></div>
            <div class="table_header_d"><p>Teléfono</p></div>
            <div class="table_header_d"><p>Fecha de Registro</p></div>
            <div class="table_header_d"><p>Operación</p></div>


            <?php
             if (isset($_POST['buscar'])) {
              if (strlen($_POST['docente']) >= 1) {
                require("../php/conexion.php");
                require("../php/funcionesLimpieza.php");
                $docente = valida_input($_POST['docente']);
                $search = "SELECT * FROM docentes WHERE (nombre LIKE '%$docente%') OR 
                           (telefono LIKE '%$docente%')";
                $resultado = mysqli_query($obj_conexion, $search);

            while($row  = mysqli_fetch_assoc($resultado)){
            ?>
            <div class="table_item_d"><?php echo $row["id_docente"]; ?></div>
            <div class="table_item_d"><?php echo $row["nombre"]; ?></div>
            <div class="table_item_d"><?php echo $row["correo"]; ?></div>
            <div class="table_item_d"><?php echo $row["dominio"]; ?></div>
            <div class="table_item_d"><?php echo $row["edad"]; ?></div>
            <div class="table_item_d"><?php echo $row["sexo"]; ?></div>
            <div class="table_item_d"><?php echo $row["telefono"]; ?></div>
            <div class="table_item_d"><?php echo $row["fecha_registro"]; ?></div>
            <div class="table_item_d">
              <a class="btn btn-success"  href="editDocente.php?id=<?php echo $row["id_docente"]; ?>"><i class="fas fa-user-edit"></i> Editar </a>
              <a class="btn btn-danger" onclick="return confirmDelete()" href="../php/dDocente.php?id=<?php echo $row["id_docente"]; ?>"><i class="fas fa-user-times"></i> Eliminar </a>
            </div>
            
            <?php 
                }
              }
            } 
            ?>
          </div>
      </div>
    </div>
    <!-- 
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
    </div>FECHA Y HORA -->
  </div>
</div>
<script src="../js/jquery-3.5.1.min.js"></script>    
<script src="../js/hora.js"></script>
<footer class="container-fluid text-center">
  <p> <?php include ("../config/footer.php"); ?> </p>
</footer>
</body>
</html>