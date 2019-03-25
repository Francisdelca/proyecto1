<?php
require_once("cabeza.php");
?>

<!-- la clase content es importante para separar la cabeza del contenido del medio-->


<ol class="breadcrumb">
    <li class="breadcrumb-item active">Registrar Usuarios</li>
</ol>

<?php
    if(isset($_GET['v']))
    {
      $dato=$_GET['v'];
      if($dato==1)
      {
        ?>
            <div class="alert alert-info">
            <strong>CORRECTO: </strong> Registro Correcto!
            </div>
        <?php
      }
      else
      {
        ?>
            <div class="alert alert-info">
            <strong>Error: </strong> Ocurrio un Error!
            </div>
        <?php
      }
    }
?>

<form method="post" action="registroU.php">

  <div class="form-group row">
    <label  class="col-sm-1 col-form-label">Usuario:</label>
    <div class="col-sm-5">
      <input type="text" name="usuario" class="form-control" placeholder="Usuario">
    </div>
  </div>

  <div class="form-group row">
    <label class="col-sm-1 col-form-label">Nombre:</label>
    <div class="col-sm-5">
      <input type="text" name="nombre" class="form-control" placeholder="Nombre">
    </div>
  </div>

  <div class="form-group row">
    <label class="col-sm-1 col-form-label">Apellido:</label>
    <div class="col-sm-5">
      <input type="text" name="apellido" class="form-control" placeholder="Apellido">
    </div>
  </div>

  <div class="form-group row">
    <label class="col-sm-1 col-form-label">Email:</label>
    <div class="col-sm-5">
      <input type="email" name="email" class="form-control" placeholder="Email">
    </div>
  </div>

  <div class="form-group row">
    <label class="col-sm-1 col-form-label">Contraseña:</label>
    <div class="col-sm-5">
      <input type="password" name="clave" class="form-control" placeholder="Contraseña">
    </div>
  </div>

  <div class="form-group row">
    <label class="col-sm-1 col-form-label">Fecha:</label>
    <div class="col-sm-2">
      <input type="text" name="fecha" class="form-control" id="fecha" placeholder="Fecha">
    </div>
  </div>

  <div class="form-group row">
    <label class="col-sm-1 col-form-label">Sexo:</label> 
    <div class="col-sm-2">
      <select class="form-control" name="sexo" id="">
      <option value="1">Masculino</option>
      <option value="2">Femenino</option>
      </select>
    </div>
  </div>
  <input type="submit" class="btn btn-primary" value="Registrar">
</form>



<?php
require_once("footer.php");
?>