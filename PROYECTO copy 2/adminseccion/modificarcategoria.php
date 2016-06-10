<?php
	//set_include_path("C:/xampp/htdocs/testProyecto");
	include("conexion.php");
	session_start();

	if ($_SESSION['log']){ 
?>


    <head>
            <meta charset="UTF-8"> <!-- Especifica la codificación de caracteres para el documento HTM-->
          	<title>Pagina Admin</title> <!--titulo de la pagina -->
           <link rel="stylesheet" type="text/css" href="admin.css">
    </head>
             
    <header> 
              <form  method="get" action="ingresar.php">
                  <button action="logout2.php">CERRAR SESION</button>
              </form>
    </header>
	<body>
       <div id="contenedorgeneral">
			<div id="contenidoadmin">
			<form name="cargar" method="POST" action="funciones.php">
				<input name="categoria" placeholder="ingrese categoria" />
				<button name="nuevacategoria" type="submit" onclick="">cargar categoria</button>
			</form >
				<form name="mod" method="POST" action="modificarconsulta.php">
				<?php
				echo '<input type="hidden" name="modcategoriaviejo" value="'.$_POST['nombre'].'" />';
				echo '<input name="modcategoria" value="'.$_POST['nombre'].'" />';
				?>
				<button name="modificarcategoria" type="submit" onclick="">modificar categoria</button>
			</form >
			
			<?php  //  consulta con sql de todas las categorias de la tabla
					
				   $link = conectar();
				   $sql='SELECT nombre
						  FROM categoria ';
				   $categorias = mysqli_query($link , $sql);
					echo '<ul cellpadding="0" cellspacing="0" class="db-table">';
					 while ($row = mysqli_fetch_assoc($categorias))			
								  {
								  echo '<li>';
								  // se crea un form y un input para pasar el valor a la funcion que elimina la categoria
								  echo '<form method="POST" action="eliminarcategoria.php" ><input type="hidden" name="nombre" value="'.$row['nombre'].'">';
								  echo '</input>';
								  echo '<button type="submit" name="eliminar">eliminar</button></form>';
								  echo $row['nombre'];
								  echo '<form method="POST" action="modificarcategoria.php" ><input type="hidden" name="nombre" value="'.$row['nombre'].'">';
								  echo '</input>';
								  echo '<button type="submit" name="modificar">modificar</button></form>';
								  echo '</li>';
								  echo '<br>';
									
					  }
						echo '</ul><br />';
								?>
			</div>
			<div id="generarreportes">
			<button name="generarreportes">generarreportes</button>
			</div>
		</div>
		
	<footer> <p>CouchInn es una marca registrada. Todos los derechos reservados</p> </footer>
	<?php } ?>