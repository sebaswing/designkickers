<?php
 // include("conexion.php");
 // codigo agregado por julian ---------------------
 session_start();
 include("functions.php");
 $t = login_check($mysqli);
//--------------------------------------
  //include("consultacategoria.php");
  //include("consultaciudades.php");
//-----------------------------------------------------
if( $t == 1) {
//-----------------------------------------------------

	// consulta para que solo el usuario dueño del couch pueda editarlo //
	 $link = conectar();
     $sql = 'SELECT mail FROM couch WHERE  
     		 mail = "'.$_SESSION['mail'].'" and id_couch ='.$_GET['idcouch'].' '; // ejemplo test o sebas
    $consulta= mysqli_query($link , $sql); // envio la consulta
    $row = mysqli_num_rows($consulta); 

   if ($row == 1){ 
?> 
<!DOCTYPE html>
<html>
<head>
	<link href='https://fonts.googleapis.com/css?family=Averia+Sans+Libre' rel='stylesheet' type='text/css'> 
	<link rel="stylesheet" type="text/css" href="n.css">
	<link rel="stylesheet" type="text/css" href="estilo.css">
	<title></title>
	<link rel="icon" href="FOTOS/favicon.jpg">
	<script type="text/javascript" src="validacion.js"></script>
</head>
<body>
	<div id="contenidobuscador">
		<a href="usuariocomun.php"><img class="iniciologo" src="FOTOS/logo.png" alt="logo"></a>
		<div id="botons">
			  <form  method="get" action="logout.php" >
	                  <button id="cerrar">CERRAR SESION</button>
	                  <br>
	          </form>
	         <!-- le paso el id en el action para la eliminacion --> 
	         <?php 
	         	$link1 = conectar();
     			$sql101 = "SELECT mail FROM couch WHERE  
     		 			mail = '".$_SESSION['mail']."' and id_couch = '".$_GET['idcouch']."' and eliminado = 0 "; // ejemplo test o sebas
    			$consulta101= mysqli_query($link1 , $sql101); // envio la consulta
    			$row101 = mysqli_num_rows($consulta101);
    			if ($row101 == 1){
	         ?>
		      <form  method="GET"  action="eliminarcouch.php?idcouch=<?php echo $_GET['idcouch'] ?>">
		        <input type="hidden" id="idcouch" name="idcouch" value="<?php echo $_GET['idcouch'] ?>" >
		      	<input type="hidden" id="action" name="action" value="first" >
		        <button  id="eliminar">ELIMINAR COUCH</button>
		        <br>
	          </form>
	          <?php } ?>
        </div>
	</div>
	</br>
	</br>
	<!--//		PARA EDITAR el maldito couch-->	
	<?php  //  
	if ($_GET['action'] == 'first')
				{
		   $link = conectar();
		   $idactual=$_GET['idcouch']; // le asigno id actual a una variable para q me devuelva en la consulta
          // consulta para traerme todo lo actual de couch
		   $sql="SELECT c.id_couch idCouch,
                    	c.fecha_publicacion inicio,
                    	c.fecha_cierre cierre,
                    	c.capacidad capacidad,
                    	c.descripcion descripcion,
                    	c.titulo titulo,
                    	ciu.ciudad_nombre nombreCiudad,
                    	cat.nombre nombreCategoria	
                 FROM couch c 
                 INNER JOIN  categoria cat 
                 INNER JOIN ciudad ciu 
                 WHERE cat.id_categoria = c.id_categoria AND ciu.id_ciudad = c.id_ciudad
                 AND c.id_couch = '".$_GET['idcouch']."' ";
           $result = mysqli_query($link , $sql); //Envia una consulta MySQL
           $fila = mysqli_fetch_assoc($result);
           if (!$result)
           {
				die ('Error en la conexion.' . mysql_error());
		   }
			else{
    			 ?>
    			 <!-- formulario con los datos que se van a editar  -->
    			
           		<form name="modif" onsubmit="return valmodificar();"  
           			 action=" modificarcouch.php?action=editar&idcouch=<?php echo $idactual; ?>" 
           			 method="POST" enctype="multipart/form-data">
           		<div style= 'text-align:center'>
           		<h2> Modificar datos de mi Couch:</h2>
           		<br>
           				<h1>Titulo:
					  	 <input name='titulo' id="titulo" type="text" value="<?php echo $fila['titulo'] ?>"/> 
					  	
					  	</h1> <br>
					  	<h1>Capacidad:
						 <input type='text' name='capacidad'id="capacidad"  value="<?php echo $fila['capacidad'] ?>">
						 </h1> <br> 
						<h1> Fecha de Inicio:	
						 <input type='date' name='inicio' id="inicio"  value="<?php echo $fila['inicio'] ?>">
						 
						 </h1> <br>
						 <h1>Fecha de Fin:
						 <input type='date' name='cierre' id="cierre"  value="<?php echo $fila['cierre'] ?>">
						 </h1> <br>
						 <h1>Descripcion:</h1> <br>
						  <textarea  name="descrip"> <?php echo $fila['descripcion'] ?> </textarea> <br>
						 <h1>Ciudad: 
						 <select name="ciudad" id="ciudad">
							   <?php
										$link=conectar();
										$query = "SELECT *";
										$query .= " FROM ciudad";
										$result = mysqli_query($link, $query);
										while ($opci=mysqli_fetch_assoc($result)) 
										{ ?>											
										<option value="<?php echo $opci['id_ciudad']?>"
											 	<?php 
											 		if($opci['ciudad_nombre']== $fila['nombreCiudad'])
											 		{ 
														echo 'selected'; 
													} ?> 
										>
										<?php echo $opci['ciudad_nombre'] ?>
										</option> 
							  <?php
							  } 
							  ?>
					   </select>
						</h1>
						<br>
						<h1> Categoria: 
						 <select name="categoria" id="categoria">
							   <?php
										$link=conectar();
										$query = "SELECT *";
										$query .= " FROM categoria";
										$result = mysqli_query($link, $query);
										while ($opci=mysqli_fetch_assoc($result)) 
										{ ?>											
										<option value="<?php echo $opci['id_categoria']?>"
											 	<?php 
											 		if($opci['nombre']== $fila['nombreCategoria'])
											 		{ 
														//echo 'selected'; 
													} ?> 
										>
										<?php echo $opci['nombre'] ?>
										</option> 
							  <?php
							  } 
							  ?>
					   </select>	
						 </h1> <br>
						 <input type='hidden' name='idcouch' value='".$_GET['idcouch']."'>
						 <input type='hidden' name='action' value='editar'>
					     <br>
					    <h1> Imagen (solo cargar si desea modificarla) :</h1> <br>
						 <input name="file-input" id="file-input" type="file" /> <br> <br>

						 <!-- ACA ME TRAIGO LO QUE TIENE LA IMAGEN ACTUAL DE PERFIL -->
						<!--  <?php 
						 		$link = conectar();
						 		$sql = "SELECT f.id_couch FROM fotografia f  WHERE id_couch ="
						 ?>	-->
						 <button type='submit'>modificar</button>
						 <button type="reset">Cancelar</button>		
			 </div>
			</form>
			
			<?php
			  } } // cierro el else
			 ?>
<!-- para editar en la misma pagina"""""""""""""""""""""""""""""""""""""""""""""""""""""" -->
			 <?php 
				if ($_GET['action'] == 'editar')
				{
					$link = conectar(); 
					$id = $_GET['idcouch'];
					$mail = $_SESSION['mail'];
					$categoria = $_POST['categoria'];
					$fecha1 = $_POST['inicio'];
					$fecha2 = $_POST['cierre'];
					$ciudad = $_POST['ciudad'];
					$capacidad = $_POST['capacidad'];
					$descrip = $_POST['descrip'];
					$titulo = $_POST['titulo'];
					// consulta update
					$query = "UPDATE couch";
					$query .= " SET id_couch = '$id',
									mail = '$mail',
									id_categoria = '$categoria',
									fecha_publicacion = '$fecha1',
									fecha_cierre = '$fecha2',
								    id_ciudad = '$ciudad',
								    capacidad = '$capacidad',
									descripcion = '$descrip',
									titulo = '$titulo' 
							 WHERE id_couch = $id";
					$result = mysqli_query($link, $query);
					//----- cargar una foto nueva -----------------------
					$quer = "SELECT id_fotografia FROM fotografia WHERE id_couch = ".$_GET['idcouch']." and fotoPerfil = 1";
					$result2 = mysqli_query($link, $quer);
					$imagenid = mysqli_fetch_assoc($result2);
					$permitidos = array("image/jpg", "image/jpeg", "image/gif", "image/png");
					 $limite_kb = 16384;
						 
						    if (in_array($_FILES['file-input']['type'], $permitidos) && $_FILES['file-input']['size'] <= $limite_kb * 1024)
						    {
						 
						        // Archivo temporal
						        $imagen_temporal = $_FILES['file-input']['tmp_name'];
						 
						        // Tipo de archivo
						        $tipo = $_FILES['file-input']['type'];
						 
						        // Leemos el contenido del archivo temporal en binario.
						        $fp = fopen($imagen_temporal, 'r+b');
						        $data = fread($fp, filesize($imagen_temporal));
						        fclose($fp);
						 
						        //Podríamos utilizar también la siguiente instrucción en lugar de las 3 anteriores.
						        // $data=file_get_contents($imagen_temporal);
						 
						        // Escapamos los caracteres para que se puedan almacenar en la base de datos correctamente.
						        $data = mysql_escape_string($data);
						        // Insertamos en la base de datos.
						        //$resultado = @mysql_query("INSERT INTO fotografia (id_couch, imagen, type) VALUES ('$id', '$data', '$tipo')") or die (mysqli_error($link));;
								$resultado1 = "UPDATE fotografia SET imagen = '$data', type = '$tipo' WHERE id_couch = '".$id."' AND id_fotografia = '".$imagenid['id_fotografia']."'";
									$resultado = mysqli_query($link, $resultado1) or die (mysqli_error($link));;
								
						 
						        if ($resultado)
						        {
						            echo "El archivo ha sido copiado exitosamente.";
						        }
						        else
						        {
						            echo "Ocurrió algun error al copiar el archivo.";
						        }
						    }
						    else
						    {
						        echo "Formato de archivo no permitido o excede el tamaño límite de $limite_kb Kbytes.";
						    }

					//----------------------------------------------------------
					if (!$result)
					{
						die ('Error en la modificacion.' . mysqli_error($link));
					}
					else{
						 echo " 
						 	 <script>
        							window.location.href='perfilCouch.php?id=".$_GET['idcouch']."';
     						</script> ";
						}
				 }
			
/// ACA VA EL RESTO DEL IF DISTINTO DE 1//
	} else { 
	 echo "<script>
	 			alert('no puede editar el couch, porque no es suyo');
     		</script>
	 	  ";
	 ?>
	<script>
        window.location.href='perfilCouch.php?id=<?php echo $_GET["idcouch"] ?>';
     </script>
<?php } 


	//<!--  codido de iniciar sesion-->
 } else {  ?>
        <script>
        alert("no ha iniciado sesion");
        window.location.href="index.php";
     </script> 
     <?php
}
?>