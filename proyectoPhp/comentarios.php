<?php
	
	$titulo = 'Comentarios - Proyecto Integrador';

	$vengoForm = isset($_POST['hacer_comentario'] );
	if( $vengoForm ){
		//capturar lo que vino por POST
		$nombre_coment = $_POST['nombre'];
		$comentario = $_POST['comentario'];
		//capturar el momento
		$hora_coment = getdate();
		//armar el div
		$comentario_coment = "<div class='comentario'>
		<h3>$nombre_coment | $hora_coment</h3>
		<quote>$comentario</quote>
		</div>";
		//grabarlo en un archivo de texto
		file_put_contents('comentarios.txt', $comentario_coment, FILE_APPEND);
	}

	//leer el archivo de texto si es que existe y lo pongo en una variable
	$comentariosHTML = file_get_contents('comentarios.txt');

	require_once('inc/plantilla.php');
	die();
	
?>