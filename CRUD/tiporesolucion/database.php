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
  
	 function agrega_tipo_resolucion($desc_tipo_resolucion){
	$db_cnx=db_connect();
	
	
	$sql1= "INSERT INTO u806a_ca_tipo_resolucion (desc_tipo_resolucion) 
	VALUES ('$desc_tipo_resolucion');";
	
	$db_cnx->exec($sql1);
	}
/*--------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------*/
	function borrar_tipo_resolucion($id_tipo_res){
	
		 $db_cnx=db_connect();
        
        $sql = "DELETE FROM u806a_ca_tipo_resolucion  WHERE id_tipo_resolucion = $id_tipo_res; ";
        
        $db_cnx->exec($sql);
	
	}
/*------------------------------------------------------------------------------------------------------------------------------------------------------------------------------*/
	function actualizar_tipo_resolucion($id,$desc_tipo_resolucion){
		
		$db_cnx=db_connect();
		$sql="UPDATE u806a_ca_tipo_resolucion  set desc_tipo_resolucion = '$desc_tipo_resolucion'  WHERE id_tipo_resolucion = $id ;";
		$db_cnx->exec($sql);
	}
	
/*------------------------------------------------------------------------------------------------------------------------------------------------------------------------------*/

	

?>