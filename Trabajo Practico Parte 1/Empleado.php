<?php

include "Persona.php";

Class Empleado Extends Persona{

	protected $_legajo;
	protected $_sueldo;

	public function __construct (string $nombre, string $apellido, int $dni, string $sexo, int $legajo, float $sueldo)
	{
		$this->_legajo = $legajo;
		$this->_sueldo = $sueldo;
	}

	function getLegajo(){
			return $this->_legajo;
	}


	function getSueldo(){
			return $this->_sueldo;
	}

	function Hablar(string $idioma)
	{
		echo "El empleado habla ".$idioma;
	}

	 function ToString()
	{ 	
		echo "Nombre: ".$this->getNombre()."<Br>";
		echo "Apellido: ".$this->getApellido()."<Br>";
		echo "Sexo: ".$this->getSexo()."<Br>";
		echo "DNI: ".$this->getDni()."<Br>";
		echo "Sueldo: ".$this->getSueldo()."<Br>";
	 	echo "Legajo: ".$this->getLegajo()."<Br>";
	 }






}





















?>