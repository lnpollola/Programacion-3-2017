<?php 

include "aplicacion15.php";

/**
 * 
 */
class Rectangulo extends FiguraGeometrica
{
    private $_ladoDos;
    private $_ladoUno;

    function __construct($num1,$num2)
    {
        $this->_ladoDos = $num1;
        $this->_ladoUno = $num2;
        $this->CalcularDatos();
        
    }

    protected function CalcularDatos()
    {
        $this->_perimetro = ($this->_ladoDos*2)+($this->_ladoUno*2);
        $this->_superficie = ($this->_ladoUno*$this->_ladoDos);
    }

    public function Dibujar()
    {
        echo "*********<Br>";
        echo "*********<Br>";
        echo "*********<Br>";

    }



}


$rectangulo = new Rectangulo(2,4);
$rectangulo->SetterColor("Verde");
$rectangulo->ToString();



?>