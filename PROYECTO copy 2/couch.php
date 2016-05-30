<!--
	// falta validar campos vacios y conectar con las variables session
-->
<?php  
include("conexion.php");
include("consultacategoria.php");
?>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="estilocouch.css"> 
	<link href='https://fonts.googleapis.com/css?family=Averia+Sans+Libre' rel='stylesheet' type='text/css'>
	<script src= "js/main.js" type="text/javascript"></script> 
	<script  src="js/jquery-1.10.2.min.js" type="text/javascript"></script>
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
		<img class="iniciologo" src="logo.png" alt="logo" >
		<button>Cerrar Sesion</button>
</div>
<div id="formulariocouch">
<form method="POST" action="cargarcouch.php"> 
	<div id="formcouchizq">
	<h1>Crear un couch</h1><br>
		<h2>ingrese un titulo</h2><br>
		<input name="titulocouch" placeholder="Las casitas" />
		<h2>ingrese ubicacion</h2>
		<select name="ubicacion">
			<option> </option>
			<option>La Plata</option>
			<option>Capital Federal</option>
			<option>Mar de las pompas</option>
		</select>
		<h2>ingrese categoria</h2>
		<li><select name="categoria" >
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
				</select></li>	
		<input name="capacidad" type="capacidad" />
		<h2>Fecha Inicio</h2>
		<input type="datetime" name="date" step="1" >
		<h2>Fecha Fin</h2>
		<input type="datetime" name="datecierre" step="1" >
		<h2>ingrese descripcion</h2>
		<textarea name="descripcion" />
		</textarea>
		<button type="submit"> enviar </button>
	</div>
	<div id="formcouchder"> 
		<div id="formcouchfoto" >
				<img id="imgSalida" width="50%" height="50%" src="logo.png" />
				<br />
				<input name="file-input" id="file-input" type="file" />
		</div>
    </div>

	</form>
</div>

</body>
</html>