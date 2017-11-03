<?php
	
	require_once('inc/funciones.php');
	if( !tienePermisos() ) header('location: login.php?restringido=listado.php');

	$id = (int) $_GET['id'];

	require_once('inc/libreria_db.php');
	$sql = "UPDATE producto SET activo = 0 WHERE idproducto = $id";
	db_hacerQuery($sql);

	header('location: listado.php');
?>