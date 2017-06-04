<?php
//Incluimos la clase AccesoDatos.php que no estaba. La copiamos desde la Carpeta Clases de Clase06
require "AccesoDatos.php";
class Usuario
{
//--------------------------------------------------------------------------------//
//--ATRIBUTOS
	private $Nombre;
 	private $Turno;
  	private $Password;
	private $Tipo;
	private $Estado;
//--------------------------------------------------------------------------------//
//--GETTERS Y SETTERS
	public function GetNombre()
	{
		return $this->Nombre;
	}
	public function GetTurno()
	{
		return $this->Turno;
	}
	public function GetPassword()
	{
		return $this->Password;
	}
	public function GetTipo()
	{
		return $this->Tipo;
	}
	public function GetEstado()
	{
		return $this->Estado;
	}


	public function SetNombre($valor)
	{
		$this->Nombre = $valor;
	}
	public function SetTurno($valor)
	{
		$this->Turno = $valor;
	}
	public function SetPassword($valor)
	{
		$this->Password = $valor;
	}
	public function SetTipo($valor)
	{
		$this->Tipo = $valor;
	}
	public function SetEstado($valor)
	{
		$this->Estado = $valor;
	}


//--------------------------------------------------------------------------------//
//--CONSTRUCTOR
	public function __construct( $Nombre=NULL, $Turno=NULL, $Password=NULL, $Tipo=NULL, $Estado=NULL)
	{
		if($Nombre !== NULL && $Turno !== NULL && $Password !== NULL && $Tipo !== NULL && $Estado !== NULL ){
			$this->Nombre = $Nombre;
			$this->Turno = $Turno;
			$this->Password = $Password;
			$this->Tipo = $Tipo;
			$this->Estado = $Estado;
		}
	}

//--------------------------------------------------------------------------------//
//--TOSTRING	
  	public function ToString()
	{
	  	return $this->Nombre." - ".$this->Turno." - ".$this->Password."\r\n";
	}
//--------------------------------------------------------------------------------//

//--------------------------------------------------------------------------------//
//--METODOS DE CLASE

	public static function Alta($obj)
	{
		$objetoAcceso = AccesoDatos::DameUnObjetoAcceso();
		$consulta = $objetoAcceso->RetornarConsulta('INSERT INTO `usuarios`(`nombre`, `Turno`, `Password`, `Tipo`,`Estado`) VALUES ($obj[0],$obj[1],$obj[2],$obj[3],$obj[4])');
		$consulta->Execute();
	}

	public static function Baja($aux)
	{
		$objetoAcceso = AccesoDatos::DameUnObjetoAcceso();
		$consulta = $objetoAcceso->RetornarConsulta('UPDATE `usuarios` SET `Estado`=0 WHERE `Nombre`=:Nombre ');
		$consulta->bindvalue(':Nombre', $aux , PDO::PARAM_STRING);
		$consulta->Execute();
	}

	public static function Modificacion($obj) //PATENTE, nro_cochera, Password 
	{
		$objetoAcceso = AccesoDatos::DameUnObjetoAcceso();
		$consulta = $objetoAcceso->RetornarConsulta('UPDATE `usuarios` SET `nombre`=$obj[0],`Password`=$obj[1],`Turno`=$obj[2],`Estado`=$obj[3]  WHERE `nombre`=:nombre ');
		$consulta->bindvalue(':nombre',$obj[0], PDO::PARAM_STRING); //ARREGLAR
		$consulta->Execute();
	}

	public static function TraerTodosLosusuarios()
	{
		$arrayRetorno = array();
		//Este Metodo esta creado por nosotros este.
		$objetoAcceso = AccesoDatos::DameUnObjetoAcceso();
		$consulta = $objetoAcceso->RetornarConsulta('SELECT nombre, `password`, tipo, turno, estado  FROM `usuarios`');
		$consulta->Execute();
		while ($fila = $consulta->fetchObject("usuario"))
		{
			 array_push($arrayRetorno,$fila);
		 }
		 
		 return $arrayRetorno;
	}

	public static function TraerUnUsuario($aux)
    {
        $objetoAcceso = AccesoDatos::DameUnObjetoAcceso();
        $consulta = $objetoAcceso->RetornarConsulta('SELECT nombre, `Password`, Tipo, Estado, Turno FROM usuarios WHERE nombre=:Nombre');
        $consulta->bindParam("nombre", $aux);
        $consulta->execute();
        $uno = $consulta->fetchAll();
         if($uno == NULL)
          {
              $uno=0;
              return $uno;
          }
        return $uno;
    }

    
	public static function ValidarUsuario($nombre)
	{
		
		if(Usuario::TraerUnUsuario($nombre) == 0)
		{
			echo "El usuario no existe";
		}
		else 
		{
			echo "El usuario existe";
		}
	}

	

//--------------------------------------------------------------------------------//
}