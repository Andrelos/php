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
                <h3>Tipo de concurso</h3>
            </div>
            <div class="row">
				
			
				
                <table class="table table-striped table-bordered">
                  <thead>
                    <tr>
                      <th>Tipo de concurso</th>
					  
                      <th><a href="altaTipoconcurso.php" class="btn btn-success">Nuevo tipo de concurso</a></th>
					  <th></th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php
				  require_once('database.php');
				 
					
                  
					$db_cnx=db_connect();
                  
                   $sql = "SELECT u806a_ca_tipo_concurso.id_tipo_concurso, u806a_ca_tipo_concurso.desc_tipo_conc FROM u806a_ca_tipo_concurso; ";
				
                   
				   foreach ($db_cnx->query($sql) as $row) {
                            echo '<tr>';
                            echo '<td>'. $row[1] . '</td>';
                            
							
							echo '<td width=250>';
                               
                                echo '<a class="btn btn-success" href="actualizaTipoconcurso.php?id='.$row[0].' ">Actualizar</a>';
                                echo ' ';
								echo '<a class="btn btn-danger" href="bajaTipoconcurso.php?id='.$row[0].' ">borrar</a>';
                               
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