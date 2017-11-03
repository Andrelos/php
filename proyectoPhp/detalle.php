<?php
	
	$titulo = 'Detalle de productos - Proyecto Integrador';
	
	/*
		Esto lo hago acá para que la plantilla no dependa de la base de datos ni del $_GET
		A la plantilla lo único que le importa es que haya una $p con todo el producto para mostrar
	*/
	require_once('inc/libreria_db.php');
	$p = db_obtenerProducto( $_GET['id'] );

	require_once('inc/plantilla.php');
	die();
	
?>