<?php	 // aca se imprime las reservas recibidas para nuestro couch
				session_start();
				include("../functions.php");
				include("../consultamensajes.php");
				while($lista = mysqli_fetch_assoc($mensajes))
                 { 	if($lista['estado'] == 'rechazada') {
					echo "<li>";
					echo "<div id='contenedormensajes' name='contenedormensajes'>";
					echo "<h1>Mensaje: pedido de reserva couch ".$lista['idcouch']."</h1>";
					echo "<h1>Estado: ".$lista['estado']."</h1>";
					echo "<h1>Descripcion: ".$lista['descripcion']."</h1>";
					
					echo "<br>";
					echo "<h1>Fecha pedida:".$lista['fecha_inicio']." al ".$lista['fecha_fin']."</h1>";
					
					echo "</div>"; 
				   echo "</li>";
				 }}
				 ?>