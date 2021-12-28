<meta charset="utf-8">
<table border="1">
    <caption>Dominios registrados en SIBTEC</caption>
    <tr>
        <th>ID</th>
        <th>Nombre del Dominio</th>
        <th>Fecha de Registro</th>
    </tr>

     <?php
        include "../php/conexion.php";
        $dominios = "SELECT * FROM dominios";
        header("Content-Type: application/vdn.ms-excel; charset=utf-8");
        header("Content-Disposition: attachment; filename=reporteDominios.xls");
        $resultado = mysqli_query($obj_conexion, $dominios);

        while($row  = mysqli_fetch_assoc($resultado)){
    ?>
    <tr>
        <td><?php echo utf8_decode($row["id_dominio"]); ?> </td>
        <td><?php echo utf8_decode($row["nombre"]); ?> </td>
        <td><?php echo utf8_decode($row["fecha_registro"]); ?> </td>
    </tr>
            
    <?php } ?>
</table>