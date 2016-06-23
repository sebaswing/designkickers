<?php
	session_start();
	include("../functions.php");
	include("../consultamensajes.php");
	//aca se imprimen los estados de nuestras reservas solicitadas
				while($lista = mysqli_fetch_assoc($mensajesmios))
                 {  if ($lista['estado'] == 'rechazada') {
					echo "<li>";
					echo "<div id='contenedormensajes' name='contenedormensajes'>";
					echo "<form  method='POST' action='cancelarreserva.php' >";
					echo "<h1>Mensaje: pedido de reserva para couch N".$lista['idcouch']."</h1>";
					echo "<h1>Estado: ".$lista['estado']."</h1>";
					echo "<br>";
					echo "<h1>Fecha pedida:</h1>".$lista['fecha_inicio']." al ".$lista['fecha_fin']."";
					echo "<input type='hidden' id='idreserva' name='idreserva' value='".$lista['idreserva']."' > </input>"; 
					echo "<input type='hidden' id='idcouch' name='idcouch' value='".$lista['idcouch']."' > </input>";
					echo "<input type='hidden' id='fecha_inicio' name='fecha_inicio' value='".$lista['fecha_inicio']."' > </input>"; 
					echo "<input type='hidden' id='fecha_fin' name='fecha_fin' value='".$lista['fecha_fin']."' > </input>"; 
					if ($lista['estado'] == 'pendiente') {?>
					<button onclick="pregunta()" id="cancelar">Cancelar</button>
					<?php } 
					echo "<br>";
					echo "</form>";
				 echo "</div> "; 
				   echo "</li>";
				 }}

	?>