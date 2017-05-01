<html>
<head>
	<title>MODIFICACION de PRODUCTOS</title>
	 
		<meta charset="UTF-8">

        <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="estilo.css">
</head>
<body>
	<a class="btn btn-info" href="index.html">Menu principal</a>
	<div class="container">
	
		<div class="page-header">
			<h1>PRODUCTOS</h1>      
		</div>
		<div class="CajaInicio animated bounceInRight">
			<h1>MODIFICACION - LISTADO - con archivos -</h1>

            <?PHP
                require_once("clases\producto.php");
                //Si entra por primera vez selecciona, sino modifica con placeholder con valores
                if(isset($_POST["modificar"]))
                {
                    echo "	<form id=FormIngreso method=post enctype=multipart/form-data action=modificacion.php >
				            <input type=text name=codBarra value='$codProducto'  />
                            <input type=hidden name=codAnterior value='$codProducto' />
                            <input type=text name=nombre value='$nombreProducto'  />
                            <input type=file name=archivo value='$pathFotoProducto' required /> 
				            <input type=submit value='Guardar Cambios' class=MiBotonUTN name=modConfirm />
			                
                            </form>";
                            
               
               
               
                }
                else if (isset($_POST["modConfirm"])) 
                {
                        require_once "clases/AccesoDatos.php";
                        $objetoAcceso = AccesoDatos::DameUnObjetoAcceso();
                        $consulta = $objetoAcceso->RetornarConsulta('UPDATE producto SET codigo_barra= :codBarra, nombre= :nombre, path_foto = :pathFoto WHERE codigo_barra=:codAnterior');
                        $consulta->bindvalue(":codAnterior", $_POST["codAnterior"],PDO::PARAM_INT);
                        $consulta->bindvalue(':codBarra',$_POST["codBarra"], PDO::PARAM_INT);
                        $consulta->bindvalue(':nombre',$_POST["nombre"], PDO::PARAM_STR);
                        $consulta->bindvalue(':pathFoto',$_FILES["archivo"]["name"], PDO::PARAM_STR);
                        $consulta->execute();
                        echo "Se actualizo ". $consulta->rowCount() . "registro/s"."<br>";
                        
                }
               
            $ArrayDeProductos = Producto::TraerTodosLosProductosBD(); //MODIFIQUE ESTE POR BD AGREGADO AL FINAL LLAMANDO AL NUEVO METODO
           
//            $ArrayDeProductos = Producto::TraerTodosLosProductosBD(); //MODIFIQUE ESTE POR BD AGREGADO AL FINAL LLAMANDO AL NUEVO METODO

echo "<table class='table'>
		<thead>
			<tr>
				<th>  COD. BARRA </th>
				<th>  NOMBRE     </th>
				<th>  FOTO       </th>
			</tr> 
		</thead>";   	

	foreach ($ArrayDeProductos as $prod){

				echo " 	<tr>
					<td>".$prod->GetCodBarra()."</td>
					<td>".$prod->GetNombre()."</td>
					
					<td><img src='archivos/".$prod->GetPathFoto()."' width='100px' height='100px'/></td>
					<td>
								<form method=post name=bajadeprod action=administracion.php>
                                <input type=submit name=borrar class=MiBotonUTN value=borrar />
                                <input type=hidden name=codBarra value=".$prod->GetCodBarra()." />
								</form>

								<form method=post name=moddeprod action= administracion.php>
                                <input type=submit name=modificar class=MiBotonUTN value=modificar />
                                <input type=hidden name=modCodBarra value=".$prod->GetCodBarra()." />
								</form>


					</td>
				</tr>";

	}	
echo "</table>";		
		
            ?>
		</div>
	</div>
</body>
</html>