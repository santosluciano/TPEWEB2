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
              <th>Descripcion</th>
            </tr>
          </thead>
          <tbody>
            {foreach from=$marcas item=marca}
            <tr>
              <td>{$marca['nombre']}</td>
              <td>{$marca['descripcion']}</td>
              <td><a href="modificarMarca/{$marca['id_marca']}" class="fa fa-pencil"></a></td>
              <td><a href="eliminarMarca/{$marca['id_marca']}" class="fa fa-trash-o"></a></td>
            </tr>
            {/foreach}
          </tbody>
        </table>
      </div>
      <a href="crearMarca" type="button" class="btn btn-primary btn-sm">Crear nueva marca</a>
    </div>
  </div>
</div>
{include file="../footer.tpl"}
