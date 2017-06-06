<?php

require __DIR__.'/vendor/autoload.php';
require __DIR__.'/clases/usuario.php';
require __DIR__.'/clases/AccesoDatos.php';

$app = new \Slim\App;
    
//USUARIO
$app->get('/traertodosUsuarios', function ($request, $response) {
    $usuarios = Usuario::TraerTodosLosusuarios();
    return $response->withJson($usuarios);
});

$app->get('/traerunusuario/[{id}]', function ($request, $response, $args) {
          $uno = Usuario::TraerUnUsuario($args['id']);
          return $response->withJson($uno);
        });

$app->get('/validarusuario', function ($request, $response) {
         
          $obj = isset($_GET['usuario']) ? json_decode(json_encode($_GET['usuario'])) : NULL;
          $rta = Usuario::ValidarUsuario($obj->usuarioid,$obj->passwordid);
         // var_dump($rta);
          return $response->withJson($rta);
        });
      
$app->get('/tipoempleado', function ($request, $response) {
         
         
          $obj = isset($_GET['usuarioTipo']) ? json_decode(json_encode($_GET['usuarioTipo'])) : NULL;
          $rta = Usuario::ValidarTipoEmp($obj->usuarionombre);
          return $response->withJson($rta);
        });

$app->get('/tipoempleado/[{id}]', function ($request, $response, $args) {
         
          $nombre = $args["id"];
          $rta = Usuario::ValidarTipoEmp($obj->usuarionombre);
          return $response->withJson($rta);
        });

$app->post('/ingresarvehiculo/[{id}]', function ($request, $response, $args) {

             $patente = $args["id"];
             //$obj = isset($_POST['patente']) ? json_decode(json_encode($_POST['patente'])) : NULL;
             $objetoAcceso = AccesoDatos::DameUnObjetoAcceso();
		    // echo $obj;
             $consulta = $objetoAcceso->RetornarConsulta('INSERT INTO `vehiculos`(`Patente`) VALUES (:patente)');
		     $consulta->bindParam("patente", $patente);
		     $consulta->Execute();

             //$consulta->Execute();
             
          
          //$rta = Usuario::ValidarTipoEmp($obj->usuarionombre);
           // return $response->withJson($obj);
        });


$app->run();

?>