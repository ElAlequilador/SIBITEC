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
    $this->Cell(50,8,'Reporte de Registros ',0,0,'C');
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
$visitas = "SELECT  nombre, control, carrera, edad, sexo, telefono, correo, dominio 
               FROM registro
               WHERE fecha_registro BETWEEN '$fechaE' AND '$fechaS' 
               ORDER BY carrera";
$resultado = mysqli_query($obj_conexion, $visitas);



$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Arial','',8);
    //$this->Cell(70,8,'',0);
$pdf->Cell(95,8,'Personas registradas en SIBITEC del ' . $fechaE . ' Al '. $fechaS ,0,0,'C');
$pdf->Ln(8);

//$pdf->Cell(40,10, utf8_decode('¡Hola, Mundo!'));

$pdf->SetFont('Arial','B',8);

$pdf->Cell(50,10, utf8_decode('Nombre Completo'), 1, 0, 'C', 0);
$pdf->Cell(14,10, utf8_decode('N° Control'), 1, 0, 'C', 0);
$pdf->Cell(45,10, utf8_decode('Carrera'), 1, 0, 'C', 0);
$pdf->Cell(7,10, utf8_decode('Edad'), 1, 0, 'C', 0);
$pdf->Cell(14,10, utf8_decode('Sexo'), 1, 0, 'C', 0);
$pdf->Cell(17,10, utf8_decode('Teléfono'), 1, 0, 'C', 0);
$pdf->Cell(16,10, utf8_decode('Correo'), 1, 0, 'C', 0);
$pdf->Cell(30,10, utf8_decode('Dominio'), 1, 1, 'C', 0);

$pdf->SetFont('Arial','',8);
while ($row = mysqli_fetch_assoc($resultado)) {
  $pdf->Cell(50,10, utf8_decode($row['nombre']), 1, 0, 'C', 0);
  $pdf->Cell(14,10, utf8_decode($row['control']), 1, 0, 'C', 0);
  $pdf->Cell(45,10, utf8_decode($row['carrera']), 1, 0, 'C', 0);
  $pdf->Cell(7,10, utf8_decode($row['edad']), 1, 0, 'C', 0);
  $pdf->Cell(14,10, utf8_decode($row['sexo']), 1, 0, 'C', 0);
  $pdf->Cell(17,10, utf8_decode($row['telefono']), 1, 0, 'C', 0);
  $pdf->Cell(16,10, utf8_decode($row['correo']), 1, 0, 'C', 0);
  $pdf->Cell(30,10, utf8_decode($row['dominio']), 1, 1, 'C', 0);
}

$var_select = "SELECT * FROM registro 
               WHERE fecha_registro BETWEEN '$fechaE' AND '$fechaS'";
$query = mysqli_query($obj_conexion, $var_select);
$res = mysqli_num_rows($query);

$var_ISC = "SELECT * FROM registro WHERE carrera = 'Ing. Sistemas Computacionales' 
            AND fecha_registro BETWEEN '$fechaE' AND '$fechaS' ";
$query_ISC = mysqli_query($obj_conexion,$var_ISC);
$res_ISC = mysqli_num_rows($query_ISC);

$var_ISCM = "SELECT * FROM registro WHERE carrera = 'Ing. Sistemas Computacionales' 
           AND sexo = 'Masculino' AND fecha_registro BETWEEN '$fechaE' AND '$fechaS'";
$query_ISCM = mysqli_query($obj_conexion,$var_ISCM);
$res_ISCM = mysqli_num_rows($query_ISCM);

$var_ISCF = "SELECT * FROM registro WHERE carrera = 'Ing. Sistemas Computacionales' 
           AND sexo = 'Femenino' AND fecha_registro BETWEEN '$fechaE' AND '$fechaS'";
$query_ISCF = mysqli_query($obj_conexion,$var_ISCF);
$res_ISCF = mysqli_num_rows($query_ISCF);

$var_IC = "SELECT * FROM registro WHERE carrera = 'Ing. Civil' 
            AND fecha_registro BETWEEN '$fechaE' AND '$fechaS' ";
$query_IC = mysqli_query($obj_conexion,$var_IC);
$res_IC = mysqli_num_rows($query_IC);

$var_ICM = "SELECT * FROM registro WHERE carrera = 'Ing. Civil' 
           AND sexo = 'Masculino' AND fecha_registro BETWEEN '$fechaE' AND '$fechaS'";
$query_ICM = mysqli_query($obj_conexion,$var_ICM);
$res_ICM = mysqli_num_rows($query_ICM);

$var_ICF = "SELECT * FROM registro WHERE carrera = 'Ing. Civil' 
           AND sexo = 'Femenino' AND fecha_registro BETWEEN '$fechaE' AND '$fechaS'";
$query_ICF = mysqli_query($obj_conexion,$var_ICF);
$res_ICF = mysqli_num_rows($query_ICF);

$var_IE = "SELECT * FROM registro WHERE carrera = 'Ing. Electronica' 
            AND fecha_registro BETWEEN '$fechaE' AND '$fechaS' ";
$query_IE = mysqli_query($obj_conexion,$var_IE);
$res_IE = mysqli_num_rows($query_IE);

$var_IEM = "SELECT * FROM registro WHERE carrera = 'Ing. Electronica' 
           AND sexo = 'Masculino' AND fecha_registro BETWEEN '$fechaE' AND '$fechaS'";
$query_IEM = mysqli_query($obj_conexion,$var_IEM);
$res_IEM = mysqli_num_rows($query_IEM);

$var_IEF = "SELECT * FROM registro WHERE carrera = 'Ing. Electronica' 
           AND sexo = 'Femenino' AND fecha_registro BETWEEN '$fechaE' AND '$fechaS'";
$query_IEF = mysqli_query($obj_conexion,$var_IEF);
$res_IEF = mysqli_num_rows($query_IEF);

$var_IER = "SELECT * FROM registro WHERE carrera = 'Ing. Energias Renovables' 
            AND fecha_registro BETWEEN '$fechaE' AND '$fechaS' ";
$query_IER = mysqli_query($obj_conexion,$var_IER);
$res_IER = mysqli_num_rows($query_IER);

$var_IERM = "SELECT * FROM registro WHERE carrera = 'Ing. Energias Renovables' 
           AND sexo = 'Masculino' AND fecha_registro BETWEEN '$fechaE' AND '$fechaS'";
$query_IERM = mysqli_query($obj_conexion,$var_IERM);
$res_IERM = mysqli_num_rows($query_IERM);

$var_IERF = "SELECT * FROM registro WHERE carrera = 'Ing. Energias Renovables' 
           AND sexo = 'Femenino' AND fecha_registro BETWEEN '$fechaE' AND '$fechaS'";
$query_IERF = mysqli_query($obj_conexion,$var_IERF);
$res_IERF = mysqli_num_rows($query_IERF);

$var_IGE = "SELECT * FROM registro WHERE carrera = 'Ing. Gestion Empresarial' 
            AND fecha_registro BETWEEN '$fechaE' AND '$fechaS' ";
$query_IGE = mysqli_query($obj_conexion,$var_IGE);
$res_IGE = mysqli_num_rows($query_IGE);

$var_IGEM = "SELECT * FROM registro WHERE carrera = 'Ing. Gestion Empresarial' 
           AND sexo = 'Masculino' AND fecha_registro BETWEEN '$fechaE' AND '$fechaS'";
$query_IGEM = mysqli_query($obj_conexion,$var_IGEM);
$res_IGEM = mysqli_num_rows($query_IGEM);

$var_IGEF = "SELECT * FROM registro WHERE carrera = 'Ing. Gestion Empresarial' 
           AND sexo = 'Femenino' AND fecha_registro BETWEEN '$fechaE' AND '$fechaS'";
$query_IGEF = mysqli_query($obj_conexion,$var_IGEF);
$res_IGEF = mysqli_num_rows($query_IGEF);

$var_II = "SELECT * FROM registro WHERE carrera = 'Ing. Informatica' 
            AND fecha_registro BETWEEN '$fechaE' AND '$fechaS' ";
$query_II = mysqli_query($obj_conexion,$var_II);
$res_II = mysqli_num_rows($query_II);

$var_IIM = "SELECT * FROM registro WHERE carrera = 'Ing. Informatica' 
           AND sexo = 'Masculino' AND fecha_registro BETWEEN '$fechaE' AND '$fechaS'";
$query_IIM = mysqli_query($obj_conexion,$var_IIM);
$res_IIM = mysqli_num_rows($query_IIM);

$var_IIF = "SELECT * FROM registro WHERE carrera = 'Ing. Informatica' 
           AND sexo = 'Femenino' AND fecha_registro BETWEEN '$fechaE' AND '$fechaS'";
$query_IIF = mysqli_query($obj_conexion,$var_IIF);
$res_IIF = mysqli_num_rows($query_IIF);

$var_IM = "SELECT * FROM registro WHERE carrera = 'Ing. Mecanica' 
            AND fecha_registro BETWEEN '$fechaE' AND '$fechaS' ";
$query_IM = mysqli_query($obj_conexion,$var_IM);
$res_IM = mysqli_num_rows($query_IM);

$var_IMM = "SELECT * FROM registro WHERE carrera = 'Ing. Mecanica' 
           AND sexo = 'Masculino' AND fecha_registro BETWEEN '$fechaE' AND '$fechaS'";
$query_IMM = mysqli_query($obj_conexion,$var_IMM);
$res_IMM = mysqli_num_rows($query_IMM);

$var_IMF = "SELECT * FROM registro WHERE carrera = 'Ing. Mecanica' 
           AND sexo = 'Femenino' AND fecha_registro BETWEEN '$fechaE' AND '$fechaS'";
$query_IMF = mysqli_query($obj_conexion,$var_IMF);
$res_IMF = mysqli_num_rows($query_IMF);

$var_IIL = "SELECT * FROM registro WHERE carrera = 'Ing. Industrial' 
            AND fecha_registro BETWEEN '$fechaE' AND '$fechaS' ";
$query_IIL = mysqli_query($obj_conexion,$var_IIL);
$res_IIL = mysqli_num_rows($query_IIL);

$var_IILM = "SELECT * FROM registro WHERE carrera = 'Ing. Industrial' 
           AND sexo = 'Masculino' AND fecha_registro BETWEEN '$fechaE' AND '$fechaS'";
$query_IILM = mysqli_query($obj_conexion,$var_IILM);
$res_IILM = mysqli_num_rows($query_IILM);

$var_IILF = "SELECT * FROM registro WHERE carrera = 'Ing. Industrial' 
           AND sexo = 'Femenino' AND fecha_registro BETWEEN '$fechaE' AND '$fechaS'";
$query_IILF = mysqli_query($obj_conexion,$var_IILF);
$res_IILF = mysqli_num_rows($query_IILF);

$var_LB = "SELECT * FROM registro WHERE carrera = 'Lic. Biologia' 
            AND fecha_registro BETWEEN '$fechaE' AND '$fechaS' ";
$query_LB = mysqli_query($obj_conexion,$var_LB);
$res_LB = mysqli_num_rows($query_LB);

$var_LBM = "SELECT * FROM registro WHERE carrera = 'Lic. Biologia' 
           AND sexo = 'Masculino' AND fecha_registro BETWEEN '$fechaE' AND '$fechaS'";
$query_LBM = mysqli_query($obj_conexion,$var_LBM);
$res_LBM = mysqli_num_rows($query_LBM);

$var_LBF = "SELECT * FROM registro WHERE carrera = 'Lic. Biologia' 
           AND sexo = 'Femenino' AND fecha_registro BETWEEN '$fechaE' AND '$fechaS'";
$query_LBF = mysqli_query($obj_conexion,$var_LBF);
$res_LBF = mysqli_num_rows($query_LBF);

$var_MII = "SELECT * FROM registro WHERE carrera = 'M. en Ing. Industrial' 
            AND fecha_registro BETWEEN '$fechaE' AND '$fechaS' ";
$query_MII = mysqli_query($obj_conexion,$var_MII);
$res_MII = mysqli_num_rows($query_MII);

$var_MIIM = "SELECT * FROM registro WHERE carrera = 'M. en Ing. Industrial' 
           AND sexo = 'Masculino' AND fecha_registro BETWEEN '$fechaE' AND '$fechaS'";
$query_MIIM = mysqli_query($obj_conexion,$var_MIIM);
$res_MIIM = mysqli_num_rows($query_MIIM);

$var_MIIF = "SELECT * FROM registro WHERE carrera = 'M. en Ing. Industrial' 
           AND sexo = 'Femenino' AND fecha_registro BETWEEN '$fechaE' AND '$fechaS'";
$query_MIIF = mysqli_query($obj_conexion,$var_MIIF);
$res_MIIF = mysqli_num_rows($query_MIIF);

$var_MCB = "SELECT * FROM registro WHERE carrera = 'M. Ciencias en Biología' 
            AND fecha_registro BETWEEN '$fechaE' AND '$fechaS' ";
$query_MCB = mysqli_query($obj_conexion,$var_MCB);
$res_MCB = mysqli_num_rows($query_MCB);

$var_MCBM = "SELECT * FROM registro WHERE carrera = 'M. Ciencias en Biología' 
           AND sexo = 'Masculino' AND fecha_registro BETWEEN '$fechaE' AND '$fechaS'";
$query_MCBM = mysqli_query($obj_conexion,$var_MCBM);
$res_MCBM = mysqli_num_rows($query_MCBM);

$var_MCBF = "SELECT * FROM registro WHERE carrera = 'M. Ciencias en Biología' 
           AND sexo = 'Femenino' AND fecha_registro BETWEEN '$fechaE' AND '$fechaS'";
$query_MCBF = mysqli_query($obj_conexion,$var_MCBF);
$res_MCBF = mysqli_num_rows($query_MCBF);

$var_MISC = "SELECT * FROM registro WHERE carrera = 'M. en Sistemas Computacionales' 
            AND fecha_registro BETWEEN '$fechaE' AND '$fechaS' ";
$query_MISC = mysqli_query($obj_conexion,$var_MISC);
$res_MISC = mysqli_num_rows($query_MISC);

$var_MISCM = "SELECT * FROM registro WHERE carrera = 'M. Sistemas Computacionales' 
           AND sexo = 'Masculino' AND fecha_registro BETWEEN '$fechaE' AND '$fechaS'";
$query_MISCM = mysqli_query($obj_conexion,$var_MISCM);
$res_MISCM = mysqli_num_rows($query_MISCM);

$var_MISCF = "SELECT * FROM registro WHERE carrera = 'M. en Sistemas Computacionales' 
           AND sexo = 'Femenino' AND fecha_registro BETWEEN '$fechaE' AND '$fechaS'";
$query_MISCF = mysqli_query($obj_conexion,$var_MISCF);
$res_MISCF = mysqli_num_rows($query_MISCF);

$var_DCB = "SELECT * FROM registro WHERE carrera = 'Doctorado en Ciencias en Biología' 
            AND fecha_registro BETWEEN '$fechaE' AND '$fechaS' ";
$query_DCB = mysqli_query($obj_conexion,$var_DCB);
$res_DCB = mysqli_num_rows($query_DCB);

$var_DCBM = "SELECT * FROM registro WHERE carrera = 'Doctorado en Ciencias en Biología' 
           AND sexo = 'Masculino' AND fecha_registro BETWEEN '$fechaE' AND '$fechaS'";
$query_DCBM = mysqli_query($obj_conexion,$var_DCBM);
$res_DCBM = mysqli_num_rows($query_DCBM);

$var_DCBF = "SELECT * FROM registro WHERE carrera = 'Doctorado en Ciencias en Biología' 
           AND sexo = 'Femenino' AND fecha_registro BETWEEN '$fechaE' AND '$fechaS'";
$query_DCBF = mysqli_query($obj_conexion,$var_DCBF);
$res_DCBF = mysqli_num_rows($query_DCBF);

$var_O = "SELECT * FROM registro WHERE carrera = 'Otro' 
            AND fecha_registro BETWEEN '$fechaE' AND '$fechaS' ";
$query_O = mysqli_query($obj_conexion,$var_O);
$res_O = mysqli_num_rows($query_O);

$var_OM = "SELECT * FROM registro WHERE carrera = 'Otro' 
           AND sexo = 'Masculino' AND fecha_registro BETWEEN '$fechaE' AND '$fechaS'";
$query_OM = mysqli_query($obj_conexion,$var_OM);
$res_OM = mysqli_num_rows($query_OM);

$var_OF = "SELECT * FROM registro WHERE carrera = 'Otro' 
           AND sexo = 'Femenino' AND fecha_registro BETWEEN '$fechaE' AND '$fechaS'";
$query_OF = mysqli_query($obj_conexion,$var_OF);
$res_OF = mysqli_num_rows($query_OF);

$pdf->SetFont('Arial','B',8);
$pdf->Ln(15);
$pdf->Cell(70,8,'Resumen',0);
$pdf->Ln(10);
$pdf->Cell(55,10, utf8_decode('Carrera'), 1, 0, 'C', 0);
$pdf->Cell(20,10, utf8_decode('Hombres'), 1, 0, 'C', 0);
$pdf->Cell(20,10, utf8_decode('Mujeres'), 1, 0, 'C', 0);
$pdf->Cell(15,10, utf8_decode('Total'), 1, 1, 'C', 0);
$pdf->SetFont('Arial','',8);
$pdf->Cell(55,10, utf8_decode('Ing. Sistemas Computacionales'), 1, 0, 'C', 0);
$pdf->Cell(20,10, utf8_decode($res_ISCM), 1, 0, 'C', 0);
$pdf->Cell(20,10, utf8_decode($res_ISCF), 1, 0, 'C', 0);
$pdf->Cell(15,10, utf8_decode($res_ISC), 1, 1, 'C', 0);
$pdf->Cell(55,10, utf8_decode('Ing. Civil'), 1, 0, 'C', 0);
$pdf->Cell(20,10, utf8_decode($res_ICM), 1, 0, 'C', 0);
$pdf->Cell(20,10, utf8_decode($res_ICF), 1, 0, 'C', 0);
$pdf->Cell(15,10, utf8_decode($res_IC), 1, 1, 'C', 0);
$pdf->Cell(55,10, utf8_decode('Ing. Electronica'), 1, 0, 'C', 0);
$pdf->Cell(20,10, utf8_decode($res_IEM), 1, 0, 'C', 0);
$pdf->Cell(20,10, utf8_decode($res_IEF), 1, 0, 'C', 0);
$pdf->Cell(15,10, utf8_decode($res_IE), 1, 1, 'C', 0);
$pdf->Cell(55,10, utf8_decode('Ing. Industrial'), 1, 0, 'C', 0);
$pdf->Cell(20,10, utf8_decode($res_IILM), 1, 0, 'C', 0);
$pdf->Cell(20,10, utf8_decode($res_IILF), 1, 0, 'C', 0);
$pdf->Cell(15,10, utf8_decode($res_IIL), 1, 1, 'C', 0);
$pdf->Cell(55,10, utf8_decode('Ing. Energias Renovables'), 1, 0, 'C', 0);
$pdf->Cell(20,10, utf8_decode($res_IERM), 1, 0, 'C', 0);
$pdf->Cell(20,10, utf8_decode($res_IERF), 1, 0, 'C', 0);
$pdf->Cell(15,10, utf8_decode($res_IER), 1, 1, 'C', 0);
$pdf->Cell(55,10, utf8_decode('Ing. Gestión Empresarial'), 1, 0, 'C', 0);
$pdf->Cell(20,10, utf8_decode($res_IGEM), 1, 0, 'C', 0);
$pdf->Cell(20,10, utf8_decode($res_IGEF), 1, 0, 'C', 0);
$pdf->Cell(15,10, utf8_decode($res_IGE), 1, 1, 'C', 0);
$pdf->Cell(55,10, utf8_decode('Ing. Informatica'), 1, 0, 'C', 0);
$pdf->Cell(20,10, utf8_decode($res_IIM), 1, 0, 'C', 0);
$pdf->Cell(20,10, utf8_decode($res_IIF), 1, 0, 'C', 0);
$pdf->Cell(15,10, utf8_decode($res_II), 1, 1, 'C', 0);
$pdf->Cell(55,10, utf8_decode('Ing. Mecanica'), 1, 0, 'C', 0);
$pdf->Cell(20,10, utf8_decode($res_IMM), 1, 0, 'C', 0);
$pdf->Cell(20,10, utf8_decode($res_IMF), 1, 0, 'C', 0);
$pdf->Cell(15,10, utf8_decode($res_IM), 1, 1, 'C', 0);
$pdf->Cell(55,10, utf8_decode('Lic. Biología'), 1, 0, 'C', 0);
$pdf->Cell(20,10, utf8_decode($res_LBM), 1, 0, 'C', 0);
$pdf->Cell(20,10, utf8_decode($res_LBF), 1, 0, 'C', 0);
$pdf->Cell(15,10, utf8_decode($res_LB), 1, 1, 'C', 0);
$pdf->Cell(55,10, utf8_decode('Maestría en Ing. Industrial'), 1, 0, 'C', 0);
$pdf->Cell(20,10, utf8_decode($res_MIIM), 1, 0, 'C', 0);
$pdf->Cell(20,10, utf8_decode($res_MIIF), 1, 0, 'C', 0);
$pdf->Cell(15,10, utf8_decode($res_MII), 1, 1, 'C', 0);
$pdf->Cell(55,10, utf8_decode('Maestría en Ciencias en Biología'), 1, 0, 'C', 0);
$pdf->Cell(20,10, utf8_decode($res_MCBM), 1, 0, 'C', 0);
$pdf->Cell(20,10, utf8_decode($res_MCBF), 1, 0, 'C', 0);
$pdf->Cell(15,10, utf8_decode($res_MCB), 1, 1, 'C', 0);
$pdf->Cell(55,10, utf8_decode('Maestría en Sistemas Computacionales'), 1, 0, 'C', 0);
$pdf->Cell(20,10, utf8_decode($res_MISCM), 1, 0, 'C', 0);
$pdf->Cell(20,10, utf8_decode($res_MISCF), 1, 0, 'C', 0);
$pdf->Cell(15,10, utf8_decode($res_MISC), 1, 1, 'C', 0);
$pdf->Cell(55,10, utf8_decode('Doctorado en Ciencias en Biología'), 1, 0, 'C', 0);
$pdf->Cell(20,10, utf8_decode($res_DCBM), 1, 0, 'C', 0);
$pdf->Cell(20,10, utf8_decode($res_DCBF), 1, 0, 'C', 0);
$pdf->Cell(15,10, utf8_decode($res_DCB), 1, 1, 'C', 0);
$pdf->Cell(55,10, utf8_decode('Otro'), 1, 0, 'C', 0);
$pdf->Cell(20,10, utf8_decode($res_OM), 1, 0, 'C', 0);
$pdf->Cell(20,10, utf8_decode($res_OF), 1, 0, 'C', 0);
$pdf->Cell(15,10, utf8_decode($res_O), 1, 1, 'C', 0);
$pdf->Cell(55,10, utf8_decode(''), 1, 0, 'C', 0);
$pdf->Cell(20,10, utf8_decode(''), 1, 0, 'C', 0);
$pdf->Cell(20,10, utf8_decode(''), 1, 0, 'C', 0);
$pdf->Cell(15,10, utf8_decode($res), 1, 1, 'C', 0);
/*
$pdf->Cell(164,8,'Carrera: Ing. Sistemas Computacionales, se registraron ' . $res_ISC . ' de los cuales '. $res_ISCF . ' son mujeres ' . ' y ' . $res_ISCM .' son hombres. ' ,0,0,'C');
$pdf->Ln(5);
$pdf->Cell(128,8,'Carrera: Ing. Civil, se registraron ' . $res_IC . ' de los cuales '. $res_ICF . ' son mujeres ' . ' y ' . $res_ICM .' son hombres. ' ,0,0,'C');
$pdf->Ln(5);
$pdf->Cell(139,8,'Carrera: Ing. Electronica, se registraron ' . $res_IE . ' de los cuales '. $res_IEF . ' son mujeres ' . ' y ' . $res_IEM .' son hombres. ' ,0,0,'C');
$pdf->Ln(5);
$pdf->Cell(155,8,'Carrera: Ing. Energias Renovables, se registraron ' . $res_IER . ' de los cuales '. 
    $res_IERF . ' son mujeres ' . ' y ' . $res_IERM .' son hombres. ' ,0,0,'C');
$pdf->Ln(5);
$pdf->Cell(154,8,'Carrera: Ing. Gestion Empresarial, se registraron ' . $res_IGE . ' de los cuales '. 
    $res_IGEF . ' son mujeres ' . ' y ' . $res_IGEM .' son hombres. ' ,0,0,'C');
$pdf->Ln(5);
$pdf->Cell(139,8,'Carrera: Ing. Informatica, se registraron ' . $res_II . ' de los cuales '. $res_IIF . ' son mujeres ' . ' y ' . $res_IIM .' son hombres. ' ,0,0,'C');
$pdf->Ln(5);
$pdf->Cell(137,8,'Carrera: Ing. Mecanica, se registraron ' . $res_IM . ' de los cuales '. $res_IMF . ' son mujeres ' . ' y ' . $res_IMM .' son hombres. ' ,0,0,'C');
$pdf->Ln(5);
$pdf->Cell(136,8,utf8_decode('Carrera: Ing. Industrial, se registraron ') . $res_IIL . ' de los cuales '. $res_IILF . ' son mujeres ' . ' y ' . $res_IILM .' son hombres. ' ,0,0,'C');
$pdf->Ln(5);
$pdf->Cell(134,8,utf8_decode('Carrera: Lic. Biología, se registraron ') . $res_LB . ' de los cuales '. $res_LBF . ' son mujeres ' . ' y ' . 
    $res_LBM .' son hombres. ' ,0,0,'C');
$pdf->Ln(5);
$pdf->Cell(156,8,utf8_decode('Carrera: Maestría en Ing. Industrial, se registraron ') . $res_MII . ' de los cuales '. $res_MIIF . ' son mujeres ' . ' y ' . $res_MIIM .' son hombres. ' ,0,0,'C');
$pdf->Ln(5);
$pdf->Cell(143,8,utf8_decode('Carrera: Maestría en Ciencias en Biología ') . $res_MCB . ' de los cuales '. $res_MCBF . ' son mujeres ' . ' y ' . $res_MCBM .' son hombres. ' ,0,0,'C');
$pdf->Ln(5);
$pdf->Cell(153,8,utf8_decode('Carrera: Maestría en Sistemas Computacionales ') . $res_MISC . ' de los cuales '. $res_MISCF . ' son mujeres ' . ' y ' . $res_MISCM .' son hombres. ' ,0,0,'C');
$pdf->Ln(5);
$pdf->Cell(145,8,utf8_decode('Carrera: Doctorado en Ciencias en Biología ') . $res_DCB . ' de los cuales '. $res_DCBF . ' son mujeres ' . ' y ' . $res_DCBM .' son hombres. ' ,0,0,'C');
$pdf->Ln(5);
$pdf->Cell(87,8,utf8_decode('Otros: ') . $res_O . ' de los cuales '. $res_OF . ' son mujeres ' . ' y ' . 
  $res_OM .' son hombres. ' ,0,0,'C');
$pdf->Ln(5);
$pdf->Cell(30,8,'Para un total de: ' . $res ,0,0,'C');*/
$pdf->Output();
?>