<?php


require 'vendor/autoload.php';
require 'clases/AccesoDatos.php';
//require 'clases/usuario.php';
// Create and configure Slim app
$config = ['settings' => [
    'addContentLengthHeader' => false,
]];



$app = new \Slim\App($config);
// Ejemplo traertodos con codigo
// $app->get('/traertodos', function ($request, $response) {
//     $objetoAcceso = AccesoDatos::DameUnObjetoAcceso();
//     $consulta = $objetoAcceso->RetornarConsulta('SELECT * FROM usuario');
//     $consulta->execute();
//     $todos = $consulta->fetchAll();
//     return $response->withJson($todos);
// });
// Ejemplo traer uno solo con codigo
// $app->get('/traeruno/[{id}]', function ($request, $response, $args) {
//           $objetoAcceso = AccesoDatos::DameUnObjetoAcceso();
//           $consulta = $objetoAcceso->RetornarConsulta('SELECT ID, CLAVE, MAIL, ESTADO FROM usuario WHERE id=:id');
//           $consulta->bindParam("id", $args['id']);
//            $consulta->execute();
//             $uno = $consulta->fetchAll();
//             return $response->withJson($uno);
//         });
$app->get('/traertodos', function ($request, $response) {
    $usuarios = Usuario::TraerTodosLosUsuariosBD();
    return $response->withJson($usuarios);
});
$app->get('/traeruno/[{id}]', function ($request, $response, $args) {
          $uno = Usuario::TraerUnUsuarioBD($args['id']);
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
$app->post('/validarusuario', function ($request, $response) {
    
    //$body = $response->getBody();
    
    //$obj = isset($_POST['usuario']) ? json_decode(json_encode($_POST['usuario'])) : NULL;
   
     $usuarios = Usuario::TraerTodosLosusuarios();
     
   //  $app->redirect('http://localhost/Programacion-3-2017/TP_estacionamiento_JG/SLIM/prueba.php', 301);

    //return  json_encode($usuarios);

     return $response->withJson($usuarios);

   
    //return $response->withJson($obj);
});
// $app->get('/funciones/[{id}]', function ($request, $response, $args) {
//          $sth = $this->db->prepare("SELECT * FROM tasks WHERE id=:id");
//         $sth->bindParam("id", $args['id']);
//         $sth->execute();
//         $todos = $sth->fetchObject();
//         return $this->response->withJson($todos);
//     });
// Run app
$app->run();
?>

