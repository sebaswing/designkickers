<?php   
  include("conexion.php");
  $link = conectar();
   $cor=$_POST['correo'];
   $cla=$_POST['clave1'];
   $ape=$_POST['ape'];
   $nom=$_POST['nom'];
   $tel=$_POST['numeroTel'];
   $fecha=$_POST['fechanac'];
   $consulta = "select * from usuario where mail = '$cor'";
   $usuario = mysqli_query($link , $consulta);
   $row = mysqli_num_rows($usuario);
   if ($row == 1 ) {
      ?>
      <script>
        alert(" Ya existe un mail con ese mismo nombre de usuario");
        window.location.href="Registrarme.php";
       </script> 
       <?php
   }
   $sql= "INSERT INTO usuario(mail,password,fecha_nac,apellido,nombre,telefono)
      values('$cor','$cla','$fecha','$ape','$nom',$tel)";
     $insertarusu1 = mysqli_query($link, $sql);
    // if (!$insertarusu1) { die ("error en consulta: ".mysql_error());
    
     ?>
      <script>
        alert("se inserto correctamente");
        window.location.href="usuariocomun.php";
     </script> -->  
     <?php
?>