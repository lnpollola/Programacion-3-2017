<?php

   //include "Producto.php";
   include "Container.php";

   $producto = new Producto(123,"caramelo",2); 

   echo $producto->ToString();

   $archivo = fopen("producto.txt","w");

   fwrite($archivo,$producto->ToString());

   $container = new Container("SUDU1102198");

   for($i = 0; $i < 10;$i++)
   {
       $container->AgregarProducto(new Producto($i,"lala",$i+1));
   }

   var_dump($container->producto);

   $container->GuardarProductos();

?>