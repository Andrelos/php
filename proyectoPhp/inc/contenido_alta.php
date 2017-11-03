<h1>Alta de producto</h1>
<form action='<?php echo $_SERVER['PHP_SELF'] ?>' method='post' enctype='multipart/form-data'>
	<p>Nombre: <input type='text' name='nombre' id='nombre' required /></p>
	<p>Descripcion: <textarea name='descripcion' id='descripcion'></textarea></p>
	<p>Imagen: <input type='file' name='imagen' id='imagen' /></p>
	<p>Precio: <input type='number' name='precio' id='precio' required /></p>
	<p>Stock: <input type='number' name='stock' id='stock' required /></p>
	<p>Color: 
		<select id='color' name='color'>
			<option value='1'>Rojo</option>
			<option value='2'>Verde</option>
			<option value='3'>Azul</option>
		</select>
	</p>
	<p>Medio Pago: 
		<?php echo $select_pagos ?>
	</p>
	<p>Caracteristicas: 
		<input type='checkbox' name='activo' id='activo' checked /> Activo
		<input type='checkbox' name='oferta' id='oferta' /> Oferta
	</p>
	<p>Fecha de Alta: <input type='date' name='fecha' id='fecha' /></p>

	<input type='submit' name='alta' id='alta' />
</form>
<?php
	if( isset($erroresHTML) ) echo $erroresHTML;
?>