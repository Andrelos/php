<?php
	
	$titulo = 'Ingreso al Sistema - Proyecto Integrador';

	//if( $_SERVER['REQUEST_METHOD'] == 'POST' )
	//es preferible usar un campo que identifique al formulario
	$vengoForm = isset( $_POST['login'] );

	$usuario = '';
	$pagina_destino = 'index.php';

	if( isset($_GET['restringido']) ){
		$errorLogin = '<p class="error">Acceso denegado, registrese con un usuario válido para la operación</p>';
		$pagina_destino = $_GET['restringido'];
	}

	if( $vengoForm ){

		require_once('inc/libreria_db.php');
		require_once('inc/funciones.php');
		$check = db_login( $_POST['usuario'], $_POST['clave'], obtenerIP() );
		
		if( !empty($check) ) {
			//si vinieron campos es porque se logueó, entonces lo guardo en sesión
			//http://stackoverflow.com/questions/6249707/check-if-php-session-has-already-started
			if( session_status() == PHP_SESSION_NONE ) session_start();
			$_SESSION['usr'] = $check;	

			//redirecciono la página
			//en la mayoría de las configuraciones de Apache esta función sólo puede ejecutarse sino hubo ningún echo o código fuente generado con anterioridad
			header('location: '.$_POST['pagina_destino']);
		} else {
			$usuario = $_POST['usuario'];
			$errorLogin = '<p class="error">Usuario o contraseña incorrecta</p>';
		}

	}

	require_once('inc/plantilla.php');
	die();
	
?>