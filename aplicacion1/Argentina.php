<?php 
require_once('consultas.php');
$a=$_GET['t'];
?>
<option><?php echo db_comboProvincias($a); ?></option>