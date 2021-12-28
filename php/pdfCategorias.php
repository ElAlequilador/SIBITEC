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
    $this->Cell(50,8,utf8_decode('Reporte de Categorías '),0,0,'C');
    $this->Ln(8);
    $this->Ln(15);

    $this->SetFont('Arial','',8);
    //$this->Cell(70,8,'',0);
    $this->Cell(82,8,utf8_decode('Categorías registradas en SIBITEC del ' . $fechaE . ' Al '. $fechaS ),0,0,'C');
    $this->Ln(8);

    $this->SetFont('Arial','B',8);

    $this->Cell(15,10, utf8_decode('ID'), 1, 0, 'C', 0);
	$this->Cell(100,10, utf8_decode('Nombre de la Categoría'), 1, 0, 'C', 0);
	$this->Cell(55,10, utf8_decode('Fecha de Registro'), 1, 1, 'C', 0);

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

$var_select = "SELECT * FROM categorias WHERE fecha_registro BETWEEN '$fechaE' AND '$fechaS' 
               ORDER BY id_categoria";

$resultado = mysqli_query($obj_conexion, $var_select);

$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Arial','',8);

//$pdf->Cell(40,10, utf8_decode('¡Hola, Mundo!'));

while ($row = mysqli_fetch_assoc($resultado)) {
	$pdf->Cell(15,10, utf8_decode($row['id_categoria']), 1, 0, 'C', 0);
	$pdf->Cell(100,10, utf8_decode($row['nombre']), 1, 0, 'C', 0);
	$pdf->Cell(55,10, utf8_decode($row['fecha_registro']), 1, 1, 'C', 0);
}
$var_select = "SELECT * FROM categorias 
               WHERE fecha_registro BETWEEN '$fechaE' AND '$fechaS'";
$query = mysqli_query($obj_conexion, $var_select);
$res = mysqli_num_rows($query);

$pdf->SetFont('Arial','',10);
//$pdf->Cell(70,8,'',0);
$pdf->Ln(5);
$pdf->Cell(11,8,'Total: '. $res ,0,0,'C');
$pdf->Output();
?>