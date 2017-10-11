{include file="../header.tpl"}
  <h1>Iniciar Sesion</h1>
      <div class="row">
        <div class="col-md-6 col-md-offset-3">

          <form action="verificarUsuario" method="post">
            <div class="form-group">
              <label for="usuario">Usuario</label>
              <input type="text" class="form-control" id="usuario" name="usuario" placeholder="root" required>
            </div>
            <div class="form-group">
              <label for="password">Password</label>
              <input type="password" class="form-control" id="password" name ="password" placeholder="******" required>
            </div>
            {if !empty($error) }
              <div class="alert alert-danger" role="alert">{$error}</div>
            {/if}
            <button type="submit" class="btn btn-default">Ingresar</button>
          </form>
        </div>
      </div>
{include file="../footer.tpl"}
