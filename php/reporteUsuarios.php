<meta charset="utf-8">
<table border="1">
    <caption>Usuarios registrados en SIBTEC</caption>
    <tr>
        <th>ID</th>
        <th>Nombre Completo</th>
        <th>Número de Control / Clave</th>
        <th>Edad</th>
        <th>Sexo</th>
        <th>Telefono</th>
        <th>Correo</th>
        <th>Dominio</th>
        <th>Usuario</th>
        <th>Contraseña</th>
        <th>Rol</th>
        <th>Fecha de Registro</th>
    </tr>

     <?php
        include "../php/conexion.php";
        $usuarios = "SELECT * FROM usuarios";
        header("Content-Type: application/vdn.ms-excel; charset=utf-8");
        header("Content-Disposition: attachment; filename=reporteUsuarios.xls");
        $resultado = mysqli_query($obj_conexion, $usuarios);

        while($row  = mysqli_fetch_assoc($resultado)){
    ?>
    <tr>
        <td><?php echo utf8_decode($row["id_usuario"]); ?> </td>
        <td><?php echo utf8_decode($row["nombre"]); ?> </td>
        <td><?php echo utf8_decode($row["control"]); ?> </td>
        <td><?php echo utf8_decode($row["edad"]); ?> </td>
        <td><?php echo utf8_decode($row["sexo"]); ?> </td>
        <td><?php echo utf8_decode($row["telefono"]); ?></td>
        <td><?php echo utf8_decode($row["correo"]); ?> </td>
        <td><?php echo utf8_decode($row["dominio"]); ?> </td>
        <td><?php echo utf8_decode($row["usuario"]); ?> </td>
        <td><?php echo utf8_decode($row["password"]); ?> </td>
        <td><?php echo utf8_decode($row["rol"]); ?> </td>
        <td><?php echo utf8_decode($row["fecha_registro"]); ?> </td>
    </tr>
            
    <?php } ?>
</table>