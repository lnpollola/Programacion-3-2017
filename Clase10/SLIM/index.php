<?php
require 'vendor/autoload.php';


use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;


$app = new \Slim\App;


$app->get('/trolo/{name}', function (Request $request, Response $response) {

    $name = $request->getAttribute('name');


    $response->write("Hello trolo".$name);

    return $response;
});

$app->post('/trolopost', function (Request $request, Response $response){
            $response->write("hola trolopost");

            return $response;
});




$app->run();



?>