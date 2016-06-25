<?php 
	date_default_timezone_set('America/Argentina/Buenos_Aires');
	$fecha= new DateTime();
	echo $fecha -> format('Y-m-d 00:00:00');
	echo "</br>";
	$año=$fecha->format('Y');
	$anio=$año-18;
	$mes= $fecha->format('m');
	$dia=$fecha->format('d');echo "</br>";
	$escribir= $anio."-".$mes."-".$dia;
	$nueva= date_create($escribir);
	echo "</br>";
	echo $nueva->format('Y-m-d');
?>