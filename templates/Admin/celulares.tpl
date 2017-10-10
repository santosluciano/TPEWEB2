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
              <th>Precio</th>
            </tr>
          </thead>
          <tbody>
            {foreach from=$celulares item=celular}
            <tr>
              <td>{$celular['nombre']}</td>
              <td>{$celular['caracteristicas']}</td>
              <td>$ {$celular['precio']}</td>
              <td><a href="modificarCelular" class="fa fa-pencil">Modificar</a></td>
              <td><a href="eliminarCelular/{$celular['id_celular']}" class="fa fa-trash-o">Eliminar</a></td>
            </tr>
            {/foreach}
          </tbody>
        </table>
      </div>
      <a href="crearCelular" type="button" class="btn btn-primary btn-sm">Crear nuevo celular</a>
    </div>
  </div>
</div>
{include file="../footer.tpl"}
