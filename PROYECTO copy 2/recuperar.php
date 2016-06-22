<!DOCTYPE html>
<script>
	function confirmar()
	{
		if(document.recuperarClave.correo.value.length == 0)
		{
			alert("ingrese un correo porfavor");
			document.recuperarClave.correo.focus();
			return false;
		}
		else
		{
	        alert("se le ha enviado su nueva contraseña por email");
	        location.href="index.php";
	        return true;
    	}
    	return false;
    }
</script>
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
		<form name="recuperarClave"  onsubmit=" return confirmar();" action="index.php">
			<h1>POR FAVOR INGRESA TU CORREO:</h1>
			<input type="email" name="correo" placeholder="Email de Usuario"/>
			<br>
			<button type="submit"  class="btn btn-default">RECUPERA MI CLAVE</button>
		  <button type="reset" onclick="location='index.php'" class="btn btn-default">CANCELAR</button>
		</form>
	</div>
</body>
</html>