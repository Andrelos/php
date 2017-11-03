<?php 
	
function db_connect(){


$user = "postgres";
$password = "1234";
$dbname = "aplicacionfultin";
$port = "5432";
$host = "localhost";

$cadenaConexion = "host=$host port=$port dbname=$dbname user=$user password=$password";
date_default_timezone_set('America/Argentina/Buenos_Aires');
$conexion = pg_connect($cadenaConexion) or die("Error en la Conexión: ".pg_last_error());
//echo "<h3>Conexion Exitosa PHP - PostgreSQL</h3><hr><br>";

return $conexion;

}

?>