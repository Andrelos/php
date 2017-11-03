<?php 

require_once('consultas.php');

$dni=$_POST['dni'];
$nombre=$_POST['nombre'];
$apellido=$_POST['apellido'];
$mail=$_POST['mail'];
$fecha=$_POST['fecha'];
$pass=$_POST['pass'];
$pass_conf=$_POST['pass_conf'];
$direccion=$_POST['direccion'];
$ciudad=$_POST['ciudad'];
$codpostal=$_POST['codpostal'];
$provincia=$_POST['provincia'];
$localidad=$_POST['localidad'];

var_dump($provincia);
var_dump($localidad);



/*
$nombre = "andres";
	$apellido = "blanco";	
	$mail = "a@a.com";
	$dni = 22222;
	$pass = "1";

	$direccion = "1";
	$ciudad = 1;
	
	$codpostal = 1;

	$estado=True;*/
/*
if($pass!=$pass_conf){
	echo "contraseña no coincide";
}else{
	db_Altapersona($nombre,$apellido,$mail,$fecha,$dni,$pass,$direccion,$ciudad,$codpostal);
	echo "se dio de alta";
}
	*/
	



 ?>