<?php

require "clases/AccesoDatos.php";

if(isset($_POST["guardar"]))
{
    try{
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
              
        echo "<a href=index.html>Volver</a> ";


        }
            catch (PDOException $e)
            {
                echo $e->getMessage();   
            }



}











?>