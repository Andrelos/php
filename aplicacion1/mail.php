<?php 
require_once ( 'class.phpmailer.php' ); // Add the path as appropriate


	
$ToEmail = 'ablanco@fadu.uba.ar';
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

/*
$Mail->SMTPOptions = array(
    'ssl' => [
        'verify_peer' => true,
        'verify_depth' => 3,
        'allow_self_signed' => true,
        'peer_name' => 'smtp.gmail.com',
        'cafile' => 'C:\wamp64\bin\php\php5.6.31\ca_cert.pem',
    ],
);

*/
  
  $Mail->Port        = 587; // set the SMTP port
  $Mail->Username    = 'andrezblanco@gmail.com'; // SMTP account username
  $Mail->Password    = 'cotonr31n4d0'; // SMTP account password
  $Mail->Priority    = 1; // Highest priority - Email priority (1 = High, 3 = Normal, 5 = low)
  $Mail->CharSet     = 'UTF-8';
  $Mail->Encoding    = '8bit';
  $Mail->Subject     = 'Test Email Using Gmail';
  $Mail->ContentType = 'text/html; charset=utf-8\r\n';
  $Mail->From        = 'ablanco@fadu.uba.ar';
  $Mail->FromName    = 'GMail Test';
  $Mail->WordWrap    = 50; // RFC 2822 Compliant for Max 998 characters per line


 


  $Mail->AddAddress( $ToEmail ); // To:
  $Mail->isHTML( TRUE );
  $Mail->Body    = '"pedro" "ablanco@fadu.uba.ar" "algo"';
  $Mail->AltBody = $MessageTEXT;
  $Mail->Send();
  $Mail->SmtpClose();

  if ( $Mail->IsError() ) { // ADDED - This error checking was missing
return FALSE;
  }
  else {
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
 ?>