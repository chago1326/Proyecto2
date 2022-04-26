<section>

	<h1>Login</h1>
	<p>Fill the following .</p>
  <form method="post" action="<?= base_url('/acceso'); ?>">
    <div class="form-group">
      <label for="username">Usuario</label>
      <input id="username" class="form-control" type="text" name="username" placeholder="Ingrese su usuario">
    </div>
    <div class="form-group">
      <label for="password">Password</label>
      <input id="password" class="form-control" type="password" name="password" placeholder ="Ingrese su contrseña">
    </div>
    <br>
    <button type="submit" class="btn btn-primary"> Login </button>
    <br>
    <br>
    <p><a href="register">¿No tienes cuenta?</a></p>
    
  </form>
</section>
