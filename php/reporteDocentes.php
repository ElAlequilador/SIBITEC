<meta charset="utf-8">
<table border="1">
    <caption>Docentes registrados en SIBTEC</caption>
    <tr>
        <th>ID</th>
        <th>Nombre Completo</th>
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
        $docentes = "SELECT * FROM docentes WHERE fecha_registro BETWEEN '$fechaE' AND '$fechaS' 
                       ORDER BY id_docente";
        header("Content-Type: application/vdn.ms-excel; charset=iso-8859-1");
        header("Content-Disposition: attachment; filename=reporteDocentes.xls");
        $resultado = mysqli_query($obj_conexion, $docentes);

        while($row  = mysqli_fetch_assoc($resultado)){
    ?>
    <tr>
        <td><?php echo $row["id_docente"]; ?> </td>
        <td><?php echo $row["nombre"]; ?> </td>
        <td><?php echo $row["edad"]; ?> </td>
        <td><?php echo $row["sexo"]; ?></td>
        <td><?php echo $row["telefono"]; ?> </td>
        <td><?php echo $row["correo"]; ?> </td>
        <td><?php echo $row["dominio"]; ?> </td>
        <td><?php echo $row["fecha_registro"]; ?> </td>
    </tr>
            
    <?php } ?>
</table>