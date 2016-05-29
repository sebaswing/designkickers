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
           <script type="text/javascript" src="validacion.js"></script> <!--se procesa el archivo javascrip-->
    </head>
    <img class="iniciologo" src="FOTOS/logo.png" alt="logo" >     
    <header> 
              <form  method="get" action="ingresar.php">
                  <button action="logout2.php">CERRAR SESION</button>
              </form>
    </header>
	<body>
       <div id="contenedorgeneral">
			<div id="contenidoadmin">
		
				<form name="cargar" onsubmit=" return validarcategoria2();" method="POST" action="modificarconsulta.php">
				<?php
				echo '<input type="hidden" name="modcategoriaviejo" value="'.$_POST['nombre'].'" />';
				echo '<input name="modcategoria" value="'.$_POST['nombre'].'" />';
				?>
				<button name="modificarcategoria" type="submit">modificar categoria</button>
			</form >
			
			<?php  //  consulta con sql de todas las categorias de la tabla
					
				   $link = conectar();
				   $sql='SELECT nombre
						  FROM categoria ';
				   $categorias = mysqli_query($link , $sql);
					echo '<table>';
					 while ($row = mysqli_fetch_assoc($categorias))			
								  {
								  echo '<tr>';
								  // se crea un form y un input para pasar el valor a la funcion que elimina la categoria
								  echo '<form name="miformulario" method="POST" onsubmit="return confirmDel();" action="eliminarcategoria.php" ><input type="hidden" name="nombre" value="'.$row['nombre'].'">';
								  echo '</input> </br>';
								  echo '<button type="submit" name="eliminar">eliminar</button></form>';
								  echo $row['nombre'];
								  echo '<form method="POST" action="modificarcategoria.php" ><input type="hidden" name="nombre" value="'.$row['nombre'].'">';
								  echo '</input>';
								  echo '<button type="submit" name="modificar">modificar</button></form>';
								  echo '</li>';
								  echo '<br>';
									
					  }
						echo '</table><br/>';
								?>
			</div>
		</div>
	<div class="footer">
	    <p>CouchInn es una marca registrada. Todos los derechos reservados</p>
	</div>
	<?php } ?>