
function ValidarUsuario()
{
    var paginaValid = "http://localhost/Programacion-3-2017/TrabajoPractico/index.php/validarusuario";

	var usuarioid = $("#usuarioid").val();
	var passwordid = $("#passwordid").val();
	
	var usuario = {};

	usuario.usuarioid = usuarioid;
	usuario.passwordid = passwordid;
   
  //PRIMER AJAX ENCAPSULA USUARIO
  $.ajax({
        type: 'GET',
        url: paginaValid,
        dataType: "json",
        data: {
			usuario : usuario
		},

		success:
		function(data, textStatus, jqXHR){
		if(data.validacion == 'ok')
		{
			
			var paginaTipoEmp = "http://localhost/Programacion-3-2017/TrabajoPractico/index.php/tipoempleado";
			var usuarioTipo = {};
			usuarioTipo.usuarionombre = data.nombre;
			//SEGUNDO AJAX - VERIFICA TIPO_EMPLEADO
			$.ajax({
        	  	type: 'GET',
        	  	url: paginaTipoEmp,
        	   data: {
				usuarioTipo : usuarioTipo
				},
				//SUCCES 2DO AJAX
				success:
					
					function(data, textStatus, jqXHR)
					{	
						//VUELVE DEL AJAX Y EN DATA ESTA EL TIPO DE EMPLEADO
						//alert(data);
						
						if(data=="ADMIN")
						{
							window.location.href = "./ADM_index.html"; 
						}
						else if (data == "EMPLEADO")
						{
							window.location.href = "./EMP_index.html"; 
						}
					}
				
		
			});


	    }else if(data.validacion == 'error')
	    {
        alert("Error en contraseña");
		window.location.href = "./login.html"; 
        }
			//llamar a otro en success
			// $.ajax({
        	//   type: 'GET',
        	//   url: url,
        	//   data: data1, //pass data1 to second request
        	//   success: successHandler, // handler if second request succeeds 
        	//   dataType: dataType
   			//   });
			// window.location.href = "./EMP_index.html"; //cuando la contraseña es incorrecta, debería fallar

		},
		error: function(jqXHR, textStatus, errorThrown){
			alert(jqXHR.responseText + "\n" + textStatus + "\n" + errorThrown);
			
		}

    });
	

}


function IngresarVehiculo()
{
    var paginaValid = "http://localhost/Programacion-3-2017/TrabajoPractico/index.php/ingresarvehiculo";

	var patente = $("#patenteid").val();
		
	//alert(patente);
   
  //PRIMER AJAX ENCAPSULA USUARIO
  $.ajax({
        type: 'POST',
        url: paginaValid,
        dataType: "json",
        data: {
			patente : patente
		},

		success:
		function(data, textStatus, jqXHR){
		
			//SEGUNDO AJAX
			var paginaTipoEmp = "http://localhost/Programacion-3-2017/TrabajoPractico/index.php/tipoempleado";
			var usuarioTipo = {};
			usuarioTipo.usuarionombre = data.nombre;
			//SEGUNDO AJAX - VERIFICA TIPO_EMPLEADO
			$.ajax({
        	  	type: 'GET',
        	  	url: paginaTipoEmp,
        	   data: {
				usuarioTipo : usuarioTipo
				},
				//SUCCES 2DO AJAX
				success:
					
					function(data, textStatus, jqXHR)
					{	
						//VUELVE DEL AJAX Y EN DATA ESTA EL TIPO DE EMPLEADO
						//alert(data);
						
						if(data=="ADMIN")
						{
							window.location.href = "./ADM_index.html"; 
						}
						else if (data == "EMPLEADO")
						{
							window.location.href = "./EMP_index.html"; 
						}
					}
				
		
			});


	   
			//llamar a otro en success
			// $.ajax({
        	//   type: 'GET',
        	//   url: url,
        	//   data: data1, //pass data1 to second request
        	//   success: successHandler, // handler if second request succeeds 
        	//   dataType: dataType
   			//   });
			// window.location.href = "./EMP_index.html"; //cuando la contraseña es incorrecta, debería fallar

		},
		error: function(jqXHR, textStatus, errorThrown){
			alert(jqXHR.responseText + "\n" + textStatus + "\n" + errorThrown);
			
		}

    });
	

}

