<?php
class Usuario
{
    //se declaran los atributos de la clase,es decir, el nombre de usuario y clave
	var $nomusuario;
	var $clave;
    var $logueado;


	function __construct() // declaro la funcion constructor, 
	{       
			$this->logueado= false; // setea logueado  
       
	}

	function iniciarsession($link,$nomusuario,$clave)
	{   
	    $sql = "select * from admin where mail = '".$nomusuario."' and password = '".$clave."'"; 
	    $result= mysqli_query($link,$sql);
		$row=mysqli_fetch_assoc($result);
		// excepsion//
		try
		{
			if ($row){
                 $this->logueado = true;
                }
		     else{
			 	$error= '<div class="mensajedeerror">
			 				<script>
					        alert("el usuario que ingreso no existe");
					        window.location.href="ingresar.php";
					       </script>
			 				<p><h2>el usuario que ingreso es incorrecto</h2></p>
			 			 </div>';
				throw new Exception ($error);
                }
        }
        catch (\Exception $e)
        {

          echo $e->getMessage(); 
          echo "	
          			<div class='mensajedeerror2'>
          			<a href='ingresar.php'><h2>VOLVER AL FORMULARIO</h2></a>
          			</div>
          	   ";

        }
			
		$this->nomusuario=$row['mail'];
		$this->clave=$row['password'];
	   }

	function cerrarsession()  // funcion cerrar session
	{
			session_unset();
			session_destroy();
			header ('Location: index.php');
    }
     

    
    // funciones que devuelven valores
	function getNombreusuario()
	 { return $this->nomusuario;}
	function getClave()
	 { return $this->clave;}
	 function getLogueado()
	 { return $this->logueado;}
	 

	 
    // metodos que setean los valores
	function setNombreusuario($val)
    { $this->nomusuario=$val;}
	function setidClave($val)
	{ $this->clave=$val;}
	function setLogueado($val)
    { $this->logueado=$val;}
	
}			
?>