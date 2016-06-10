<?php  
include('conexion.php');
$link = conectar();
$sql= 'select mail, password from usuario';
$resultado = mysqli_query($link,$sql);
while($tupla = mysqli_fetch_array($resultado))
{
	echo $tupla['mail']?>
		</br>
	<?php  
	echo $tupla['password']
	?>
	</br>
<?php } 
?>
