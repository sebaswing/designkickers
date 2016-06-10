<?php   
	//set_include_path("C:/xampp/htdocs/testProyecto/");
	include("conexion.php");
	$link = conectar();
	$categoria=$_POST['nombre'];
	   $sql='SELECT nombre   
	   		  FROM categoria  t inner join couch p on (t.id_categoria = p.id_categoria)
	   		  where t.nombre = "'.$categoria.'"'; // hago la consulta para traerme el id y el nombre de la categoria
	$consultar = mysqli_query($link , $sql) or die (mysqli_error($link));
	$row = mysqli_fetch_assoc($consultar);
	
	if ($row == 0){
		$sql1='DELETE   
	   		  FROM categoria
	   		  where nombre = "'.$categoria.'"'; 
		$eliminar = mysqli_query($link , $sql1)or die (mysqli_error($link));
	} else {
	?> 
	<script>
		alert("no se puede eliminar debido a que existen couch que la utilizan.");
       window.location.href="backend.php";
      </script>
<?php
	}
?>
	  
      <script>
      alert("se elimino el elemento");
        window.location.href="backend.php";
      </script>
   <?php
?>