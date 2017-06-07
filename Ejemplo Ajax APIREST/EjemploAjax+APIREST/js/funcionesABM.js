function BorrarCD(idParametro)
{
	//alert(idParametro);

		var funcionAjax=$.ajax({
		url:"nexo.php",
		type:"post",
		data:{
			queHacer:"BorrarCD",
			id:idParametro	
		}
	});
	funcionAjax.done(function(retorno){
		Mostrar("MostrarGrilla");
		$("#informe").html("cantidad de eliminados "+ retorno);	
		
	});
	funcionAjax.fail(function(retorno){	
		$("#informe").html(retorno.responseText);	
	});	
}

function EditarCD(idParametro)
{
	var funcionAjax=$.ajax({
		url:"nexo.php",
		type:"post",
		data:{
			queHacer:"TraerCD",
			id:idParametro	
		}
	});
	funcionAjax.done(function(retorno){
		var cd =JSON.parse(retorno);	
		$("#idCD").val(cd.id);
		$("#cantante").val(cd.cantante);
		$("#titulo").val(cd.titulo);
		$("#anio").val(cd.año);
	});
	funcionAjax.fail(function(retorno){	
		$("#informe").html(retorno.responseText);	
	});	
	Mostrar("MostrarFormAlta");
}

function GuardarCD()
{

	var inputFileImage = document.getElementById("foto");
	var file = inputFileImage.files[0];
	var datosDelForm = new FormData("formcd");
	//console.info(file);

	
	var titulo=$("#titulo").val();
	var id=$("#idCD").val();
	var cantante=$("#cantante").val();
	var anio=$("#anio").val();

	datosDelForm.append("foto",file);
	datosDelForm.append("titulo",titulo);
	datosDelForm.append("id",id);
	datosDelForm.append("cantante",cantante);
	datosDelForm.append("anio",anio);		
		
		

	var funcionAjax=$.ajax({
		url:"http://localhost:8080/EjemploAjax+APIREST/apirest/cd/",
		type:"post",
		data:datosDelForm,
		cache: false,
    	contentType: false,
    	processData: false

	}).then(function(respuesta){
		$("#informe").html("cantidad de agregados "+ respuesta);	
		console.log("guardar cd");

	},function(error){

			$("#informe").html(error.responseText);
			console.info("error", error);

	});
	
}