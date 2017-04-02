<?php

abstract Class Persona{

	protected $_apellido;
	protected $_dni;
	protected $_nombre;
	protected $_sexo;

	function _construct(string $nombre, string $apellido, int $dni, string $sexo)
	{
		$this->_apellido = $apellido;
		$this->_nombre = $nombre;
		$this->_dni= $dni;
		$this->_sexo=$sexo;
		

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
		echo $this->_nombre;
	}

	 function getSexo()
	{
		return $this->_sexo;
	}

	abstract function Hablar(string $idioma);

	 function ToString()
	{
		// echo "Nombre: ".$this->getNombre()."<Br>";
		// echo "Apellido: ".$this->getApellido()."<Br>";
		// echo "Sexo: ".$this->getSexo()."<Br>";
		// echo "DNI: ".$this->getDni()."<Br>";

		
	}


}








?>