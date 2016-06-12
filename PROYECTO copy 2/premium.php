<?php  
 // codigo agregado por julian ---------------------
 session_start();
 include("functions.php");
 $t = login_check($mysqli);
if( $t == 1) {
//-----------------------------------------------------

  
    $link = conectar();

    $sql = 'SELECT nombre FROM `usuario` WHERE numTarjeta is NOT NULL AND mail = "'.$_SESSION['mail'].'"';
    $consulta= mysqli_query($link , $sql);
    $row = mysqli_fetch_assoc($consulta);
   if ($row == 0){ 
 ?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link href='https://fonts.googleapis.com/css?family=Averia+Sans+Libre' rel='stylesheet' type='text/css'>
	<link rel="icon"  href="FOTOS/favicon.jpg" />
	<link rel="stylesheet" type="text/css" href="estilo.css">
	<script type="text/javascript" src="validacion.js"></script> <!--se procesa el archivo javascrip-->
	<title>Couch Inn! PREMIUM</title>
</head>
<body>
	<div class="contenedorPremium" align="center">
			<a href="usuariocomun.php"><img id="logoPremium" src="FOTOS/logo.png" ></a>
			<div id="campos">
			    el costo es de : $50
				<form id="premium"  name="formulario" onsubmit=" return validarpremium();" method="post" name="regPremium">
					<!-- inicia el numero de tarjeta a validar-->
					<p> ingresá numero de tarjeta de credito: </p>
						<input type="text" name="numtarjeta">
					
					<!-- inicia la fecha de vencimiento de la tarjeta-->
					<p>ingresá la fecha de vencimiento de la tarjeta:</p>
						<input id="fechaTarjeta" type="date" name="fechaVencimento" 
								<?php  
		  								date_default_timezone_set('America/Argentina/Buenos_Aires');
										$fecha= new DateTime(); // dia de hoy
										$año=$fecha->format('Y'); // en formato de año  
										$mes= $fecha->format('m'); // en formato de mes
										$dia=$fecha->format('d'); // en formato de dia
										$escribir= $año."-".$mes."-".$dia; // ingrese por teclado una fecha 
										$nueva= date_create($escribir);  // se crea la nueva fecha ingresada
										echo "min=\"".$nueva->format('Y-m-d')."\"";
								?>
			  						 placeholder="Fecha De Nacimiento">
					<p>
					<p>ingrese digitos verificadores :</p>
						<input type="" name="digitos" ><br/>
						<button type="submit" name="aceptar">Aceptar</button>
						<button type="reset" onclick="location='perfil.php'" name="cancelar">Cancelar</button>
					

				</form>
			</div>
	</div>
</body>
</html>
<?php } else { 
	 echo "no tiene acceso a la seccion, esta siendo redirigido.";
	 ?>
	<script>
        window.location.href="perfil.php";
     </script>
<?php } 

} else {  ?>
        <script>
        alert("no ha iniciado sesion");
        window.location.href="index.php";
     </script> 
     <?php
}
?>