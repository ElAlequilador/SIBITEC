<?php

	$cons_usuario="sibitec";
    $cons_contra="User_Sibitec123*";
    $cons_base_datos="sibitec";
    $cons_equipo="localhost";

    $obj_conexion = 
    mysqli_connect($cons_equipo,$cons_usuario,$cons_contra,$cons_base_datos);
    mysqli_set_charset($obj_conexion, "utf8");
    

    if(!$obj_conexion)
    {
        echo "<h3>No se ha podido conectar PHP - MySQL, verifique sus datos.</h3><hr><br>";
    }
    else
    {
        //echo "<h3>Conexion Exitosa PHP - MySQL </h3><hr><br>";
    }

?>