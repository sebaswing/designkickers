<?php
	include("conexion.php");
	if(isset($_GET['id']))
	{ 
	    $id = $_GET['id']; 

	    $link = conectar();
	    $sql = "SELECT imagen, type
	     		from fotografia 
	     		WHERE id_couch = ".$id; 
	    $resul = mysqli_query($link, $sql); 
	    $fila = mysqli_fetch_assoc($resul); 
	    header("Content-type: ".$fila['type']); 
	    print $fila['imagen']; 
	} 
 ?>