{include file="../header.tpl"}
<h1>{$encabezado}</h1>
<div class="row">
  <div class="col-md-8 col-md-offset-2 col-xs-12">
    {if isset($error) }
      <div class="alert alert-danger" role="alert">{$error}</div>
    {/if}
    <div class="thumbnail">
      <div class="table-responsive">
        <table class="table table-hover">
          <thead>
            <tr>
              <th>Imagen</th>
              <th>Cambiar</th>
            </tr>
          </thead>
          <tbody>
            {foreach from=$imagenes item=imagen}
            <tr>
              <td class="imgcel"><img src="{$imagen.ruta}" class="img-responsive" alt="imagenCelular {$imagen.id_imagen}"></td>
              <td>
                <form action="cambiarImagen/{$imagen.id_imagen}" method="post" class="submitImagenCelular" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="imagen">Imagen celular</label>
                        <input type="file" id="imagen" name="imagen">
                    </div>
                    <button type="submit" class="btn btn-primary">Cambiar Imagen</button>
                </form>
              <a href="eliminarImagen/{$imagen.id_imagen}" class="btn btn-danger">Eliminar Imagen</a> 
              </td>
            </tr>
            {/foreach}
          </tbody>
        </table>
      </div>
      <form action="subirImagenes/{$id_celular}" method="post" enctype="multipart/form-data">
        <div class="form-group">
          <label for="imagenes">Imagenes Celular (Max. 3)</label>
          <input type="file" id="imagenes" name="imagenes[]" multiple>
        </div>
        <button type="submit" class="btn btn-primary">Subir Imagenes</button>
        <a href="adminCelulares" type="button" class="btn btn-success btn-sm">Volver</a>
      </form>
    </div>
  </div>
</div>
{include file="../footer.tpl"}

