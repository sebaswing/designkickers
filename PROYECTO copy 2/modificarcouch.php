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
		      <form  method="GET"  action="eliminarcouch.php?action=eliminar&idcouch=<?php echo $_GET['id'] ?>">
		        <input type="hidden" id="idcouch" name="idcouch" value="<?php echo $_GET['id'] ?>" >
		      	<input type="hidden" id="action" name="action" value="first" >
		        <button  id="eliminar">ELIMINAR COUCH</button>
		        <br>
	          </form>
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
    			 <!-- formulario con los datos actuales -->
    			 Modificar:
           		<form name="modif" onsubmit="return valmodificar();"  
           			 action=" modificarcouch.php?action=editar&idcouch=<?php echo $idactual; ?>" 
           			 method="POST" enctype="multipart/form-data">
           		<div style= 'text-align:center'>
					  	 <input name='titulo' id="titulo" type="text" value="<?php echo $fila['titulo'] ?>"/> 
					  	<!-- <button type='submit' name='modificartituloviejo'>modificar</button> <br>	-->
					  	 <br>
						 <input type='text' name='capacidad'id="capacidad"  value="<?php echo $fila['capacidad'] ?>">
						  <!--<button type='submit' name='modificarcapacidadvieja'>modificar</button> <br>
						  -->	
						 <br>
						 <input type='text' name='inicio' id="inicio"  value="<?php echo $fila['inicio'] ?>">
						  <!--<button type='submit' name='modificarinicioviejo'>modificar</button> <br>	-->
						 <br>
						 <input type='text' name='cierre' id="cierre"  value="<?php echo $fila['cierre'] ?>">
						  <!--<button type='submit' name='modificartituloviejo'>modificar</button> <br>	-->
						 <br>
						 Descripcion: <textarea  name="descrip"> <?php echo $fila['descripcion'] ?> </textarea> <br>
						  
						 <br>
						 Ciudad: 
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
						<br>
						<br>
						 Categoria: 
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
						 <br>
						 <input type='hidden' name='idcouch' value='".$_GET['idcouch']."'>
						 <input type='hidden' name='action' value='editar'>
					     <br>
					     Imagen (solo cargar si desea modificarla) :
						 <input type='file' name='foto'> <br> <br>	
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
	 			alert('no puede editar el couch, esta siendo redirigido');
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