<?php   
	//set_include_path("C:/xampp/htdocs/testProyecto/");
	include("conexion.php");
	$link = conectar();
	$categoria=$_POST['categoria'];
	// para controlar que no agrege una categoria repetida
	$consulta = "select * from categoria where nombre= '$categoria'";
   	$nomcategoaria = mysqli_query($link , $consulta);
   	$row = mysqli_num_rows($nomcategoaria);
   	if ($row == 1 ) {
      ?>
      <script>
        alert("existe una categoria con ese mismo nombre");
        window.location.href="backend.php";
       </script> 
	<?php
	   }
	$sql= "INSERT INTO categoria(id_categoria,nombre) values('','".$categoria."')";
	$insertar = mysqli_query($link , $sql);
?>
      <script>
        window.location.href="backend.php";
      </script>
   <?php
?>