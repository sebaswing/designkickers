<?php
 include("functions.php");
 $link = conectar();
 $sql2="UPDATE reserva as a1 left join couch b1 on (a1.idcouch = b1.id_couch) 
 set a1.nueva = 0, a1.estado = 'cancelada' 
 WHERE a1.idreserva = ".$_POST['idreserva']."";
		$aceptarreserva= mysqli_query($link , $sql2) or die (mysqli_error($link));
		if ($aceptarreserva){
			?>
			<script>
			alert("solicitud cancelada.");
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