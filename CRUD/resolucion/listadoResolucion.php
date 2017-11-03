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
                <h3>Resoluciones</h3>
            </div>
            <div class="row">
				
			
				
                <table class="table table-striped table-bordered">
                  <thead>
                    <tr>
                      <th>Resolucion</th>
					  <th>Tipo</th>
                      <th>Fecha</th>
                      <th><a href="altaResolucion.php" class="btn btn-success">Nueva resolucion</a></th>
					  <th></th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php
				  require_once('database.php');
				 
					
                  
					$db_cnx=db_connect();
                  
                   $sql = "SELECT u806a_ca_resolucion.id_resolucion,  u806a_ca_resolucion.desc_resolucion,u806a_ca_tipo_resolucion.desc_tipo_resolucion, u806a_ca_resolucion.fecha_resolucion  
								FROM u806a_ca_resolucion INNER JOIN u806a_ca_tipo_resolucion ON u806a_ca_resolucion.id_tipo_resolucion = u806a_ca_tipo_resolucion.id_tipo_resolucion; ";
				
                   
				   foreach ($db_cnx->query($sql) as $row) {
                            echo '<tr>';
                            echo '<td>'. $row[1] . '</td>';
                            echo '<td>'. $row[2] . '</td>';
							
                            echo '<td>'. $row[3] . '</td>';
							
							echo '<td width=250>';
                               
                                echo '<a class="btn btn-success" href="actualizaResolucion.php?id='.$row[0].' ">Actualizar</a>';
                                echo ' ';
								echo '<a class="btn btn-danger" href="bajaResolucion.php?id='.$row[0].' ">borrar</a>';
                               
							   
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