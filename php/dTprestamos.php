<?php
        require("conexion.php");

        $fechaS = $_POST['fechaS'];
        $fechaE = $_POST['fechaE'];


        $eliminar = "DELETE FROM tprestamos WHERE fecha_registro BETWEEN '$fechaS' AND '$fechaE' ";
        
        $resultado = mysqli_query($obj_conexion, $eliminar);

        if ($resultado) {
                echo '<script>
                        alert("Prestamos elimidados correctamente.");
                        location.href="../html/administrador.php";
                    </script>';
            } else {
                echo '<script>
                        alert("[ERROR]: Al eliminar todos los prestamos, intente nuevamente.");
                        
                    </script>';
            }
?>
    