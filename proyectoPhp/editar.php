<?php
	
	require_once('inc/config.php');
	//en la edición siempre uso la base, así que la requiero de entrada
	require_once('inc/libreria_db.php');

	require_once('inc/funciones.php');
	if( !tienePermisos() ) header('location: login.php?restringido=editar.php');

	$titulo = 'Edición de Producto - Proyecto Integrador';

	$vengoForm = isset($_POST['editar'] );
	if( $vengoForm ){
		
		$archivo = $_FILES['archivo_imagen'];
		require_once('inc/subir_archivo.php');
		require_once('inc/guardar_producto.php');		

	} else {

		//cuando no vengo del form es porque entré por primera vez
		$id = $_GET['id'];
		$producto = db_obtenerProducto( $id );
		
		//para zafar de hacer todos los echo en el formulario y de hacer todos los if en los select, etc, hago que los valores que vinieron del producto se inserten automáticamente en los campos mediante javascript

		//corrijo el array que vino de la base para que se amolded a lo que necesito en javascript, como no puede haber campos de la base que no tengan un <input> asociado (porque explota el document.getElementById) los elimino ANTES del foreach
		unset( $producto['fecha_alta'] );
		$producto['medio_pago'] = $producto['medio_pago_id'];
		unset( $producto['medio_pago_id'] );

		$agregarJS = '<script>';
		foreach( $producto as $key=>$value ){
			$agregarJS .= "
			document.getElementById('$key')"; //al elemento lo voy a buscar siempre, lo que cambia es la propiedad que le modifico, en base al tipo (eso es lo que resuelven los if que están abajo)
			if( $key == 'activo' || $key == 'oferta' ){
				if($value) $agregarJS .= ".checked = 'checked';";	
			} else if ( $key == 'imagen' ){
				$ruta = PRODUCTOS_IMG."/$value";
				$agregarJS .= ".src = '$ruta'";
			} else {
				$agregarJS .= ".value = '$value';";	
			}	
		}
		$agregarJS .= '</script>';

	}

	require_once('inc/funciones.php');	
	$select_pagos = dibujarSelect( 'medio_pago', db_obtenerMediosPago() );
	require_once('inc/plantilla.php');
	die();
	
?>