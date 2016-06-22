<?php
 include("functions.php");
 $link = conectar();
 $sql2="UPDATE reserva as a1 left join couch b1 on (a1.idcouch = b1.id_couch) set a1.ver = 0, a1.estado = 'rechazada' WHERE a1.idreserva = '".$_POST['idreserva1']."'";
		$aceptarreserva= mysqli_query($link , $sql2) or die (mysqli_error($link));
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
	}
	?>