<?php
include("conexion.php");
session_start();
?>

<html>
<head>
<link rel="stylesheet" type="text/css" href="estiloperfil.css"> 
	<link href='https://fonts.googleapis.com/css?family=Averia+Sans+Libre' rel='stylesheet' type='text/css'>
	<script  src="js/jquery-1.10.2.min.js" type="text/javascript"></script> 
	<script  src="modperfil.js" type="text/javascript"></script> 
	</head>
<div id="contenedorgeneral">
	<div id="contenidobuscador">
		<a href="index.php"><img class="iniciologo" src="FOTOS/logo.png" alt="logo"></a>
	   <form  method="get" action="index.php">
             <button action="logout.php">CERRAR SESION</button>
       </form>
	</div>
	<div id="perfilusuario">
	<?php  //  consulta con sql de todas las categorias de la tabla
					$link = conectar();  // llamo a la funcion conectar 
					$sql="SELECT mail, password, fecha_nac, apellido, nombre, telefono   
							FROM usuario WHERE mail='".$_SESSION['mail']."'"; 
					$resultado = mysqli_query($link , $sql) or die (mysqli_error($link));  			
					$row = mysqli_fetch_assoc($resultado);
					?>
						<table>		
								  <tr>
								  <form method="POST" id="formmail" action="modperfil.php">
									<?php echo '<td><p>Usuario: </p></td><td><input type="hidden" value="'.$row['mail'].'" id="mail"> <p id="change0">'.$row['mail'].'</p></input></td>'; ?>
							<!--		<button id="modificarmail" onclick="javascript:modificar()" value="modificar">modificar</button>    --->
									</form>
									</tr>
								    <tr>
									<form method="POST" id="formpas" action="modperfil.php">
									<?php echo '<td><p>password: </p></td> <td><input type="hidden" id="password" name="password" value="'.$row['password'].'"><p id="change1">****</p></input></td>'; ?>
									<td><button id="modificarpas"  onclick="javascript:modificarpas1()" value="modificar">modificar</button></td>
								  </form>
								  </tr>
								  <tr>
								  <form method="POST" id="formfecha" action="modperfil.php">
									<?php echo '<td><p>Fecha de nacimiento: </p></td><td><input type="hidden" id="fecha_nac" name="fecha_nac" value="'.$row['fecha_nac'].'"><p id="change2">'.$row['fecha_nac'].'</p></input></td>'; ?>
									<td><button id="modificarfecha" onclick="javascript:modificarfecha1()" value="modificar">modificar</button></td>
								  </form>
								  </tr>
								  <tr>
								  <form method="POST" id="formape" action="modperfil.php">
									<?php echo '<td><p>Apellido: </p></td><td><input type="hidden" id="apellido" name="apellido" value="'.$row['apellido'].'"><p id="change3">'.$row['apellido'].'</p></input></td>'; ?>
									<td><button id="modificarape" onclick="javascript:modificarape1()" value="modificar">modificar</button></td>
								  </form>
								  </tr>
								  <tr>
								  <form method="POST" id="formnom" action="modperfil.php">
									<?php echo '<td><p>Nombre: </p></td> <td><input type="hidden" id="nombre" name="nombre" value="'.$row['nombre'].'"><p id="change4">'.$row['nombre'].'</p></input></td>'; ?>
									<td><button id="modificarnom" onclick="javascript:modificarnom1() "value="modificar">modificar</button></td>
								  </form>
								  </tr>
								  <tr>
								  <form method="POST" id="formtel" action="modperfil.php">
									<?php echo '<td><p>Telefono: </p></td><td><input type="hidden" id="telefono" name="telefono" value="'.$row['telefono'].'"><p id="change5">'.$row['telefono'].'</p></input></td>'; ?>
									<td><button id="modificartel" onclick="javascript:modificartel1()" value="modificar">modificar</button></td>
								 </form>
								 </tr>
						</table><br />
								
		
	</div>
</div> 
<footer> <p>CouchInn es una marca registrada. Todos los derechos reservados</p> </footer>

</html>