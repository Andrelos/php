<?php
	
	//http://stackoverflow.com/questions/15699101/get-client-ip-address-using-php
	function obtenerIP() {
	     $ipaddress = '';
	     if ($_SERVER['HTTP_CLIENT_IP'])
	         $ipaddress = $_SERVER['HTTP_CLIENT_IP'];
	     else if($_SERVER['HTTP_X_FORWARDED_FOR'])
	         $ipaddress = $_SERVER['HTTP_X_FORWARDED_FOR'];
	     else if($_SERVER['HTTP_X_FORWARDED'])
	         $ipaddress = $_SERVER['HTTP_X_FORWARDED'];
	     else if($_SERVER['HTTP_FORWARDED_FOR'])
	         $ipaddress = $_SERVER['HTTP_FORWARDED_FOR'];
	     else if($_SERVER['HTTP_FORWARDED'])
	         $ipaddress = $_SERVER['HTTP_FORWARDED'];
	     else if($_SERVER['REMOTE_ADDR'])
	         $ipaddress = $_SERVER['REMOTE_ADDR'];
	     else
	         $ipaddress = 'UNKNOWN';

	     return $ipaddress; 
	}

	function obtenerPagina(){
		//$_SERVER es un array que contiene información del pedido que hizo el cliente
		$ruta = $_SERVER['PHP_SELF'];
		//esta función descompone un ruta en partes
		//http://www.php.net/manual/es/function.pathinfo.php
		$pagina = pathinfo( $ruta, PATHINFO_BASENAME );
		return $pagina;
	}
	
	/*
		si más adelante quiero hacer un arquitectura de niveles, ya puedo consultar si tiene ese nivel!
		por ejemplo, 
		nivel 1 puede ser un lector
		nivel 2 un editor
		nivel 3 alguien que puede borrar
		nivel 4 super admin
	*/
	function tienePermisos($nivel=2){
		return estaLogueado() && $_SESSION['usr']['privilegio'] >= $nivel;
	}

	function estaLogueado(){
		if( session_status() == PHP_SESSION_NONE ) session_start();
		return isset( $_SESSION['usr'] );
	}

	function usuarioLogout(){
		if( session_status() == PHP_SESSION_NONE ) session_start();
		unset( $_SESSION['usr'] );
	}

	function dibujarSelect( $id, $datos, $activo='' ){
		$html = "<select name='$id' id='$id'>\r\n";
		foreach( $datos as $option ){
			$sel = '';
			if( $option['value'] == $activo ) $sel = 'selected';
			$html .= "\t<option $sel value='$option[value]'>$option[label]</option>\r\n";
		}
		$html .= "</select>";
		return $html;
	}

	function log_acceso(){
	$file = fopen("log_acceso.txt", "w");
                fwrite($file, "Esto es una nueva linea de texto" . PHP_EOL);
                fwrite($file, "Otra más" . PHP_EOL);
                fclose($file);
	}

	function fecha(){
		$fecha = getdate();
		
		$dia = $fecha['mday'];
		$mes = $fecha['mon'];
		$anio = $fecha['year'];

		$hora = $fecha['hours'];
		$minutos = $fecha['minutes'];
		$segundos = $fecha['seconds'];

		$msj = $dia,"/",$mes,"/",$anio," - ",$hora,":",$minutos,":",$segundos;
		return $msj;
	} 
	
?>