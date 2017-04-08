<?php
include "Empleado.php";

if(isset($_POST["guardar"]))
{
    $empleado =  new Empleado($_POST["nombre"],$_POST["apellido"],$_POST["dni"],$_POST["sexo"],$_POST["legajo"],$_POST["sueldo"]);

    $path = "empleados.txt";

    if(file_exists($path))
    {
        $archivo = fopen($path,"a");
        fwrite($archivo,$empleado->ToString()."\r\n");
        echo '<a href="mostrar.php">Se creo correctamente </a>'; 
    }
        else
        {
            $archivo = fopen($path,"w");
            fwrite($archivo,$empleado->ToString()."\r\n");
        }


}




?>