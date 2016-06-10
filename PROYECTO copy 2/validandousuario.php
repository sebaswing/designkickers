<?php 
  include('conexion.php');
   include('usuarioregistrado.php');
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
      </head>
      <body>         
            <?php
                  $link=conectar();
                  $usuario = new Usuario();
                  $usuario->iniciarsession($link,$_POST['correo'],$_POST['clave']);
                  $_SESSION['mail']= $_POST['correo'];

                       if($usuario->getlogueado() == 'logueado') 
                       {    
                          //direccionar al usuariocomun.php
                          $_SESSION['log'] = true;
                          
                          header('Location: usuariocomun.php');
                       }
              ?>       
    </body>
</html>                   