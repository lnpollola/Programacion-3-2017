<?php

abstract Class Persona{

	private $_apellido;
	private $_dni;
	private $_nombre;
	private $_sexo;

	function __construct($nombre, $apellido, $dni, $sexo)
	{
		$this->_apellido = $apellido;
		$this->_nombre = $nombre;
		$this->_dni = $dni;
		$this->_sexo = $sexo;		
	}

	 function getApellido()
	{
		return $this->_apellido;
	}

	 function getDni()
	{
		return $this->_dni;
	}

	 function getNombre()
	{
		return $this->_nombre;
	}

	 function getSexo()
	{
		return $this->_sexo;
	}

	abstract function Hablar(string $idioma);

	 function ToString()
	{
		return  "<br>Apellido: ".$this->getApellido()." - ".
                    "Nombre: "  .$this->getNombre()  ." - ".
                    "Dni: "     .$this->getDni()     ." - ".
                    "Sexo: "    .$this->getSexo()    ." - ";
		
	}


}








?>