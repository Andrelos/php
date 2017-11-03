<?php 

	require_once('consultas.php');
	require_once('header.php');
	
	$idper=$_POST['idper'];
	$nombre=$_POST['usr'];
	$apellido=$_POST['ape'];
	
	var_dump($idper);
	var_dump($nombre);
	var_dump($apellido);



	db_actualizaPersona($idper,$nombre,$apellido);

	header("Location: index.php")


?>



<?php require_once('footer.php'); ?>