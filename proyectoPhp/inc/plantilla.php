<?php 
	//plantilla.php 
	if( session_status() == PHP_SESSION_NONE ) session_start();
?>
<html>
	<head>
		<title><?php echo $titulo ?></title>
		<meta charset='utf-8' />
		<link href='css/reset.css' rel='stylesheet' type='text/css' />
		<link href='css/principal.css' rel='stylesheet' type='text/css' />		
		<style>
			<?php
				if( !isset($colorElegido) ) $colorElegido = 'red';
			?>
			body {
				background-color: <?php echo $colorElegido; ?>
			}
		</style>
	</head>
	<body>
		<div id='encabezado'>
			<img src='img/header-it.jpg' />
		</div>
		<?php 
			require_once('botonera.php'); 
		?>
		<div id='contenido'>
		<?php
			require_once('funciones.php'); //cargo mi librería
			if( !isset($contenido) ) $contenido = 'contenido_'.obtenerPagina();
			if( file_exists('inc/'.$contenido) ) require_once( $contenido );
		?>
		</div>
		<div id='pie'>
			Proyecto Integrador - EducacionIT - Usted es la visita número 1
		</div>
	</body>
</html>