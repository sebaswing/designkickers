<?php
include('Conexion.php');//incluye el archivo php que contiene la conexion
$link=conectar();//variable que almacena la conexión ala base de datos
if(isset($_REQUEST['modificar'])){
	$id = $_POST['id_couch'];
	$titulo = $_POST['titulo'];
	$capacidad = $_POST['capacidad'];
	$fecha_publicacion = $_POST['fecha1'];
	$fecha_cierre = $_POST['fecha2'];
	$descrip = $_POST['descripcion'];
	$ubicacion = $_POST['ubicaciones'];
	$categorias = $_POST['categorias'];

$queryi="update couch set titulo='$titulo',
						  capacidad='$capacidad',
						  fecha_publicacion='$fecha1',
						  fecha_cierre='$fecha2',
						  descripcion='$descrip',
						  id_ciudad='$ubicacion',
						  id_categoria='$categorias'
					 where id_couch ='$id'";//consulta sql

$val=mysql_query($queryi,$link);//ejecutando consulta

if(!$val){
echo "No se ha podido Modificar";
}
else {
echo "Datos Modificados Correctamente<br><br>";
echo "<a href='Principal.html'>Regresar</a>";
}


}
?>

