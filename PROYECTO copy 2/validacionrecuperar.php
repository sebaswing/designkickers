<?php
      include('conexion.php');
      if ( isset($_POST['aceptarrecu']) and isset($_POST['correo1']))
   	   { 
	      	$link = conectar();
	      	$correo = $_POST['correo1'];// me traigo mediante un arreglo el correo.
	        //print_r($_POST);
	        // consulta para comparar q el correo sea distinto al ingresado
	      	$sql = "SELECT mail FROM usuario WHERE mail = '$correo' ";
	      	//echo $sql;
	      	$usuario = mysqli_query($link , $sql)
	      	or die (mysqli_error($link)); // envio la consulta
	      	$row = mysqli_fetch_assoc($usuario);
	      	if ($row == null)  // si el numero de filas es 0 que me redireccione a index mostrando un msj q no existe el mail
	       	{ 
	       		?>
	          <script>
	             alert(" EL CORREO QUE HA INGRESADO NO EXISTE ");
	             window.location.href="recuperar.php";
	          </script> 
	       	  <?php
	    	} else {
	    		?>
	    		<script>
	             alert("Se ha enviado un correo para restablecer su cuenta.");
	             window.location.href="index.php";
	          </script>
	          <?php
	    	}
   		}
  ?>
<!-- validacion en javascript para el correo -->
<script>
	function confirmar()
	{
		if(document.recuperarClave.correo1.value.length == 0)
		{
			alert("ingrese un correo porfavor");
			document.recuperarClave.correo1.focus();
			return false;
		}
		else if(document.recuperarClave.correo1.value  == <?php echo json_encode($correo); ?>)
		{
			alert("EL CORREO QUE HA INGRESADO NO EXISTE");
	     	document.recuperarClave.correo1.focus();
		 	return false;
		}
		else
	        alert("se le ha enviado su nueva clave por email");
	        location.href="index.php";
	        return true;
  	}
</script>