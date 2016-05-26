<?php
	include('usuarioregistrado2.php'); 
	include('conexion.php');
	session_start();
	$usuario = new Usuario();  // creo la instancia de usuario(con name y una clave)
	$usuario->setNombreusuario($_SESSION['usuario']);
  	$usuario->cerrarsession();
?>