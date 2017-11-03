<?php
	$boton_alta = '';
	if( tienePermisos() ){
		$boton_alta = "<a href='alta.php' class='alta_producto'>Agregar producto</a>";
	}
?>
<h1>Listado de Productos <?php echo $boton_alta; ?></h1>

<form method='get'>
	<input type='text' id='b' name='b' placeholder='Busqueda por nombre' />
	<select id='order' name='order'>
		<option value='1'>Orden alfabético</option>
		<option value='2'>Menor precio</option>
		<option value='3'>Mayor precio</option>
	</select>
	<input type='submit' name='form-busqueda' value='buscar' />
	<?php
		if( isset($_GET['form-busqueda']) ){
			echo "<script>
				document.getElementById('b').value = '$_GET[b]';
				document.getElementById('order').value = $_GET[order];
			</script>";
		}
	?>
</form>

<table width='90%' cellspacing='0' cellpadding='0' border='1'>

	<?php 
		
		foreach ($productos as $p) {
			$css = '';
			if ( $p['oferta'] ) $css .= ' oferta ';
			if ( $p['stock'] < 3 ) $css .= ' bajo-stock ';

			$boton_editar = '';
			$boton_borrar = '';
			require_once('inc/funciones.php');
			if( tienePermisos() ){
				$boton_editar = "<a href='editar.php?id=$p[idproducto]'><img src='img/editar.png' /></a>";
				$boton_borrar = "<a onclick='return confirm(\"¿estas seguro?\")' href='borrar.php?id=$p[idproducto]'><img src='img/borrar.png' /></a>";
			}

			echo "<tr class='$css'>
			<td><img src='".PRODUCTOS_IMG."/$p[imagen]'  height='80'/></td>
			<td><h2>$p[nombre]</h2></td>
			<td>\$$p[precio]</td>
			<td><a href='detalle.php?id=$p[idproducto]'><img src='img/detalle.png' /></a></td>
			<td>$boton_editar</td>
			<td>$boton_borrar</td>
			</tr>";

		}

		$contar = count($productos);

		$msgBusqueda = '';
		if( !empty($_GET['b']) ) $msgBusqueda = "para los productos con nombre <em>$_GET[b]</em>";
		
		echo "<h3>Se encontraron $contar productos $msgBusqueda</h3>";
	?>

	
</table>