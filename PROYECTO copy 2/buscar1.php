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
<html>
<head>
<link rel="stylesheet" type="text/css" href="estilo.css"> 
<link href='https://fonts.googleapis.com/css?family=Averia+Sans+Libre' rel='stylesheet' type='text/css'> 
<link rel="icon"  href="FOTOS/favicon.jpg" />
<title>Couch Inn!</title>
</head>
<div id="contenedorgeneral">
	<div id="contenidobuscador">
		<a href="usuariocomun.php"><img class="iniciologo" src="FOTOS/logo.png" alt="logo"></a>
	<div id="buscador">	
	<ul>
	<form method="get" action="buscar1.php">
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
		<input type="submit" name="aceptoBuscar">
		</form>
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
			  <form  method="get" action="logout.php" >
	                  <button id="cerrar">CERRAR SESION</button>
	                  <br>
	          </form>
	          <form  method="get" action="perfil.php">
	                  <button>PERFIL</button>
	                  <br>
	          </form>
	          <form  method="get" action="couch.php">
	                  <button>PUBLICA TU COUCH</button>
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
                             WHERE (f.id_couch=c.id_couch and u.mail=c.mail and c.id_ciudad='.$_GET['Ubicacion'].') ORDER BY f.id_fotografia DESC';
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

<footer> <p>CouchInn es una marca registrada. Todos los derechos reservados</p> </footer>
</html>
<?php } else {  ?>
        <script>
        alert("no ha iniciado sesion");
        window.location.href="index.php";
     </script> 
     <?php
}
?>