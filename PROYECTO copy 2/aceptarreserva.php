<?php
 include("functions.php");
 $link = conectar();
 $sql2="UPDATE reserva as a1 left join couch b1 on (a1.idcouch = b1.id_couch) set a1.ver = 0, a1.estado = 'aceptada' WHERE a1.idreserva = '".$_POST['idreserva']."'";
		$aceptarreserva= mysqli_query($link , $sql2) or die (mysqli_error($link));

$sql3="UPDATE reserva as a1 left join couch b1 on (a1.idcouch = b1.id_couch) set a1.ver = 0, a1.estado = 'rechazada' 
WHERE a1.estado <> 'aceptada' and a1.idcouch = '".$_POST['idcouch']."' and a1.fecha_inicio >= '".$_POST['fecha_inicio']."' and a1.fecha_fin >= '".$_POST['fecha_inicio']."' and a1.fecha_fin >= '".$_POST['fecha_fin']."'";
		$verificarrechazo= mysqli_query($link , $sql3) or die (mysqli_error($link));
		if($verificarrechazo){
			?>
			<script>
			window.location.href="notificacion.php";
			alert("se eliminaron pedidos de reserva que coincidian con la reserva aceptada.");
			window.location.href="notificacion.php";
			</script>
	  <?php
		}else{
		if ($aceptarreserva){
			?>
			<script>
			window.location.href="notificacion.php";
			</script>
	  <?php
		} else {
	?> 
		<script>
		alert("hubo un error al aceptar reserva.");
       window.location.href="notificacion.php";
       </script>

	<?php
		}}
	?>