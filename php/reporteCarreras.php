<meta charset="utf-8">
<table border="1">
    <caption>Carreras registradas en SIBTEC</caption>
    <tr>
        <th>ID</th>
        <th>Clave</th>
        <th>Nombre de la Carrera</th>
        <th>Fecha de Registro</th>
    </tr>

     <?php
        include "../php/conexion.php";
        $carreras = "SELECT * FROM carreras";
        header("Content-Type: application/vdn.ms-excel; charset=utf-8");
        header("Content-Disposition: attachment; filename=reporteCarreras.xls");
        $resultado = mysqli_query($obj_conexion, $carreras);

        while($row  = mysqli_fetch_assoc($resultado)){
    ?>
    <tr>
        <td><?php echo utf8_decode($row["id_carrera"]); ?> </td>
        <td><?php echo utf8_decode($row["clave"]); ?> </td>
        <td><?php echo utf8_decode($row["nombre"]); ?> </td>
        <td><?php echo utf8_decode($row["fecha_registro"]); ?> </td>
    </tr>
            
    <?php } ?>
</table>