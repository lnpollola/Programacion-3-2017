<?php

require "clases/AccesoDatos.php";

if(isset($_POST["borrar"]))
{
    try{
        $obj = AccesoDatos::DameUnObjetoAcceso();
    

        $consulta =$obj->RetornarConsulta("DELETE FROM producto
                                            WHERE codigo_barra = :codigo");
                                        
        
        $consulta->bindValue(':codigo', $_POST["codBarra"], PDO::PARAM_INT);
        
        $consulta->execute();   
        
        
                if ($consulta->rowCount() == 0)
                {
                    echo "El elemento no existe";
                 }
                    else 
                    {
                        echo "Se eliminaron ". $consulta->rowCount() . "filas";
                    }

                require_once "baja.php";

      
        }
                                    catch (PDOException $e)
                                    {
                                        echo $e->getMessage();   
                                    }



}
echo var_dump($_POST);

if(isset($_POST["borrar"]))
{
    try{
        $obj = AccesoDatos::DameUnObjetoAcceso();
    

        $consulta =$obj->RetornarConsulta("DELETE FROM producto
                                            WHERE codigo_barra = :codigo");
                                        
        
        $consulta->bindValue(':codigo', $_POST["codBarra"], PDO::PARAM_INT);
        
        $consulta->execute();   
        
        
                if ($consulta->rowCount() == 0)
                {
                    echo "El elemento no existe";
                 }
                    else 
                    {
                        echo "Se eliminaron ". $consulta->rowCount() . "filas";
                    }

                require_once "baja.php";

      
        }
                                    catch (PDOException $e)
                                    {
                                        echo $e->getMessage();   
                                    }



}
