<?php 
/**
 * 
 */
abstract class FiguraGeometrica 
{
    protected $_color;
    protected $_perimetro;
    protected $_superficie;

    function __construct($color,$num1,$num2)
    {
        $this->_color = $color; 
        $this->CalcularDatos($num1,$num2);
    }

    public function GetterColor()
    {
        return $this->_color;
    }

    public function SetterColor($color)
    {
        $this->_color = $color;
    }

     abstract public function Dibujar();
 

     abstract protected function CalcularDatos();
    

    public function ToString()
    {
        echo "El color es".$this->_color."<Br>";
        echo "El perimetro es".$this->_perimetro."<Br>";
        echo "La superficie es".$this->_superficie."<Br>";
    
        $this->Dibujar();
    
    }






}









?>