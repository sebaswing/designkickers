<ul>
		<hr> <!-- esto es para la linea debajo de los botones -->
	<?php  // trayendome lo de la tabla couch
include("../resultadobusqueda.php");
							$sql = busquedacouch($_GET['Ubicacion'], $_GET['Categoria']);
                      		$resultado = mysqli_query($link , $sql) or 
                      		die (" hay un error en la consulta ultima");
                            while ($fila = mysqli_fetch_assoc($resultado))
                             {
					 	   	    echo "<li>";
					 	   	    //<img class="couch" src="mostrar.php?id=<?php echo $fila['idCouch']?("esto se borra")>">
					 	   	    ?></br>
					 	   	    <?php

					 	   	    echo"<a href='perfilCouch.php?id=".$fila['idCouch']."'>";
					 	   	    	$_SESSION['idCouch']=$fila['idCouch'];
	
					 	   	    ?>
					 	   	    </br>
						 	   	<?php
						 	   	  // aca va el direccionamiento al detalle del couch 

						 	   		echo " <div class=\"couch\" style=\"background-image:url(";
						 	   		if($fila['tarjeta']!= NULL)
						 	   		{
							 	   	    
							 	   	    echo"mostrar.php?id=";
							 	   	    echo $fila['idCouch'];
							 	   	   	
						 	   	   	}
						 	   	   	else
						 	   	   	{
						 	   	   		echo "FOTOS/logo.png";
						 	   	   	}
						 	   	   	echo"); background-repeat: no-repeat;\">
											";
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