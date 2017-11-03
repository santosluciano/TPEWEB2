{include file="../header.tpl"}
<h1>{$encabezado}</h1>
<div class="row">
  <div class="col-md-6 col-md-offset-3">
    <div class="thumbnail">
      <div class="table-responsive">
        <table class="table">
          <thead>
            <tr>
              <th>Nombre</th>
              <th>Img</th>
            </tr>
          </thead>
          <tbody>
            {foreach from=$marcas item=marca}
            <tr>
              <td>{$marca.nombre}</td>
              <td><img src="{$marca.url_img}" class="img-responsive" alt="{$marca.nombre}"></td>
              <td><a href="modificarMarca/{$marca.id_marca}" class="fa fa-pencil"></a></td>
              <td><a href="eliminarMarca/{$marca.id_marca}" class="fa fa-trash-o"></a></td>
            </tr>
            {/foreach}
          </tbody>
        </table>
      </div>
      <a class="btn btn-primary btn-sm" href="crearMarca">Crear nueva marca</a>
      <a href="admin" type="button" class="btn btn-success btn-sm">Volver</a>
    </div>
    {if !empty($estado) }
      <div class="alert alert-{$alert}" role="alert">{$estado}</div>
    {/if}
  </div>
</div>
{include file="../footer.tpl"}
