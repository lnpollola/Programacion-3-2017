<?php

require_once "AccesoDatos.php";
class Piso
{
//--------------------------------------------------------------------------------//
//--ATRIBUTOS
	private $ID_PISO;
    private $HABILITADO;
//--------------------------------------------------------------------------------//

//--------------------------------------------------------------------------------//
//--GETTERS Y SETTERS
	public function GetId_Piso()
	{
		return $this->ID_PISO;
	}
	public function GetHabilitado()
	{
		return $this->HABILITADO;
	}
	
	public function SetId_Piso($valor)
	{
		$this->ID_PISO = $valor;
	}
	public function SetHabilitado($valor)
	{
		$this->PATENTE = $valor;
	}
//--------------------------------------------------------------------------------//
//--CONSTRUCTOR
	public function __construct($ID_PISO=NULL, $HABILITADO=NULL)
	{
		if($ID_PISO !== NULL && $HABILITADO !== NULL){
			$this->ID_PISO = $ID_PISO;
			$this->HABILITADO = $HABILITADO;
		}
	}

//--------------------------------------------------------------------------------//
//--TOSTRING	
  	public function ToString()
	{
	  	return $this->ID_PISO." - ".$this->HABILITADO."\r\n";
	}
//--------------------------------------------------------------------------------//

//--------------------------------------------------------------------------------//
//--METODOS DE CLASE
	
	public static function Alta($obj)
	{
		$objetoAcceso = AccesoDatos::DameUnObjetoAcceso();
		$consulta = $objetoAcceso->RetornarConsulta('INSERT INTO `pisos`(`HABILITADO`) VALUES (1)');
		$consulta->Execute();
	}

	public static function Baja($aux)
	{
		$objetoAcceso = AccesoDatos::DameUnObjetoAcceso();
		$consulta = $objetoAcceso->RetornarConsulta('UPDATE `pisos` SET `HABILITADO`=[0] WHERE ID_PISO=:id_piso');
		$consulta->bindvalue(':id_piso',$aux, PDO::PARAM_INT);
		$consulta->Execute();
	}

	public static function TraerTodosLosPisos()
	{
		
		$arrayRetorno = array();
		$objetoAcceso = AccesoDatos::DameUnObjetoAcceso();
		$consulta = $objetoAcceso->RetornarConsulta('SELECT ID_PISO, HABILITADO FROM `pisos`');
		$consulta->Execute();
		 while ($fila = $consulta->fetchObject("Piso"))
		 {
			 array_push($arrayRetorno,$fila);
		 }
		 
		 return $arrayRetorno;
	}
	public static function TraerUnPiso($aux)
	{
		$objetoAcceso = AccesoDatos::DameUnObjetoAcceso();
        $consulta = $objetoAcceso->RetornarConsulta('SELECT ID_PISO, HABILITADO FROM pisos WHERE ID_PISO=:id_pisos');
        $consulta->bindParam("id_pisos", $aux);
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