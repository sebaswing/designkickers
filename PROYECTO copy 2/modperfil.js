
		function modificarpas1()
		{	
		
			var id = document.getElementById('password');
		if (id.type == "hidden") {	
			id.type= "text";
			var aca = document.getElementById('change1');
				aca.parentNode.removeChild(aca);
			var elemold = document.getElementById('modificarpas');
				elemold.parentNode.removeChild(elemold);
			var metodo = document.getElementById('formpas');
				metodo.setAttribute('action', 'modperfil.php');	
			var newO = document.createElement('BUTTON');
				newO.setAttribute('type', 'submit');
				newO.setAttribute('name', 'Cargar');
				newO.setAttribute('value', 'Modificar Password');
				newO.setAttribute('action', 'modperfil.php');
				newO.innerHTML = "Guardar Cambios";
				document.getElementById('formpas').appendChild(newO);
				newO.parentNode.appendChild(newO);
				}
		}
		
			function modificarfecha1()
		{	
		
			var id = document.getElementById('fecha_nac');
		if (id.type == "hidden") {	
			id.type= "text";
			var aca = document.getElementById('change2');
				aca.parentNode.removeChild(aca);
			var elemold = document.getElementById('modificarfecha');
				elemold.parentNode.removeChild(elemold);
			var metodo = document.getElementById('formfecha');
				metodo.setAttribute('action', 'modperfil.php');	
			var newO = document.createElement('BUTTON');
				newO.setAttribute('type', 'submit');
				newO.setAttribute('name', 'Cargar');
				newO.setAttribute('value', 'Modificar Fecha');
				newO.setAttribute('action', 'modperfil.php');
				newO.innerHTML = "Guardar Cambios";
				document.getElementById('formfecha').appendChild(newO);
				newO.parentNode.appendChild(newO);
				}
		}
		
			function modificarape1()
		{	
		
			var id = document.getElementById('apellido');
		if (id.type == "hidden") {	
			id.type= "text";
			var aca = document.getElementById('change3');
				aca.parentNode.removeChild(aca);
			var elemold = document.getElementById('modificarape');
				elemold.parentNode.removeChild(elemold);
			var metodo = document.getElementById('formape');
				metodo.setAttribute('action', 'modperfil.php');	
			var newO = document.createElement('BUTTON');
				newO.setAttribute('type', 'submit');
				newO.setAttribute('name', 'Cargar');
				newO.setAttribute('value', 'Modificar Apellido');
				newO.setAttribute('action', 'modperfil.php');
				newO.innerHTML = "Guardar Cambios";
				document.getElementById('formape').appendChild(newO);
				newO.parentNode.appendChild(newO);
				}
		}
		
			function modificarnom1()
		{	
		
			var id = document.getElementById('nombre');
		if (id.type == "hidden") {	
			id.type= "text";
			var aca = document.getElementById('change4');
				aca.parentNode.removeChild(aca);
			var elemold = document.getElementById('modificarnom');
				elemold.parentNode.removeChild(elemold);
			var metodo = document.getElementById('formnom');
				metodo.setAttribute('action', 'modperfil.php');
			var newO = document.createElement('BUTTON');
				newO.setAttribute('type', 'submit');
				newO.setAttribute('name', 'Cargar');
				newO.setAttribute('value', 'Modificar Nombre');
				newO.setAttribute('action', 'modperfil.php');
				newO.innerHTML = "Guardar Cambios";
				document.getElementById('formnom').appendChild(newO);
				newO.parentNode.appendChild(newO);
				}
		}
		
			function modificartel1()
		{	
		
			var id = document.getElementById('telefono');
		if (id.type == "hidden") {	
			id.type= "text";
			var aca = document.getElementById('change5');
				aca.parentNode.removeChild(aca);
			var elemold = document.getElementById('modificartel');
				elemold.parentNode.removeChild(elemold);
			var metodo = document.getElementById('formtel');
				metodo.setAttribute('action', 'modperfil.php');	
			var newO = document.createElement('BUTTON');
				newO.setAttribute('type', 'submit');
				newO.setAttribute('name', 'btntel');
				newO.setAttribute('value', 'Modificar Telefono');
				newO.setAttribute('action', 'modperfil.php');
				newO.innerHTML = "Guardar Cambios";
				document.getElementById('formtel').appendChild(newO);
				newO.parentNode.appendChild(newO);
				}
		}