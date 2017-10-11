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
          <label for="titulo">Nombre</label>
          <input type="text" class="form-control" id="titulo" name="nombre"  value="{$nombre}" placeholder="Nombre de la marca">
        </div>
        <div class="form-group">
          <label for="descripcion">Descripcion</label>
          <textarea name="descripcion" id="descripcion" name="descripcion" rows="8" cols="50">{$descripcion}</textarea>
        </div>
        <button type="submit" class="btn btn-primary">{$accion}</button>
        <a href="adminMarcas" type="button" class="btn btn-success btn-sm">Volver</a>
      </form>
    </div>
  </div>
</div>
{include file="../footer.tpl"}
