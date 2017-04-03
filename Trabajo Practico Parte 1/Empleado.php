<?php

include "Persona.php";

Class Empleado Extends Persona{

	protected $_legajo;
	protected $_sueldo;

	public function __construct ($nombre, $apellido, $dni, $sexo, $legajo, $sueldo)
	{
		parent::__construct($nombre,$apellido,$dni,$sexo);
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
		echo Parent::ToString();
		echo  "Legajo: "    .$this->getLegajo()    ." - ".
				"Sueldo: "    .$this->getSueldo()    ."<Br>";

	 }






}





















?>