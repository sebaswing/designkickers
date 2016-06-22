<?php
 // include("conexion.php");
 // codigo agregado por julian ---------------------
 session_start();
 include("functions.php");
 $t = login_check($mysqli);
//--------------------------------------
 //  include("consultamensajes.php");
//-----------------------------------------------------
if( $t == 1) {
//-----------------------------------------------------
?>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="estilo.css"> 
	<link href='https://fonts.googleapis.com/css?family=Averia+Sans+Libre' rel='stylesheet' type='text/css'> 
	<link rel="icon"  href="FOTOS/favicon.jpg" />
	<script type="text/javascript" src="main.js"></script>
	<script type='text/javascript' src="//ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>	
	<title>Couch Inn!</title>
</head>
<div id="contenedorgeneral">
	<div id="contenidobuscador">
		<a href="usuariocomun.php"><img class="iniciologo" src="FOTOS/logo.png" alt="logo"></a>
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
        </div>
	</div>
	 <hr> <!-- esto es nuevo-->
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
					<li><a href="">Contacto</a></li>
				</ul>
	</nav><!-- Aqui estamos cerrando la nueva etiqueta nav -->
</div>
	<div id="contenedorcajasmensajes">
		<p>no posee mensajes</p>
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