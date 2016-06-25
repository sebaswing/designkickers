
<?php
  include("conexion.php");
  $link = conectar();  // funcion conectar
	$idactual = $_POST['idcouch']; // id actual del couch
  $tituloviejo=$_POST['titulo'];  // titulo del input
  $capacidadviejo=$_POST['capacidad'];  // titulo del input
  $inicioviejo=$_POST['inicio'];   // titulo del input
  $cierreviejo=$_POST['cierre'];   // titulo del input
  $descripcionvieja=$_POST['descripcion'];   // titulo del input
  $ubicacionvieja=$_POST['ubicaciones'];     // titulo del input
  $categoriavieja=$_POST['categorias'];   // titulo del input
	$sql= "update couch 
         set  titulo = '".$tituloviejo."',
              capacidad = '".$capacidadviejo."',
              fecha_publicacion = '".$inicioviejo."',
              fecha_cierre  = '".$cierreviejo."',
              descripcion = '".$descripcionvieja."',
              id_ciudad= '".$ubicacionvieja."',
              id_categoria = '".$categoriavieja."'
              where id_couch = '".$idactual."'";  // consulta para editar
	$insertar = mysqli_query($link , $sql); //  invoca la consulta
	if ($link->query($sql) === TRUE) {
  echo "<script>
          window.location.href='perfilCouch.php';
        </script>
       "
   	// echo "Record updated successfully";
	} else {
    echo "Error updating record: " . $link->error;
	}
	?>
  