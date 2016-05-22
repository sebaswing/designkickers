<?php
		include("conexion.php");		//$sql= 'SELECT * FROM productos limit 0,5'  //LIMIT tiene dos argumentos, el primero es el registro por el que empezar los resultados 
 		//y el segundo el número de resultados a recoger en el conjunto de registros resultante
		$link=conectar();
		$sql = "SELECT * FROM productos";
		$paginas_num = mysqli_query($link , $sql); // envia la consulta
		$num_total_prod = mysqli_num_rows($paginas_num); //me devuelve el total de paginas
		$url="http://localhost/php2016/ejemplodepaginacion.php";
 		//Limito la busqueda
		$TAMANO_PAGINA = 5;
		//examino la página a mostrar y el inicio del registro a mostrar
		$paginas = "";
		if($paginas = $_GET["paginas"])
		//if(isset($_GET["paginas"]))
		{
		$paginas == (int)$_GET["paginas"];
		}
		// else 
		  //$pagactual = 1;  // la pagina por defaul osea el index
		  //$pagsig = $pagactual + 1; // definimos una variable sig para avanzar
		  //$pagant = $pagactual - 1; // definimos una variable ant para decrementar
		 //if($pagactual == 1) // si la pagina era la de defaul
		 //{
		 	//$pagant = 0; // le asignamos el 0
		 //}
		  if ($paginas ==0 || $paginas=="" )
		  {
		    	$inicio= 0;
		   	    $paginas= 1;
		  }
		else
		{
			$inicio = ($paginas -1) * $TAMANO_PAGINA;
		}
			//calculo el total de páginas
			$total_paginas= ceil($num_total_prod/ $TAMANO_PAGINA);
  		 //if($pagactual == $total_paginas) //si mi pagina actual es la ultima
  		 //{
		   //  $pagsig = 0;  // a la pagina siguiente no le ponemos nada
  		 //}
		$link=conectar();
		 $sql2 = "SELECT         	p.nombre NombreProducto,
                                    p.idProducto idProducto,
                                    p.descripcion descripcion,
                                    p.precio precio,
                                    p.publicacion publicacion,
                                    p.caducidad caducidad, 
                                    p.idCategoriaProducto idCategoriaProducto,
                                    p.idUsuario idUsuario,
                                    cat.nombre categoria,
                                    u.nombre nombre 
                             FROM productos p 
                             INNER JOIN  categorias_productos cat ON (p.idCategoriaProducto = cat.idCategoriaProducto) 
                             INNER JOIN  usuarios u ON (p.idUsuario = u.idUsuario)
                             LIMIT ".$inicio."," . $TAMANO_PAGINA;
					 $resultado2 = mysqli_query($link, $sql2);
					 while ($row = mysqli_fetch_assoc($resultado2))			
					  {
	   				 //Aqui mostrariamos los datos que se quieran sobre los productos
					     //	aca va la tabla de productos
					 	          echo $row['NombreProducto']  ?> </br> <?php 
					 	   	      echo $row['precio']   ?> </br> <?php 
					 	   	      echo $row['caducidad']  ?> </br> <?php 
					 	   	      echo $row['publicacion']  ?> </br> <?php 
					  }
					 // mostramos la paginacion

                          if ($total_paginas > 1)
                          {
                             if ($paginas != 1)
                                echo '<a href="'.$url.'?paginas='.($paginas-1).'"><img src="imagenes/izq.gif" border="0"></a>';
                                for ($i=1;$i<=$total_paginas;$i++) {
                                   if ($paginas == $i)
                                      //si muestro el índice de los productos actual, no coloco enlace
                                      echo $paginas;
                                   else
                                      //si el índice no corresponde con los productos mostrada actualmente,
                                      //coloco el enlace para ir a esa página
                                      echo '  <a href="'.$url.'?paginas='.$i.'">'.$i.'</a> ';
                                }
                                if ($paginas != $total_paginas)
                                   echo '<a href="'.$url.'?paginas='.($paginas+1).'"><img src="imagenes/der.gif" border="0"></a>';
                          }
                          ?>