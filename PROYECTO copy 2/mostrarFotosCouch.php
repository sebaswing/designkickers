<?php
		include("conexion.php");
		if(isset($_GET['id']))
		{
			$id=$_GET['id'];
			$link= conectar();
			$sql='SELECT imagen, type 
			FROM fotografia WHERE fotoPerfil = 0 and id_fotografia = '.$id;
			$resul = mysqli_query($link,$sql);
			$data= mysqli_fetch_assoc($resul);
			header("Content-type: ".$data['type']); 
			print ($data['imagen']); 	
		}
?>