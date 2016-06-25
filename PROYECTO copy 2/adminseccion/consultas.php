
<?php  //  consulta con sql de todas las categorias de la tabla
	//	set_include_path("C:/xampp/htdocs/testProyecto/");
	include("conexion.php");
	   $link = conectar();
	   $sql='SELECT nombre
	   		  FROM categoria ';
	   $categorias = mysqli_query($link , $sql); 
		 while ($row = mysqli_fetch_assoc($categorias))			
					  {
	   				 //Aqui mostrariamos los datos que se quieran sobre los productos
					     //	aca va la tabla de productos
					 	          echo $row['nombre']  ?> </br>
								  <?php 
					  }

?>



