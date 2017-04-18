<?php

include "Administracion.php";

$fabrica = new Fabrica("Grupo RVA");

$archivo = fopen("empleados.txt","r");
        
    while(!feof($archivo))
            {
                $renglon = fgets($archivo,4096);
                
                $nuevoRenglon = trim($renglon);

                $nuevoArray = explode(";",$nuevoRenglon);

                

                    if(!$nuevoArray[0]=="" && !$nuevoArray[1]=="")
                        {
                            $fabrica->AgregarEmpleado(new Empleado($nuevoArray[0],$nuevoArray[1],$nuevoArray[2],$nuevoArray[3],$nuevoArray[4],$nuevoArray[5],$nuevoArray[6]));
                            
                        }  
                    
            }
                        
            fclose($archivo);

            foreach($fabrica->GetterEmpleados() as $key)
                {
                    echo $key->ToString();
                    echo "<Br>";
                }







?>