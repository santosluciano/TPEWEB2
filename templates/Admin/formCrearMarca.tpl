{include file="../header.tpl"}
<div class="row">
  <div class="col-md-6 col-md-offset-3">
    {if isset($error) }
      <div class="alert alert-danger" role="alert">{$error}</div>
    {/if}
    <form action="guardarMarca" method="post">
      <div class="form-group">
        <label for="titulo">Nombre</label>
        <input type="text" class="form-control" id="titulo" name="nombre"  value="{$nombre}" placeholder="Nombre de la marca">
      </div>
      <div class="form-group">
        <label for="descripcion">Descripcion</label>
        <textarea name="descripcion" id="descripcion" name="descripcion" rows="8" cols="50">{$descripcion}</textarea>
      </div>
      <button type="submit" class="btn btn-default">Crear Marca</button>
    </form>
  </div>
</div>
{include file="../footer.tpl"}
