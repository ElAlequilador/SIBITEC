<meta charset="utf-8">
<table border="1">
    <caption>Entradas registradas en SIBTEC</caption>
    <tr>
        <th>ID</th>
        <th>Correo</th>
        <th>Dominio</th>
        <th>Motivo de Entrada</th>
        <th>Fecha de Entrada</th>
    </tr>

     <?php
        include "../php/conexion.php";
        $fechaE = $_POST['fechaE'];
        $fechaS = $_POST['fechaS'];
        $entradas = "SELECT * FROM visitantes WHERE fecha_entrada BETWEEN '$fechaE' AND '$fechaS' 
                       ORDER BY id_visita";

        header("Content-Type: application/vdn.ms-excel; charset=iso-8859-1");
        header("Content-Disposition: attachment; filename=reporteEntradas.xls");
        $resultado = mysqli_query($obj_conexion, $entradas);

        while($row  = mysqli_fetch_assoc($resultado)){
        ?>
    <tr>
        <td><?php echo $row["id_visita"]; ?> </td>
        <td><?php echo $row["correo"]; ?> </td>
        <td><?php echo $row["dominio"]; ?> </td>
        <td><?php echo $row["motivo"]; ?> </td>
        <td><?php echo $row["fecha_entrada"]; ?> </td>
    </tr>
            
    <?php } ?>
</table>