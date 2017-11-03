<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <link   href="css/bootstrap.min.css" rel="stylesheet">
   
</head>
<?php
     
	require_once('database.php');
	
    if ($_POST) {
        
        $desc_expedienteError = null;
		$fecha_expedienteError = null;

      
		
        $desc_expediente = $_POST['desc_expediente'];
		$fecha_expediente = $_POST['fecha_expediente'];
       
	   
        $valid = true;
        
		
		if (empty($desc_expediente)) {
            $desc_expedienteError = 'Ingrese expediente';
			$valid = false;
        }
		
		
        if (empty($fecha_expediente)) {
            $fecha_expedienteError = 'Ingrese fecha de expediente ';
            $valid = false;
        }
        
        
        
        // insert data
        if ($valid==true) {
              
		   db_connect();
		   agrega_expediente($desc_expediente,$fecha_expediente);
			
        }
    }
?> 
<body>
    <div class="container">
     
                <div class="span10 offset1">
                    <div class="row">
                        <h3>Alta de expediente</h3>
                    </div>
             
                    <form class="form-horizontal" action="altaExpediente.php" method="post">
                    
					    <div class="control-group <?php echo !empty($desc_expedienteError)?'error':'';?>">
                        <label class="control-label">Expediente</label>
                        <div class="controls">
                            <input name="desc_expediente" type="text"  placeholder="Expediente" value="<?php if (!empty($desc_expediente)) {echo $desc_expediente;} ?>">
                            <?php if (!empty($desc_expedienteError)): ?>
                                <span class="help-inline"><?php echo $desc_expedienteError;?></span>
                            <?php endif; ?>
                        </div>
                      </div>
			
                      <div class="control-group <?php echo !empty($fecha_expedienteError)?'error':'';?>">
                        <label class="control-label">Fecha resolucion</label>
                        <div class="controls">
                            <input name="fecha_expediente" type="date" placeholder="Fecha expediente" value="<?php echo !empty($fecha_expediente)?$fecha_expediente:'';?>">
                            <?php if (!empty($fecha_expedienteError)): ?>
                                <span class="help-inline"><?php echo $fecha_expedienteError;?></span>
                            <?php endif;?>
                        </div>
                      </div>
                 
					  <div class="form-actions">
                          <button type="submit" class="btn btn-success">Grabar</button>
                          <a class="btn" href="listadoExpediente.php">Volver</a>
                        </div>
                    </form>
                </div>
                 
    </div> <!-- /container -->
	
	<script src="http://code.jquery.com/jquery.js"></script>
	<script src="js/bootstrap.min.js"></script>
  </body>
</html>
