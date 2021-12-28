<?php
require('../fpdf/fpdf.php');

class PDF extends FPDF
{
// Cabecera de página
function Header()
{
    $fechaE = $_POST['fechaE'];
    $fechaS = $_POST['fechaS'];
    // Logo, Fuente y Ubicarnos
    $this->SetFont('Arial','',10);
    $this->Image('../img/itcv.jpg',15,10,20);
    $this->Image('../img/sep.png',75,10,50);
    $this->Image('../img/tecnm.jpg',150,12,30);
    $this->Cell(18,10,'',0);
    $this->Ln(30);
    // Título
    //$this->Cell(30,10,'SIBITEC ',0,0,'C');
    $this->SetFont('Arial','',9);
    //Fecha
    date_default_timezone_set('America/Mexico_City');
    $this->Cell(30,10,'Fecha: '.date('d-m-Y').'',0);
    $this->Cell(130,10,'SIBITEC ',0,0,'C');
    // Salto de línea
    $this->Ln(15);



    //Titulo del reporte
    $this->SetFont('Arial','B',11);
    $this->Cell(70,8,'',0);
    $this->Cell(50,8,'Reporte de Entradas ',0,0,'C');
    $this->Ln(8);
    $this->Ln(15);
}

// Pie de página
function Footer()
{
    // Posición: a 1,5 cm del final
    $this->SetY(-15);
    // Arial italic 8
    $this->SetFont('Arial','I',8);
    // Número de página
    $this->Cell(0,10,utf8_decode('Página ').$this->PageNo().'/{nb}',0,0,'C');
}
}


require('conexion.php');
$fechaE = $_POST['fechaE'];
$fechaS = $_POST['fechaS'];
$var_select = "SELECT * FROM visitantes WHERE fecha_entrada BETWEEN '$fechaE' AND '$fechaS' 
               ORDER BY motivo";

$resultado = mysqli_query($obj_conexion, $var_select);

$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Arial','',8);
//$this->Cell(70,8,'',0);
$pdf->Cell(80,8,'Entradas registradas en SIBITEC del '  . $fechaE . ' Al '. $fechaS ,0,0,'C');
$pdf->Ln(8);
//$pdf->Cell(40,10, utf8_decode('¡Hola, Mundo!'));
$pdf->SetFont('Arial','B',8);
$pdf->Cell(10,10, utf8_decode('ID'), 1, 0, 'C', 0);
$pdf->Cell(40,10, utf8_decode('Correo'), 1, 0, 'C', 0);
$pdf->Cell(50,10, utf8_decode('Dominio'), 1, 0, 'C', 0);
$pdf->Cell(50,10, utf8_decode('Motivo de Entrada'), 1, 0, 'C', 0);
$pdf->Cell(40,10, utf8_decode('Fecha de Entrada'), 1, 1, 'C', 0);
$pdf->SetFont('Arial','',8);
while ($row = mysqli_fetch_assoc($resultado)) {
	$pdf->Cell(10,10, utf8_decode($row['id_visita']), 1, 0, 'C', 0);
	$pdf->Cell(40,10, utf8_decode($row['correo']), 1, 0, 'C', 0);
	$pdf->Cell(50,10, utf8_decode($row['dominio']), 1, 0, 'C', 0);
	$pdf->Cell(50,10, utf8_decode($row['motivo']), 1, 0, 'C', 0);
	$pdf->Cell(40,10, utf8_decode($row['fecha_entrada']), 1, 1, 'C', 0);
}
$var_inner = "SELECT sexo, motivo, fecha_entrada 
              FROM registro 
              INNER JOIN visitantes ON 
              registro.correo = visitantes.correo 
              AND registro.dominio = visitantes.dominio 
              AND fecha_entrada BETWEEN '$fechaE' AND '$fechaS'";
$query = mysqli_query($obj_conexion,$var_inner);
$res = mysqli_num_rows($query);

$var_M1 = "SELECT sexo FROM registro NATURAL JOIN visitantes WHERE motivo = 'Hora Libre' 
           AND fecha_entrada BETWEEN '$fechaE' AND '$fechaS'";
$query_M1 = mysqli_query($obj_conexion,$var_M1);
$res_M1 = mysqli_num_rows($query_M1);

$var_SM1 = "SELECT sexo FROM registro NATURAL JOIN visitantes WHERE motivo = 'Hora Libre' 
           AND fecha_entrada BETWEEN '$fechaE' AND '$fechaS' AND sexo = 'Masculino'";
$query_SM1 = mysqli_query($obj_conexion,$var_SM1);
$res_SM1 = mysqli_num_rows($query_SM1);


$var_SF1 = "SELECT sexo FROM registro NATURAL JOIN visitantes WHERE motivo = 'Hora Libre' 
           AND fecha_entrada BETWEEN '$fechaE' AND '$fechaS' AND sexo = 'Femenino'";
$query_SF1 = mysqli_query($obj_conexion,$var_SF1);
$res_SF1 = mysqli_num_rows($query_SF1);

$var_M2 = "SELECT sexo FROM registro NATURAL JOIN visitantes WHERE motivo = 'Consulta en Línea' 
           AND fecha_entrada BETWEEN '$fechaE' AND '$fechaS'";
$query_M2 = mysqli_query($obj_conexion,$var_M2);
$res_M2 = mysqli_num_rows($query_M2);

$var_SM2 = "SELECT sexo FROM registro NATURAL JOIN visitantes WHERE motivo = 'Consulta en Línea' 
           AND fecha_entrada BETWEEN '$fechaE' AND '$fechaS' AND sexo = 'Masculino'";
$query_SM2 = mysqli_query($obj_conexion,$var_SM2);
$res_SM2 = mysqli_num_rows($query_SM2);

$var_SF2 = "SELECT sexo FROM registro NATURAL JOIN visitantes WHERE motivo = 'Consulta en Línea' 
           AND fecha_entrada BETWEEN '$fechaE' AND '$fechaS' AND sexo = 'Femenino'";
$query_SF2 = mysqli_query($obj_conexion,$var_SF2);
$res_SF2 = mysqli_num_rows($query_SF2);

$var_M3 = "SELECT sexo FROM registro NATURAL JOIN visitantes WHERE motivo = 'Consulta en sala' 
           AND fecha_entrada BETWEEN '$fechaE' AND '$fechaS'";
$query_M3 = mysqli_query($obj_conexion,$var_M3);
$res_M3 = mysqli_num_rows($query_M3);

$var_SM3 = "SELECT sexo FROM registro NATURAL JOIN visitantes WHERE motivo = 'Consulta en Sala' 
           AND fecha_entrada BETWEEN '$fechaE' AND '$fechaS' AND sexo = 'Masculino'";
$query_SM3 = mysqli_query($obj_conexion,$var_SM3);
$res_SM3 = mysqli_num_rows($query_SM3);

$var_SF3 = "SELECT sexo FROM registro NATURAL JOIN visitantes WHERE motivo = 'Consulta en Sala' 
           AND fecha_entrada BETWEEN '$fechaE' AND '$fechaS' AND sexo = 'Femenino'";
$query_SF3 = mysqli_query($obj_conexion,$var_SF3);
$res_SF3 = mysqli_num_rows($query_SF3);

$var_M4 = "SELECT sexo FROM registro NATURAL JOIN visitantes WHERE motivo = 'Préstamo en Sala' 
           AND fecha_entrada BETWEEN '$fechaE' AND '$fechaS'";
$query_M4 = mysqli_query($obj_conexion,$var_M4);
$res_M4 = mysqli_num_rows($query_M4);

$var_SM4 = "SELECT sexo FROM registro NATURAL JOIN visitantes WHERE motivo = 'Préstamo en Sala' 
           AND fecha_entrada BETWEEN '$fechaE' AND '$fechaS' AND sexo = 'Masculino'";
$query_SM4 = mysqli_query($obj_conexion,$var_SM4);
$res_SM4 = mysqli_num_rows($query_SM4);

$var_SF4 = "SELECT sexo FROM registro NATURAL JOIN visitantes WHERE motivo = 'Préstamo en Sala' 
           AND fecha_entrada BETWEEN '$fechaE' AND '$fechaS' AND sexo = 'Femenino'";
$query_SF4 = mysqli_query($obj_conexion,$var_SF4);
$res_SF4 = mysqli_num_rows($query_SF4);

$var_M5 = "SELECT sexo FROM registro NATURAL JOIN visitantes WHERE motivo = 'Préstamo Externo' 
           AND fecha_entrada BETWEEN '$fechaE' AND '$fechaS'";
$query_M5 = mysqli_query($obj_conexion,$var_M5);
$res_M5 = mysqli_num_rows($query_M5);

$var_SM5 = "SELECT sexo FROM registro NATURAL JOIN visitantes WHERE motivo = 'Préstamo Externo' 
           AND fecha_entrada BETWEEN '$fechaE' AND '$fechaS' AND sexo = 'Masculino'";
$query_SM5 = mysqli_query($obj_conexion,$var_SM5);
$res_SM5 = mysqli_num_rows($query_SM5);

$var_SF5 = "SELECT sexo FROM registro NATURAL JOIN visitantes WHERE motivo = 'Préstamo Externo' 
           AND fecha_entrada BETWEEN '$fechaE' AND '$fechaS' AND sexo = 'Femenino'";
$query_SF5 = mysqli_query($obj_conexion,$var_SF5);
$res_SF5 = mysqli_num_rows($query_SF5);

$var_M6 = "SELECT sexo FROM registro NATURAL JOIN visitantes WHERE motivo = 'Sala de Lectura' 
           AND fecha_entrada BETWEEN '$fechaE' AND '$fechaS'";
$query_M6 = mysqli_query($obj_conexion,$var_M6);
$res_M6 = mysqli_num_rows($query_M6);

$var_SM6 = "SELECT sexo FROM registro NATURAL JOIN visitantes WHERE motivo = 'Sala de Lectura' 
           AND fecha_entrada BETWEEN '$fechaE' AND '$fechaS' AND sexo = 'Masculino'";
$query_SM6 = mysqli_query($obj_conexion,$var_SM6);
$res_SM6 = mysqli_num_rows($query_SM6);

$var_SF6 = "SELECT sexo FROM registro NATURAL JOIN visitantes WHERE motivo = 'Sala de Lectura' 
           AND fecha_entrada BETWEEN '$fechaE' AND '$fechaS' AND sexo = 'Femenino'";
$query_SF6 = mysqli_query($obj_conexion,$var_SF6);
$res_SF6 = mysqli_num_rows($query_SF6);

$var_M7 = "SELECT sexo FROM registro NATURAL JOIN visitantes WHERE motivo = 'Sala de Estudio' 
           AND fecha_entrada BETWEEN '$fechaE' AND '$fechaS'";
$query_M7 = mysqli_query($obj_conexion,$var_M7);
$res_M7 = mysqli_num_rows($query_M7);

$var_SM7 = "SELECT sexo FROM registro NATURAL JOIN visitantes WHERE motivo = 'Sala de Estudio' 
           AND fecha_entrada BETWEEN '$fechaE' AND '$fechaS' AND sexo = 'Masculino'";
$query_SM7 = mysqli_query($obj_conexion,$var_SM7);
$res_SM7 = mysqli_num_rows($query_SM7);

$var_SF7 = "SELECT sexo FROM registro NATURAL JOIN visitantes WHERE motivo = 'Sala de Estudio' 
           AND fecha_entrada BETWEEN '$fechaE' AND '$fechaS' AND sexo = 'Femenino'";
$query_SF7 = mysqli_query($obj_conexion,$var_SF7);
$res_SF7 = mysqli_num_rows($query_SF7);

$pdf->SetFont('Arial','B',8);
$pdf->Ln(15);
$pdf->Cell(70,8,'Resumen',0);
$pdf->Ln(10);
$pdf->Cell(55,10, utf8_decode('Motivo de Entrada'), 1, 0, 'C', 0);
$pdf->Cell(20,10, utf8_decode('Hombres'), 1, 0, 'C', 0);
$pdf->Cell(20,10, utf8_decode('Mujeres'), 1, 0, 'C', 0);
$pdf->Cell(15,10, utf8_decode('Total'), 1, 1, 'C', 0);
$pdf->SetFont('Arial','',8);
$pdf->Cell(55,10, utf8_decode('Hora Líbre'), 1, 0, 'C', 0);
$pdf->Cell(20,10, utf8_decode($res_SM1), 1, 0, 'C', 0);
$pdf->Cell(20,10, utf8_decode($res_SF1), 1, 0, 'C', 0);
$pdf->Cell(15,10, utf8_decode($res_M1), 1, 1, 'C', 0);
$pdf->Cell(55,10, utf8_decode('Consulta en Línea'), 1, 0, 'C', 0);
$pdf->Cell(20,10, utf8_decode($res_SM2), 1, 0, 'C', 0);
$pdf->Cell(20,10, utf8_decode($res_SF2), 1, 0, 'C', 0);
$pdf->Cell(15,10, utf8_decode($res_M2), 1, 1, 'C', 0);
$pdf->Cell(55,10, utf8_decode('Consulta en Sala'), 1, 0, 'C', 0);
$pdf->Cell(20,10, utf8_decode($res_SM3), 1, 0, 'C', 0);
$pdf->Cell(20,10, utf8_decode($res_SF3), 1, 0, 'C', 0);
$pdf->Cell(15,10, utf8_decode($res_M3), 1, 1, 'C', 0);
$pdf->Cell(55,10, utf8_decode('Présatmo en Sala'), 1, 0, 'C', 0);
$pdf->Cell(20,10, utf8_decode($res_SM4), 1, 0, 'C', 0);
$pdf->Cell(20,10, utf8_decode($res_SF4), 1, 0, 'C', 0);
$pdf->Cell(15,10, utf8_decode($res_M4), 1, 1, 'C', 0);
$pdf->Cell(55,10, utf8_decode('Préstamo Externo'), 1, 0, 'C', 0);
$pdf->Cell(20,10, utf8_decode($res_SM5), 1, 0, 'C', 0);
$pdf->Cell(20,10, utf8_decode($res_SF5), 1, 0, 'C', 0);
$pdf->Cell(15,10, utf8_decode($res_M5), 1, 1, 'C', 0);
$pdf->Cell(55,10, utf8_decode('Sala de Lectura'), 1, 0, 'C', 0);
$pdf->Cell(20,10, utf8_decode($res_SM6), 1, 0, 'C', 0);
$pdf->Cell(20,10, utf8_decode($res_SF6), 1, 0, 'C', 0);
$pdf->Cell(15,10, utf8_decode($res_M6), 1, 1, 'C', 0);
$pdf->Cell(55,10, utf8_decode('Sala de Estudio'), 1, 0, 'C', 0);
$pdf->Cell(20,10, utf8_decode($res_SM7), 1, 0, 'C', 0);
$pdf->Cell(20,10, utf8_decode($res_SF7), 1, 0, 'C', 0);
$pdf->Cell(15,10, utf8_decode($res_M7), 1, 1, 'C', 0);
$pdf->Cell(55,10, utf8_decode(''), 1, 0, 'C', 0);
$pdf->Cell(20,10, utf8_decode(''), 1, 0, 'C', 0);
$pdf->Cell(20,10, utf8_decode(''), 1, 0, 'C', 0);
$pdf->Cell(15,10, utf8_decode($res), 1, 1, 'C', 0);




/*$pdf->Cell(115,8,'Motivo: Hora libre, ingresaron ' . $res_M1 . ' de los cuales '. $res_SF1 . 
           ' son mujeres ' . ' y ' . $res_SM1 .' son hombres. ' ,0,0,'C');
$pdf->Ln(5);
$pdf->Cell(125,8,'Motivo: Consulta en linea, ingresaron ' . $res_M2 . ' de los cuales '. $res_SF2 . 
           ' son mujeres ' . ' y ' . $res_SM2 .' son hombres. ' ,0,0,'C');
$pdf->Ln(5);
$pdf->Cell(122,8,'Motivo: Consulta en sala, ingresaron ' . $res_M3 . ' de los cuales '. $res_SF3 . 
           ' son mujeres ' . ' y ' . $res_SM3 .' son hombres. ' ,0,0,'C');
$pdf->Ln(5);
$pdf->Cell(123,8,'Motivo: Prestamo en sala, ingresaron ' . $res_M4 . ' de los cuales '. $res_SF4 . 
           ' son mujeres ' . ' y ' . $res_SM4 .' son hombres. ' ,0,0,'C');
$pdf->Ln(5);
$pdf->Cell(125,8,'Motivo: Prestamo externo, ingresaron ' . $res_M5 . ' de los cuales '. $res_SF5 . 
           ' son mujeres ' . ' y ' . $res_SM5 .' son hombres. ' ,0,0,'C');
$pdf->Ln(5);
$pdf->Cell(25,8,'Para un total de: ' . $res,0,0,'C');*/
$pdf->Output();
?>