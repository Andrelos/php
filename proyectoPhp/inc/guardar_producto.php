<?php
	//valido lo que vino por POST
	require_once('inc/validar_alta.php');
	$errores = validarAlta( $_POST );

	if( !$errores ){
		//si valida hago el INSERT en la base
		//die('hago el insert');
		require_once('inc/libreria_db.php');
		require_once('inc/funciones.php');
		if( obtenerPagina() == 'editar.php' ) db_actualizarProducto($_POST);
		else db_insertarProducto( $_POST );
		header('location: listado.php');
		
	} else {
		//sino valida tengo que volver a mostrar el form pero marcarte en qué te equivocaste
		$erroresText = implode(', ', $errores); //convierto un Array en un String y lo pego con comas
		$erroresHTML = "<p class='error'>Surgieron estos errores: $erroresText</p>";
		$erroresHTML .= "<script>
		";
		foreach ($errores as $key => $value) {
			$erroresHTML .= "
			document.getElementById('$key').className = 'error';
			";
		}
		foreach ($_POST as $key => $value) {
			$erroresHTML .= "
			document.getElementById('$key')"; //al elemento lo voy a buscar siempre, lo que cambia es la propiedad que le modifico, en base al tipo (eso es lo que resuelven los if que están abajo)
			if( $key == 'activo' || $key == 'oferta' ){
				if($value) $agregarJS .= ".checked = 'checked';";	
			} else if ( $key == 'imagen' ){
				$ruta = PRODUCTOS_IMG."/$value";
				$erroresHTML .= ".src = '$ruta'";
			} else {
				$erroresHTML .= ".value = '$value';";	
			}
		}
		$erroresHTML .= "</script>";
	}
?>