<br/>
<br/>
<br/>
<div class="container">
  <h2>Personas</h2>
  <div class="panel panel-primary">
    <div class="panel-heading">
      Agregar persona
    <a href="AltaPersona_form.php"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span></a>
    </div>
    <div class="panel-body"></div>
  
   <form id="uniper" class="form-horizontal" role="form" action="/aplicacion1/ConsultaPersonaUnica.php" method="post">           
    <table class="table table-striped">
      <?php  
        require_once('consultas.php');
        db_ConsultaPersona();
      ?>
    </table>
  
  </form>
  </div>
</div>


