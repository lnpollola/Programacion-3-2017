<!DOCTYPE HTML>
<html>

<head>
  <title>Salida</title>
  <meta name="description" content="website description" />
  <meta name="keywords" content="website keywords, website keywords" />
  <meta http-equiv="content-type" content="text/html; charset=UTF-8" />
  <link rel="stylesheet" type="text/css" href="style/style.css" title="style" />
  <style>
  body {
          /*Imagen de fondo:*/
          background-image: url("https://i2.wp.com/www.roshfrans.com/wp-content/uploads/2016/06/Estacionamiento.png?fit=1400%2C600");
  } 
  
  </style>
</head>

<body>
  <div id="main">
    <div id="header">
      <div id="logo">
        <div id="logo_text">
          <!-- class="logo_colour", allows you to change the colour of the text -->
           <h1><a href="..\indexEMP.html">SALIDA de VEHICULO<span class="logo_colour"></span></a></h1>
          <h2>Alumno: Julian Graziano.</h2>
          <h2>Curso: ProgramacionIII.</h2>
        </div>
      </div>
      <div id="menubar">
        <ul id="menu">
          <!-- put class="selected" in the li tag for the selected page - to highlight which page you're on -->
          <li class="selected"><a href="..\indexEMP.html">Home</a></li>
         <li><a href="checkin_vehiculo.php">Entrada Vehiculo</a></li>
          <li><a href="checkout_vehiculo.php">Salida Vehiculo</a></li>
          <li><a href="..\login.html">LogOFF</a></li>
        </ul>
      </div>
    </div>
    <div id="site_content">
      <div class="sidebar">
        <!-- insert your sidebar items here -->      
        <h3>Links utiles</h3>
        <ul>
         <li><a href="https://www.github.com/jngraziano">My Github</a></li>
          <li><a href="https://www.w3schools.com/">W3school</a></li>
          <li><a href="http://php.net/">PHP.NET</a></li>
          <li><a href="http://www.sistemas-utnfra.com.ar/#/home">UTN Fra</a></li>
        </ul>

      </div>
      <div id="content">
        <!-- insert the page content here -->
        <h1>Salida de Vehiculo</h1>
        <p>Esta es la pagina indicar la salida de un vehiculo al sistema.</p><br>
        <!--<p style="color:blue">prueba </p>-->
     <form id="FormIngreso" method="post" action="administracion.php" >
    <h3>Salida vehiculo</h3>
      
      <input placeholder="Ingrese Patente" type="text" tabindex="1" name="Nombre1" required autofocus>
      <br><br>
      <button name="submit" type="Aceptar1" id="contact-submit" data-submit="...Cargando">Aceptar</button>
        </ul>
      </div>
    </div>
    <div id="footer">
      <!--Este template fue adquirido en: Copyright &copy; black_white | <a href="http://validator.w3.org/check?uri=referer">HTML5</a> | <a href="http://jigsaw.w3.org/css-validator/check/referer">CSS</a> | <a href="http://www.html5webtemplates.co.uk">Free CSS Templates</a>-->
    </div>
  </div>
</body>
</html>