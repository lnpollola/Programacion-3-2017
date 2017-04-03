<?php

//include "Persona.php";
//include "Empleado.php";
include "Fabrica.php";


$empleada = new Empleado("Sofia","Bontempo",32956733,'F', 1234, 2000.00);

$empleada->ToString();

$fabrica = new Fabrica("Toto");

$fabrica->AgregarEmpleado($empleada);

$fabrica->ToString();

$fabrica->EliminarEmpleado($empleada);

$fabrica->ToString();








?>