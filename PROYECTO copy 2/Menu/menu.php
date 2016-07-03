<!DOCTYPE html>
<html>
<head>
	<title>Menu Para Couch Inn</title>
	<link rel="stylesheet" type="text/css" href="estiloMenu.css">
</head>
<body align="center">
<div id="contenedorHead" style="position:relative;z-index:100;">
		<div id="logo">
				<a href="usuariocomun.php"><img  src="FOTOS/logo.png"></a>
		</div>
		<div id="menu">
			<ul class="nav" >	
				<li><a href="notificacion.php">
				<form  method="get">
	                  <?php
						$new = mysqli_fetch_assoc($nuevosmensajes);
					  	if ($new['cantidad'] == 0){
						  echo "Notificaciones ";
					 	 }else {
						  echo "Notificaciones (".$new['cantidad'].")";
					  	}
					  ?>
					  <br>
	         	 	</form>
	          		</a>
	          		<ul>
						<li><a href="notificacion.php">Mensajes Nuevos</a>	
						</li>
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
				</li>
				<li><a href="usuariocomun.php">couch</a>
					<ul>
						<li><a href="couch.php">Publica tu couch</a></li>
						<li><a href="couchpublicados.php">Mis Couch Publicados</a></li>
						<li><a href="misCouch.php">Mis Couch Despublicados</a></li>
					</ul>
				</li>
				<!-- <li><a href="#">reservas</a>
					<ul>
						<li><a href="#">sub1</a></li>
						<li><a href="#">sub2</a></li>
						<li><a href="#">sub3</a></li>
						<li><a href="#">sub4</a></li>
					</ul>
				</li>  
				UN ITEM MAS DEL MENU PARA LO QUE SE DESEE AGREGAR--> 
				<li><a href="#">
				<?
					echo $_SESSION['mail']; 
				?>
				</a>
					<ul>
						<li><a href="perfil.php">Modificar Perfil</a></li>
						<?
							$link = conectar();

						    $sql = 'SELECT nombre FROM `usuario` WHERE numTarjeta is NOT NULL AND mail = "'.$_SESSION['mail'].'"';
						    $consulta= mysqli_query($link , $sql);
						    $row = mysqli_fetch_assoc($consulta);

						    if ($row == 0){
						?>
						<li><a href="premium.php">Hacete Premium!</a></li>
						<?
							}
						?>
						<li><a href="logout.php">Cerrar Sesion</a></li>
					</ul>	
				</li>
			</ul>
	</div>
</div>
</body>
</html>