<?php  //  consulta con sql de todas las categorias de la tabla de couchiin

		$link = conectar(); 
	   $sql="SELECT b.id_couch as idcouch, a.idreserva, a.descripcion, a.fecha_inicio, a.fecha_fin, a.estado 
	   FROM couch b inner join reserva a on (a.idcouch = b.id_couch) WHERE b.mail = '".$_SESSION['mail']."' "; 
	   $mensajes = mysqli_query($link , $sql);   // Realizo la consulta para cargar reservas pendientes para MIS couch
	   
	    $sql11="SELECT b.id_couch as idcouch, a.idreserva, b.titulo, a.descripcion, a.fecha_inicio, a.fecha_fin, a.estado 
	   FROM couch b inner join reserva a on (a.idcouch = b.id_couch) WHERE a.mail = '".$_SESSION['mail']."'"; 
	   $mensajesmios = mysqli_query($link , $sql11); //realizo consulta para ver los estados de mis solicitudes de reserva OTROS couch
	   
	   function datosduenocouch($idcouch){
			$link = conectar();
		 $sql2 = "SELECT a.mail, a.nombre, a.apellido, a.telefono FROM couch b inner join usuario a on (a.mail = b.mail) WHERE b.id_couch = ".$idcouch.""; 
			return $datos = mysqli_query($link , $sql2);
	   }
	   
	   function datosduenoreserva($idreserva){
			$link = conectar();
		 $sql2 = "SELECT a.mail, a.nombre, a.apellido, a.telefono FROM reserva b inner join usuario a on (a.mail = b.mail) WHERE b.idreserva = ".$idreserva.""; 
			return $datos = mysqli_query($link , $sql2);
	   }
	   
	 //  $sql2="UPDATE reserva as a1 left join couch b1 on (a1.idcouch = b1.id_couch) set a1.nueva = 0 WHERE b1.mail = '".$_SESSION['mail']."' and a1.nueva = 1 ";
	//	$actualizarvision= mysqli_query($link , $sql2); //no se ven mas como nuevos las ultimas reservas.
?>  