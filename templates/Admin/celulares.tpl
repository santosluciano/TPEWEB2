{include file="../header.tpl"}
<div class="row">
  <div class="col-md-6 col-md-offset-3">
    <table class="table">
      <thead>
        <tr>
          <th>Nombre</th>
          <th>Caracteristicas</th>
          <th>Precio</th>
        </tr>
      </thead>
      <tbody>
        {foreach from=$celulares item=celular}
        <tr>
          <td>{$celular['nombre']}</td>
          <td>{$celular['caracteristicas']}</td>
          <td>$ {$celular['precio']}</td>
          <td><a href="modificarCelular">Modificar</a></td>
          <td><a href="eliminarCelular/{$celular['id_celular']}">Eliminar</a></td>
        </tr>
        {/foreach}
      </tbody>
    </table>
    <a href="crearCelular">Crear nuevo celular</a>
  </div>
</div>
{include file="../footer.tpl"}
