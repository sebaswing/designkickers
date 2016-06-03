<!DOCTYPE html>
<html>
<head>
		 <meta charset="utf-8">
		<link href='https://fonts.googleapis.com/css?family=Averia+Sans+Libre' rel='stylesheet' type='text/css'>
		<link rel="stylesheet" type="text/css" href="Registrarme.css">
		<link rel="icon"  href="FOTOS/favicon.jpg" />
		<script type="text/javascript" src="validacion.js"></script>
		<title></title>
</head>
<body>
	<div>
		<a href="index.php"><img class="logo" src="FOTOS/logo.png"></a>
	</div>
	<div>
		<form class="formularios" name="formulario" method="post" onsubmit=" return validarreg();" action="procesarusuario.php"> 
		<!--el campo de mail-->
		  <div class="form-group">
		    <input name="correo" class="user" type="email" placeholder="Email" autocomplete="on">
		  </div>
		  <!--campo para el password-->
		  <div class="form-group">
		    <input name="clave1" class="password" type="password" placeholder="Password">
		  </div>
		  <!--campo para repetir password-->
		  <div class="form-group">
		    <input name="clave2" class="password" type="password" placeholder=" RepetirPassword">
		  </div>
		  <!--el campo de nombre-->
		  <div class="form-group">
		    <input name="ape" class="user" type="text"  placeholder="Apellido" >
		  </div>
		  <!--el campo de apellido-->
		  <div class="form-group">
		    <input name="nom" class="user" type="text"  placeholder="Nombre" >
		  </div>
		  <!--el campo de Telefono-->
		  <div class="form-group">
		  	<input  id="numeroTel" name="numeroTel" class="user" type="tel"  placeholder="Telefono"> 
		  </div>
		  <!--el campo de Fecha de Nacimiento-->
		  <div class="form-group">
		  <p>Cumpleaños<img id="present" src="FOTOS/present.png">:</p> 
		    <input name="fechanac" class="fechaNac" type="date" min="1985-01-01" max=
		  	<?php  
		  		date_default_timezone_set('America/Argentina/Buenos_Aires');
				$fecha= new DateTime();
				$año=$fecha->format('Y');
				$anio=$año-18;
				$mes= $fecha->format('m');
				$dia=$fecha->format('d');
				$escribir= $anio."-".$mes."-".$dia;
				$nueva= date_create($escribir);
				echo "\"".$nueva->format('Y-m-d')."\"";
		  	?>
			   placeholder="Fecha De Nacimiento" >
		  </div>
		  <!--el checkbox de condiciones-->
		  <div class="checkbox">
		    <label>
		      <input type="checkbox" name="check[]" id="check1" value="1"> Acepto Los Terminos y Restricciones.
		    </label>
		  </div>
		  <button type="submit" style="" class="btn btn-default">Aceptar</button>
		  	<button type="reset" class="btn btn-default" onclick="location='index.php'">Cancelar</button>
		</form>
	</div>
</body>
</html>