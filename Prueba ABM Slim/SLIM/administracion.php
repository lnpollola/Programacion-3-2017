<?php

require "clases/AccesoDatos.php";

require 'vendor/autoload.php';


use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;


$app = new \Slim\App;


$app->post('/alta', function (Request $request, Response $response) {

    try{
    
        echo "entro";

        $obj = AccesoDatos::DameUnObjetoAcceso();
  

        $consulta =$obj->RetornarConsulta("INSERT INTO producto (codigo_barra,nombre , path_foto)"
                                                    . "VALUES(:codigo, :nombre, :pathRuta)");
        
        $consulta->bindValue(':codigo', $_POST["codBarra"], PDO::PARAM_INT);
        $consulta->bindValue(':nombre', $_POST["nombre"], PDO::PARAM_STR);
        $consulta->bindValue(':pathRuta', $_FILES["archivo"]["name"], PDO::PARAM_STR);

        $consulta->execute();   
        

        $name = $_FILES["archivo"]["name"];


        $archivoTmp = $_FILES["archivo"]["tmp_name"];

        copy($archivoTmp,"archivos"."/".$name);
              
        echo '<script type="text/javascript">alert("Se agrego 1 elemento correctamete");</script>';

        require_once "index.html";

        }
            catch (PDOException $e)
            {
                echo $e->getMessage();   
            }






    $response->write("Hello trolo".$name);

    return $response;
});




$app->run();

?>   












