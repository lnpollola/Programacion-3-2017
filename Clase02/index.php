<?php

require "funciones.php";
//require "noexiste.php";

require_once "funciones.php";


//$resultado=sumar(1,3);


require "calculadora.php";

$resultado=Calculadora::sumar(1,3);

var_dump($resultado);

Calculadora::$atributoestatico = 10;

var_dump(Calculadora::$atributoestatico);

$miCalculadora = new Calculadora;
$miCalculadora->atributodeinstancia = 3;

var_dump($miCalculadora->atributodeinstancia);

?>