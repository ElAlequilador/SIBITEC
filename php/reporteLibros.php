<meta charset="utf-8">
<table border="1">
    <caption>Libros registrados en SIBTEC</caption>
    <tr>
        <th>ID</th>
        <th>Número de Ejemplares</th>
        <th>Clasificación</th>
        <th>Titulo</th>
        <th>Autor(es)</th>
        <th>Editorial</th>
        <th>Fecha de Publicación</th>
        <th>Lugar de Publicación</th>
        <th>ISBN</th>
        <th>Edición</th>
        <th>Tomo</th>
        <th>Folio</th>
        <th>Categoría</th>
        <th>Sección</th>
        <th>Fecha de Registro</th>
    </tr>

     <?php
        error_reporting(0);
        include "../php/conexion.php";
        $fechaE = $_POST['fechaE'];
        $fechaS = $_POST['fechaS'];
        $libros = "SELECT * FROM libros WHERE fecha_registro BETWEEN '$fechaE' AND '$fechaS' 
                       ORDER BY id_libro";
        header("Content-Type: application/vdn.ms-excel; charset=iso-8859-1");
        header("Content-Disposition: attachment; filename=reporteLibros.xls");
        $resultado = mysqli_query($obj_conexion, $libros);

        while($row  = mysqli_fetch_assoc($resultado)){
    ?>
    <tr>
        <td><?php echo $row["id_libro"]; ?> </td>
        <td><?php echo $row["num_ejemplares"]; ?> </td>
        <td><?php echo $row["clasificacion"]; ?> </td>
        <td><?php echo $row["titulo"]; ?> </td>
        <td><?php echo $row["autores"]; ?> </td>
        <td><?php echo $row["editorial"]; ?></td>
        <td><?php echo $row["fecha_publicacion"]; ?> </td>
        <td><?php echo $row["lugar_publicacion"]; ?> </td>
        <td><?php echo $row["isbn"]; ?> </td>
        <td><?php echo $row["edicion"]; ?> </td>
        <td><?php echo $row["tomo"]; ?> </td>
        <td><?php echo $row["folio"]; ?> </td>
        <td><?php echo $row["categoria"]; ?> </td>
        <td><?php echo $row["seccion"]; ?> </td>
        <td><?php echo $row["fecha_registro"]; ?> </td>
    </tr>
            
    <?php } ?>
</table>