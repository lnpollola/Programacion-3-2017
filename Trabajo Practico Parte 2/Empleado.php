<?php

include "Persona.php";

Class Empleado Extends Persona{

	protected $_legajo;
	protected $_sueldo;
	protected $_pathFoto;

	public function __construct ($nombre, $apellido, $dni, $sexo, $legajo, $sueldo, $pathRuta)
	{
		parent::__construct($nombre,$apellido,$dni,$sexo);
		$this->_legajo = $legajo;
		$this->_sueldo = $sueldo;
		$this->_pathFoto = $pathRuta;

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

	function getPathFoto()
	{
		return $this->_pathFoto;
	}

	function setPathFoto($path)
	{
		$this->_pathFoto = $path;
	}

	 function ToString()
	{ 	
		return Parent::ToString().";".$this->getLegajo().";".$this->getSueldo().";".$this->getPathFoto();
		//echo "<img source= "	
	 }






}





















?>