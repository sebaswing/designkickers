<?php  
//include("conexion.php");
//session_start();
 // codigo agregado por julian ---------------------
 session_start();
 include("functions.php");
 $t = login_check($mysqli);
 //----------------------------------------------
include("consultacategoria.php");
include("consultaciudades.php");
include("nuevasnotificaciones.php");
//----------------------------------------------
if( $t == 1) {
//-----------------------------------------------------
?>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="estilocouch.css">
	<link rel="stylesheet" type="text/css" href="Menu/estiloMenu.css">  
	<link href='https://fonts.googleapis.com/css?family=Averia+Sans+Libre' rel='stylesheet' type='text/css'>
	<link rel="icon"  href="FOTOS/favicon.jpg" />
	<title>Couch Inn!</title>
	<script  src="js/jquery-1.10.2.min.js" type="text/javascript"></script>
	<script type="text/javascript" src="validacioncouch.js"></script>
	
</head>
<body>
<div id="contenidobuscador">
		<header>
			<?
				include "Menu/menu.php";
			?>
		</header>
</div>
<div id="formulariocouch">
<form name="cargacouch" method="POST" onsubmit=" return validarcouch();" action="cargarcouch.php" enctype="multipart/form-data"> 
	<div id="formcouchizq">
		</br>
		</br>
		</br>
		</br>
		</br>
		<h1>Crear un couch</h1><br>
		<h2>ingrese un titulo</h2><br>
		<input name="titulocouch" placeholder="" />
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
		<input type="date" name="date" step="1" min=
		<?php  
			date_default_timezone_set('America/Argentina/Buenos_Aires');
			$fecha= new DateTime();
			echo "\"".$fecha->format('Y-m-d')."\"";
		?>
		 placeholder="Fecha De Nacimiento" >
		<h2>Fecha Fin</h2>
		<input type="date" name="datecierre" step="1" min=
		<?php  
			date_default_timezone_set('America/Argentina/Buenos_Aires');
			$fecha= new DateTime();
			$dia= $fecha->format('d');
			$mañana= date('Y-m')."-".++$dia;
			$nueva= date_create($mañana);
			echo "\"".$nueva->format('Y-m-d')."\">";
		?>
	</div>
	<div id="formcouchder"> 
		<div id="formcouchfoto" >
				</br>
				</br>
				</br>
				</br>
				</br>
				<h2>ingrese descripcion</h2>
				<textarea name="descripcion"></textarea>
				
				<!--<img id="imgSalida" width="50%" height="50%" src="" />-->
				<br />
				<input name="file-input" id="file-input" type="file" />
				<br>
				<br>
				<output id="list"></output>
				<br>
				<button type="submit" action="cargarcouch.php"> enviar </button>
		</div>
    </div>
	</form>
	<script>
              function archivo(evt) {
                  var files = evt.target.files; // FileList object
             
                  // Obtenemos la imagen del campo "file".
                  for (var i = 0, f; f = files[i]; i++) {
                    //Solo admitimos imágenes.
                    if (!f.type.match('image.*')) {
                        continue;
                    }
             
                    var reader = new FileReader();
             
                    reader.onload = (function(theFile) {
                        return function(e) {
                          // Insertamos la imagen
                         document.getElementById("list").innerHTML = ['<img class="thumb" src="', e.target.result,'" title="', escape(theFile.name), '"/>'].join('');
                        };
                    })(f);
             
                    reader.readAsDataURL(f);
                  }
              }
             
              document.getElementById('file-input').addEventListener('change', archivo, false);
      </script>
</div>
</body>
</html>
<?php } else {  ?>
        <script>
        alert("no ha iniciado sesion");
        window.location.href="index.php";
     </script> 
     <?php
}
?>