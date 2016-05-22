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
	    $sql = "select * from usuario where mail = '".$nomusuario."' and password = '".$clave."'"; 
	    echo $sql;
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
			 				<p><h2>el nombre de usuario o la clave es incorrecta</h2></p>
			 			 </div>';
				throw new Exception ($error);
                }
        }
        catch (\Exception $e)
        {

          echo $e->getMessage(); 
          echo "	
          			<div class='mensajedeerror2'>
          			<a href='index.php'><h2>VOLVER AL FORMULARIO</h2></a>
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