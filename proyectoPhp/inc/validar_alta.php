<?php
	
	//recibo unos campos y te retorno un array con todos los erores que surgieron
	//si recibo un array vacío es porque no hay error, o sea, todo bien
	function validarAlta( $campos ){

		$errores = false;

		//http://stackoverflow.com/questions/13392842/using-php-regex-to-validate-username
		if ( !preg_match('/[A-Za-z0-9]{3,31}$/', $campos['nombre'] ) ){
			$errores['nombre'] = 'El nombre debe contener entre 3 y 31 caracteres';
		}

		if( empty( $campos['precio'] ) ){
			$errores['precio'] = 'El precio es obligatorio';
		} else if ( $campos['precio'] < 0 ) {
			$errores['precio'] = 'El precio debe ser mayor a 0';
		}

		return $errores;

	}

?>