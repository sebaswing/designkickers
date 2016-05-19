window.onload= function()
{
	document.formularioRegistro.addEventListener('submit', validarTelefono);
}

function validarTelefono(evObject)
{
	evObject.preventDefault();
	var correcto=true;
	var formulario= document.formularioRegistro;
	if (isNaN(formulario.numeroTel.value)== true || /^[1-9]\d$/.test(formulario.numeroTel.value)==false)
		{
			alert('el numero de telefono contiene caracteres incorrectos');
			correcto=false;
		}
	else (correcto==true) 
	    {
	    	formulario.submit();
	    }
}