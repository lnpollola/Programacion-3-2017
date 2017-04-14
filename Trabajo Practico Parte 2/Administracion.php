<?php
include "Fabrica.php";

if(isset($_POST["guardar"]))
{
    $empleado =  new Empleado($_POST["nombre"],$_POST["apellido"],$_POST["dni"],$_POST["sexo"],$_POST["legajo"],$_POST["sueldo"],$_POST["archivo"]);

    $path = "empleados.txt";
    

   // Para saber la extension
    
   // $extension = pathinfo($_POST["archivo"],PATHINFO_EXTENSION);
   // echo $extension;


    if(isset($_POST["nombre"],$_POST["apellido"],$_POST["dni"],$_POST["sexo"],$_POST["legajo"],$_POST["sueldo"]))
    {

                if(file_exists($path))
                {
                    $archivo = fopen($path,"a");
                    fwrite($archivo,$empleado->ToString()."\r\n");
                    fclose($archivo);
                    echo '<a href="Mostrar.php">Se creo correctamente </a>'; 
                    
                }
                    else
                    {
                        $archivo = fopen($path,"w");
                        fwrite($archivo,$empleado->ToString()."\r\n");
                        fclose($archivo);
                    }
    }   
    else{
            
            echo '<a href="index.html">"No se pudo guardar el empleado." </a>';




        }






}




?>