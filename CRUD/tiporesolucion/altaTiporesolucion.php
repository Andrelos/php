<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <link   href="css/bootstrap.min.css" rel="stylesheet">
   
</head>
<?php
     
    
	require_once('database.php');
	
	
	
 
    if ($_POST) {
        
        $desc_tipo_resolucionError = null;
	
        $desc_tipo_resolucion = $_POST['desc_tipo_resolucion'];
		
       
	   
        $valid = true;
        
		if (empty($desc_tipo_resolucion)) {
            $desc_tipo_resolucionError = 'Ingrese Tipo de resolucion';
			$valid = false;
        }
	
        if ($valid==true) {
           
		   db_connect();
		   agrega_tipo_resolucion($desc_tipo_resolucion);
	
        }
    }
?> 
<body>
    <div class="container">
     
                <div class="span10 offset1">
                    <div class="row">
                        <h3>Alta de tipo de resolución</h3>
                    </div>
             
                    <form class="form-horizontal" action="altaTiporesolucion.php" method="post">
                    
					    <div class="control-group <?php echo !empty($desc_tipo_resolucionError)?'error':'';?>">
                        <label class="control-label">Tipo de resolucion</label>
                        <div class="controls">
                            <input name="desc_tipo_resolucion" type="text"  placeholder="Tpo de resolucion" value="<?php if (!empty($desc_tipo_resolucion)) {echo $desc_tipo_resolucion;} ?>">
                            <?php if (!empty($desc_tipo_resolucionError)): ?>
                                <span class="help-inline"><?php echo $desc_tipo_resolucionError;?></span>
                            <?php endif; ?>
                        </div>
                      </div>

					  <div class="form-actions">
                          <button type="submit" class="btn btn-success">Grabar</button>
                          <a class="btn" href="listadoTiporesolucion.php">Volver</a>
                        </div>
                    </form>
                </div>
                 
    </div> 
	
	<script src="http://code.jquery.com/jquery.js"></script>
	<script src="js/bootstrap.min.js"></script>
  </body>
</html>
