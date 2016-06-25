			function pregunta(){ 
						if (confirm('¿Esta seguro que desea autorizar la operacion?.')){ 
						   document.tuformulario.submit() 
						} 
					} 
		
			function cargar(pag) {
				$('#contenedorcajasmensajes').load('includes/' + pag + '.php');
			}

	
			function volver(pagina) {
				$('#contenedorcajasmensajes').load('' + pagina + '.html');
			}
