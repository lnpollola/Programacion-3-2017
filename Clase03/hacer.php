<?php

   //include "Producto.php";
   include "Container.php";

//    $producto = new Producto(123,"caramelo",2); 

//    echo $producto->ToString();

//    $archivo = fopen("producto.txt","w");

//    fwrite($archivo,$producto->ToString());

//    $container = new Container("SUDU1102198");

//    for($i = 0; $i < 10;$i++)
//    {
//        $container->AgregarProducto(new Producto($i,"lala",$i+1));
//    }

//    var_dump($container->producto);

//    $container->GuardarProductos();

//echo "Hola Mundo";

//var_dump($_REQUEST);
//echo "\n";
//var_dump($_GET);
//echo "\n";
//var_dump($_POST);


$prod = new Producto($_POST["nombre"],$_POST["descripcion"],$_POST["importe"]);

//echo $prod->ToString();

// if($_POST["guardar"] == "Guardar")
//     {
//         $archivo = fopen("productosconhtml.txt","w");

//         fwrite($archivo,$prod->ToString());

//     }

if(isset($_POST["guardar"]))
    {
         $texto = $_POST["archivo"];
         
         if(!file_exists($texto.".txt"))
            {
            $archivo = fopen($texto.".txt","w");

            fwrite($archivo,$prod->ToString()."\n");
            fclose($archivo);
            
            echo "El archivo se creo existosamente";
            
            }
            else
                {
                       $date=date('dmy His');
                       


                        mkdir("Backup".$date,0777);
                        copy($texto.".txt","Backup".$date."/".$texto.".txt");
                        
                        $archivo = fopen($texto.".txt","a");
                        
                        fwrite($archivo,$prod->ToString()."\n");
                        fclose($archivo);

                        echo "Se agrego el producto al archivo ".$texto.".txt";
                }

    }
    else
        {
            $container = new Container("Sudu123456");
            

            $container->LeerDeArchivo();

            foreach($container->producto as $key)
            {
            echo $key->ToString();
            echo "<Br>";
            }     
            
                   // $archivo = fopen("productosconhtml.txt","r");
            // while(!feof($archivo))
            // {
            // $cadena= fgets($archivo,4096);
            // $prod = new Producto($miArray[0],$miArray[1],$miArray[2]);

            
            // //echo $cadena;

            // $miArray = explode(";",$cadena);
            // }
            // //var_dump($miArray);

            // $prod = new Producto($miArray[0],$miArray[1],$miArray[2]);

            // echo $prod->ToString();

        }



//1En la clase container crear el metodo leer de archivo,
// que lea de un archivo un listado de producto cuyos atributos
// estan separados por punto y coma, luego cargar el array de
// producto con los objetos creados a partir de los datos del
// archivo 
//2agregar un cuadro de texto con el nombre del archivo en 
//donde se van a guardar los datos 
//En ese nombre se guardaran los datos cargados en los cuadros
// de texto. Si el archivo existe primero moveremos el archivo
// ya existente a la carpeta backup cambiandole el nombre al
// nombre que tiene mas la fecha.
//3al leer si el archivo no existe informarlo.     
?>