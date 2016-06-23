<?php	 // aca se imprime las reservas recibidas para nuestro couch
				session_start();
				include("C:/xampp/htdocs/entrega/functions.php");
	include("C:/xampp/htdocs/entrega/consultamensajes.php");
				while($lista = mysqli_fetch_assoc($mensajes))
                 {  echo "<li>";
					echo "<div id='contenedormensajes' name='contenedormensajes'>";
					echo "<h1>Mensaje: pedido de reserva couch ".$lista['idcouch']."</h1>";
					echo "<h1>Estado: ".$lista['estado']."</h1>";
					echo "<h1>Descripcion:</h1>";
					echo $lista['descripcion'];
					echo "<br>";
					echo "<h1>Fecha pedida:</h1>".$lista['fecha_inicio']." al ".$lista['fecha_fin']."";
					?>
						<br>
						<form  method="POST" action="aceptarreserva.php" >
							<?php echo "<input type='hidden' id='idreserva' name='idreserva' value='".$lista['idreserva']."' > </input>"; 
									echo "<input type='hidden' id='idcouch' name='idcouch' value='".$lista['idcouch']."' > </input>";
									echo "<input type='hidden' id='fecha_inicio' name='fecha_inicio' value='".$lista['fecha_inicio']."' > </input>"; 
									echo "<input type='hidden' id='fecha_fin' name='fecha_fin' value='".$lista['fecha_fin']."' > </input>"; ?>
							<button onclick="pregunta()" id="cerrar">Aceptar</button>
						<br>
						</form>
					  <form  method="POST" action="rechazarreserva.php">
							<?php echo "<input type='hidden' id='idreserva1' name='idreserva1' value='".$lista['idreserva']."' > </input>" ?>
							<button>Rechazar</button>
							  <br>
					  </form>
					<?php
					echo "</div>"; 
				 }  echo "</li>";
				 ?>