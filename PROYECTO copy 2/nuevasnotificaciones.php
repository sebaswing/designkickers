<?php  //  consulta con sql de todas las categorias de la tabla de couchiin

		$link = conectar(); 
	   $sql="SELECT count(a.idreserva) as cantidad 
		FROM couch b inner join reserva a on (a.idcouch = b.id_couch) WHERE b.mail = '".$_SESSION['mail']."' and a.nueva = 1 and a.estado = 'pendiente'
	   UNION
	   SELECT count(a.idreserva) as cantidad 
	   FROM reserva a WHERE a.mail = '".$_SESSION['mail']."' and a.nueva = 1 and a.estado <> 'pendiente'"; 
	   $nuevosmensajes = mysqli_query($link , $sql);   // Realizo la consulta a la base de datos

?>  
