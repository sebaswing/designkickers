<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link href='https://fonts.googleapis.com/css?family=Averia+Sans+Libre' rel='stylesheet' type='text/css'>
	<link rel="icon"  href="FOTOS/favicon.jpg" />
	<link rel="stylesheet" type="text/css" href="estilo.css">
	<title>Couch Inn! PREMIUM</title>
</head>
<body>
	<div class="contenedorPremium" align="center">
			<img id="logoPremium" src="FOTOS/logo.png" >
			<div id="campos">
				<form id="premium" method="post" name="regPremium">
					<!-- inicia el numero de tarjeta a validar-->
					<p> ingresá numero de tarjeta de credito: </p>
						<input type="text" name="numeroTarjeta">
					
					<!-- inicia la fecha de vencimiento de la tarjeta-->
					<p>ingresá la fecha de vencimiento de la tarjeta:</p>
						<input id="fechaTarjeta" type="date" name="fechaVencimento" >
					<p>
						<button type="submit" name="aceptar">Aceptar</button>
					</p>

				</form>
			</div>
	</div>
</body>
</html>