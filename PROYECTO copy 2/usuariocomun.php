<?php
  include("conexion.php");
  include("consultacategoria.php");
  include("consultaciudades.php")
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
				 <?php
                               while($ciudad = mysqli_fetch_assoc( $ciudades)) //Obtiene una fila del resultado como un array asociativo
                             {?>
                              <option value="<?php echo $ciudad['id']?>">
                                  <?php 
                                        echo $ciudad['ciudad_nombre'] // imprime los nombres de las categorias de bd 
                                  ?>
                              </option>
                              <?php 
                                   }  
                              ?>
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
	          <form  method="get" action="perfil.php">
	                  <button action="logout.php">PERFIL</button>
	                  <br>
	          </form>
	          <form  method="get" action="cargarcouch.php">
	                  <button action="logout.php">ALTACOUCH</button>
	                  <br>
	          </form>
        </div>
	</div>
	<div id="previewcouch">
		<ul>
	<?php  // trayendome lo de la tabla couch
                      $link = conectar();
                      $sql= 'SELECT DISTINCT c.mail nombre,
                                    c.id_couch idCouch,
                                    c.id_categoria idcategoria,
                                    c.fecha_cierre fecha_cierre, 
                                    c.id_ciudad ciudad,
                                    c.descripcion descripcion,
                                    c.titulo titulo,
                                    f.imagen foto,
                                    f.type tipo,
                                    u.numTarjeta tarjeta
                             FROM couch c INNER JOIN fotografia f INNER JOIN usuario u
                             WHERE (f.id_couch=c.id_couch and u.mail=c.mail) ORDER BY f.id_fotografia DESC';
                      		$resultado = mysqli_query($link , $sql);
                            while ($fila = mysqli_fetch_assoc($resultado))
                             {
					 	   	    echo "<li>";
					 	   	    //<img class="couch" src="mostrar.php?id=<?php echo $fila['idCouch']?("esto se borra")>">
					 	   	    ?></br>
					 	   	    <?php
					 	   	    echo"<a href=\"#\">";
					 	   	    ?></br>
						 	   	<?php
						 	   		echo "<div class=\"couch\" style=\"background-image:url(";
						 	   		if($fila['tarjeta']!= NULL)
						 	   		{
							 	   	    
							 	   	    echo"mostrar.php?id=";
							 	   	    echo $fila['idCouch'];
							 	   	   	
						 	   	   	}
						 	   	   	else
						 	   	   	{
						 	   	   		echo "FOTOS/logo.png";
						 	   	   	}
						 	   	   	echo"); background-repeat: no-repeat;\">";
						 	   	?></br>
						 	   	    <?php
						 	   	    	
						 	   	    	echo"<div class=\"titulocouch\">";
						 	   	    ?>
						 	   	    <?php
						 	   	    	echo "<h1>";
						 	   	    	echo $fila['titulo'];
						 	   	    	echo "</h1>";
						 	   	    ?>
						 	   	    <?php
						 	   	    	echo "<p>";
						 	   	    	echo $fila['descripcion'];
						 	   	    	echo "</p>";
						 	   	    ?></br>
						 	   	    <?php
						 	   	    	echo"</div>";
						 	   	    ?></br>
					 	   	    <?php
					 	   	   		echo"</div>";
					 	   	   	?></br>
					 	   	    <?php
					 	   	    echo"</a>";
					 	   	   	?></br>
					 	   	    <?php
					 	   	    echo"</li>";
					  		}
    ?>
    	</ul>
    </div>
</div>

<!--<div id="previewcouch">
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
</div> -->
<footer> <p>CouchInn es una marca registrada. Todos los derechos reservados</p> </footer>
</html>