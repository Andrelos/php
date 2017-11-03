
<?php 
	

	if(!isset($_SESSION['idpersona'])){
		echo "</br>";
		echo "</br>";
		echo "</br>";
		echo "</br>";
		echo "menu vacio";



	}else{
		echo "</br>";
		echo "</br>";
		echo "</br>";
		echo "</br>";
		echo "este es el menu de    ".$_SESSION['nombreper'];

		$to = "ablanco@fadu.uba.ar";
		$subject = "Asunto del email";
		$message = "Este es mi primer envío de email con PHP";
 
		//mail($to, $subject, $message);
	}

	
	
	
    

 ?>