<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <link   href="css/bootstrap.min.css" rel="stylesheet">
   
</head>
<?php
     
    
	require_once('database.php');
	
	
	
 
    if ($_POST) {
        
        $desc_resolucionError = null;
		$tipo_resolucionError = null;
        $fecha_resolucionError = null;
      
		
        $desc_resolucion = $_POST['desc_resolucion'];
		$id_tipo_resolucion = $_POST['id_tipo_resolucion'];
        $fecha_resolucion = $_POST['fecha_resolucion'];
      
	
	   
        $valid = true;
        
		if (empty($id_tipo_resolucion)) {
            $tipo_resolucionError = 'Ingrese Tipo de resolucion'; 
			$valid = false;
        }
		
		if (empty($desc_resolucion)) {
            $desc_resolucionError = 'Ingrese resolucion';
			$valid = false;
        }
		
		
        if (empty($fecha_resolucion)) {
            $fecha_resolucionError = 'Ingrese fecha de resolucion ';
            $valid = false;
        }
        
        
        
        // insert data
        if ($valid==true) {
           
		   
		
		   
		   db_connect();
		   agrega_resolucion($id_tipo_resolucion,$desc_resolucion,$fecha_resolucion);
			
			
		
			
        }
    }
?> 
<body>
    <div class="container">
     
                <div class="span10 offset1">
                    <div class="row">
                        <h3>Alta de resolución</h3>
                    </div>
             
                    <form class="form-horizontal" action="altaResolucion.php" method="post">
                    
					  
					  <div class="control-group <?php echo !empty($tipo_resolucionError)?'error':'';?>">
                        <label class="control-label">Tipo de resolucion</label>
                        <div class="controls">
                            
							<?php 
								 require_once('database.php');
								$db_cnx=db_connect();
								$sql="SELECT u806a_ca_tipo_resolucion.id_tipo_resolucion, u806a_ca_tipo_resolucion.desc_tipo_resolucion FROM u806a_ca_tipo_resolucion;";
								
								
								echo '<select name="id_tipo_resolucion">';
								
								echo "<option value=' ' selected='selected' disabled>Seleccionar</option>";
								foreach ($db_cnx->query($sql) as $row) {
									
									
									echo "<option value='$row[0]'>".$row[1].'</option>';
									
                               }
								echo '</select>';
							
							?>
							
                            <?php if (!empty($tipo_resolucionError)): ?>
                               <span class="help-inline"><?php echo $tipo_resolucionError;?></span>
                            <?php endif; ?>
                        </div>
                      </div>
					  
					  
					    <div class="control-group <?php echo !empty($desc_resolucionError)?'error':'';?>">
                        <label class="control-label">Resolucion</label>
                        <div class="controls">
                            <input name="desc_resolucion" type="text"  placeholder="Resolucion" value="<?php if (!empty($desc_resolucion)) {echo $desc_resolucion;} ?>">
                            <?php if (!empty($desc_resolucionError)): ?>
                                <span class="help-inline"><?php echo $desc_resolucionError;?></span>
                            <?php endif; ?>
                        </div>
                      </div>
					  
					  
					  
					  
					  
                      <div class="control-group <?php echo !empty($desc_resolucionError)?'error':'';?>">
                        <label class="control-label">Fecha resolucion</label>
                        <div class="controls">
                            <input name="fecha_resolucion" type="date" placeholder="Fecha resolucion" value="<?php echo !empty($fecha_resolucion)?$fecha_resolucion:'';?>">
                            <?php if (!empty($fecha_resolucionError)): ?>
                                <span class="help-inline"><?php echo $fecha_resolucionError;?></span>
                            <?php endif;?>
                        </div>
                      </div>
                      
					
                      
					  <div class="form-actions">
                          <button type="submit" class="btn btn-success">Grabar</button>
                          <a class="btn" href="listadoResolucion.php">Volver</a>
                        </div>
                    </form>
                </div>
                 
    </div> <!-- /container -->
	
	<script src="http://code.jquery.com/jquery.js"></script>
	<script src="js/bootstrap.min.js"></script>
  </body>
</html>
