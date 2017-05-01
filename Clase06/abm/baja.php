<html>
<head>
	<title>BAJA DE PRODUCTOS</title>
	  
		<meta charset="UTF-8">

        <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="estilo.css">
</head>
<body>
	<a class="btn btn-info" href="index.html">Menu principal</a>
<?php     
	require_once("clases\producto.php");
?>
	<div class="container">
	
		<div class="page-header">
			<h1>PRODUCTOS</h1>      
		</div>
		<div class="CajaInicio animated bounceInRight">
			<h1>LISTADO DE PODUCTOS A DAR DE BAJA</h1>

			<form id="FormIngreso" method="post" enctype="multipart/form-data" action="bajadb.php" >
				<input type="text" name="codBarra" placeholder="Ingrese c&oacute;digo de barras"  />
			
				<input type="submit" class="MiBotonUTN" name="borrar" />
			
</form>	
            <?php 

$ArrayDeProductos = Producto::TraerTodosLosProductosBD(); //MODIFIQUE ESTE POR BD AGREGADO AL FINAL LLAMANDO AL NUEVO METODO

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
								<form method=post name=bajadeprod action= bajadb.php>
                                <input type=submit name=borrar1 class=MiBotonUTN value=borrar />
                                <input type=hidden name=codBarra value=".$prod->GetCodBarra()." />
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

















