<?php  //  consulta con sql de todas las categorias de la tabla de couchiin
	 session_start();
 include("functions.php");
 $t = login_check($mysqli);
//-----------------------------------------------------
if( $t == 1) {
	   $link = conectar();  // llamo a la funcion conectar 
	   $sql='INSERT into reserva(mail,idcouch,estado,fecha_inicio,fecha_fin,descripcion,capacidad) 
	   values("'.$_SESSION['mail'].'","'.$_POST['idcouch'].'","pendiente","'.$_POST['date'].'","'.$_POST['datecierre'].'","'.$_POST['descripcion'].'", "'.$_POST['capacidad'].'")';
	   $reserva = mysqli_query($link , $sql) or die (mysqli_error($link));	
	   if ($reserva == 1) {
		?>
		<script>
        alert("Se ha enviado solicitud");
<?php echo "window.location.href='perfilcouch.php?id=".$_POST['idcouch']."';"; ?>
		</script>
	 <?php
	   }
	   
	   }else{  ?>
        <script>
        alert("Error: acceso denegado");
        <?php echo "window.location.href='perfilcouch.php?id=".$_POST['idcouch']."';"; ?>
     </script> 
     <?php
}
?>

