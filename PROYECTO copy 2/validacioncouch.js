  function insertAtras(e,i){ 
        if(e.nextSibling){ 
            e.parentNode.insertBefore(i,e.nextSibling); 
        } else { 
            e.parentNode.appendChild(i); 
        }
    }
        
    //e: el nodo tras el que se quiere insertar otro.
    //i: el nodo que se quiere insertar.



 function validarcouch() // funcion para el formulario registrarse
{	
	var cvalido=/[\w-\.]{3,}@([\w-]{2,}\.)*([\w-]{2,}\.)[\w-]{2,4}/;  // para validar si es un correo electronico
   	var nvalido=/\D[A-Za-zÁÉÍÓÚáéíóú]{2}/ // para validar que el primer caracter ingresado es una letra
    var patron=	/^([0-9])*$/;  // para validar digitos del 0 al 9
    var $fecha = document.cargacouch.date.value;
	var $hoy = new Date();

	if ((document.cargacouch.titulocouch.value.length == 0) || (! nvalido.test(document.cargacouch.titulocouch.value))) 
			     	{
			     		alert(" ingrese un titulo valido");
				    	document.cargacouch.titulocouch.focus();
						//var nuevo = document.createElement('p').appendChild(document.createTextNode('El campo esta vacio'));
						//insertAtras(document.cargacouch.titulocouch,nuevo);
						//var para = document.createElement("P");                       // Create a <p> element
						//var t = document.createTextNode("This is a paragraph");       // Create a text node
						//para.appendChild(t);                                          // Append the text to <p>
						//document.cargacouch.appendChild(para);             
				    	// sino se cumple la condicion
				    	return false;
				  	}
		  else{
		  		if (document.cargacouch.ubicacion.value.length == 0)
		  		{
					alert("ingrese ubicacion");
					document.cargacouch.ubicacion.focus();
					//sino se cumple la condicion
					return false;
		  		}		  		 
		   else{
		  		if (document.cargacouch.categoria.value.length == 0)
				  {
						alert("ingrese categoria");
						document.cargacouch.categoria.focus();
						//sino se cumple la condicion
						return false;
				  }	 
		  		if ((document.cargacouch.capacidad.value.length == 0) || (! patron.test(document.cargacouch.capacidad.value)))
				  {
						alert("ingrese la capacidad valida");
						document.cargacouch.capacidad.focus();
						//sino se cumple la condicion
						return false;
				  }	 
		  	else{
				  if (document.cargacouch.date.value.length == 0) 
					  	{	  
					  			//&& ($hoy <= $fecha) && ($fecha.getDate() <= 31) && ($fecha.getMonth() - 1 <= 11) && ($fecha.getFullYear() ))
								alert("ingrese una fecha inicio ");
								document.cargacouch.date.focus();
								//sino se cumple la condicion
								return false;
					  	}
				  	else{
		  			if (document.cargacouch.datecierre.value.length == 0)
				  	{
							alert("ingrese una fecha de cierre");
							document.cargacouch.datecierre.focus();
							//sino se cumple la condicion
							return false;
				  	} else{ 
				  		if ((document.cargacouch.descripcion.value.length == 0) || ( ! nvalido.test(document.cargacouch.descripcion.value))) 
			      		 {
				    		alert("ingrese una descripcion");
				    		document.cargacouch.descripcion.focus();
							//  sino se cumple la condicion
				    		return false;
				    	}
				  		else{
							 // alert("Todo esta correcto");
							 // document.cargacouch.submit();
							  return true; 
							}
							
				    
				   }
				 }
				}
             }
           }
         }