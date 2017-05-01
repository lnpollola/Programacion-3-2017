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



if(isset($_POST["borrar1"]))
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
?>   