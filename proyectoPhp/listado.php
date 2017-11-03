<?php
	
	$titulo = 'Listado de productos - Proyecto Integrador';
	
	/*
		Esto lo hago acá para que la plantilla no dependa de la base de datos ni del $_GET
		A la plantilla lo único que le importa es que haya una $p con todo el producto para mostrar
	*/
	require_once('inc/libreria_db.php');
	
	//si yo no hago esto estoy obligando a que venga el parámetro por $_GET 
	$busqueda = '';
	if( isset($_GET['b']) ) $busqueda = $_GET['b'];

	$ordenar = 1;
	if( isset($_GET['order']) ) $ordenar = max(1, (int) $_GET['order'] );

	$pagina = 1;
	if( isset($_GET['p']) ) $pagina = max(1, (int) $_GET['p'] ); 

	//ahora tengo una búsqueda vacía cuando entro por primera vez a la página y una que viene por GET
	$productos = db_obtenerProductos( $busqueda, $ordenar, $pagina );

	require_once('inc/plantilla.php');
	die();
	
?>