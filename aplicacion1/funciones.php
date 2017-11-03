<?php 


	function usuarioLogout(){
		if( session_status() == PHP_SESSION_NONE ) session_start();
		unset( $_SESSION['usr'] );
		

	}

	function dibujaMenuRegistro(){
		echo ' <li><a href="/aplicacion1/AltaPersona_form.php">Registrarse</a></li>';
	}
	function dibujaMenuUser($idpersona,$nombreper){
		echo 
		'<li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">'.$nombreper.' <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="main.php?id='.$idpersona.'">Mi cuenta</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="/aplicacion1/salir.php">Salir</a></li>
          </ul>
        </li>';
	}

	function dibujaLogin(){
		echo 
		'
       		<form id="login" class="navbar-form navbar-left" role="form" action="/aplicacion1/login.php" method="post">
			      <div class="form-group">
			        <input id="usr" name="usr" type="text" class="form-control" name="username" value="" placeholder="Usuario" required="">  
			        <input id="pass" name="pass" type="password" class="form-control" name="password" placeholder="Contraseña" value="" required="">
			      </div>
	      		<button type="submit" class="btn btn-success">Logueo</button>
	    	</form>';
	}
	function fecha(){
		$fecha = getdate();
		
		$dia = $fecha['mday'];
		$mes = $fecha['mon'];
		$anio = $fecha['year'];

		$hora = $fecha['hours'];
		$minutos = $fecha['minutes'];
		$segundos = $fecha['seconds'];

		$msj = $dia."/".$mes."/".$anio." - ".$hora.":".$minutos.":".$segundos;
		return $msj;
	} 

	function log_acceso($idpersona,$mail){
	
		$file = fopen("log_acceso.txt", "a"); // w escribe, a agrega, r lee.
	    fwrite($file,$idpersona." ".$mail." ".fecha().PHP_EOL);
	    fclose($file);
	}

	function envioMail($email,$nombreDestinatario,$Asunto,$Mensaje){
		require_once ( 'class.phpmailer.php' ); // Add the path as appropriate
		  $Ausnto = "Asunto";
		  $ToEmail = $email;
		  $ToName  = 'Jackie';
		  $name = "andres";
		  $message = "mensaje";
		  $MessageTEXT = "algo mas";
		  $Mail = new PHPMailer();
		  $Mail->IsSMTP(); // Use SMTP
		  $Mail->Host        = "smtp.gmail.com"; // Sets SMTP server
		  $Mail->SMTPDebug   = 2; // 2 to enable SMTP debug information
		  $Mail->SMTPAuth    = TRUE; // enable SMTP authentication
		  $Mail->SMTPSecure  = "tls"; //Secure conection 
		  $Mail->Port        = 587; // set the SMTP port
		  $Mail->Username    = 'andrezblanco@gmail.com'; // SMTP account username
		  $Mail->Password    = 'cotonr31n4d0'; // SMTP account password
		  $Mail->Priority    = 1; // Highest priority - Email priority (1 = High, 3 = Normal, 5 = low)
		  $Mail->CharSet     = 'UTF-8';
		  $Mail->Encoding    = '8bit';
		  $Mail->Subject     = $Asunto;
		  $Mail->ContentType = 'text/html; charset=utf-8\r\n';
		  $Mail->From        = '???????';
		  $Mail->FromName    = $Asunto;
		  $Mail->WordWrap    = 50; // RFC 2822 Compliant for Max 998 characters per line
		  $Mail->AddAddress( $ToEmail ); // To:
		  $Mail->isHTML( TRUE );
		  $Mail->Body    = $Mensaje;
		  $Mail->AltBody = $MessageTEXT;
		  $Mail->Send();
		  $Mail->SmtpClose();

			  if ( $Mail->IsError() ) { // ADDED - This error checking was missing
			    return FALSE;
			  }else{
			    return TRUE;
			  }
			$Send = SendMail( $ToEmail, $name, $email, $message, $MessageTEXT );
			if ( $Send ) {
			  echo "<h2> Sent OK</h2>";
			}
			else {
			  echo "<h2> ERROR</h2>";
			}
		die;
	}
	

 ?>
