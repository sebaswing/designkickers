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
	<link rel="stylesheet" type="text/css" href="n.css">
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
                    // $id= $_GET['id_couch'];
                     echo "entro";
                     $link = conectar();
                     $sql='SELECT  	c.titulo titulo,  
                                    c.id_couch idcouch,
                                    c.descripcion descripcion,
                                    c.fecha_publicacion fechap,
                                    c.fecha_cierre  fechac,
                                    c.id_couch idcouch,
                                    c.mail mail,
                                    cat.nombre categoria,
                                    u.nombre nombre, 
                                    u.mail mail,
                                    u.telefono telefono
                           FROM couch c 
                           INNER JOIN  categoria cat ON (c.id_categoria = cat.id_categoria)
                           INNER JOIN  usuario u ON (c.mail = u.mail)
                           WHERE c.id_couch = "2" ';
                          // WHERE c.id_couch ='.$id.'';
                  $couch= mysqli_query($link , $sql); //Envia una consulta MySQL
                 while($fila = mysqli_fetch_assoc($couch))
                 {
                         ?>
                        <h1>
                         <br> 
                              <?php 
                                   echo $fila['titulo']; // imprimo loft
                              ?>
                         </h1>
                        <div class="descripcion">      
                                          <?php
                                              echo $fila['descripcion'];
                                          ?>
                         </div>
                          </br>
                         <div class="mail">
                                  <?php 
                                    echo $fila['mail'];
                                  ?>
                         </div>
                         <div class="fechap">      
                              <?php
                                  echo $fila['fechap'];
                               ?>
                       </div>
                        </br>
                       <div class="fechac">
                            <?php 
                                   echo $fila['fechac'];
                             ?>
                        </div>
                   <?php
                   }
            		?>
	<div id="general">
		<div id="infoPerfil">
			<div id="foto">
				<img src="FOTOS/casa1.png"/>
				<h2>TITULO:</h2>
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
					Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam at scelerisque diam, a mollis quam. Aliquam ac magna quis turpis mattis semper. Nulla condimentum, dui id mollis condimentum, tortor felis ultrices nisi, nec aliquet sem mauris eget augue. In hac habitasse platea dictumst. Quisque sit amet lacus velit. Suspendisse gravida efficitur libero ut porttitor. Pellentesque at fermentum dui. Nam et urna ac dui laoreet volutpat consectetur ut eros. Integer venenatis, nisi sit amet vehicula cursus, sem justo vulputate erat, non convallis tortor nibh nec sapien. Interdum et malesuada fames ac ante ipsum primis in faucibus. Nullam mauris justo, ornare at sem et, tempor bibendum mi. Mauris tempus eleifend tortor, nec fermentum sapien eleifend porttitor. Proin id tellus eget ex accumsan tincidunt. Ut pellentesque bibendum quam.
				</div>
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