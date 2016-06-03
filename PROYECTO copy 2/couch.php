<!--
	// falta validar campos vacios y conectar con las variables session
-->
<?php  
include("conexion.php");
include("consultacategoria.php");
include("consultaciudades.php");
session_start();
?>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="estilocouch.css"> 
	<link href='https://fonts.googleapis.com/css?family=Averia+Sans+Libre' rel='stylesheet' type='text/css'>
	<script  src="js/jquery-1.10.2.min.js" type="text/javascript"></script>
	<script type="text/javascript" src="validacioncouch.js"></script>
	<script type="text/javascript">	
$(window).load(function(){

 $(function() {
  $('#file-input').change(function(e) {
      addImage(e); 
     });

		 function addImage(e){
		  var file = e.target.files[0],
		  imageType = /image.*/;
		
		  if (!file.type.match(imageType))
		   return;
	  
		  var reader = new FileReader();
		  reader.onload = fileOnload;
		  reader.readAsDataURL(file);
		 }
  
		 function fileOnload(e) {
		  var result=e.target.result;
		  $('#imgSalida').attr("src",result);
		 }
    });
  
});

</script>
</head>
<body>
<div id="contenidobuscador">
		<a href="usuariocomun.php"><img class="iniciologo" src="FOTOS/logo.png" alt="logo" ></a>
		<form  method="get" action="index.php" >
	          <button id="cerrar" action="logout.php">CERRAR SESION</button>
	          <br>
	    </form>
</div>
<div id="formulariocouch">
<form name="cargacouch" method="POST" onsubmit=" return validarcouch();" action="cargarcouch.php" enctype="multipart/form-data"> 
	<div id="formcouchizq">
		<h1>Crear un couch</h1><br>
		<h2>ingrese un titulo</h2><br>
		<input name="titulocouch" placeholder="Las casitas" />
		<h2>ingrese ubicacion</h2>
		<select name="ubicacion">
			<option value=""></option>
				 <?php
                     while($ciudad = mysqli_fetch_assoc( $ciudades)) //Obtiene una fila del resultado como un array asociativo
                     {?>
                       <option value="<?php echo $ciudad['id_ciudad']?>">
                         <?php 
                             echo $ciudad['ciudad_nombre'] // imprime los nombres de las categorias de bd 
                             ?>
                         </option>
                         
                     <?php 
                     }  
                     ?>
		</select>
		<h2>ingrese categoria</h2>
		<select name="categoria" >
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
				</select><br/>
		<h2>Ingrese capacidad</h2>
		<input name="capacidad" type="capacidad" />
		<h2>Fecha Inicio</h2>
		<input type="date" name="date" step="1" >
		<h2>Fecha Fin</h2>
		<input type="date" name="datecierre" step="1" >
	</div>
	<div id="formcouchder"> 
		<div id="formcouchfoto" >
				<h2>ingrese descripcion</h2>
				<textarea name="descripcion"></textarea>
				<button type="submit" action="cargarcouch.php"> enviar </button>
				<img id="imgSalida" width="50%" height="50%" src="" />
				<br />
				<input name="file-input" id="file-input" type="file" />
		</div>
    </div>

	</form>
</div>

</body>
</html>