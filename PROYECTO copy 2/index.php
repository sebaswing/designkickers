<html>
<head>
<meta charset="utf-8">
<link rel="stylesheet" type="text/css" href="estilo.css"> 
<link href='https://fonts.googleapis.com/css?family=Averia+Sans+Libre' rel='stylesheet' type='text/css'>
<script type="text/javascript" src="validacion.js"></script> <!--se procesa el archivo javascrip-->
</head>
<body>
<video autoplay loop poster="viajar.jpg" id="bgvid">
    <source src="FOTOS/viajarnuevo.mp4" type="video/mp4">
</video>
<div class="pal" align="center">
		<div>
			<a href="Registrarme.php" ><BUTTON class="registro">REGISTRARME</BUTTON></a> 
			<br>
		</div>
		<div>
			<img src="FOTOS/logo.png" class="logo" align="right">
		</div>
		<div>
		<form name="formulario" method="post" onsubmit=" return validarreg();" action="validandousuario.php">
		  <div>
		    <label for="exampleInputEmail1"></label>
		    <input name="correo" class="usuario" type="email" class="form-control" id="exampleInputEmail1" placeholder=" NOMBRE DE USUARIO">
		  </div>
		  <div >
		    <label for="exampleInputPassword1"></label>
		    <input name="clave" class="mail" type="password" class="form-control" id="exampleInputPassword1" placeholder=" CONTRASEÑA">
		  </div>
		  <a href="ingresar.php" ><button type="submit" class="btn btn-default">INGRESAR</button></a>
		</form>
	</div>
</body>

</html>