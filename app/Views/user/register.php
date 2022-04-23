<section>

	<h1>Registro de usuario</h1>
	<p>Ingrese sus datos.</p>
  <form action="<?=site_url('/guardar');?>" method="POST" class="form-group" role="form">
            <input class="controls" type="number" name="id_cedula" id="id_cedula"
                placeholder="Ingrese su cedula(que va a ser su usuario)" required>
                <br>
                <br>
            <input class="controls" type="text" name="nombre" id="nombre" placeholder="Ingrese su Nombre" required>
            <br>
            <br>
            <input class="controls" type="text" name="apellido" id="apellido" placeholder="Ingrese su Apellido"
                required>
                <br>
                <br>
            <input class="controls" type="email" name="email" id="email" placeholder="Ingrese su Correo" required>
            <br>
            <br>
            <input class="controls" type="password" name="contrasenna" id="contrasenna"
                placeholder="Ingrese su Contraseña" required>
                <br>
                <br>
            <div class="form-group">
                <select name="tipoUsua">
                    <option value="Administrador">Administrador</option>
                    <option value="Usuario" selected>Usuario</option>
                </select>
                <br>
                <br>

                <button class="botons" type="submit" id="liveAlertBtn">Registrar</button>
                <br>

                <p><a href="index.php">¿Ya tengo Cuenta?</a></p>
    </div>
  </form>
</section>