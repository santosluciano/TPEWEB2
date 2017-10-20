{include file="../header.tpl"}
<h1>{$encabezado}</h1>
<div class="row">
  <div class="col-md-6 col-md-offset-3">
    {if isset($error) }
      <div class="alert alert-danger" role="alert">{$error}</div>
    {/if}
    <div class="thumbnail">
      <form action="{$action}" method="post">
        <div class="form-group">
          <label for="nombre">Nombre</label>
          <input type="text" class="form-control" id="nombre" name="nombre"  value="{$nombre}" placeholder="Nombre del celular">
        </div>
        <div class="form-group">
          <label for="caracteristicas">Caracteristicas</label>
          <textarea id="caracteristicas" name="caracteristicas" rows="8" cols="50">{$caracteristicas}</textarea>
        </div>
        <div class="form-group">
          <label for="precio">Precio $</label>
          <input type="number" class="form-control" id="precio" name="precio"  value="{$precio}" placeholder="$99.99">
        </div>
        <div class="form-group">
          <label for="url">Url de la imagen</label>
          <input type="text" class="form-control" id="url" name="url"  value="{$url_img}" placeholder="www.imagenes.com/imagen">
        </div>
        <div class="form-group">
          <label for="precio">Marca</label>
          <select class="form-control" name="marca">
            {foreach from=$marcas item=marca}
            {if $marca.id_marca == $id_marca_celular}
              <option value={$marca.id_marca} selected>{$marca.nombre}</option>
            {else}
              <option value={$marca.id_marca} >{$marca.nombre}</option>
            {/if}
            {/foreach}
          </select>
        </div>
        <button type="submit" class="btn btn-primary">{$accion}</button>
        <a href="adminCelulares" type="button" class="btn btn-success btn-sm">Volver</a>
      </form>
    </div>
  </div>
</div>
{include file="../footer.tpl"}
