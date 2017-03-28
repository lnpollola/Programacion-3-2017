<?php 

/**
 * 
 */
class Calculadora 
{
    

    public static function sumar($num1,$num2)
        {
            return $num1+$num2;
        }

    public static function resta($num1,$num2)
        {
            return $num1-$num2;
        }

    public static function multiplica($num1,$num2)
        {
            return $num1*$num2;
        }

    public static function divide($num1,$num2)
        {
            return $num1/$num2;
        }

    public static $atributoestatico;
    public $atributodeinstancia;
}


?>