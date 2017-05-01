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
                        echo '<script type="text/javascript">alert("Se elimino 1 articulo");</script>';

                    }

                require_once "grilla.php";

      
        }
                                    catch (PDOException $e)
                                    {
                                        echo $e->getMessage();   
                                    }



}

if(isset($_POST["modCodBarra"]))
{
     require_once "clases/AccesoDatos.php";
    require_once "clases/producto.php";
    $objetoAcceso = AccesoDatos::DameUnObjetoAcceso();
    $consulta = $objetoAcceso->RetornarConsulta('SELECT codigo_barra as codBarra, nombre, path_foto as pathFoto FROM producto WHERE codigo_barra=:codBarra');
    $consulta->bindvalue(':codBarra', $_POST["modCodBarra"], PDO::PARAM_INT);
    $consulta->execute();
    $productoSeleccionado=  $consulta->fetchObject("producto");
    
    
    $nombreProducto = $productoSeleccionado->GetNombre();
    $codProducto = $productoSeleccionado->GetCodBarra();
    $pathFotoProducto = $productoSeleccionado->GetPathFoto();


   require_once "modificacion.php"; 
    

}



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
              
        echo '<script type="text/javascript">alert("Se agrego 1 elemento correctamete");</script>';

        require_once "index.html";

        }
            catch (PDOException $e)
            {
                echo $e->getMessage();   
            }

}


?>   