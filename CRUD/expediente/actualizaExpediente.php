<?php
    require 'database.php';
 
    $id = null;
    
	if ( !empty($_GET['id'])) {
        $id = $_REQUEST['id'];
		
    }
     
    if ( null==$id ) {
        header("Location: listadoExpediente.php");
    }
     
    if ( !empty($_POST)) {
       
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
         
        
        if ($valid) {
            
			
			
			actualizar_expediente($id,$desc_expediente,$fecha_expediente);
			
	
            
			//header("Location: listadoResolucion.php");
        }
    } else {
   /*
		$db_cnx=db_connect();
		$sql="SELECT u806a_ca_expediente.id_expediente, u806a_ca_expediente.desc_expediente, u806a_ca_expediente.fecha_expediente
		FROM u806a_ca_expediente
		WHERE (((u806a_ca_expediente.id_expediente)=$id));";		
	
	 f$db_cnx->query($sql) as $row;
		$desc_expediente = $row[1];
        $fecha_expediente = $row[2];
		}
 */
	

		
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
                        <h3>Actualizar expediente</h3>
                    </div>
             
                    <form class="form-horizontal" action="actualizaExpediente.php?id=<?php echo $id?>" method="post">
                      
					  	  
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
                        <label class="control-label">Fecha expediente</label>
                        <div class="controls">
                            <input name="fecha_expediente" type="date" placeholder="Fecha expediente" value="<?php echo !empty($fecha_expediente)?$fecha_expediente:'';?>">
                            <?php if (!empty($fecha_expedienteError)): ?>
                                <span class="help-inline"><?php echo $fecha_expedienteError;?></span>
                            <?php endif;?>
                        </div>
                      </div>
					  
					  
					  
                      <div class="form-actions">
                          <button type="submit" class="btn btn-success">Actualizar</button>
                          <a class="btn" href="listadoExpediente.php">Volver</a>
                        </div>
                    </form>
                </div>
                 
    </div> <!-- /container -->
  </body>
</html>

