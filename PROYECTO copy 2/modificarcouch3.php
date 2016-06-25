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
?> 
<!DOCTYPE html>
<html>
<head>
	<link href='https://fonts.googleapis.com/css?family=Averia+Sans+Libre' rel='stylesheet' type='text/css'> 
	<link rel="stylesheet" type="text/css" href="n.css">
	<link rel="stylesheet" type="text/css" href="estilo.css">
	<title></title>
	<link rel="icon" href="FOTOS/favicon.jpg">
</head>
<body>
	<div id="contenidobuscador">
		<a href="usuariocomun.php"><img class="iniciologo" src="FOTOS/logo.png" alt="logo"></a>
		<div id="botons">
			  <form  method="get" action="logout.php" >
	                  <button id="cerrar">CERRAR SESION</button>
	                  <br>
	          </form>
        </div>
	</div>
	</br>
	</br>
	<?php  //  
		   $link = conectar();
		   $idactual=$_GET['idcouch']; // le asigno id actual a una variable para q me devuelva en la consulta
		   print_r($_GET);
		   $sql="SELECT 
		   			c.id_couch idCouch,
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
                    AND c.id_couch = '".$_GET['idcouch']."' ";// falta poner el couch que es en cada uno


           $couch = mysqli_query($link , $sql); //Envia una consulta MySQL
           
           ?>
           <form action='consultamodificarcouch.php' method='post'>
           <div style= 'text-align:center'>
           <?php
		   while ($row = mysqli_fetch_assoc($couch))			
			{						
								    echo "<input name='titulo' value='".$row['titulo']."'/> <br>
									<input type='text' name='capacidad' value='".$row['capacidad']."'><br>
									<input type='text' name='inicio' value='".$row['inicio']."'><br>
									<input type='text' name='cierre' value='".$row['cierre']."'><br>
									<input type='text' name='descripcion'value='".$row['descripcion']."'><br>
									<input type='text' name='ubicaciones' value='".$row['nombreCiudad']."'><br>
									<input type='text' name='categorias' value='".$row['nombreCategoria']."'><br>
									<input type='hidden' name='idcouch' value='".$_GET['idcouch']."'>
									
									<button type='submit' name='modificar'>modificar</button> <br>
									
									";
			}
				?>
				</div>
			</form>
<?php } else {  ?>
        <script>
        alert("no ha iniciado sesion");
        window.location.href="index.php";
     </script> 
     <?php
}
?>