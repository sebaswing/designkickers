<?php
 // include("conexion.php");
 // codigo agregado por julian ---------------------
 session_start();
 include("functions.php");
 $t = login_check($mysqli);
//--------------------------------------
  include("consultamensajes.php");
    include("nuevasnotificaciones.php");
//-----------------------------------------------------
if( $t == 1) {
//-----------------------------------------------------

		?>
<html>
<head>
<!--	<link rel="stylesheet" type="text/css" href="demo.css">
	<script type="text/javascript" src="demo.js"></script>
	-->
	<link rel="stylesheet" type="text/css" href="estilo.css"> <!-- modificado -->
	<link rel="stylesheet" type="text/css" href="Menu/estiloMenu.css"> 	
	<link href='https://fonts.googleapis.com/css?family=Averia+Sans+Libre' rel='stylesheet' type='text/css'> 
	<link rel="icon"  href="FOTOS/favicon.jpg" />
	<script type="text/javascript" src="main.js"></script>
	<link rel="stylesheet" href="http://code.jquery.com/ui/1.10.1/themes/base/jquery-ui.css" />
	<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
	<script src="http://code.jquery.com/ui/1.10.1/jquery-ui.js"></script>
	<script type='text/javascript' src="//ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>	
	
</head>

<div id="contened<header>
		<?
			include "Menu/menu.php";
		?>	
		</header><!-- /header -->
	<hr> <!-- esto es nuevo-->
	<?php
	$auxnew = 0;  // parte nueva =----------------------------------------------------------------------
	while($new = mysqli_fetch_assoc($nuevosmensajes)){
		$auxnew = $auxnew + $new['cantidad'];
		}
	if ($auxnew == 0) {
		echo "<br>";
		echo "<br>";
		echo "<br>";
		echo "<h1>no posee mensajes</h1>";
	}  else { echo "<ul>";
			$link = conectar(); 
			$sql4="SELECT b.id_couch as idcouch, a.idreserva, b.titulo, a.descripcion, a.fecha_inicio, a.fecha_fin, a.estado, '1' as ver 
					FROM couch b inner join reserva a on (a.idcouch = b.id_couch) WHERE b.mail = '".$_SESSION['mail']."' and a.nueva = 1 and a.estado = 'pendiente'
					UNION
					SELECT b.id_couch as idcouch, a.idreserva, b.titulo, a.descripcion, a.fecha_inicio, a.fecha_fin, a.estado, '0' as ver 
					FROM couch b inner join reserva a on (a.idcouch = b.id_couch) WHERE a.mail = '".$_SESSION['mail']."' and a.nueva = 1 and a.estado <> 'pendiente'"; 
			$nuevos = mysqli_query($link , $sql4);
			$sql222="UPDATE reserva as a1 left join couch b1 on (a1.idcouch = b1.id_couch) set a1.nueva = 0 WHERE b1.mail = '".$_SESSION['mail']."' and a1.nueva = 1 ";
			$actualizarvision= mysqli_query($link , $sql222) or die (mysqli_error($link)); //no se ven mas como nuevos las ultimas reservas recibidas.
			$sql221="UPDATE reserva as a1 left join couch b1 on (a1.idcouch = b1.id_couch) set a1.nueva = 0 WHERE a1.mail = '".$_SESSION['mail']."' and a1.nueva = 1 ";
			$actualizarvision1= mysqli_query($link , $sql221) or die (mysqli_error($link)); //no se ven mas como nuevos las ultimas reservas enviadas
			while($listanuevos = mysqli_fetch_assoc($nuevos))
                 { ?>  
					
					
			<?php		if ($listanuevos['estado'] == 'pendiente') { /*mis reservas recibidas  -------------------------------------------------------------------------------------*/
						?>
						<li>
						<div id='contenedormensajes' name='contenedormensajes'>
						<form method="POST" action=""></form>
						<form  method="POST" action="aceptareliminar.php">
							<h1>Pedido de reserva para tu couch: <?php echo $listanuevos['titulo']; ?></h1>
						<h1>Estado: <?php echo $listanuevos['estado']; ?> </h1>
						<h1>Descripcion: <?php echo $listanuevos['descripcion']; ?> </h1>
						<br>
						<h1>Fecha pedida: <?php echo $listanuevos['fecha_inicio']; ?> al <?php echo $listanuevos['fecha_fin']; ?> </h1>
						<br>
						<input type='hidden' id='idreserva' name='idreserva' value='<?php echo $listanuevos['idreserva']; ?>' > </input>
						<input type='hidden' id='idcouch' name='idcouch' value='<?php echo $listanuevos['idcouch']; ?>' > </input>
						<input type='hidden' id='fecha_inicio' name='fecha_inicio' value='<?php echo $listanuevos['fecha_inicio']; ?>' > </input> 
						<input type='hidden' id='fecha_fin' name='fecha_fin' value='<?php echo $listanuevos['fecha_fin']; ?>' > </input> 
						<input type='hidden' id='titulo' name='titulo' value='<?php echo $listanuevos['titulo']; ?>' > </input> 
					<?php	if ($listanuevos['estado'] == 'pendiente') {
						echo "<br><button id='cerrar'>Aceptar</button>";
						}?>
						</form>

						<form  method="POST" action="rechazarreserva.php">
							<?php echo "<input type='hidden' id='idreserva' name='idreserva' value='".$listanuevos['idreserva']."' > </input>"; ?>
							<button>Rechazar</button>
						</form>
						</div>  
						</li>
					<?php 
					
					}else {  // aca son las solicitudes enviadas ---------------------------------------------------------------------------
				?>		<li>
						<div id='contenedormensajes' name='contenedormensajes'>
						<form id='enviado' id='<?php echo $listanuevos['idcouch']; ?>' method='POST' >
			<?php			echo "<h2>Su solicitud de reserva para el couch: ".$listanuevos['titulo']."</h2>";
						echo "<h2>ha sido ".$listanuevos['estado']."</h2>";
						echo "<br>";
						echo "<h1>Fecha pedida: ".$listanuevos['fecha_inicio']." al ".$listanuevos['fecha_fin']."</h1>";
						$datos = mysqli_fetch_assoc(datosduenocouch($listanuevos['idcouch']));
						echo "<br>";
						if ($listanuevos['estado'] == 'aceptada') {
						echo "<h1>Datos de contacto</h1>";
						echo "<br>";
						echo "<h1>nombre: ".$datos['nombre'].", ".$datos['apellido']."</h1>";
						echo "<br>";
						echo "<h1>Telefono: ".$datos['telefono']."</h1>";
						}
				?>		</form>
						</div>  
						</li>
					<?php		}
					
					?>
					<br>
					
			
	<?php			}
			echo "</ul>";
		} 
		
?>
	</div>
</div>

<footer> <p>CouchInn es una marca registrada. Todos los derechos reservados</p> </footer>
</html>
<?php } else {  ?>
        <script>
        alert("no ha iniciado sesion");
        window.location.href="index.php";
     </script> 
     <?php
}
?>