<?php
require_once "AccesoDatos.php";
class Vehiculo
{
//--------------------------------------------------------------------------------//
//--ATRIBUTOS
	private $MARCA;
 	private $PATENTE;
  	private $COLOR;
	private $ESTADO;
//--------------------------------------------------------------------------------//

//--------------------------------------------------------------------------------//
//--GETTERS Y SETTERS
	public function GetMarca()
	{
		return $this->MARCA;
	}
	public function GetPatente()
	{
		return $this->PATENTE;
	}
	public function GetColor()
	{
		return $this->COLOR;
	}
	public function GetEstado()
	{
		return $this->ESTADO;
	}
	public function SetMarca($valor)
	{
		$this->MARCA = $valor;
	}
	public function SetPatente($valor)
	{
		$this->PATENTE = $valor;
	}
	public function SetColor($valor)
	{
		$this->COLOR = $valor;
	}
	public function SetEstado($valor)
	{
		$this->ESTADO = $valor;
	}
//--------------------------------------------------------------------------------//
//--CONSTRUCTOR
	public function __construct($MARCA=NULL, $PATENTE=NULL, $COLOR=NULL, $ESTADO)
	{
		if($MARCA !== NULL && $PATENTE !== NULL && $COLOR !== NULL){
			$this->MARCA = $MARCA;
			$this->PATENTE = $PATENTE;
			$this->COLOR = $COLOR;
			$this->ESTADO = $ESTADO;
		}
	}

//--------------------------------------------------------------------------------//
//--TOSTRING	
  	public function ToString()
	{
	  	return $this->MARCA." - ".$this->PATENTE." - ".$this->COLOR." - ".$this->ESTADO."\r\n";
	}
//--------------------------------------------------------------------------------//

//--------------------------------------------------------------------------------//
//--METODOS DE CLASE
	
	public static function Alta($obj)
	{
		$objetoAcceso = AccesoDatos::DameUnObjetoAcceso();
		$consulta = $objetoAcceso->RetornarConsulta('INSERT INTO `vehiculos`(`PATENTE`, `COLOR`, `MARCA`, `ESTADO`) VALUES ($obj[0],$obj[1],$obj[2],"HABILITADO")');
		$consulta->Execute();
	}

	public static function Baja($aux)
	{
		$objetoAcceso = AccesoDatos::DameUnObjetoAcceso();
		$consulta = $objetoAcceso->RetornarConsulta('UPDATE `vehiculos` SET `ESTADO`=["DESHABILITADO"] WHERE PATENTE=:patente');
		$consulta->bindvalue(':patente',$aux, PDO::PARAM_STRING);
		$consulta->Execute();
	}
	public static function Modificacion($obj)
	{
		$objetoAcceso = AccesoDatos::DameUnObjetoAcceso();
		$consulta = $objetoAcceso->RetornarConsulta('UPDATE `vehiculos` SET `PATENTE`=["$obj[0]"] COLOR=["$obj[1]"] MARCA=["obj[2]"] WHERE PATENTE=:patente');
		$consulta->bindvalue(':patente',$aux, PDO::PARAM_STRING);
		$consulta->Execute();


	}

	public static function TraerTodosLosVehiculos()
	{
		
		$arrayRetorno = array();
		$objetoAcceso = AccesoDatos::DameUnObjetoAcceso();
		$consulta = $objetoAcceso->RetornarConsulta('SELECT PATENTE, COLOR, MARCA, ESTADO FROM `vehiculos`');
		$consulta->Execute();
		 while ($fila = $consulta->fetchObject("Vehiculo"))
		 {
			 array_push($arrayRetorno,$fila);
		 }
		 
		 return $arrayRetorno;
	}
	public static function TraerUnVehiculo($aux)
	{
		$objetoAcceso = AccesoDatos::DameUnObjetoAcceso();
        $consulta = $objetoAcceso->RetornarConsulta('SELECT PATENTE, COLOR, MARCA, ESTADO FROM vehiculos WHERE PATENTE=:patente');
        $consulta->bindParam("patente", $aux);
        $consulta->execute();
        $uno = $consulta->fetchAll();
         if($uno == NULL)
          {
              $uno="No existe";
              return $uno;
          }
        return $uno;
	}
//--------------------------------------------------------------------------------//
}