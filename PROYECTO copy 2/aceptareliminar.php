<?php
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
	
	$verificar1 = verificarparaeliminarbool($_POST['idcouch'], $_POST['idreserva'], $_POST['fecha_inicio'], $_POST['fecha_fin']);
	echo $verificar1; 
	if ($verificar1 == true){				
					
	$link = conectar();
	$sql2="UPDATE reserva as a1 left join couch b1 on (a1.idcouch = b1.id_couch) set a1.estado = 'aceptada' WHERE a1.idreserva = '".$_POST['idreserva']."'";
	//	$aceptarreserva= mysqli_query($link , $sql2) or die (mysqli_error($link));

	$sql3="UPDATE reserva as a1 left join couch b1 on (a1.idcouch = b1.id_couch) set a1.estado = 'rechazada' 
	WHERE a1.estado <> 'aceptada' and a1.idcouch = '".$_POST['idcouch']."' and a1.fecha_inicio >= '".$_POST['fecha_inicio']."' and a1.fecha_fin >= '".$_POST['fecha_inicio']."' and a1.fecha_fin >= '".$_POST['fecha_fin']."'";
	//	$verificarrechazo= mysqli_query($link , $sql3) or die (mysqli_error($link));
		//if($verificarrechazo){
			?>
	<!--		<script>
			window.location.href="notificacion.php";
			alert("se eliminaron pedidos de reserva que coincidian con la reserva aceptada.");
			window.location.href="notificacion.php";
			</script> -->
		
<html>
<head>
	<link rel="stylesheet" type="text/css" href="estilo.css"> <!-- modificado -->	
	<link href='https://fonts.googleapis.com/css?family=Averia+Sans+Libre' rel='stylesheet' type='text/css'> 
	<link rel="icon"  href="FOTOS/favicon.jpg" />
	<script type="text/javascript" src="main.js"></script>
	<link rel="stylesheet" href="http://code.jquery.com/ui/1.10.1/themes/base/jquery-ui.css" />
	<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
	<script src="http://code.jquery.com/ui/1.10.1/jquery-ui.js"></script>
	<script type='text/javascript' src="//ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>	
	
</head>
<div id="contenedorgeneral">
	<div id="contenidobuscador">
		<a href="usuariocomun.php"><img class="iniciologo" src="FOTOS/logo.png" alt="logo"></a>
		<?php echo $_SESSION['mail'] ?>
		<div id="botons">
			  <form  method="get" action="logout.php" >
	                  <button id="cerrar">CERRAR SESION</button>
	                  <br>
	          </form>
	          <form  method="get" action="perfil.php">
	                  <button>PERFIL</button>
	                  <br>
	          </form>
	          <form  method="get" action="couch.php">
	                  <button>PUBLICA TU COUCH</button>
	                  <br>
	          </form>
			  	  <form  method="get" action="notificacion.php">
	                  <?php
						  echo "<button>Notificaciones</button>";
					  					  ?>
					  <br>
				</form>
        </div>
         <hr> <!-- esto es nuevo-->
	</div>
<div id="header">
	<nav> <!-- Aqui estamos iniciando la nueva etiqueta nav -->
				<ul class="nav">
					<li><a href="">Mensajes Nuevos</a></li>
					<li><a href="javascript:cargar('solicitudesenviadas');">Solicitudes Enviadas</a>
						<ul>
							<li><a href="javascript:cargar('solicitudespendientese');">Pendientes</a></li>
							<li><a href="javascript:cargar('solicitudesaceptadase');">Aceptadas</a></li>
							<li><a href="javascript:cargar('solicitudesrechazadase');">Rechazadas</a></li>
						</ul>
					</li>
					<li><a href="javascript:cargar('solicitudesrecibidas');">Solicitudes Recibidas</a>
						<ul>
							<li><a href="javascript:cargar('solicitudespendientesr');">Pendientes</a></li>
							<li><a href="javascript:cargar('solicitudesaceptadasr');">Aceptadas</a></li>
							<li><a href="javascript:cargar('solicitudesrechazadasr');">Rechazadas</a></li>
						</ul>
					</li>
					
				</ul>
			</nav><!-- Aqui estamos cerrando la nueva etiqueta nav -->
</div>

<div id="contenedorcajasmensajes">
	<div id='contenedormensajes1' name='contenedormensajes1'>
				<form method="POST" action="aceptarreserva.php">
	<?php			echo "<input type='hidden' id='idcouch' name='idcouch' value='".$_POST['idcouch']."'  > </input>";
					echo "<input type='hidden' id='idreserva' name='idreserva' value='".$_POST['idreserva']."'  > </input>";
					echo "<input type='hidden' id='fecha_inicio' name='fecha_inicio' value='".$_POST['fecha_inicio']."'  > </input>";
					echo "<input type='hidden' id='fecha_fin' name='fecha_fin' value='".$_POST['fecha_fin']."'  > </input>";
					$sql5 = "SELECT a.idreserva, b.titulo, a.fecha_inicio, a.fecha_fin, a.descripcion, a.capacidad FROM reserva a left join couch b on (b.id_couch = a.idcouch) WHERE idreserva = ".$_POST['idreserva']." ";
					$listareserva = mysqli_query($link , $sql5) or die (mysqli_error($link));
					$reserva = mysqli_fetch_assoc($listareserva);
					echo "<h2>Atencion</h2>";
					echo "<h1>Solicitud de reserva para couch: ".$reserva['titulo']."</h1>";
					echo "<h1>Fecha pedida: ".$reserva['fecha_inicio']." al ".$reserva['fecha_fin']."</h1>";
					echo "<br>";
					echo "<h1>Descripcion: ".$reserva['descripcion']."</h1>";
					
					echo "<h2>Si acepta la reserva, se rechazaran automaticamente las siguientes reservas pendientes: </h2>";
					$verificar = verificarparaeliminar($_POST['idcouch'], $_POST['idreserva'], $_POST['fecha_inicio'], $_POST['fecha_fin']);
					echo "<ul>";
					while ($nop = mysqli_fetch_assoc($verificar)){
						echo "<li>";
						echo "<div id='contenedormensajeslight' >";
						echo "<br>";
						echo "<p>La solicitud de reserva numero: ".$nop['idreserva']."</p><br>";
						echo "<p>Descripcion: ".$nop['descripcion']."</p><br>";
						echo "<p>con fecha desde ".$nop['fecha_inicio']." hasta ".$nop['fecha_fin']."</p>";
							echo "</div>";
							echo "</li>";
						}
					echo "</ul>";
					echo "<br>";
					echo "<br><button id='cerrar'>Aceptar</button>";
					?>
				</form>
						<form  method="POST" action="rechazarreserva.php">
							<?php echo "<input type='hidden' id='idreserva' name='idreserva' value='".$_POST['idreserva']."'  > </input>" ?>
							<button>Rechazar</button>
							<br>
						</form> 
					<?php 
					
					echo "<br>";
					echo "</form>";
					echo "</div> "; 
					echo "</li>";
				
		 

?>
	</div>
</div>

<footer> <p>CouchInn es una marca registrada. Todos los derechos reservados</p> </footer>
</html>
	<?php } else {
	
			$link = conectar();
			$sql201="UPDATE reserva as a1 left join couch b1 on (a1.idcouch = b1.id_couch) set a1.nueva = 1, a1.estado = 'aceptada' WHERE a1.idreserva = ".$_POST['idreserva']."";
			$aceptarreserva= mysqli_query($link , $sql201) or die (mysqli_error($link));
	
		?>
			<script>
			alert("La solicitud de reserva fue aceptada. Revise la solicitud de reserva para ver los datos de contacto.");
			window.location.href="notificacion.php";
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