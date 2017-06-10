<?php

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
		$consulta = $objetoAcceso->RetornarConsulta('INSERT INTO `usuarios`(`nombre`, `turno`, `password`, `tipo`,`estado`) VALUES ($obj[0],$obj[1],$obj[2],$obj[3],$obj[4])');
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
		$objetoAcceso = AccesoDatos::DameUnObjetoAcceso();
		$consulta = $objetoAcceso->RetornarConsulta('SELECT nombre, `password`, tipo, turno, estado  FROM `usuarios`');
		$consulta->Execute();
		while ($fila = $consulta->fetchObject("Usuario"))
		{
			 array_push($arrayRetorno,$fila);
		 }
		 
		 return $arrayRetorno;
	}
	public static function TraerUnUsuario($aux)
    {
        $objetoAcceso = AccesoDatos::DameUnObjetoAcceso();
        $consulta = $objetoAcceso->RetornarConsulta('SELECT nombre, `password`, tipo, estado, turno FROM usuarios WHERE nombre=:nombre');
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
    
	public static function ValidarUsuario($nombre,$password)
	{
        
         $objetoAcceso = AccesoDatos::DameUnObjetoAcceso();
         $consulta = $objetoAcceso->RetornarConsulta('SELECT nombre FROM usuarios WHERE nombre=:nombre');            
            $consulta->bindParam("nombre",$nombre);
            $consulta->execute();
            $uno= $consulta->fetchAll();

            if($uno == NULL)
            {
                $rta= "El usuario no existe";
            }
            else if($uno == TRUE )
            {
                $objetoAcceso2 = AccesoDatos::DameUnObjetoAcceso();
                $consulta2 = $objetoAcceso2->RetornarConsulta('SELECT nombre, `password` FROM usuarios WHERE nombre=:nombre AND `password`=:pass');
                $consulta2->bindParam("nombre",$nombre);
                $consulta2->bindParam("pass",$password);
                $consulta2->execute();
                $dos= $consulta2->fetchAll();
                
                if($dos == TRUE)
                {
                    $rta= "Bienvenido"." ".$nombre; 
                        // $objetoAcceso3 = AccesoDatos::DameUnObjetoAcceso();                  
                        // $consulta3 = $objetoAcceso3->RetornarConsulta('INSERT INTO `logs`(`TIMESTAMP_LOGIN`, `TIPO_INGRESO`, `USUARIO_INGRESADO`, `PASSWORD_INGRESADO`) VALUES (NOW,"EMP",$nombre,`$password`)');
                        // $consulta3->execute();
                        //HASTA ACA LLEGUE, ESTO NO FUNCIONA
                }
                else
                {
                    $rta= "Contraseña incorrecta";
                }
            }
                
               
        
        return $rta;
	}
	
//--------------------------------------------------------------------------------//
}