<?php   
	//set_include_path("C:/xampp/htdocs/testProyecto/");
	include("conexion.php");
	$link = conectar();
	$categoria=$_POST['nombre'];
	$sql= "DELETE from categoria where nombre = '".$categoria."'";
	$insertar = mysqli_query($link , $sql);
?>
      <script>
        alert("se elimino correctamente");
        window.location.href="backend.php";
      </script>
   <?php
?>