<?php
include('conexion.php');//incluye el archivo php que contiene la conexion
$link=conectar();//variable que almacena la conexión ala base de datos
echo "entro";
if(isset($_POST['modificar'])){ // si apreto modificar
	$id = $_POST['id_couch'];
	$titulo = $_POST['titulo'];
	$capacidad = $_POST['capacidad'];
	$fecha_publicacion = $_POST['fecha1'];
	$fecha_cierre = $_POST['fecha2'];
	$descrip = $_POST['descrip'];
	$ubicacion = $_POST['ubicaciones'];
	$categorias = $_POST['categorias'];
	$query="select * from couch where id_couch = '$id'";
	echo $query;
	$cierto = mysqli_query($link, $query);//ejecutando consulta
	if(!$cierto){ 
		echo "No existe!"; 
		echo "<a href='perfilCouch.php'>Regresar</a>";
	}
	else 
	{
	if($row=mysqli_fetch_array($cierto)){
		echo "<form action='modifcarfinal.php' method='post'>
		<input type='hidden' name='titulo' value='$row[titulo]'>
		<input type='text' name='capacidad' value='$row[capacidad]'>
		<input type='text' name='fecha1' value='$row[fecha_publicacion]'>
		<input type='text' name='fecha2' value='$row[fecha_cierre]'>
		<input type='text' name='descrip'value='$row[descripcion]'>
		<input type='text' name='ubicaciones' value='$row[id_ciudad]'>
		<input type='text' name='categorias' value='$row[id_categoria]'>
		<input type='submit' name='modificar' value='modificar'>
		</form>";
	}
	else{		
		echo "No existe!"; 
		echo "<a href='perfilCouch'>Regresar</a>";
		}
	}
	}
?>
