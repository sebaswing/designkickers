<?php
 // include("conexion.php");
 // codigo agregado por julian ---------------------
 session_start();
 include("functions.php");
 $t = login_check($mysqli);
//--------------------------------------
  include("consultacategoria.php");
  include("consultaciudades.php");
  include("nuevasnotificaciones.php");
//-----------------------------------------------------
if( $t == 1) {
//-----------------------------------------------------

?>
<!DOCTYPE html>
<html>
<head>
	<link href='https://fonts.googleapis.com/css?family=Averia+Sans+Libre' rel='stylesheet' type='text/css'> 
	<link rel="stylesheet" type="text/css" href="n.css">
	<link rel="stylesheet" type="text/css" href="estilo.css">
	<title></title>
	<link rel="icon" href="FOTOS/favicon.jpg">
</head>
<body>
	<div id="contenidobuscador">
		<a href="usuariocomun.php"><img class="iniciologo" src="FOTOS/logo.png" alt="logo"></a>
		<div id="botons">
			  <form  method="get" action="logout.php" >
	                  <button id="cerrar">CERRAR SESION</button>
	                  <br>
	          </form>  
		            <!-- le paso el id en el action para la modificacion --> 
		          	<form  method="GET"  action="modificarcouch.php?action=editar&idcouch=<?php echo $_GET['id'] ?>">
		          	<input type="hidden" id="idcouch" name="idcouch" value="<?php echo $_GET['id'] ?>" >
		           <input type="hidden" id="action" name="action" value="first" >
		             <button  id="modificar"   >MODIFICAR COUCH</button>
		             <br>
	          </form>
			    <!-- parte nueva                                              -->			  
			  <form  method="get" action="notificacion.php">
	                  <?php
						$new = mysqli_fetch_assoc($nuevosmensajes);
					  if ($new['cantidad'] == 0){
						  echo "<button>Notificaciones</button>";
					  }else {
						  echo "<button>Notificaciones (".$new['cantidad'].")</button>";
					  }
					  
					  ?> 
					  <br>
	          </form>
		<!--___________________________________-->	
        </div>
	</div>
	<!-- ACA VA LA CONSULTA PARA MOSTRAR EN EL DETALLE-->
	<?php
                    $link = conectar();
                    $sql="SELECT  	c.mail mail,
									c.id_couch idCouch,
                     				c.fecha_publicacion inicio,
                     				c.fecha_cierre cierre,
                     				c.capacidad capacidad,
                     				c.descripcion descripcion,
                     				c.titulo titulo,
                     				ciu.ciudad_nombre nombreCiudad,
                     				cat.nombre nombreCategoria	
                           FROM couch c 
                           INNER JOIN  categoria cat 
                           INNER JOIN ciudad ciu 
                           WHERE cat.id_categoria = c.id_categoria AND ciu.id_ciudad = c.id_ciudad
                           AND c.id_couch = ".$_GET['id'];// falta poner el couch que es en cada uno 
                  $couch= mysqli_query($link , $sql) or die(mysqli_error($link)); //Envia una consulta MySQL
         		 //echo $sql;
                 while($fila = mysqli_fetch_assoc($couch))
                 {     ?>
				<div id="general">
					<div id="infoPerfil">
					  <div id="foto">
						<img src = 
						<?php
							echo "mostrar.php?id=".$fila['idCouch'];
						?>
						/>
						<h2><?php 
		                       echo $fila['titulo']; // imprimo loft
		                    ?>
						</h2>
						<div id="muestra" >
								<?php
				                    $link = conectar();
									$sql = "SELECT id_fotografia FROM fotografia WHERE fotoPerfil =0 and id_couch = ".$fila['idCouch'];
				                  	$couch= mysqli_query($link , $sql); //Envia una consulta MySQL
					                 while($foto = mysqli_fetch_assoc($couch))
					                 {    
											echo "<img src='";
											echo "mostrarFotosCouch.php?id=".$foto['id_fotografia'];
											echo "' >";						 	
									 }
								?>
						</div>	
				<br>
				<br>
				<br>
				<br>
				<br>
				<br>
				<br>
				<br>
				<hr>
				Descripcion:
				<br>
				<div>
					<?php
                          echo $fila['descripcion'];
                     ?>
				</div>
				<br>
				Capacidad:
				<?php
                     echo $fila['capacidad'];
                ?>
                <br>
                <br>
                Ubicacion:
                <?php
                	echo $fila['nombreCiudad']; 
                ?>
                <br>
                <hr>
			</div>	
		</div>
		<br>
		<br>	
		<br>
		<?php
        // <!--formulario para enviar a la pagina de solicitar couch -->
			if ($fila['mail'] != $_SESSION['mail']){
			echo "<form  method='POST' action='solicitarcouch.php?id=".$fila['idCouch']."'>";
			echo "<input type='hidden' id='idcouch' name='idcouch' value='".$fila['idCouch']."'/>"; ?> 			 
	        <button id="campos"  align="right" type="submit" name="solicitar" >Solicitar </button>
	        <!--<button>Solicitar Couch</button>-->
			<br>
			</form>
				 <?php } } ?>			
		<br>
		<br>
		<!--	
		<textarea placeholder="ingresa tu pregunta" rows="10"></textarea>
		<input type="submit" value="aceptar" name="realizarPregunta">
		<div id="preguntas">
			<p>
			<fieldset>
				<label ><p id="pregunta">Pregunta:<br>
						Sed at ipsum metus. Fusce velit lectus, venenatis in sem sit amet, placerat aliquet elit. Aliquam erat volutpat. Curabitur sed dui consectetur, pharetra sapien eu, venenatis quam. Nulla vitae felis sed arcu semper feugiat vitae eu sapien. Proin at consequat ligula. Pellentesque nec blandit erat. Nam sagittis sapien urna, quis porta leo mattis ac. Quisque mollis sit amet nisi at rhoncus. Phasellus vitae neque egestas, condimentum quam quis, sodales quam.
				</p></label>
				<hr>
				<label id="respuesta">Respuesta:<br>
						Sed at ipsum metus. Fusce velit lectus, venenatis in sem sit amet, placerat aliquet elit. Aliquam erat volutpat. Curabitur sed dui consectetur, pharetra sapien eu, venenatis quam. Nulla vitae felis sed arcu semper feugiat vitae eu sapien. Proin at consequat ligula. Pellentesque nec blandit erat. Nam sagittis sapien urna, quis porta leo mattis ac. Quisque mollis sit amet nisi at rhoncus. Phasellus vitae neque egestas, condimentum quam quis, sodales quam.
				</label>
			</p>	
			</fieldset>

		</div>-->	
	</div>
</body>
</html>
<?php } else {  ?>
        <script>
        alert("no ha iniciado sesion");
        window.location.href="index.php";
     </script> 
     <?php
}
?>