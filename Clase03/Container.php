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
         $archivo = fopen("productosconhtml.txt","w");

         foreach($this->producto as $key)
         {
             fwrite($archivo,$key->ToString());
             
         }

         fclose($archivo);

    }

    function LeerDeArchivo ()
    {
        $texto = $_POST["archivo"];
        
        $archivo = fopen($texto.".txt","r");
        
                    while(!feof($archivo))
                    {
                        $renglon = fgets($archivo,4096);

                        $nuevoArray = explode(";",$renglon);
                        if(!$nuevoArray[0]=="")
                        {
                        $this->AgregarProducto(new Producto($nuevoArray[0],$nuevoArray[1],$nuevoArray[2]));
                        }  
                    }
                        
            fclose($archivo);
    }

        
    

    }





//1 En la clase container crear el metodo leer de archivo,
// que lea de un archivo un listado de producto cuyos atributos 
// estan separados por punto y coma, luego cargar el array de producto 
// con los objetos creados a partir de los datos del archivo 


//2 agregar un cuadro de texto con el nombre del archivo
// en donde se van a guardar los datos 
// En ese nombre se guardaran los datos cargados en los 
// cuadros de texto. Si el archivo existe primero moveremos 
// el archivo ya existente a la carpeta backup cambiandole
// el nombre al nombre que tiene mas la fecha.



//3 al leer si el archivo no existe informarlo.     
//
    


?>    