<?php

   include "Producto.php";
//    include "Container.php";

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
         $archivo = fopen("productosconhtml.txt","w");

        fwrite($archivo,$prod->ToString());
        fclose($archivo);
    }
    else
        {
            $archivo = fopen("productosconhtml.txt","r");
            $cadena= fgets($archivo,4096);

            
            echo $cadena;

            $miArray = explode("-",$cadena);

            var_dump($miArray);

            $prod = new Producto($miArray[0],$miArray[1],$miArray[2]);

            echo $prod->ToString();
        }

//1En la clase container crear el metodo leer de archivo, que lea de un archivo un listado de producto cuyos atributos estan separados por punto y coma, luego cargar el array de producto con los objetos creados a partir de los datos del archivo 
//2agregar un cuadro de texto con el nombre del archivo en donde se van a guardar los datos 
//En ese nombre se guardaran los datos cargados en los cuadros de texto. Si el archivo existe primero moveremos el archivo ya existente a la carpeta backup cambiandole el nombre al nombre que tiene mas la fecha.
//3al leer si el archivo no existe informarlo.     
?>