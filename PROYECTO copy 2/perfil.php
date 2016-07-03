<?php
//include("conexion.php");
//session_start();
 // codigo agregado por julian ---------------------
 session_start();
 include("functions.php");
 
  include("nuevasnotificaciones.php");
 $t = login_check($mysqli);
if( $t == 1) {
//-----------------------------------------------------
    $link = conectar();

    $sql = 'SELECT nombre FROM `usuario` WHERE numTarjeta is NOT NULL AND mail = "'.$_SESSION['mail'].'"';
    $consulta= mysqli_query($link , $sql);
    $row = mysqli_fetch_assoc($consulta);
    //echo $row['nombre'];  
 ?>
<html>
<head>
	<meta charset="UTF-8"> <!-- Especifica la codificación de caracteres para el documento HTM-->
	<link rel="stylesheet" type="text/css" href="estiloperfil.css">
	<link rel="stylesheet" type="text/css" href="Menu/estiloMenu.css">  
	<link href='https://fonts.googleapis.com/css?family=Averia+Sans+Libre' rel='stylesheet' type='text/css'>
	<link rel="icon"  href="FOTOS/favicon.jpg" />
	<script src="modperfil.js" type="text/javascript"></script> 
	<script type="text/javascript" src="validacion.js"></script> <!--se procesa el archivo javascrip-->
	<title>Couch Inn!</title>
</head>
<body>
<div id="contenedorgeneral">
	<div id="contenidobuscador">
		<header>
			<?
				include "Menu/menu.php";
			?>
		</header>
	</div>
	<div id="perfilusuario">
	<?php  //  consulta con sql de todas las categorias de la tabla
					$link = conectar();  // llamo a la funcion conectar 
					$sql="SELECT mail, password, fecha_nac, apellido, nombre, telefono   
							FROM usuario WHERE mail='".$_SESSION['mail']."'"; 
					$resultado = mysqli_query($link , $sql) or die (mysqli_error($link));  			
					$row = mysqli_fetch_assoc($resultado);
					?>
						<ul>		
								  <li>
								  <form method="POST"  id="formmail" action="modperfil.php">
									<?php echo '<td><p>Usuario: </p></td><td><input type="hidden" value="'.$row['mail'].'" id="mail"> <p id="change0">'.$row['mail'].'</p></input></td>'; ?>
								
									</form>
									</li>
								    <li>
									<form method="POST" name="formulario1" onsubmit=" return campovacio();" id="formpas" action="modperfil.php">
									<?php echo '</br><p>password: </p><input  type="hidden" id="password" name="password" value="'.$row['password'].'"><p id="change1">****</p></input>'; ?>
									<button id="modificarpas"  onclick="javascript:modificarpas1()" value="modificar">modificar</button>
								  </form>
								  </li>
								  <li>
								  <form method="POST" name="formulario2" onsubmit=" return fecha();" id="formfecha" action="modperfil.php">
									<?php echo '</br><p>Fecha de nacimiento: </p><input  type="hidden" id="fecha_nac"';
										  date_default_timezone_set('America/Argentina/Buenos_Aires');
										  $fecha= new DateTime();
										  $año=$fecha->format('Y');
										  $anio=$año-18;
										  $mes= $fecha->format('m');
										  $dia=$fecha->format('d');
										  $escribir= $anio."-".$mes."-".$dia;
										  $nueva= date_create($escribir);
										  echo "min=\"".$nueva->format('Y-m-d')."\"";
										  echo 'name="fecha_nac" value="'.$row['fecha_nac'].'"><p id="change2">'.$row['fecha_nac'].'</p></input>'; 
									?>
									<button id="modificarfecha" onclick="javascript:modificarfecha1()" value="modificar">modificar</button>
								  </form>
								  </li>
								  <li>
								  <form method="POST" name="formulario3" onsubmit=" return validarape();" id="formape" action="modperfil.php">
									<?php echo '</br><p>Apellido: </p><input type="hidden" id="apellido" name="apellido" value="'.$row['apellido'].'"><p id="change3">'.$row['apellido'].'</p></input>'; ?>
									<button id="modificarape" onclick="javascript:modificarape1()" value="modificar">modificar</button>
								  </form>
								  </li>
								  <li>
								  <form method="POST" name="formulario4" onsubmit=" return validarnom();" id="formnom" action="modperfil.php">
									<?php echo '</br><p>Nombre: </p><input type="hidden" id="nombre" name="nombre" value="'.$row['nombre'].'"><p id="change4">'.$row['nombre'].'</p></input>'; ?>
									<button id="modificarnom" onclick="javascript:modificarnom1() "value="modificar">modificar</button>
								  </form>
								  </li>
								  <li>
								  <form method="POST" name="formulario5" onsubmit=" return validartel();" id="formtel" action="modperfil.php">
									<?php echo '</br><p>Telefono: </p><input type="hidden" id="telefono" name="telefono" value="'.$row['telefono'].'"><p id="change5">'.$row['telefono'].'</p></input>'; ?>
									<button id="modificartel" onclick="javascript:modificartel1()" value="modificar">modificar</button>
								 </form>
								 </li>
						</ul><br />
								
		
	</div>
</div> 
<footer> <p>CouchInn es una marca registrada. Todos los derechos reservados</p> </footer>
</body>
</html>

<?php } 
else {  ?>
        <script>
        alert("no ha iniciado sesion");
        window.location.href="index.php";
     </script> 
     <?php
}
?>