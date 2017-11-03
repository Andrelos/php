<?php
    require 'database.php';
 
    $id = null;
    
	if ( !empty($_GET['id'])) {
        $id = $_REQUEST['id'];
		
    }
     
    if ( null==$id ) {
        header("Location: listadoTipoconcurso.php");
    }
     
    if ( !empty($_POST)) {
       
		$desc_tipo_concError = null;
         
		$desc_tipo_conc = $_POST['desc_tipo_conc'];
         
       
        $valid = true;
       	if (empty($desc_tipo_conc)) {
            $desc_tipo_concError = 'Ingrese Tipo de concurso';
			$valid = false;
        }
         
        
        if ($valid) {
           
			actualizar_tipo_concurso($id,$desc_tipo_conc);
		
        }
    } else {

	
	
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
                        <h3>Actualizar tipo de concurso</h3>
                    </div>
             
                    <form class="form-horizontal" action="actualizaTipoconcurso.php?id=<?php echo $id?>" method="post">
                      
					  
					  
					  
                      <div class="control-group <?php echo !empty($desc_tipo_concError)?'error':'';?>">
                        <label class="control-label">Tipo de concurso</label>
                        <div class="controls">
                            <input name="desc_tipo_conc" type="text"  placeholder="Tipo de concurso" value="<?php if (!empty($desc_tipo_conc)) {echo $desc_tipo_conc;} ?>">
                            <?php if (!empty($desc_tipo_concError)): ?>
                                <span class="help-inline"><?php echo $desc_tipo_concError;?></span>
                            <?php endif; ?>
                        </div>
                      </div>
			
                      <div class="form-actions">
                          <button type="submit" class="btn btn-success">Actualizar</button>
                          <a class="btn" href="listadoTipoconcurso.php">Volver</a>
                        </div>
                    </form>
                </div>
                 
    </div> <!-- /container -->
  </body>
</html>

