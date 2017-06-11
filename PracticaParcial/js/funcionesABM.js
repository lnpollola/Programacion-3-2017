


function BorrarCD(idParametro)
{
	//alert("Estoy en Borrar cd y quiero borrar el cd "+idParametro);

		var funcionAjax=$.ajax({
		url:"http://localhost/Programacion-3-2017/PracticaParcial/borrar",
		type:"delete",
		data:{
			//queHacer:"BorrarCD",
			id:idParametro	
		}
	});
	funcionAjax.done(function(retorno){
		MostrarGrilla();
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

	//alert("estoy en ajax de guardarCD");
	
	
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
		url:"http://localhost/Programacion-3-2017/PracticaParcial/cd",
		type:"post",
		data:datosDelForm,
		cache: false,
    	contentType: false,
    	processData: false

	}).then(function(respuesta){
		alert("Agregado correctamente");
		
		//$("#informe").html("cantidad de agregados "+ respuesta);	
		
		$("#cantante").val("");
		$("#titulo").val("");
		$("#anio").val("");
		$("#foto").val("");
		//console.log("guardar cd");

	},function(error){

			$("#informe").html(error.responseText);
			console.info("error", error);

	});
	
}