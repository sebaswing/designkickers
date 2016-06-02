<?php  // funcion php para la conexion con la base de datos
function conectar()
{
	$link = mysqli_connect('localhost','root', '','basecouch')// primero localhost, root,sinclave,nomdela		
	or die("Error " . mysqli_error($link));
	mysqli_query($link,"SET NAMES 'utf8'");// esta funcion te coloca los asentos automaticamente en la bd
	mysqli_query($link,"SET CHARACTER SET utf8");
	mysqli_query($link,"SET COLLATION_CONNECTION = 'utf8_unicode_ci'"); 
	return $link;
}
?>