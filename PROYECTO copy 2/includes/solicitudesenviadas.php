<?php
	session_start();
	include("../functions.php");
	include("../consultamensajes.php");
	//aca se imprimen los estados de nuestras reservas solicitadas
				while($lista = mysqli_fetch_assoc($mensajesmios))
                 {  echo "<li>";
					echo "<div id='contenedormensajes' name='contenedormensajes'>";
					echo "<form  method='POST' action='cancelarreserva.php' >";
					if ($lista['estado'] == 'pendiente'){
						echo "<h1>Pedido de reserva para el couch: ".$lista['titulo']."</h1>";
						echo "<h1>Estado: ".$lista['estado']."</h1>";
					}else {
						echo "<h2>Su solicitud de reserva para el couch: ".$lista['titulo']."</h2>";
						echo "<h2>ha sido ".$lista['estado']."</h2>";
					}
					echo "<br>";
					echo "<h1>Fecha pedida: ".$lista['fecha_inicio']." al ".$lista['fecha_fin']."</h1>";
					echo "<input type='hidden' id='idreserva' name='idreserva' value='".$lista['idreserva']."' > </input>"; 
					echo "<input type='hidden' id='idcouch' name='idcouch' value='".$lista['idcouch']."' > </input>";
					echo "<input type='hidden' id='fecha_inicio' name='fecha_inicio' value='".$lista['fecha_inicio']."' > </input>"; 
					echo "<input type='hidden' id='fecha_fin' name='fecha_fin' value='".$lista['fecha_fin']."' > </input>"; 
					if ($lista['estado'] == 'pendiente') {?>
					<button onclick="pregunta()" id="cancelar">Cancelar</button>
					<?php } else {
					if ($lista['estado'] == 'aceptada') {	
						$datos = mysqli_fetch_assoc(datosduenocouch($lista['idcouch']));
						echo "<br>";
						echo "<h1>Datos de contacto</h1>";
						echo "<br>";
						echo "<h1>nombre: ".$datos['nombre'].", ".$datos['apellido']."</h1>";
						echo "<br>";
						echo "<h1>Telefono: ".$datos['telefono']."</h1>";
					} }
					echo "<br>";
					echo "</form>";
					echo "</div>"; 
				 }  echo "</li>";

	?>