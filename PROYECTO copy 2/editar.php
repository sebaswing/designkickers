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
<?php
	$action = $_GET["action"];
	$idactual = $_GET['idcouch'];
	if ($action == "modificar") 
	{ // si cliquea modificar
		echo "entro";
		$idactual = $_GET['idcouch']; // le asigno id actual a una variable para q me devuelva en la consulta
	   print_r($_GET);
	   $titulo = $_POST['titulo']; // me devuelva por un arreglo el titulo del couch  
	   //print_r($_POST);
	   $capacidad = $_POST['capacidad'];
	   $fecha_publicacion = $_POST['inicio'];
	   $fecha_cierre = $_POST['cierre'];
	   $descrip = $_POST['descrip'];
	   $ubicacion = $_POST['ubicaciones'];
	   $categorias = $_POST['categorias'];
	   $link = conectar();
	   $sql = "UPDATE couch SET ";
	   $sql.= "titulo=".$titulo.", 
	   		  capacidad=".$capacidad.", 
	   		  inicio=".$fecha_publicacion.", 
	   		  cierre=".$fecha_cierre.", 
	   		  ciudad_nombre=".$ubicaciones.", 
	   		  categorias=".$categorias." ";	
	   $sql.= "WHERE id_couch=".$idactual;
	  $edito= mysqli_query($link, $sql);
	//header("location: listado.php");
   }
?>
<!-- codigo de la sesion-->
<?php } else {  ?>
        <script>
        alert("no ha iniciado sesion");
        window.location.href="index.php";
     </script> 
     <?php
}
?>