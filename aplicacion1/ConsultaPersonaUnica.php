<?php 

require_once('consultas.php');

$idper=$_POST['idpersona'];
//var_dump($idper);


$resu=db_ConsultaPersonaUnica($idper);

//var_dump($resu);
?>

<?php require_once('header.php'); ?>
<div class="container">
  <h2>Personas</h2>
  
	 <div class="panel panel-default">
	  <div class="panel-heading">Datos de persona</div>
	  <div class="panel-body">
	    <h3><span class="label label-info">Nombre:</span><?php echo " ",$resu['nombreper']; ?></h3>
	    <h3><span class="label label-info">Apellido:</span><?php echo " ",$resu['apellidoper']; ?></h3>
	  </div>
	 </div>
</div>
<?php require_once('footer.php'); ?>