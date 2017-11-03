<?php
    require 'database.php';
    
	 $id = 0;
     
    if ( !empty($_GET['id'])) {
        $id = $_REQUEST['id'];
		
    }
     
    if ( !empty($_POST)) {
        
        $id = $_POST['id'];
        borrar_resolucion($id);
		header("Location: listadoResolucion.php");
         
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
                        <h3>Borrar resolucion</h3>
                    </div>
                     
                    <form class="form-horizontal" action="bajaResolucion.php" method="post">
                      <input type="hidden" name="id" value="<?php echo $id;?>"/>
                      <p class="alert alert-error">Seguro que quiere borrar ?</p>
                      <div class="form-actions">
                          <button type="submit" class="btn btn-danger">Si</button>
                          <a class="btn" href="listadoResolucion.php">No</a>
                        </div>
                    </form>
                </div>
                 
    </div> <!-- /container -->
  </body>
</html>