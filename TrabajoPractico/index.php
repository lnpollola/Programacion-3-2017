<?php
require '/vendor/autoload.php';
require '/clases/usuario.php';
$app = new \Slim\App;
$app->get('/traertodosusuarios', function ($request, $response) {
    $usuarios = Usuario::TraerTodosLosusuarios();
    return $response->withJson($usuarios);
});
$app->get('/validarusuario', function ($request, $response) {
         
          $obj = isset($_GET['usuario']) ? json_decode(json_encode($_GET['usuario'])) : NULL;
        
          $rta = Usuario::ValidarUsuario($obj->usuarioid,$obj->passwordid);
          return $response->withJson($rta);
        });

$app->get('/traerunusuario/[{id}]', function ($request, $response, $args) {
          $uno = Usuario::TraerUnUsuario($args['id']);
          return $response->withJson($uno);
        });

$app->post('/alta', function ($request, $response) {
    require_once("funciones/altaenBD.php");
    // return $response->write("alta.");
});
$app->delete('/baja', function ($request, $response) {
    return $response->write("delete.");
});
$app->put('/modificacion', function ($request, $response) {
    return $response->write("modificacion.");
});
$app->patch('/cambiarestado', function ($request, $response) {
    return $response->write("cambiarestado.");
});
$app->post('/validarusuario2', function ($request, $response) {
    return $response->write("validarusuario.");
});
$app->run();
