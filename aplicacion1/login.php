
<?php 
    require_once('consultas.php');
    require_once('funciones.php');
   
        $usr=$_POST['usr'];
        $pass=$_POST['pass'];
   
   
        $res=db_login($usr,$pass);
        
     
        session_start();

         if (!isset($_SESSION['idpersona'])) {
            $_SESSION['idpersona'] = $res['idpersona'];
            $_SESSION['emailper'] = $res['emailper'];
            $_SESSION['nombreper'] = $res['nombreper'];

            require_once('botonera.php');
            
            echo "</br>";
            echo "</br>";
            echo "</br>";

            echo "nuevo logeo de ".$_SESSION['nombreper']."esto es dentro del login , no de index capo";
               
             
            log_acceso( $_SESSION['idpersona'], $_SESSION['emailper']);   

        } else {

            echo "</br>";
            echo "</br>";
            echo "</br>";
            echo "</br>";
            echo "sssssssssssssssssssssssssssssssssssssssssssssssss";
            echo "ya estas logeado".$_SESSION['nombreper'];
            //var_dump($_SESSION);
        }
      
     
        
           
        
       
       
    


?>  




    