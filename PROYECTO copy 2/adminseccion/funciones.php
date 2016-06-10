<?php   
	//set_include_path("C:/xampp/htdocs/testProyecto/");
	include("conexion.php");
	$link = conectar();
	$categoria=$_POST['categoria'];
	$sql= "INSERT INTO categoria(id_categoria,nombre) values('','".$categoria."')";
	$insertar = mysqli_query($link , $sql);
?>
      <script>
        alert("se inserto correctamente");
        window.location.href="backend.php";
      </script>
   <?php
?>