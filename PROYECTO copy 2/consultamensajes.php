<?php  //  consulta con sql de todas las categorias de la tabla de couchiin

		$link = conectar(); 
	   $sql="SELECT b.id_couch as idcouch, a.idreserva, a.descripcion, a.fecha_inicio, a.fecha_fin, a.estado 
	   FROM couch b inner join reserva a on (a.idcouch = b.id_couch) WHERE b.mail = '".$_SESSION['mail']."' and a.ver = 1 "; 
	   $mensajes = mysqli_query($link , $sql);   // Realizo la consulta para cargar reservas pendientes para tus couch
	   
	    $sql1="SELECT b.id_couch as idcouch, a.idreserva, a.descripcion, a.fecha_inicio, a.fecha_fin, a.estado 
	   FROM couch b inner join reserva a on (a.idcouch = b.id_couch) WHERE a.mail = '".$_SESSION['mail']."' and a.verc = 1 "; 
	   $mensajesmios = mysqli_query($link , $sql1); //realizo consulta para ver los estados de mis solicitudes de reserva
	   
	   $sql2="UPDATE reserva as a1 left join couch b1 on (a1.idcouch = b1.id_couch) set a1.nueva = 0 WHERE b1.mail = '".$_SESSION['mail']."' and a1.ver = 1 ";
		$actualizarvision= mysqli_query($link , $sql2); //no se ven mas como nuevos las ultimas reservas.
?>  