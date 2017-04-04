<?php

   include "Producto.php";

   $producto = new Producto(123,"caramelo",2); 

   echo $producto->ToString();

   $archivo = fopen("producto.txt","w");

   fwrite($archivo,$producto->ToString());





?>