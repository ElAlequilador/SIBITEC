<?php
require('../fpdf/fpdf.php');

class PDF extends FPDF
{
// Cabecera de página
function Header()
{
    require("conexion.php");
    $id_prestamo = valida_input($_POST['id_prestamo']);
    $folio = valida_input($_POST['folio']);
    $nombre = valida_input($_POST['nombre']);
    $titulo = valida_input($_POST['titulo']);
    $autor = valida_input($_POST['autor']);
    $editorial = valida_input($_POST['editorial']);
    $categoria = valida_input($_POST['categoria']);
    $seccion = valida_input($_POST['seccion']);

    $var_selectPA = "SELECT * FROM prestamos_usuarios WHERE nombre = '$nombre'";
    $res_selectPA = mysqli_query($obj_conexion, $var_selectPA);
    $totPA = mysqli_num_rows($res_selectPA);

    $var_selectTP = "SELECT * FROM tprestamos WHERE solicitante = '$nombre'";
    $res_selectTP = mysqli_query($obj_conexion, $var_selectTP);
    $totTP = mysqli_num_rows($res_selectTP);

    $var_telefono = "SELECT telefono FROM usuarios WHERE nombre = '$nombre'";
    $res_telefono = mysqli_query($obj_conexion, $var_telefono);
    $nr_telefono = mysqli_fetch_array($res_telefono);

    $var_correo = "SELECT correo FROM usuarios WHERE nombre = '$nombre'";
    $res_correo = mysqli_query($obj_conexion, $var_correo);
    $nr_correo = mysqli_fetch_array($res_correo);

    $var_dominio = "SELECT dominio FROM usuarios WHERE nombre = '$nombre'";
    $res_dominio = mysqli_query($obj_conexion, $var_dominio);
    $nr_dominio = mysqli_fetch_array($res_dominio);


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
    $this->Cell(50,8,utf8_decode('Reporte del Usuario ' .$nombre),0,0,'C');
    $this->Ln(8);
    $this->Ln(15);

    $this->SetFont('Arial','',9);
    //$this->Cell(70,8,'',0);
    $this->Cell(11,8,utf8_decode('Nombre: '),0,0,'C');
    $this->Cell(45,8,utf8_decode($nombre.'.'),0,0,'C');
    $this->Ln(5);
    $this->Cell(11,8,utf8_decode('Teléfono: '),0,0,'C');
    $this->Cell(25,8,utf8_decode($nr_telefono[0].'.'),0,0,'C');
    $this->Ln(5);
    $this->Cell(9,8,utf8_decode('Correo: '),0,0,'C');
    $this->Cell(50,8,utf8_decode($nr_correo[0].$nr_dominio[0].'.'),0,0,'C');
    $this->Ln(5);
    $this->Cell(26,8,'Total de prestamos: ',0,0,'C');
    $this->Cell(9,8,$totTP.'.',0,0,'C');
    $this->Ln(5);
    $this->Cell(30,8,'Prestamos pendientes: ',0,0,'C');
    $this->Cell(9,8,$totPA,0,0,'C');
    $this->Ln(8);
    $this->Cell(47,8,'Prestamos pendientes detallados',0,0,'C');
    $this->Ln(8);
    $this->SetFont('Arial','B',8);
    $this->Cell(20,10, utf8_decode('Folio'), 1, 0, 'C', 0);
    $this->Cell(20,10, utf8_decode('F. Salida'), 1, 0, 'C', 0);
    $this->Cell(20,10, utf8_decode('F. Entrega'), 1, 0, 'C', 0);
    $this->Cell(20,10, utf8_decode('Retraso'), 1, 1, 'C', 0);

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
require("conexion.php");
require("funcionesLimpieza.php");
$nombre = $_POST['nombre'];
$folio = $_POST['folio']; 

$var_select = "SELECT folio, titulo, autor, editorial, fecha_salida, fecha_entrega FROM prestamos_usuarios
               WHERE nombre = '$nombre'";
$resultado = mysqli_query($obj_conexion, $var_select);

$var_select2 = "SELECT folio, titulo, autor, editorial, fecha_salida, fecha_entrega FROM prestamos_usuarios
                WHERE nombre = '$nombre' AND folio = '$folio'";
$res2 = mysqli_query($obj_conexion, $var_select2);


$var_retraso = "SELECT DATEDIFF(NOW(), fecha_entrega) FROM prestamos_usuarios WHERE nombre = '$nombre' 
AND folio = '$folio'";
$res_retraso = mysqli_query($obj_conexion, $var_retraso);
$nr = mysqli_fetch_array($res_retraso);

$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Arial','',9);

while ($row = mysqli_fetch_assoc($res2)) {
    $pdf->Cell(20,10, utf8_decode($row['folio']), 1, 0, 'C', 0);
    $pdf->Cell(20,10, utf8_decode($row['fecha_salida']), 1, 0, 'C', 0);
    $pdf->Cell(20,10, utf8_decode($row['fecha_entrega']), 1, 0, 'C', 0);
    $pdf->Cell(20,10, utf8_decode($nr[0]), 1, 1, 'C', 0);
}




//$pdf->Cell(70,8,'',0);
$pdf->Output();
?>