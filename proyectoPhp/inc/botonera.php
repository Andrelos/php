<?php
	
	/*
		Una matriz es un array que contiene arrays en sus posiciones
		Las bases de datos nos van a ofrecer los resultados en forma de matriz, ya vayan acomodando la cabeza...
	*/
	require_once('funciones.php');
	
	$boton = array( 'texto'=>'Inicio', 'link'=>'index.php');
	$botones[] = $boton;
	if( estaLogueado() ){
		$botones[] = array( 'texto'=>'Listado de Productos', 'link'=>'listado.php');
		$botones[] = array( 'texto'=>'Comentarios', 'link'=>'comentarios.php');
		$usr = $_SESSION['usr']['usuario'];
		$botones[] = array( 'texto'=>"Bienvenido $usr - Salir", 'link'=>'salir.php');
	} else {
		$botones[] = array( 'texto'=>'Login', 'link'=>'login.php');
	}
	
	echo "<ul id='botonera'>\r\n";
		
	$pagina = obtenerPagina(); //esta función es mía, la llamo usando su nombre y ()
	
	foreach( $botones as $btn ){
		$txt = $btn['texto'];
		$href = $btn['link'];
			
		$chequeo = $href == $pagina;
		
		//esto equivale a un if($chequeo){ $css = 'activo' } else { $css = '' }
		$css = ($chequeo) ? 'activo' : ''; 
		//dentro de comillas dobles puedo usar \t para tabular, \r\n para hacer un enter
		echo "\t<li class='$css'><a href='$href'>$txt</a></li>\r\n";
	}
	
	echo '</ul>';
?>