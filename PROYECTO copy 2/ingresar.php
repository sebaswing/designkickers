<?php
  include("conexion.php");
  ?>
<html>
      <head>
          	<title>index</title> <!--titulo de la pagina -->
            <link rel="stylesheet" type="text/css" href="admin.css">  
            <link rel="icon"  href="FOTOS/favicon.jpg" />
          	<meta charset="utf-8" /> <!-- funcion para poner los acentos automaticamente-->
          	<script type="text/javascript" src="validacion.js"></script> <!--se procesa el archivo javascrip-->
      </head>
      <a href="index.php"><img class="iniciologo" src="FOTOS/logo.png" alt="logo"></a>
      <body>         
           
            <div class="center">
				<form id="formulario2" name="formulario2" method="post" onsubmit="return validarusuadmin();" action="validandousuario2.php">
				  <fieldset style="background-color:white">
				    Usuario:<br>
				    <input name="correo" type="text" value="" >
				    <br>
				    Clave:<br>
				    <input name="clave" type="password" value="">
				    <br>
				    <input type="submit" value="Ingresar" >
				  </fieldset>
				</form>
			 </div>
	  </body>
</html>