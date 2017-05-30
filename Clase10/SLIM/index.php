<?php
require 'vendor/autoload.php';


use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;


$app = new \Slim\App;


$app->get('/trolo', function (Request $request, Response $response) {

   
    $response->write("Hello trolo");

    return $response;
});

$app->post('/trolopost', function (Request $request, Response $response){
            $response->write("hola trolopost");

            return $response;
});




$app->run();



?>