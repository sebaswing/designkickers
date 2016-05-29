<?php
  include("conexion.php");
  include("consultacategoria.php");
?>
<html>
<head>
<link rel="stylesheet" type="text/css" href="estilo.css"> 
<link href='https://fonts.googleapis.com/css?family=Averia+Sans+Libre' rel='stylesheet' type='text/css'> 
<link rel="icon"  href="FOTOS/favicon.jpg" />
</head>
<div id="contenedorgeneral">
	<div id="contenidobuscador">
		<a href="index.php"><img class="iniciologo" src="FOTOS/logo.png" alt="logo"></a>
	<div id="buscador">	
	<ul>	
		<li>Ubicacion:
			<select name="Ubicacion" >	
				<option value=""></option>
			</select>
		</li>
	    <form method="get" action="usuariocomun.php">
			<li>Categorias:<select name="Categoria" >
				 <option value=""></option>
                             <?php
                               while($cate = mysqli_fetch_assoc( $categorias)) //Obtiene una fila del resultado como un array asociativo
                             {?>
                              <option value="<?php echo $cate['id_categoria']?>">
                                  <?php 
                                        echo $cate['nombre'] // imprime los nombres de las categorias de bd 
                                  ?>
                              </option>
                              <?php 
                                   }  
                              ?>
				</select></li>	
			<li><button>Buscar</button></li>
		</form>
	</ul>	
	</div>
		<div id="botons">
			  <form  method="get" action="index.php" >
	                  <button id="cerrar" action="logout.php">CERRAR SESION</button>
	                  <br>
	          </form>
	          <form  method="get" action="premium.php">
	                  <button action="logout.php">HACETE PREMIUM</button>
	                  <br>
	          </form>
        </div>
	</div>
	<div id="previewcouch">
	<ul>
		<li>
			<a href="#">
			<div class="couch" style="background-image: url(FOTOS/logo.png); background-repeat: no-repeat;">
				<div class="titulocouch">				
				<h1>Casa Country Golf Club</h1>
				<p>aca va la descripcion</p>
				</div> 
			</div> 
			</a>
		</li>
	<li>
			<a href="#">
			<div class="couch" style="background-image: url(FOTOS/casa2.png.jpg); background-repeat: no-repeat;">
				<div class="titulocouch">				
				<h1>Loft en capital federal</h1>
				<p>Me encuentro en la 9 de julio. Poseo un futon para compartir</p>
				</div>
			</div>
			</a>
		</li>
		<li>
			<a href="#">
			<div class="couch" style="background-image: url(FOTOS/loft1.png.jpg); background-repeat: no-repeat;">
				<div class="titulocouch">				
				<h1>Loft en La Plata</h1>
				<p>Aca vivimos con los pibes</p>
				</div>				
			</div>
			</a>
		</li>
	
	</ul>
	
	</div>
</div> 
<footer> <p>CouchInn es una marca registrada. Todos los derechos reservados</p> </footer>
</html>