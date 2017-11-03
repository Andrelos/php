<?php
    require 'database.php';
 
    $id = null;
    
	if ( !empty($_GET['id'])) {
        $id = $_REQUEST['id'];
		
    }
     
    if ( null==$id ) {
        header("Location: listadoResolucion.php");
    }
     
    if ( !empty($_POST)) {
       
		$desc_tipo_resolucionError = null;
	
        $desc_tipo_resolucion = $_POST['desc_tipo_resolucion'];
       
	   var_dump($desc_tipo_resolucion);
	   
        $valid = true;
    	if (empty($desc_tipo_resolucion)) {
            $desc_tipo_resolucionError = 'Ingrese Tipo de resolucion';
			$valid = false;
        }
         

        if ($valid) {
            
		
			actualizar_tipo_resolucion($id,$desc_tipo_resolucion);
			
		
        }
    } else {
		
		var_dump($id);
	
	}
		
        
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <link   href="css/bootstrap.min.css" rel="stylesheet">
    <script src="js/bootstrap.min.js"></script>
</head>
 
<body>
    <div class="container">
     
                <div class="span10 offset1">
                    <div class="row">
                        <h3>Actualizar tipo de resolucion</h3>
                    </div>
             
                    <form class="form-horizontal" action="actualizaTiporesolucion.php?id=<?php echo $id?>" method="post">
                    
					  
					  
                      <div class="control-group <?php echo !empty($desc_tipo_resolucionError)?'error':'';?>">
                        <label class="control-label">Tipo de resolucion</label>
                        <div class="controls">
                            <input name="desc_tipo_resolucion" type="text"  placeholder="Tipo de esolucion" value="<?php if (!empty($desc_tipo_resolucion)) {echo $desc_tipo_resolucion;} ?>">
                            <?php if (!empty($desc_tipo_resolucionError)): ?>
                                <span class="help-inline"><?php echo $desc_tipo_resolucionError;?></span>
                            <?php endif; ?>
                        </div>
                      </div>
				
                      <div class="form-actions">
                          <button type="submit" class="btn btn-success">Actualizar</button>
                          <a class="btn" href="listadoTiporesolucion.php">Volver</a>
                        </div>
                    </form>
                </div>
                 
    </div> 
  </body>
</html>

