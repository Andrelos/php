<h1>Comentarios</h1>

<?php echo $comentariosHTML ?>

<h2>Hacer comentario</h2>
<form action='<?php echo $_SERVER['PHP_SELF'] ?>' method='post'>
	<p>Nombre: <input type='text' id='nombre' name='nombre' /></p>
	<p>Comentario: <textarea id='comentario' name='comentario'></textarea></p>
	<p><input type='submit' name='hacer_comentario' />
</form>