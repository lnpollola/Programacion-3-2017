<?php
include "Fabrica.php";

var_dump($_FILES);

$arrayExtensiones = ["image/jpeg", "jpg" , "bmp", "gif", "png"];

$acum = 0;

foreach($arrayExtensiones as $key)
    {
        if($key == $_FILES["archivo"]["type"])
            {
                $flag = true;
                $acum += 1;
                break;
            }   
    }

if(!$_FILES["archivo"]["size"] > 1048576)
{
        $acum+=1;
}

mkdir("Fotos",0777);


$arrayNombre = explode(".",$_FILES["archivo"]["name"]);



if(!file_exists("Fotos"."/".$_FILES["archivo"]["name"]))
{
    $acum += 1;
}

echo "El acum tiene un valor de ".$acum;
    
if($acum == 3)
{

    if(isset($_POST["guardar"]))
    {
        $empleado =  new Empleado($_POST["nombre"],$_POST["apellido"],$_POST["dni"],$_POST["sexo"],$_POST["legajo"],$_POST["sueldo"],$_FILES["archivo"]["name"]);

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

}
    else
    {
        Echo "No se instancio el empleado "

    }



?>