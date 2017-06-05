<?php

require_once "AccesoDatos.php";
class Cochera
{
//--------------------------------------------------------------------------------//
//--ATRIBUTOS
	private $NRO_COCHERA;
    private $RESERVADA;
 	private $TIPO;
	private $ESTADO;
    private $HABILITADA;
//--------------------------------------------------------------------------------//

//--------------------------------------------------------------------------------//
//--GETTERS Y SETTERS
    public function GetNroCochera()
    {
        return $this->NRO_COCHERA;
    }
	public function GetReservada()
	{
		return $this->RESERVADA;
	}
	public function GetTipo()
	{
		return $this->TIPO;
	}
	public function GetEstado()
	{
		return $this->ESTADO;
	}
    public function GetHabilitada()
	{
		return $this->HABILITADA;
	}
    public function SetNroCochera($valor)
	{
		$this->NRO_COCHERA = $valor;
	}

	public function SetReservada($valor)
	{
		$this->RESERVADA = $valor;
	}
	public function SetTipo($valor)
	{
		$this->TIPO = $valor;
	}
    public function SetEstado($valor)
	{
		$this->ESTADO = $valor;
	}
     public function SetHabilitada($valor)
	{
		$this->HABILITADA = $valor;
	}
//--------------------------------------------------------------------------------//
//--CONSTRUCTOR
	public function __construct($NRO_COCHERA=NULL,$RESERVADA=NULL, $TIPO=NULL,$ESTADO=NULL,$HABILITADA=NULL)
	{
		if($NRO_COCHERA=NULL && $RESERVADA !== NULL && $TIPO !== NULL && $ESTADO !==NULL && $HABILITADA !==NULL){
			$this->NRO_COCHERA = $NRO_COCHERA;
            $this->RESERVADA = $RESERVADA;
			$this->TIPO = $TIPO;
			$this->ESTADO = $ESTADO;
            $this->HABILITADA = $HABILITADA;
		}
	}

//--------------------------------------------------------------------------------//
//--TOSTRING	
  	public function ToString()
	{
	  	return $this->NRO_COCHERA." - ".$this->RESERVADA." - ".$this->TIPO." - ".$this->ESTADO."\r\n";
	}
//--------------------------------------------------------------------------------//

//--------------------------------------------------------------------------------//
//--METODOS DE CLASE
	
	public static function Alta($obj)
	{
		$objetoAcceso = AccesoDatos::DameUnObjetoAcceso();
		$consulta = $objetoAcceso->RetornarConsulta('INSERT INTO `cocheras`(`NRO_COCHERA`, `RESERVADA`, `TIPO`, `ESTADO`,`HABILITADA`) VALUES ($obj[0],$obj[1],$obj[2],"DISPONIBLE","1")');
		$consulta->Execute();
	}

	public static function BajaCochera($aux)
	{
		$objetoAcceso = AccesoDatos::DameUnObjetoAcceso();
		$consulta = $objetoAcceso->RetornarConsulta('UPDATE `cocheras` SET `HABILITADA`=[0] WHERE NRO_COCHERA=:nro_cochera');
		$consulta->bindvalue(':nro_cochera',$aux, PDO::PARAM_INT);
		$consulta->Execute();
	}
    public static function BajaEstadoCochera($aux)
    {
        $objetoAcceso = AccesoDatos::DameUnObjetoAcceso();
		$consulta = $objetoAcceso->RetornarConsulta('UPDATE `cocheras` SET `ESTADO`=[OCUPADA] WHERE NRO_COCHERA=:nro_cochera');
		$consulta->bindvalue(':nro_cochera',$aux, PDO::PARAM_INT);
		$consulta->Execute();

    }
    
	public static function Modificacion($obj)
	{
		$objetoAcceso = AccesoDatos::DameUnObjetoAcceso();
		$consulta = $objetoAcceso->RetornarConsulta('UPDATE `cocheras` SET `NRO_COCHERA`=["$obj[0]"] RESERVADA=["$obj[1]"] TIPO=["obj[2]"] HABILITADA=["obj[3]"] WHERE NRO_COCHERA=:nro_cochera');
		$consulta->bindvalue(':nro_cochera',$aux, PDO::PARAM_INT);//ARREGLAAR DOBLE NROCOCHERA
		$consulta->Execute();


	}

	public static function TraerTodasLasCocheras()
	{
		
		$arrayRetorno = array();
		$objetoAcceso = AccesoDatos::DameUnObjetoAcceso();
		$consulta = $objetoAcceso->RetornarConsulta('SELECT NRO_COCHERA, RESERVADA, TIPO, ESTADO, HABILITADA  FROM `cocheras`');
		$consulta->Execute();
		 while ($fila = $consulta->fetchObject("Cochera"))
		 {
			 array_push($arrayRetorno,$fila);
		 }
		 
		 return $arrayRetorno;
	}
	public static function TraerUnaCochera($aux)
	{
		$objetoAcceso = AccesoDatos::DameUnObjetoAcceso();
        $consulta = $objetoAcceso->RetornarConsulta('SELECT NRO_COCHERA, RESERVADA, TIPO, ESTADO,HABILITADA  FROM cocheras WHERE NRO_COCHERA=:nro_cochera');
        $consulta->bindParam("nro_cochera", $aux);
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