<?php
include "Producto.php";
class Container 
{
    public $numero;
    public $producto;

    function __construct($num)
    {
        $this->numero = $num;
        $this->producto = array(); 
    }

    function AgregarProducto (Producto $prod)
    {
        array_push($this->producto,$prod);
    }

    function GuardarProductos()
    {
         $archivo = fopen("ListadodeProducto.txt","w");

         foreach($this->producto as $key)
         {
             fwrite($archivo,$key->ToString());
             
         }

         fclose($archivo);

    }




}



    


?>    