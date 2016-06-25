<?php
  include("conexion.php");
  include("consultacategoria.php");
  include("consultaciudades.php");
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
     <?php  
          if(isset($_GET['nombres']))
           {  
              $nomdecategoria = $_GET['nombres']; 
            } ?>
            <form method="get" action="buscar.php">
               CATEGORIAS:
                        <select name="nombres">
                              <option value=""></option>
                             <?php
                               while($cate = mysqli_fetch_assoc( $categorias)) //Obtiene una fila del resultado como un array asociativo
                              {
                                  if($nomdecategoria == $cate['idcategoria'])
                                  {
                              ?>
                                      <option value="<?php echo $cate['idcategoria']?>"selected>
                                          <?php 
                                                echo $cate['nombre']; // imprime los nombres de las categorias de bd 
                                          ?>
                                      </option>
                              <?php 
                                   }  // cierro el if

                             
                                    else 


                                    { 
                              ?>
                                          <option value="<?php echo $cate['idCategoriaProducto']?>">
                                                <?php 
                                                    echo $cate['nombre']; 
                                                ?>
                                          </option>
                                      <?php
                                          }  // cierro else
                                          }  // cierro el while
                                        ?>
                            
                        </select>
                        <input type="submit" value="buscar" class="tfbutton">
                     </form>
                        <div id="botons">
			  <form  method="get" action="index.php" >
	                  <button id="cerrar" action="logout.php">CERRAR SESION</button>
	                  <br>
	          </form>
	          <form  method="get" action="perfil.php">
	                  <button action="logout.php">PERFIL</button>
	                  <br>
	          </form>
	          <form  method="get" action="couch.php">
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
                             if(isset($_GET['nombres']))
					         {  
					              $nomdecategoria = $_GET['nombres']; 
					              $sql= $sql. "where  p.idcategoria = ".$nomdecategoria." ";
					             
					          }
                      		$resultado = mysqli_query($link, $sql); 
            				while ($fila = mysqli_fetch_assoc( $resultado))
                             {
                             ?>
                             <?php
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
						 <?php 
                           } // end del while
                           } // end del if

                          else {
                                  echo "no hay resultados de la busqueda";
                                }
                          
                  				?> 


      </body>
</html>
























                           } // end del while
                           } // end del if

                          else {
                                  echo "no hay resultados de la busqueda";
                                }
                          
                  ?>  