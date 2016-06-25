<?php
 include("functions.php");
 $link = conectar();
 $sql2="UPDATE reserva as a1 left join couch b1 on (a1.idcouch = b1.id_couch) set a1.estado = 'aceptada', a1.nueva = 1 WHERE a1.idreserva = '".$_POST['idreserva']."'";
		$aceptarreserva= mysqli_query($link , $sql2) or die (mysqli_error($link));
		//eliminamos las solicitudes que se superponen
		$verificar = verificarparaeliminar($_POST['idcouch'], $_POST['idreserva'], $_POST['fecha_inicio'], $_POST['fecha_fin']);
		while ($nop = mysqli_fetch_assoc($verificar)){
			$sql1="UPDATE reserva as a1 left join couch b1 on (a1.idcouch = b1.id_couch) 
				set a1.nueva = 1, a1.estado = 'rechazada' 
				WHERE a1.idreserva = ".$nop['idreserva']."";
			$aceptarreserva= mysqli_query($link , $sql1) or die (mysqli_error($link));
					}
		 ?>
			<script>
			alert("Se ha aceptado la solicitud de reserva seleccionada.");
			window.location.href="notificacion.php";
			</script>
		