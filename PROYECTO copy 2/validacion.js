// funcion para el formulario ingresar sesion del index;
function validarusuindex()
{
			var correovalido=/[\w-\.]{3,}@([\w-]{2,}\.)*([\w-]{2,}\.)[\w-]{2,4}/;  // para validar si es un correo electronico
			if ((document.formulario2.correo.value.length == 0) || ( ! correovalido.test(document.formulario2.correo.value)))
			{
				alert(" ingrese su nombre de usuario correctamente ");
				document.formulario2.correo.focus();
				//sino se cumple la condicion
				return false;
			}
			else
			{
			if(document.formulario2.clave.value.length == 0)
				 {
					alert("ingrese la contraseña");
					document.formulario2.clave.focus();
					// sino se cumple la condicion
					return false;
				 }
				else
				{
					//alert("BIENVENIDO A COUCHIIN");
				    return true;
		        }
  			}
 }

function validarusuadmin()
{
			var correovalido=/[\w-\.]{3,}@([\w-]{2,}\.)*([\w-]{2,}\.)[\w-]{2,4}/;  // para validar si es un correo electronico
			if ((document.formulario2.correo.value.length == 0) || ( ! correovalido.test(document.formulario2.correo.value)))
			{
				alert(" ingrese su nombre de usuario correctamente ");
				document.formulario2.correo.focus();
				//sino se cumple la condicion
				return false;
			}
			else
			{
			if(document.formulario2.clave.value.length == 0)
				 {
					alert("ingrese la contraseña");
					document.formulario2.clave.focus();
					// sino se cumple la condicion
					return false;
				 }
				else
				{
					//alert("BIENVENIDO A COUCHIIN");
				    return true;
		        }
  			}
 }


  function validarreg() // funcion para el formulario registrarse
{	
	var cvalido=/[\w-\.]{3,}@([\w-]{2,}\.)*([\w-]{2,}\.)[\w-]{2,4}/;  // para validar si es un correo electronico
   	var nvalido=/\D[A-Za-zÁÉÍÓÚáéíóú]{2}/;// para validar que sean letras 
   	var valpin=/^[0-9a-zA-Z]{6}/;
    var patron=	/^([0-9])*$/;  // para validar digitos del 0 al 9
   // var nvalido2=/^[0-9a-zA-Z]{6}/;
	if ((document.formulario.correo.value.length == 0) || (! cvalido.test(document.formulario.correo.value))) 
			     	{
			     		alert(" ingrese un E-mail valido");
				    	document.formulario.correo.focus();
				    	// sino se cumple la condicion
				    	return false;
				  	}
		  else{
		  		if ((document.formulario.clave1.value.length == 0) || ( ! valpin.test(document.formulario.clave1.value)))
		  		{
					alert("ingrese la clave");
					document.formulario.clave1.focus();
					//sino se cumple la condicion
					return false;
		  		}		  		 
		   else{
		  		if ((document.formulario.clave2.value.length == 0) || ( ! valpin.test(document.formulario.clave2.value)))
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
								  alert("Las contraseñas no coinciden");
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
	var nvalido=/\D[A-Za-zÁÉÍÓÚáéíóú]{2}/; // para validar que el primer caracter ingresado es una letra
	if ((document.cargar.categoria.value.length == 0) || (! nvalido.test(document.cargar.categoria.value)))
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
	var nvalido=/\D[A-Za-zÁÉÍÓÚáéíóú]{2}/; // para validar que el primer caracter ingresado es una letra
	if ((document.cargar.modcategoria.value.length == 0) || (! nvalido.test(document.cargar.modcategoria.value)))
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

function campovacio()
{
    var nvalido=/^[0-9a-zA-Z]{6}/;
	if (document.formulario1.password.value.length == 0)
	{
			     		alert("ingrese una contraseña ");
				    	document.formulario1.password.focus();
				    	// sino se cumple la condicion
				    	return false;
	}
	else if( (! nvalido.test(document.formulario1.password.value)))
	{
		alert("ingrese una contraseña valida de mas de 6 letras y/o numeros")
		document.formulario1.password.focus();
		// sino se cumple la condicion
		return false; 
	}
	else	
		//alert("se ingreso correctamente los datos");  (isNaN(parseInt(formulario.campo2.value))) esto es para q se solo numeros
		return true;

}

function fecha()
{
	if (document.formulario2.fecha_nac.value.length == 0)
	{
			     		alert("ingrese una fecha");
				    	document.formulario2.fecha_nac.focus();
				    	// sino se cumple la condicion
				    	return false;
	}
				  	else
						//alert("se ingreso correctamente los datos");  (isNaN(parseInt(formulario.campo2.value))) esto es para q se solo numeros
				    	return true;

}

function validarape()
{
	var nvalido=/\D[A-Za-zÁÉÍÓÚáéíóú]{2}/; // para validar que el primer caracter ingresado es una letra
	if ((document.formulario3.apellido.value.length == 0) || (! nvalido.test(document.formulario3.apellido.value)))
			     	{
			     		alert("ingrese un apellido valido");
				    	document.formulario3.apellido.focus();
				    	// sino se cumple la condicion
				    	return false;
				  	}
				  	else
				  		
						//alert("se ingreso correctamente los datos");  (isNaN(parseInt(formulario.campo2.value))) esto es para q se solo numeros
				    	return true;
	
}

function validarnom()
{
	var nvalido=/\D[A-Za-zÁÉÍÓÚáéíóú]{2}/; // para validar que el primer caracter ingresado es una letra
	if ((document.formulario4.nombre.value.length == 0) || (! nvalido.test(document.formulario4.nombre.value)))
			     	{
			     		alert("ingrese un nombre valido");
				    	document.formulario4.nombre.focus();
				    	// sino se cumple la condicion
				    	return false;
				  	}
				  	else
				  		
						//alert("se ingreso correctamente los datos");  (isNaN(parseInt(formulario.campo2.value))) esto es para q se solo numeros
				    	return true;
	
}

function validartel()
{
	var patron=	/^([0-9])*$/;  // para validar digitos del 0 al 9
	if ((document.formulario5.telefono.value.length == 0) || ( ! patron.test(document.formulario5.telefono.value)))
			     	{
			     		alert("ingrese un telefono valido");
				    	document.formulario5.telefono.focus();
				    	// sino se cumple la condicion
				    	return false;
				  	}
				  	else
				  		
						//alert("se ingreso correctamente los datos");  (isNaN(parseInt(formulario.campo2.value))) esto es para q se solo numeros
				    	return true;
	
}

function validarpremium()
{
	if (document.formulario.numtarjeta.value.length == 0)
	{
			     		alert("ingrese el numero de tarjeta ");
				    	document.formulario.numtarjeta.focus();
				    	// sino se cumple la condicion
				    	return false;
	}
	else if(((!document.formulario.numtarjeta.value.length == 16)))
	{
		alert("ingrese una contraseña valida de mas de 6 letras y/o numeros");
		document.formulario1.numtarjeta.focus();
		// sino se cumple la condicion
		return false; 
	}
	else	
		//alert("se ingreso correctamente los datos");  (isNaN(parseInt(formulario.campo2.value))) esto es para q se solo numeros
		return true;
}
// validacion del modificar couch// 
function valmodificar() 
{
   	var nvalido=/\D[A-Za-zÁÉÍÓÚáéíóú]{2}/;
   	var patron=	/^([0-9])*$/;  // para validar digitos del 0 al 9
   	var datePat = /^\d{1,2}(\.|)\d{3}(\.|)\d{3}[(-|)][0-9kK]{1}$/;
	if ((document.modif.titulo.value.length == 0) || (! nvalido.test(document.modif.titulo.value)))
	{
			alert(" ingrese un titulo");
		    document.modif.titulo.focus();
		    return false;
	}
	else{ if ((document.modif.capacidad.value.length == 0) || ( ! patron.test(document.modif.capacidad.value)))
		 {
			alert("ingrese la capacidad");
			document.modif.capacidad.focus();
			//sino se cumple la condicion
			return false;
		 } 
		else{ if ((document.modif.inicio.value.length == 0) || ( datePat.test(document.modif.inicio.value)))
			{
				alert("ingrese la fecha de inicio");
				document.modif.inicio.focus();
				//sino se cumple la condicion
				return false;
			}
		else{ if ((document.modif.cierre.value.length == 0) || ( datePat.test(document.modif.cierre.value)))
		{
			alert("ingrese la fecha de cierre");
			document.modif.cierre.focus();
			//sino se cumple la condicion
			return false;
		}
		else { if ((document.modif.descrip.value.length == 0) || (! nvalido.test(document.modif.descrip.value)))
			{
				alert("ingrese la descripcion");
				document.modif.descrip.focus();
				//sino se cumple la condicion
				return false;
			}
		}
		}
		}
		}		  		 	  		 
}
