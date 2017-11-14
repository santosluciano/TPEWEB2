    <h1>DATOS DE REGISTRO</h1>
    <div class="container tarjeta-celular">
      <div class="row">
        {if !empty($error) }
         <div class="alert alert-danger" role="alert">{$error}</div>
        {/if}
        <div class="col-md-6 col-md-offset-3">
          <form class="form-registro" action="registrarUsuario">
            <div class="form-group">
              <label for="email">EMAIL</label>
              <input type="email" class="form-control" id="email" name="usuario" placeholder="root" required>
            </div>
            <div class="form-group">
              <label for="password">Contraseña</label>
              <input type="password" class="form-control" id="password" name ="password" placeholder="******" required>
            </div>
            <button type="submit" class="btn btn-info">Registrar</button>
          </form>
        </div>
      </div>
    </div>  