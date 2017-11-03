<?php require_once('header.php');
      require_once('consultas.php');
?>
<br/>
<br/>
<br/>
<div class="container">
	<div class="panel panel-primary">
    <div class="panel-heading">Alta persona</div>
    <div class="panel-body">
<form id="altaform" action="/aplicacion1/AltaPersona.php" method="post">
  
  <div class="form-row">
    <div class="form-group col-md-12">
      <label for="inputEmail4" class="col-form-label">DNI</label>
      <input type="text" class="form-control" id="dni" name="dni" placeholder="DNI">
    </div>
  </div>
    

<div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputPassword4" class="col-form-label">Nombre</label>
      <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre">
    </div>
    <div class="form-group col-md-6">
      <label for="inputPassword4" class="col-form-label">Apellido</label>
      <input type="text" class="form-control" id="Apellido" name="apellido" placeholder="Apellido">
    </div>
  </div>
  



   <div class="form-row">
   <div class="form-group col-md-6">
      <label for="inputEmail4" class="col-form-label">Email</label>
      <input type="email" class="form-control" id="inputEmail4" name="mail" placeholder="Email">
    </div>
    <div class="form-group col-md-6">
      <label for="inputPassword4" class="col-form-label">Fecha nacimiento</label>
      <input type="date" class="form-control" id="fecha" name="fecha" placeholder="Fecha nacimineto">
    </div>
  </div>
    
    <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputPassword4" class="col-form-label">Contraseña</label>
      <input type="password" class="form-control" id="inputPassword4" name="pass" placeholder="Contraseña">
    </div>
    <div class="form-group col-md-6">
      <label for="inputPassword4" class="col-form-label">Repita contraseña</label>
      <input type="password" class="form-control" id="inputPassword4" name="pass_conf" placeholder="Contraseña">
    </div>
  </div>
  
  
  <div class="form-group col-md-12">
    <label for="inputAddress" class="col-form-label">Direccion</label>
    <input type="text" class="form-control" id="inputAddress" name="direccion" placeholder="Calle 1234">
  </div>

  
  
  <div class="form-row">
    
    <div class="form-group col-md-3">
      <label for="inputState" class="col-form-label">Proicnias</label>
      <select id="provincia" class="form-control" name="provincia" onchange="validarLocalidad(this.value)"> 
        <option value="0" selected="selected">Seleccione provincia</option>
        <?php db_comboPais(); ?>
      </select>
    </div>
      
      <div class="form-group col-md-3">
      <label for="inputState" class="col-form-label">Localidades</label>
      <select id="localidad" class="form-control" name="localidad"> 
       
        
      </select>
    </div>

    <div class="form-group col-md-3">
      <label for="inputCity" class="col-form-label">Ciudad</label>
      <input type="text" class="form-control" id="inputCity" name="ciudad">
    </div>

    
    <div class="form-group col-md-3">
      <label for="inputZip" class="col-form-label">Codigo postal</label>
      <input type="text" class="form-control" id="inputZip" name="codpostal">
    </div>
  </div>
 
  <div class="form-group col-md-12">
  	<button type="submit" class="btn btn-primary">Confirmar</button>
  </div>
</form>
</div>
</div>
<?php require_once('footer.php'); ?>
	