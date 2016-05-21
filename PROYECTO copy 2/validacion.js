// funcion para el formulario ingresar sesion
function validarusu()
{
   			var nvalido=/^\d/; // para validar que el primer caracter ingresado es una letra
			var correovalido=/[\w-\.]{3,}@([\w-]{2,}\.)*([\w-]{2,}\.)[\w-]{2,4}/;  // para validar si es un correo electronico
			if ((document.formulario.usuario.value.length == 0) || ( ! correovalido.test(document.formulario.usuario.value)))
			{
				alert(" ingrese su nombre de usuario correctamente ");
				document.formulario.usuario.focus();
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