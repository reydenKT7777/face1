<header id="head" class="secondary"></header>
<div class="container">
  <center><h1>REGISTRO DE CLIENTES</h1></center>
  <div class="col-md-6">
    <form class="form-horizontal" action="<?=base_url()?>index.php/admin/registrar" method="post">
      <div class="form-group">
        <label for="">Nombre completo</label>
        <div class="input-group">
          <input type="text" class="form-control" placeholder="" name="nombre_cliente">
          <span class="input-group-addon"><i class="fa fa-user"></i></span>
        </div>
      </div>
      <div class="form-group">
        <label for="control-label">Nit</label>
        <div class="input-group">
          <input type="text" class="form-control" placeholder="" name="nit">
          <span class="input-group-addon"><i class="fa fa-user"></i></span>
        </div>
      </div>
      <div class="form-group">
        <label for="">Direcci&oacute;n</label>
        <div class="input-group">
          <input type="text" class="form-control" placeholder="" name="direccion">
          <span class="input-group-addon"><i class="fa fa-institution (alias)"></i></span>
        </div>
      </div>
      <div class="form-group">
        <label for="">Telefono</label>
        <div class="input-group">
          <input type="text" class="form-control" placeholder="" name="telefono">
          <span class="input-group-addon"><i class="fa fa-phone"></i></span>
        </div>
      </div>
      <div class="form-group">
        <label for="">Correo</label>
        <div class="input-group">
          <input type="text" class="form-control" placeholder="" name="correo">
          <span class="input-group-addon">@</span>
        </div>
      </div>
      <div class="form-group">
        <label for="">Contraseña</label>
        <div class="input-group">
          <input type="password" class="form-control" placeholder="" name="pass1">
          <span class="input-group-addon"><i class="fa fa-lock"></i></span>
        </div>
      </div>
      <div class="form-group">
        <label for="">Repita la contraseña</label>
        <div class="input-group">
          <input type="password" class="form-control" placeholder="" name="pass">
          <span class="input-group-addon"><i class="fa fa-lock"></i></span>
        </div>
      </div>
      <center><input type="submit" class="btn btn-success" value="Registrar"></center>
    </form>
  </div>
  <div class="col-md-6">
    <p>Al registrarse se le enviara un correo electronico para poder activar el usuario</p>
    <p>una ves registrado podra hacer uso de nuestros servicios</p>
  </div>
</div>
