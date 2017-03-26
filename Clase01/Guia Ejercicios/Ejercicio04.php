<?php 

$operador = "/";

$op=2;
$op2=4;

$aux = 0;
switch($operador)
		{
			case 'x':
						$aux= $op * $op2;
						break;

			case '+':
						$aux = $op + $op2;
						break;

			case '-':
						$aux = $op - $op2;
						break;

			case '/':
						$aux = $op / $op2; 
						break;
		}

echo "El Resultado es ".$aux;

?>