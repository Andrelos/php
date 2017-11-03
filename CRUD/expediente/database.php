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
   
	
	
	 function agrega_expediente($desc_exp,$fecha_exp){
	$db_cnx=db_connect();
	
	
	$sql1= "INSERT INTO u806a_ca_expediente (desc_expediente,fecha_expediente) 
	VALUES ('$desc_exp',TO_DATE('$fecha_exp','%d/%m/%Y'));";
	
	$db_cnx->exec($sql1);
	}
/*------------------------------------------------------------------------------------------------------------------------------------------------------------------------------*/
	function borrar_expediente($id_exp){
	
		 $db_cnx=db_connect();
        
        $sql = "DELETE FROM u806a_ca_expediente  WHERE id_expediente = $id_exp";
        
        $db_cnx->exec($sql);
	
	}
/*------------------------------------------------------------------------------------------------------------------------------------------------------------------------------*/
	function actualizar_expediente($id,$desc_exp,$fecha_exp){
		
		$db_cnx=db_connect();
		$sql="UPDATE u806a_ca_expediente  set desc_expediente = '$desc_exp' , fecha_expediente = TO_DATE('$fecha_exp','%d/%m/%Y')  WHERE id_expediente = $id;";
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
	
/*------------------------------------------------------------------------------------------------------------------------------------------------------------------------------*/
?>