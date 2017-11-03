<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <link   href="css/bootstrap.min.css" rel="stylesheet">
   
</head>
<?php
     
    
	require_once('database.php');
	
	
	
 
    if ($_POST) {
        
        $desc_tipo_concError = null;
		
      
		
        $desc_tipo_conc = $_POST['desc_tipo_conc'];
	
       
	   
        $valid = true;
        
		if (empty($desc_tipo_conc)) {
            $desc_tipo_concError = 'Ingrese Tipo de concurso';
			$valid = false;
        }
		
        
        
        
        // insert data
        if ($valid==true) {
           
		   db_connect();
		   agrega_tipo_concurso($desc_tipo_conc);
			
			
		
			
        }
    }
?> 
<body>
    <div class="container">
     
                <div class="span10 offset1">
                    <div class="row">
                        <h3>Alta de tipo de concurso</h3>
                    </div>
             
                    <form class="form-horizontal" action="altaTipoconcurso.php" method="post">
                    
					  

					  
					  
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
                          <button type="submit" class="btn btn-success">Grabar</button>
                          <a class="btn" href="listadoTipoconcurso.php">Volver</a>
                        </div>
                    </form>
                </div>
                 
    </div> <!-- /container -->
	
	<script src="http://code.jquery.com/jquery.js"></script>
	<script src="js/bootstrap.min.js"></script>
  </body>
</html>
