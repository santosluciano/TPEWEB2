<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>{$titulo}</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!--Estilo  -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/estilo.css">
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
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
          <a class="navbar-brand" href="#">Logo</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
          <ul class="nav navbar-nav">
            <li class="active"><a href="#">INICIO <span class="sr-only">(current)</span></a></li>
            <li><a href="#"  class="fa fa-mobile fa-2x"></a></li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">MARCAS <span class="caret"></span></a>
              <ul class="dropdown-menu">
                {foreach from=$marcas item=marca}
                <li><a class="celulares" data-value="{$marca['id_marca']}">{$marca['nombre']}</a></li>
                {/foreach}
              </ul>
            </li>
          </ul>
          <form class="navbar-form navbar-left">
            <div class="form-group">
              <input type="text" class="form-control" placeholder="Modelo Celular">
            </div>
            <button type="submit" class="btn btn-default">BUSCAR</button>
          </form>
          <ul class="nav navbar-nav navbar-right">
            <li><a href="https://www.facebook.com/" class="fa fa-facebook" target="_blank"></a></li>
            <li><a href="https://www.instagram.com/?hl=es" class="fa fa-instagram" target="_blank"></a></li>
            <li><a href="https://www.youtube.com/" class="fa fa-youtube" target="_blank"></a></li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle fa fa-user" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> <span class="caret"></span></a>
              <ul class="dropdown-menu iniciosesion">
                <div class="container-fluid">
                  <form>
                    <div class="form-group">
                      <label for="nombreusuario">Nombre de Usuario</label>
                      <input type="text" class="form-control" id="nombreusuario" placeholder="Juan123">
                    </div>
                    <div class="form-group">
                      <label for="pass">Password</label>
                      <input type="password" class="form-control" id="pass" placeholder="Contraseña">
                    </div>
                    <div class="checkbox">
                      <label>
                        <input type="checkbox"> Recordar
                      </label>
                    </div>
                    <button type="submit" class="btn btn-default">Iniciar Sesion</button>
                  </form>
                </div>
              </ul>
            </li>
          </ul>
        </div><!-- /.navbar-collapse -->
      </div><!-- /.container-fluid -->
    </nav>
