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
    $this->Cell(50,8,'Reporte de Docentes ',0,0,'C');
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
$var_select = "SELECT nombre, edad, sexo, telefono, correo, dominio, fecha_registro
               FROM docentes WHERE fecha_registro BETWEEN '$fechaE' AND '$fechaS' 
               ORDER BY nombre";

$resultado = mysqli_query($obj_conexion, $var_select);

$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Arial','',8);

//$this->Cell(70,8,'',0);
$pdf->Cell(80,8,'Docentes registrados en SIBITEC del ' . $fechaE . ' Al '. $fechaS,0,0,'C');
$pdf->Ln(8);
$pdf->SetFont('Arial','B',8);
$pdf->Cell(55,10, utf8_decode('Nombre Completo'), 1, 0, 'C', 0);
$pdf->Cell(15,10, utf8_decode('Edad'), 1, 0, 'C', 0);
$pdf->Cell(15,10, utf8_decode('Sexo'), 1, 0, 'C', 0);
$pdf->Cell(20,10, utf8_decode('Telefono'), 1, 0, 'C', 0);
$pdf->Cell(25,10, utf8_decode('Correo'), 1, 0, 'C', 0);
$pdf->Cell(30,10, utf8_decode('Dominio'), 1, 0, 'C', 0);
$pdf->Cell(25,10, utf8_decode('Fecha de Registro'), 1, 1, 'C', 0);

//$pdf->Cell(40,10, utf8_decode('¡Hola, Mundo!'));
$pdf->SetFont('Arial','',8);
while ($row = mysqli_fetch_assoc($resultado)) {
	$pdf->Cell(55,10, utf8_decode($row['nombre']), 1, 0, 'C', 0);
	$pdf->Cell(15,10, utf8_decode($row['edad']), 1, 0, 'C', 0);
	$pdf->Cell(15,10, utf8_decode($row['sexo']), 1, 0, 'C', 0);
	$pdf->Cell(20,10, utf8_decode($row['telefono']), 1, 0, 'C', 0);
	$pdf->Cell(25,10, utf8_decode($row['correo']), 1, 0, 'C', 0);
	$pdf->Cell(30,10, utf8_decode($row['dominio']), 1, 0, 'C', 0);
	$pdf->Cell(25,10, utf8_decode($row['fecha_registro']), 1, 1, 'C', 0);
}
$var_select = "SELECT * FROM docentes 
               WHERE fecha_registro BETWEEN '$fechaE' AND '$fechaS'";
$query = mysqli_query($obj_conexion, $var_select);
$res = mysqli_num_rows($query);

$var_SM = "SELECT * FROM docentes WHERE sexo = 'Masculino' 
           AND fecha_registro BETWEEN '$fechaE' AND '$fechaS' ";
$query_SM = mysqli_query($obj_conexion,$var_SM);
$res_SM = mysqli_num_rows($query_SM);
//$totSM = $res_SM*100/$res;

$var_SF = "SELECT * FROM docentes WHERE sexo = 'Femenino' 
           AND fecha_registro BETWEEN '$fechaE' AND '$fechaS'";
$query_SF = mysqli_query($obj_conexion,$var_SF);
$res_SF = mysqli_num_rows($query_SF);
//$totSF = $res_SF*100/$res;
$pdf->SetFont('Arial','B',8);
$pdf->Ln(15);
$pdf->Cell(70,8,'Resumen',0);
$pdf->Ln(10);
$pdf->Cell(55,10, utf8_decode('Sexo'), 1, 0, 'C', 0);
$pdf->Cell(15,10, utf8_decode('Hombres'), 1, 0, 'C', 0);
$pdf->Cell(15,10, utf8_decode('Mujeres'), 1, 0, 'C', 0);
$pdf->Cell(25,10, utf8_decode('Total'), 1, 1, 'C', 0);
$pdf->SetFont('Arial','',8);
//$pdf->Cell(70,8,'',0);
$pdf->Cell(55,10, utf8_decode('Cantidad'), 1, 0, 'C', 0);
$pdf->Cell(15,10, utf8_decode($res_SM), 1, 0, 'C', 0);
$pdf->Cell(15,10, utf8_decode($res_SF), 1, 0, 'C', 0);
$pdf->Cell(25,10, utf8_decode($res), 1, 1, 'C', 0);
$pdf->Output();
?>