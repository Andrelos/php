<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
  
    <title></title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
</head>
  
  <body>
    
   
   <div class="container">    
        <div id="loginbox" style="margin-top:50px;" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">                    
            <div class="panel panel-primary" >
                    <div class="panel-heading">
                        <div class="panel-title">Ingresar</div>
                        <div style="float:right; font-size: 80%; position: relative; top:-10px"><a href="#">Olvide mi contraseña</a></div>
                    </div>     

                    <div style="padding-top:30px" class="panel-body" >

                        <div style="display:none" id="login-alert" class="alert alert-danger col-sm-12"></div>
                            
                        <form id="login" class="form-horizontal" role="form" action="/aplicacion1/login.php" method="post">
                                    
                            <div style="margin-bottom: 25px" class="input-group">
                                        <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                        <input id="usr" name="usr" type="text" class="form-control" name="username" value="" placeholder="Usuario" required="">                                        
                                    </div>
                                
                            <div style="margin-bottom: 25px" class="input-group">
                                        <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                                        <input id="pass" name="pass" type="password" class="form-control" name="password" placeholder="Contraseña" value="" required="">
                                    </div>
                                    

                         


                                <div style="margin-top:10px" class="form-group">
                                    <!-- Button -->

                                    <div class="col-sm-12 controls">
                                      
                                      
                                       <button type="submit" class="btn btn-success">Logueo</button>
                                    </div>
                                </div>


                               
                            </form>     



                        </div>                     
                    </div>  
        </div>
        
    </div>


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>