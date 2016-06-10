<?php   
	//set_include_path("C:/xampp/htdocs/testProyecto");
	include("conexion.php");
	session_start();
	$link = conectar();
	$mail= $_SESSION['mail'];
	
	if (isset($_POST['telefono'])) { $var1 =$_POST['telefono'];  $var2 ="telefono";} else { $var1 = ""; $var2 = "";}
	if (isset($_POST['password'])) { $var1 =$_POST['password'];  $var2 ="password";} 
	if (isset($_POST['fecha_nac'])){ $var1 =$_POST['fecha_nac']; $var2 ="fecha_nac";}
	if (isset($_POST['apellido'])) { $var1 =$_POST['apellido'];  $var2 ="apellido";}
	if (isset($_POST['nombre']))   { $var1 =$_POST['nombre'];    $var2 ="nombre";}
	
	$sql= "update usuario set ".$var2." ='".$var1."' where mail ='".$mail."' ";
	$insertar = mysqli_query($link , $sql);
if ($link->query($sql) === TRUE) {
   // echo "Record updated successfully";
} else {
    echo "Error updating record: " . $link->error;
}
?>
      <script>
        window.location.href="perfil.php";
      </script>
   <?php
?>