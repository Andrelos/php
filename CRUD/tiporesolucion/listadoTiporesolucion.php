<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <link   href="css/bootstrap.min.css" rel="stylesheet">
    <script src="js/bootstrap.min.js"></script>
</head>
 
<body>
    <div class="container">
            <div class="row">
                <h3>Tipo de resolución</h3>
            </div>
            <div class="row">
				
			
				
                <table class="table table-striped table-bordered">
                  <thead>
                    <tr>
                      <th>Tipo de resolucion</th>
					  
                      <th><a href="altaTiporesolucion.php" class="btn btn-success">Nuevo tipo de resolucion</a></th>
					  <th></th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php
				  require_once('database.php');
				 
					
                  
					$db_cnx=db_connect();
                  
                   $sql = "SELECT u806a_ca_tipo_resolucion.id_tipo_resolucion, u806a_ca_tipo_resolucion.desc_tipo_resolucion FROM u806a_ca_tipo_resolucion;
 ";
				
                   
				   foreach ($db_cnx->query($sql) as $row) {
                            echo '<tr>';
                            echo '<td>'. $row[1] . '</td>';
                          
							
							echo '<td width=250>';
                               
                                echo '<a class="btn btn-success" href="actualizaTiporesolucion.php?id='.$row[0].' ">Actualizar</a>';
                                echo ' ';
								echo '<a class="btn btn-danger" href="bajaTiporesolucion.php?id='.$row[0].' ">borrar</a>';
                               
							   
                                echo '</td>';
                                echo '</tr>';
                   }
                  
				   
				   
				   
                  ?>
                  </tbody>
            </table>
        </div>
    </div> 
  </body>
</html>