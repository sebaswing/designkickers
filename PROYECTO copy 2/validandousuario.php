<?php 
   include('usuarioregistrado.php');
   session_start();
   include('conexion.php');
?>
<!DOCTYPE html>
<html>
      <head>
            <meta charset="UTF-8"> <!-- Especifica la codificación de caracteres para el documento HTM-->
            <title>index</title> <!--titulo de la pagina -->
      </head>
      <body>         
            <?php
                  $link=conectar();
                  $usuario = new Usuario();
                  $usuario->iniciarsession($link,$_POST['mail'],$_POST['clave']);
                  $_SESSION['mail']= $_POST['mail'];

                       if($usuario->getlogueado() == 'logueado') 
                       {
                                    
                          //direccionar al backend
                          $_SESSION['log'] = true;

                           header('Location: usuariocomun.php');
                       }
              ?>       
    </body>
</html>                   