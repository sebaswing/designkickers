<?php
	include('usuarioregistrado.php'); 
	session_start();
	$usuario = new Usuario();  // creo la instancia de usuario(con name y una clave)
	$usuario->setNombreusuario($_SESSION['mail']);
  	$usuario->cerrarsession();
?>