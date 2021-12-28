<meta charset="utf-8">
<table border="1">
    <caption>Registro de visitantes registrados en SIBTEC</caption>
    <tr>
        <th>ID</th>
        <th>Nombre Completo</th>
        <th>N° de Control</th>
        <th>Carrera</th>
        <th>Edad</th>
        <th>Sexo</th>
        <th>Telefono</th>
        <th>Correo</th>
        <th>Dominio</th>
        <th>Fecha de Registro</th>
    </tr>

     <?php
        include "../php/conexion.php";
        $fechaE = $_POST['fechaE'];
        $fechaS = $_POST['fechaS'];
        $visitantes = "SELECT id_registro, nombre, control, carrera, edad, sexo, telefono, correo, dominio,     fecha_registro FROM registro 
                    WHERE fecha_registro BETWEEN '$fechaE' AND '$fechaS' 
                    ORDER BY id_registro";

        header("Content-Type: application/vdn.ms-excel; charset=iso-8859-1");
        header("Content-Disposition: attachment; filename=reporteVisitantes.xls");

        $resultado = mysqli_query($obj_conexion, $visitantes);

        while($row  = mysqli_fetch_assoc($resultado)){
    ?>
    <tr>
        <td><?php echo $row["id_registro"]; ?> </td>
        <td><?php echo $row["nombre"]; ?> </td>
        <td><?php echo $row["control"]; ?> </td>
        <td><?php echo $row["carrera"]; ?> </td>
        <td><?php echo $row["edad"]; ?> </td>
        <td><?php echo $row["sexo"]; ?></td>
        <td><?php echo $row["telefono"]; ?> </td>
        <td><?php echo $row["correo"]; ?> </td>
        <td><?php echo $row["dominio"]; ?> </td>
        <td><?php echo $row["fecha_registro"]; ?> </td>
    </tr>
            
    <?php } ?>
</table>