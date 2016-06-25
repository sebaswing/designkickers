// funcion para el formulario ingresar sesion
function validarusu()
{
   			var nvalido=/^\d/; // para validar que el primer caracter ingresado es una letra
			var correovalido=/[\w-\.]{3,}@([\w-]{2,}\.)*([\w-]{2,}\.)[\w-]{2,4}/;  // para validar si es un correo electronico
			if ((document.formulario2.usuario.value.length == 0) || ( ! correovalido.test(document.formulario2.usuario.value)))
			{
				alert(" ingrese su nombre de usuario correctamente ");
				document.formulario2.usuario.focus();
				//sino se cumple la condicion
				return false;
			}
			else
			{
				if (document.formulario2.clave.value.length == 0)
				 {
					alert("ingrese la contraseña");
					document.formulario2.clave.focus();
					// sino se cumple la condicion
					return false;
				 }
				else
				{
					//alert("se ingreso correctamente los datos");
				    return true;
		        }
  			}
  }

  function validarreg() // funcion para el formulario registrarse
{	
	var cvalido=/[\w-\.]{3,}@([\w-]{2,}\.)*([\w-]{2,}\.)[\w-]{2,4}/;  // para validar si es un correo electronico
   	var nvalido=/\D[A-Za-zÁÉÍÓÚáéíóú]{2}/;// para validar que sean letras 
    var patron=	/^([0-9])*$/;  // para validar digitos del 0 al 9

	if ((document.formulario.correo.value.length == 0) || (! cvalido.test(document.formulario.correo.value))) 
			     	{
			     		alert(" ingrese un E-mail valido");
				    	document.formulario.correo.focus();
				    	// sino se cumple la condicion
				    	return false;
				  	}
		  else{
		  		if (document.formulario.clave1.value.length == 0)
		  		{
					alert("ingrese la clave");
					document.formulario.clave1.focus();
					//sino se cumple la condicion
					return false;
		  		}		  		 
		   else{
		  		if (document.formulario.clave2.value.length == 0)
				  {
						alert("ingrese nuevamente la clave");
						document.formulario.clave2.focus();
						//sino se cumple la condicion
						return false;
				  }	 
		  		if ((document.formulario.ape.value.length == 0) || ( ! nvalido.test(document.formulario.ape.value)))
				  {
						alert("ingrese el Apellido valido");
						document.formulario.ape.focus();
						//sino se cumple la condicion porque putas no lee con menos de 4 caracteres ?
						return false;
				  }	 
		  	else{
		  		 if ((document.formulario.nom.value.length == 0) || ( ! nvalido.test(document.formulario.nom.value))) 
	      		 {
		    		alert("ingrese el Nombre valido");
		    		document.formulario.nom.focus();
					//  sino se cumple la condicion
		    		return false;
		    	}
		  		else{
			  			if ((document.formulario.numeroTel.value.length == 0) || ( ! patron.test(document.formulario.numeroTel.value)))
					  	{
								alert("ingrese un telefono valido");
								document.formulario.numeroTel.focus();
								//sino se cumple la condicion
								return false;
					  	}
				  	else{
		  			if ((document.formulario.fechanac.value.length == 0) || (patron.test(document.formulario.fechanac.value ))) 
				  	{
							alert("ingrese una fecha de nacimiento");
							document.formulario.fechanac.focus();
							//sino se cumple la condicion
							return false;
				  	}
				  	else{
				  		if(!document.getElementById('check1').checked)
				  		{
							alert('seleccione que acepta las condiciones');
							//sino se cumple la condicion
							return false;
							}
						else{
							if (document.formulario.clave1.value != document.formulario.clave2.value)
						  	   {
								  alert("Las passwords no coinciden");
								  return false;
								} else 
							{
							 // alert("Todo esta correcto");
							  return true; 
							}
						}	
				    }
				   }
				 }
				}
             }
           }
         }

function validarcategoria()
{
	var nvalido=/\d/; // para validar que el primer caracter ingresado es una letra
	if ((document.cargar.categoria.value.length == 0) || ( nvalido.test(document.cargar.categoria.value)))
			     	{
			     		alert("ingrese una categoria valida");
				    	document.cargar.categoria.focus();
				    	// sino se cumple la condicion
				    	return false;
				  	}
				  	else
						//alert("se ingreso correctamente los datos");  (isNaN(parseInt(formulario.campo2.value))) esto es para q se solo numeros
				    	return true;
	
}

function validarcategoria2()
{
	var nvalido=/\d/; // para validar que el primer caracter ingresado es una letra
	if ((document.cargar.modcategoria.value.length == 0) || ( nvalido.test(document.cargar.modcategoria.value)))
			     	{
			     		alert("ingrese una categoria valida");
				    	document.cargar.modcategoria.focus();
				    	// sino se cumple la condicion
				    	return false;
				  	}
				  	else
				  		
						//alert("se ingreso correctamente los datos");  (isNaN(parseInt(formulario.campo2.value))) esto es para q se solo numeros
				    	return true;
	
}

function confirmDel() // para eliminar una categoria
{
  var agree=confirm("¿Realmente desea eliminarlo? ");
  if (agree) return true ;
  return false;
}