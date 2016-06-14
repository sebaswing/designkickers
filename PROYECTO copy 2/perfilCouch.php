<?php
 // include("conexion.php");
 // codigo agregado por julian ---------------------
 session_start();
 include("functions.php");
 $t = login_check($mysqli);
//--------------------------------------
   include("consultacategoria.php");
  include("consultaciudades.php");
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
	          <form  method="get" action="perfil.php">
	                  <button>MODIFICAR COUCH</button>
	                  <br>
	          </form>
        </div>
	</div>
	<!-- ACA VA LA CONSULTA PARA MOSTRAR EN EL DETALLE-->
	<?php
					$aux = $_GET['id_couch'];
					if( isset($aux))
						echo "hola";
                     $link = conectar();
                     $sql="SELECT  	c.id_couch idCouch,
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
                           AND c.id_couch = ".$aux;// falta poner el couch que es en cada uno 
                  $couch= mysqli_query($link , $sql); //Envia una consulta MySQL
         		 //echo $sql;

                 while($fila = mysqli_fetch_assoc($couch))
                 {     ?>
                     
	<div id="general">
		<div id="infoPerfil">
			<div id="foto">
				<img src = 
				<?php
					echo"\"";
					echo "mostrar.php?id=".$fila['couch'];

					echo"\"";
				?>
				/>

				<h2><?php 
                       echo $fila['titulo']; // imprimo loft
                    ?>
				</h2>
				<div id="muestra" >
						<img src="FOTOS/casa2.png">
						<img src="FOTOS/casa2.png">
						<img src="FOTOS/loft1.png">
						<img src="FOTOS/default.jpg">
					</div>	
				<br>
				<br>
				<br>
				<p>
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
				</p>
				<p>
				Capacidad:
				<?php
                     echo $fila['capacidad'];
                ?>
                </p>
                <p>
                Ubicacion:
                <?php
                	echo $fila['nombreCiudad'];
                ?>
                </p>

					<hr>
			</div>	
		</div>
		<br>
		<br>	
		<br>
		<br>
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

		</div>	
	</div>
	<?php
                   }
            		?>
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