<?php
//Incluimos la clase AccesoDatos.php que no estaba. La copiamos desde la Carpeta Clases de Clase06
require "AccesoDatos.php";
class Vehiculo
{
//--------------------------------------------------------------------------------//
//--ATRIBUTOS
	private $Marca;
 	private $Patente;
  	private $Color;
	private $Estado
//--------------------------------------------------------------------------------//
//--GETTERS Y SETTERS
	public function GetMarca()
	{
		return $this->Marca;
	}
	public function GetPatente()
	{
		return $this->Patente;
	}
	public function GetColor()
	{
		return $this->Color;
	}
	public function GetEstado()
	{
		return $this->Estado;
	}

	public function SetMarca($valor)
	{
		$this->Marca = $valor;
	}
	public function SetPatente($valor)
	{
		$this->Patente = $valor;
	}
	public function SetColor($valor)
	{
		$this->Color = $valor;
	}
	public function SetEstado($valor)
	{
		$this->Estado = $valor;
	}


//--------------------------------------------------------------------------------//
//--CONSTRUCTOR
	public function __construct($Marca=NULL, $Patente=NULL, $Color=NULL, $Estado=NULL)
	{
		if($Marca !== NULL && $Patente !== NULL && $Color !== NULL && $Estado !== NULL ){
			$this->Marca = $Marca;
			$this->Patente = $Patente;
			$this->Color = $Color;
			$this->Estado = $Estado;
		}
	}

//--------------------------------------------------------------------------------//
//--TOSTRING	
  	public function ToString()
	{
	  	return $this->Marca." - ".$this->Patente." - ".$this->Color."\r\n";
	}
//--------------------------------------------------------------------------------//

//--------------------------------------------------------------------------------//
//--METODOS DE CLASE

	public static function Alta($obj)
	{
		$objetoAcceso = AccesoDatos::DameUnObjetoAcceso();
		$consulta = $objetoAcceso->RetornarConsulta('INSERT INTO `vehiculos`(`Patente`, `Color`, `Marca`,`Estado`) VALUES ($obj[0],$obj[1],$obj[2],`HABILITADO`)');
		$consulta->Execute();
	}

	public static function Baja($aux)
	{
		$objetoAcceso = AccesoDatos::DameUnObjetoAcceso();
		$consulta = $objetoAcceso->RetornarConsulta('UPDATE `vehiculos` SET `estado`=[DESHABILITADO] WHERE `patente`=:patente ');
		$consulta->bindvalue(':patente', $aux , PDO::PARAM_STRING);
		$consulta->Execute();
	}

	public static function Modificacion($obj) //PATENTE, MARCA, COLOR 
	{
		$objetoAcceso = AccesoDatos::DameUnObjetoAcceso();
		$consulta = $objetoAcceso->RetornarConsulta('UPDATE `vehiculos` SET `patente`=$obj[0],`marca`=$obj[1],`color`=$obj[2] WHERE `patente`=:patente ');
		$consulta->bindvalue(':patente',$obj[0], PDO::PARAM_STRING);
		$consulta->Execute();
	}

	public static function TraerTodosLosVehiculos()
	{
		$arrayRetorno = array();
		//Este Metodo esta creado por nosotros este.
		$objetoAcceso = AccesoDatos::DameUnObjetoAcceso();
		$consulta = $objetoAcceso->RetornarConsulta('SELECT patente , marca, color, estado  FROM `vehiculos`');
		$consulta->Execute();
		while ($fila = $consulta->fetchObject("Vehiculo")) //devuelve true o false depende si encuentra o no el objeto. 
		 {
			 array_push($arrayRetorno,$fila);
		 }
		 
		 return $arrayRetorno;
	}

	public static function TraerUnVehiculo($aux)
    {
        $objetoAcceso = AccesoDatos::DameUnObjetoAcceso();
        $consulta = $objetoAcceso->RetornarConsulta('SELECT patente , marca, color, estado FROM usuario WHERE patente=:patente');
        $consulta->bindParam("patente", $aux);
        $consulta->execute();
        $uno = $consulta->fetchAll();
         if($uno == NULL)
          {
              $uno="no existe";
              return $uno;
          }
        return $uno;
    }
//--------------------------------------------------------------------------------//
}