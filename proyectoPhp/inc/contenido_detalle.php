<?php 
	
	$css = '';
	if ( $p['oferta'] ) $css .= ' oferta ';
	if ( $p['stock'] < 3 ) $css .= ' bajo-stock ';
	
	/*
		El diseñador me pide que haya una cajita con el color que corresponde al producto
		Él ya armó la clase "cajita" que resuelve al <span> como un cuadrado, sólo me falta ponerle un background-color de forma dinámica		
		¿cómo convierto ese número que guardé en la base en un color de CSS?
		Bueno, armo un mapeo con un array (lo ideal sería tener una tabla en la base y listo)
		Obtengo en base al color que vino del SQL el nombre CSS del color		
		Después abajo, en donde quiero poner la cajita incluyo el <span> que me indicó el diseñador		
	*/
	$colores = array( 1=>'red', 2=>'green', 3=>'blue' );
	$color = $colores[ $p['color'] ];

	echo "
	<h1>$p[nombre]</h1>
	<table width='50%' cellspacing='0' cellpadding='0' border='1'>
	<tr class='$css'>
	<td><img src='".PRODUCTOS_IMG."/$p[imagen]'  width='100%'/></td>
	</tr>
	</table>

	<table width='50%' cellspacing='0' cellpadding='0' border='1'>
	<tr class='$css'>
	<td>
	<p>$p[descripcion]</p>
	<p>stock: $p[stock]</p>
	<p>color: <span class='cajita' style='background-color: $color'></span></p>
	<p>Medio de pago: $p[medio_pago]</p>
	<p>Fecha de Alta: $p[fecha_alta]</p>
	<br/><br/>
	<h2><a href='listado.php'>VOLVER</a></h2>

	</td>
	<td>\$$p[precio]</td>
	</tr>
	</table>
	";

	

?>