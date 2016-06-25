<!-- validacion en javascript para el correo -->
<script>
	function confirmar()
	{
		if(document.recuperarClave.correo1.value.length == 0)
		{
			alert("ingrese un correo porfavor");
			document.recuperarClave.correo1.focus();
			return false;
		}
	}
</script>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link href='https://fonts.googleapis.com/css?family=Averia+Sans+Libre' rel='stylesheet' type='text/css'>
	<link rel="icon" href="FOTOS/favicon.jpg"/>
	<link rel="stylesheet" type="text/css" href="recuperar.css">
	<title>Couch Inn!</title>
</head>
<body>
	<div>
		<a href="index.php"><img class="logo" src="FOTOS/logo.png"/></a>
		<h2 id="textin">recuperación de contraseña</h2>
	</div>
	<div>
		<form name="recuperarClave"  onsubmit=" return confirmar();" method="POST"  action="validacionrecuperar.php" >
			<h1>POR FAVOR INGRESA TU CORREO:</h1>
			<input type="email" name="correo1" placeholder="Email de Usuario"/>
			<br>
			<button type="submit" name="aceptarrecu" class="btn btn-default">RECUPERA MI CLAVE</button>
		  <button type="reset" onclick="location='index.php'" class="btn btn-default">CANCELAR</button>
		</form>
	</div>
</body>
</html>