<?php
	//subir_archivo.php
	$hayArchivo = $archivo['size'] > 0;
	$_POST['imagen'] = '';
	if( $hayArchivo ){

		//si el directorio no existe lo creo
		$directorio = PRODUCTOS_IMG;
		if( ! file_exists( $directorio ) ) mkdir( $directorio );

		//genero una ruta que verifica que el archivo no exista usando un contandor, entonces si 0_pepito.jpg existe pruebo con 1_pepito.jpg
		$n = 0;
		do{
			$nombre = $n.'_'.$archivo['name'];
			$ruta = "$directorio/$nombre";
			$n++;
		} while( file_exists($ruta) );
		//die($ruta);				

		//copio el archivo del temporal a la ruta fija
		move_uploaded_file($archivo['tmp_name'],  $ruta );

		$_POST['imagen'] = $nombre;
	}
?>