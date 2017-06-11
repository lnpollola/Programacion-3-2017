<?php
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

require __DIR__.'/vendor/autoload.php';
require __DIR__.'/clases/AccesoDatos.php';
require __DIR__.'/clases/cd.php';

$config['displayErrorDetails'] = true;
$config['addContentLengthHeader'] = false;
/*

¡La primera línea es la más importante! A su vez en el modo de 
desarrollo para obtener información sobre los errores
 (sin él, Slim por lo menos registrar los errores por lo que si está utilizando
  el construido en PHP webserver, entonces usted verá en la salida de la consola 
  que es útil).

  La segunda línea permite al servidor web establecer el encabezado Content-Length, 
  lo que hace que Slim se comporte de manera más predecible.
*/

$app = new \Slim\App(["settings" => $config]);

$app->get('/', function (Request $request, Response $response) {
  
    $response->getBody()->write("Hola Slim");

    return $response;
});
$app->get('/saludar[/]', function (Request $request, Response $response) {
  
    $response->getBody()->write("Hola Slim");

    return $response;
});

$app->get('/saludar/{nombre}', function (Request $request, Response $response) {
    
    $nombre = $request->getAttribute('nombre');
    $response->getBody()->write("bienvenido, $nombre");

    return $response;
});

$app->post('/mostraralta', function (Request $request, Response $response) {
    
<<<<<<< HEAD
    echo "Hola";
=======
    //echo "Hola";
>>>>>>> refs/remotes/DamianVogel/master
	
	//$nombre = $request->getAttribute('nombre');
    $response->getBody()->write("Bienvenido FaiveL");

    return $response;
});





<<<<<<< HEAD
=======
//Registrarse
$app->post('/mostrarlogin', function (Request $request, Response $response) {
    
   	include ("partes/formLogin.php"); //abre el formulario de login
   
});

$app->post('/validarusuario', function (Request $request, Response $response) {

 $ArrayDeParametros = $request->getParsedBody();  

 session_start();
 $usuario=$ArrayDeParametros['usuario'];
 $clave=$ArrayDeParametros['clave'];
 $recordar=$ArrayDeParametros['recordarme'];

			$objetoAcceso = AccesoDatos::DameUnObjetoAcceso();
            $consulta = $objetoAcceso->RetornarConsulta('SELECT mail, password FROM usuarios WHERE mail=:mail');
            $consulta->bindParam("mail",$usuario);
            $consulta->execute();

			$resultado = $consulta->fetchAll();

if($resultado == TRUE)
{
	if($recordar=="true")
					{
						setcookie("registro",$usuario,  time()+36000 , '/');
						
					}else
					{
						setcookie("registro",$usuario,  time()-36000 , '/');
						
					}
						$_SESSION['registrado']=$usuario;
						$retorno=" ingreso";

}else
		{
			$retorno= "No-esta";
		}


});

>>>>>>> refs/remotes/DamianVogel/master

$app->post('/cd[/]', function (Request $request, Response $response) {
  
  	$destino="./fotos/";
  	$ArrayDeParametros = $request->getParsedBody();
  	var_dump($ArrayDeParametros);
  	$titulo= $ArrayDeParametros['titulo'];
  	$cantante= $ArrayDeParametros['cantante'];
  	$año= $ArrayDeParametros['anio'];
  	
  	$micd = new cd();
  	$micd->titulo=$titulo;
  	$micd->cantante=$cantante;
  	$micd->año=$año;
  	$micd->InsertarElCdParametros();

  	$archivos = $request->getUploadedFiles();
  	//var_dump($ArrayDeParametros);
  	//var_dump($archivos);
  	//var_dump($archivos['foto']);


	$nombreAnterior=$archivos['foto']->getClientFilename();
	$extension= explode(".", $nombreAnterior)  ;
	//var_dump($nombreAnterior);
	$extension=array_reverse($extension);

  	$archivos['foto']->moveTo($destino.$titulo.".".$extension[0]);
    $response->getBody()->write("cd");

    return $response;

});

<<<<<<< HEAD
=======
$app->post('/desloguear', function (Request $request, Response $response) {
    
   	session_start();

	$_SESSION['registrado']=null;

	session_destroy();
   
});

>>>>>>> refs/remotes/DamianVogel/master
$app->run();