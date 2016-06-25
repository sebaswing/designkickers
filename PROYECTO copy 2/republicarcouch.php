<?php
	include("functions.php");
 	$link = conectar();
 	$sql= "UPDATE couch SET eliminado = 0 WHERE id_couch = '".$_GET['idcouch']."'";
 	$query = mysqli_query($link, $sql);
 	?>
 	<script> 
 	alert("Se ha republicado el couch con exito.");
 	window.location.href="usuariocomun.php";
 	</script>
 	<?php
?>