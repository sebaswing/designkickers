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
		<script language="javascript" src="validacionformularioespectaculo.js" type="text/javascript"></script>
		<script language="javascript" src="validacionformularioespectaculo2.js" type="text/javascript"></script>
		<table>
<?php

		if(isset($_GET['e'])){
			if ($_GET['e']=="1") {
?>
				Se agreg&oacute; un nuevo espectaculo con exito.
<?php
			}
			else{
				if ($_GET['e']=="2") {
?>		
					Se elimino un espectaculo con exito.
<?php
				}
			
				else{
					if ($_GET['e']=="3") {
?>
						Se modifico una espectaculo con exito.
<?php

					}
				}
			}
		}


		if (isset($_GET['action'])){
			

				
				
		//		PARA AGREGAR----------------
										
										
										
				if ($_GET['action']=='new'){
?>
					<form name="formulario" enctype="multipart/form-data" action="espectaculos.php?action=agregar" method="POST" onsubmit="return validacionespectaculo();">
						<br>
						Titulo: <input name="titulo" id="titulo" type="text" />	<br>
						Imagen: <input name="foto" type="file" /><br>
						Sala: 
						<select name="sala" id="sala">
<?php
							$link = conectar();
							$query = "SELECT *";
							$query .= " FROM salas";
							$result = mysqli_query($link, $query);
							while ($opci=mysqli_fetch_assoc($result)) {
?>											
								<option value="<?php echo $opci['idsala']?>">
									<?php echo $opci['nombre']?>
								</option>
<?php
							} 
?>
						</select>				
						<br>
						Tipo Espectaculo:
						<select name="tipo" id="tipo">
<?php
							$link = conectar();
							$query = "SELECT *";
							$query .= " FROM tiposespectaculos";
							$result = mysqli_query($link, $query);
							while ($opci=mysqli_fetch_assoc($result)) {
?>											
								<option value="<?php echo $opci['idtipoespectaculo']?>">
									<?php echo $opci['tipoespectaculo']?>
								</option>
<?php
							} 
?>
						</select>
						<br>
						Fecha: <input type="date" name="fecha">
						<br>
						Hora desde: <input type="time" name="hora1">	
						<br>
						Hora Hasta: <input type="time" name="hora2">
						<br>
						Descripcion: <textarea name="descrip" rows=5 cols=30></textarea> <br>
						ultimavisita: <input type="date" name="ultimavisita">
						<input type="submit" value="Agregar">	


					</form>			
<?php
				}
				if ($_GET['action']=='agregar'){
					$link = conectar();
					$titulo = $_POST['titulo'];
					$fecha = $_POST['fecha'];
					$tipo = $_POST['tipo'];
					$hora1 = $_POST['hora1'];
					$hora2 = $_POST['hora2'];
					$descrip = $_POST['descrip'];
					$sala = $_POST['sala'];
				


					$fotonom = $_FILES['foto']['tmp_name'];
					$ft = fopen ($fotonom,'r');
					if((isset($_FILES['foto']))){

						$file = $_FILES['foto']; //Asignamos el contenido del parametro a una variable para su mejor manejo
		
						$temName = $file['tmp_name']; //Obtenemos el directorio temporal en donde se ha almacenado el archivo;
						$fileName = $file['name']; //Obtenemos el nombre del archivo
						$fileExtension = substr(strrchr($fileName, '.'), 1); //Obtenemos la extensionn del archivo.
						
						//Comenzamos a extraer la informaciÃ³n del archivo
						$fp = fopen($temName, "rb");//abrimos el archivo con permiso de lectura
						$contenido = fread($fp, filesize($temName));//leemos el contenido del archivo
						//Una vez leido el archivo se obtiene un string con caracteres especiales.
						$contenido = addslashes($contenido);//se escapan los caracteres especiales
						fclose($fp);//Cerramos el archivo
					
						$query = "INSERT INTO espectaculos (idsala, idtipoespectaculo, titulo,fecha, horadesde, horahasta, descripcion, contenidoimagen, tipoimagen)";
						$query .= " VALUES ('$sala','$tipo','$titulo', '$fecha', '$hora1', '$hora2', '$descrip', '$contenido', '$fileExtension', '$ultimavisita')";
						$result = mysqli_query($link, $query);
						if (!$result){
							die ('Error en la insercion.' . mysqli_error());
						}
						else{	
?>
							<p>
								<?php header ('Location: espectaculos.php?e=1');?>
							</p>
<?php
						}
					}
					else {
?>
 
						No se agrego

						<?php echo $_FILES['foto']['type']; ?> 

 <?php 

					}
				}	
				
				//		PARA BORRAR----------------		
										
										
										
				if ($_GET['action']== 'delete'){
					$link = conectar();
					$id = $_GET['id'];
					$query2 = "DELETE FROM espectaculos";
					$query2 .= " WHERE idespectaculo = $id";
					$resultado = mysqli_query($link, $query2);
					if (!$resultado){
						die ('Error en la elimininacion.' . mysql_error());
					}
?>
							
						<?php header ('Location: espectaculos.php?e=2');?>
							
<?php
				}
			
										
										
				//		PARA EDITAR----------------		
						
						
						
				if ($_GET['action']=='edit') {
					$link = conectar(); 
					$id = $_GET['id'];
					$query = "SELECT *";
					$query .= " FROM espectaculos";
					$query .= " WHERE idespectaculo = $id";
					$result = mysqli_query($link , $query); 
					$fila = mysqli_fetch_assoc($result);
					if (!$result){
						die ('Error en la conexion.' . mysql_error());
					}
					else{
?>
						Modificar:
						<form name="formulario" action="espectaculos.php?action=editar&id=<?php echo $id ?>" method="POST" onsubmit=" return editarespectaculo();">
							

							Titulo <input type="text" name="titulo" id="titulo"  value="<?php echo $fila['titulo'] ?>"> <br>

							Sala: <select name="sala" id="sala">
<?php
									$link=conectar();
									$query = "SELECT *";
									$query .= " FROM salas";
									$result = mysqli_query($link, $query);
									while ($opci=mysqli_fetch_assoc($result)) {
?>											
										<option value="<?php echo $opci['idsala']?>" <?php 	if($opci['idsala']== $fila['idsala']){ 
																									echo 'selected'; 
																								} ?> >
											<?php echo $opci['nombre']?>
										</option>
<?php
								} 
?>
							</select>
							<br>
							Tipo Espectaculo: 
							<select name="tipo" id="tipo">
<?php
									$link=conectar();
									$query = "SELECT *";
									$query .= " FROM tiposespectaculos";
									$result = mysqli_query($link, $query);
									while ($opci=mysqli_fetch_assoc($result)) {
?>											
										<option value="<?php echo $opci['idtipoespectaculo']?>" <?php 	if($opci['idtipoespectaculo']== $fila['idtipoespectaculo']){ 
																									echo 'selected'; 
																								} ?> >
											<?php echo $opci['tipoespectaculo']?>
										</option>
<?php
								} 
?>
							</select>
							<br>
							fecha: <input name="fecha1"  value="<?php echo $fila['fecha'] ?>" type="date"/>
							<br>
							Hora Desde: <input type="time" name="hora1" id="hora1" value="<?php echo $fila['horadesde'] ?>">
							<br>
							Hora Hasta: <input type="time" name="hora2" id="hora2"  value="<?php echo $fila['horahasta'] ?>">
							<br>

							Descripcion: <textarea  name="descrip" rows="20" cols="30"> <?php echo $fila['descripcion'] ?> </textarea>
							<br>

							Imagen (solo cargar si desea modificarla) : <input type="file" name="foto"> <br> <br>
							
						    			
							<input type="submit" value="Aceptar" alt="submit">

												
						</form>

<?php
					}
				}


				if ($_GET['action'] == 'editar'){
					$link = conectar(); 
					$id = $_GET['id'];
					$sala = $_POST['sala'];
					$titulo = $_POST['titulo'];
					$tipo = $_POST['tipo'];
					$fecha1 = $_POST['fecha1'];
					$hora1 = $_POST['hora1'];
					$hora2 = $_POST['hora2'];
					$descrip = $_POST['descrip'];

					$query = "UPDATE espectaculos";
					$query .= " SET idsala = '$sala',
									idtipoespectaculo = '$tipo',
									titulo = '$titulo',
									fecha = '$fecha1',
									horadesde = '$hora1',
									horahasta = '$hora2',
									descripcion = '$descrip'";


								if(filesize($_FILES['foto']['tmp_name'])> 0){

									$file = $_FILES['foto']; //Asignamos el contenido del parametro a una variable para su mejor manejo
		
									$temName = $file['tmp_name']; //Obtenemos el directorio temporal en donde se ha almacenado el archivo;
									$fileName = $file['name']; //Obtenemos el nombre del archivo
									$fileExtension = substr(strrchr($fileName, '.'), 1); //Obtenemos la extensionn del archivo.
									
									//Comenzamos a extraer la informaciÃ³n del archivo
									$fp = fopen($temName, "rb");//abrimos el archivo con permiso de lectura
									$contenido = fread($fp, filesize($temName));//leemos el contenido del archivo
									//Una vez leido el archivo se obtiene un string con caracteres especiales.
									$contenido = addslashes($contenido);//se escapan los caracteres especiales
									fclose($fp);//Cerramos el archivo
									$query .= ", contenidoimagen = '$contenido', tipoImagen = '$fileExtension'";
								}
					
					$query .= " WHERE idespectaculo = $id";
					$result = mysqli_query($link, $query);
					if (!$result){
						die ('Error en la modificacion.' . mysqli_error($link));
					}
					else{
?>
						<?php header ('Location: espectaculos.php?e=3');?>
<?php
					}
				}	
		}
		else{
			$link = conectar();   
	   		$sql="SELECT * FROM espectaculos";
	  		$resultado = mysqli_query($link , $sql); 
		  
			       
?>
				<p id="sala">
					<a href="espectaculos.php?action=new" > Nuevo Espectaculo	</a>
				</p>
				<br>
				<br>
				<tr>
					<th>
						Titulo
					</th>
					<th>
						Tipo Espectaculo
					</th>
					<th>
						Sala
					</th>
					<th>
						Fecha
					</th>
					<th>
						Hora Desde
					</th>
					<th>
						Hora Hasta
					</th>
					<th>
						Descripcion
					</th>
					<th>
						Imagen
					</th>
				</tr>
<?php
				 while ($fila = mysqli_fetch_assoc( $resultado)) {
					$id = $fila['idespectaculo'];
					$idE = $fila['idtipoespectaculo'];
					$sala = $fila['idsala'];
?>
				<div id="content">
					<tr>
						<td>
								<?php echo $fila['titulo'] ?>
						</td>
						<td>
								<?php 	
										$link=conectar();
										$query = "SELECT *";
										$query .= " FROM tiposespectaculos ";
										$query .= " WHERE idtipoespectaculo = $idE";
										$result = mysqli_query($link, $query);
										while ($opci=mysqli_fetch_assoc($result)) { 
											echo $opci['tipoespectaculo'];
										}
								?>
						</td>
						<td>
								<?php 	
										$link=conectar();
										$query = "SELECT *";
										$query .= " FROM  salas ";
										$query .= " WHERE idsala =  $sala";
										$result = mysqli_query($link, $query);
										while ($opci=mysqli_fetch_assoc($result)) { 
											echo $opci['nombre'];
										}
								?>	
						</td>
						<td>
								<?php echo $fila['fecha'] ?>	
						</td>
						<td>
								<?php echo $fila['horadesde'] ?>
						</td>
						<td>
								<?php echo $fila['horahasta'] ?>
						</td>
						<td>
								<?php echo $fila['descripcion'] ?>
						</td>
						<td>
								<img src="mostrarimagenes.php?id=<?php echo $fila['idespectaculo'] ?>" width="200" />
						</td>
						<td>
							<a href="espectaculos.php?action=edit&id=<?php echo $id ?>" ALT="EDITAR"> Editar</a>
							<p>
							<a onclick="return confirm('Esta seguro de eliminar?')" href="espectaculos.php?action=delete&id=<?php echo $id ?>" ALT="BORRAR">Eliminar</a>												
						</td>
					</tr>
				</div>
<?php
				}
			}
?>
		</table>
<?php		
		
		include("pie.php");
	}
	else{

		header ('Location: index.php?er=1');
	}
?>
<!--//-----------------------------------------------------  -->
<?php } else {  ?>
        <script>
        alert("no ha iniciado sesion");
        window.location.href="index.php";
     </script> 
     <?php
}
?>