<meta charset="utf-8">
<table border="1">
    <caption>Categorías registradas en SIBTEC</caption>
    <tr>
        <th>ID</th>
        <th>Nombre de la Categoría</th>
        <th>Fecha de Registro</th>
    </tr>

     <?php
        error_reporting(0);
        include "../php/conexion.php";
        $fechaE = $_POST['fechaE'];
        $fechaS = $_POST['fechaS'];

        $categorias = "SELECT * FROM categorias WHERE fecha_registro BETWEEN '$fechaE' AND '$fechaS' 
                       ORDER BY id_categoria";
        header("Content-Type: application/vdn.ms-excel; charset=iso-8859-1");
        header("Content-Disposition: attachment; filename=reporteCategorias.xls");
        $resultado = mysqli_query($obj_conexion, $categorias);

        while($row  = mysqli_fetch_assoc($resultado)){
    ?>
    <tr>
        <td><?php echo $row["id_categoria"]; ?> </td>
        <td><?php echo $row["nombre"]; ?> </td>
        <td><?php echo $row["fecha_registro"]; ?> </td>
    </tr>
            
    <?php } ?>
</table>