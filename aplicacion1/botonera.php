
<?php require_once('header.php'); ?>

<nav class="navbar navbar-inverse bg-inverse navbar-fixed-top">
  <div class="container-fluid">

    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#">Aplicacion1</a>
    </div>



<!-- ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
<!-- ////////////////////////////////////////////////barra izquierda////////////////////////////////////////////////////////// -->
      <ul class="nav navbar-nav">
        <li class="active"><a href="/aplicacion1/index.php">Inicio<span class="sr-only">(current)</span></a></li>
        <?php 
	        if(!isset($_SESSION['idpersona'])){
	        	dibujaMenuRegistro(); 
	    	}
        ?>
      </ul>
<!-- /////////////////////////////////////////barra derecha///////////////////////////////////////////////////////////// -->
	  <ul class="nav navbar-nav navbar-right">
      
      	<?php 
      	if(!isset($_SESSION['idpersona'])){
      		
      		dibujaLogin();
      	}else{
      		dibujaMenuUser($_SESSION['idpersona'],$_SESSION['nombreper']);
      	}
      	
      	?>
  	  </ul>
  	</div> 
<!-- ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->


       </div>
</nav>
 
<?php require_once('footer.php'); ?>