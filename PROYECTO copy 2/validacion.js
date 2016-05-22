// funcion para el formulario ingresar sesion
function validarusu()
{
   			var nvalido=/^\d/; // para validar que el primer caracter ingresado es una letra
			var correovalido=/[\w-\.]{3,}@([\w-]{2,}\.)*([\w-]{2,}\.)[\w-]{2,4}/;  // para validar si es un correo electronico
			if ((document.formulario.mail.value.length == 0) || ( ! correovalido.test(document.formulario.mail.value)))
			{
				alert(" ingrese su nombre de usuario correctamente ");
				document.formulario.mail.focus();
				//sino se cumple la condicion
				return false;
			}
			else
			{
				if (document.formulario.clave.value.length == 0)
				 {
					alert("ingrese la contraseña");
					document.formulario.clave.focus();
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
   	var nvalido=/\d/; // para validar que el primer caracter ingresado es una letra
    var patron=	/^([0-9])*$/;  // para validar digitos del 0 al 9

	if ((document.formulario.correo.value.length == 0) || (! cvalido.test(document.formulario.correo.value))) 
			     	{
			     		alert(" ingrese un E-mail valido");
				    	document.formulario.correo.focus();
				    	// sino se cumple la condicion
				    	return false;
				  	}
		  else{
		  		if ((document.formulario.clave.value.length == 0) || ( ! patron.test(document.formulario.clave.value)))
		  		{
					alert("ingrese la clave");
					document.formulario.clave.focus();
					//sino se cumple la condicion
					return false;
		  		}		  		 
		  else{
		  		if ((document.formulario.ape.value.length == 0) || ( nvalido.test(document.formulario.ape.value)))
				  {
						alert("ingrese el apellido");
						document.formulario.focus();
						//sino se cumple la condicion
						return false;
				  }	 
		  	else{
		  		 if ((document.formulario.nom.value.length == 0) || ( nvalido.test(document.formulario.nom.value))) 
	      		 {
		    		alert("ingrese el Nombre");
		    		document.formulario.nom.focus();
					//  sino se cumple la condicion
		    		return false;
		    	}
		  		else{
			  			if ((document.formulario.numeroTel.value.length == 0) || ( isNaN(parseInt(document.formulario.numeroTel.value))))
					  	{
								alert("ingrese un telefono");
								document.formulario.numeroTel.focus();
								//sino se cumple la condicion
								return false;
					  	}
				  	else{
		  			if ((document.formulario.fechanac.value.length == 0) || ( ! patron.test(document.formulario.clave.value))) 
				  	{
							alert("ingrese una fecha de nacimiento");
							document.formulario.fechanac.focus();
							//sino se cumple la condicion
							return false;
				  	}
				  	else{
				  		if(!document.getElementById('check1').checked){

							alert('seleccione que acepta las condiciones');
							}
					else
						//alert("se ingreso correctamente los datos");  (isNaN(parseInt(formulario.campo2.value))) esto es para q se solo numeros
				    	return true;
				    }
				   }
				 }
				}
             }
         }
     }
