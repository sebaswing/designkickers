<?php   
  include("conexion.php");
  $link = conectar();
   $cor=$_POST['correo'];
   $cla=$_POST['clave'];
   $ape=$_POST['ape'];
   $nom=$_POST['nom'];
   $tel=$_POST['numeroTel'];
   $fecha=$_POST['fechanac'];
   $sql= "INSERT INTO usuario(mail,password,fecha_nac,apellido,nombre,telefono)
      values('$cor','$cla','$fecha','$ape','$nom',$tel)";
     $insertarusu1 = mysqli_query($link , $sql);
      echo $sql;
     ?>
      <script>
        alert("se inserto correctamente");
        window.location.href="usuariocomun.php";
       </script>  
     <?php
?>