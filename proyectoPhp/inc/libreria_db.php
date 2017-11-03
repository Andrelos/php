<?php
	require_once('inc/config.php');

	//esta función me va a devolver un array con todo lo que encontró
	//si es un INSERT, UPDATE o DELETE me va a devolver true si lo hizo con éxito
	//si hubo fallas devuelve false

	function db_connect(){
		global $db_cnx;
		if( isset($db_cnx) ) return $db_cnx;
		@ $db_cnx = mysqli_connect( DB_HOST , DB_USER , DB_PASS , DB_NAME );
		if( !$db_cnx ){
			db_grabarErrorSQL('No me pude conectar a la base');
		}
		return $db_cnx;
	}

	function db_grabarErrorSQL( $msg ){
		
		//TODO estaría bueno también imprimir el query que explotó
		$momento = date('d/m/Y h:i:s');
		$mensaje = "$momento | $msg\r\n";
		file_put_contents( DB_LOG , $mensaje, FILE_APPEND);
	}

	//investiguen javadocs si quieren
	/**
	*	@description 
	*	@param $sql String
	*	@return false, Array, true
	*	
	*	2014-01-25 se agregó segundo parámetro para soporte de retorno de registro único
	**/
	function db_hacerQuery( $sql, $un_registro=false ){
		
		$respuesta = false;
		$cnx = db_connect();
		if( $cnx ){	
			//esta consulta le pide a la base que todo el intercambio de datos lo convierta a UTF-8
			mysqli_query($cnx, 'SET NAMES utf8');

			$res = mysqli_query($cnx, $sql);
			if(!$res){
				db_grabarErrorSQL( mysqli_error($cnx) );
			} else if( $res === true ){
				$respuesta = true;
			} else {
				$respuesta = array();
				while( $registro = mysqli_fetch_assoc( $res ) ){
					//al hacer return me estoy yendo de la función, rompe el while, el if, todo!
					if( $un_registro ) return $registro;
					$respuesta[] = $registro;
				}
				
			}
			mysqli_close($cnx); //cuando ya hice el query cierro la conexión
		}
		return $respuesta;
	}

	function db_hacerQueryUnico($sql){
		return db_hacerQuery($sql, true);
	}

	function db_filtrarCampo( $valor ){
		//trato de zafar el proceso de mysql si veo que no es necesario
		if( is_numeric($valor) ) return (float) $valor;

		$cnx = db_connect();
		if($cnx) {
			return  mysqli_real_escape_string( $cnx, $valor );
		}			
	}
	function db_filtrarCampos( $campos ){
		foreach ($campos as $key => $value) {
			$campos[$key] = db_filtrarCampo( $value );
		}
		return $campos;
	}

	//**** FIN DE FUNCIONES GENÉRICAS, COMIENZO DE LAS PARTICULARES DE MI PROYECTO ***///////

	function db_obtenerMediosPago(){
		return db_hacerQuery('SELECT id as value, descripcion as label FROM medios_de_pago');
	}

	function db_obtenerProducto($id){
		$id = (int) $id; //por las dudas trunco el $id a un entero y prevengo inyecciones de SQL
		$sql = "
		SELECT 
			p.idproducto, 
			p.nombre, 
			p.descripcion, 
			p.precio,
			p.stock,
			p.color,
			DATE_FORMAT( p.fecha_alta, '%d/%m/%Y') as fecha_alta,
			p.fecha_alta as fecha,
			p.oferta,
			p.imagen,
			p.activo,
			mp.id as medio_pago_id,
			mp.descripcion as medio_pago
		FROM producto as p 
			JOIN medios_de_pago as mp 
			ON p.medio_pago = mp.id
		WHERE idproducto = $id";
		return db_hacerQueryUnico($sql);
	}

	function db_obtenerProductos( $busqueda='', $orden=1, $pagina=1 ){
		
		$orden_map = array( 1=>'nombre ASC', 2=>'precio ASC', 3=>'precio DESC');
		$orderby = $orden_map[$orden];

		$registros = 10;
		//$inicio = ($pagina-1) * $registros; //otra manera
		$inicio = ($pagina * $registros)-$registros;


		$sql = "SELECT idproducto, nombre, precio, imagen, stock, oferta
		FROM producto
		WHERE 
			activo 
			AND fecha_alta <= now() 
			AND nombre LIKE '%$busqueda%'
		ORDER BY $orderby
		LIMIT $inicio, $registros";
		return db_hacerQuery($sql);
	}


	function db_insertarProducto($campos){

		if( !isset($campos['oferta']) ) $campos['oferta'] = 0;
		else $campos['oferta'] = 1;
		if( !isset($campos['activo']) ) $campos['activo'] = 0;
		else $campos['activo'] = 1;

		//evito inyecciones de SQL 
		$campos = db_filtrarCampos( $campos );

		$sql = "
		INSERT INTO  `producto` (
		`idproducto` ,
		`nombre` ,
		`descripcion` ,
		`imagen` ,
		`precio` ,
		`stock` ,
		`color` ,
		`medio_pago` ,
		`oferta` ,
		`activo` ,
		`fecha_alta`
		)
		VALUES (
		NULL ,  
		'$campos[nombre]',  
		'$campos[descripcion]',  
		'$campos[imagen]',  
		'$campos[precio]',  
		'$campos[stock]',  
		'$campos[color]',  
		'$campos[medio_pago]',  
		'$campos[oferta]',  
		'$campos[activo]',  
		'$campos[fecha]'
		);";
		//die($sql);
		return db_hacerQuery( $sql );
	}

	function db_actualizarProducto($campos){

		if( !isset($campos['oferta']) ) $campos['oferta'] = 0;
		else $campos['oferta'] = 1;
		if( !isset($campos['activo']) ) $campos['activo'] = 0;
		else $campos['activo'] = 1;

		//evito inyecciones de SQL 
		$campos = db_filtrarCampos( $campos );

		$update_imagen = '';
		if( !empty( $campos['imagen'] ) ) $update_imagen = "`imagen` = '$campos[imagen]',";

		$sql = "
		UPDATE `producto` SET
		`nombre` = '$campos[nombre]',
		`descripcion` = '$campos[descripcion]',
		$update_imagen  
		`precio` = '$campos[precio]',
		`stock` = '$campos[stock]',
		`color` = '$campos[color]',
		`medio_pago` = '$campos[medio_pago]',
		`oferta` = '$campos[oferta]',
		`activo` = '$campos[activo]',
		`fecha_alta` = '$campos[fecha]'
		WHERE idproducto = $campos[idproducto];";
		//die($sql);
		return db_hacerQuery( $sql );
	}

	function db_login( $user, $pass, $ip ){
		$user = db_filtrarCampo($user);
		$pass = db_filtrarCampo($pass);
		$sql = "SELECT idusuario, usuario, clave, privilegio
		FROM usuario
		WHERE usuario = '$user' AND clave = '$pass'";
		$res = db_hacerQueryUnico($sql);
		if( !empty($res) ) db_guardarLogin( $res['idusuario'], $ip );
		return $res;
	}

	function db_guardarLogin( $id, $ip ){
		$id = db_filtrarCampo($id);
		$sql = "INSERT INTO login VALUES (null, $id, now(), '$ip' )";
		return db_hacerQuery($sql);
	}

?>