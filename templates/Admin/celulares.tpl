{include file="../header.tpl"}
<h1>{$encabezado}</h1>
<div class="row">
  <div class="col-md-8 col-md-offset-2 col-xs-12">
    <div class="thumbnail">
      <div class="table-responsive">
        <table class="table table-hover">
          <thead>
            <tr>
              <th>Nombre</th>
              <th>Caracteristicas</th>
              <th>Imagenes</th>
              <th>Precio</th>
              <th>Marca</th>
            </tr>
          </thead>
          <tbody>
            {foreach from=$celulares item=celular}
            <tr>
              <td>{$celular.nombre}</td>
              <td>{$celular.caracteristicas}</td>
              <td>
              {foreach $celular.imagenes item=imagen}
                <img src="{$imagen.ruta}" class="img-responsive" alt="{$celular.nombre}">
              {/foreach}
              <a href="modificarImagenes/{$celular.id_celular}" class="fa fa-pencil"></a>
              </td>
              <td>$ {$celular.precio}</td>
              <td>{$celular.marca.nombre}</td>
              <td><a href="modificarCelular/{$celular.id_celular}" class="fa fa-pencil"></a></td>
              <td><a href="eliminarCelular/{$celular.id_celular}" class="fa fa-trash-o"></a></td>
              <td><a href="especificacion/{$celular.id_celular}">Especificaciones</a></td>
            </tr>
            {/foreach}
          </tbody>
        </table>
      </div>
      <a href="crearCelular" type="button" class="btn btn-primary btn-sm">Crear nuevo celular</a>
      <a href="admin" type="button" class="btn btn-success btn-sm">Volver</a>
    </div>
  </div>
</div>
{include file="../footer.tpl"}
