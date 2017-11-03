 <?php

require_once('conexion.php');
/*--------------------------------------------------------------------------------------------------------*/
function db_comboPais(){
	$cnx = db_connect();
	$sql = "SELECT idpais, desc_pais FROM paises;";
	$res = pg_query($cnx, $sql) or die("Error en la Consulta SQL");
	
	$numReg=pg_num_rows($res);
	
	if($numReg>0) {
			while($fila=pg_fetch_array($res)){
				echo "<option value=".$fila["idpais"].">".$fila['desc_pais']."</option>";
			}
	}else{
	 	echo "No hay Registros";
	}

}
/*--------------------------------------------------------------------------------------------------------*/
function db_comboProvincias($pais){
	$cnx = db_connect();
	
	$sql = "SELECT paises.desc_pais, provincias.desc_prov, provincias.idprovincia
			FROM paises, pais_x_provincia, provincias
			WHERE paises.idpais = pais_x_provincia.idpais AND pais_x_provincia.idprovincia = provincias.idprovincia AND paises.idpais='$pais'
			ORDER BY paises.desc_pais, provincias.desc_prov;";
	
	$res = pg_query($cnx, $sql) or die("Error en la Consulta SQL");
	
	$numReg=pg_num_rows($res);
	
	if($numReg>0) {
			while($fila=pg_fetch_array($res)){
				echo "<option value=".$fila["idprovincia"].">".$fila['desc_prov']."</option>";
			}
	}else{
	 	echo "No hay Registros";
	}
}
function db_comboLocalidades(){
	$cnx = db_connect();
	
	$sql = "SELECT idciudad,desc_ciudad FROM ciudades;";
	
	$res = pg_query($cnx, $sql) or die("Error en la Consulta SQL");
	
	$numReg=pg_num_rows($res);
	
	if($numReg>0) {
			while($fila=pg_fetch_array($res)){
				echo "<option value=".$fila["idciudad"].">".$fila['desc_ciudad']."</option>";
			}
	}else{
	 	echo "No hay Registros";
	}
}
/*--------------------------------------------------------------------------------------------------------*/
/*--------------------------------------------------------------------------------------------------------*/
function db_Altapersona($nombre,$apellido,$mail,$fecha,$dni,$pass,$direccion,$ciudad,$codpostal){
	$cnx = db_connect();
	
	$nombre = db_filtrarCampos($nombre);
	/*$apellido = db_filtrarCampo($apellido);	
	$mail = db_filtrarCampo($mail);
	$dni = db_filtrarCampo($dni);
	$pass = db_filtrarCampo($pass);
	$fecha = db_filtrarCampo($fecha);
	$direccion = db_filtrarCampo($direccion);
	$ciudad = db_filtrarCampo($ciudad);
	$codpostal = db_filtrarCampo($codpostal);*/

	db_filtrarCampos();

	$sql="INSERT INTO personas (nombreper,apellidoper,emailper,fechanac,dni,pass,direccion,ciudad,codpostal,estado)
	VALUES ('$nombre','$apellido','$mail','$fecha','$dni','$pass','$direccion','$ciudad','$codpostal','FALSE');";

	$res = pg_query($cnx, $sql) or die("Error en la Consulta SQL");

	if(!empty($res)){
		$msj="se agrego correctamente";
		return $msj;
	}

}
/*--------------------------------------------------------------------------------------------------------*/
function db_login( $user, $pass){
		$cnx = db_connect();
		
		//$user = db_filtrarCampo($user);
		//$pass = db_filtrarCampo($pass);
		
		$sql = "SELECT idpersona, nombreper,apellidoper,emailper,fechanac,pass
		FROM personas
		WHERE emailper = '$user' AND pass = '$pass'";
		
		$res = pg_query($cnx, $sql) or die("Error en la Consulta SQL");
		
		$fila=pg_fetch_array($res);

		return $fila;
		
	}
/*--------------------------------------------------------------------------------------------------------*/
function db_ConsultaPersona(){
	$cnx = db_connect();


	$sql1="SELECT idpersona,dni,emailper, nombreper, apellidoper, fechanac, desc_ciudad  
		   FROM personas  INNER JOIN ciudades 
		   ON (ciudad = idciudad );";
	
	$res = pg_query($cnx, $sql1) or die("Error en la Consulta SQL");
	$numReg=pg_num_rows($res);
	
	if($numReg>0) {
			echo "  
			<thead>
		      <tr>
		        <th>DNI</th>
		        <th>email</th>
		        <th>Nombre</th>
		        <th>Apellido</th>
		        <th>fecha</th>
		        <th>Ciudad</th>
		        <th>consultar</th>
		        <th>modificar</th>
		      </tr>
		    </thead>
		    <tbody>";
			while($fila=pg_fetch_array($res)){
				echo "<tr><td>".$fila['dni']."</td>";
				echo "<td>".$fila['emailper']."</td>";
				echo "<td>".$fila['nombreper']."</td>";
				echo "<td>".$fila['apellidoper']."</td>";
				echo "<td>".$fila['fechanac']."</td>";
				echo "<td>".$fila['desc_ciudad']."</td>";
				
				echo "<td><button value=".$fila['idpersona']." name='idpersona' type='submit' class='btn btn-primary'>Consulta</button></td>";
				
				echo '<td><a class="btn btn-warning" href="ActualizaPersona_form.php?id='.$fila['idpersona'].' ">Actualizar</a></td></tr>';
			}
			echo "</tbody>";
	}else{
	 	echo "No hay Registros";
	}	
}
/*--------------------------------------------------------------------------------------------------------*/
function db_actualizaPersona($idpersona,$nombreper,$apellidoper){
	$cnx = db_connect();

	$sql = "UPDATE personas SET nombreper = '$nombreper',
							   apellidoper = '$apellidoper'
		   WHERE idpersona = '$idpersona';";

    pg_query($cnx, $sql) or die("Error en la Consulta SQL");
	

	}
/*--------------------------------------------------------------------------------------------------------*/
function db_ConsultaPersonaUnica($idper){

	$cnx = db_connect();
	$sql="SELECT idpersona, nombreper,apellidoper,emailper,fechanac,pass
		  FROM personas
		  WHERE idpersona='$idper'";
	$res = pg_query($cnx, $sql) or die("Error en la Consulta SQL");
	$fila=pg_fetch_array($res);
	return $fila;
}
/*--------------------------------------------------------------------------------------------------------*/
function db_filtrarCampo( $valor ){
		
		if( is_numeric($valor) ) return (float) $valor;

		$cnx = db_connect();
		if($cnx) {
			return  pg_prepare( $cnx, $valor );
		}			
	}
function db_filtrarCampos( $campos ){
		foreach ($campos as $key => $value) {
			$campos[$key] = db_filtrarCampo( $value );
		}
		return $campos;
}
/*--------------------------------------------------------------------------------------------------------*/


?>
