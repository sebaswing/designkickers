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
<html>
<head>
<link rel="stylesheet" type="text/css" href="estilodetalle.css"> 
<link rel="icon"  href="FOTOS/favicon.jpg" />
<title>Couch Inn!</title>
</head>
<body>	
		<p><strong>Imagen a la izquierda</strong></p>
		<div><img src="FOTOS/favicon.jpg" hspace="5" vspace="5" style="float: left;" />
		Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do   eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad   minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip   ex ea commodo consequat. Duis aute irure dolor in reprehenderit in   voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur   sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt   mollit anim id est laborum.</div>
	   

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