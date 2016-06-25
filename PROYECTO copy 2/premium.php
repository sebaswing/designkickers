<?php  
 // codigo agregado por julian ---------------------
 session_start();
 include("functions.php");
 $t = login_check($mysqli);
if( $t == 1) {
//-----------------------------------------------------

   if( isset($_POST['aceptarP']))
   {  // pregunto si esta seteado el boton aceptar
   	  $link = conectar();  // llamo a la funcion conectar
      $tarj = $_POST['numtarjeta'];  // me traigo mediante un arreglo el num de tarjeta
      $ven = $_POST['fechaVencimento'];  //  me traigo mediante un arreglo la fecha de vencimiento
      $consulta = "UPDATE usuario set numTarjeta = '".$tarj."', fechavencimiento = '".$ven."'
      where mail = '".$_SESSION['mail']."' ";  // consulta para hacerse premium
      $usuario = mysqli_query($link , $consulta);  // envio la consulta
      // consulta para sacar el boton si es premium
      $consulta2="SELECT * FROM usuario WHERE mail ='". $_SESSION['mail']."' AND numTarjeta IS NOT NULL";
      $usuario2= mysqli_query($link,$consulta2); // envio la consulta  
      $row = mysqli_num_rows($usuario2); // le asigno el row el num de filas que coincidan con la consulta2
      if ($row == 1)  // si el numero de filas es 1 que me redireccione a perfil mostrando un msj q es premium
       { ?>
          <script>
            alert("FELICITACIONES!. Se ha convertido en premium");
            window.location.href="perfil.php";
          </script> 
       <?php
      }
   }
 ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link href='https://fonts.googleapis.com/css?family=Averia+Sans+Libre' rel='stylesheet' type='text/css'>
	<link rel="icon"  href="FOTOS/favicon.jpg" />
	<link rel="stylesheet" type="text/css" href="estilo.css">
	<title>Couch Inn!</title>
	<script type="text/javascript" src="validacion.js"></script> <!--se procesa el archivo javascrip-->
	<title>Couch Inn! PREMIUM</title>
</head>
<body>
	<div class="contenedorPremium" align="center">
			<a href="usuariocomun.php"><img id="logoPremium" src="FOTOS/logo.png" ></a>
			<div id="campos">
			    el costo es de : AR$50
				<form id="premium" name="formulario" onsubmit=" return validarpremium();" action="" method="post">
					<!-- inicia el numero de tarjeta a validar-->
					<p> ingresá numero de tarjeta de credito: </p>
						<input type="text" name="numtarjeta">
					<!-- inicia la fecha de vencimiento de la tarjeta-->
					<p>ingresá la fecha de vencimiento de la tarjeta:</p>
						<input id="fechaTarjeta" type="date" name="fechaVencimento" min=
		  				<?php  
		  						date_default_timezone_set('America/Argentina/Buenos_Aires');
								$fecha= new DateTime();
								$año=$fecha->format('Y');
								$mes= $fecha->format('m');
								$dia=$fecha->format('d');
								$dia=$dia+1;
								$escribir= $año."-".$mes."-".$dia;
								$nueva= date_create($escribir);
								echo "\"".$nueva->format('Y-m-d')."\"";
		  				?> >
					<p>
					<p>ingrese digitos verificadores :</p>
						<input type="" name="digitos" ><br/>
						<button type="submit" name="aceptarP">Aceptar</button>
						<button type="reset" onclick="location='perfil.php'" name="cancelar">Cancelar</button>
					

				</form>
			</div>
	</div>
</body>
</html>
<!--  codido de iniciar sesion-->
<?php } else {  ?>
        <script>
        alert("no ha iniciado sesion");
        window.location.href="index.php";
     </script> 
     <?php
}
?>