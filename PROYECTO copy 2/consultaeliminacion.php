<?php  //  consulta con sql de todas las categorias de la tabla de couchiin

	   $link = conectar();  // llamo a la funcion conectar 
	   $sql='SELECT nombre   
	   		  FROM categoria  t inner join couch p on (t.id_categoria = p.id_categoria)'; // hago la consulta para traerme el id y el nombre de la categoria
	   $categoriaareglo = mysqli_query($link , $sql);   // Realizo la consulta a la base de datos

?>  