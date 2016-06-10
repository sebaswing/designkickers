<?php  //  consulta con sql de todas las categorias de la tabla de couchiin

	   $link = conectar();  // llamo a la funcion conectar 
	   $sql='SELECT id_ciudad,ciudad_nombre FROM ciudad'; // hago la consulta para traerme el id y el nombre de la categoria
	   $ciudades = mysqli_query($link , $sql);   // Realizo la consulta a la base de datos

?>  