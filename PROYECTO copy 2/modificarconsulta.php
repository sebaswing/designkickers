<?php   
	//set_include_path("C:/xampp/htdocs/testProyecto");
	include("conexion.php");
	$link = conectar();
	$nombreviejo=$_POST['modcategoriaviejo'];
	$nombre=$_POST['modcategoria'];
	$sql= "update categoria set nombre = '".$nombre."' where nombre = '".$nombreviejo."'";
	$sql2="select * from categoria where nombre ='".$nombre."'";  // para verificar q coincidan el nombre viejo con uno que ya existe
	$resul= mysqli_query($link,$sql2); 
	$row = mysqli_num_rows($resul); //Obtiene el número de filas de un resultado
   	if ($row == 1 ) {
      ?>
      <script>
        alert("existe una categoria con ese mismo nombre");
        window.location.href="backend.php";
       </script> 
      <?php
	   }
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