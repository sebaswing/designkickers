<?php
include("conexion.php");
session_start();
?>

<html>
<head>
<link rel="stylesheet" type="text/css" href="estilo.css"> 
	<link href='https://fonts.googleapis.com/css?family=Averia+Sans+Libre' rel='stylesheet' type='text/css'>
	<script src= "js/main.js" type="text/javascript"></script> 
	<script  src="js/jquery-1.10.2.min.js" type="text/javascript"></script>

</head>
<div id="contenedorgeneral">
	<div id="contenidobuscador">
		<a href="index.php"><img class="iniciologo" src="FOTOS/logo.png" alt="logo"></a>
		<div id="botons">
			  <form  method="get" action="index.php" >
	                  <button id="cerrar" action="logout.php">CERRAR SESION</button>
	                  <br>
	          </form>
	          <form  method="get" action="premium.php">
	                  <button action="logout.php">HACETE PREMIUM!</button>
	                  <br>
	          </form>
        </div>
	</div>
	<div id="perfilusuario">
	<?php  //  consulta con sql de todas las categorias de la tabla
					$link = conectar();  // llamo a la funcion conectar 
					$sql="SELECT mail, password, fecha_nac, apellido, nombre, telefono   
							FROM usuario WHERE mail='".$_SESSION['mail']."'"; 
					$resultado = mysqli_query($link , $sql) or die (mysqli_error($link));  			
					$row = mysqli_fetch_assoc($resultado);
					echo '<table>';		
								  
								  echo '<tr>';
								  echo '<input type="hidden" name="mail" value="'.$row['mail'].'" />';
								  echo '<br/>';
								  echo '<p>Usuario: </p> '.$row['mail'].'';
								 // echo $row['mail'];
								 echo '<button name="modificar" value="modificar">modificar</button>';
								  echo '<br/>';
								  echo '<p>password: </p>';
								  echo '<input type="hidden" name="password" value="'.$row['password'].'" />';
								  echo $row['password'];
								  echo '<button name="modificar" value="modificar">modificar</button>';
								  echo '<br/>';
								  echo '<p>Fecha de nacimiento: </p>';
								  echo '<input type="hidden" name="fecha_nac" value="'.$row['fecha_nac'].'" />';
								  echo $row['fecha_nac'];
								  echo '<button name="modificar" value="modificar">modificar</button>';
								  echo '<br/>';
								  echo '<p>Apellido: </p>';
								  echo '<input type="hidden" name="apellido" value="'.$row['apellido'].'" />';
								  echo $row['apellido'];
								  echo '<button name="modificar" value="modificar">modificar</button>';
								  echo '<br/>';
								  echo '<p>Nombre: </p>';
								  echo '<input type="hidden" name="nombre" value="'.$row['nombre'].'" />';
								  echo $row['nombre'];
								  echo '<button name="modificar" value="modificar">modificar</button>';
								  echo '<br/>';
								  echo '<p>Telefono: </p>';
								  echo '<input type="hidden" name="telefono" value="'.$row['telefono'].'" />';
								  echo $row['telefono'];
								  echo '<button name="modificar" value="modificar">modificar</button>';
								  echo '<br/>';
						echo '</table><br />';
								?>
		
	</div>
</div> 
<footer> <p>CouchInn es una marca registrada. Todos los derechos reservados</p> </footer>

</html>