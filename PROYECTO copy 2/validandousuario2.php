<?php 
   include('usuarioregistrado2.php');
   session_start();
	 include("conexion.php");
?>
<!DOCTYPE html>
<html>
      <head>
            <meta charset="UTF-8"> <!-- Especifica la codificación de caracteres para el documento HTM-->
            <title>index</title> <!--titulo de la pagina -->
            <link rel="stylesheet" type="text/css" href="admin.css">  
      </head>
      <body>         
            <header><a href="index.php"><img src="./imagenes/logo.png"></a>
            </header>
            <?php
                  $link=conectar();
                  $usuario = new Usuario();
                  $usuario->iniciarsession($link,$_POST['usuario'],$_POST['clave']);
                  $_SESSION['usuario']= $_POST['usuario'];

                       if($usuario->getlogueado() == 'logueado') 
                       {
                                    
                          //direccionar al backend
                          $_SESSION['log'] = true;

                           header('Location: backend.php');
                       }
              ?>       
    </body>
</html>                               