<?php	 // aca se imprime las reservas recibidas para nuestro couch
				session_start();
				include("../functions.php");
				include("../consultamensajes.php");
				while($lista = mysqli_fetch_assoc($mensajes))
                 {  
					if ($lista['estado'] <> 'cancelada'){
							echo "<li>";
							echo "<div id='contenedormensajes' name='contenedormensajes'>";
							echo "<h1>Pedido de reserva couch ".$lista['idcouch']."</h1>";
							echo "<h1>Estado: ".$lista['estado']."</h1>";
							echo "<h1>Descripcion: ";
							echo $lista['descripcion'];
							echo "</h1><br>";
							echo "<h1>Fecha pedida: ".$lista['fecha_inicio']." al ".$lista['fecha_fin']."</h1>";
							if ($lista['estado'] == 'pendiente'){?>
								<br>
								<form  method="POST" action="aceptareliminar.php" >
									<?php echo "<input type='hidden' id='idreserva' name='idreserva' value='".$lista['idreserva']."' > </input>"; 
											echo "<input type='hidden' id='idcouch' name='idcouch' value='".$lista['idcouch']."' > </input>";
											echo "<input type='hidden' id='fecha_inicio' name='fecha_inicio' value='".$lista['fecha_inicio']."' > </input>"; 
											echo "<input type='hidden' id='fecha_fin' name='fecha_fin' value='".$lista['fecha_fin']."' > </input>"; 
											echo "<button>Aceptar</button>";
											?>
								</form>
							  <form  method="POST" action="rechazarreserva.php">
									<?php echo "<input type='hidden' id='idreserva' name='idreserva' value='".$lista['idreserva']."' > </input>" ?>
									<button>Rechazar</button>
									  <br>
							  </form>
							<?php } else {
								if($lista['estado'] == 'aceptada'){
									$datos = mysqli_fetch_assoc(datosduenoreserva($lista['idreserva']));
									echo "<br>";
									echo "<h1>Datos de contacto</h1>";
									echo "<br>";
									echo "<h1>nombre: ".$datos['nombre'].", ".$datos['apellido']."</h1>";
									echo "<br>";
									echo "<h1>Telefono: ".$datos['telefono']."</h1>";
								}
							}
							echo "</div>";
							echo "</li>";					
					}
				 }  
				 ?>