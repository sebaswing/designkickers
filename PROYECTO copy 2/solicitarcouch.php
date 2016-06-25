<?php
 // include("conexion.php");
 // codigo agregado por julian ---------------------
 session_start();
 include("functions.php");
 $t = login_check($mysqli);
//--------------------------------------
 //  include("consultamensajes.php");
  include("nuevasnotificaciones.php");
//-----------------------------------------------------
if( $t == 1) {


//-----------------------------------------------------
$link = conectar();
	// trae la info del couch que se va a solicitar ------------------------------------------------
    $sql="SELECT c.fecha_publicacion inicio, c.fecha_cierre cierre, c.capacidad	
                           FROM couch c 
                           WHERE c.id_couch = ".$_POST['idcouch']; 
                $datoscouch= mysqli_query($link , $sql); 
         		$datoslista = mysqli_fetch_assoc($datoscouch);
	// trae la info de las reservas aceptadas	-------------------------------------------------------		
	$sql2="SELECT c.idreserva, DATE_FORMAT(c.fecha_inicio,'%m/%d/%Y') AS inicio, DATE_FORMAT(c.fecha_fin,'%m/%d/%Y') AS cierre	
                           FROM reserva c 
                           WHERE c.idcouch = '".$_POST['idcouch']."' and c.estado = 'aceptada'";
				
				$datosreserva= mysqli_query($link , $sql2) or die (mysqli_error($link));
				// crea el array con las reservas hechas para pasarle a la funcion
				$int = 0;
				while ($listareserva = mysqli_fetch_assoc($datosreserva))
				{	
					$inicio = $listareserva['inicio'];
					$cierre = $listareserva['cierre'];
					$arrayreserva[$int]= "".$inicio.", ".$cierre."";
					$int++;
				}
?>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="estilo.css"> 
	<link href='https://fonts.googleapis.com/css?family=Averia+Sans+Libre' rel='stylesheet' type='text/css'> 
	<link rel="icon"  href="FOTOS/favicon.jpg" />
	<script type="text/javascript" src="validarsolicitudcouch.js"></script>
  <link rel="stylesheet" href="http://code.jquery.com/ui/1.10.1/themes/base/jquery-ui.css" />
<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
<script src="http://code.jquery.com/ui/1.10.1/jquery-ui.js"></script>

	<script>
	$(function () {
	//-------------------------------variables-----------------------------------------------	
		var RangeDates =<?php echo json_encode($arrayreserva);?>;
		//ajax succes imprime en 
		console.log(JSON.stringify(RangeDates));
		//formato que usa RangeDates = ["6/21/2016, 6/23/2016"];
		var RangeDatesIsDisable = true;
		
		// para verificar si es un anio bisiesto al reconocer los dias del mes
		function esBisiesto(ano) {
			if (ano % 4 == 0)
			return true
			/* else */
			return false
		} 
		// para reconocer cuantos dias tiene cada mes del anio 
		function getDays(month, year) {
		 
			var ar = new Array(12)
			ar[0] = 31 // Enero
			if(esBisiesto)
				{
					ar[1]=29
				}
			else
				{
					ar[1]=28
				}
			ar[2] = 31 // Marzo
			ar[3] = 30 // Abril
			ar[4] = 31 // Mayo
			ar[5] = 30 // Junio
			ar[6] = 31 // Julio
			ar[7] = 31 // Agosto
			ar[8] = 30 // Septiembre
			ar[9] = 31 // Octubre
			ar[10] = 30 // Noviembre
			ar[11] = 31 // Diciembre
		 
			return ar[month];
			}
		// sacando la fecha maxima
		var fechamaxima = <?php echo json_encode($datoslista['cierre']);?>;
		console.log(JSON.stringify(fechamaxima));
		console.log("empieza la funcion");
		var fecha = new Date();
		var mes = fecha.getMonth();
		var dia = fecha.getDate();
		var anio = fecha.getFullYear();
		var aux = fechamaxima.split('-'); //separa el mes, dia y anio
		var	anio1 = parseInt(aux[0]);
		console.log("anio: ", anio1);
		var	mes1 = parseInt(aux[1]);
		console.log("mes: ", mes1);
		var	dia1 = parseInt(aux[2]);
		console.log("dia", dia1);
		var maximo = 0;
		if (anio1 == anio) {
			console.log("mismo anio");
							if ((mes + 1) == mes1 ) {
								console.log("mismo mes");
								maximo = 0;
								if (dia == dia1) {
								console.log("mismo dia");
									maximo = maximo + 0;
							}else {
									if (dia < dia1){
										maximo = maximo + (dia1 - dia);
										console.log("el valor siendo del mismo mes pero diferente dia: ", maximo);
									}
								}
							} else {
								if((mes + 1) < mes1 ){
									var d = mes1 - (mes + 1);
									console.log("cantidad de meses de diferencia: ", d);
									console.log("dias del mes: ", getDays(mes1 - 2, anio1));
									console.log("la resta del dia da: ", getDays(mes1 - 2, anio1) - dia);
									maximo = maximo + (getDays(mes1 - 2, anio1) - dia) + dia1;
									console.log("por ahora la suma es:", maximo);
								}
							}
							 
		}
			console.log(maximo);
		//------------------------------------------------------------------------------------------



			function DisableDays(date) {
				var isd = RangeDatesIsDisable;
				var rd = RangeDates;
				var m = date.getMonth();
				var d = date.getDate();
				var y = date.getFullYear();
				for (i = 0; i < rd.length; i++) {
					var ds = rd[i].split(','); //separa los rangos de fechas
					var di, df;
					var m1, d1, y1, m2, d2, y2;

					if (ds.length == 1) {
						di = ds[0].split('/'); //separa el mes, dia y anio
						m1 = parseInt(di[0]);
						d1 = parseInt(di[1]);
						y1 = parseInt(di[2]);
						if (y1 == y && m1 == (m + 1) && d1 == d) return [!isd];
					} else if (ds.length > 1) {
						di = ds[0].split('/');
						df = ds[1].split('/');
						m1 = parseInt(di[0]);
						d1 = parseInt(di[1]);
						y1 = parseInt(di[2]);
						m2 = parseInt(df[0]);
						d2 = parseInt(df[1]);
						y2 = parseInt(df[2]);

						if (y1 >= y || y <= y2) {
							if ((m + 1) >= m1 && (m + 1) <= m2) {
								if (m1 == m2) {
									if (d >= d1 && d <= d2) return [!isd];
								} else if (m1 == (m + 1)) {
									if (d >= d1) return [!isd];
								} else if (m2 == (m + 1)) {
									if (d <= d2) return [!isd];
								} else return [!isd];
							}
						}
					}
				}
				return [isd];
			}	
						$("#date").datepicker({
						dateFormat: 'yy-mm-dd',
						maxDate: maximo,
						minDate: 0,
						
						onClose: function (selectedDate) {
							$("#datecierre").datepicker("option", "minDate", selectedDate);
						},
						beforeShowDay: DisableDays
					})
	
		$("#datecierre").datepicker({
			dateFormat: 'yy-mm-dd',
		 minDate: 0,
		 maxDate: maximo,
		
		beforeShowDay: DisableDays
		})
		
		//Array para dar formato en español
		 $.datepicker.regional['es'] = 
		 {
			closeText: 'Cerrar', 
			prevText: 'Previo', 
			nextText: 'Próximo',
			 
			 monthNames: ['Enero','Febrero','Marzo','Abril','Mayo','Junio',
			 'Julio','Agosto','Septiembre','Octubre','Noviembre','Diciembre'],
			 monthNamesShort: ['Ene','Feb','Mar','Abr','May','Jun',
			 'Jul','Ago','Sep','Oct','Nov','Dic'],
			 monthStatus: 'Ver otro mes', yearStatus: 'Ver otro año',
			 dayNames: ['Domingo','Lunes','Martes','Miércoles','Jueves','Viernes','Sábado'],
			 dayNamesShort: ['Dom','Lun','Mar','Mie','Jue','Vie','Sáb'],
			dayNamesMin: ['Do','Lu','Ma','Mi','Ju','Vi','Sa'],}
			 $.datepicker.setDefaults($.datepicker.regional['es']); 

	});
</script>
	<body  >
</head>
<div id="contenedorgeneral">
	<div id="contenidobuscador">
		<a href="usuariocomun.php"><img class="iniciologo" src="FOTOS/logo.png" alt="logo"></a>
		<div id="botons">
			  <form  method="get" action="logout.php" >
	                  <button id="cerrar">CERRAR SESION</button>
	                  <br>
	          </form>
	          <form  method="get" action="perfil.php">
	                  <button>PERFIL</button>
	                  <br>
	          </form>
	          <form  method="get" action="couch.php">
	                  <button>PUBLICA TU COUCH</button>
	                  <br>
	          </form>
			  <!-- parte nueva                                              -->			  
			  <form  method="get" action="notificacion.php">
	                  <?php
						$new = mysqli_fetch_assoc($nuevosmensajes);
					  if ($new['cantidad'] == 0){
						  echo "<button>Notificaciones</button>";
					  }else {
						  echo "<button>Notificaciones (".$new['cantidad'].")</button>";
					  }
					  
					  ?>
					  
					  <br>
	          </form>
		<!-- -------------------------------------------------------->	
        </div>
         <hr> 
	</div>
	<div id="contenedorcontenido">
		<form id="solicitarcouchdatos" name="solicitarcouchdatos" method="POST" onsubmit=" return validarsolicitud();"  action="consultasolicitudcouch.php">
				<?php echo "<input type='hidden' id='idcouch' name='idcouch' value='".$_POST['idcouch']."' > </input>" ?>
				<h2>Solicitud para reservar</h2>
				<br>
				<h1>Ingrese una breve descripcion:</h1>
				<br>
				<textarea type="text" id="descripcion" name="descripcion"></textarea>
				<br>
				<br>
				<h1>Inicio de reserva:
				<input type='text' id='date' name='date'></h1>
				<br>
				<h1>Fin de reserva:    
				<input type='text' id='datecierre' name='datecierre'>
				</h1><br>
				<h2>Personas a ocupar: 
				<?php echo "<input type='number' min=1  max='".$datoslista['capacidad']."' id='capacidad' name='capacidad' />"; ?>
				</h2><br>
				
				<button type="submit" action="consultasolicitudcouch.php">Enviar Solicitud</button>
				<button type="reset" onclick="location='perfilCouch.php?id=<?php echo $_POST['idcouch']; ?>'">Cancelar</button>
		
		</form> 

	</div>


</div>
</body>
<footer> <p>CouchInn es una marca registrada. Todos los derechos reservados</p> </footer>
</html>
<?php } else {  ?>
        <script>
        alert("no ha iniciado sesion");
        window.location.href="index.php";
     </script> 
     <?php
}
?>