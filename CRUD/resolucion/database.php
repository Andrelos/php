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
   
	
	
	 function agrega_resolucion($tipo,$desc_res,$fecha){
	$db_cnx=db_connect();
	
	
	$sql1= "INSERT INTO u806a_ca_resolucion (id_tipo_resolucion,desc_resolucion,fecha_resolucion) 
	VALUES ($tipo,'$desc_res',TO_DATE('$fecha','%d/%m/%Y'));";
	
	$db_cnx->exec($sql1);
	}

	function borrar_resolucion($id_res){
	
		 $db_cnx=db_connect();
        
        $sql = "DELETE FROM u806a_ca_resolucion  WHERE id_resolucion = $id_res ";
        
        $db_cnx->exec($sql);
	
	}
	
	function actualizar_resolucion($id,$tipo,$desc_res,$fecha){
		
		$db_cnx=db_connect();
		$sql="UPDATE u806a_ca_resolucion  set id_tipo_resolucion = $tipo ,desc_resolucion = '$desc_res' , fecha_resolucion = TO_DATE('$fecha','%d/%m/%Y')  WHERE id_resolucion = $id ;";
		$db_cnx->exec($sql);
	}
	
/*------------------------------------------------------------------------------------------------------------------------------------------------------------------------------*/

	function obtener_res_unica($id){
			$db_cnx=db_connect();
		$sql="SELECT u806a_ca_resolucion.id_resolucion, u806a_ca_tipo_resolucion.desc_tipo_resolucion, u806a_ca_resolucion.desc_resolucion, u806a_ca_resolucion.fecha_resolucion
				FROM u806a_ca_resolucion INNER JOIN u806a_ca_tipo_resolucion ON u806a_ca_resolucion.id_tipo_resolucion = u806a_ca_tipo_resolucion.id_tipo_resolucion
				WHERE (((u806a_ca_resolucion.id_resolucion)=$id));";		
	//$db_cnx->query($sql);
	 foreach ($db_cnx->query($sql) as $row) {
		echo $row[0] ;
		echo $row[1] ;
		echo $row[2] ;
	 
	 }
	
	}
	

?>