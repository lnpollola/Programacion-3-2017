<?php

$primerArray = array("Leandro","Julian","Chupan pitos");

var_dump($primerArray);
echo "<br>";

for($i=0;$i<5;$i++)
{
    $segundoArray[$i] = $i+1;
}

var_dump($segundoArray);

echo "<br>";

$tercerArray[0] = rand();
$tercerArray[33] = rand();
$tercerArray[34]  =rand();

// for($i=0;$i<40;$i++)
// {
//     echo $tercerArray[$i];
// }




var_dump($tercerArray);

echo "<br>";

$cuartoArray = array();
array_push($cuartoArray,rand(),"hola","chau");

var_dump($cuartoArray);

echo "<br>";

$quintoArray = array();

$quintoArray["nombre"] = "Damian";
$quintoArray["Apellido"] = "Vogel";
$quintoArray["Edad"] = 34;

var_dump($quintoArray);

echo "<br>";

$sextoArray = array(2=>3,4=>5);

var_dump($sextoArray);

?>