<?php

    
     
   
	/*--------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------*/
		function db_connect(){
		global $db_cnx;
		if( isset($db_cnx) ) return $db_cnx;
		
		try {
				$db_cnx = new PDO('informix:host=atenea.fadu.uba.ar; service=1526; database=concurso; server=fadu_produccion; protocol=olsoctcp; EnableScrollableCursors=1;', 'dba', 'mo25chica');

			} catch (PDOException $e) {
		print $e->getMessage();
			}
		return $db_cnx;
	}
    /*--------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------*/
   
	
	
	 function agrega_tipo_concurso($desc_tipo_conc){
	$db_cnx=db_connect();
	
	
	$sql1= "INSERT INTO u806a_ca_tipo_concurso (desc_tipo_conc) 
	VALUES ('$desc_tipo_conc');";
	
	$db_cnx->exec($sql1);
	}

	function borrar_tipo_concurso($id_tipo_conc){
	
		 $db_cnx=db_connect();
        
        $sql = "DELETE FROM u806a_ca_tipo_concurso  WHERE id_tipo_concurso = $id_tipo_conc ";
        
        $db_cnx->exec($sql);
	
	}
	
	function actualizar_tipo_concurso($id,$desc_tipo_conc){
		
		$db_cnx=db_connect();
		$sql="UPDATE u806a_ca_tipo_concurso  set desc_tipo_conc = '$desc_tipo_conc'  WHERE id_tipo_concurso = $id ;";
		$db_cnx->exec($sql);
	}
	
/*------------------------------------------------------------------------------------------------------------------------------------------------------------------------------*/

	
	

?>