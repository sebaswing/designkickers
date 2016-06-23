
<?php
 // include("conexion.php");
 // codigo agregado por julian ---------------------
 session_start();
 include("functions.php");
 $t = login_check($mysqli);
//--------------------------------------
  //include("consultacategoria.php");
  //include("consultaciudades.php");
//-----------------------------------------------------
if( $t == 1) {
//-----------------------------------------------------										
?>
<!--PARA EL BORRADO LOGICO DEL COUCH -->	
<?php										
	{
		$link = conectar(); 
		$id = $_GET['idcouch'];  // me traigo el idcouch del boton
		// consulta para traerme todos los couch que coincidan con ese couch
		$query = "SELECT * 
					FROM couch 
					WHERE id_couch=".$id;
		$result = mysqli_query($link, $query); // envio la consulta a mysql
		$fila=mysqli_fetch_assoc($result);
		if (mysqli_num_rows($result)!= 0) // si result me da distinto a 0
		{
			// un if donde las fechas no coincidan
			// elimino logicamente con la consulta//
			$consul='UPDATE couch SET eliminado = 1 WHERE id_couch='.$id;
			$eliminar=mysqli_query($link,$consul);
		}
		else
		{
			die ('Error en la eliminacion.' . mysqli_error($link));
		}
   }
//<!--  codido de iniciar sesion-->
 } else {  ?>
        <script>
        alert("no ha iniciado sesion");
        window.location.href="index.php";
     </script> 
     <?php
}
?>