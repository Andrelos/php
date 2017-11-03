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
                <h3>Expedientes</h3>
				
            </div>
            <div class="row">
				
			
				
                <table class="table table-striped table-bordered">
                  <thead>
                    <tr>
                      <th>Numero de expediente</th>
					  <th>Fecha</th>
                  
                      <th><a href="altaExpediente.php" class="btn btn-success">Nuevo expediente</a></th>
					  <th></th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php
				  require_once('database.php');
	
					$db_cnx=db_connect();
                  
                   $sql = "SELECT u806a_ca_expediente.id_expediente, u806a_ca_expediente.desc_expediente, u806a_ca_expediente.fecha_expediente FROM u806a_ca_expediente; ";
				
                   
				   foreach ($db_cnx->query($sql) as $row) {
                            echo '<tr>';
                            echo '<td>'. $row[1] . '</td>';
							echo '<td>'. $row[2] . '</td>';
							echo '<td width=250>';
                               
                                echo '<a class="btn btn-success" href="actualizaExpediente.php?id='.$row[0].' ">Actualizar</a>';
                                echo ' ';
								echo '<a class="btn btn-danger" href="bajaExpediente.php?id='.$row[0].' ">borrar</a>';
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