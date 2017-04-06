<?php

include "Empleado.php";

class Fabrica
{
	private $_empleados;
	private $_razonSocial;

	function __construct($razonSocial)
	{
		$this->_empleados = array();
		$this->_razonSocial = $razonSocial;

	}

	function AgregarEmpleado(Empleado $persona)
	{	
		array_push($this->_empleados, $persona);
	}

	function CalcularSueldos()
	{
		$acum = 0;

		foreach ($this->_empleados as $key)
			 {
				$acum += $key->getSueldo();
			 }
	
		echo "El total de sueldos es: ".$acum;
	}


	function ToString ()
	{
		echo "La empresa es: ".$this->_razonSocial."<Br>";
		
		foreach ($this->_empleados as $key) {
			$key->ToString();
		}

		$this->CalcularSueldos();
	}

	function EliminarEmpleado(Empleado $persona)
	{
		$index = array_search($persona, $this->_empleados);

		 if(false !== $index)	
		 {
			unset($this->_empleados[$index]);
			$arrayReindexado = array_values($this->_empleados);
			$this->_empleados = $arrayReindexado;
		 }	

	}

	function EliminarEmpleadosRepetidos ()
	{
		$array = array_unique($this->_empleados,SORT_REGULAR);
		$this->_empleados = $array;
	}



}





?>