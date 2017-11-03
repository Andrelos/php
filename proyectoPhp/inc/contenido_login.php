<h1>Ingrese al sistema</h1>
<form action='login.php' method='post'>
	<p>Usuario: <input type='text' name='usuario' id='usuario' value='<?php echo $usuario; ?>' /></p>
	<p>Clave: <input type='password' name='clave' id='clave' /></p>
	<p><input type='submit' name='login' /></p>
	<p><input type='hidden' name='pagina_destino' value='<?php echo $pagina_destino; ?>' /></p>
</form>
<?php
	//cuando un if tiene una sola orden puedo NO usar llaves
	if( isset($errorLogin) ) echo $errorLogin;
?>