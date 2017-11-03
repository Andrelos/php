<?php 

require_once('header.php');
require_once('consultas.php');

	 $id = $_REQUEST['id'];
	 //var_dump($id);
	 $resu=db_ConsultaPersonaUnica($id);

	 //var_dump($resu)


?>
<br/> <br/> <br/> 
<div class="container">
<div class="panel panel-info">
    <div class="panel-heading">Actualiza datos</div>
    <div class="panel-body"></div>
<form  id="actper" class="w3-container" role="form" action="/aplicacion1/ActualizaPersona.php" method="post" onsubmit="return confirmaEdicion()">
	<input type="hidden" name="idper" value="<?php echo $resu['idpersona']?>">
	
	<div class="form-group">
	  <label class="col-lg-3 control-label" for="nom">Nombre:</label>
	  <input type="text" class="w3-input" name="usr" value=<?php echo " ",$resu['nombreper']; ?>>
	</div>

	<div class="form-group">
	  <label class="col-lg-3 control-label" for="ape">Apellido:</label>
	  <input type="text" class="w3-input" name="ape" value=<?php echo " ",$resu['apellidoper']; ?>>
	</div>
	<div class="form-group" >
		<button value='' name='' type="submit" class='col-lg-1 control-label btn btn-primary'>Actualizar</button><br>
	</div>
	<!-- Hacer boton para volver al principal-->
</form>
</div>
</div>
<?php require_once('footer.php'); ?>