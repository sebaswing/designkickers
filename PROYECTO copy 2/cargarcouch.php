<?php   
// pagina de donde saque codigo para imagen:
// https://manuais.iessanclemente.net/index.php/Almacenamiento_de_im%C3%A1genes_en_bases_de_datos_con_PHP
	// falta validar campos vacios y conectar con las variables session
	include("conexion.php");
	session_start();
	$link = conectar();
	$categoria=$_POST['categoria'];
	$mail=$_SESSION['mail'];
	$titulo=$_POST['titulocouch'];
	$fechapublicacion=$_POST['date'];
	$fechacierre=$_POST['datecierre'];
	$ubicacion=$_POST['ubicacion'];
	$capacidad=$_POST['capacidad'];
	$descripcion=$_POST['descripcion'];
	$sql= "INSERT INTO couch(id_couch, mail, id_categoria, fecha_publicacion, fecha_cierre, id_ciudad, capacidad, descripcion, titulo)
	values('','".$mail."','".$categoria."','".$fechapublicacion."','".$fechacierre."', '".$ubicacion."','".$capacidad."', '".$descripcion."', '".$titulo."')";
	//$insertar = mysqli_query($link , $sql) or die (mysqli_error($link));
	$tempo = $link; 
	$tempo->query($sql);
	# Cogemos el identificador con que se ha guardado
	
    $id=$tempo->insert_id;
	
	$permitidos = array("image/jpg", "image/jpeg", "image/gif", "image/png");
    $limite_kb = 16384;
 
    if (in_array($_FILES['file-input']['type'], $permitidos) && $_FILES['file-input']['size'] <= $limite_kb * 1024)
    {
 
        // Archivo temporal
        $imagen_temporal = $_FILES['file-input']['tmp_name'];
 
        // Tipo de archivo
        $tipo = $_FILES['file-input']['type'];
 
        // Leemos el contenido del archivo temporal en binario.
        $fp = fopen($imagen_temporal, 'r+b');
        $data = fread($fp, filesize($imagen_temporal));
        fclose($fp);
 
        //Podríamos utilizar también la siguiente instrucción en lugar de las 3 anteriores.
        // $data=file_get_contents($imagen_temporal);
 
        // Escapamos los caracteres para que se puedan almacenar en la base de datos correctamente.
        $data = mysql_escape_string($data);
        // Insertamos en la base de datos.
        //$resultado = @mysql_query("INSERT INTO fotografia (id_couch, imagen, type) VALUES ('$id', '$data', '$tipo')") or die (mysqli_error($link));;
		$resultado1 = "INSERT INTO fotografia (id_couch, imagen,fotoPerfil,type) VALUES ('$id', '$data','1','$tipo')";
			$resultado = mysqli_query($link, $resultado1) or die (mysqli_error($link));;
		
 
        if ($resultado)
        {
            echo "El archivo ha sido copiado exitosamente.";
        }
        else
        {
            echo "Ocurrió algun error al copiar el archivo.";
        }
    }
    else
    {
        echo "Formato de archivo no permitido o excede el tamaño límite de $limite_kb Kbytes.";
    }
?>
      <script>
        window.location.href="usuariocomun.php";
      </script> 
   <?php
?>