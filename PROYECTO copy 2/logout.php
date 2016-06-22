<?php
//codigo de maxi-----------------------------------------------------------------------------------
//	include('usuarioregistrado.php'); 
//	session_start();
//	$usuario = new Usuario();  // creo la instancia de usuario(con name y una clave)
//	$usuario->setNombreusuario($_SESSION['mail']);
//  	$usuario->cerrarsession();

//codigo julian final -----------------------------------------------------------------------------
	session_start();	
 
// Desconfigura todos los valores de sesión.
$_SESSION = array();
 
// Obtiene los parámetros de sesión.
$params = session_get_cookie_params();
 
// Borra el cookie actual.
setcookie(session_name(),'', time() - 42000, $params["path"], $params["domain"], $params["secure"], $params["httponly"]);
 
// Destruye sesión. 
session_destroy();
?>
<script>
        window.location.href="index.php";
      </script> 
<?php
  ?>


?>