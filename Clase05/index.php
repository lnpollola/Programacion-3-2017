<?php

$conexion = mysqli_connect("localhost","root","","ejemplouno");

//var_dump($conexion);

$consultatext = "Select * from usuario";

$consulta = mysqli_query($conexion, $consultatext);

//var_dump($consulta);

$retorno = mysqli_fetch_object($consulta);

var_dump($retorno);

mysqli_close($conexion);

//Ver repositorio de PDO de Octavio y practicar (EjemploPDO)

//agregar boton y modificacion via JS en los TP

//Hacer ABM en 

//falta agregar los envios!


?>