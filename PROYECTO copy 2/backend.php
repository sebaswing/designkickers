<?php  // backend de los administradores
	 // codigo agregado por julian ---------------------
 include("functions.php");
 session_start();
 
 $t = login_checkadmin($mysqli);

if( $t == 1) {
//-----------------------------------------------------

	//include("conexion.php");
	//session_start();
	//include("consultaeliminacion.php");

	if ($_SESSION['log']){ 
?>
    <head>
            <meta charset="UTF-8"> <!-- Especifica la codificación de caracteres para el documento HTM-->
          	<title>Pagina Admin</title> <!--titulo de la pagina -->
           <link rel="stylesheet" type="text/css" href="admin.css">
           <script type="text/javascript" src="validacion.js"></script><!--se procesa el archivo javascrip-->
    </head>
    	<img class="iniciologo" src="FOTOS/logo.png" alt="logo" >  
	    <header> 

	              <form id="" method="get" action="logout2.php">
	                  <button>CERRAR SESION</button>
	              </form>
	    </header>
		<body>	
		<div id="contenedorgeneral">
		<div id="contenidoadmin">
     	<form name="cargar" method="POST" onsubmit="return validarcategoria();" action="funciones.php" >
				<input name="categoria" placeholder="ingrese categoria" value="">
				<button name="nuevacategoria" type="submit">cargar categoria</button>
		</form> 
	
			<?php  //  consulta con sql de todas las categorias de la tabla
					
				   $link = conectar();
				   $sql='SELECT nombre, "1" as nota FROM categoria t inner join couch p on (t.id_categoria = p.id_categoria) UNION SELECT nombre, "0" as nota FROM categoria where nombre not in (SELECT nombre FROM categoria t inner join couch p on (t.id_categoria = p.id_categoria))';
				   $categorias = mysqli_query($link , $sql);
					echo '<table>';
					 while ($row = mysqli_fetch_assoc($categorias))			
								  {
								  echo '<tr>';
								  // se crea un form y un input para pasar el valor a la funcion que elimina la categoria
								  echo '<form name="miformulario" method="POST" onsubmit="return confirmDel();" action="eliminarcategoria.php" >
								  		<input type="hidden" name="nombre"  value="'.$row['nombre'].'">';
								  echo '</input> </br>';
								 // if ($row['nota'] == 1){
								 // echo '<button type="submit" disabled name="eliminar">eliminar</button></form>';
								 // }else{
								  	echo '<button type="submit" name="eliminar">eliminar</button></form>';
								 // }
								  echo $row['nombre'];
								  echo '<form method="POST" action="modificarcategoria.php" ><input type="hidden" name="nombre" value="'.$row['nombre'].'">';
								  echo '</input>';
								  echo '<button type="submit" name="modificar">modificar</button></form>';
								  echo '</li>';
								  echo '<br>';
									
					  }
						echo '</table><br />';
								?>
	</div>
		</div>
	<div class="footer">	
	 		<p>CouchInn es una marca registrada. Todos los derechos reservados</p> 
	</div>
	<?php } ?>
	<?php } else {  ?>
        <script>
        alert("no esta autorizado a ingresar a la pagina.");
        window.location.href="ingresar.php";
     </script> 
     <?php
}
?>