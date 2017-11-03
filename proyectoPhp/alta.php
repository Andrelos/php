<?php
	
	require_once('inc/config.php');

	require_once('inc/funciones.php');
	if( !tienePermisos() ) header('location: login.php?restringido=alta.php');


	$titulo = 'Alta de Producto - Proyecto Integrador';

	//para probar, simulo que vino el form!
	
	/*
	$_POST['alta'] = true;
	$_POST['nombre'] = 'Pepe';
	$_POST['precio'] = -50;
	$_FILES['imagen']['size'] = 0;
	*/

	$vengoForm = isset($_POST['alta'] );
	if( $vengoForm ){
		
		$archivo = $_FILES['imagen'];
		require_once('inc/subir_archivo.php');
		require_once('inc/guardar_producto.php');
		
	}

	require_once('inc/funciones.php');
	require_once('inc/libreria_db.php');
	$select_pagos = dibujarSelect( 'medio_pago', db_obtenerMediosPago() );
	require_once('inc/plantilla.php');
	die();
	
?>