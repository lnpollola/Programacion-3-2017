
function MostrarError()
{
	var funcionAjax=$.ajax({url:"http://localhost:8080/abm_apirestv2/",type:"get",data:{queHacer:"MostrarTexto"}});
	funcionAjax.done(function(retorno){
		$("#principal").html(retorno);
		$("#informe").html("Correcto!!!");
		console.info("retorno",retorno)
	});
	funcionAjax.fail(function(retorno){
			$("#principal").html("edsfsdfrror :(");
		$("#informe").html(retorno.responseText);		
	});
	funcionAjax.always(function(retorno){
		//alert("siempre "+retorno.statusText);
	});
}
function MostrarSinParametros()
{
	var funcionAjax=$.ajax({url:"nexoTexto.php"});

	funcionAjax.done(function(retorno){
		$("#principal").html(retorno);
		$("#informe").html("Correcto!!!");
	});
	funcionAjax.fail(function(retorno){
		$("#principal").html(":(");
		$("#informe").html(retorno.responseText);	
	});
	funcionAjax.always(function(retorno){
		//alert("siempre "+retorno.statusText);

	});
}

function Mostrar(queMostrar)
{
		//alert(queMostrar);
	var funcionAjax=$.ajax({
		url:"nexo.php",
		type:"post",
		data:{queHacer:queMostrar}
	});
	funcionAjax.done(function(retorno){
		$("#principal").html(retorno);
		$("#informe").html("Correcto!!!");	
	});
	funcionAjax.fail(function(retorno){
		$("#principal").html(":(");
		$("#informe").html(retorno.responseText);	
	});
	funcionAjax.always(function(retorno){
		//alert("siempre "+retorno.statusText);

	});
}

function MostarLogin()
{
<<<<<<< HEAD
		//alert(queMostrar);
	var funcionAjax=$.ajax({
		url:"nexo.php",
		type:"post",
		data:{queHacer:"MostarLogin"}
	});
	funcionAjax.done(function(retorno){
		$("#principal").html(retorno);
		$("#informe").html("Correcto Form login!!!");	
	});
	funcionAjax.fail(function(retorno){
		$("#botonesABM").html(":(");
=======
		
	var funcionAjax=$.ajax({
		url:"http://localhost/Programacion-3-2017/PracticaParcial/mostrarlogin",
		type:"post"
		//data:{queHacer:"MostarLogin"}
	});
	funcionAjax.done(function(retorno){
		$("#principal").html(retorno);
		$("#informe").html("Form Login");	
	});
	funcionAjax.fail(function(retorno){
		$("#botonesABM").html("volvio por el fail");
>>>>>>> refs/remotes/DamianVogel/master
		$("#informe").html(retorno.responseText);	
	});
	funcionAjax.always(function(retorno){
		//alert("siempre "+retorno.statusText);

	});
}

function MostrarAltaCd()
{		
	
<<<<<<< HEAD
	alert("llegue");
=======
	//alert("llegue");
>>>>>>> refs/remotes/DamianVogel/master
	var funcionAjax=$.ajax({
		url:"http://localhost/Programacion-3-2017/PracticaParcial/mostraralta",
		type:"post",
		data:{queHacer:"que hace"}
	});
	funcionAjax.done(function(retorno){
<<<<<<< HEAD
		$("#principal").html(retorno);
		//$("#informe").html("Correcto BOTONES!!!");	
	});
}
=======
		$("#principal").html("asd");
		//$("#informe").html("Correcto BOTONES!!!");	
	});
}

function validarLogin()
{
		var varUsuario=$("#correo").val();
		var varClave=$("#clave").val();
		var recordar=$("#recordarme").is(':checked');
		
//$("#informe").html("<img src='imagenes/ajax-loader.gif' style='width: 30px;'/>");
	

	var funcionAjax=$.ajax({
		url:"http://localhost/Programacion-3-2017/PracticaParcial/validarusuario",
		type:"post",
		data:{
			recordarme:recordar,
			usuario:varUsuario,
			clave:varClave
		}
	});


	funcionAjax.done(function(retorno){
			
			if(retorno=="ingreso"){	
				MostarLogin();

				$("#BotonLogin").html("Ir a salir<br>-Sesión-");
				$("#BotonLogin").addClass("btn btn-danger");				
				$("#usuario").val("usuario: "+retorno);
				//$("#informe").html("Bienvenido.. los botones de Alta y Grilla se encuentran operativos");
					}else
						{
							alert("Usuario o clave incorrecta");
							$("#informe").html("usuario o clave incorrecta");	
							$("#formLogin").addClass("animated bounceInLeft");
						}
	});
	funcionAjax.fail(function(retorno){
		$("#botonesABM").html(":(");
		$("#informe").html(retorno.responseText);	
	});
	
}

function deslogear()
{	
	var funcionAjax=$.ajax({
		url:"http://localhost/Programacion-3-2017/PracticaParcial/desloguear",
		type:"post"		
	});
	funcionAjax.done(function(retorno){
			//MostarBotones();
			MostarLogin();
			$("#usuario").val("Sin usuario.");
			$("#BotonLogin").html("Login<br>-Sesión-");
			$("#BotonLogin").removeClass("btn-danger");
			$("#BotonLogin").addClass("btn-primary");
			
	});
}
>>>>>>> refs/remotes/DamianVogel/master
