<header>
  <nav class="navbar navbar-default">
    <div class="container-fluid">
      <!-- Brand and toggle get grouped for better mobile display -->
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="">MUNDO CELULAR</a>
      </div>

      <!-- Collect the nav links, forms, and other content for toggling -->
      <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
        <ul class="nav navbar-nav">
          <li class="active"><a href="home" class="partial">INICIO <span class="sr-only">(current)</span></a></li>
          <li><a href="celulares"  class="partial fa fa-mobile fa-2x"></a></li>
          <li class="dropdown-marcas">
            <a href="" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">MARCAS <span class="caret"></span></a>
            <ul class="dropdown-menu">
              {foreach from=$marcas item=marca}
              <li><a class="celulares partial"  title="desplegable" href="celulares/{$marca['id_marca']}">{$marca.nombre}</a></li>
              {/foreach}
            </ul>
          </li>
        </ul>
        <form class="navbar-form navbar-left partialSearch" action="celulares/buscar">
          <div class="form-group">
            <input type="text" class="form-control" name="key" placeholder="Modelo Celular">
          </div>
          <button type="submit" class="btn btn-success">BUSCAR</button>
        </form>
        <ul class="nav navbar-nav navbar-right">
          <li><a href="https://www.facebook.com/" class="fa fa-facebook hidden-xs" target="_blank"></a></li>
          <li><a href="https://www.instagram.com/?hl=es" class="fa fa-instagram hidden-xs" target="_blank"></a></li>
          <li><a href="https://www.youtube.com/" class="fa fa-youtube hidden-xs" target="_blank"></a></li>
          {if $hayConexion}
          <li><a href="admin" class="fa fa-user-circle-o"></a></li>
          {else}
          <li class="dropdown">
            <a href="#" class="fa fa-user-circle dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> <span class="caret"></span></a>
            <ul class="dropdown-menu">
              <div class="container-fluid">
                <form action="verificarUsuario" method="post" class="formlogin">
                  <div class="form-group">
                    <label for="usuario">Nombre de usuario</label>
                    <input type="text" class="form-control" id="usuario" name="usuario" placeholder="root" required>
                  </div>
                  <div class="form-group">
                    <label for="pwd">Contraseña</label>
                    <input type="password" class="form-control" id="pwd" name ="password" placeholder="******" required>
                  </div>
                  <button type="submit" class="btn btn-primary">Ingresar</button>
                </form>
              </div>
            </ul>
          </li>
          {/if}
        </ul>
      </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
  </nav>
</header>
