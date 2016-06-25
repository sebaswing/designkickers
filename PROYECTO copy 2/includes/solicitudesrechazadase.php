<?php
	session_start();
	include("../functions.php");
	include("../consultamensajes.php");
	//aca se imprimen los estados de nuestras reservas solicitadas
				while($lista = mysqli_fetch_assoc($mensajesmios))
                 {  if (($lista['estado'] == 'rechazada') or ($lista['estado'] == 'cancelada')) {
					echo "<li>";
					echo "<div id='contenedormensajes' name='contenedormensajes'>";
					echo "<form  method='POST' action='cancelarreserva.php' >";
					echo "<h2>Su solicitud de reserva para el couch: ".$lista['titulo']."</h2>";
						echo "<h2>ha sido ".$lista['estado']."</h2>";
						echo "<br>";
						echo "<h1>Fecha pedida: ".$lista['fecha_inicio']." al ".$lista['fecha_fin']."</h1>";
						echo "<br>";
					echo "<br>";
					echo "</form>";
				 echo "</div> "; 
				   echo "</li>";
				 }}

	?>