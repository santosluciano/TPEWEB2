{include file="../header.tpl"}
<div class="row">
  <div class="col-md-6 col-md-offset-3">
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
          <td><a href="modificarMarca/{$marca['id_marca']}">Modificar</a></td>
          <td><a href="eliminarMarca/{$marca['id_marca']}">Eliminar</a></td>
        </tr>
        {/foreach}
      </tbody>
    </table>
    <a href="crearMarca">Crear nueva marca</a>
  </div>
</div>
{include file="../footer.tpl"}
