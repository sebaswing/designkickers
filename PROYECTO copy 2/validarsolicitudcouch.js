function validarsolicitud() {
	var nvalido=/\D[A-Za-zÁÉÍÓÚáéíóú]{2}/ // para validar que el primer caracter ingresado es una letra
	
	if ((document.solicitarcouchdatos.descripcion.value.length == 0) || ( ! nvalido.test(document.solicitarcouchdatos.descripcion.value))) 
			      		 {
				    		alert("ingrese una descripcion valida");
				    		document.solicitarcouchdatos.descripcion.focus();
							//  sino se cumple la condicion
				    		return false;
				    	}else{
							if (document.solicitarcouchdatos.date.value.length == 0) 
													{	  
														alert("ingrese una fecha de inicio valida");
														document.solicitarcouchdatos.date.focus();
														//sino se cumple la condicion
														return false;
													}
												else{
												if (document.solicitarcouchdatos.datecierre.value.length == 0)
												{
														alert("ingrese una fecha de cierre valida");
														document.solicitarcouchdatos.datecierre.focus();
														//sino se cumple la condicion
														return false;
												}else {
													if(document.solicitarcouchdatos.date.value > document.solicitarcouchdatos.datecierre.value)
													{
														alert("ingrese una fecha de inicio menor a la fecha final de su reserva");
														document.solicitarcouchdatos.date.focus();
														//sino se cumple la condicion
														return false;
													}
												}
													}
							}
						
	}