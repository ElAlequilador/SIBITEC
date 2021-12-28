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
  <title>Editar Alumno</title>
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
  <script type="text/javascript">
    function confirmEdit(){

      var respuesta= confirm("Todos los cambios son correctos?");

      if (respuesta == true) {
        return true;
      }else{
        return false;
      }
    }
  </script>
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
    <div class="col-sm-8 text-center"> 
      <div id="container">
          <h1>&bull; SIBITEC &bull;</h1>
          <h1><i class="fas fa-user-edit"></i>EDITAR ALUMNO</h1>
          <p>Bienvenido, para editar un alumno debes llenar el siguiente formulario.</p>
          <div class="underline">
          </div>
          
           <form action="../php/uAlumno.php" method="POST" id="form_EAlumno" onsubmit="return validarEAlumno()">
            <?php

                require("../php/conexion.php");
                require("../php/funcionesLimpieza.php");

                $id_alumno = valida_input($_GET['id']);
                $var_select = "SELECT * FROM alumnos WHERE id_alumno = '$id_alumno'";
                $query = 
                mysqli_query($obj_conexion, $var_select);

                while($row  = mysqli_fetch_assoc($query)){
                ?>

                <div class="telephone">
                    <label for="name"></label>
                    <input type="text" value="<?php echo $row["id_alumno"]; ?>" name="id_alumno" id="id_alumno" hidden="">
                </div>

                <div class="telephone">
                    <label for="name"><p>Nombre Completo</p></label>
                    <input type="text" value="<?php echo $row["nombre"]; ?>" name="nombre" id="nombre">
                </div>

                <div class="name">
                    <label for="name"><p>N° Control</p></label>
                    <input type="text" value="<?php echo $row["control"]; ?>" name="control" id="control">
                </div>

                <div class="email">
                    <label for="name"><p>Edad</p></label>
                    <input type="text" value="<?php echo $row["edad"]; ?>" name="edad" id="edad">
                </div>

                <div class="name">
                    <label for="name"><p>Sexo</p></label>
                    <input type="text" value="<?php echo $row["sexo"]; ?>" name="sexo" id="sexo">
                </div>

                <div class="email">
                    <label for="name"><p>Telefono</p></label>
                    <input type="text" value="<?php echo $row["telefono"]; ?>" name="telefono" id="telefono">
                </div>

                <div class="name">
                    <label for="name"><p>Correo Institucional</p></label>
                    <input type="text" value="<?php echo $row["correo"]; ?>" name="correo" id="correo">
                </div>

                <div class="email">
                    <label for="name"><p>Dominio</p></label>
                    <input type="text" value="<?php echo $row["dominio"]; ?>" name="dominio" id="dominio">
                </div>

                <div class="telephone">
                    <label for="name"><p>Fecha de Registro</p></label>
                    <input type="text" value="<?php echo $row["fecha_registro"]; ?>" name="fRegistro" id="fRegistro" disabled="">
                </div>

                <input type="text" disabled="">

                <div class="submit">
                  <input type="submit" name="guardar" onclick="return confirmEdit()" value="Guardar" 
                  id="form_enviar" />
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
<script src="../js/vEditAlumno.js"></script>
<footer class="container-fluid text-center">
  <p> <?php include ("../config/footer.php"); ?> </p>
</footer>
</body>
</html>