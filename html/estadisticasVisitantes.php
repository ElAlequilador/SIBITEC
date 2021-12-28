<?php
   /* VERIFICAMOS SI YA SE HA INICIADO SESIÓN, DE LO CONTRARIO NO PODRÁ TENER ACCESO A LA 
     PÁGINA */
  //ERROR_REPORTING(0) = NO MOSTRARÁ ERRORES DE PHP
  //PARA APRECIAR BIEN EL GRÁFICO DEBEN DE CREARSE NUEVAS CUENTAS
  error_reporting(0);
  session_start();
  $varsesion = $_SESSION['usuario'];

  if ($varsesion == null || $varsesion == '') {
    echo "No tienes acceso para ver esta página";
    die();
  }
?>
<!--CÓDIGO GRÁFICO VISITANTES POR MOTIVO DE ENTRADA-->
<?php
  require('../php/conexion.php');
  $fechaE = $_POST['fechaE'];
  $fechaS = $_POST['fechaS'];
  $var_select = "SELECT * FROM visitantes WHERE (fecha_entrada BETWEEN '$fechaE' AND '$fechaS')";
  $query = mysqli_query($obj_conexion,$var_select);
  $res = mysqli_num_rows($query);

  $var_M1 = "SELECT * FROM visitantes WHERE (fecha_entrada BETWEEN '$fechaE' AND '$fechaS') 
             AND (motivo = 'Hora Libre')";
  $query_M1 = mysqli_query($obj_conexion,$var_M1);
  $res_M1 = mysqli_num_rows($query_M1);
  $totM1 = ($res_M1*100)/$res;

  $var_M2 = "SELECT * FROM visitantes WHERE (fecha_entrada BETWEEN '$fechaE' AND '$fechaS') 
             AND (motivo = 'Prestamo en Sala')";
  $query_M2 = mysqli_query($obj_conexion,$var_M2);
  $res_M2 = mysqli_num_rows($query_M2);
  $totM2 = ($res_M2*100)/$res;

  $var_M3 = "SELECT * FROM visitantes WHERE (fecha_entrada BETWEEN '$fechaE' AND '$fechaS') 
             AND (motivo = 'Prestamo Externo')";
  $query_M3 = mysqli_query($obj_conexion,$var_M3);
  $res_M3 = mysqli_num_rows($query_M3);
  $totM3 = ($res_M3*100)/$res;

  $var_M4 = "SELECT * FROM visitantes WHERE (fecha_entrada BETWEEN '$fechaE' AND '$fechaS') 
             AND (motivo = 'Consulta en Sala')";
  $query_M4 = mysqli_query($obj_conexion,$var_M4);
  $res_M4 = mysqli_num_rows($query_M4);
  $totM4 = ($res_M4*100)/$res;

  $var_M5 = "SELECT * FROM visitantes WHERE (fecha_entrada BETWEEN '$fechaE' AND '$fechaS') 
             AND (motivo = 'Consulta en Línea')";
  $query_M5 = mysqli_query($obj_conexion,$var_M5);
  $res_M5 = mysqli_num_rows($query_M5);
  $totM5 = ($res_M5*100)/$res;

  $var_M6 = "SELECT * FROM visitantes WHERE (fecha_entrada BETWEEN '$fechaE' AND '$fechaS') 
             AND (motivo = 'Sala de Lectura')";
  $query_M6 = mysqli_query($obj_conexion,$var_M6);
  $res_M6 = mysqli_num_rows($query_M6);
  $totM6 = ($res_M6*100)/$res;

  $var_M7 = "SELECT * FROM visitantes WHERE (fecha_entrada BETWEEN '$fechaE' AND '$fechaS') 
             AND (motivo = 'Sala de Estudio')";
  $query_M7 = mysqli_query($obj_conexion,$var_M7);
  $res_M7 = mysqli_num_rows($query_M7);
  $totM7 = ($res_M7*100)/$res;

  while ($rowM1 = mysqli_fetch_array($query_M1)) {
    $M1 = "['".$rowM1["motivo"]."', ".$totM1."],"; 
  }

  while ($rowM2 = mysqli_fetch_array($query_M2)) {
    $M2 = "['".$rowM2["motivo"]."', ".$totM2."],"; 
  }

  while ($rowM3 = mysqli_fetch_array($query_M3)) {
    $M3 = "['".$rowM3['motivo']."', ".$totM3."],"; 
  }

  while ($rowM4 = mysqli_fetch_array($query_M4)) {
    $M4 = "['".$rowM4['motivo']."', ".$totM4."],"; 
  }

  while ($rowM5 = mysqli_fetch_array($query_M5)) {
    $M5 = "['".$rowM5["motivo"]."', ".$totM5."],";  
  }
  while ($rowM6 = mysqli_fetch_array($query_M6)) {
    $M6 = "['".$rowM6["motivo"]."', ".$totM6."],";  
  }
  while ($rowM7 = mysqli_fetch_array($query_M7)) {
    $M7 = "['".$rowM7["motivo"]."', ".$totM7."],";  
  }

?>
<!--CÓDIGO GRÁFICO VISITANTES POR SEXO-->
<?php
  require('../php/conexion.php');
  $fechaE = $_POST['fechaE'];
  $fechaS = $_POST['fechaS'];
  $var_inner = "SELECT sexo, fecha_registro FROM registro 
                INNER JOIN visitantes ON 
                registro.correo = visitantes.correo 
                AND (registro.dominio = visitantes.dominio) 
                WHERE (fecha_registro BETWEEN '$fechaE' AND '$fechaS')";

  $queryS = mysqli_query($obj_conexion,$var_inner);
  $resS = mysqli_num_rows($queryS);

  $var_SM = "SELECT sexo, fecha_registro FROM registro NATURAL JOIN visitantes 
             WHERE (fecha_registro BETWEEN '$fechaE' AND '$fechaS') 
             AND (sexo = 'Masculino')";
  $query_SM = mysqli_query($obj_conexion,$var_SM);
  $res_SM = mysqli_num_rows($query_SM);
  $totSM = ($res_SM*100)/$resS;

  $var_SF = "SELECT sexo, fecha_registro FROM registro NATURAL JOIN visitantes 
             WHERE (fecha_registro BETWEEN '$fechaE' AND '$fechaS') 
             AND (sexo = 'Femenino')";
  $query_SF = mysqli_query($obj_conexion,$var_SF);
  $res_SF = mysqli_num_rows($query_SF);
  $totSF = ($res_SF*100)/$resS;

  while ($rowSM = mysqli_fetch_array($query_SM)) {
    $SM = "['".$rowSM["sexo"]."', ".$totSM."],"; 
  }
  while ($rowSF = mysqli_fetch_array($query_SF)) {
    $SF = "['".$rowSF["sexo"]."', ".$totSF."],"; 
  }
?>
<!--CÓDIGO GRÁFICO VISITANTES POR CARRERA-->
<?php 
  $fechaE = $_POST['fechaE'];
  $fechaS = $_POST['fechaS'];
  require('../php/conexion.php');
  $var_carrera = "SELECT carrera, fecha_registro FROM registro 
                INNER JOIN visitantes ON 
                registro.correo = visitantes.correo 
                AND (registro.dominio = visitantes.dominio) 
                WHERE (fecha_registro BETWEEN '$fechaE' AND '$fechaS')";

  $query = mysqli_query($obj_conexion,$var_carrera);
  $res = mysqli_num_rows($query);

  $var_ISC = "SELECT carrera FROM registro NATURAL JOIN visitantes 
              WHERE (fecha_registro BETWEEN '$fechaE' AND '$fechaS') 
              AND (carrera = 'Ing. Sistemas Computacionales')";
  $query_ISC = mysqli_query($obj_conexion,$var_ISC);
  $res_ISC = mysqli_num_rows($query_ISC);
  $totISC = ($res_ISC*100)/$res;

  $var_II = "SELECT carrera FROM registro NATURAL JOIN visitantes
             WHERE (fecha_registro BETWEEN '$fechaE' AND '$fechaS') 
              AND (carrera = 'Ing. Informática')";
  $query_II = mysqli_query($obj_conexion,$var_II);
  $res_II = mysqli_num_rows($query_II);
  $totII = ($res_II*100)/$res;

  $var_IC = "SELECT carrera FROM registro NATURAL JOIN visitantes 
             WHERE (fecha_registro BETWEEN '$fechaE' AND '$fechaS') 
              AND (carrera = 'Ing. Civil')";
  $query_IC = mysqli_query($obj_conexion,$var_IC);
  $res_IC = mysqli_num_rows($query_IC);
  $totIC = ($res_IC*100)/$res;

  $var_IGE = "SELECT carrera FROM registro NATURAL JOIN visitantes
              WHERE (fecha_registro BETWEEN '$fechaE' AND '$fechaS') 
              AND (carrera = 'Ing. Gestión Empresarial')";
  $query_IGE = mysqli_query($obj_conexion,$var_IGE);
  $res_IGE = mysqli_num_rows($query_IGE);
  $totIGE = ($res_IGE*100)/$res;

  $var_IE = "SELECT carrera FROM registro NATURAL JOIN visitantes
             WHERE (fecha_registro BETWEEN '$fechaE' AND '$fechaS') 
              AND (carrera = 'Ing. Electrónica')";
  $query_IE = mysqli_query($obj_conexion,$var_IE);
  $res_IE = mysqli_num_rows($query_IE);
  $totIE = ($res_IE*100)/$res;

  $var_LB = "SELECT carrera FROM registro NATURAL JOIN visitantes 
             WHERE (fecha_registro BETWEEN '$fechaE' AND '$fechaS') 
              AND (carrera = 'Lic. Biología')";
  $query_LB = mysqli_query($obj_conexion,$var_LB);
  $res_LB = mysqli_num_rows($query_LB);
  $totLB = ($res_LB*100)/$res;

  $var_IER = "SELECT carrera FROM registro NATURAL JOIN visitantes
              WHERE (fecha_registro BETWEEN '$fechaE' AND '$fechaS') 
              AND (carrera = 'Ing. Energías Renovables')";
  $query_IER = mysqli_query($obj_conexion,$var_IER);
  $res_IER = mysqli_num_rows($query_IER);
  $totIER = ($res_IER*100)/$res;

  $var_IM = "SELECT carrera FROM registro NATURAL JOIN visitantes
             WHERE (fecha_registro BETWEEN '$fechaE' AND '$fechaS') 
              AND (carrera = 'Ing. Mecanica')";
  $query_IM = mysqli_query($obj_conexion,$var_IM);
  $res_IM = mysqli_num_rows($query_IM);
  $totIM = ($res_IM*100)/$res;

  $var_IIL = "SELECT carrera FROM registro NATURAL JOIN visitantes
             WHERE (fecha_registro BETWEEN '$fechaE' AND '$fechaS') 
              AND (carrera = 'Ing. Industrial')";
  $query_IIL = mysqli_query($obj_conexion,$var_IIL);
  $res_IIL = mysqli_num_rows($query_IIL);
  $totIIL = ($res_IIL*100)/$res;

  $var_MCB = "SELECT carrera FROM registro NATURAL JOIN visitantes
             WHERE (fecha_registro BETWEEN '$fechaE' AND '$fechaS') 
              AND (carrera = 'M. Ciencias en Biología')";
  $query_MCB = mysqli_query($obj_conexion,$var_MCB);
  $res_MCB = mysqli_num_rows($query_MCB);
  $totMCB = ($res_MCB*100)/$res;

  $var_MII = "SELECT carrera FROM registro NATURAL JOIN visitantes
             WHERE (fecha_registro BETWEEN '$fechaE' AND '$fechaS') 
              AND (carrera = 'M. en Ing. Industrial')";
  $query_MII = mysqli_query($obj_conexion,$var_MII);
  $res_MII = mysqli_num_rows($query_MII);
  $totMII = ($res_MII*100)/$res;

  $var_MISC = "SELECT carrera FROM registro NATURAL JOIN visitantes
             WHERE (fecha_registro BETWEEN '$fechaE' AND '$fechaS') 
              AND (carrera = 'M. en Sistemas Computacionales')";
  $query_MISC = mysqli_query($obj_conexion,$var_MISC);
  $res_MISC = mysqli_num_rows($query_MISC);
  $totMISC = ($res_MISC*100)/$res;

  $var_DCB = "SELECT carrera FROM registro NATURAL JOIN visitantes
             WHERE (fecha_registro BETWEEN '$fechaE' AND '$fechaS') 
              AND (carrera = 'Doctorado en Ciencias en Biología')";
  $query_DCB = mysqli_query($obj_conexion,$var_DCB);
  $res_DCB = mysqli_num_rows($query_DCB);
  $totDCB = ($res_DCB*100)/$res;

  $var_O = "SELECT carrera FROM registro NATURAL JOIN visitantes 
              WHERE (fecha_registro BETWEEN '$fechaE' AND '$fechaS') 
              AND (carrera = 'Otro')";
  $query_O = mysqli_query($obj_conexion,$var_O);
  $res_O = mysqli_num_rows($query_O);
  $totO = ($res_O*100)/$res;

  while ($rowISC = mysqli_fetch_array($query_ISC)) {
    $ISC = "['".$rowISC["carrera"]."', ".$totISC."],"; 
  }

  while ($rowII = mysqli_fetch_array($query_II)) {
    $II = "['".$rowII["carrera"]."', ".$totII."],"; 
  }

  while ($rowIC = mysqli_fetch_array($query_IC)) {
    $IC = "['".$rowIC['carrera']."', ".$totIC."],"; 
  }

  while ($rowIGE = mysqli_fetch_array($query_IGE)) {
    $IGE = "['".$rowIGE['carrera']."', ".$totIGE."],"; 
  }

  while ($rowIE = mysqli_fetch_array($query_IE)) {
    $IE = "['".$rowIE["carrera"]."', ".$totIE."],";  
  }

  while ($rowLB = mysqli_fetch_array($query_LB)) {
    $LB = "['".$rowLB['carrera']."', ".$totLB."],"; 
  }

  while ($rowIER = mysqli_fetch_array($query_IER)) {
    $IER = "['".$rowIER['carrera']."', ".$totIER."],"; 
  }

  while ($rowIM = mysqli_fetch_array($query_IM)) {
    $IM = "['".$rowIM['carrera']."', ".$totIM."],"; 
  }

  while ($rowIIL = mysqli_fetch_array($query_IIL)) {
    $IIL = "['".$rowIIL['carrera']."', ".$totIIL."],"; 
  }

  while ($rowO = mysqli_fetch_array($query_O)) {
    $O = "['".$rowO["carrera"]."', ".$totO."],"; 
  }

  while ($rowMCB = mysqli_fetch_array($query_MCB)) {
    $MCB = "['".$rowMCB["carrera"]."', ".$totMCB."],";
  }

  while ($rowMII = mysqli_fetch_array($query_MII)) {
    $MII = "['".$rowMII["carrera"]."', ".$totMII."],";
  }

  while ($rowMISC = mysqli_fetch_array($query_MISC)) {
    $MISC = "['".$rowMISC["carrera"]."', ".$totMISC."],";
  }

  while ($rowDCB = mysqli_fetch_array($query_DCB)) {
    $DCB = "['".$rowDCB["carrera"]."', ".$totDCB."],";
  }
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <!--TITULO, SCRIPTS -->
  <title>Estadísticas Visitantes</title>
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
        ['MOTIVO', 'VISITAS'],
          <?php 
            echo $M1;
            echo $M2;
            echo $M3;
            echo $M4;
            echo $M5;
            echo $M6;
            echo $M7;
          ?>
      ]);

      var options = {
        title: 'Gráfico Visitas a SIBITEC por MOTIVOS DE ENTRADA'
      };

      var chart = new google.visualization.PieChart(document.getElementById('piechart_Visitas'));

      chart.draw(data, options);
      }
    </script>
      <script type="text/javascript">
    google.charts.load('current', {'packages':['corechart']});
    google.charts.setOnLoadCallback(drawChart);

    function drawChart() {

      var data = google.visualization.arrayToDataTable([
        ['SEXO', 'VISITAS'],
          <?php 
            echo $SM;
            echo $SF;
          ?>
      ]);

      var options = {
        title: 'Gráfico Visitas a SIBITEC por SEXO'
      };

      var chart = new google.visualization.PieChart(document.getElementById('piechart_Visitas_Sexo'));

      chart.draw(data, options);
      }
    </script>
    <script type="text/javascript">
    google.charts.load('current', {'packages':['corechart']});
    google.charts.setOnLoadCallback(drawChart);

    function drawChart() {

      var data = google.visualization.arrayToDataTable([
        ['CARRERA', 'ALUMNOS'],
          <?php 
            echo $IC;
            echo $IIL;
            echo $II;
            echo $LB;
            echo $IE;
            echo $IM;
            echo $ISC;
            echo $IGE;
            echo $IER;
            echo $MCB;
            echo $MISC;
            echo $MII;
            echo $DCB;
            echo $O;
          ?>
      ]);

      var options = {
        title: 'Gráfico Visitas a SIBITEC por CARRERAS'
      };

      var chart = new google.visualization.PieChart(document.getElementById('piechart_Visitas_Carreras'));

      chart.draw(data, options);
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
          <h1><i class="fas fa-chart-pie"></i>ESTADÍSTICAS VISITANTES</h1>
          <div id="piechart_Visitas_Carreras" style="max-width:100%;height:auto;"></div>
          <hr>
          <div id="piechart_Visitas" style="max-width:100%;height:auto;"></div>
          <hr>
          <div id="piechart_Visitas_Sexo" style="max-width:100%;height:auto;"></div>
          <hr>
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