<?php   
	// falta validar campos vacios y conectar con las variables session
	include("conexion.php");
	session_start();
	$link = conectar();
	$categoria=$_POST['categoria'];
    $mail=$_POST['mail'];
	$titulo=$_POST['titulocouch'];
	$fechapublicacion=$_POST['date'];
	$fechacierre=$_POST['datecierre'];
	$ubicacion=$_POST['ubicacion'];
	$capacidad=$_POST['capacidad'];
	$descripcion=$_POST['descripcion'];
	$sql= "INSERT INTO couch(id_couch, mail, id_categoria, fecha_publicacion, fecha_cierre, ubicacion, capacidad, descripcion, titulo)
	values('','prueba2@gmail.com','".$categoria."','".$fechapublicacion."','".$fechacierre."', '".$ubicacion."','".$capacidad."', '".$descripcion."', '".$titulo."')";
	$insertar = mysqli_query($link , $sql) or die (mysqli_error($link));
	$sql2= "";
?>
      <script>
        window.location.href="couch.php";
      </script>
   <?php
?>