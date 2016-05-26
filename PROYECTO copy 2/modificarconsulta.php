<?php   
	//set_include_path("C:/xampp/htdocs/testProyecto");
	include("conexion.php");
	$link = conectar();
	$nombreviejo=$_POST['modcategoriaviejo'];
	$nombre=$_POST['modcategoria'];
	$sql= "update categoria set nombre = '".$nombre."' where nombre = '".$nombreviejo."'";
	$insertar = mysqli_query($link , $sql);
if ($link->query($sql) === TRUE) {
   // echo "Record updated successfully";
} else {
    echo "Error updating record: " . $link->error;
}
?>
      <script>
        window.location.href="backend.php";
      </script>
   <?php
?>