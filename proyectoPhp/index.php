<?php
	
	//arman un array de colores
	/*
		$variable = array(valor1, valor2, valorN);
		$variable[] = valor1;		
		$variable[] = valor2;		
		$variable[] = valor3;		
	*/
	$colores = array('red', 'blue', 'cyan', 'magenta', 'yellow');
	//arman un array que contiene todas las imagenes
	//buscan en google "php array_rand" leen el manual y me dicen cómo hago para que $colorElegido sea uno al azar...
	$sorteo = array_rand( $colores );
	$colorElegido = $colores[ $sorteo ];
	
	$imagenes = array('php.jpg', 'seguridad.jpg', 'microsoft.jpg', 'presupuesto.jpg');
	$imagenElegida = $imagenes[ array_rand($imagenes) ];
	
	$titulo = 'Bienvenido';
	require_once('inc/plantilla.php');
	die();
?>