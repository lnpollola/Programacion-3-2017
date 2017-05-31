<?php

require_once "AccesoDatos.php";

class Producto
{
//--------------------------------------------------------------------------------//
//--ATRIBUTOS
	private $codBarra;
 	private $nombre;
  	private $pathFoto;
//--------------------------------------------------------------------------------//

//--------------------------------------------------------------------------------//
//--GETTERS Y SETTERS
	public function GetCodBarra()
	{
		return $this->codBarra;
	}
	public function GetNombre()
	{
		return $this->nombre;
	}
	public function GetPathFoto()
	{
		return $this->pathFoto;
	}

	public function SetCodBarra($valor)
	{
		$this->codBarra = $valor;
	}
	public function SetNombre($valor)
	{
		$this->nombre = $valor;
	}
	public function SetPathFoto($valor)
	{
		$this->pathFoto = $valor;
	}

//--------------------------------------------------------------------------------//
//--CONSTRUCTOR
	public function __construct($codBarra=NULL, $nombre=NULL, $pathFoto=NULL)
	{
		if($codBarra !== NULL && $nombre !== NULL && $pathFoto !== NULL){
			$this->codBarra = $codBarra;
			$this->nombre = $nombre;
			$this->pathFoto = $pathFoto;
		}
	}

//--------------------------------------------------------------------------------//
//--TOSTRING	
  	public function ToString()
	{
	  	return $this->codBarra." - ".$this->nombre." - ".$this->pathFoto."\r\n";
	}
//--------------------------------------------------------------------------------//

//--------------------------------------------------------------------------------//
//--METODOS DE CLASE
	public static function Guardar($obj)
	{
		$resultado = FALSE;
		
		//ABRO EL ARCHIVO
		$ar = fopen("archivos/productos.txt", "a");
		
		//ESCRIBO EN EL ARCHIVO
		$cant = fwrite($ar, $obj->ToString());
		
		if($cant > 0)
		{
			$resultado = TRUE;			
		}
		//CIERRO EL ARCHIVO
		fclose($ar);
		
		return $resultado;
	}
	public static function TraerTodosLosProductos()
	{

		$ListaDeProductosLeidos = array();

		//leo todos los productos del archivo
		$archivo=fopen("archivos/productos.txt", "r");
		
		while(!feof($archivo))
		{
			$archAux = fgets($archivo);
			$productos = explode(" - ", $archAux);
			//http://www.w3schools.com/php/func_string_explode.asp
			$productos[0] = trim($productos[0]);
			if($productos[0] != ""){
				$ListaDeProductosLeidos[] = new Producto($productos[0], $productos[1],$productos[2]);
			}
		}
		fclose($archivo);
		
		return $ListaDeProductosLeidos;
		
	}

	public static function TraerTodosLosProductosBD()
	{
		$arrayRetorno = array();

		$_objetoAcceso = AccesoDatos::DameUnObjetoAcceso(); 
		$consulta = $_objetoAcceso->RetornarConsulta("SELECT codigo_barra as codBarra, nombre, path_foto as pathFoto FROM producto"); 
		 $consulta->execute();
		// $datos =$consulta->fetchall();
		// $datos_2 = $consulta->fetch(PDO::FETCH_LAZY);
		// $datos_3 = $consulta -> fetchObject("producto");

		// var_dump($consulta);
		//	var_dump($datos);
		// var_dump($datos_2);
		 while ($fila = $consulta->fetchObject("producto")) //devuelve true o false depende si encuentra o no el objeto
		 {//FETCHOBJECT -> RETORNA UN OBJETO DE UNA CALSE DADA
            //    var_dump($fila);
			 array_push($arrayRetorno,$fila);
		 }
		 
		 return $arrayRetorno;
		// var_dump($datos_3);
	}
//--------------------------------------------------------------------------------//
}