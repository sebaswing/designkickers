<?php 
	 include("conexion.php");
    include('usuarioregistrado2.php');
    session_start();
  
   ///-------------------------------
     $_SESSION['mail']= $_REQUEST['correo'];
   $_SESSION['password']= $_REQUEST['clave'];
   ///--------------------------------------
?>
<!DOCTYPE html>
<html>
      <head>
            <meta charset="UTF-8"> <!-- Especifica la codificación de caracteres para el documento HTM-->
            <title>index</title> <!--titulo de la pagina -->
            <link rel="stylesheet" type="text/css" href="admin.css">  
      </head>
            <a href="index.php"><img class="iniciologo" src="FOTOS/logo.png" alt="logo"></a>
      <body>         
            <?php
                  $link=conectar();
                  $usuario = new Usuario();
                  $usuario->iniciarsession($link,$_POST['correo'],$_POST['clave']);
                  //$_SESSION['usuario']= $_POST['correo'];

                       if($usuario->getlogueado() == 'logueado') 
                       {
                                    
                          //direccionar al backend
                          $_SESSION['log'] = true;

                           header('Location: backend.php');
                       }
              ?>       
    </body>
</html>                               