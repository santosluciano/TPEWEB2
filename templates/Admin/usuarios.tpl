{include file="../header.tpl"}
<h1>{$encabezado}</h1>
<div class="row">
  <div class="col-md-6 col-md-offset-3">
    <div class="thumbnail">
      <div class="table-responsive">
        <table class="table">
          <thead>
            <tr>
              <th>Nombre de usuario</th>
              <th>Admin?</th>
            </tr>
          </thead>
          <tbody>
            {foreach from=$usuarios item=usuario}
            <tr>
              <td>{$usuario.nombre}</td>
              {if $usuario.permiso_admin == 0}
              <td>NO <a class="fa fa-lock" href="cambiarPermisoAdmin/{$usuario.id_usuario}" aria-hidden="true"></a></td>
              {else}
              <td>SI <a class="fa fa-unlock" href="cambiarPermisoAdmin/{$usuario.id_usuario}" aria-hidden="true"></i></td>
              {/if}
              <td><a href="eliminarUsuario/{$usuario.id_usuario}" class="fa fa-trash-o"></a></td>
            </tr>
            {/foreach}
          </tbody>
        </table>
      </div>
      <a href="admin" type="button" class="btn btn-success btn-sm">Volver</a>
    </div>
    {if !empty($estado) }
      <div class="alert alert-{$alert}" role="alert">{$estado}</div>
    {/if}
  </div>
</div>
{include file="../footer.tpl"}