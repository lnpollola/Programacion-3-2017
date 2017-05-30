<?php
//Incluimos la clase AccesoDatos.php que no estaba. La copiamos desde la Carpeta Clases de Clase06
require "AccesoDatos.php";
class Vehiculo
{
//--------------------------------------------------------------------------------//
//--ATRIBUTOS
	private $Marca;
 	private $Modelo;
  	private $Tipo;
	private $Año;
	private $Precio;
//--------------------------------------------------------------------------------//

//--------------------------------------------------------------------------------//
//--GETTERS Y SETTERS
	public function GetMarca()
	{
		return $this->Marca;
	}
	public function GetModelo()
	{
		return $this->Modelo;
	}
	public function GetTipo()
	{
		return $this->Tipo;
	}
	public function GetAnio()
	{
		return $this->Año;
	}
	public function GetPrecio()
	{
		return $this->Precio;
	}

	public function SetMarca($valor)
	{
		$this->Marca = $valor;
	}
	public function SetModelo($valor)
	{
		$this->Modelo = $valor;
	}
	public function SetTipo($valor)
	{
		$this->Tipo = $valor;
	}
	public function SetAnio()
	{
		$this->Año = $valor;
	}
	public function SetPrecio()
	{
		$this->Precio = $valor;
	}

//--------------------------------------------------------------------------------//
//--CONSTRUCTOR
	public function __construct($Marca=NULL, $Modelo=NULL, $Tipo=NULL, $Año=NULL,$Precio=NULL)
	{
		if($Marca !== NULL && $Modelo !== NULL && $Tipo !== NULL && $Año !== NULL && $Precio !== NULL){
			$this->Marca = $Marca;
			$this->Modelo = $Modelo;
			$this->Tipo = $Tipo;
			$this->Año=$Año;
			$this->Precio=$Precio;
		}
	}

//--------------------------------------------------------------------------------//
//--TOSTRING	
  	public function ToString()
	{
	  	return $this->Marca." - ".$this->Modelo." - ".$this->Tipo." - ".$this->Año." - ".$this->precio."\r\n";
	}
//--------------------------------------------------------------------------------//

//--------------------------------------------------------------------------------//
//--METODOS DE CLASE
	public static function GuardarenTxt($obj)
	{
		$resultado = FALSE;
		if(!file_exists("Archivos"))
		{
			mkdir("Archivos",0777);
		}
		//ABRO EL ARCHIVO
		$ar = fopen("Archivos/vehiculos.txt", "a");
		
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
	public static function TraerTodosLosProductosTxt()
	{

		$ListaDeProductosLeidos = array();

		//leo todos los productos del archivo txt
		$archivo=fopen("Archivos/vehiculos.txt", "r");
		
		while(!feof($archivo))
		{
			$archAux = fgets($archivo);
			$productos = explode(" - ", $archAux);
			//http://www.w3schools.com/php/func_string_explode.asp
			$vehiculo[0] = trim($vehiculo[0]);
			if($productos[0] != ""){
				$ListaDeProductosLeidos[] = new Vehiculo($vehiculo[0], $vehiculo[1],$vehiculo[2],$vehiculo[3],$vehiculo[4]);
			}
		}
		fclose($archivo);
		
		return $ListaDeProductosLeidos;
		
	}
	public static function GuardarenBD($obj)
	{
		$objetoAcceso = AccesoDatos::DameUnObjetoAcceso();
		$consulta = $objetoAcceso->RetornarConsulta('INSERT INTO `rodados`(`pMarca`, `Modelo`, `Tipo`, `Año`, `Precio`) VALUES ($obj[0],$obj[1],$obj[2],$obj[3],$obj[4])');
		$consulta->Execute();//Es para ejecutar la consulta.
	}
	public static function TraerTodosLosProductosBD()
	{
		//http://localhost:8080/ProgramacionIII/Clase06/# aca tenemos los distintos tipos de fetch
		$arrayRetorno = array();
		//Este Metodo esta creado por nosotros este.
		$objetoAcceso = AccesoDatos::DameUnObjetoAcceso();
		$consulta = $objetoAcceso->RetornarConsulta('SELECT codigo_barra as codBarra, nombre, path_foto as pathFoto FROM `producto`');
		$consulta->Execute();//Es para ejecutar la consulta.
		// $datos =$consulta->fetchall();
		// $datos_2 = $consulta->fetch(PDO::FETCH_LAZY);
		// $datos_3 = $consulta -> fetchObject("producto");
		// var_dump($consulta);
		//	var_dump($datos);
		// var_dump($datos_2);
		 while ($fila = $consulta->fetchObject("Vehiculo")) //devuelve true o false depende si encuentra o no el objeto. 
		 //Sale cuando es false claramente.
		 {//FETCHOBJECT -> RETORNA UN OBJETO DE UNA CALSE DADA
              // var_dump($fila);
			 array_push($arrayRetorno,$fila);
		 }
		 
		 return $arrayRetorno;
		// var_dump($datos_3);
	}
//--------------------------------------------------------------------------------//
}